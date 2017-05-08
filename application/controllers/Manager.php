<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('user');
    }

    public function index(){
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";

        // Google Project API Credentials
        $clientId = '766133586892-i5dm8qm771l50stlag2elmtgch5ms28g.apps.googleusercontent.com';
        $clientSecret = '7zNqIKZb1LJ0S5j5iWEbXe4A';
        $redirectUrl = 'http://localhost/bioskop/User_authentication';
        //===============================================================

        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to codexworld.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $userProfile['picture'];

            $this->session->nama = $userData['first_name'];
            $this->session->id = $userData['oauth_uid'];
            $this->session->picture = $userProfile['picture'];
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
        $this->load->view('Manager/masuk',$data);
        //$this->load->view('Admin/welcomeadmin');

    }

    public function admin(){
        $this->load->view('Manager/welcomeadmin');
    }

    public function tambah_movie(){

        $data['id_bioskop']= $this->M_movie->get_tabel('bioskop');
        $data['jadwal']= $this->M_movie->get_tabel('jam_pemutaran');
        $data['Kode'] = $this->CGenerate();

        $kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');

        $data['movie_list'] = $this->M_movie->get_movie($kode_bioskop);
        $this->load->view('Manager/movieadd',$data);

    }

    private function CGenerate(){
    $kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');

     $kondisi = "id_bioskop = '" . $kode_bioskop. "' ";
     $kode = $this->M_movie->buat_kode('id_movie','movie',$kode_bioskop."MJ".$this->session->userdata('kd_Manager').'RMV',$kondisi);

     return $kode;
    }


    public function Transaksi(){
         $get['data'] = $this->M_TSaldo->transaksi_list();
         $this->load->view('Manager/transaksisaldo',$get);
    }

    public function PTransaksi(){
        $get['data'] = $this->M_TSaldo->transaksi_Pending();
        $this->load->view('Manager/transaksisaldopending',$get);   
    }

    public function UpdateTransaksi(){
        $id_trans = $this->uri->segment(3);
        $update = array('id_withdrawal'=>$id_trans,
                    'status'=>1);

        $this->db->trans_start();
        $this->db->update('transaksi_withdrawal',$update,array('id_withdrawal'=>$id_trans));
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            echo $this->session->set_flashdata('gagal', 'gagal');
           } else {
            echo $this->session->set_flashdata('oke', 'oke');
           }

        redirect('Manager/PTransaksi');

    }

    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('Manager');
    }

    public function Laporan(){
        $jenis = $_GET['id'];

        define('Result', $this->M_other->dec($jenis));

        if (Result == 'today') {
            $a['list'] = $this->M_TSaldo->ReportNow();
        }elseif (Result == 'weekly') {
            $a['list'] = $this->M_TSaldo->ReportWeek();
        }elseif (Result == 'monthly') {
            $a['list'] = $this->M_TSaldo->ReportMonth();
        }elseif (Result == 'alltransaction') {
            $a['list'] = $this->M_TSaldo->ReportNow();
        }

        $hari = array('WEEKOFYEAR(tanggal)' => date('Y-m-d'),'id_manager' => $this->session->userdata('kd_Manager'));
        $minggu = array('WEEKOFYEAR(tanggal)' => $this->M_other->MN(),'id_manager' => $this->session->userdata('kd_Manager'));
        $bulan = array('MONTH(tanggal)' => (int)date('m'),'id_manager' => $this->session->userdata('kd_Manager'));
        $tahun = array('YEAR(tanggal)' => (int)date('Y'),'id_manager' => $this->session->userdata('kd_Manager'));

        $har = $this->M_TSaldo->SUM('transaksi_withdrawal',$hari,'jumlah');
        $min = $this->M_TSaldo->SUM('transaksi_withdrawal',$minggu,'jumlah');
        $bul = $this->M_TSaldo->SUM('transaksi_withdrawal',$bulan,'jumlah');
        $year= $this->M_TSaldo->SUM('transaksi_withdrawal',$tahun,'jumlah');


        $a['P_Hari'] = number_format($har,2,',','.');
        $a['P_Minggu'] = number_format($min,2,',','.');
        $a['P_Bulan'] = number_format($bul,2,',','.');
        $a['P_Tahun'] = number_format($year,2,',','.');
        
        $this->load->view('Manager/laporan',$a);
    }

    public function count_TPnd(){
        $where = array('status' => 0,'id_manager' => $this->session->userdata('kd_Manager'));
        $jumlah = $this->M_other->count_return_row('transaksi_withdrawal',$where);

        echo (int)$jumlah;

    }

    public function SignIn(){

        $email = $this->input->post('email');
        $atentikasi = $this->input->post('authID');
        $lihatData = $this->M_other->Auth('email','oauth_uid',$email,$atentikasi,'manager_register');
         if ($lihatData > 0)
            {
                $this->session->nama = $this->M_movie->first_value_where('first_name','oauth_uid',$atentikasi,'manager_register');
                $this->session->level = "Manager";
                $this->session->id = $atentikasi;
                $this->session->picture = $this->M_movie->first_value_where('picture_url','oauth_uid',$atentikasi,'manager_register');
                $this->session->kd_Manager = $this->M_movie->first_value_where('id','oauth_uid',$this->session->userdata('id'),'manager_register');

                
                $this->load->view('Manager/welcomemenejer');

            }
                else{
                    $this->session->set_flashdata('gagal', '<span class="label label-danger"><span class="glyphicon glyphicon-ban-circle"></span> Maaf Username & Password Tidak Sesuai</span>');
                    redirect('Manager');
                }

    }

    public function Welcome(){
        $this->load->view('Manager/welcomemenejer');
    }
}
