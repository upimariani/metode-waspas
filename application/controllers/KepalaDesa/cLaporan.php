<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}

	public function index()
	{
		$data = array(
			'analisis' => $this->mAnalisis->select()
		);
		$this->load->view('KepalaDesa/Layout/head');
		$this->load->view('KepalaDesa/vLaporan', $data);
		$this->load->view('KepalaDesa/Layout/footer');
	}
	public function cetak()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Lampiran', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 12);

		$pdf->Cell(200, 10, 'Berita Acara Bantuan PKH', 0, 1, 'L');
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(200, 10, 'Nomor : ', 0, 1, 'L');
		$pdf->Cell(200, 10, 'Tanggal :' . date('d/m/Y'), 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 13);
		$pdf->Cell(185, 10, 'LAPORAN HASIL REKOMENDASI KK UNTUK BANTUAN PKH', 0, 1, 'C');




		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
		$pdf->Cell(35, 7, 'NIK', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nama KK', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Alamat', 1, 0, 'C');
		$pdf->Cell(30, 7, 'No Telepon', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Hasil', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$hasil =  $this->mAnalisis->select();
		foreach ($hasil as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $value->nik, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->nama_kk, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->alamat, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->no_hp, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->hasil, 1, 1, 'R');
		}



		$pdf->Output();
	}
}

/* End of file cLaporan.php */
