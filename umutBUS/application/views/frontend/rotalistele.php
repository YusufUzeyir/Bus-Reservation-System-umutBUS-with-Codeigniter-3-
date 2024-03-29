<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Kalkış Listesi</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="card mb-5">
						<div class="card-header">
							<i class="fas fa-list"></i> Kalkış Listesi
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
									<thead class="thead-dark">
										<tr>
											<th scope="col">Nereden-Nereye</th>
											<th>Varış Terminalİ</th>
											<th scope="col">Tarih ve Saat</th>
											<th scope="col">Koltuklar</th>
											<th>Fiyat</th>
											<th scope="col">İşlem</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($i = 0; $i < count($jadwal); $i++) { ?>
											<tr>
												<td><?php echo strtoupper($asal['kota_varis']) . " - " . strtoupper($jadwal[$i]['kota_varis']) . " [" . $jadwal[$i]['kd_zaman'] . "]"; ?></td>
												<td><?php echo $jadwal[$i]['terminal_varis'] ?></td>
												<td><?php echo hari_indo(date('N', strtotime($tanggal))) . ', ' . tanggal_indo(date('Y-m-d', strtotime('' . $tanggal . ''))) . ', ' . date('H:i', strtotime($jadwal[$i]['kalkis_zaman'])); ?></td>
												<td><?php echo $jadwal[$i]['kapasite_otobus'] - $kursi[$i][0]['count(no_koltuk_oturan)'] ?></td>
												<td>₺<?php echo number_format((float)($jadwal[$i]['fiyat_tarifesi']), 0, ",", "."); ?></td>
												<td><a href="<?php echo base_url('tiket/koltuksec/') . $jadwal[$i]['kd_zaman'] . '/' . $asal['kd_terminal'] . '/' . $tanggal ?>" class=" btn btn-outline-success">Seç</a></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div id="bilgi"></div>
							<a href="<?php echo base_url('tiket') ?>" class="btn btn-danger pull-left">Geri Dön </a>
						</div>
					</div>
				</div>
			</div>
			<div>
				<div id="mapp" style="height: 500px;width:100%;"></div>
			</div>
		</div>
	</section>

	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $this->load->view('frontend/include/base_js'); ?>

	<script>
		function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsRenderer = new google.maps.DirectionsRenderer;
			var map = new google.maps.Map(document.getElementById('mapp'), {
				zoom: 7,
				center: {
					lat: 41.015137,
					lng: 28.979530
				}
			});
			directionsRenderer.setMap(map);
			calculateAndDisplayRoute(directionsService, directionsRenderer);
		}

		function calculateAndDisplayRoute(directionsService, directionsRenderer) {
			directionsService.route({
				origin: '<?php echo $asal['kota_varis']; ?>',
				destination: '<?php echo $jadwal[0]['kota_varis']; ?>',
				travelMode: 'DRIVING'
			}, function(response, status) {
				if (status === 'OK') {
					directionsRenderer.setDirections(response);
					let distance = response.routes[0].legs[0].distance.text;
					let duration = response.routes[0].legs[0].duration.text;
					document.getElementById('bilgi').innerHTML = "<a>Mesafe: <b>" + distance + "</b></a><br><a>Tahmini Yolculuk Süresi: <b>" + duration + "</b></a>";

				} else {
					window.alert('Directions request failed due to ' + status);
				}
			});
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=your_key&callback=initMap">
	</script>


</body>

</html>