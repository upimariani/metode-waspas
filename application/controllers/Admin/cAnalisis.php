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
			'periode' => $this->mAnalisis->periode()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Analisis/vPeriode', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function view_analisis($bulan, $tahun)
	{
		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'analisis' => $this->mAnalisis->select($bulan, $tahun)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Analisis/vAnalisis', $data);
		$this->load->view('Admin/Layout/footer', $data);
	}
	public function create($bulan, $tahun)
	{
		//bismillah perhitungan
		$this->mAnalisis->hapus_data($bulan, $tahun);

		//membuat variabel
		$karyawan = $this->db->query("SELECT * FROM `penduduk`")->result();
		foreach ($karyawan as $key => $value) {
			$variabel = $this->db->query("SELECT * FROM `kriteria_penduduk` JOIN kriteria_penilaian ON kriteria_penduduk.id_subkriteria=kriteria_penilaian.id_subkriteria WHERE nik='" . $value->nik . "' AND periode_bulan='" . $bulan . "' AND periode_tahun='" . $tahun . "'")->result();
			foreach ($variabel as $key => $item) {

				if ($item->id_kriteria == '1') {
					$nik[] = $item->nik;
					$var_1[] = $item->bobot;
				} else if ($item->id_kriteria == '2') {
					$var_2[] = $item->bobot;
				} else if ($item->id_kriteria == '3') {
					$var_3[] = $item->bobot;
				} else if ($item->id_kriteria == '4') {
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
				'per_bulan' => $bulan,
				'per_tahun' => $tahun,
				'hasil' => $hasil
			);
			$this->db->insert('analisis', $analisis);

			//update kriteria penduduk
			$id_analisis = $this->db->query("SELECT MAX(id_analisis) as id FROM `analisis`")->row();
			$data = array(
				'id_analisis' => $id_analisis->id
			);
			$this->db->where('nik', $nik[$i]);
			$this->db->where('periode_bulan', $bulan);
			$this->db->where('periode_tahun', $tahun);
			$this->db->update('kriteria_penduduk', $data);
		}
		$this->session->set_flashdata('success', 'Data Analisis Berhasil Disimpan!');
		redirect('Admin/cAnalisis');
	}
	public function perhitungan($bulan, $tahun)
	{
		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'periode' => $this->mAnalisis->periode()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Analisis/vPerhitungan', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cAnalisis.php */
