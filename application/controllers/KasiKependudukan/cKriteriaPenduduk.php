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
		$this->load->view('KasiKependudukan/Layout/head');
		$this->load->view('KasiKependudukan/KriteriaPenduduk/vPenduduk', $data);
		$this->load->view('KasiKependudukan/Layout/footer');
	}
	public function detail_kriteria($nik)
	{
		$data = array(
			'nik' => $nik,
			'kriteria_penduduk' => $this->mKriteriaPenduduk->select($nik)
		);
		$this->load->view('KasiKependudukan/Layout/head');
		$this->load->view('KasiKependudukan/KriteriaPenduduk/vKriteriaPenduduk', $data);
		$this->load->view('KasiKependudukan/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('kriteria1', 'Nama Kepala Keluarga', 'required');
		$this->form_validation->set_rules('kriteria2', 'Alamat', 'required');
		$this->form_validation->set_rules('kriteria3', 'Nama Ayah', 'required');
		$this->form_validation->set_rules('kriteria4', 'Nama Ibu', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'karyawan' => $this->mKriteriaPenduduk->view_penduduk(),
				'kriteria' => $this->mKriteria->select()
			);
			$this->load->view('KasiKependudukan/Layout/head');
			$this->load->view('KasiKependudukan/KriteriaPenduduk/vCreateKriteriaPenduduk', $data);
			$this->load->view('KasiKependudukan/Layout/footer');
		} else {

			for ($i = 1; $i <= 4; $i++) {
				$data = array(
					'id_kriteria' => $this->input->post('kriteria' . $i),
					'id_analisis' => '0',
					'nik' => $this->input->post('nik'),
					'periode_bulan' => date('m'),
					'periode_tahun' => date('Y'),
					'kriteria_detail' => '-'
				);
				$this->mKriteriaPenduduk->insert($data);
			}

			$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
			redirect('KasiKependudukan/cKriteriaPenduduk');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('jml', 'Jumlah Anak', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'penduduk' => $this->mKriteriaPenduduk->edit($id)
			);
			$this->load->view('KasiKependudukan/Layout/head');
			$this->load->view('KasiKependudukan/Penduduk/vUpdateKriteriaPenduduk', $data);
			$this->load->view('KasiKependudukan/Layout/footer');
		} else {
			$data = array(
				'nik' => $this->input->post('nik'),
				'nama_kk' => $this->input->post('nama_kk'),
				'alamat' => $this->input->post('alamat'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'jml_anak' => $this->input->post('jml'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'no_hp' => $this->input->post('no_hp')
			);
			$this->mKriteriaPenduduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
			redirect('KasiKependudukan/cKriteriaPenduduk');
		}
	}
	public function delete($id)
	{
		$this->mKriteriaPenduduk->delete($id);
		$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
		redirect('KasiKependudukan/cKriteriaPenduduk');
	}
}

/* End of file cKriteriaPenduduk.php */
