<?php
class Mlogin extends CI_Model{

    function cekadmin($u,$p){
        $hasil=$this->db->query("select * from admin where username='$u'and password=md5('$p')");
        return $hasil;
    }
  
}
