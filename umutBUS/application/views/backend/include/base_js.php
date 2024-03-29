<script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>

<script src="<?= base_url() ?>assets/backend/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/demo/datatables-demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<?= "<script>".$this->session->flashdata('message')."</script>"?>
<script type="text/javascript">
	$(document).ready(function () {
		$(".preloader").fadeOut();
	});
  
	$(":submit").click(function (e) {
		window.addEventListener("beforeunload", function (event) {
			$(".preloader").show();
		});
	});

</script>

