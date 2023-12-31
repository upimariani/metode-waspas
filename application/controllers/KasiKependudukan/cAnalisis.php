<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}

	public function index()
	{
		$data = array(
			'analisis' => $this->mAnalisis->select()
		);
		$this->load->view('KasiKependudukan/Layout/head');
		$this->load->view('KasiKependudukan/Analisis/vAnalisis', $data);
		$this->load->view('KasiKependudukan/Layout/footer');
	}
	public function create()
	{
		//bismillah perhitungan
		$this->mAnalisis->hapus_data();

		//membuat variabel
		$karyawan = $this->db->query("SELECT * FROM `penduduk`")->result();
		foreach ($karyawan as $key => $value) {
			$variabel = $this->db->query("SELECT * FROM `kriteria_penduduk` JOIN kriteria_penilaian ON kriteria_penduduk.id_kriteria=kriteria_penilaian.id_kriteria WHERE nik='" . $value->nik . "'")->result();
			foreach ($variabel as $key => $item) {

				if ($item->type_kriteria == '1') {
					$nik[] = $item->nik;
					$var_1[] = $item->bobot;
				} else if ($item->type_kriteria == '2') {
					$var_2[] = $item->bobot;
				} else if ($item->type_kriteria == '3') {
					$var_3[] = $item->bobot;
				} else if ($item->type_kriteria == '4') {
					$var_4[] = $item->bobot;
				}
			}
		}

		$data_min_var1 = min($var_1);
		$data_min_var2 = min($var_2);
		$data_min_var3 = min($var_3);
		$data_min_var4 = min($var_4);

		echo '<br>';
		$nor_v1 = 0;
		$nor_v2 = 0;
		$nor_v3 = 0;
		$nor_v4 = 0;
		for ($i = 0; $i < sizeof($var_1); $i++) {
			$result = uniqid();
			//normalisasi
			$nor_v1 = $data_min_var1 / $var_1[$i];
			$nor_v2 = $data_min_var2 / $var_2[$i];
			$nor_v3 = $data_min_var3 / $var_3[$i];
			$nor_v4 = $data_min_var4 / $var_4[$i];

			$pers1 = round(0.5 * (($nor_v1 * 0.35) + ($nor_v2 * 0.35) + ($nor_v3 * 0.15) + ($nor_v4 * 15)), 4);
			$pers2 = round(0.5 * ((pow($nor_v1, 0.35)) * (pow($nor_v2, 0.35)) * (pow($nor_v3, 0.15)) * pow($nor_v4, 0.15)), 4);
			$hasil = $pers1 + $pers2;
			// echo $hasil;
			// echo ' | ';
			// echo $nik[$i];
			// echo '<br>';



			//simpan data di tabel analisis
			$analisis = array(
				'per_bulan' => date('m'),
				'per_tahun' => date('Y'),
				'hasil' => $hasil
			);
			$this->db->insert('analisis', $analisis);

			//update kriteria penduduk
			$id_analisis = $this->db->query("SELECT MAX(id_analisis) as id FROM `analisis`")->row();
			$data = array(
				'id_analisis' => $id_analisis->id
			);
			$this->db->where('nik', $nik[$i]);
			$this->db->update('kriteria_penduduk', $data);
		}
		$this->session->set_flashdata('success', 'Data Analisis Berhasil Disimpan!');
		redirect('KasiKependudukan/cAnalisis');
	}
}

/* End of file cAnalisis.php */
