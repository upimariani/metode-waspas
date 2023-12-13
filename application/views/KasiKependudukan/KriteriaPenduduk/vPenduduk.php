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
							<p class="m-0 pr-3">Kependudukan</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Kasi Kependudukan</p>
						</a>
					</div>
					<a href="<?= base_url('KasiKependudukan/cKriteriaPenduduk/create') ?>" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i> Add Kriteria Penduduk </a>
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
							<h4 class="card-title">Informasi Kriteria Penduduk</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama Kepala Keluarga</th>
											<th>Alamat</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($penduduk as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nik ?></td>
												<td>
													<?= $value->nama_kk ?>
												</td>
												<td><?= $value->alamat ?></td>

												<td>
													<a href="<?= base_url('KasiKependudukan/cKriteriaPenduduk/detail_kriteria/' . $value->nik) ?>" class="btn btn-outline-success btn-icon-text"> View Kriteria <i class="mdi mdi-eye btn-icon-append"></i></a>
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