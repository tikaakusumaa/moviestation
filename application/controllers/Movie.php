<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Movie extends CI_Controller
{
    function __construct() {
		parent::__construct();
		// Load user model
		$this->load->model('user');
    }

    public function tambahkan(){

		$data = array('id_movie'=>$this->input->post('id_movie'),
					'id_bioskop'=>$this->input->post('id_bioskop'),
					'nama_film'=> $this->input->post('nama_film'),
					//'id_jadwal'=> implode(',', array_values($this->input->post('id_jadwal'))),
					'id_jadwal'=> $this->input->post('id_jadwal'),
					'harga' => $this->input->post('harga')+($this->input->post('harga')/10),
					'kategori'=> implode('', array_values($this->input->post('kategori'))),
					'sinopsis' => $this->input->post('sinopsis'),
					'kuota' => $this->input->post('kuota'));

		$this->db->trans_start();
		$this->db->insert('movie',$data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
               echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Data Sudah masuk !!
			    </div>');
			    redirect('Manager/tambah_movie');
           }
    	

	}


	public function delete($id)
	{
		$this->db->trans_start();
		$where = array('id_movie' => $id);
		$this->M_movie->hapus_data($where,'movie');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Data Dihapus !!
			    </div>');
			    redirect('Manager/tambah_movie');
           }
		
	}

	public function edit($id){
		$where = array('id_movie' => $id);
		$data['data_edit'] = $this->M_movie->edit_data($where,'movie')->result();
		$kode_bioskop = $this->M_movie->first_value_where('id_bioskop','id_manager',$this->session->userdata('kd_Manager'),'bioskop');

        $data['movie_list'] = $this->M_movie->get_movie($kode_bioskop);
		$data['bioskop'] = $this->db->get('bioskop');
		$data['jadwal'] = $this->db->get('jam_pemutaran');
		$data['qry'] = $this->db->last_query();
		$this->load->view('Manager/movieedit',$data);
	}

	public	function update(){
		$update = array('id_movie'=>$this->input->post('id_movie'),
					'id_bioskop'=>$this->input->post('id_bioskop'),
					'nama_film'=> $this->input->post('nama_film'),
					//'id_jadwal'=> implode(',', array_values($this->input->post('id_jadwal'))),
					'id_jadwal'=> $this->input->post('id_jadwal'),
					'harga' => (int)$this->input->post('harga'),
					'kategori'=> implode('', array_values($this->input->post('kategori'))),
					'sinopsis' => $this->input->post('sinopsis'),
					'kuota' => $this->input->post('kuota'));

		$this->db->trans_start();
		$this->db->update('movie',$update,array('id_movie'=>$update['id_movie']));
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
               return "Query Failed";
           } else {
           	echo $this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success">
		 		<a href="'. base_url('Manager/tambah_movie') .'" class="close" data-dismiss="alert">&times;</a>
		  	    <strong>Success!</strong> Berhasil Diperbarui !!
			    </div>');
			    redirect('Manager/tambah_movie');
           }
	}
	

 }