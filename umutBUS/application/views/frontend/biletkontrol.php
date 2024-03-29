<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Bilet Kontrol</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-6">
					<div class="card wobble">
						<div class="card-header">
							<i class="fas fa-ticket"></i> Biletlerimi Kontrol Et
						</div>
						<div class="card-body">
							<form action="<?php echo base_url() ?>tiket/cekorder" method="post">
								<div class="form-group">
									<label for="exampleInputEmail1">Rezervasyon kodunuzu girin</label>
									<input type="text" id="" class="form-control" id="" name="kodetiket" placeholder="Bilet Kodu" required="">
								</div>
								<button type="submit" class="btn btn-success pull-right">Ara </button>
							</form>
						</div>
					</div>
				</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>