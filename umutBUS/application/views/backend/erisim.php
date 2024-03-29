<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $title ?></title>
	<link rel="stylesheet"
		href="<?= base_url('assets/frontend/timepicker') ?>/css/bootstrap-material-datetimepicker.css" />
	<?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">
	<?php $this->load->view('backend/include/base_nav'); ?>
	<div class="container-fluid">
		
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Yeni Erişim Ekle</h6>
			</div>
			<div class="card-body">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<form class="user" method="post" action="<?= base_url('backend/login/register') ?>">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="exampleFirstName" name="name"
										value="<?= set_value('name') ?>" placeholder="İsim Soyisim">
									<?= form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
								</div>
								<div class="form-group">
									<input type="email" class="form-control form-control-user" placeholder="Email" name="email"
										value="<?= set_value('email') ?>">
									<?= form_error('email'),'<small class="text-danger pl-3">','</small>'; ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" placeholder="Kullanıcı Adı" name="username"
										value="<?= set_value('username') ?>">
									<?= form_error('username'),'<small class="text-danger pl-3">','</small>'; ?>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" name="password"
											placeholder="Şifre">
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" name="password2"
											placeholder="Şifre Tekrar">
									</div>
								</div>
								<div class="form-group">
									<select class="form-control" name="level">
										<option value="2">Yönetici</option>
										<option value="1">İdare</option>
									</select>
								</div>
								<?= form_error('password'),'<small class="text-danger pl-3">','</small>'; ?>
								<a href="<?= base_url('backend/admin')?>" class="btn btn-danger">Geri git</a>
								<button type="submit" class="btn btn-success float-right">
								Hesap Ekle
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php $this->load->view('backend/include/base_footer'); ?>
		<?php $this->load->view('backend/include/base_js'); ?>

</body>

</html>
