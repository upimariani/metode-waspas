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
							<form action="<?= base_url('Admin/cUser/update/' . $user->id_user) ?>" method="POST" class="forms-sample">
								<div class="form-group">
									<label for="exampleInputName1">Nama User</label>
									<input type="text" name="nama" class="form-control" value="<?= $user->nama ?>" id="exampleInputName1" placeholder="Masukkan Nama User" />
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail3">Alamat</label>
									<input type="text" name="alamat" class="form-control" value="<?= $user->alamat ?>" id="exampleInputEmail3" placeholder="Masukkan Alamat" />
									<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword4">No Telepon</label>
									<input type="number" name="no_hp" class="form-control" value="<?= $user->no_hp ?>" id="exampleInputPassword4" placeholder="Masukkan No Telepon" />
									<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Username</label>
											<input type="text" name="username" class="form-control" value="<?= $user->username ?>" id="exampleInputCity1" placeholder="Masukkan Username" />
											<?= form_error('username', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputCity1">Password</label>
											<input type="text" name="password" class="form-control" value="<?= $user->password ?>" id="exampleInputCity1" placeholder="Masukkan Password" />
											<?= form_error('password', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputCity1">Level User</label>
									<select name="level" class="form-control">
										<option value="">---Pilih Level User---</option>
										<option value="1" <?php if ($user->level_user == '1') {
																echo 'selected';
															} ?>>Petugas Desa</option>
										<option value="2" <?php if ($user->level_user == '2') {
																echo 'selected';
															} ?>>Kasi Kependudukan</option>
										<option value="3" <?php if ($user->level_user == '3') {
																echo 'selected';
															} ?>>Kepala Desa</option>

									</select>
									<?= form_error('level', '<small class="text-danger">', '</small>') ?>
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