<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAuth');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('vLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$auth = $this->mAuth->Auth($username, $password);
			if ($auth) {

				$array = array(
					'id' => $auth->id_user,
					'level' => $auth->level_user
				);

				$this->session->set_userdata($array);

				if ($auth->level_user == '1') {
					redirect('Admin/cUser');
				} else if ($auth->level_user == '2') {
					redirect('Admin/cPenduduk');
				} else if ($auth->level_user == '3') {
					redirect('Admin/cAnalisis');
				}
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Salah!!!');
				redirect('cLogin');
			}
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!!!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
