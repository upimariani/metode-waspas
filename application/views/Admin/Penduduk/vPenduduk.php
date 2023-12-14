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
							<p class="m-0"><?php if ($this->session->userdata('level') == '1') {
												echo 'Petugas Desa';
											} else if ($this->session->userdata('level') == '2') {
												echo 'Kasi Kependudukan';
											} else {
												echo 'Kepala Desa';
											} ?></p>
						</a>
					</div>
					<a href="<?= base_url('Admin/cPenduduk/create') ?>" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i> Add Penduduk </a>
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
							<h4 class="card-title">Informasi Penduduk</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>NIK</th>
											<th>Nama Kepala Keluarga</th>
											<th>Alamat</th>
											<th>Nama Ayah</th>
											<th>Nama Ibu</th>
											<th>Jumlah Anak</th>
											<th>Tanggal Lahir</th>
											<th>No Telepon</th>
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
												<td><?= $value->nama_ayah ?></td>
												<td><?= $value->nama_ibu ?></td>
												<td><?= $value->jml_anak ?></td>
												<td><?= $value->tgl_lahir ?></td>
												<td><?= $value->no_hp ?></td>

												<td>
													<a href="<?= base_url('Admin/cPenduduk/update/' . $value->nik) ?>" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="mdi mdi-file-check btn-icon-append"></i></a>
													<a href="<?= base_url('Admin/cPenduduk/delete/' . $value->nik) ?>" class="btn btn-outline-warning btn-icon-text"><i class="mdi mdi-reload btn-icon-prepend"></i> Hapus </a>
													<a href="<?= base_url('Admin/cKriteriaPenduduk/periode/' . $value->nik) ?>" class="btn btn-outline-info btn-icon-text"><i class="mdi mdi-eye btn-icon-prepend"></i> Detail Kriteria </a>
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