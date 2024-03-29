<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Profilim</title>
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
				<h3 style="color: white;" class="mb-30" align="center">Profilim</h3>
				<div class="row d-flex justify-content-center">
					<div class="col-lg-6">
						<div class="card" align="left">
							<div class="card-header">
								<i class="fas fa-user"></i> Hesap Bilgileri
							</div>
							<div class="card-body" align="left">
								<div class="row">
									<div class="col-sm-8">
										<h5 class="card-title">TC Kimlik Numarası</h5>
										<p class="card-text"><?php echo $profile['no_ktp_musteri'] ?></p>
										<h5 class="card-title">İsim Soyisim</h5>
										<p class="card-text"><?php echo $profile['isim_musteri'] ?></p>
										<h5 class="card-title">Email</h5>
										<p class="card-text"><?php echo $profile['email_musteri'] ?></p>
										<h5 class="card-title">Telefon Numarası</h5>
										<p class="card-text"><?php echo $profile['telefon_musteri'] ?></p>
									</div>
									<div class="col-sm-14">
										<h5 class="card-title">Adres</h5>
										<p class="card-text"><?php echo $profile['adres_musteri'] ?></p>
										<h5 class="card-title">Profil Fotoğrafı</h5>
										<p><img src="<?php echo base_url($profile['img_musteri']) ?>" height="50" width="50"></p>
										<p><a href="<?php echo base_url('profile/changepassword/' . $profile['kd_musteri']) ?>" class="btn btn-primary">Şifre değiştir</a></p>
										<p><button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Hesabı Düzenle</button></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	</section>
	<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Profili Düzenle</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('profile/editprofile') ?>" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-14">
									<div class="row form-group">
										<label for="nama" class="control-label">Kart Numarası</label>
										<input type="text" class="form-control" name="ktp" value="<?php echo $profile['no_ktp_musteri'] ?>">
										<input type="hidden" name="kode" value="<?php echo $profile['kd_musteri'] ?>">
									</div>
									<div class="row form-group">
										<label for="nama" class="control-label">İsim Soyisim</label>
										<input type="text" class="form-control" name="nama" value="<?php echo $profile['isim_musteri'] ?>">
									</div>
									<div class="row form-group">
										<label for="nama" class="control-label">Email</label>
										<input type="email" class="form-control" name="email" value="<?php echo $profile['email_musteri'] ?>">
									</div>
									<div class="row form-group">
										<label for="nama" class="control-label">Telefon Numarası</label>
										<input type="text" class="form-control" name="hp" value="<?php echo $profile['telefon_musteri'] ?>">
									</div>
									<div class="row form-group">
										<label for="nama" class="control-label">Adres</label>
										<input type="text" class="form-control" name="alamat" value="<?php echo $profile['adres_musteri'] ?>">
									</div>
									<div class="row form-group">
										<label for="" class="control-label">Profil Fotoğrafı</label>
										<img src="<?php echo base_url($profile['img_musteri']) ?>" alt="<?php echo $this->session->userdata('ktp') ?>" style="width:150px;height:150px"><input type="file" class="form-control" value="<?php echo base_url($this->session->userdata('nama_lengkap')) ?>" name="img">
									</div>
								</div>
							</div>
						</div>
				</div>
				<button class="btn btn-danger" data-dismiss="modal">Kapat</button>
				<button type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>