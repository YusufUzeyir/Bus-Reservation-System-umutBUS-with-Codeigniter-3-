<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- css -->
  <?php $this->load->view('backend/include/base_css'); ?>

</head>

<body id="page-top">


  <?php $this->load->view('backend/include/base_nav'); ?>

  <div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Gösterge Paneli</h1>
    <div class="row">

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?= base_url('backend/order') ?>">Bekleyen Rezervasyonlar</a></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order[0]['count(kd_siparis)']; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-spinner fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?= base_url('backend/tiket') ?>">Satılan Toplam Bilet</a></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tiket[0]['count(kd_bilet)']; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-qrcode fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>


    <div class="row">

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?= base_url('backend/rota') ?>">Toplam Terminaller</a></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $terminal[0]['count(kd_terminal)']; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-road fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?= base_url('backend/planlama') ?>">Mevcut Programlar</a></div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $schedules[0]['count(kd_zaman)']; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>





    </div>

    <div class="row">

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a href="<?= base_url('backend/onay') ?>">Ödeme Listesi</a></div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $konfirmasi[0]['count(kd_onay)']; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url('backend/bus') ?>">Mevcut Otobüs</a></div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $bus[0]['count(kd_otobus)']; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-bus fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
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