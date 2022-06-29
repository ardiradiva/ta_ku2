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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="m-0 font-weight-bold text-primary">Data Supplier</h2>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <!-- <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4"> -->

                        <!-- Card Body -->
                        <div class="card-body">
                            <!------------------------->

                            <div id="wrapper">

                                <div id="content-wrapper">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <form action="<?= base_url() ?>nilai/filter" method="post">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Tahun</label>
                                                            <input type="number" id="tahun" class="form-control" min="2000" max="2100" name="tahun" step="1" value="<?= set_value('tahun') ?>" placeholder="Input Tahun" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Periode</label>
                                                            <input type="number" id="periode" class="form-control" step="1" name="periode" value="<?= set_value('periode') ?>" placeholder="Input Periode" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <button id="filter" class="btn btn-primary mt-2" type="submit">Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                    <a href="<?php echo site_url('nilai/TambahNilai') ?>" class="btn btn-small btn-primary text mb-3"><i class="fas fa-edit"></i>Tambah Nilai</a>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr style="background-color:#f6c23e;">
                                                            <th style="text-align:center">No</th>
                                                            <th style="text-align:center">Nama Supplier</th>
                                                            <th style="text-align:center">Tahun</th>
                                                            <th style="text-align:center">Periode</th>
                                                            <th style="text-align:center">Status</th>

                                                            <th style="text-align:center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--rasa	aroma	warna	aksesibilitas	packaging	konsistensi	harga	fleksibilitas	garansi	jarak	lokasi	legalitas	manajerial	komunikasi-->
                                                        <?php $no = 1;
                                                        foreach ($nilai_supplier as $ns) : ?>
                                                            <tr>
                                                                <td style="text-align:center" width="100">
                                                                    <?= $no++; ?>
                                                                <td style="text-align:center" width="350"><?php echo $ns->nama ?></td>
                                                                <td style="text-align:center" width="350"><?php echo $ns->tahun ?></td>
                                                                <td style="text-align:center" width="350"><?php echo $ns->periode ?></td>
                                                                <td style="text-align:center" class="<?php if ($ns->status == 0) {
                                                                                                            echo "text-danger";
                                                                                                        } else {
                                                                                                            echo "text-success";
                                                                                                        } ?>" width="350"><strong><?php if ($ns->status == 0) {
                                                                                        echo "Belum Dinilai";
                                                                                    } else {
                                                                                        echo "Telah Dinilai";
                                                                                    } ?></strong></td>
                                                                <td style="text-align:center" width="250">
                                                                    <a href="<?php echo site_url('nilai/edit/' . $ns->id_nilai) ?>" class="btn btn-small btn-primary"><i class="fas fa-edit"></i> Nilai</a>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!------- ---->
                                            <div class="row">
                                                <div class="col">
                                                    <!--Tampilkan pagination-->
                                                    <?php echo $pagination; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.container-fluid -->

                                </div>
                                <!-- End of Main Content -->
                            </div>
                            <!-- End of Content Wrapper -->

                            <!-- Scroll to Top Button-->
                            <a class="scroll-to-top rounded" href="#page-top">
                                <i class="fas fa-angle-up"></i>
                            </a>

                            <?php $this->load->view("jsload.php") ?>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#filter').click(function() {
                                        let tahun = $('#tahun').val();
                                        let periode = $('#periode').val();
                                        if (tahun) {
                                            if (periode) {
                                                $.ajax({
                                                    url: "<?= base_url(); ?>auth/add_unit",
                                                    method: "POST",
                                                    data: {
                                                        tahun: tahun,
                                                        periode: periode
                                                    },
                                                    success: function(data) {
                                                        console.log(data);
                                                    }
                                                });
                                            } else {
                                                alert('Periode tidak boleh kosong!')
                                            }
                                        } else {
                                            alert('Tahun tidak boleh kosong!')
                                        }
                                    });
                                });
                                <?php echo $pagination; ?>
                            </script>

</body>

</html>