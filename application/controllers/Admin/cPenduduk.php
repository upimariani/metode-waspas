<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPenduduk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPenduduk');
	}

	public function index()
	{
		$data = array(
			'penduduk' => $this->mPenduduk->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Penduduk/vPenduduk', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{

		$this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[penduduk.nik]|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('jml', 'Jumlah Anak', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Penduduk/vCreatePenduduk');
			$this->load->view('Admin/Layout/footer');
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
			$this->mPenduduk->insert($data);
			$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
			redirect('Admin/cPenduduk');
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
				'penduduk' => $this->mPenduduk->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Penduduk/vUpdatePenduduk', $data);
			$this->load->view('Admin/Layout/footer');
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
			$this->mPenduduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
			redirect('Admin/cPenduduk');
		}
	}
	public function delete($id)
	{
		$this->mPenduduk->delete($id);
		$this->session->set_flashdata('success', 'Data Penduduk Berhasil Disimpan!');
		redirect('Admin/cPenduduk');
	}
}

/* End of file cPenduduk.php */
