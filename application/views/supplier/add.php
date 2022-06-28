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

				<div class="container-fluid">



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
					<!-- /.container-fluid -->

				</div>


			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->



		<!------------------------- ->


                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	<!-- Footer -->
	<?php $this->load->view("footer.php") ?>
	<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->




	<?php $this->load->view("jsload.php") ?>

</body>

</html>