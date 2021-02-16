<?php
/**
 * Model for Kategori
 */
class Mkategori extends CI_Model{
	
	function hapus_kategori($id){
        $query=$this->db->query("delete from kategori where id_kategori='$id'");
        return $query;
    }

    function edit_kategori($id,$nama_kategori){
        $query=$this->db->query("update kategori set nama_kategori='$nama_kategori' where id_kategori='$id'");
        return $query;
    }
    function simpan_kategori($nama_kategori){
        $query=$this->db->query("insert into kategori (nama_kategori)values('$nama_kategori')");
        return $query;
    }
    function kategori(){
        $query=$this->db->query("SELECT * FROM kategori");
        return $query;
    }
}