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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="m-0 font-weight-bold text-primary">Penilaian Kriteria Supplier</h2>
                    </div>

                    <div class="row">

                        <!-- Card Body -->
                        <div class="card-body">
                            <!------------------------->

                            <div id="wrapper">

                                <div id="content-wrapper">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <!-- <form action="<?= base_url() ?>nilai/filter" method="post" id="form-filter"> -->
                                                <div class="row align-items-center">
                                                    <div class="col-sm-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label for="">Tahun</label>
                                                            <input type="number" id="tahun" class="form-control" min="2000" max="2100" name="tahun" step="1" placeholder="Input Tahun" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label for="">Periode</label>
                                                            <input type="number" id="periode" class="form-control" step="1" name="periode" placeholder="Input Periode" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-6 mt-3">
                                                        <div class="d-md-flex">
                                                            <div class="col-md-6 col py-2">
                                                                <button id="filter" class="btn btn-primary col-12" type="submit"><i class="fas fa-search mr-2"></i>Filter</button>
                                                            </div>
                                                            <div class="col-md-6 col py-2">
                                                                <a href="<?php echo site_url('nilai/TambahNilai') ?>" class="btn btn-warning col-12"><i class="fas fa-fw fa-plus"></i> Tambah Nilai</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                    
                                                    <!-- <div class="input-group">
                                                        <input type="text" class="form-control bg-light border-0 small">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>   
                                                        </div>
                                                    </div> -->
                                                </form>
                                            </div>
                                            <!-- <br> -->
                                            <!-- <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr style="background-color:#f6c23e;">
                                                            <th style="text-align:center">No</th>
                                                            <th style="text-align:center">Nama Supplier</th>
                                                            <th style="text-align:center">Tahun</th>
                                                            <th style="text-align:center">Periode</th>
                                                            <th style="text-align:center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> -->
                                                        <!--rasa	aroma	warna	aksesibilitas	packaging	konsistensi	harga	fleksibilitas	garansi	jarak	lokasi	legalitas	manajerial	komunikasi-->
                                                        <!-- <?php $no = $this->uri->segment(3) + 1;
                                                        foreach ($nilai_supplier as $ns) : ?>
                                                            <tr>
                                                                <td style="text-align:center" width="100">
                                                                    <?= $no++; ?>
                                                                <td style="text-align:center" width="350"><?php echo $ns->nama ?></td>
                                                                <td style="text-align:center" width="350"><?php echo $ns->tahun ?></td>
                                                                <td style="text-align:center" width="350"><?php echo $ns->periode ?></td>
                                                                <td style="text-align:center" width="250">
                                                                    <a href="<?php echo site_url('nilai/edit/' . $ns->id_nilai) ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-pen" title="Edit Nilai"></i></a>
                                                                    <a onclick="if (confirm('Benarkah ingin menghapus?')){return true;}else{event.stopPropagation(); event.preventDefault();};" href="<?php echo site_url('nilai/delete/' . $ns->id_nilai) ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div> -->

                                            <div id="tempel-tabel"></div>
                                            <!-- <div class="row">
                                                <div class="col" id="pagination">
                                                    <?php echo $pagination; ?>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Scroll to Top Button-->
                            <a class="scroll-to-top rounded" href="#page-top">
                                <i class="fas fa-angle-up"></i>
                            </a>

                            <?php $this->load->view("jsload.php") ?>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $.ajax({
                                        url: "<?= base_url(); ?>Nilai/load_awal",
                                        success: function(data) {
                                            $('#tempel-tabel').html(data);
                                        }
                                    });

                                    $('#filter').click(function() {
                                        let tahun = $('#tahun').val();
                                        let periode = $('#periode').val();
                                        if (tahun) {
                                            if (periode) {
                                                $.ajax({
                                                    url: "<?= base_url(); ?>Nilai/filter",
                                                    method: "POST",
                                                    data: {
                                                        tahun: tahun,
                                                        periode: periode
                                                    },
                                                    success: function(data) {
                                                        $('#tempel-tabel').html(data);
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
                            </script>

    </body>

</html>