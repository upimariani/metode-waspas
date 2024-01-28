<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSubKriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKriteria');
	}


	//kriteria
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

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Kriteria/vCreateKriteria');
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_user' => '1',
				'nama_kriteria' => $this->input->post('nama')
			);
			$this->mKriteria->insert($data);
			$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
			redirect('Admin/cSubKriteria');
		}
	}
	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Kriteria', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kriteria' => $this->mKriteria->edit($id)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Kriteria/vUpdateKriteria', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'nama_kriteria' => $this->input->post('nama')
			);
			$this->mKriteria->update($id, $data);
			$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
			redirect('Admin/cSubKriteria');
		}
	}
	public function delete($id)
	{
		$this->mKriteria->delete($id);
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
		redirect('Admin/cSubKriteria');
	}

	//sub kriteria--------------------------------------------------------------------------------------
	public function subkriteria($id_kriteria)
	{
		$data = array(
			'kriteria' => $this->mKriteria->select_subkriteria($id_kriteria),
			'id_kriteria' => $id_kriteria
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/SubKriteria/vKriteria', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createsubkriteria($id_kriteria)
	{
		$this->form_validation->set_rules('range', 'Range', 'required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'id_kriteria' => $id_kriteria
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/SubKriteria/vCreateKriteria', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'id_kriteria' => $id_kriteria,
				'range' => $this->input->post('range'),
				'bobot' => $this->input->post('bobot')
			);
			$this->mKriteria->insert_subkriteria($data);
			$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
			redirect('Admin/cSubKriteria/subkriteria/' . $id_kriteria);
		}
	}
	public function updatesubkriteria($id, $id_subkriteria)
	{
		$this->form_validation->set_rules('range', 'Range', 'required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'kriteria' => $this->mKriteria->edit_subkriteria($id_subkriteria)
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/SubKriteria/vUpdateKriteria', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$data = array(
				'range' => $this->input->post('range'),
				'bobot' => $this->input->post('bobot')
			);
			$this->mKriteria->update_subkriteria($id_subkriteria, $data);
			$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
			redirect('Admin/cSubKriteria/subkriteria/' . $id);
		}
	}
	public function deletesubkriteria($id, $id_subkriteria)
	{
		$this->mKriteria->delete_subkriteria($id_subkriteria);
		$this->session->set_flashdata('success', 'Data Kriteria Berhasil Disimpan!');
		redirect('Admin/cSubKriteria/subkriteria/' . $id);
	}
}

/* End of file cSubKriteria.php */
