<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Update Data Penduduk</h3>
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
							<form action="<?= base_url('Admin/cPenduduk/update/' . $penduduk->nik) ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">NIK</label>
									<input type="text" name="nik" value="<?= $penduduk->nik ?>" class="form-control" id="exampleInputName1" placeholder="Masukkan NIK" />
									<?= form_error('nik', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Nama Kepala Keluarga</label>
									<input type="text" name="nama_kk" value="<?= $penduduk->nama_kk ?>" class="form-control" id="exampleInputEmail3" placeholder="Masukkan Kepala Keluarga" />
									<?= form_error('nama_kk', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Alamat</label>
									<input type="text" name="alamat" value="<?= $penduduk->alamat ?>" class="form-control" id="exampleInputPassword4" placeholder="Masukkan Alamat" />
									<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Nama Ayah</label>
									<input type="text" name="nama_ayah" value="<?= $penduduk->nama_ayah ?>" class="form-control" id="exampleInputPassword4" placeholder="Masukkan Nama Ayah" />
									<?= form_error('nama_ayah', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Nama Ibu</label>
									<input type="text" name="nama_ibu" class="form-control" value="<?= $penduduk->nama_ibu ?>" id="exampleInputPassword4" placeholder="Masukkan Nama Ibu" />
									<?= form_error('nama_ibu', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Jumlah Anak</label>
									<input type="number" name="jml" class="form-control" value="<?= $penduduk->jml_anak ?>" id="exampleInputPassword4" placeholder="Masukkan Jumlah Anak" />
									<?= form_error('jml', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control" value="<?= $penduduk->tgl_lahir ?>" id="exampleInputPassword4" placeholder="Masukkan Tanggal Lahir" />
									<?= form_error('tgl_lahir', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">No Telepon</label>
									<input type="number" name="no_hp" class="form-control" id="exampleInputPassword4" value="<?= $penduduk->no_hp ?>" placeholder="Masukkan No Telepon" />
									<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
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