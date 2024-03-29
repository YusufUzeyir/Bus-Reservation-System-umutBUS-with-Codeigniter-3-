<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Şifremi Değiştir</title>
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
						<div class="card-header">Şifreni değiştir <br> <?php echo $this->session->userdata('resetemail'); ?></div>
						<div class="card-body" align="left">
							<?php echo $this->session->flashdata('pesan'); ?>
							<form action="<?php echo base_url('login/changepassword') ?>" method="post">
								<div class="form-group">
									<input type="password" class="form-control form-control-user" name="password1" placeholder="Yeni Şifre">
									<?php echo form_error('password1'), '<small class="text-danger pl-3">', '</small>'; ?>
									<input type="password" class="form-control form-control-user" name="password2" placeholder="Şifreyi Tekrar Girin">
								</div>
								<button class="btn btn-primary btn-user btn-block">
									Şifreyi Değiştir
								</button>
							</form>
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