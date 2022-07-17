<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view("head.php") ?>

        <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="m-0 font-weight-bold text-primary">Data Users</h2>
                    </div>

                    <div class="row">

                        <!-- Card Body -->
                        <div class="card-body">

                            <div id="wrapper">

                                <div id="content-wrapper">

                                    <!-- DataTables Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                        <a href="<?php echo site_url('users/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data User</a>
                                        </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                    </form>
                                                </div>
                                                <br>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr style="background-color:#f6c23e;">
                                                                <th style="text-align:center"><strong>No</strong></th>
                                                                <th style="text-align:center"><strong>Nama</strong></th>
                                                                <th style="text-align:center"><strong>Username</strong></th>
                                                                <th style="text-align:center"><strong>Aksi</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($users as $usr) : ?>
                                                                <tr>
                                                                    <td style="text-align:center" width="100"> 
                                                                        <?= $no++; ?>
                                                                    </td>
                                                                    <td style="text-align:center" width="250">
                                                                        <?php echo $usr->nama ?>
                                                                    </td>
                                                                    <td style="text-align:center" width="250">
                                                                        <?php echo $usr->username ?>
                                                                    </td>
                                                                    <td style="text-align:center" width="250">
                                                                        <a href="<?php echo site_url('users/edit/' . $usr->id_users) ?>" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-fw fa-pen"></i></a>
                                                                        <a onclick="if (confirm('Benarkah ingin menghapus data user ini?')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Hapus" href="<?php echo site_url('users/delete/' . $usr->id_users) ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
					                    </div>
				                    </div>
			                    </div>
		                    </div>
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
<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js')?>"></script>