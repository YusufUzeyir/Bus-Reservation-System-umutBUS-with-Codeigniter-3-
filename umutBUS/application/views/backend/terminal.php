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
    <h1 class="h5 text-gray-800">Terminal Yönetimi</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalTujuan">
          Terminal Ekle
        </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr align="center">
                <th>#</th>
                <th>Terminal Kodu</th>
                <th>Şehir</th>
                <th>Terminal Bilgisi</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($tujuan as $row) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $row['kd_terminal']; ?></td>
                  <td><?= strtoupper($row['kota_varis']); ?></td>
                  <td><?= substr($row['terminal_varis'], 0, 15); ?></td>
                  <td align="center"><a href="<?= base_url('backend/rota/viewrota/' . $row['kd_terminal']) ?>" class="btn btn-info">Göster</a></td>
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
  <div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Terminal Ekle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url() ?>backend/rota/tambahtujuan" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Şehir" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="terminal" name="terminal" class="form-control" placeholder="Terminal Bilgisi" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
              <button class="btn btn-success">Ekle</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('backend/include/base_js'); ?>
</body>

</html>