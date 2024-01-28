<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper pb-0">
			<div class="page-header flex-wrap">
				<div class="header-left">
				</div>
				<div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
					<div class="d-flex align-items-center">
						<a href="#">
							<p class="m-0 pr-3">Perhitungan Metode WASPAS</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0"><?php if ($this->session->userdata('level') == '1') {
												echo 'Petugas Desa';
											} else if ($this->session->userdata('level') == '2') {
												echo 'Kasi Kependudukan';
											} else {
												echo 'Kepala Desa';
											} ?></p>
						</a>
					</div>
				</div>
			</div>
			<?php
			if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success">
					<h5>Sukses!</h5>
					<p><?= $this->session->userdata('success') ?></p>
				</div>
			<?php
			}
			?>




			<?php
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



			?>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Variabel Penduduk</h4>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Variabel 1</th>
											<th>Variabel 2</th>
											<th>Variabel 3</th>
											<th>Variabel 4</th>
										</tr>
									</thead>
									<tbody>
										<?php
										for ($i = 0; $i < sizeof($var_1); $i++) {
										?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $nik[$i] ?></td>
												<td><?= $var_1[$i] ?></td>
												<td><?= $var_2[$i] ?></td>
												<td><?= $var_3[$i] ?></td>
												<td><?= $var_4[$i] ?></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Data Min Kriteria</h4>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>Data Min Variabel 1</th>
											<th>Data Min Variabel 2</th>
											<th>Data Min Variabel 3</th>
											<th>Data Min Variabel 4</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= $data_min_var1 ?></td>
											<td><?= $data_min_var2 ?></td>
											<td><?= $data_min_var3 ?></td>
											<td><?= $data_min_var4 ?></td>

										</tr>


									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Normalisasi Perhitungan</h4>
							<p>Kriteria cost: Xij= (Min ixij)/Xij</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>Data Normalisasi Variabel 1</th>
											<th>Data Normalisasi Variabel 2</th>
											<th>Data Normalisasi Variabel 3</th>
											<th>Data Normalisasi Variabel 4</th>
										</tr>
									</thead>
									<tbody>
										<?php
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
										?>
											<tr>
												<td><?= $nor_v1 ?></td>
												<td><?= $nor_v2 ?></td>
												<td><?= $nor_v3 ?></td>
												<td><?= $nor_v4 ?></td>

											</tr>
										<?php


										}
										?>




									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Nilai Alternatif (Qi) Untuk Menentukan Rangking Terendah</h4>
							<p>Qi = "0,5 " ∑_(j=1)^n〖Xij wj+0,5 Π_(j=1) 〗 〖Xij〗^wj</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>Rumus Persamaan 1</th>
											<th>Rumus Persamaan 2</th>
											<th>Hasil</th>
										</tr>
									</thead>
									<tbody>
										<?php
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
										?>
											<?php
											$pers1 = round(0.5 * (($nor_v1 * 0.35) + ($nor_v2 * 0.35) + ($nor_v3 * 0.15) + ($nor_v4 * 15)), 4);
											$pers2 = round(0.5 * ((pow($nor_v1, 0.35)) * (pow($nor_v2, 0.35)) * (pow($nor_v3, 0.15)) * pow($nor_v4, 0.15)), 4);
											$hasil = $pers1 + $pers2;
											?>
											<tr>
												<td><?= $pers1 ?></td>
												<td><?= $pers2 ?></td>
												<td><?= $hasil ?></td>
											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->