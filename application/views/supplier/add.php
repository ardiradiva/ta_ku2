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
					<div id="content">

							<?php $this->load->view("navbar.php") ?>

							<div class="container-fluid">

									<!-- Page Heading -->
									<h2 class="m-0 font-weight-bold text-primary">Tambah Data Supplier</h2>
									<p class="mb-4">
									</p>

										<?php if ($this->session->flashdata('success')) : ?>
											<div class="alert alert-success" role="alert">
												<?php echo $this->session->flashdata('success'); ?>
											</div>
										<?php endif; ?>

										<div class="card mb-3">
											<div class="card-header">
												<a href="<?php echo site_url('supplier/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
											</div>
											<div class="card-body">
												<form action="<?php echo site_url('supplier/add') ?>" method="post" enctype="multipart/form-data">
													<input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin'); ?>">
													<div class="form-group">
														<b><label for="supplier">Nama</label></b>
														<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama" />
														<div class="invalid-feedback">
															<?php echo form_error('nama') ?>
														</div>
													</div>
													<div class="form-group">
														<b><label for="alamat">Alamat</label></b>
														<input class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="Alamat" />
														<div class="invalid-feedback">
															<?php echo form_error('alamat') ?>
														</div>
													</div>
													<div class="form-group">
														<b><label for="hp">No.Hp</label></b>
														<input class="form-control <?php echo form_error('hp') ? 'is-invalid' : '' ?>" type="text" name="hp" placeholder="No.Hp" />
														<div class="invalid-feedback">
															<?php echo form_error('hp') ?>
														</div>
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