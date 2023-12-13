<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>fonts/icomoon/style.css">
	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>css/owl.carousel.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>css/bootstrap.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url('asset/login/') ?>css/style.css">
	<title>Login</title>
</head>

<body>
	<div class="content">
		<div class="container">
			<div class="row justify-content-center">
				<!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
				<div class="col-md-6 contents">
					<div class="row justify-content-center">
						<div class="col-md-12">

							<div class="form-block">
								<div class="mb-4">
									<img style="display:block; margin:auto;" src="<?= base_url('asset/logo.jpg') ?>" />
									<h3>Login <strong>User</strong></h3>

									<p class="mb-4">Silahkan melakukan login untuk mendapatkan hak akses anda</p>
									<?php
									if ($this->session->userdata('error')) {
									?>
										<div class="alert alert-danger">
											<h5>Error!</h5>
											<p><?= $this->session->userdata('error') ?></p>
										</div>
									<?php
									}
									?>
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
								</div>
								<form action="<?= base_url('cLogin')  ?>" method="post">
									<div class="form-group first">
										<label for="username">Username</label>
										<input type="text" name="username" class="form-control" id="username">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

									</div>
									<div class="form-group last mb-4">
										<label for="password">Password</label>
										<input type="password" name="password" class="form-control" id="password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

									</div>
									<input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('asset/login/') ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('asset/login/') ?>js/popper.min.js"></script>
	<script src="<?= base_url('asset/login/') ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/login/') ?>js/main.js"></script>
</body>

</html>