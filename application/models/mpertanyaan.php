<?php
/**
 * Modal for Pertanyaan
 */
class Mpertanyaan extends CI_Model{
	
	function tampil_pertanyaan(){
		$hasil=$this->db->query("select * from data_pertanyaan");
		return $hasil;
	}

	function toExcelAll(){
		$this->db->select("*");
        $this->db->from("data_pertanyaan");
        $this->db->where('tgl_permohonan >=', $this->input->post('cari'));
        $this->db->where('tgl_permohonan <=', $this->input->post('cari2'));
        $getData = $this->db->get();
        if($getData->num_rows() > 0)
        	return $getData;
        else
        	return null;
	}

	function get_kategori(){
		$hasil=$this->db->query("select * from kategori");
		return $hasil;
	}

	function get_pemohon(){
		$hasil=$this->db->query("select * from data_pemohon");
		return $hasil;
	}

	function SimpanPertanyaan($id_kategori,$id_pemohon,$pertanyaan,$jawaban,$kontak_eskalasi,$media,$status,$tgl_permohonan,$tgl_selesai){
		$hasil=$this->db->query("INSERT INTO data_pertanyaan(id_kategori,id_pemohon,pertanyaan,jawaban,kontak_eskalasi,media,status,tgl_permohonan,tgl_selesai) VALUES ('$id_kategori','$id_pemohon','$pertanyaan','$jawaban','$kontak_eskalasi','$media','$status','$tgl_permohonan','$tgl_selesai')");
		return $hasil;
	}

	function SimpanPemohon($id_pemohon,$nama_pemohon,$instansi_asal,$kontak){
		$hasil=$this->db->query("INSERT INTO data_pemohon(id_pemohon,nama_pemohon,instansi_asal,kontak) VALUES ('$id_pemohon','$nama_pemohon','$instansi_asal','$kontak')");
		return $hasil;
	}

	function get_id_pemohon(){
		$q = $this->db->query("SELECT MAX(RIGHT(id_pemohon,4)) AS kd_max FROM data_pertanyaan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return "P".$kd;
	}

	function get_id($id_pemohon){
		$result = $this->db->where('id_pemohon',$id_pemohon)->limit(1)->get('data_pertanyaan');
		if ($result->num_rows() > 0) {
			return $result;
		}else{
			return false;
		}
	}

	function ambil_id_pemohon($id_pemohon){
		$result = $this->db->where('id_pemohon',$id_pemohon)->get('data_pemohon');
		if ($result->num_rows() > 0) {
			return $result;
		}else{
			return false;
		}
	}

	function update_pertanyaan($kode,$id_kategori,$pertanyaan,$jawaban,$kontak_eskalasi,$media,$status,$tgl_permohonan,$tgl_selesai){
		$hasil=$this->db->query("UPDATE data_pertanyaan SET id_kategori='$id_kategori',pertanyaan='$pertanyaan',jawaban='$jawaban',kontak_eskalasi='$kontak_eskalasi',media='$media',status='$status',tgl_permohonan='$tgl_permohonan',tgl_selesai='$tgl_selesai' WHERE id='$kode'");
		return $hasil;
	}

	function hapus_pertanyaan($id){
		$hasil=$this->db->query("delete from data_pertanyaan where id='$id'");
		return $hasil;
	}
}