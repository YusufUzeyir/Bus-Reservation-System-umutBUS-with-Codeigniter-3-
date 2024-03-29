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
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h1 class="h5 text-gray-800">Müşteri Listesi</h1>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Müşteri ID</th>
                <th>Tc Kimlik Numarası</th>
                <th>İsim</th>
                <th>Adres </th>
                <th>Email</th>
                <th>İletişim</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($pelanggan as $row) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $row['kd_musteri']; ?></td>
                  <td><?= $row['no_ktp_musteri']; ?></td>
                  <td><?= $row['isim_musteri']; ?></td>
                  <td><?= $row['adres_musteri']; ?></td>
                  <td><?= $row['email_musteri']; ?></td>
                  <td><?= $row['telefon_musteri']; ?></td>
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
  </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php $this->load->view('backend/include/base_js'); ?>
</body>

</html>