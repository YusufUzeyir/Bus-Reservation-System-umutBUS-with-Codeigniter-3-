<!DOCTYPE html>
<html>
	<head>
		<title>Teşekkürler</title>
		<meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		
	</head>
	<body style="font-family: tahoma; font-size: 12px;">
		<center>
		<table class="wrapper" width="600px" style="padding: 0; margin: 0; border-collapse: collapse; border: solid 1px #fd7521;">
			<tr class="header" style="background-color:#484B51;">
				<td style="padding-right:10px;" align="left">
					<a href="<?= base_url() ?>" target="_blank">
						<h4>OTOBÜS BİLETİ REZERVASYONU</h4>
					</a>
				</td>
				<td style="padding-right:10px;" align="right">
					<a href="<?= base_url() ?>" target="_blank">
						<img height="45" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" alt="">
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p style="text-align: justify; padding: 10px;">
						Sayın Müşteri,<br>
						Otobüs bileti Rezervasyonunu kullandığınız için teşekkür ederiz.
					</p>
					<p style="text-align: justify; padding: 10px;">
					Here's a Summary of Your Purchases:
						<table width="100%" style="font-size: 14px; margin: 10px;">
								<tr>
								<td>
								Manuel Hesap Numarası Transferi
									</td><td>:</td>
									<td>
										<strong><?= $sendmail['nomrek_bank']; ?></strong>
									</td>
								</tr>
								<tr>
								<td>
								Adına
									</td><td>:</td>
									<td>
										<strong><?= $sendmail['nasabah_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Alıcı Banka
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['nama_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Ödenen Miktar
									</td>
									<td>:</td>
									<td>
										<?php $total = $count * $sendmail['fiyat_tarifesi'] ?>
										<strong>$ <?= number_format((float)($total),0,",","."); ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Rezervasyon Numarası
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['kd_siparis']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Satın Alma Açıklaması
									</td>
									<td>:</td>
									<td>
										<strong>Schedule Code <?= $sendmail['kd_zaman'] ?></strong><br>
										<strong>Depart <?= hari_indo(date('N',strtotime($sendmail['tgl_ayrilis_siparis']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['tgl_ayrilis_siparis'].''))).', '.date('H:i',strtotime($sendmail['kalkis_zaman'])); ?></strong><br>
										<strong><?= $count; ?> Seat</strong>
									</td>
								</tr>
								<tr>
									<td>
									Satın Alma Tarihi
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['tgl_siparis_tamamla']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Şu tarihe kadar geçerlidir:
									</td>
									<td>:</td>
									<td>
										<strong><?php $expired = hari_indo(date('N',strtotime($sendmail['gecmis_siparis']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['gecmis_siparis'].''))).', '.date('H:i',strtotime($sendmail['gecmis_siparis'])); echo $expired;?></strong>
									</td>
								</tr>
									</table>
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" >
									<tr>
										<td>
											<div class="col-md-12 col-xs-12">
												<h4>How to Transfer Via</h4>
												<div class="hr hr8 hr-double hr-dotted"></div>
												<div class="row">
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>ATM</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Ödeme Kılavuzu</li>
																<li>Select Menu <span class="label">Diğer İşlemler</span></li>
																<li>Select <span class="label">Transfer</span></li>
																<li>Select <span class="label">Hesabına <?= $sendmail['nama_bank'];; ?> </span></li>
																<li>Enter Account Number <span class="label"><?= $sendmail['nomrek_bank']; ?></span></li>
																<li>Select <span class="label">Onaylat</span></li>
																<li>Select <span class="label">Evet</span></li>
																<li>Ödeme Belgenizi Alın</li>
																<li>Bitti</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>MOBILE BANKING</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Mobil Bankacılık Girişi</li>
																<li>Select <span class="label">m-Transfer</span></li>
																<li>Select <span class="label">BCA Hesabı</span></li>
																<li>Hesap Numarasını Girin<span class="label"><?= $sendmail['nomrek_bank'] ?></span></li>
																<li>Click <span class="label">Gönder</span></li>
																<li>VA bilgileri görüntülenecek</li>
																<li>Tıkla <span class="label">Tamam</span></li>
																<li>Giriş <span class="label">PIN</span></li>
																<li>Mobil Bankacılık</li>
																<li>Dekont Görüntüleniyor</li>
																<li>Bitti</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>İNTERNET BANKACILIĞI</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Seç <span class="label">Fon İşlemleri</span></li>
																<li>Seç <span class="label">BCA Hesabına Transfer</span></li>
																<li>Enter Account Number <span class="label"><?= $sendmail['nomrek_bank'] ?></span></li>
																<li></li>
																<li>Tıkla <span class="label">Devam Et</span></li>
																<li>Giriş Yanıtı <span class="label">KeyBCA Uygula 1</span></li>
																<li>Tıkla <span class="label">Send</span></li>
																<li>Dekont</li>
																<li>Bitti</li>
															</ol>
														</div>
													</div>
												</div>
											</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p style="padding:10px;">
										<br>
										SaygılarımIZla,<br>
										<span style="color:#fd7521;"><strong>Otobüs Bileti Rezervasyon Sistemi</strong></span>
										<br>
										<br>
									</p>
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr class="footer" style="font-size: 10px; background-color: #484B51;color:#ffffff;">
								<td style="padding-left:10px; padding-right:10px;">
									<?= date("Y"); ?> &copy; BTBS
								</td>
								<td align="right" style="padding-left:10px; padding-right:10px;">
									<img height="30" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" border="0">
								</td>
							</tr>
						</table>
						</center>
					</body>
				</html>