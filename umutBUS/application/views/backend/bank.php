<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $title ?></title>
	<?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">
	<?php $this->load->view('backend/include/base_nav'); ?>
	<div class="container-fluid">
		<h1 class="h5 text-gray-800">Banka Listesi</h1>
		
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalTujuan">			Banka Ekle
				</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th>Banka Kodu</th>
								<th>Banka Adı</th>
								<th>Hesap Numarası</th>
								<th>Banka Kısaltması</th>
								<th>İşlem</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1 ; foreach ($bank as $row ) { ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $row['kd_bank']; ?></td>
								<td><?= $row['nama_bank']; ?></td>
								<td><?= $row['nomrek_bank']; ?></td>
								<td><?= $row['nasabah_bank']; ?></td>
								<td align="center"><a href="<?= base_url('backend/bank/viewbank/'.$row['kd_bank']) ?>"
										class="btn btn btn-info">Görünüm</a></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	<?php $this->load->view('backend/include/base_footer'); ?>
	<div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Banka Ekle</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url()?>backend/bank/tambahbank" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="">Banka Kısaltma</label>
							<input type="text" class="form-control" name="nasabah" required placeholder="Banka Kısaltma">
						</div>
						<div class="form-group">
							<label class="">Banka Adı</label>
							<input type="text" class="form-control" name="bank" required placeholder="Banka Adı">
						</div>
						<div class="form-group">
							<label class="">Hesap Numarası</label>
							<input type="number" class="form-control" name="nomor" required placeholder="Hesap Numarası">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Banka Logosu Yükle</label>
							<input type="file" class="form-control" name="userfile" required="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
							<button class="btn btn-success">Kaydet</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('backend/include/base_js'); ?>
</body>

</html>
