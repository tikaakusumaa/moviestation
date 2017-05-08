<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentification extends CI_Controller {

	public function index()
	{
		$this->load->view('Admin/login_admin');
	}

	public function Auth02(){

		$nama = $this->input->post('Username');
		$password = md5($this->input->post('passwotmu'));
		$lihatData = $this->M_admin->Masukkan_Saya($nama,$password);

		 if ($lihatData > 0)
            {
				$this->session->nama=$nama;
				$this->session->password=$password;
				$this->load->view('Admin/welcomeadmin');
			}
				else{

					// echo $this->session->set_flashdata('gagallogin', '<span class="label label-danger"><span class="glyphicon glyphicon-ban-circle"></span> Maaf Username & Password Tidak Sesuai</span>');
					// redirect('Admlog','refresh');
					echo $this->db->last_query();
				}

	}

	public function tes(){
		$data['bioskop'] = $this->db->get('bioskop');
		$this->load->view('nyoba',$data);
	}
}
