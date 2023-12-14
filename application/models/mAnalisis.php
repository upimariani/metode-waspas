<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function periode()
	{
		return $this->db->query("SELECT * FROM `kriteria_penduduk` GROUP BY periode_bulan, periode_tahun")->result();
	}
	public function hapus_data($bulan, $tahun)
	{
		return $this->db->query("DELETE FROM analisis WHERE per_bulan='" . $bulan . "' AND per_tahun='" . $tahun . "';");
	}
	public function select($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('analisis');
		$this->db->join('kriteria_penduduk', 'analisis.id_analisis = kriteria_penduduk.id_analisis', 'left');
		$this->db->join('penduduk', 'penduduk.nik = kriteria_penduduk.nik', 'left');
		$this->db->where('per_bulan', $bulan);
		$this->db->where('per_tahun', $tahun);
		$this->db->group_by('penduduk.nik');
		$this->db->order_by('hasil', 'asc');

		return $this->db->get()->result();
	}
}

/* End of file mAnalisis.php */
