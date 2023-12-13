<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKriteriaPenduduk extends CI_Model
{
	public function view_penduduk()
	{
		$this->db->select('*, penduduk.nik');
		$this->db->from('penduduk');
		$this->db->join('kriteria_penduduk', 'penduduk.nik = kriteria_penduduk.nik', 'left');
		$this->db->group_by('penduduk.nik');
		return $this->db->get()->result();
	}
	public function penduduk()
	{
		$this->db->select('*');
		$this->db->from('kriteria_penduduk');
		$this->db->join('penduduk', 'kriteria_penduduk.nik = penduduk.nik', 'left');
		$this->db->group_by('kriteria_penduduk.nik');

		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('kriteria_penduduk', $data);
	}
	public function select($nik)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penduduk');
		$this->db->join('kriteria_penilaian', 'kriteria_penduduk.id_kriteria = kriteria_penilaian.id_kriteria', 'left');
		$this->db->join('penduduk', 'kriteria_penduduk.nik = penduduk.nik', 'left');
		$this->db->where('penduduk.nik', $nik);
		return $this->db->get()->result();
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penduduk');
		$this->db->where('nik', $id);
		return $this->db->get()->row();
	}
	public function update($id, $data)
	{
		$this->db->where('nik', $id);
		$this->db->update('kritera_penduduk', $data);
	}
	public function delete($id)
	{
		$this->db->where('nik', $id);
		$this->db->delete('kritera_penduduk');
	}
}

/* End of file mKriteriaPenduduk.php */
