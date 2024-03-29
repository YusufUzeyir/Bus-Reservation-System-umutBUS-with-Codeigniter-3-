<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Şifre Değiştir</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<style type="text/css">
		.text-block {
			position: absolute;
			bottom: 20px;
			right: 20px;
			background-color: black;
			color: white;
			padding-left: 20px;
			padding-right: 20px;
		}
	</style>
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="generic-banner relative">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30" align="center">Şifre Değiştirme</h3>
				<div class="row d-flex justify-content-center">
					<div class="col-lg-6">
						<div class="card" align="left">
							<div class="card-header">
								<i class="fas fa-key"></i> Şifre
							</div>
							<div class="card-body">
								<form ction="<?php echo base_url('profile/changepassword') ?>" method="post">
									<?php echo $this->session->flashdata('gagal'); ?>
									<div class="form-group">
										<div class="form-label-group">
											<input type="password" class="form-control" name="currentpassword" placeholder="Önceki Şifre">
											<?php echo form_error('currentpassword'), '<small class="text-danger pl-3">', '</small>'; ?>
										</div>

									</div>
									<div class="form-group">
										<div class="form-label md-5">
											<input type="password" class="form-control" required="" name="new_password1" placeholder="Yeni Şifre"><?php echo form_error('new_password1'), '<small class="text-danger pl-3">', '</small>'; ?>
										</div>

									</div>
									<div class="form-group">
										<div class="form-label md-5">
											<input type="password" class="form-control" required="" name="new_password2" placeholder="Tekrar Yeni Şifre">
										</div>
									</div>
									<a class="btn btn-danger" href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>">Geri Git</a>
									<button type="submit" class="btn btn-primary pull-right">Şifreyi Değiştir</button>
								</form>
							</div>
						</div>
					</div>
				</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>