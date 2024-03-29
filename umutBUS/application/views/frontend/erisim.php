<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Kayıt Ol</title>
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
				<div class="col-lg-8">
					<div class="card ">
						<div class="card-header">
							<i class="fas fa-user"></i> Müşteri Kaydı
						</div>
						<div class="card-body">
							<form action="<?php echo base_url() ?>login/register" method="post">
								<div class="form-group">
									<div class="form-group">
										<div class="form-label-group">
											<input type="text" name="name" class="form-control" required="" placeholder="Ad Soyad" value="<?php echo set_value('name') ?>">
											<?php echo form_error('name'), '<small class="text-danger pl-3">', '</small>'; ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-label-group">
												<input type="text" name="email" class="form-control" required="" placeholder="Email" value="<?php echo set_value('email') ?>">
												<?php echo form_error('email'), '<small class="text-danger pl-3">', '</small>'; ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-label-group">
												<input type="number" id="nomor" name="nomor" class="form-control" required="" placeholder="İletişim Numarası" value="<?php echo set_value('nomor') ?>">
												<?php echo form_error('nomor'), '<small class="text-danger pl-3">', '</small>'; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="username">Adres</label>
									<div class="form-label-group">
										<textarea class="form-control" name="alamat"><?php echo set_value('alamat') ?></textarea>
										<?php echo form_error('alamat'), '<p class="text-danger pl-3">', '</p>'; ?>
									</div>
								</div>
								<div class="form-group">
									<div class="form-label-group">
										<input type="text" id="username" name="username" class="form-control" required="" placeholder="Kullanıcı adı">
										<?php echo form_error('username'), '<small class="text-danger pl-3">', '</small>'; ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" name="password1" placeholder="Şifre">
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" name="password2" placeholder="Şifreyi Tekrar Gir">
									</div>
								</div>
								<?php echo form_error('password1'), '<small class="text-danger pl-3">', '</small>'; ?>
								<button class="btn btn-info btn-block">Kayıt Ol</button>
							</form>
							<hr>
							<div class="text-center">
								<p>Zaten Hesabım var? <a class="" href="<?php echo base_url() ?>login">Giriş Yap</a></p>
							</div>
						</div>
					</div>
				</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>