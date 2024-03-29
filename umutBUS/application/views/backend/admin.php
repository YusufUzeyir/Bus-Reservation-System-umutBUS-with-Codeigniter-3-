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
      <h1 class="h5 mb-2 text-gray-800">Sistem Yöneticilerinin Listesi</h1>
     
      <div class="card shadow mb-4">
        <div class="card-header py-3">
           <a href="<?= base_url('backend/admin/erisim') ?>" class="btn btn-success pull-right" >
           Erişim Hesabı Ekle
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Yönetici Kodu</th>
                  <th>İsim</th>
                  <th>Kullanıcı Adı</th>
                  <th>Email</th>
                  <th>Seviye</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($admin as $row) { ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['kd_admin']; ?></td>
                    <td><?= $row['isim_admin']; ?></td>
                    <td><?= $row['username_admin']; ?></td>
                    <td><?= $row['email_admin']; ?></td>
                    <td><?php if ($row['seviye_admin'] == '1') { ?>
                      İDARE
                    <?php }else{ ?>
                      YÖNETİCİ
                    <?php } ?>
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
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>