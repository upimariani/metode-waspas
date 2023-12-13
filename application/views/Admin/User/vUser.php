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
							<p class="m-0 pr-3">User</p>
						</a>
						<a class="pl-3 mr-4" href="#">
							<p class="m-0">Petugas Desa</p>
						</a>
					</div>
					<a href="<?= base_url('Admin/cUser/create') ?>" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
						<i class="mdi mdi-plus-circle"></i> Add User </a>
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
							<h4 class="card-title">Informasi User</h4>
							</p>
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th>User</th>
											<th>Nama User</th>
											<th>Alamat</th>
											<th>No Telepon</th>
											<th>Username</th>
											<th>Password</th>
											<th>Level User</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($user as $key => $value) {
										?>
											<tr>
												<td class="py-1">
													<?php
													if ($value->level_user == '1') {
													?>
														<img src="<?= base_url('asset/plus-admin/') ?>assets/images/faces-clipart/pic-1.png" alt="image" />
													<?php
													} else {
													?>
														<img src="<?= base_url('asset/plus-admin/') ?>assets/images/faces-clipart/pic-3.png" alt="image" />
													<?php
													}
													?>


												</td>
												<td><?= $value->nama ?></td>
												<td>
													<?= $value->alamat ?>
												</td>
												<td><?= $value->no_hp ?></td>
												<td><?= $value->username ?></td>
												<td><?= $value->password ?></td>
												<td><?php if ($value->level_user == '1') {
													?>
														<span class="badge badge-success">Petugas Desa</span>
													<?php
													} else if ($value->level_user == '2') {
													?>
														<span class="badge badge-warning">Kasi Kependudukan</span>
													<?php
													} else if ($value->level_user == '3') {
													?>
														<span class="badge badge-info">Kepala Desa</span>
													<?php
													}
													?>
												</td>
												<td>
													<a href="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" class="btn btn-outline-secondary btn-icon-text"> Edit <i class="mdi mdi-file-check btn-icon-append"></i></a>
													<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-outline-warning btn-icon-text"><i class="mdi mdi-reload btn-icon-prepend"></i> Hapus </a>
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