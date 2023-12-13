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
							<p class="m-0 pr-3">Cetak Laporan Hasil Analisis</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Kepala Desa</p>
						</a>
					</div>
					<a href="<?= base_url('KepalaDesa/cLaporan/cetak') ?>" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-cloud"></i>Cetak Laporan </a>
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