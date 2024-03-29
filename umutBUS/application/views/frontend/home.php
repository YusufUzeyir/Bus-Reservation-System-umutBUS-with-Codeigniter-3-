<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>umut-BUS</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<style type="text/css">
		.combined {
			-webkit-text-stroke: 1px black;
			color: white;
			text-shadow:
				2px 2px 0 #000,
				-1px -1px 0 #000,
				1px -1px 0 #000,
				-1px 1px 0 #000,
				1px 1px 0 #000;
		}

		.border-black {
			color: blue;
			/*border white with light shadow*/
			text-shadow:
				2px 0 0 #000,
				-2px 0 0 #000,
				0 2px 0 #000,
				0 -2px 0 #000,
				1px 1px 0 #000,
				-1px -1px 0 #000,
				1px -1px 0 #000,
				-1px 1px 0 #000,
				1px 1px 5px #000;
		}
	</style>
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="banner-area relative section-gap relative" id="home">
		<div class="container">
			<div style="margin-right:84%; padding-top:6%" class="row fullscreen d-flex align-items-center justify-content-end">
				<div style="background-color:#00224D; padding:20%; border-radius: 10px;">
					<b><a style="font-size: 25px; color:white" href="<?php echo base_url() ?>tiket" text-uppercase">Bilet Ara</a>
					</b>
				</div>

			</div>
		</div>
	</section>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 pb-40 header-text">
					<h1>Neden Bizi Tercih Etmelisiniz</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/ulastirma.png" width="150" height="150" alt="">
						<h4>Ulaştırma Bakanlığı Onaylı
						</h4>
						<p>
							Size daha iyi hizmet verebilmek için ulaştırma baknalığıyle çalışıyoruz.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/tr.png" width="150" height="150" alt="">
						<h4>Türkiyenin Her Yerine Her Zaman</h4>
						<p>
							İstediğiniz şehirden istediğiniz şehire...
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-service">
						<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/eco.png" width="150" height="150" alt="">
						<h4>Cebinize Uygun Fiyatlarımız</h4>
						<p>
							Herkes sevdiğiyle görüşsün diye...
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>