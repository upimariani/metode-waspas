<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKriteria extends CI_Model
{

	//kriteria
	public function insert($data)
	{
		$this->db->insert('kriteria', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where('id_kriteria', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('id_kriteria', $id);
		$this->db->update('kriteria', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_kriteria', $id);
		$this->db->delete('kriteria');
	}

	//sub kriteria
	public function insert_subkriteria($data)
	{
		$this->db->insert('kriteria_penilaian', $data);
	}
	public function select_subkriteria($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		$this->db->join('kriteria', 'kriteria_penilaian.id_kriteria = kriteria.id_kriteria', 'left');
		$this->db->where('kriteria.id_kriteria', $id);

		return $this->db->get()->result();
	}
	public function edit_subkriteria($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penilaian');
		$this->db->where('id_subkriteria', $id);
		return $this->db->get()->row();
	}
	public function update_subkriteria($id, $data)
	{
		$this->db->where('id_subkriteria', $id);
		$this->db->update('kriteria_penilaian', $data);
	}
	public function delete_subkriteria($id)
	{
		$this->db->where('id_subkriteria', $id);
		$this->db->delete('kriteria_penilaian');
	}

	//penilaian penduduk
	public function kriteria_penduduk()
	{
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->join('kriteria_penilaian', 'kriteria.id_kriteria = kriteria_penilaian.id_kriteria', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mKriteriaPenilaian.php */
