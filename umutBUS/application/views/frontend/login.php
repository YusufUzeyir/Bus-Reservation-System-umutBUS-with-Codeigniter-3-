<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Giriş Yap</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body class="">
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="generic-banner">
		<div class="container">
			<div class="row height align-items-center justify-content-center">
				<div class="col-lg-5">
					<div class="card card-login mx-auto mt-10">
						<div class="card-header">Müşteri Giriş Paneli</div>
						<div class="card-body" align="left">
							<?php echo $this->session->flashdata('pesan'); ?>
							<form action="<?php echo base_url() ?>login/cekuser" method="post">
								<div class="form-group">
									<div class="form-label-group">
										<input type="text" id="username" name="username" class="form-control" placeholder="Kullanıcı Adı/Email" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="form-label-group">
										<input type="password" name="password" class="form-control" placeholder="Şifre" required="required">
									</div>
								</div>
								<div class="form-group">
									<div class="checkbox">
										<label>
											<input type="checkbox" value="remember-me">
											Beni Hatırla
										</label>
									</div>
								</div>
								<button class="btn btn-success btn-block">Giriş Yap</button>
							</form>
							<div class="text-center">
								<p><a class="d-block mt-3" href="<?php echo base_url() ?>login/register">Üye Ol</a>
									<hr>
									<b><a class="d-block mt-3" style="font-size:15px;" href="<?php echo base_url() ?>backend/login">Admin Girişi</a></b>
									<a class="d-block small" href="<?php echo base_url() ?>login/sifreunuttum">Şifremi Unuttum</a>
								</p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>