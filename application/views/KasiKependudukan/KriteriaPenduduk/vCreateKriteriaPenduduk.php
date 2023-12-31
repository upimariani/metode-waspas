<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Tambah Data Kriteria Penduduk</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page"> Penduduk </li>
					</ol>
				</nav>
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
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form action="<?= base_url('KasiKependudukan/cKriteriaPenduduk/create') ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">NIK</label>
									<select class="form-control" name="nik">
										<option value="">---Pilih Karyawan---</option>
										<?php
										foreach ($karyawan as $key => $value) {
											if (!$value->periode_bulan) {
										?>
												<option value="<?= $value->nik ?>"><?= $value->nama_kk ?> | NIK. <?= $value->nik ?></option>
										<?php
											}
										}
										?>
									</select>
									<?= form_error('nik', '<small class="text-danger">', '</small>') ?>
								</div>
								<hr>
								<h6>Kriteria Penilaian</h6>
								<hr>
								<div class="form-group">
									<label for="exampleInputEmail3">Pendapatan KK</label>
									<select class="form-control" name="kriteria1">
										<option value="">---Pilih Pendapatan KK---</option>
										<?php
										foreach ($kriteria as $key => $value) {
											if ($value->type_kriteria == '1') {

										?>
												<option value="<?= $value->id_kriteria ?>"><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
										<?php
											}
										}
										?>
									</select>
									<?= form_error('kriteria1', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Jumlah Tanggungan Anak</label>
									<select class="form-control" name="kriteria2">
										<option value="">---Pilih Kriteria Tanggungan Anak---</option>
										<?php
										foreach ($kriteria as $key => $value) {
											if ($value->type_kriteria == '2') {

										?>
												<option value="<?= $value->id_kriteria ?>"><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
										<?php
											}
										}
										?>
									</select>
									<?= form_error('kriteria2', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Penerimaan Bantuan Lain</label>
									<select class="form-control" name="kriteria3">
										<option value="">---Pilih Penerimaan Bantuan Lain---</option>
										<?php
										foreach ($kriteria as $key => $value) {
											if ($value->type_kriteria == '3') {

										?>
												<option value="<?= $value->id_kriteria ?>"><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
										<?php
											}
										}
										?>
									</select>
									<?= form_error('kriteria3', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Kondisi Rumah</label>
									<select class="form-control" name="kriteria4">
										<option value="">---Pilih Kondisi Rumah---</option>
										<?php
										foreach ($kriteria as $key => $value) {
											if ($value->type_kriteria == '4') {

										?>
												<option value="<?= $value->id_kriteria ?>"><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
										<?php
											}
										}
										?>
									</select>
									<?= form_error('kriteria4', '<small class="text-danger">', '</small>') ?>
								</div>


								<button type="submit" class="btn btn-primary mr-2"> Submit </button>
								<button class="btn btn-light">Cancel</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->