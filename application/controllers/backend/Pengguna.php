<?php
/**
 * Controller for Admin
 */
class Pengguna extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mpengguna');
        $this->load->library('upload');
	}

	function index(){
		if($this->session->userdata('akses')=='1'){
        	$x['data']=$this->mpengguna->pengguna();
            $this->load->view('backend/v_pengguna',$x);
        }else{
            $this->load->view('backend/404');
        }
	}

	function simpan_pengguna(){
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 300;
                $config['height']= 300;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $nama=$this->input->post('nama');
                $username=$this->input->post('user');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $level=$this->input->post('level');

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backend/pengguna');
                }else{
                    $this->mpengguna->simpan_user($nama,$username,$password,$level,$gambar);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('backend/pengguna'); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/pengguna');
        }
                     
        }else{
            redirect('backend/pengguna');
        }
    }

    function update_pengguna(){
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 300;
                $config['height']= 300;
                $config['new_image']= './assets/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $nama=$this->input->post('nama');
                $username=$this->input->post('user');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $level=$this->input->post('level');

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backend/pengguna');
                }else{
                    $this->mpengguna->update_user_with_img($kode,$nama,$username,$password,$level,$gambar);
                    echo $this->session->set_flashdata('msg','info');
                    redirect('backend/pengguna'); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/pengguna');
        }
                     
        }else{
            $id=$this->input->post('kode');
            $nama=$this->input->post('nama');
            $username=$this->input->post('user');
            $password=$this->input->post('pass');
            $password2=$this->input->post('pass2');
            $level=$this->input->post('level');

            if($password <> $password2){
                echo $this->session->set_flashdata('msg','error');
                redirect('backend/pengguna');
            }else{
                $this->mpengguna->edit_user($id,$nama,$username,$password,$level);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/pengguna'); 
            }
        }
    }
    
    function hapus_user(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->mpengguna->hapus_user($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/pengguna'); 
        }else{
            $this->load->view('backend/404');
        }
    }
}