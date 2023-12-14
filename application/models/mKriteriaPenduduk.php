<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKriteriaPenduduk extends CI_Model
{
	public function periode_kriteria($nik)
	{
		return $this->db->query("SELECT * FROM `kriteria_penduduk` JOIN kriteria_penilaian ON kriteria_penduduk.id_subkriteria=kriteria_penilaian.id_subkriteria WHERE nik='" . $nik . "' GROUP BY periode_bulan, periode_tahun")->result();
	}
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
	public function select($bulan, $tahun, $nik)
	{
		$this->db->select('*');
		$this->db->from('kriteria_penduduk');
		$this->db->join('kriteria_penilaian', 'kriteria_penduduk.id_subkriteria = kriteria_penilaian.id_subkriteria', 'left');
		$this->db->join('kriteria', 'kriteria.id_kriteria = kriteria_penilaian.id_kriteria', 'left');
		$this->db->join('penduduk', 'kriteria_penduduk.nik = penduduk.nik', 'left');
		$this->db->where('penduduk.nik', $nik);
		$this->db->where('periode_bulan', $bulan);
		$this->db->where('periode_tahun', $tahun);

		return $this->db->get()->result();
	}
	public function edit($bulan, $tahun, $nik)
	{
		return $this->db->query("SELECT * FROM `kriteria_penduduk` JOIN kriteria_penilaian ON kriteria_penduduk.id_subkriteria=kriteria_penilaian.id_subkriteria JOIN kriteria ON kriteria_penilaian.id_kriteria=kriteria.id_kriteria WHERE nik='" . $nik . "' AND periode_bulan='" . $bulan . "' AND periode_tahun='" . $tahun . "'")->result();
	}
	public function update($id, $data)
	{
		$this->db->where('id_kriteria_penduduk', $id);
		$this->db->update('kriteria_penduduk', $data);
	}
	public function delete($id)
	{
		$this->db->where('nik', $id);
		$this->db->delete('kriteria_penduduk');
	}
}

/* End of file mKriteriaPenduduk.php */
