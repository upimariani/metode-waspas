<footer class="footer">
	<div class="d-sm-flex justify-content-center justify-content-sm-between">
		<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
		<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
	</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?= base_url('asset/plus-admin/') ?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('asset/plus-admin/') ?>assets/vendors/select2/select2.min.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/off-canvas.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/hoverable-collapse.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/misc.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/settings.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/file-upload.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/typeahead.js"></script>
<script src="<?= base_url('asset/plus-admin/') ?>assets/js/select2.js"></script>
<script src="<?= base_url('asset/DataTables/') ?>datatables.min.js"></script>
<link href="<?= base_url('asset/DataTables/') ?>datatables.min.css" rel="stylesheet">
<script>
	console.log = function() {}
	$("#bahan_baku").on('change', function() {

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));


		$(".keterangan").html($(this).find(':selected').attr('data-keterangan'));
		$(".keterangan").val($(this).find(':selected').attr('data-keterangan'));

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

		$(".stok").html($(this).find(':selected').attr('data-stok'));
		$(".stok").val($(this).find(':selected').attr('data-stok'));

		$(".deskripsi").html($(this).find(':selected').attr('data-deskripsi'));
		$(".deskripsi").val($(this).find(':selected').attr('data-deskripsi'));


	});
</script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
		$('#myTable2').DataTable();
	});
</script>
<script>
	console.log = function() {}
	$(".bahan_jadi").on('change', function() {

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));


		$(".stok").html($(this).find(':selected').attr('data-stok'));
		$(".stok").val($(this).find(':selected').attr('data-stok'));


	});
</script>
</body>

</html>