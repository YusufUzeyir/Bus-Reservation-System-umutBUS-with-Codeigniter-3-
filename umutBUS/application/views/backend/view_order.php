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
        <h6 class="m-0 font-weight-bold text-primary">Rezervasyon Kodu [<?= $tiket[0]['kd_siparis']; ?>] </h6>
      </div>
      <div class="card-body">
        <form action="<?= base_url() . 'backend/order/inserttiket' ?>" method="post" enctype="multipart/form-data">

          <div class="card-body">
            <div class="row">
              <?php foreach ($tiket as $row) { ?>
                <input type="hidden" class="form-control" name="kd_pelanggan" value="<?= $row['kd_musteri'] ?>" readonly>
                <input type="hidden" class="form-control" name="kd_order" value="<?= $row['kd_siparis'] ?>" readonly>
                <input type="hidden" class="form-control" name="asal_beli" value="<?= $row['mc_siparis'] ?>" readonly>
                <input type="hidden" class="form-control" name="kd_tiket[]" value="<?= $row['kd_bilet'] ?>" readonly>
                <div class="col-sm-6">
                  <label>Bilet Kodu <b><?= $row['kd_bilet'] ?></b></label>
                  <p>Müşteri İsmi <b><?= $row['isim_siparis']; ?></b></p>
                  <hr>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Rota Kodu</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="<?= $row['kd_zaman'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Yolcu İsmi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama[]" value="<?= $row['isim_koltuk_oturan'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Koltuk Numarası</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="no_kursi[]" value="<?= $row['no_koltuk_oturan'] ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Yolcu Yaşı</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="umur_kursi[]>" value="<?= $row['yas_koltuk_oturan'] ?> Yaşında" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Bilet Fiyatı</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="harga" value="<?php echo $row['fiyat_tarifesi']; ?>" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Son Ödeme Tarihi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tgl_beli" value="<?= hari_indo(date('N', strtotime($row['gecmis_siparis']))) . ', ' . tanggal_indo(date('Y-m-d', strtotime('' . $row['gecmis_siparis'] . ''))) . ', ' . date('H:i', strtotime($row['gecmis_siparis']));  ?>" readonly>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div class="col-sm-6">
                <div class="row form-group">


                </div>
              </div>
              <div class="col-sm-6">
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Durum</label>
                  <div class="col-sm-8">
                    <?php if ($tiket[0]['durum_siparis'] == '1') { ?>
                      <select class="form-control" name="status" required>
                        <option value='' selected disabled>Ödenmedi</option>
                        <option value='2'>Ödendi</option>
                        <option value='3'>Rezervasyonu İptal Et</option>
                      </select>
                    <?php } elseif ($tiket[0]['durum_siparis'] == '2') { ?>
                      <p class="btn "><b class="btn btn-outline-success">Ödendi</b> </p>

                    <?php } else { ?>
                      <p class="btn"><b class="btn btn-outline-warning">İptal Edildi</b></p>
                    <?php } ?>

                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Toplam Fiyat</label>
                  <div class="col-sm-8">
                    <p><b>₺<?php $total =  count($tiket) * $tiket[0]['fiyat_tarifesi'];
                            echo number_format($total) ?></b></p>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <hr><a class="btn btn-danger float-left" href="<?= base_url() . 'backend/order' ?>">Geri Git</a>
            <?php if ($tiket[0]['durum_siparis'] == '1') { ?>
              <button type="submit" class="btn btn-success">Gönder</button>
            <?php } else if ($tiket[0]['durum_siparis'] == '3') { ?>
              <p><b>Bilet İptal Edildi</b></p>
            <?php } else { ?>
              <a class="btn btn-primary float-right" href="<?= base_url('assets/backend/upload/etiket/' . $row['kd_siparis'] . '.pdf') ?>" target="_blank">E-Bilet Yazdır</a>
             <a class="btn btn-primary float-right" href="<?= base_url('backend/order/kirimemail/' . $row['kd_siparis']) ?>">E-Bilet Gönder</a> 
            <?php } ?>
          </div>
      </div>
      </form>
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