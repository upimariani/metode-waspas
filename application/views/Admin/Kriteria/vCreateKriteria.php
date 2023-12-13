<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Tambah Data Kriteria Penilaian</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page"> User </li>
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
							<form action="<?= base_url('Admin/cKriteria/create') ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">Nama Kriteria</label>
									<input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama Kriteria" />
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Range</label>
									<input type="text" name="range" class="form-control" id="exampleInputEmail3" placeholder="Masukkan Range" />
									<?= form_error('range', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Bobot</label>
									<input type="number" name="bobot" class="form-control" id="exampleInputPassword4" placeholder="Masukkan Bobot" />
									<?= form_error('bobot', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputCity1">Type Kriteria</label>
									<select name="type" class="form-control">
										<option value="">---Pilih Type Kriteria---</option>
										<option value="1">Pendapatan KK</option>
										<option value="2">Jumlah Tanggungan Anak</option>
										<option value="3">Penerima Bantuan Lain</option>
										<option value="4">Kondisi Rumah</option>
									</select>
									<?= form_error('type', '<small class="text-danger">', '</small>') ?>
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