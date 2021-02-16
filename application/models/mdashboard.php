<?php
/**
 * Model for dashboard
 */
class Mdashboard extends CI_Model{
	
	function get_all_admin(){
		$hasil = $this->db->query("SELECT * FROM admin");
		return $hasil;
	}

	function get_all_pemohon(){
		$hasil = $this->db->query("SELECT * FROM pemohon");
		return $hasil;
	}

	function get_all_pertanyaan(){
		$hasil = $this->db->query("SELECT * FROM data_pertanyaan");
		return $hasil;
	}

	function get_all_kategori(){
		$hasil = $this->db->query("SELECT * FROM kategori");
		return $hasil;
	}
}