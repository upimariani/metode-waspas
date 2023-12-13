<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKriteria extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('kriteria_penilaian', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		$this->db->where('id_kriteria', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_kriteria', $id);
		$this->db->update('kriteria_penilaian', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_kriteria', $id);
		$this->db->delete('kriteria_penilaian');
	}
}

/* End of file mKriteriaPenilaian.php */
