<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Ticket Sales Report</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		
		<?php $this->load->view('frontend/include/base_css'); ?>
</head>
<body onload="window.print()" >
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>BİLET SATIŞ RAPORU</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>
<table border="1" align="center" class="table table-bordered table-striped" style="width:900px;margin-bottom:20px;">
<thead>
<tr>
<th colspan="11" style="text-align:left;">Rapor Tarih Aralığı: <?php echo $mulai ?> to <?php echo $sampai ?> </th>
</tr>
    <tr>
        <th>Bilet Numarası</th>
        <th>Rezervasyon Kodu</th>
        <th>Müşteri</th>
        <th>Yaş</th>
        <th>Koltuk</th>
        <th>Fiyat</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($laporan as $row) { ?>
    <tr>
        <td style="text-align:center;"><?php echo $row['kd_bilet'];?></td>
        <td style="padding-left:5px;"><?php echo $row['kd_siparis'];?></td>
        <td style="text-align:center;"><?php echo $row['isim_bilet'];?></td>
        <td style="text-align:center;"><?php echo $row['yas_bilet'];?></td>
        <td style="text-align:center;"><?php echo $row['koltuk_bilet'];?></td>
        <td style="text-align:left;"><?php echo '₺'.number_format($row['fiyat_bilet']);?></td>
    </tr>
    <?php } ?>
</tbody>
<tfoot>

    <tr>
        <td colspan="5" style="text-align:right;"><b>Toplam: </b></td>
        <td style="text-align:left;"><b><?php echo '₺'.number_format($total);?></b></td>
    </tr>
</tfoot>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Türkiye, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('username_admin');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>