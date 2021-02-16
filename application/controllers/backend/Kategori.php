<?php
/**
 * Controller for Kategori
 */
class Kategori extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mkategori');
	}

	function index(){
		if($this->session->userdata('akses')=='1'){
        	$x['data']=$this->mkategori->kategori();
            $this->load->view('backend/v_kategori',$x);
        }else{
            $this->load->view('backend/404');
        }
	}

	function simpan_kategori(){
        if($this->session->userdata('akses')=='1'){
            $nama_kategori=$this->input->post('nama_kategori');
            $this->mkategori->simpan_kategori($nama_kategori);
            echo $this->session->set_flashdata('msg','success');
            redirect('backend/kategori');
        }else{
            $this->load->view('backend/404');
        }
    }

    function update_kategori(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $nama_kategori=$this->input->post('nama_kategori');
            $this->mkategori->edit_kategori($id,$nama_kategori);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/kategori');
        }else{
            $this->load->view('backend/404');
        }
    }

    function hapus_kategori(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->mkategori->hapus_kategori($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/kategori');
        }else{
            $this->load->view('backend/404');
        }
    }
}