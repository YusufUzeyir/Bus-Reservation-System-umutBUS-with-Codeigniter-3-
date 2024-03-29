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
        <h1 class="h5 mb-4 text-gray-800">Rapor Bölümü</h1>
        <table class="table table-bordered table-condensed" id="mydata">
            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;width:40px;">#</th>
                    <th>Rapor Oluştur</th>
                    <th style="width:100px;text-align:center;">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align:center;vertical-align:middle">1</td>
                    <td style="vertical-align:middle;">Bilet Satış Raporu</td>
                    <td style="text-align:center;">
                        <a class="btn btn-sm btn-success" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-print"></span> Yazdır</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Tarih Seç</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?= base_url('backend/raporlama/raportarih') ?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">İtibaren</label>
                            <div class="col-xs-9">
                                <div class='input-group date' id='datepicker' style="width:300px;">
                                    <input type='text' name="mulai" class="form-control datepicker" value="" placeholder="Date..." required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Tarihe Kadar</label>
                            <div class="col-xs-9">
                                <div class='input-group date' id='datepicker' style="width:300px;">
                                    <input type='text' name="sampai" class="form-control datepicker" value="" placeholder="Date..." required />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Kapat</button>
                        <button class="btn btn-success"><span class="fa fa-print"></span>Yazdır</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Ayı Seçin</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?= base_url('backend/raporlama/laporbulan') ?>" target="_blank">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Ay</label>
                            <div class="col-xs-9">
                                <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Choose Month" data-width="80%" required />
                                <option value='' selected disabled>Ayı Seçin<< /option>
                                        <?php foreach ($bulan as $row) { ?>
                                <option value="<?= $row['bulan'] ?>"><?= $row['bulan'] ?></option>
                            <?php } ?>
                            </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Kapat</button>
                        <button class="btn btn-success"><span class="fa fa-print"></span>Yazdır</button>
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
    <script type="text/javascript">
        $(function() {
            var date = new Date();
            date.setDate(date.getDate());

            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
        });
    </script>
</body>

</html>