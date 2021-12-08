<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model');
        $this->load->library('pdf');

    }

	public function index()
	{
        // require_once APPPATH.'third_party/fpdf/fpdf.php';
		
		$pdf = new FPDF('l','mm','A4');
		$pdf->AddPage();
		
		// $CI =& get_instance();
		// $CI->fpdf = $pdf;

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'LAPORAN DATA PELAJAR SMK YAPIIM INDRAMAYU',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'TAHUN 2021',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pelajar = $this->Model->get_pelajar()->result();
        $pdf->Cell(35,7,'NIS',1,0,'C');
        $pdf->Cell(45,7,'NAMA SISWA',1,0,'C');
        $pdf->Cell(35,7,'KELAS',1,0,'C');
        $pdf->Cell(65,7,'JURURSAN',1,0,'C');
        $pdf->Cell(55,7,'E-MAIL',1,0,'C');
        $pdf->Cell(40,7,'Ket',1,1,'C');
        $pdf->SetFont('Arial','',12);

        foreach($pelajar as $row){
            $pdf->Cell(35,6,$row->nis,1,0,'C');
            $pdf->Cell(45,6,$row->nama_siswa,1,0,'');
            $pdf->Cell(35,6,$row->kelas,1,0,'C');
            $pdf->Cell(65,6,$row->jurusan,1,0,'');
            $pdf->Cell(55,6,$row->email,1,0,'');
            $pdf->Cell(40,6,'',1,1,'');
        }

        $pdf->Output();
	}

    public function cetak (){

    }
}


