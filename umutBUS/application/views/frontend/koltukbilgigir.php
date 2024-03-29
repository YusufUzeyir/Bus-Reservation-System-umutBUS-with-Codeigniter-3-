<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Son Kotrol</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<form action="<?php echo base_url() ?>tiket/gettiket/" method="post">
						<input type="hidden" name="tgl" value="<?php echo $tglberangkat ?>">

						<?php $i = 1;
						foreach ($kursi as $row) { ?>
							<div class="card mb-5">
								<div class="card-header">
									<i class="fas fa-id-card"></i> Koltuk Numarası <?php echo $row; ?>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="CN">Yolcu Adı</label>
										<input type="text" id="" class="form-control" id="" name="nama[]" placeholder="<?php echo $row ?> No'lu koltukta oturanın adı" required>
										<input type="hidden" name="kursi[]" value="<?php echo $row ?>">
									</div>
									<div class="form-group">
										<select name="tahun[]" class="form-control js-example-basic-single" required>
											<option value="" selected disabled="">Yolcu Yaşı</option>
											<?php
											$thn_skr = 90;
											for ($x = $thn_skr; $x >= 1; $x--) {
											?>
												<option value="<?php echo $x ?>"><?php echo $x ?> Yaş</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
						<?php } ?>
				</div>
				<div class="col-lg-5">
					<div class="card mb-5">
						<div class="card-header">
							<i class="fas fa-user"></i> Müşteri Bilgileri
						</div>
						<div class="card-body">
							<div class='form-group'>
								<div class='col-sm-12'>
									<input name='no_ktp' required="" maxlength='64' class='form-control required' placeholder='ID card number' type='text' title='ID number must be filled.' value="<?php echo $this->session->userdata('ktp') ?>">
								</div>
							</div>
							<div class='form-group'>
								<div class='col-sm-12'>
									<input name='nama_pemesan' required="" maxlength='64' class='form-control required' placeholder='Customer Name' type='text' title='Müşteri adı gerekli' value="<?php echo $this->session->userdata('nama_lengkap') ?>">
								</div>
							</div>
							<div class='form-group'>
								<div class='col-sm-12'>
									<input name='hp' required="" maxlength='16' class='form-control required' placeholder='Telefon Numarası' type='text' title='Gerekli Alan' value="<?php echo $this->session->userdata('telpon') ?>">
								</div>
							</div>
							<div class='form-group'>
								<div class='col-sm-12'>
									<textarea name='alamat' cols='20' rows='3' id='alamat' required="" maxlength='256' class='form-control required' placeholder='Adres' title='Address gerekli.'><?php echo $this->session->userdata('alamat') ?></textarea>
								</div>
							</div>
							<div class='form-group'>
								<div class='col-sm-12'>
									<input name='email' required="" maxlength='64' class='form-control' placeholder='Email' type='text' value="<?php echo $this->session->userdata('email') ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="card-header">
							<i class="fas fa-dollar-sign"></i> Ödeme Yap
						</div>
						<div class="card-body">
							<form action="<?php echo base_url() ?>tiket/cektiketmu" method="post">
								<div class='form-group'>
									<a href='javascript:history.back()' class='btn btn-default pull-left'>İptal Et</a>
									<button class="btn btn-success pull-right">Ödeme Yap</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.js-example-basic-single').select2();
		});
	</script>
</body>

</html>