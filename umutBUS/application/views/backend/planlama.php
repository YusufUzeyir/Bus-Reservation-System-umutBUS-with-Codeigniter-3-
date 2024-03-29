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
      <h1 class="h5 text-gray-800">Rota Yönetimi</h1>
     
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="<?= base_url('backend/planlama/planlamaekle') ?>" class="btn btn-success pull-right" >
          Rota Ekle
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Rota Kodu</th>
                  <th>Kalkış Noktası</th>
                  <th>Varış Noktası</th>
                  <th>Kalkış Saati</th>
                  <th>Varış Saati</th>
                  <th>Fiyat</th>
                  <th>Durum</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($jadwal as $row ) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $row['kd_zaman']; ?></td>
                  <td><?= strtoupper($row['kota_varis']); ?></td>
                  <td><?= strtoupper($row['vilayet_terminal']); ?></td>
                  <td><?= date('H:i',strtotime($row['kalkis_zaman'])); ?></td>
                  <td><?= date('H:i',strtotime($row['varis_zaman'])); ?></td>
                  <!-- <td>$<?= number_format((float)($row['fiyat_tarifesi']),0,",","."); ?>,-</td> -->
                  <td>₺<?= number_format((float)($row['fiyat_tarifesi']),0,",","."); ?></td>
                  <td><a href="<?= base_url('backend/planlama/viewplanlama/'.$row['kd_zaman']) ?>" class="btn btn-info">Göster</a></td>
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

<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>