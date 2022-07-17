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

							<div class="container-fluid text-dark">

								<!-- Page Heading -->
								<h2 class="m-0 font-weight-bold text-primary">Tambah Data Users</h2>
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
						<a href="<?php echo site_url('users/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
								</div>
								<div class="card-body">
									<form action="<?php echo site_url('users/add') ?>" onsubmit='return cekpass()' method="post" enctype="multipart/form-data">
										<div class="form-group">
											<b><label for="users">Nama</label></b>
											<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama" />
											<div class="invalid-feedback">
												<?php echo form_error('nama') ?>
											</div>
										</div>
								<div class="form-group">
									<b><label for="username">Username</label></b>
									<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="text" name="username" placeholder="Username" />
									<div class="invalid-feedback">
										<?php echo form_error('username') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="password">Password</label></b>
									<input id="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="text" name="password" placeholder="Password" />
									<div class="invalid-feedback">
										<?php echo form_error('password') ?>
									</div>
								</div>
								<div class="form-group">
									<b><label for="password">Konfirmasi Password</label></b>
									<input id='rpassword' class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="text" name="rpassword" placeholder="Password" />
									<div class="invalid-feedback">
										<?php echo form_error('password') ?>
									</div>
								</div>
								<script>
									function cekpass() {
										var kondisi = false;
										if (document.getElementById("password").value == document.getElementById("rpassword").value) {
											kondisi = true;
										} else {
											kondisi = false;
											alert('Password tidak sama!');
										}
										return kondisi;
									}
								</script>
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
	</div>
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