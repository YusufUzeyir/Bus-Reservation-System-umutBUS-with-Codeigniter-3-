<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/elements/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Ödeme</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-10">
					<div class="card mb-5">
						<div class="card-header" align="center">
							<b><i class="fas fa-ticket-alt"></i> REZERVASYON KODU <?= $tiket[0]['kd_siparis']; ?></b>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th scope="col">Bilet</th>
											<th scope="col">Program No.</th>
											<th scope="col">Kalkış</th>
											<th scope="col">Koltuk Numarası</th>
											<th scope="col">Fiyat</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										foreach ($tiket as $row) { ?>
											<tr>
												<?php $now = hari_indo(date('N', strtotime($row['tgl_ayrilis_siparis']))) . ', ' . tanggal_indo(date('Y-m-d', strtotime('' . $row['tgl_ayrilis_siparis'] . ''))) . ', ' . date('H:i', strtotime($row['kalkis_zaman'])); ?>
												<th scope="row"><?= $row['kd_bilet']; ?></th>
												<td><?= $row['kd_zaman'] . " [" . $row['kd_otobus'] . ']' ?></td>
												<td><?= $now ?></td>
												<td><?= $row['no_koltuk_oturan']; ?></td>
												<td>₺<?= $row['fiyat_tarifesi']; ?></td>
											</tr>
										<?php } ?>
										<td colspan="5"> <b class="pull-right">Toplam ₺<?php $total = $count * $tiket[0]['fiyat_tarifesi'];
																						echo $total ?></b></td>
									</tbody>
								</table>
							</div>

						</div>
						<div class="container-fluid">
							<div class="container py-3">
								<div class="row">
									<div class="col-12 col-sm-8 col-md-6 mx-auto">
										<div id="pay-invoice" class="card">
											<div class="card-body">
												<form action="" class="needs-validation" method="post" novalidate="novalidate" data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>">
													<div class="form-group text-center">
														<ul class="list-inline">
															<li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
															<li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
															<li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
															<li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
														</ul>
													</div>
													<div class="form-group">
														<input type="hidden" name="amount" value="<?= $row['fiyat_tarifesi']; ?>">
													</div>
													<div class="form-row">
														<div class="col-md-12">
															<label for="cc-name" class="control-label">Kart Üzerindeki İsim</label>
															<input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" required>
															<div class="invalid-feedback">Boş Geçilemez</div>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12">
															<label for="cc-number" class="control-label">Kart Numarası</label>
															<input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa number" maxlength="19" value="" required>
															<div class="invalid-feedback">Boş Geçilemez</div>
														</div>
													</div>
													<div class="form-row">
														<div class="col-4">
															<label for="cc-month" class="control-label">Ay</label>
															<input id="cc-month" name="cc-month" type="tel" class="form-control cc-month number" value="" placeholder="MM" maxlength="2" required>
															<div class="invalid-feedback">Boş Geçilemez</div>
														</div>
														<div class="col-4">
															<label for="cc-year" class="control-label">Yıl</label>
															<input id="cc-year" name="cc-year" type="tel" class="form-control cc-year number" value="" placeholder="YYYY" maxlength="4" required>
															<div class="invalid-feedback">Boş Geçilemez</div>
														</div>
														<div class="col-4">
															<label for="x_card_code" class="control-label">CVV/CVV2</label>
															<div class="input-group">
																<input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc number" value="" maxlength="4" required>
																<div class="input-group-append">
																	<span class="input-group-text"><span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span></span>
																</div>
																<div class="invalid-feedback">Please enter the security code</div>
															</div>
														</div>
													</div>
													<br>
													<div>
														<button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
															<i class="fa fa-lock fa-lg"></i>&nbsp;
															<span id="payment-button-amount">Öde <?= $row['fiyat_tarifesi']; ?></span>
															<span id="payment-button-sending" style="display:none;">Doğrulanıyor...</span>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

	</section>
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<?php $expired1 = tanggal_ing(date('Y-m-d', strtotime($tiket[0]['gecmis_siparis']))) . ', ' . date('Y', strtotime($tiket[0]['gecmis_siparis'])) . ' ' . date('H:i', strtotime($tiket[0]['gecmis_siparis'])) ?>

	<?php $this->load->view('frontend/include/base_js'); ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script>
		(function() {
			'use strict';

			$('[data-toggle="popover"]').popover()

			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');

				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						} else {
							event.preventDefault();

							$.blockUI({
								css: {
									border: 'none',
									padding: '15px',
									backgroundColor: '#000',
									'-webkit-border-radius': '10px',
									'-moz-border-radius': '10px',
									opacity: .5,
									color: '#fff'
								}
							});

							// createToken returns immediately - the supplied callback submits the form if there are no errors
							Stripe.card.createToken({
								number: $('.cc-number').val(),
								cvc: $('.cc-cvc').val(),
								exp_month: $('.cc-month').val(),
								exp_year: $('.cc-year').val(),
								name: $('.cc-name').val(),
							}, stripeResponseHandler);

							$.unblockUI();

							return false; // submit from callback
						}
						form.classList.add('was-validated');
					}, false);
				});

			}, false);
		})();
	</script>

	<script>
		window.appFilePath = '<?php echo base_url(); ?>';
		var stripeForm = $('.needs-validation');

		// this identifies your website in the createToken call below
		Stripe.setPublishableKey(stripeForm.data('stripe-publishable-key'));

		function stripeResponseHandler(status, response) {

			var stripeError = $('.alert-danger');
			var stripeSuccess = $('.alert-success');

			if (response.error) {

				stripeError.show().delay(3000).fadeOut();
				$('#errorMsg').text(response.error.message);

			} else {

				var token = response['id'];
				stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
				var dataPost = stripeForm.serializeArray();

				$.post(appFilePath + "StripeController/stripePost", dataPost, function(response) {

					$.unblockUI();

					if (response.success) {

						stripeForm[0].reset();
						stripeSuccess.show().delay(3000).fadeOut();
						$('#successMsg').text(response.message);

					} else {
						stripeError.show().delay(3000).fadeOut();
						$('#errorMsg').text(response.message);
					}
				}, "json");
			}
		}

		// only numbers are allowed
		$(".number").keydown(function(e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
				// Allow: Ctrl+v, Command+V
				(e.keyCode == 118 && (e.ctrlKey === true || e.metaKey === true)) ||

				// Allow: Ctrl+V, Command+V
				(e.keyCode == 86 && (e.ctrlKey === true || e.metaKey === true)) ||

				// Allow: Ctrl+A, Command+V
				((e.keyCode == 65 || e.keyCode == 97 || e.keyCode == 103 || e.keyCode == 99 || e.keyCode == 88 || e.keyCode == 120) && (e.ctrlKey === true || e.metaKey === true)) ||

				// Allow: home, end, left, right, down, up
				(e.keyCode >= 35 && e.keyCode <= 40)) {
				// let it happen, don't do anything
				return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
	</script>

</body>

</html>