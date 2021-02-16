<?php
/**
 * Controller for Pertanyaan
 */

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pertanyaan extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mpertanyaan');
	}

	function index(){
	    if($this->session->userdata('akses')=='1'){
	    	$x['data']=$this->mpertanyaan->tampil_pertanyaan();
			$x['kat']=$this->mpertanyaan->get_kategori();
	        $this->load->view('backend/v_pertanyaan',$x);
	    }else{
	        $this->load->view('backend/404');
	    }
    }

    function export_excel(){
        $tgl_awal = $this->input->post('cari');
        $tgl_akhir = $this->input->post('cari2');
        $semua_pertanyaan = $this->mpertanyaan->toExcelAll();

        $semua_kategori = $this->mpertanyaan->get_kategori();
        $semua_pemohon = $this->mpertanyaan->get_pemohon();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->mergeCells('A1:J1')
                    ->mergeCells('A2:B2')
                    ->mergeCells('C2:J2')
                    ->setCellValue('A1', 'Data Pertanyaan')
                    ->setCellValue('A2', 'Periode')
                    ->setCellValue('C2', ": ".date('j F Y', strtotime($tgl_awal)). " - " .date('j F Y', strtotime($tgl_akhir)))
                    ->setCellValue('A4', 'No')
                    ->setCellValue('B4', 'Kategori')
                    ->setCellValue('C4', 'Nama Pemohon')
                    ->setCellValue('D4', 'Pertanyaan')
                    ->setCellValue('E4', 'Jawaban')
                    ->setCellValue('F4', 'Kontak Eskalasi')
                    ->setCellValue('G4', 'Media')
                    ->setCellValue('H4', 'Tgl Permohanan')
                    ->setCellValue('I4', 'Tgl Selesai')
                    ->setCellValue('J4', 'Status');

        // Set Style
        $spreadsheet->getActiveSheet()->getStyle('A1:J4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:J999')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        $spreadsheet->getActiveSheet()->getStyle('A5:J100')->getAlignment()->setWrapText(true);

        // Set Column Width
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        

        $kolom = 5;
        $nomor = 1;
        foreach ($semua_pertanyaan->result_array() as $s):
            $id = $s['id'];
            $id_kategori = $s['id_kategori'];
            $id_pemohon = $s['id_pemohon'];
            $pertanyaan = $s['pertanyaan'];
            $jawaban = $s['jawaban'];
            $kontak_eskalasi = $s['kontak_eskalasi'];
            $media = $s['media'];
            $tgl_permohonan = $s['tgl_permohonan'];
            $tgl_selesai = $s['tgl_selesai'];
            $status = $s['status'];

            foreach ($semua_kategori->result_array() as $k):
                $id_kat=$k['id_kategori'];
                $nama_kategori=$k['nama_kategori'];

            foreach ($semua_pemohon->result_array() as $p):
                $id_pem=$p['id_pemohon'];
                $nama_pemohon=$p['nama_pemohon'];
            
            if ($id_kat==$id_kategori):

            if ($id_pem==$id_pemohon):

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $nama_kategori)
                        ->setCellValue('C' . $kolom, $nama_pemohon)
                        ->setCellValue('D' . $kolom, $pertanyaan)
                        ->setCellValue('E' . $kolom, $jawaban)
                        ->setCellValue('F' . $kolom, $kontak_eskalasi)
                        ->setCellValue('G' . $kolom, $media)
                        ->setCellValue('H' . $kolom, date('j F Y', strtotime($tgl_permohonan)))
                        ->setCellValue('I' . $kolom, date('j F Y', strtotime($tgl_selesai)))
                        ->setCellValue('J' . $kolom, $status);

            endif;

            endif;

            endforeach;

            endforeach;

            $kolom++;
            $nomor++;

            $styleArray = [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ],
                    ];
            $kolom = $kolom - 1;
            $spreadsheet->getActiveSheet()->getStyle('A4:J'.$kolom)->applyFromArray($styleArray);
        endforeach;

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Pertanyaan_Periode '.date('j F Y', strtotime($tgl_awal)).' - '.date('j F Y', strtotime($tgl_akhir)).'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    function simpan_pertanyaan(){
    	$id_kategori=$this->input->post('id_kategori');
        $id_pemohon=$this->mpertanyaan->get_id_pemohon();
        $nama_pemohon=$this->input->post('nama_pemohon');
        $instansi_asal=$this->input->post('instansi_asal');
        $kontak=$this->input->post('kontak');
    	$pertanyaan=$this->input->post('pertanyaan');
    	$jawaban=$this->input->post('jawaban');
        $kontak_eskalasi=$this->input->post('kontak_eskalasi');
        $media=$this->input->post('media');
        $status=$this->input->post('status');
        $tgl_permohonan=$this->input->post('tgl_permohonan');
        $tgl_selesai=$this->input->post('tgl_selesai');

        $this->mpertanyaan->SimpanPemohon($id_pemohon,$nama_pemohon,$instansi_asal,$kontak);
    	$this->mpertanyaan->SimpanPertanyaan($id_kategori,$id_pemohon,$pertanyaan,$jawaban,$kontak_eskalasi,$media,$status,$tgl_permohonan,$tgl_selesai);
    	echo $this->session->set_flashdata('msg','success');
    	redirect('backend/pertanyaan');
    }

    function update_pertanyaan(){
    	$kode=$this->input->post('kode');
    	$id_kategori=$this->input->post('id_kategori');
    	$pertanyaan=$this->input->post('pertanyaan');
    	$jawaban=$this->input->post('jawaban');
        $kontak_eskalasi=$this->input->post('kontak_eskalasi');
        $media=$this->input->post('media');
        $status=$this->input->post('status');
        $tgl_permohonan=$this->input->post('tgl_permohonan');
        $tgl_selesai=$this->input->post('tgl_selesai');

    	$this->mpertanyaan->update_pertanyaan($kode,$id_kategori,$pertanyaan,$jawaban,$kontak_eskalasi,$media,$status,$tgl_permohonan,$tgl_selesai);
    	echo $this->session->set_flashdata('msg','info');
    	redirect('backend/pertanyaan');
    }

    function hapus_pertanyaan(){
	    if($this->session->userdata('akses')=='1'){
	        $id=$this->input->post('kode');
	        $this->mpertanyaan->hapus_pertanyaan($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/pertanyaan');
	    }else{
	        $this->load->view('backend/404');
	    }
    }

    function detail_pertanyaan($id_pemohon){
        $x['data'] = $this->mpertanyaan->get_id($id_pemohon);
        $x['pemohon'] = $this->mpertanyaan->ambil_id_pemohon($id_pemohon);
        $x['kat']=$this->mpertanyaan->get_kategori();

        $this->load->view('backend/v_detail', $x);
    }
}