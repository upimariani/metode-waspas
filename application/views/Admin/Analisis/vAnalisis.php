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
							<p class="m-0 pr-3">Analisis</p>
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
					<a href="<?= base_url('Admin/cAnalisis/create/' . $bulan . '/' . $tahun) ?>" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i>Perbaharui Analisis </a>
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
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
					<div class="card h-100">
						<div class="card-header ">
							<div class="card-title mb-2">
								<h5 class="m-0 me-2">Grafik Hasil Analisis Penerima Bantuan PKH</h5><br>
								<small>Catatan : Nilai yang lebih kecil dari hasil lainnya adalah penduduk yang berkah mendapatkan bantuan.</small>
							</div>
						</div>
						<div class="card-body">
							<canvas id="hasil" height="100"></canvas>
						</div>
					</div>
				</div>
				<div class="col-lg-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Informasi Hasil Analisis</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama Kepala Keluarga</th>
											<th>Periode Bulan</th>
											<th>Periode Tahun</th>
											<th>Hasil</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($analisis as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nik ?></td>
												<td>
													<?= $value->nama_kk ?>
												</td>
												<td><?= $value->per_bulan ?></td>
												<td><?= $value->per_tahun ?></td>
												<td><?= $value->hasil ?></td>

												<td>
													<a href="<?= base_url('Admin/cKriteriaPenduduk/detail_kriteria/' . $value->per_bulan . '/' . $value->per_tahun . '/' . $value->nik) ?>" class="btn btn-outline-success btn-icon-text"> View Kriteria <i class="mdi mdi-eye btn-icon-append"></i></a>
												</td>
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