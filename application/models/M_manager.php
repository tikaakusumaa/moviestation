<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manager extends CI_Model {

function Masukkan_Saya($Nama,$password){
			
			$condition = "id_admin = '" . $Nama . "' and password ='" . $password . "' ";
			$this->db->select('*');
			$this->db->from('penyedia_layanan');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
			return true;
			} else {
			return false;
			}
		}
}
