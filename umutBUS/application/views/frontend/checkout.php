<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elemefav.png">
	<meta name="author" content="colorlib">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Rezervasyon</title>
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
				<div class="col-lg-7">
					<div class="card">
						<div class="card-header">
							<i class="fas fa-info-circle"></i> Rezervasyonlar Tamamlandı, Ödemeye Devam Edin
						</div>
						<div class="card-body" align="center">
							<p class="card-text">Bilet Rezervasyon Kodu:</p>
							<h1 class="card-title"><b><?php echo $tiket; ?></b></h1>
							<p><img src="<?php echo base_url('assets/frontend/upload/qrcode/' . $tiket) ?>.png"></p>
							<a href="<?php echo base_url('assets/frontend/upload/qrcode/' . $tiket) ?>.png" class="btn btn-danger" download>Qr Kodunu İndir</a>
							<a href="<?php echo base_url('tiket/payment/' . $tiket) ?>" class="btn btn-success">Ödeme Kontrol</a>
							<br>
							<p class="card-text">Ödeme İşlemine Devam Edebilmek İçin Lütfen Rezervasyon Kodunuzu ve QR Kodunuzu Kaydedin.</p>
						</div>
					</div>
				</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>