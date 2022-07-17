<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
<div class="table-responsive">
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
        <tbody>
            <!--rasa	aroma	warna	aksesibilitas	packaging	konsistensi	harga	fleksibilitas	garansi	jarak	lokasi	legalitas	manajerial	komunikasi-->
            <?php $no = $this->uri->segment(3) + 1;
            foreach ($nilai_supplier as $ns) : ?>
                <tr>
                    <td style="text-align:center" width="100"><?= $no++; ?>
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
</div>
<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js')?>"></script>