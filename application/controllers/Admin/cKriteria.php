<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKriteria');
	}

	public function index()
	{
		$data = array(
			'kriteria' => $this->mKriteria->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Kriteria/vKriteria', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
		$this->form_validation->set_rules('range', 'Range', 'required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Kriteria/vCreateKriteria');
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_kriteria' => $this->input->post('nama'),
				'range' => $this->input->post('range'),
				'bobot' => $this->input->post('bobot'),
				'type_kriteria' => $this->input->post('type')
			);
			$this->mKriteria->insert($data);
			$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
			redirect('Admin/cKriteria');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');
		$this->form_validation->set_rules('range', 'Range', 'required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kriteria' => $this->mKriteria->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Kriteria/vUpdateKriteria', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_kriteria' => $this->input->post('nama'),
				'range' => $this->input->post('range'),
				'bobot' => $this->input->post('bobot'),
				'type_kriteria' => $this->input->post('type')
			);
			$this->mKriteria->update($id, $data);
			$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
			redirect('Admin/cKriteria');
		}
	}
	public function delete($id)
	{
		$this->mKriteria->delete($id);
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
		redirect('Admin/cKriteria');
	}
}

/* End of file cKriteria.php */
