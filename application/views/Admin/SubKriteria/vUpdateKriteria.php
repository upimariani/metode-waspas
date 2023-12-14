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
							<form action="<?= base_url('Admin/cSubKriteria/updatesubkriteria/' . $kriteria->id_kriteria . '/' . $kriteria->id_subkriteria) ?>" method="POST" class="forms-sample">

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

								<button type="submit" class="btn btn-primary mr-2"> Submit </button>
								<button class="btn btn-light">Cancel</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->