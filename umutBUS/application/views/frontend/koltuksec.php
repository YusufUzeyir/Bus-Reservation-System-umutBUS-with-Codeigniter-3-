<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Koltuk Seç</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="card mb-5">
						<div class="card-header">
							<i class="fas fa-info-circle"></i> Bilet Açıklaması
						</div>
						<div class="card-body">
							<ul>
								<li>► Rota <b><?php echo $asal['kota_varis'] . " - " . $jadwal['kota_varis'] . " [" . $jadwal['kd_zaman'] . "]"; ?></b></li>
								<li>► Otobüs Şirketi <b><?php echo $jadwal['isim_otobus'];  ?></b></li>
								<li>► Otobüs Plakası <b><?php echo $jadwal['plaka_otobus'];  ?></b></li>
								<li>► Kalkış <b><?php echo strtoupper($asal['kota_varis']) . " - " . $asal['terminal_varis']; ?></b></li>
								<li>► Varış <b><?php echo strtoupper($jadwal['kota_varis']) . " - " . $jadwal['terminal_varis']; ?></b></li>
								<li>► Fiyat: <b>₺<?php echo number_format((float)($jadwal['fiyat_tarifesi']), 0, ",", "."); ?></b></li>
								<li>► Kalkış Tarihi <b><?php echo nama_hari($tanggal) . "," . tgl_indo($tanggal) ?></b></li>
								<li>► Kalkış Zamanı <b><?php echo $jadwal['kalkis_zaman']; ?></b></li>
								<li>► Varış Zamanı <b><?php echo $jadwal['varis_zaman']; ?> </b></li>
								<li>► Lütfen Bir Koltuk Seçiniz</li>
								<li>► Maksimum 4 Koltuk Seçiniz</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<form action="<?php echo base_url('tiket/koltukbilgigir') ?>" method="get">
						<input type="hidden" name="tgl" value="<?php echo $tanggal ?>">
						<div class="card mb-5">
							<div class="card-header">
								<i class="fas fa-bus"></i> Koltuk Seçimi
							</div>
							<center class="">
								<table class="">
									<tr>
										<td class='btn-group' width='139'>
											<b>SÜRÜCÜ</b>

										</td>
										<td class='btn-group' width='139'>
											<label class='btn btn-default'>
												<input name='kursi[]' value='1' id='1' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '1'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;1
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='2' id='2' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '2'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;2
											</label>
										</td>

									</tr>
									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='3' id='3' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '3'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;3
											</label>
										</td>
										<td class='btn-group' width='139'>
											<label class='btn btn-default'>
												<input name='kursi[]' value='4' id='4' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '4'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;4
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='5' id='5' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '5'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;5
											</label>
										</td>

									</tr>
									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='6' id='6' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '6'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;6
											</label>

										</td>
										<td class='btn-group' width='139'>
											<label class='btn btn-default'>
												<input name='kursi[]' value='7' id='7' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '7'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;7
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='8' id='8' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '8'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;8
											</label>
										</td>

									</tr>
									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='9' id='9' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '9'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;9
											</label>

										</td>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='10' id='10' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '10'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;10
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='11' id='11' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '11'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;11
											</label>

										</td>

									</tr>
									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='12' id='12' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '12'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;12
											</label>

										</td>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='13' id='13' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '13'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;13
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='14' id='14' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '14'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;14
											</label>

										</td>

									</tr>
									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='15' id='15' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '15'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;15
											</label>

										</td>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='16' id='16' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '16'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;16
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='17' id='17' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '17'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;17
											</label>

										</td>

									</tr>


									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='18' id='18' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '18'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;18
											</label>


										</td>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='19' id='19' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '19'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;19
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='20' id='20' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '20'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;20
											</label>

										</td>

									</tr>

									<tr>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='21' id='21' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '21'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;21
											</label>
										</td>
										<td class='btn-group' width='139'>

											<label class='btn btn-default'>
												<input name='kursi[]' value='22' id='22' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '22'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;22
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='23' id='23' onclick='cer(this)' autocomplete='off' type='checkbox' <?php if (in_array(array('no_koltuk_oturan' => '23'), $kursi)) {
																																					echo "disabled checked";
																																				} ?>>&nbsp;23
											</label>
										</td>

									</tr>

								</table>
							</center>
						</div>
				</div>
				<div class="col-lg-4">
					<div class="card mb-5">
						<div class="card-header">
							<i class="fas fa-bookmark"></i> Rezervasyon Onayı
						</div>
						<div class="alert alert-success" role="alert">
							<p>Bir koltuk seçtikten sonra devam etmek için lütfen 'İleri' düğmesine tıklayın.</p>
							<div class='btn-group'>
								<a href="<?php echo base_url('tiket/rotalistele/' . $tanggal . '/' . $asal['kd_terminal'] . '/' . $jadwal['kota_varis']) ?>" class='btn btn-default'>İptal Et</a>
								<input class="btn btn-info pull-right" disabled="disabled" type="submit" value="İleri">

							</div>
						</div>
						<form>
					</div>
				</div>
	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<script type="text/javascript">
		jQuery(document).ready(function() {

			var checkboxes = $("input[type='checkbox']"),
				submitButt = $("input[type='submit']");

			checkboxes.click(function() {
				submitButt.attr("disabled", !checkboxes.is(":checked"));

			});

		})
	</script>
	<script type="text/javascript">
		var count = 0

		function cer(elem) {
			if (elem.checked) {
				count = count + 1;
				if (count > 4) {
					count = 4;
					swal("Error", "Sorry you can only choose 4 seats!", "error");
					elem.checked = false;
				}
			} else {
				count = count - 1;
			}
		}
	</script>
	<?php $this->load->view('frontend/include/base_js'); ?>
</body>

</html>