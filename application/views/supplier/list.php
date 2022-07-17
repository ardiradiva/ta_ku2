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
                                    <h2 class="m-0 font-weight-bold text-primary">Data Supplier</h2>
                                </div>  

                                    <div class="row">

                                        <!-- Card Body -->
                                        <div class="card-body">

                                            <div id="wrapper">

                                                <div id="content-wrapper">

                                                    <!-- DataTables Example -->
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header py-3">
                                                            <a href="<?php echo site_url('supplier/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-plus"></i> Tambah Data Supplier</a>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                                    <!-- <div class="input-group">
                                                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-primary" type="submit">
                                                                                <i class="fas fa-search fa-sm"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div> -->
                                                                </form>
                                                            </div>
                                                            <br>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                    <thead>
                                                                        <tr style="background-color:#f6c23e;">
                                                                            <th style="text-align:center"><strong>No</strong></th>
                                                                            <th style="text-align:center"><strong>Nama Supplier</strong></th>
                                                                            <th style="text-align:center"><strong>Alamat</strong></th>
                                                                            <th style="text-align:center"><strong>HP</strong></th>
                                                                            <th style="text-align:center"><strong>Aksi</strong></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $no = $this->uri->segment(3) + 1;
                                                                        foreach ($supplier as $sup) : ?>
                                                                            <tr>
                                                                                <td style="text-align:center" width="100">
                                                                                    <?= $no++; ?>
                                                                                </td>
                                                                                <td style="text-align:center" width="250">
                                                                                    <?php echo $sup->nama ?>
                                                                                </td>
                                                                                <td style="text-align:center" width="250">
                                                                                    <?php echo $sup->alamat ?>
                                                                                </td>
                                                                                <td style="text-align:center" width="250">
                                                                                    <?php echo $sup->hp ?>
                                                                                </td>
                                                                                <td style="text-align:center" width="250">
                                                                                    <a href="<?php echo site_url('supplier/edit/' . $sup->id_supplier) ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-pen" title="Edit"></i></a>
                                                                                    <a onclick="if (confirm('Benarkah ingin menghapus data supplier ini?')){return true;}else{event.stopPropagation(); event.preventDefault();};" href="<?php echo site_url('supplier/delete/' . $sup->id_supplier) ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>
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