<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKriteriaPenduduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKriteriaPenduduk');
		$this->load->model('mPenduduk');
		$this->load->model('mKriteria');
	}

	public function index()
	{
		$data = array(
			'penduduk' => $this->mKriteriaPenduduk->penduduk()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/KriteriaPenduduk/vPenduduk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function periode($nik)
	{
		$data = array(
			'nik' => $nik,
			'periode' => $this->mKriteriaPenduduk->periode_kriteria($nik)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/KriteriaPenduduk/vPeriodeKriteria', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function detail_kriteria($bulan, $tahun, $nik)
	{
		$data = array(
			'nik' => $nik,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'kriteria_penduduk' => $this->mKriteriaPenduduk->select($bulan, $tahun, $nik)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/KriteriaPenduduk/vKriteriaPenduduk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create($nik)
	{
		$this->form_validation->set_rules('kriteria1', 'Pendapatan Kepala keluarga', 'required');
		$this->form_validation->set_rules('kriteria2', 'Jumlah Tanggungan Anak', 'required');
		$this->form_validation->set_rules('kriteria3', 'Penerima Bantuan Lain', 'required');
		$this->form_validation->set_rules('kriteria4', 'Kondisi Rumah', 'required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'nik' => $nik,
				'karyawan' => $this->mKriteriaPenduduk->view_penduduk(),
				'kriteria' => $this->mKriteria->kriteria_penduduk()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/KriteriaPenduduk/vCreateKriteriaPenduduk', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			for ($i = 1; $i <= 4; $i++) {
				$data = array(
					'id_subkriteria' => $this->input->post('kriteria' . $i),
					'id_analisis' => '0',
					'nik' => $nik,
					'periode_bulan' => $this->input->post('bulan'),
					'periode_tahun' => $this->input->post('tahun')
				);
				$this->mKriteriaPenduduk->insert($data);
			}


			$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
			redirect('Admin/cKriteriaPenduduk/detail_kriteria/' . $bulan . '/' . $tahun . '/' . $nik);
		}
	}
	public function update($bulan, $tahun, $nik)
	{
		$this->form_validation->set_rules('kriteria1', 'Pendapatan Kepala keluarga', 'required');
		$this->form_validation->set_rules('kriteria2', 'Jumlah Tanggungan Anak', 'required');
		$this->form_validation->set_rules('kriteria3', 'Penerima Bantuan Lain', 'required');
		$this->form_validation->set_rules('kriteria4', 'Kondisi Rumah', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'nik' => $nik,
				'bulan' => $bulan,
				'tahun' => $tahun,
				'kriteria_penduduk' => $this->mKriteriaPenduduk->edit($bulan, $tahun, $nik),
				'kriteria' => $this->mKriteria->kriteria_penduduk()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/KriteriaPenduduk/vUpdateKriteriaPenduduk', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			for ($i = 1; $i <= 4; $i++) {
				$id_kriteria_penduduk = $this->input->post('id_kriteria_penduduk' . $i);
				// echo $id_kriteria_penduduk;
				$data = array(
					'id_subkriteria' => $this->input->post('kriteria' . $i),
					'periode_bulan' => $this->input->post('bulan'),
					'periode_tahun' => $this->input->post('tahun')
				);
				$this->mKriteriaPenduduk->update($id_kriteria_penduduk, $data);
			}

			$this->session->set_flashdata('success', 'Data Penduduk Berhasil Diperbaharui!');
			redirect('Admin/cKriteriaPenduduk/detail_kriteria/' . $bulan . '/' . $tahun . '/' . $nik);
		}
	}
	public function delete($nik)
	{
		$this->mKriteriaPenduduk->delete($nik);
		$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
		redirect('Admin/cPenduduk');
	}
}

/* End of file cKriteriaPenduduk.php */
