<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function hapus_data()
	{
		return $this->db->query("TRUNCATE TABLE analisis;");
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('analisis');
		$this->db->join('kriteria_penduduk', 'analisis.id_analisis = kriteria_penduduk.id_analisis', 'left');
		$this->db->join('penduduk', 'penduduk.nik = kriteria_penduduk.nik', 'left');
		$this->db->group_by('penduduk.nik');
		$this->db->order_by('hasil', 'asc');

		return $this->db->get()->result();
	}
}

/* End of file mAnalisis.php */
