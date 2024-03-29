<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/frontend/timepicker') ?>/css/bootstrap-material-datetimepicker.css" />
  <?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">
  <?php $this->load->view('backend/include/base_nav'); ?>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rota Ekle</h6>
      </div>
      <div class="card-body">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <form action="<?= base_url() ?>backend/planlama/planlamaekle" method="post">
                <div class="form-group">
                  <label class="">Kalkış Noktası</label>
                  <select class="form-control" name="asal" required>
                    <option value="" selected disabled="">Kalkış Noktası Seç</option>
                    <?php foreach ($tujuan as $row) { ?>
                      <option value="<?= $row['kd_terminal'] ?>"><?= strtoupper($row['kota_varis']) . " - " . $row['terminal_varis']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="">Varış Noktası</label>
                  <select class="form-control" name="tujuan" required>
                    <option value="" selected disabled="">Varış Noktası Seç</option>
                    <?php foreach ($tujuan as $row) { ?>
                      <option value="<?= $row['kd_terminal'] ?>"><?= strtoupper($row['kota_varis']) . " - " . $row['terminal_varis']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="">Otobüs</label>
                  <select class="form-control" name="bus">
                    <option value="" selected disabled="">Otobüs Seç</option>
                    <?php foreach ($bus as $row) { ?>
                      <option value="<?= $row['kd_otobus'] ?>"><?= strtoupper($row['isim_otobus']); ?> -<?php if ($row['durum_otobus'] == '1') { ?>
                        Active
                      <?php } else { ?>
                        InActive
                        <?php } ?>- </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="">Kalkış Saatleri</label>
                  <input type="text" class="form-control" id="time" name="berangkat" required="" placeholder="Kalkış Saatleri">
                </div>
                <div class="form-group">
                  <label class="">Varış Saatleri</label>
                  <input type="text" class="form-control" id="time2" name="tiba" required="" placeholder="Varış Saatleri">
                </div>
                <div class="form-group">
                  <label class="">Rota Ücreti</label>
                  <input type="number" class="form-control" name="harga" required="" placeholder="Fiyat">
                  <?= form_error('name'), '<small class="text-danger pl-3">', '</small>'; ?>
                </div>
            </div>
          </div>
          <hr>
          <a class="btn btn-danger" href="javascript:history.back()"> Geri Dön</a>
          <input type="submit" class="btn btn-success pull-rigth" value="Rota Ekle">
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('backend/include/base_footer'); ?>
  <?php $this->load->view('backend/include/base_js'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
  <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/frontend/timepicker') ?>/js/bootstrap-material-datetimepicker.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#time').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
      });
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#time2').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm'
      });
    })
  </script>

</body>

</html>