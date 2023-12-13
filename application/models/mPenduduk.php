<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPenduduk extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('penduduk', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('penduduk');
		$this->db->where('nik', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('nik', $id);
		$this->db->update('penduduk', $data);
	}
	public function delete($id)
	{
		$this->db->where('nik', $id);
		$this->db->delete('penduduk');
	}
}

/* End of file mPenduduk.php */
