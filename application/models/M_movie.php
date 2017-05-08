<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_movie extends CI_Model {

	public function get_tabel($tabel){
		$a = $this->db->get($tabel);
		return $a;
	}

	public function get_enum($post){
		$a="";
		foreach($this->input->post($post) as $day){
		$a .= $day.',';
		}
		return $a;
	}

	public function get_movie($kode_bioskop){
		$query = $this->db->query("SELECT movie.id_movie, movie.nama_film, jam_pemutaran.jam, bioskop.nama_bioskop FROM movie, jam_pemutaran, bioskop WHERE movie.id_jadwal = jam_pemutaran.id_jadwal AND bioskop.id_bioskop = movie.id_bioskop AND bioskop.id_bioskop= '$kode_bioskop'");
		return $query;
	}


	public function first_value_where($field,$field_kondisi1,$field_kondisi2,$tabel){
		$id = $this -> db
	       -> select($field)
	       -> where($field_kondisi1, $field_kondisi2)
	       -> limit(1)
	       -> get($tabel)
	       -> result_array()[0][$field];

	       return $id;
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function buat_kode($field,$tabelmu,$kod,$kondisi)
	{
		$this->db->select('RIGHT('.$field.',3) as kode', FALSE);
		$this->db->order_by($field,'DESC');
		$this->db->limit(1);
		$this->db->where($kondisi);

		$query = $this->db->get($tabelmu);
		//cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() <> 0){
		//jika kode ternyata sudah ada.
		$data = $query->row();
		$kode = intval($data->kode) + 1;
		}else{
		//jika kode belum ada
		$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = $kod.$kodemax;
		return $kodejadi;
	}

	public function clean($string) {
   		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	public function get_movieku($idbioskopmu){
		$query = $this
                ->db
                ->where('id_bioskop', $idbioskopmu)
                ->get('movie');

     $data = array();

     foreach ($query->result() as $row)
     {
         $data = $row->nama_film;
     }
     return $data;
	}
}
