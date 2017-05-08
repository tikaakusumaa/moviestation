<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TSaldo extends CI_Model {

	public function transaksi_list(){
		$Man = $this->session->userdata('kd_Manager');
		$sql = $this->db->query("select id_withdrawal, tanggal, MR.id, MR.first_name, PL.nama, TW.jumlah, TW.status FROM transaksi_withdrawal AS TW, manager_register AS MR, penyedia_layanan AS PL WHERE MR.id = TW.id_manager AND TW.id_admin = PL.id_admin AND TW.id_manager = '$Man'");

		foreach($sql->result()as $row)
		{
			if($row->status=='1'){
				$row->status='Accepted';
			}
			else{
				$row->status='pending';
			}
		}

		return $sql;
	}

	public function transaksi_Pending(){
		$Man = $this->session->userdata('kd_Manager');
		$sql = $this->db->query("select id_withdrawal, tanggal, MR.id, MR.first_name, PL.nama, TW.jumlah, TW.status FROM transaksi_withdrawal AS TW, manager_register AS MR, penyedia_layanan AS PL WHERE MR.id = TW.id_manager AND TW.id_admin = PL.id_admin AND TW.id_manager = '$Man' AND TW.status = 0");

		return $sql;
	}

	public function ReportNow(){
		$sql = $this->db
					->query("
							SELECT
								TW.`id_withdrawal`,TW.`tanggal`,TW.`waktu`,MR.`first_name` as manajer,PL.`nama` as pengirim,TW.`jumlah`
							FROM
								transaksi_withdrawal as TW,
								manager_register as MR,
								penyedia_layanan as PL
							WHERE
								TW.`id_admin` = PL.`id_admin` AND
								MR.`id` = TW.`id_manager`AND
								DATE(tanggal) = DATE(NOW());
							");
		return $sql;
	}

	public function ReportMonth(){
		$sql = $this->db
					->query("
							SELECT
								TW.`id_withdrawal`,TW.`tanggal`,TW.`waktu`,MR.`first_name` as manajer,PL.`nama` as pengirim,TW.`jumlah`
							FROM
								transaksi_withdrawal as TW,
								manager_register as MR,
								penyedia_layanan as PL
							WHERE
								TW.`id_admin` = PL.`id_admin` AND
								MR.`id` = TW.`id_manager`AND
								MONTH(tanggal) = MONTH(NOW());
							");
		return $sql;
	}

	public function ReportWeek(){
		$sql = $this->db
					->query("
							SELECT
								TW.`id_withdrawal`,TW.`tanggal`,TW.`waktu`,MR.`first_name` as manajer,PL.`nama` as pengirim,TW.`jumlah`
							FROM
								transaksi_withdrawal as TW,
								manager_register as MR,
								penyedia_layanan as PL
							WHERE
								TW.`id_admin` = PL.`id_admin` AND
								MR.`id` = TW.`id_manager`AND
								WEEKOFYEAR(tanggal) = WEEKOFYEAR(NOW());
							");
		return $sql;
	}

	public function SUM($tabel,$where,$field){
		$this->db->select_sum($field);
		$this->db->where($where);
		$query = $this->db->get($tabel)->result();
		return $query[0]->jumlah;
	}

	
}
