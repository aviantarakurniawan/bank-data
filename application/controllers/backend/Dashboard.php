<?php

class Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('mdashboard');
	}

	function index(){
		if($this->session->userdata('akses')=='1'){
			$data['admin'] = $this->mdashboard->get_all_admin()->num_rows();
			$data['pemohon'] = $this->mdashboard->get_all_pemohon()->num_rows();
			$data['pertanyaan'] = $this->mdashboard->get_all_pertanyaan()->num_rows();
			$data['kategori'] = $this->mdashboard->get_all_kategori()->num_rows();
			$this->load->view('backend/v_dashboard', $data);
		}else{
			redirect('administrator');
		}
	}
}