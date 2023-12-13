<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Plus Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/select2/select2.min.css" />
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="<?= base_url('asset/plus-admin/') ?>assets/css/demo_1/style.css" />
	<!-- End layout styles -->
	<link rel="shortcut icon" href="<?= base_url('asset/plus-admin/') ?>assets/images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<!-- partial:../../partials/_sidebar.html -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<ul class="nav">
				<li class="nav-item nav-profile border-bottom">
					<a href="#" class="nav-link flex-column">
						<div class="nav-profile-image">
							<img src="<?= base_url('asset/logo.jpg') ?>" alt="profile" />
							<!--change to offline or busy as needed-->
						</div>
						<div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
							<span class="font-weight-semibold mb-1 mt-2 text-center">Kasi Kependudukan</span>
						</div>
					</a>
				</li>
				<li class="pt-2 pb-1">
					<span class="nav-item-head">Kependudukan</span>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('KasiKependudukan/cPenduduk') ?>">
						<i class="mdi mdi-contacts menu-icon"></i>
						<span class="menu-title">Penduduk</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('KasiKependudukan/cKriteriaPenduduk') ?>">
						<i class="mdi mdi-format-list-bulleted menu-icon"></i>
						<span class="menu-title">Kriteria Penduduk</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('KasiKependudukan/cAnalisis') ?>">
						<i class="mdi mdi-chart-pie menu-icon"></i>
						<span class="menu-title">Analisis</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('cLogin/logout') ?>">
						<i class="mdi mdi-run menu-icon"></i>
						<span class="menu-title">Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:../../partials/_settings-panel.html -->

			<!-- partial -->
			<!-- partial:../../partials/_navbar.html -->
			<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
				<div class="navbar-menu-wrapper d-flex align-items-stretch">
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-chevron-double-left"></span>
					</button>
					<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
						<a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="<?= base_url('asset/plus-admin/') ?>assets/images/logo-mini.svg" alt="logo" /></a>
					</div>

				</div>
			</nav>