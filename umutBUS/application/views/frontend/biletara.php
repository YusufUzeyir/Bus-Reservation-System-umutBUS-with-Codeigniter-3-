<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">


			<div class="card mb-5">
				<div class="card-header">
					<i class="fas fa-search"></i> Bilet Ara
				</div>
				<div class="card-body">

					<form action="<?php echo base_url() ?>tiket/rotalistele?>" method="get">
						<div class="form-group">
							<label for="exampleInputEmail1">Tarih Gir</label>
							<input placeholder="Tarih Seç" type="text" class="form-control datepicker" name="tanggal" required="">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nereden</label>
							<select name="asal" class="form-control js-example-basic-single" required>
								<option value="" selected disabled="">Kalkış Noktası</option>
								<?php foreach ($asal as $row) { ?>
									<option value="<?php echo $row['kd_terminal'] ?>">
										<?php echo strtoupper($row['kota_varis']) ?>
										- <br><?php echo $row['terminal_varis']; ?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nereye</label>
							<select name="tujuan" class="form-control js-example-basic-single">
								<option value="" selected disabled="">Varış Noktası</option>
								<?php foreach ($tujuan as $row) { ?>
									<option value="<?php echo $row['kota_varis'] ?>">
										<?php echo strtoupper($row['kota_varis']); ?></option>
								<?php } ?>
							</select>
						</div>
						<a href="<?php echo base_url() ?>tiket" class="btn btn-danger pull-left">Geri Dön </a>
						<button type="submit" class="btn btn-primary pull-right">Ara </button>
					</form>
				</div>
			</div>



	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>

	<?php $this->load->view('frontend/include/base_js'); ?>
	<script type="text/javascript">
		$(function() {
			var date = new Date();
			date.setDate(date.getDate());

			$(".datepicker").datepicker({
				startDate: date,
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.js-example-basic-single').select2();
		});
	</script>
</body>

</html>