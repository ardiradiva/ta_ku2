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

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item no-arrow">
						<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
								<div class="input-group-append">
									<!-- <button class="btn btn-primary" type="button">
											<i class="fas fa-search fa-sm"></i> -->
									</button>
								</div>
							</div>
						</form>
					</li>
				</ul>

				</nav>
				<!-- End of Topbar -->

				<div class="container-fluid text-dark">
					<!-- Page Heading -->
					<h2 class="m-0 font-weight-bold text-primary">Pengaturan Bobot</h2>
					<p class="mb-4">
					</p>
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success" role="alert">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<!-- Card  -->
					<div class="card mb-3">
						<div class="card-header">

							<a href="<?php echo site_url('nilai/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
						</div>
						<div class="card-body">

							<form action="<?= base_url('nilai/MenambahNilai') ?>" method="post" enctype="multipart/form-data">
								<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/nilai/edit/ID --->

								<!-- <input type="hidden" name="id" value="<?php echo $nilai->id_nilai ?>" />
								<input type="hidden" name="id_supplier" value="<?php echo $nilai->id_supplier ?>" /> -->
								<input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id_users'); ?>" />

								<div class="form-group">
									<b><label for="select_sup">Supplier</label></b>

									<select id="select_sup" class="js-example-basic-single" name="id_supplier" style="width: 100%;" onchange="RubahSup()">
										<option value="" disabled hidden selected>Pilih Supplier</option>
										<?php foreach ($supplier as $sp) : ?>
											<option value="<?= $sp['id_supplier'] ?>"><?= $sp['nama'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<b><label for="tahun">Tahun</label></b>

									<select id="select_year" class="form-control " name="tahun" onchange="RubahTahun()">
										<option disabled selected>---Pilih Tahun---</option>
										<?php
										// for ($i = 2021; $i <= 2030; $i++) {
										// 	echo "<option  value='$i'>$i</option>";
										// }
										// 
										?>

									</select>

									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<b><label for="periode">Periode</label></b>
									<select id="select_periode" class="form-control " name="periode">
										<option>---Pilih Periode---</option>
										<!-- <option value="1">1</option>
										<option value="2">2</option> -->

									</select>
									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<b><label for="rasa">Kriteria 1 (Rasa)</label></b>
									<!--<input class="form-control <?php echo form_error('rasa') ? 'is-invalid' : '' ?>"
								 type="text" name="rasa" placeholder="rasa" value="<?php echo $nilai->rasa ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('rasa') ?>
								</div>
								-->
									<select name="rasa" class="form-control">
										<option>--- Pilih Nilai Kriteria Rasa ---</option>
										<option value="1">Rasa manis tertinggal di lidah dan berubah ketika disimpan</option>
										<option value="2">Rasa manis tertinggal di lidah, namun tidak berubah ketika disimpan</option>
										<option value="3">Rasa manis konsisten</option>
										<option value="4">Rasa manis konsisten dan tidak berubah ketika disimpan</option>
										<option value="5">Rasa manis dan tidak tertinggal di lidah atau tenggorokan, tidak berubah rasa ketika disimpan</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="aroma">Kriteria 2 (Aroma)</label></b>
									<!--<input class="form-control <?php echo form_error('aroma') ? 'is-invalid' : '' ?>"
								 type="text" name="aroma" placeholder="aroma" value="<?php echo $nilai->aroma ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('aroma') ?>
								</div>-->
									<select name="aroma" class="form-control">
										<option>--- Pilih Nilai Kriteria Aroma ---</option>
										<option value="1">Aroma Nektar Bunga sangat tidak kuat</option>
										<option value="2">Aroma Nektar Bunga tidak kuat</option>
										<option value="3">Aroma Nektar Bunga beraroma sedang</option>
										<option value="4">Aroma Nektar Bunga yang kuat</option>
										<option value="5">Aroma Nektar Bunga yang sangat kuat</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="warna">Kriteria 3 (Warna)</label></b>
									<!--<input class="form-control <?php echo form_error('warna') ? 'is-invalid' : '' ?>"
								 type="text" name="warna" placeholder="warna" value="<?php echo $nilai->warna ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('warna') ?>
								</div>-->
									<select name="warna" class="form-control">
										<option>--- Pilih Nilai Kriteria Warna ---</option>
										<option value="1">Dark Amber</option>
										<option value="2">Amber</option>
										<option value="3">Light Amber</option>
										<option value="4">Extra White</option>
										<option value="5">Water White</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="aksesibilitas">Kriteria 4 (Aksesibilitas)</label></b>
									<!--<input class="form-control <?php echo form_error('aksesibilitas') ? 'is-invalid' : '' ?>"
								 type="text" name="aksesibilitas" placeholder="aksesibilitas" value="<?php echo $nilai->aksesibilitas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('aksesibilitas') ?>
								</div>-->
									<select name="aksesibilitas" class="form-control">
										<option>--- Pilih Nilai Kriteria Aksesibilitas ---</option>
										<option value="1">Pengiriman hanya dapat dilakukan menggunakan roda 2</option>
										<option value="2">Pengiriman dapat dilakukan menggunakan roda 4</option>
										<option value="3">Pengiriman hanya dapat dilakukan menggunakan ekspedisi darat</option>
										<option value="4">Pengiriman dapat dilakukan menggunakan ekspedisi hanya dengan 2 moda transportasi (darat, laut, udara)</option>
										<option value="5">Pengiriman dilakukan dengan menggunakan ekspedisi pada seluruh moda transportasi</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="packaging">Kriteria 5 (Packaging)</label></b>
									<!--<input class="form-control <?php echo form_error('packaging') ? 'is-invalid' : '' ?>"
								 type="text" name="packaging" placeholder="packaging" value="<?php echo $nilai->packaging ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('packaging') ?>
								</div>-->
									<select name="packaging" class="form-control">
										<option>--- Pilih Nilai Kriteria Packaging ---</option>
										<option value="1">Pengemasan tidak aman dan kotor</option>
										<option value="2">Pengemasan kurang aman dan kurang bersih</option>
										<option value="3">Pengemasan aman tetapi kurang bersih</option>
										<option value="4">Pengemasan aman dan bersih</option>
										<option value="5">Pengemasan aman dan sangat bersih</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="konsistensi">Kriteria 6 (Konsistensi)</label></b>
									<!--<input class="form-control <?php echo form_error('konsistensi') ? 'is-invalid' : '' ?>"
								 type="text" name="konsistensi" placeholder="konsistensi" value="<?php echo $nilai->konsistensi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('konsistensi') ?>
								</div>-->
									<select name="konsistensi" class="form-control">"><option>--- Pilih Nilai Kriteria Konsistensi ---</option>
										<option value="1">Perusahaan melakukan pengiriman dengan konsistensi sangat rendah</option>
										<option value="2">Perusahaan melakukan pengiriman dengan konsistensi rendah</option>
										<option value="3">Perusahaan melakukan pengiriman dengan konsistensi cukup tinggi</option>
										<option value="4">Perusahaan melakukan pengiriman dengan konsistensi tinggi</option>
										<option value="5">Perusahaan melakukan pengiriman dengan konsistensi sangat tinggi</option>
									</select>
								</div>

								<div class="form-group">
									<b><label for="harga">Kriteria 7 (Harga)</label></b>
									<!--<input class="form-control <?php echo form_error('harga') ? 'is-invalid' : '' ?>"
								 type="text" name="harga" placeholder="harga" value="<?php echo $nilai->harga ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>-->
									<select name="harga" class="form-control">
										<option>--- Pilih Nilai Kriteria Harga ---</option>
										<option value="1">Produk memiliki harga yang lebih rendah dengan potongan harga perjumlah tertentu</option>
										<option value="2">Produk memiliki harga yang lebih rendah</option>
										<option value="3">Produk hanya menawarkan diskon harga perjumlah tertentu</option>
										<option value="4">Produk memiliki harga yang sama dengan supplier lain</option>
										<option value="5">Produk memiliki harga yang lebih tinggi dibandingkan supplier lain</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="fleksibilitas">Kriteria 8 (Fleksibilitas Pembayaran)</label></b>
									<!--<input class="form-control <?php echo form_error('fleksibilitas') ? 'is-invalid' : '' ?>"
								 type="text" name="fleksibilitas" placeholder="fleksibilitas" value="<?php echo $nilai->fleksibilitas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('fleksibilitas') ?>
								</div>-->
									<select name="fleksibilitas" class="form-control">
										<option>--- Pilih Nilai Kriteria Fleksibilitas Pembayaran ---</option>
										<option value="1">Harus dibayarkan penuh</option>
										<option value="2">Harus dibayar 75% dari harga yang seharusnya dibayarakan</option>
										<option value="3">Harus dibayar 50% dari harga yang seharusnya dibayarkan</option>
										<option value="4">Harus dibayar 25% dari harga yang harus dibayarkan</option>
										<option value="5">Dapat dibayar ketika produk tiba</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="garansi">Kriteria 9 (Garansi)</label></b>
									<!--<input class="form-control <?php echo form_error('garansi') ? 'is-invalid' : '' ?>"
								 type="text" name="garansi" placeholder="garansi" value="<?php echo $nilai->garansi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('garansi') ?>
								</div>-->
									<select name="garansi" class="form-control">"><option>--- Pilih Nilai Kriteria Garansi ---</option>
										<option value="1">Produk yang rusak tidak diretur sama sekali</option>
										<option value="2">Produk yang rusak di retur 25%</option>
										<option value="3">Produk yang rusak di retur 50%</option>
										<option value="4">Produk yang rusak di retur 75%</option>
										<option value="5">Produk yang rusak diretur 100%</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="jarak">Kriteria 10 (Jarak)</label></b>
									<!--<input class="form-control <?php echo form_error('jarak') ? 'is-invalid' : '' ?>"
								 type="text" name="jarak" placeholder="jarak" value="<?php echo $nilai->jarak ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jarak') ?>
								</div-->
									<select name="jarak" class="form-control">
										<option>--- Pilih Nilai Kriteria Jarak ---</option>
										<option value="1">Lokasi supplier 10-15 km</option>
										<option value="2">Lokasi supplier 50-100 km</option>
										<option value="3">Lokasi supplier 100-150 km</option>
										<option value="4">Lokasi supplier 150-200 km</option>
										<option value="5">Lokasi supplier >200km</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="lokasi">Kriteria 11 (Lokasi)</label></b>
									<!--<input class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>"
								 type="text" name="lokasi" placeholder="lokasi" value="<?php echo $nilai->lokasi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('lokasi') ?>
								</div>-->
									<select name="lokasi" class="form-control">
										<option>--- Pilih Nilai Kriteria Lokasi ---</option>
										<option value="1">Lokasi hanya bisa diakses roda 2 saja</option>
										<option value="2">Lokasi hanya bisa diakses roda 2 dan roda 4</option>
										<option value="3">Lokasi hanya bisa diakses melalui moda transportasi darat</option>
										<option value="4">Lokasi hanya bisa diakses dengan 2 moda transportasi (darat, laut, udara)</option>
										<option value="5">Lokasi bisa diakses semua moda transportasi</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="legalitas">Kriteria 12 (Legalitas)</label></b>
									<!--<input class="form-control <?php echo form_error('legalitas') ? 'is-invalid' : '' ?>"
								 type="text" name="legalitas" placeholder="legalitas" value="<?php echo $nilai->legalitas ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('legalitas') ?>
								</div>-->
									<select name="legalitas" class="form-control">
										<option>--- Pilih Nilai Kriteria Legalitas ---</option>
										<option value="1">Perusahaan tidak memiliki legalitas dan hanya dikenal sedikit masyarakat</option>
										<option value="2">Perusahaan dikenal banyak masyarakat namun belum memiliki legalitas resmi</option>
										<option value="3">Perusahaan hanya memiliki legalitas dari BPOM</option>
										<option value="4">Perusahaan hanya dikenal orang di daerah sekitarnya dan memiliki legalias resmi BPOM</option>
										<option value="5">Perusahaan dikenal banyak orang dan memiliki legalitas resmi dari BPOM</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="manajerial">Kriteria 13 (Manajerial)</label></b>
									<!--<input class="form-control <?php echo form_error('manajerial') ? 'is-invalid' : '' ?>"
								 type="text" name="manajerial" placeholder="manajerial" value="<?php echo $nilai->manajerial ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('manajerial') ?>
								</div>-->
									<select name="manajerial" class="form-control">
										<option>--- Pilih Nilai Kriteria Manajerial ---</option>
										<option value="1">Supplier memiliki manajerial yang sangat buruk</option>
										<option value="2">Supplier memiliki manajerial yang buruk</option>
										<option value="3">Supplier memiliki manajerial yang baik</option>
										<option value="4">Supplier memiliki manajerial yang sangat baik</option>
										<option value="5">Supplier memiliki manajerial yang sangat baik sekali</option>
									</select>
								</div>
								<div class="form-group">
									<b><label for="komunikasi">Kriteria 14 (Komunikasi)</label></b>
									<!--<input class="form-control <?php echo form_error('komunikasi') ? 'is-invalid' : '' ?>"
								 type="text" name="komunikasi" placeholder="komunikasi" value="<?php echo $nilai->komunikasi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('komunikasi') ?>
								</div>-->
									<select name="komunikasi" class="form-control">
										<option>--- Pilih Nilai Kriteria Komunikasi ---</option>
										<option value="1">Supplier memiliki komunikasi yang sangat buruk</option>
										<option value="2">Supplier memiliki komunikasi yang buruk</option>
										<option value="3">Supplier memiliki komunikasi yang baik</option>
										<option value="4">Supplier memiliki komunikasi yang sangat baik</option>
										<option value="5">Supplier memiliki komunikasi yang sangat baik sekali</option>
									</select>
								</div>


								<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
							</form>

						</div>

						<div class="card-footer small text-muted">
							* required fields
						</div>

					</div>
				</div>
			</div>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
	</div>
	<!-- End of Content Wrapper -->

	<!-- Footer -->
	<!-- <?php $this->load->view("footer.php") ?> -->
	<!-- End of Footer -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<?php $this->load->view("jsload.php") ?>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>

</html>
<script>
	function RubahTahun() {
		let id_sup = $('#select_sup').val();
		let tahun = $('#select_year').val();
		$('#select_periode').html('<option value="" disabled selected >Pilih Opsi</option>')
		$.ajax({
			url: "<?php echo base_url('Nilai/getData') ?>",
			type: "POST",
			data: {
				'id_sup': id_sup
			},
			dataType: "JSON",
			success: function(data) {
				let nilai = []
				$.each(data, function(i, dt) {
					if (parseInt(dt.tahun) == parseInt(tahun)) {
						nilai.push(parseInt(dt.periode))
					}
				});
				// console.log(nilai);
				let checker = [];
				for (let first = 1; first <= 2; first++) {

					if (nilai.includes(first)) {
						checker.push(first)
						$('#select_periode').append('<option disabled style="color:red" value="' + first + '">' + first + '</option>')
					} else {
						$('#select_periode').append('<option value="' + first + '">' + first + '</option>')

					}
				}
				if (checker.length == 2) {
					$('#select_year').val('')
					alert('Tahun Tersebut Sudah Diisi Masing - Masing Periode')
				}
			}

		});



	}

	function RubahSup() {
		for (let i = 2021; i <= 2030; i++) {
			$('#select_year').append('<option value="' + i + '" >' + i + '</option>')

		}
		$('#select_year').val('')
		$('#select_periode').html('<option value="" disabled selected >Pilih Opsi</option>')

	}
</script>