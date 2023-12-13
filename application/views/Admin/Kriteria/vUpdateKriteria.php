<!-- partial -->
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">Update Data User</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page"> User </li>
					</ol>
				</nav>
			</div>
			<div class="row">

				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form action="<?= base_url('Admin/cKriteria/update/' . $kriteria->id_kriteria) ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">Nama Kriteria</label>
									<input type="text" name="nama" value="<?= $kriteria->nama_kriteria ?>" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama Kriteria" />
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Range</label>
									<input type="text" name="range" value="<?= $kriteria->range ?>" class="form-control" id="exampleInputEmail3" placeholder="Masukkan Range" />
									<?= form_error('range', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">Bobot</label>
									<input type="number" name="bobot" value="<?= $kriteria->bobot ?>" class="form-control" id="exampleInputPassword4" placeholder="Masukkan Bobot" />
									<?= form_error('bobot', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputCity1">Type Kriteria</label>
									<select name="type" class="form-control">
										<option value="">---Pilih Type Kriteria---</option>
										<option value="1" <?php if ($kriteria->type_kriteria == '1') {
																echo 'selected';
															} ?>>Pendapatan KK</option>
										<option value="2" <?php if ($kriteria->type_kriteria == '2') {
																echo 'selected';
															} ?>>Jumlah Tanggungan Anak</option>
										<option value="3" <?php if ($kriteria->type_kriteria == '3') {
																echo 'selected';
															} ?>>Penerima Bantuan Lain</option>
										<option value="4" <?php if ($kriteria->type_kriteria == '4') {
																echo 'selected';
															} ?>>Kondisi Rumah</option>
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