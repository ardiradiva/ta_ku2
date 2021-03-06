<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("head.php") ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php $this->load->view("sidebar.php") ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content" style="height: 600px;overflow: scroll;">

				<?php $this->load->view("navbar.php") ?>

				<!-- Begin Page Content -->
				<?php
					if ($this->input->post('cari') != false) {
						$ttahun = $_REQUEST['tahun'];
						$tperiode = $_REQUEST['periode'];
				?>

				<div id="cetak" class="bg-gradient-light">
					<div class="d-flex justify-content-between mr-5 ml-5">
						<a href="<?=base_url('wp')?>" class="btn btn-info"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
						<a target="_blank" href="<?= base_url('Wp/cetak_hasil_rekomendasi/'.$ttahun.'/'.$tperiode) ?>" class='btn btn-primary'><i class="fas fa-print mr-1"></i> Cetak</a>
					</div>
					<div class="container-fluid">
						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
						</div>
						
							<!-- start rekomendasi -->
							<div class="card mb-3">
								<div class="card-header">
									<b>
										<h4 class="text-primary" style="text-align:center">Hasil Rekomendasi Supplier Madu Tahun <?php echo $ttahun; ?> dan Periode <?php echo $tperiode; ?></h4>
									</b>
								</div>
								<div class="card-body">
									<h4 class="m-0 font-weight-bold text-primary">Data Bobot Kriteria</h4>
									<hr>

									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr style="background-color:#f6c23e;">
												<?php
												for ($i = 1; $i <= 14; $i++) {
													echo "<th>K$i</th>";
												}
												?>

												<?php
												$all_bobot = array();
												$sum_bobot = 0;
												foreach ($bobot as $bobot) :

													$b_rasa = $bobot->rasa;
													$b_aroma = $bobot->aroma;
													$b_warna = $bobot->warna;
													$b_aksesibilitas = $bobot->aksesibilitas;
													$b_packaging = $bobot->packaging;
													$b_konsistensi = $bobot->konsistensi;
													$b_harga = $bobot->harga;
													$b_fleksibilitas = $bobot->fleksibilitas;
													$b_garansi = $bobot->garansi;
													$b_jarak = $bobot->jarak;
													$b_lokasi = $bobot->lokasi;
													$b_legalitas = $bobot->legalitas;
													$b_manajerial = $bobot->manajerial;
													$b_komunikasi = $bobot->komunikasi;


												?>
											</tr>
											<tr>
												<td><?php echo $b_rasa ?></td>
												<td><?php echo $b_aroma ?></td>
												<td><?php echo $b_warna ?></td>
												<td><?php echo $b_aksesibilitas ?></td>
												<td><?php echo $b_packaging ?></td>
												<td><?php echo $b_konsistensi ?></td>
												<td><?php echo $b_harga ?></td>
												<td><?php echo $b_fleksibilitas ?></td>
												<td><?php echo $b_garansi ?></td>
												<td><?php echo $b_jarak ?></td>
												<td><?php echo $b_lokasi ?></td>
												<td><?php echo $b_legalitas ?></td>
												<td><?php echo $b_manajerial ?></td>
												<td><?php echo $b_komunikasi ?></td>
											</tr>
										<?php
										
													$sum_bobot = $bobot->rasa + $bobot->aroma + $bobot->warna + $bobot->aksesibilitas + $bobot->packaging + $bobot->konsistensi + $bobot->harga + $bobot->fleksibilitas + $bobot->garansi + $bobot->jarak + $bobot->lokasi + $bobot->legalitas + $bobot->manajerial + $bobot->komunikasi;
												endforeach; ?>

										</table>
									</div>

									<!-------------- Bobot End ------------>
									<!-------------- Supplier Start ---------->
									<br>
									<h4 class="m-0 font-weight-bold text-primary">Data Alternatif </h4>
									<hr>
									<?php
									//print_r($nilai_supplier);
									?>

									<div class='table-responsive'>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr style="background-color:#f6c23e;">
												<?php
												echo "<th>Nama Supplier</th>";
												for ($i = 1; $i <= 14; $i++) {
													echo "<th>K$i</th>";
												}
												?>

												<?php
												$alt_nama = array();
												$alt_rasa = array();
												$alt_aroma = array();
												$alt_warna = array();
												$alt_aksesibilitas = array();
												$alt_packaging = array();
												$alt_konsistensi = array();
												$alt_harga = array();
												$alt_fleksibilitas = array();
												$alt_garansi = array();
												$alt_jarak = array();
												$alt_lokasi = array();
												$alt_legalitas = array();
												$alt_manajerial = array();
												$alt_komunikasi = array();
												$n_alt = 0;
												foreach ($nilai_supplier as $ns) :
													if ($ns->tahun == $ttahun && $ns->periode == $tperiode) {
														$alt_nama[] = $ns->nama;
														$alt_rasa[] = $ns->rasa;
														$alt_aroma[] = $ns->aroma;
														$alt_warna[] = $ns->warna;
														$alt_aksesibilitas[] = $ns->aksesibilitas;
														$alt_packaging[] = $ns->packaging;
														$alt_konsistensi[] = $ns->konsistensi;
														$alt_harga[] = $ns->harga;
														$alt_fleksibilitas[] = $ns->fleksibilitas;
														$alt_garansi[] = $ns->garansi;
														$alt_jarak[] = $ns->jarak;
														$alt_lokasi[] = $ns->lokasi;
														$alt_legalitas[] = $ns->legalitas;
														$alt_manajerial[] = $ns->manajerial;
														$alt_komunikasi[] = $ns->komunikasi;

												?>
											<tr>
												<td><?php echo $alt_nama[$n_alt] ?></td>
												<td><?php echo $alt_rasa[$n_alt] ?></td>
												<td><?php echo $alt_aroma[$n_alt] ?></td>
												<td><?php echo $alt_warna[$n_alt] ?></td>
												<td><?php echo $alt_aksesibilitas[$n_alt] ?></td>
												<td><?php echo $alt_packaging[$n_alt] ?></td>
												<td><?php echo $alt_konsistensi[$n_alt] ?></td>
												<td><?php echo $alt_harga[$n_alt] ?></td>
												<td><?php echo $alt_fleksibilitas[$n_alt] ?></td>
												<td><?php echo $alt_garansi[$n_alt] ?></td>
												<td><?php echo $alt_jarak[$n_alt] ?></td>
												<td><?php echo $alt_lokasi[$n_alt] ?></td>
												<td><?php echo $alt_legalitas[$n_alt] ?></td>
												<td><?php echo $alt_manajerial[$n_alt] ?></td>
												<td><?php echo $alt_komunikasi[$n_alt] ?></td>
											</tr>
									<?php
														$n_alt++;
													}
												endforeach; ?>

										</table>
									</div>


									<!-------------- Supplier End ------------>
									<!-------------- Norm Bobbot Start ---------->
									<?php

									foreach ($bobot as $bobot) :

										$norm_rasa = round($b_rasa / $sum_bobot, 3);
										$norm_aroma = round($b_aroma / $sum_bobot, 3);
										$norm_warna = round($b_warna / $sum_bobot, 3);
										$norm_aksesibilitas = round($b_aksesibilitas / $sum_bobot, 3);
										$norm_packaging = round($b_packaging / $sum_bobot, 3);
										$norm_konsistensi = round($b_konsistensi / $sum_bobot, 3);
										$norm_harga = round($b_harga / $sum_bobot, 3);
										$norm_fleksibilitas = round($b_fleksibilitas / $sum_bobot, 3);
										$norm_garansi = round($b_garansi / $sum_bobot, 3);
										$norm_jarak = round($b_jarak / $sum_bobot, 3);
										$norm_lokasi = round($b_lokasi / $sum_bobot, 3);
										$norm_legalitas = round($b_legalitas / $sum_bobot, 3);
										$norm_manajerial = round($b_manajerial / $sum_bobot, 3);
										$norm_komunikasi = round($b_komunikasi / $sum_bobot, 3);

									endforeach; ?>
									<br>
									<h4 class="m-0 font-weight-bold text-primary">Normalisasi Bobot (Wj)</h4>
									<hr>
									<div class='table-responsive'>
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<tr style="background-color:#f6c23e;">
											<?php

											for ($i = 1; $i <= 14; $i++) {
												echo "<th>K$i</th>";
											}

											?>

										<tr>
											<td><?php echo number_format($norm_rasa,4) ?></td>
											<td><?php echo number_format($norm_aroma,4) ?></td>
											<td><?php echo number_format($norm_warna,4) ?></td>
											<td><?php echo number_format($norm_aksesibilitas,4) ?></td>
											<td><?php echo number_format($norm_packaging,4) ?></td>
											<td><?php echo number_format($norm_konsistensi,4) ?></td>
											<td><?php echo number_format($norm_harga,4) ?></td>
											<td><?php echo number_format($norm_fleksibilitas,4) ?></td>
											<td><?php echo number_format($norm_garansi,4) ?></td>
											<td><?php echo number_format($norm_jarak,4) ?></td>
											<td><?php echo number_format($norm_lokasi,4) ?></td>
											<td><?php echo number_format($norm_legalitas,4) ?></td>
											<td><?php echo number_format($norm_manajerial,4) ?></td>
											<td><?php echo number_format($norm_komunikasi,4) ?></td>
										</tr>
									</table>
									</div>

									<!-------------- Norm Bobot End ------------>
									<!-------------- S Start ------------>
									<br>
									<h4 class="m-0 font-weight-bold text-primary">Perhitungan Vektor S</h4>
									<hr>
									<div class='table-responsive'>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr style="background-color:#f6c23e;">
												<?php
												$total_s = 0;
												echo "<th>Nama Supplier</th>";
												for ($i = 1; $i <= 14; $i++) {
													echo "<th>K$i</th>";
												}
												echo "<th>Vektor S</th>";
												?>
												<?php
												$s_rasa = array();
												$s_aroma = array();
												$s_warna = array();
												$s_aksesibilitas = array();
												$s_packaging = array();
												$s_konsistensi = array();
												$s_harga = array();
												$s_fleksibilitas = array();
												$s_garansi = array();
												$s_jarak = array();
												$s_lokasi = array();
												$s_legalitas = array();
												$s_manajerial = array();
												$s_komunikasi = array();
												$n_s = 0;
												$sum_s = array();

												for ($i = 0; $i < $n_alt; $i++) {
													$s_rasa[] = round(pow($alt_rasa[$n_s], $norm_rasa), 3);
													$s_aroma[] = round(pow($alt_aroma[$n_s], $norm_aroma), 3);
													$s_warna[] = round(pow($alt_warna[$n_s], $norm_warna), 3);
													$s_aksesibilitas[] = round(pow($alt_aksesibilitas[$n_s], $norm_aksesibilitas), 3);
													$s_packaging[] = round(pow($alt_packaging[$n_s], $norm_packaging), 3);
													$s_konsistensi[] = round(pow($alt_konsistensi[$n_s], $norm_konsistensi), 3);
													$s_harga[] = round(pow($alt_harga[$n_s], $norm_harga * (-1)), 3);
													$s_fleksibilitas[] = round(pow($alt_fleksibilitas[$n_s], $norm_fleksibilitas), 3);
													$s_garansi[] = round(pow($alt_garansi[$n_s], $norm_garansi), 3);
													$s_jarak[] = round(pow($alt_jarak[$n_s], $norm_jarak * (-1)), 3);
													$s_lokasi[] = round(pow($alt_lokasi[$n_s], $norm_lokasi), 3);
													$s_legalitas[] = round(pow($alt_legalitas[$n_s], $norm_legalitas), 3);
													$s_manajerial[] = round(pow($alt_manajerial[$n_s], $norm_manajerial), 3);
													$s_komunikasi[] = round(pow($alt_komunikasi[$n_s], $norm_komunikasi), 3);

													$sum_s[$n_s] = round(pow($alt_rasa[$n_s], $norm_rasa),3) * round(pow($alt_aroma[$n_s], $norm_aroma),3) 
													* round(pow($alt_warna[$n_s], $norm_warna),3) * round(pow($alt_aksesibilitas[$n_s], $norm_aksesibilitas),3) 
													* round(pow($alt_packaging[$n_s], $norm_packaging),3) * round(pow($alt_konsistensi[$n_s], $norm_konsistensi),3) 
													* round(pow($alt_harga[$n_s], $norm_harga * (-1)),3) * round(pow($alt_fleksibilitas[$n_s], $norm_fleksibilitas),3) 
													* round(pow($alt_garansi[$n_s], $norm_garansi),3) * round(pow($alt_jarak[$n_s], $norm_jarak * (-1)),3) 
													* round(pow($alt_lokasi[$n_s], $norm_lokasi),3) * round(pow($alt_legalitas[$n_s], $norm_legalitas),3) 
													* round(pow($alt_manajerial[$n_s], $norm_manajerial),3) * round(pow($alt_komunikasi[$n_s], $norm_komunikasi),3);
													$total_s += $sum_s[$n_s];
												?>
											<tr>
												<td><?php echo $alt_nama[$n_s] ?></td>
												<td><?php echo number_format($s_rasa[$n_s],4) ?></td>
												<td><?php echo number_format($s_aroma[$n_s] ,4)?></td>
												<td><?php echo number_format($s_warna[$n_s],4) ?></td>
												<td><?php echo number_format($s_aksesibilitas[$n_s],4) ?></td>
												<td><?php echo number_format($s_packaging[$n_s],4) ?></td>
												<td><?php echo number_format($s_konsistensi[$n_s],4) ?></td>
												<td><?php echo number_format($s_harga[$n_s],4) ?></td>
												<td><?php echo number_format($s_fleksibilitas[$n_s],4) ?></td>
												<td><?php echo number_format($s_garansi[$n_s],4) ?></td>
												<td><?php echo number_format($s_jarak[$n_s],4) ?></td>
												<td><?php echo number_format($s_lokasi[$n_s],4)?></td>
												<td><?php echo number_format($s_legalitas[$n_s],4) ?></td>
												<td><?php echo number_format($s_manajerial[$n_s],4) ?></td>
												<td><?php echo number_format($s_komunikasi[$n_s],4)?></td>
												<td><?php echo number_format($sum_s[$n_s],4) ?></td>
											</tr>
										<?php
													
												$n_s++;
												} ?>

										</table>
									</div>
									<?php
									?>
									<!-------------- S End ------------>
									<!-------------- V Start ------------>
									<br>
									<h4 class="m-0 font-weight-bold text-primary">Perhitungan Vektor V</h4>
									<hr>
									<div class='table-responsive'>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr style="background-color:#f6c23e;">
												<?php

												echo "<th>Nama Supplier</th>";
												echo "<th>Vektor S </th>";
												echo "<th>Vektor V</th>";
												?>
												<?php
												$hasil = array();
												$v = array();
												$n_v = 0;
												for ($i = 0; $i < $n_alt; $i++) {
													$v[] = round($sum_s[$n_v] / $total_s, 4);
													$hasil[] = array("supplier" => $alt_nama[$n_v], "S" => $sum_s[$n_v], "V" => $v[$n_v]);
												?>
											<tr>

												<td><?php echo $alt_nama[$n_v] ?></td>
												<td><?php echo number_format(round($sum_s[$n_v], 4),4) ?></td>
												<td><?php echo number_format(round($v[$n_v], 4),4) ?></td>
											</tr>
										<?php
													$n_v++;
												}
												$keys = array_column($hasil, 'V');
												array_multisort($keys, SORT_DESC, $hasil);
										?>

										</table>
									</div>
									<?php //echo $total_s;
										$tertinggi=null;
										$terendah=null;
									?>
									<!-------------- V End ------------>
									<!-------------- Hasil Start ------------>
									<br>
									<h4 class="m-0 font-weight-bold text-primary">Perangkingan Supplier</h4>
									<hr>
									<div class='table-responsive'>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<tr style="background-color:#f6c23e;">
												<?php
												echo "<th>Rangking</th>";
												echo "<th>Nama Supplier</th>";
												echo "<th>Vektor V</th>";
												?>
												<?php

												$v = array();
												$n_v = 0;
												for ($i = 0; $i < count($hasil); $i++) {
													if($tertinggi==null){
														$tertinggi=$hasil[$i]['supplier'];
													}
													$terendah=$hasil[$i]['supplier'];

												?>
											<tr>
												<td><?php echo ($i + 1); ?></td>
												<td><?php echo $hasil[$i]['supplier'] ?></td>
												<td><?php echo number_format($hasil[$i]['V'], 4) ?></td>
											</tr>
										<?php
													$n_v++;
												}
										?>
									</table>
								</div>
								<br>
									<h4 class="m-0 font-weight-bold text-primary">Kesimpulan Hasil</h4>
									<hr>
									Hasil Rekomendasi Supplier Madu Budidaya <?php echo $_REQUEST['tahun'];?> dan Periode <?php echo $_REQUEST['periode'];?> Menghasilkan <?php echo $tertinggi;?> sebagai supplier dengan nilai tertinggi dan <?php echo $terendah;?> dengan Nilai Terendah.
							<?php
							?>
						</div>
					</div>
				<br>
			</div>
		</div>
			<?php
				} else {
			?>
				<div class="container-fluid">
					<h2 class="m-0 font-weight-bold text-primary">Inputkan Tahun dan Periode Hasil Rekomendasi Yang Akan Diakses</h4>
					<br>
					<form action="<?= base_url("wp"); ?>" method=post>
						<div class="form-group">
							<b><label for="tahun">Tahun</label></b>

							<select class="form-control " name="tahun" required oninvalid="this.setCustomValidity('Masukkan Tahun!')">
								<option></option>
								<?php
								for ($i = 2021; $i <= 2030; $i++) {
									echo "<option value='$i'>$i</option>";
								}
								?>

							</select>

							<div class="invalid-feedback"></div>
						</div>
						<div class="form-group">
							<b><label for="periode">Periode</label></b>
							<select class="form-control " name="periode" required oninvalid="this.setCustomValidity('Masukkan Periode!')" oninput="setCustomValidity('')">
								<option></option>
								<?php
								for ($i = 1; $i <= 2; $i++) {
									echo "<option value='$i'>$i</option>";
								}
								?>

							</select>
							<div class="invalid-feedback"></div>
						</div>
						<input type=submit name='cari' value='Akses Hasil' class='btn btn-primary'>
					</form>
				</div>
			<?php
			}
			?>
			<br>
			</div>
			<!--end rekomendasi -->


			<!-- Footer -->
			<!-- <?php $this->load->view("footer.php") ?> -->
			<!-- End of Footer -->

			<!-- Scroll to Top Button-->
			<a class="scroll-to-top rounded" href="#page-top">
				<i class="fas fa-angle-up"></i>
			</a>

			<?php $this->load->view("jsload.php") ?>

</body>

</html>