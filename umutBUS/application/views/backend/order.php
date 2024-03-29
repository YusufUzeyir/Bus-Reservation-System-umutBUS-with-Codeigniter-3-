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
        <h1 class="h5 text-gray-800">Rezervasyon Listesi</h1>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Rezervasyon Kodu</th>
                <th>Rota Kodu</th>
                <th>Kalkış Tarihi</th>
                <th>Müşteri İsmi</th>
                <th>Bilet Satın Alma Tarihi</th>
                <th>Bilet Adeti</th>
                <th>Durum</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($order as $row) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $row['kd_siparis']; ?></td>
                  <td><?= $row['kd_zaman']; ?></td>
                  <td><?= hari_indo(date('N', strtotime($row['tgl_ayrilis_siparis']))) . ', ' . tanggal_indo(date('Y-m-d', strtotime('' . $row['tgl_ayrilis_siparis'] . ''))); ?></td>
                  <td><?= $row['isim_siparis']; ?></td>
                  <td><?= $row['tgl_siparis_tamamla']; ?></td>
                  <?php $sqlcek = $this->db->query("SELECT * FROM tbl_siparis WHERE kd_siparis LIKE '" . $row['kd_siparis'] . "'")->result_array(); ?>
                  <td><?= count($sqlcek); ?></td>
                  <?php if ($row['durum_siparis'] == '1') { ?>
                    <td class="btn-danger"> Ödenmedi</td>
                  <?php } elseif ($row['durum_siparis'] == '2') { ?>
                    <td class="btn-success"> Ödendi</td>
                  <?php } else { ?>
                    <td class="btn-warning">İptal edildi</td>
                  <?php } ?>
                  <td><a href="<?= base_url('backend/order/vieworder/' . $row['kd_siparis']) ?>" class="btn btn btn-info">Göster</a></td>
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
  </div <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
  </a>
  <?php $this->load->view('backend/include/base_js'); ?>
</body>

</html>