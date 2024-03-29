<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Yönetici Girişi</title>

	<link href="<?= base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="<?= base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-xl-5 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row justify-content-center">
							<div class="col-lg-11">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4"><i class="fas fa-bus"></i>Yönetici Giriş Paneli</h1>
									</div>
									<form class="user" method="post" action="<?= base_url('backend/login/cekuser') ?>">
										<div class="form-group">
											<input required="" type="text" class="form-control form-control-user" name="username"
												aria-describedby="emailHelp" placeholder="Kullanıcı Adı">
										</div>
										<div class="form-group">
											<input required="" type="password" class="form-control form-control-user" name="password"
												placeholder="Şifre">
										</div>
										<button type="submit" class="btn btn-success btn-block">
											Giriş Yap
										</button>
									</form>
									<a style="font-size: 25px; color:dark-blue;margin-left:35%" href="<?php echo base_url('login') ?>"text-uppercase">Geri Git</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?= "<script>".$this->session->flashdata('message')."</script>"?>
	<script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

	<script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>
</body>

</html>
