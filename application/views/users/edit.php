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
						<h2 class="m-0 font-weight-bold text-primary">Edit Data Users</h2>
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
									<form action="<?=base_url()?>users/update_data" method="post" enctype="multipart/form-data"> <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses oleh controller tempat vuew ini digunakan. Yakni index.php/users/edit/ID --->
									<input type="hidden" name="id" value="<?php echo $users->id_users ?>" />
									<div class="form-group">
										<label for="name">Nama</label>
										<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama" value="<?php echo $users->nama ?>" />
										<div class="invalid-feedback">
											<?php echo form_error('nama') ?>
										</div>
									</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" type="text" name="username" min="0" placeholder="username" value="<?php echo $users->username ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('username') ?>
									</div>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input class="form-control" type="password" name="password_lawas" value="<?php echo $users->password ?>" placeholder="password" hidden/>
									<input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="password" name="password" placeholder="password"/>
									<div class="invalid-feedback">
										<?php echo form_error('password') ?>
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