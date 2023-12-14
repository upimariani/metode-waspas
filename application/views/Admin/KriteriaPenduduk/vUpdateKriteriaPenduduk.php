<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Update Data Kriteria Penduduk KK <?= $nik ?></h3>
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
							<form action="<?= base_url('Admin/cKriteriaPenduduk/update/' . $bulan . '/' . $tahun . '/' . $nik) ?>" method="POST" class="forms-sample">
								<?php
								$i = 1;
								foreach ($kriteria_penduduk as $key => $value) {
									if ($value->id_kriteria == '1') {
										$k1 = $value->id_subkriteria;
									} else if ($value->id_kriteria == '2') {
										$k2 = $value->id_subkriteria;
									} else if ($value->id_kriteria == '3') {
										$k3 = $value->id_subkriteria;
									} else if ($value->id_kriteria == '4') {
										$k4 = $value->id_subkriteria;
									}

								?>
									<input type="hidden" name="id_kriteria_penduduk<?= $i++ ?>" value="<?= $value->id_kriteria_penduduk ?>">

								<?php
								}

								?>
								<h6>Kriteria Penilaian</h6>
								<hr>
								<div class="row">
									<div class="form-group col-lg-6">
										<label for="exampleInputEmail3">Bulan</label>
										<input class="form-control" value="<?= $bulan ?>" name="bulan" type="number" placeholder="ex : 6">
										<?= form_error('bulan', '<small class="text-danger">', '</small>') ?>
									</div>
									<div class="form-group col-lg-6">
										<label for="exampleInputEmail3">Tahun</label>
										<input class="form-control" name="tahun" value="<?= $tahun ?>" type="number" placeholder="ex : 2023">
										<?= form_error('tahun', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
								<hr>
								<div class="form-group">
									<label for="exampleInputEmail3">Pendapatan KK</label>
									<select class="form-control" name="kriteria1">
										<option value="">---Pilih Pendapatan KK---</option>
										<?php
										foreach ($kriteria as $key => $value) {
											if ($value->id_kriteria == '1') {
										?>
												<option value="<?= $value->id_subkriteria ?>" <?php if ($value->id_subkriteria == $k1) {
																									echo 'selected';
																								} ?>><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
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
											if ($value->id_kriteria == '2') {

										?>
												<option value="<?= $value->id_subkriteria ?>" <?php if ($value->id_subkriteria == $k2) {
																									echo 'selected';
																								} ?>><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
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
											if ($value->id_kriteria == '4') {

										?>
												<option value="<?= $value->id_subkriteria ?>" <?php if ($value->id_subkriteria == $k4) {
																									echo 'selected';
																								} ?>><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
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
											if ($value->id_kriteria == '3') {
										?>
												<option value="<?= $value->id_subkriteria ?>" <?php if ($value->id_subkriteria == $k3) {
																									echo 'selected';
																								} ?>><?= $value->nama_kriteria ?> | Range. <?= $value->range ?></option>
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