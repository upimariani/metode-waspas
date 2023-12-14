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
							<h4 class="card-title">Informasi Periode Analisis</h4>

							<form action="<?= base_url('KepalaDesa/cLaporan/cetak') ?>" method="POST">
								<div class="col-lg-6">
									<div class="form-group">
										<?php
										$date_analisis = $this->db->query("SELECT * FROM `analisis` GROUP BY per_bulan, per_tahun")->result();
										?>

										<select class="form-control" id="date" required>
											<option value="">---Pilih Periode Analisis</option>
											<?php
											foreach ($date_analisis as $key => $value) {
											?>
												<option data-bulan="<?= $value->per_bulan ?>" data-tahun="<?= $value->per_tahun ?>">Bulan ke- <?= $value->per_bulan ?> Tahun <?= $value->per_tahun ?></option>
											<?php
											}
											?>
										</select>

									</div>
								</div>
								<input type="hidden" class="bulan" name="bulan">
								<input type="hidden" class="tahun" name="tahun">
								<div class="col-lg-6">
									<button type="submit" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
										<i class="mdi mdi-cloud"></i>Cetak Laporan </button>
								</div>
							</form>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Periode Bulan</th>
											<th>Periode Tahun</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($periode as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->periode_bulan ?></td>
												<td>
													<?= $value->periode_tahun  ?>
												</td>

												<td>
													<a href="<?= base_url('Admin/cAnalisis/view_analisis/' . $value->periode_bulan . '/' . $value->periode_tahun) ?>" class="btn btn-outline-success btn-icon-text"> View Data <i class="mdi mdi-eye btn-icon-append"></i></a>
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