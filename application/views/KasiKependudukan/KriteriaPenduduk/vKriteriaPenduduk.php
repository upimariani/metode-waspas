<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper pb-0">
			<div class="page-header flex-wrap">
				<div class="header-left">
					<h2>Detail Kriteria Penduduk NIK <?= $nik ?></h2>
				</div>
				<div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
					<div class="d-flex align-items-center">
						<a href="#">
							<p class="m-0 pr-3">Kriteria Penilaian Kependudukan</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Kasi Kependudukan</p>
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
							<h4 class="card-title">Informasi Kriteria Penilaian Penduduk</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Kriteria</th>
											<th>Nama Range</th>
											<th>Bobot</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($kriteria_penduduk as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_kriteria ?></td>
												<td>
													<?= $value->range ?>
												</td>
												<td><?= $value->bobot ?></td>
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