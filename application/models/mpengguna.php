<?php
class Mpengguna extends CI_Model{

	function simpan_pass($id,$user,$pass){
        $query=$this->db->query("update admin set username='$user',password=md5('$pass') where idadmin='$id'");
        return $query;
    }
    function ganti_pass($u){
        $query=$this->db->query("select * from admin where username='$u'");
        return $query;
    }

    function hapus_user($id){
        $query=$this->db->query("delete from admin where idadmin='$id'");
        return $query;
    }

    function edit_user($id,$nama,$username,$password,$level){
        $query=$this->db->query("update admin set nama='$nama',username='$username',password=md5('$password'),level='$level' where idadmin='$id'");
        return $query;
    }

    function update_user_with_img($kode,$nama,$username,$password,$level,$gambar){
        $query=$this->db->query("update admin set nama='$nama',username='$username',password=md5('$password'),level='$level',photo='$gambar' where idadmin='$kode'");
        return $query;
    }

    function simpan_user($nama,$username,$password,$level,$gambar){
        $query=$this->db->query("insert into admin(nama,username,password,level,photo)values('$nama','$username',md5('$password'),'$level','$gambar')");
        return $query;
    }
    function pengguna(){
        $query=$this->db->query("SELECT idadmin,nama,username,password,IF(level='1','Admin','Operator') AS level,photo FROM admin");
        return $query;
    }

}