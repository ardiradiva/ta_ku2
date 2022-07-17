<!doctype html>
<html><head>
    <style>
        table {
            border-collapse: collapse;
        }
        table td {
            border: 1.3px solid black;
            background-color: #0000ff66;
        } 
        table tr {
            border: 0px solid black;
            background-color: #0000ff66;
        }

        table th {
            border: 1.3px solid black;
            background-color: #0000ff66;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Laporan Hasil Rekomendasi</title>
</head><body>
    <div align="center" style="margin-bottom: 10px;">
        <?php
            $path = base_url("assets/img/logoku.jpg");
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img src="<?php echo $base64?>" width="150" height="150" style="position: absolute; top: 5px; object-fit: cover;">
        <h2>PENGEPUL MADU HUTAN</h2>
        <h2 style="margin-top: 0px; margin-bottom: 0px;">SUPLIER MADU BUDIDAYA</h2>
        <h2 style="margin-top: 0px; margin-bottom: 0px;">PRODUSEN MADU HERBAL</h2>
        <div style="height: 10px;"></div>
        <span style="margin-top: 0px;">Kenari Residence J No. 1, RW 1, Tambaksari, Tambakrejo, Kec. Waru</span><br>
        <span>Kabupaten Sidoarjo, Jawa Timur 61256</span>
    </div>
    <br>
    <p></p>
    <div style="width: 100%; background-color: black; height: 3px;"></div>
    <div style="width: 100%; background-color: black; height: 1px; margin-top: 1px;"></div>
    <div align="center">
        <h2 style="margin-top: 5px;">Hasil Rekomendasi Supplier Madu Tahun <?php echo $ttahun; ?> dan Periode <?php echo $tperiode; ?></h2>
    </div>
    <div>
        <div>
            <h3>Data Bobot Kriteria</h3>
        </div>
        <div style="margin-top: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr style="background-color:#FFD700;">
                    <?php
                    for ($i = 1; $i <= 14; $i++) {
                        echo "<th>K$i</th>";
                    }
                    ?>

                    <?php
                    $all_bobot = array();
                    $sum_bobot = 0;
                    foreach ($bobot as $bobot) :

                        $b_rasa = $bobot->rasa;
                        $b_aroma = $bobot->aroma;
                        $b_warna = $bobot->warna;
                        $b_aksesibilitas = $bobot->aksesibilitas;
                        $b_packaging = $bobot->packaging;
                        $b_konsistensi = $bobot->konsistensi;
                        $b_harga = $bobot->harga;
                        $b_fleksibilitas = $bobot->fleksibilitas;
                        $b_garansi = $bobot->garansi;
                        $b_jarak = $bobot->jarak;
                        $b_lokasi = $bobot->lokasi;
                        $b_legalitas = $bobot->legalitas;
                        $b_manajerial = $bobot->manajerial;
                        $b_komunikasi = $bobot->komunikasi;


                    ?>
                </tr>
                <tr>
                    <td style="text-align:center;"><?php echo $b_rasa ?></td>
                    <td style="text-align: center;"><?php echo $b_aroma ?></td>
                    <td style="text-align: center;"><?php echo $b_warna ?></td>
                    <td style="text-align: center;"><?php echo $b_aksesibilitas ?></td>
                    <td style="text-align: center;"><?php echo $b_packaging ?></td>
                    <td style="text-align: center;"><?php echo $b_konsistensi ?></td>
                    <td style="text-align: center;"><?php echo $b_harga ?></td>
                    <td style="text-align: center;"><?php echo $b_fleksibilitas ?></td>
                    <td style="text-align: center;"><?php echo $b_garansi ?></td>
                    <td style="text-align: center;"><?php echo $b_jarak ?></td>
                    <td style="text-align: center;"><?php echo $b_lokasi ?></td>
                    <td style="text-align: center;"><?php echo $b_legalitas ?></td>
                    <td style="text-align: center;"><?php echo $b_manajerial ?></td>
                    <td style="text-align: center;"><?php echo $b_komunikasi ?></td>
                </tr>
                <?php
                    $sum_bobot = $bobot->rasa + $bobot->aroma + $bobot->warna + $bobot->aksesibilitas + $bobot->packaging + $bobot->konsistensi + $bobot->harga + $bobot->fleksibilitas + $bobot->garansi + $bobot->jarak + $bobot->lokasi + $bobot->legalitas + $bobot->manajerial + $bobot->komunikasi;
                        endforeach; ?>

            </table>
        </div>
    </div>
    <div>
        <div>
            <h3>Data Alternatif</h3>
        </div>
        <div style="margin-top: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr style="background-color:#FFD700;">
                    <?php
                    echo "<th>Nama Supplier</th>";
                    for ($i = 1; $i <= 14; $i++) {
                        echo "<th>K$i</th>";
                    }
                    ?>
                </tr>
                    <?php
                    $alt_nama = array();
                    $alt_rasa = array();
                    $alt_aroma = array();
                    $alt_warna = array();
                    $alt_aksesibilitas = array();
                    $alt_packaging = array();
                    $alt_konsistensi = array();
                    $alt_harga = array();
                    $alt_fleksibilitas = array();
                    $alt_garansi = array();
                    $alt_jarak = array();
                    $alt_lokasi = array();
                    $alt_legalitas = array();
                    $alt_manajerial = array();
                    $alt_komunikasi = array();
                    $n_alt = 0;
                    foreach ($nilai_supplier as $ns) :
                        if ($ns->tahun == $ttahun && $ns->periode == $tperiode) {
                            $alt_nama[] = $ns->nama;
                            $alt_rasa[] = $ns->rasa;
                            $alt_aroma[] = $ns->aroma;
                            $alt_warna[] = $ns->warna;
                            $alt_aksesibilitas[] = $ns->aksesibilitas;
                            $alt_packaging[] = $ns->packaging;
                            $alt_konsistensi[] = $ns->konsistensi;
                            $alt_harga[] = $ns->harga;
                            $alt_fleksibilitas[] = $ns->fleksibilitas;
                            $alt_garansi[] = $ns->garansi;
                            $alt_jarak[] = $ns->jarak;
                            $alt_lokasi[] = $ns->lokasi;
                            $alt_legalitas[] = $ns->legalitas;
                            $alt_manajerial[] = $ns->manajerial;
                            $alt_komunikasi[] = $ns->komunikasi;
                    ?>
                <tr>
                      <td style="text-align:center" width="100"><?php echo $alt_nama[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_rasa[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_aroma[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_warna[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_aksesibilitas[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_packaging[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_konsistensi[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_harga[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_fleksibilitas[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_garansi[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_jarak[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_lokasi[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_legalitas[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_manajerial[$n_alt] ?></td>
                      <td style="text-align:center" width="30"><?php echo $alt_komunikasi[$n_alt] ?></td>
                </tr>
                    <?php $n_alt++;
                    }
                endforeach; ?>
            </table>
        </div>
    </div>
    <?php
        foreach ($bobot as $bobot) :

            $norm_rasa = round($b_rasa / $sum_bobot, 3);
            $norm_aroma = round($b_aroma / $sum_bobot, 3);
            $norm_warna = round($b_warna / $sum_bobot, 3);
            $norm_aksesibilitas = round($b_aksesibilitas / $sum_bobot, 3);
            $norm_packaging = round($b_packaging / $sum_bobot, 3);
            $norm_konsistensi = round($b_konsistensi / $sum_bobot, 3);
            $norm_harga = round($b_harga / $sum_bobot, 3);
            $norm_fleksibilitas = round($b_fleksibilitas / $sum_bobot, 3);
            $norm_garansi = round($b_garansi / $sum_bobot, 3);
            $norm_jarak = round($b_jarak / $sum_bobot, 3);
            $norm_lokasi = round($b_lokasi / $sum_bobot, 3);
            $norm_legalitas = round($b_legalitas / $sum_bobot, 3);
            $norm_manajerial = round($b_manajerial / $sum_bobot, 3);
            $norm_komunikasi = round($b_komunikasi / $sum_bobot, 3);

        endforeach; ?>
    <div>
        <div>
            <h3>Normalisasi Bobot (Wj)</h3>
        </div>
        <div style="margin-top: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <?php

                        for ($i = 1; $i <= 14; $i++) {
                            echo "<th>K$i</th>";
                        }

                    ?>
                </tr>
                <tr>
					<td><?php echo number_format($norm_rasa,4) ?></td>
					<td><?php echo number_format($norm_aroma,4) ?></td>
					<td><?php echo number_format($norm_warna,4) ?></td>
					<td><?php echo number_format($norm_aksesibilitas,4) ?></td>
					<td><?php echo number_format($norm_packaging,4) ?></td>
					<td><?php echo number_format($norm_konsistensi,4) ?></td>
					<td><?php echo number_format($norm_harga,4) ?></td>
					<td><?php echo number_format($norm_fleksibilitas,4) ?></td>
				    <td><?php echo number_format($norm_garansi,4) ?></td>
					<td><?php echo number_format($norm_jarak,4) ?></td>
					<td><?php echo number_format($norm_lokasi,4) ?></td>
					<td><?php echo number_format($norm_legalitas,4) ?></td>
					<td><?php echo number_format($norm_manajerial,4) ?></td>
					<td><?php echo number_format($norm_komunikasi,4) ?></td>
				</tr>
            </table>
        </div>
    </div>
    <div>
        <div>
            <h3>Perhitungan Vektor S</h3>
        </div>
        <div style="margin-top: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr style="background-color:#FFD700;">
					<?php
                        $total_s = 0;
                        echo "<th>Nama Supplier</th>";
                        for ($i = 1; $i <= 14; $i++) {
                            echo "<th>K$i</th>";
                        }
                        echo "<th>Vektor S</th>";
                    ?>
                </tr>
					    <?php
                        $s_rasa = array();
                        $s_aroma = array();
                        $s_warna = array();
                        $s_aksesibilitas = array();
                        $s_packaging = array();
                        $s_konsistensi = array();
                        $s_harga = array();
                        $s_fleksibilitas = array();
                        $s_garansi = array();
                        $s_jarak = array();
                        $s_lokasi = array();
                        $s_legalitas = array();
                        $s_manajerial = array();
                        $s_komunikasi = array();
                        $n_s = 0;
                        $sum_s = array();

                        for ($i = 0; $i < $n_alt; $i++) {
                            $s_rasa[] = round(pow($alt_rasa[$n_s], $norm_rasa), 3);
                            $s_aroma[] = round(pow($alt_aroma[$n_s], $norm_aroma), 3);
                            $s_warna[] = round(pow($alt_warna[$n_s], $norm_warna), 3);
                            $s_aksesibilitas[] = round(pow($alt_aksesibilitas[$n_s], $norm_aksesibilitas), 3);
                            $s_packaging[] = round(pow($alt_packaging[$n_s], $norm_packaging), 3);
                            $s_konsistensi[] = round(pow($alt_konsistensi[$n_s], $norm_konsistensi), 3);
                            $s_harga[] = round(pow($alt_harga[$n_s], $norm_harga * (-1)), 3);
                            $s_fleksibilitas[] = round(pow($alt_fleksibilitas[$n_s], $norm_fleksibilitas), 3);
                            $s_garansi[] = round(pow($alt_garansi[$n_s], $norm_garansi), 3);
                            $s_jarak[] = round(pow($alt_jarak[$n_s], $norm_jarak * (-1)), 3);
                            $s_lokasi[] = round(pow($alt_lokasi[$n_s], $norm_lokasi), 3);
                            $s_legalitas[] = round(pow($alt_legalitas[$n_s], $norm_legalitas), 3);
                            $s_manajerial[] = round(pow($alt_manajerial[$n_s], $norm_manajerial), 3);
                            $s_komunikasi[] = round(pow($alt_komunikasi[$n_s], $norm_komunikasi), 3);

                            $sum_s[$n_s] = round(pow($alt_rasa[$n_s], $norm_rasa),3) * round(pow($alt_aroma[$n_s], $norm_aroma),3) 
                            * round(pow($alt_warna[$n_s], $norm_warna),3) * round(pow($alt_aksesibilitas[$n_s], $norm_aksesibilitas),3) 
                            * round(pow($alt_packaging[$n_s], $norm_packaging),3) * round(pow($alt_konsistensi[$n_s], $norm_konsistensi),3) 
                            * round(pow($alt_harga[$n_s], $norm_harga * (-1)),3) * round(pow($alt_fleksibilitas[$n_s], $norm_fleksibilitas),3) 
                            * round(pow($alt_garansi[$n_s], $norm_garansi),3) * round(pow($alt_jarak[$n_s], $norm_jarak * (-1)),3) 
                            * round(pow($alt_lokasi[$n_s], $norm_lokasi),3) * round(pow($alt_legalitas[$n_s], $norm_legalitas),3) 
                            * round(pow($alt_manajerial[$n_s], $norm_manajerial),3) * round(pow($alt_komunikasi[$n_s], $norm_komunikasi),3);
                            $total_s += $sum_s[$n_s];
                        ?>
                    <tr>
                        <td style="text-align:center" width="40"><?php echo $alt_nama[$n_s] ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_rasa[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_aroma[$n_s] ,4)?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_warna[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_aksesibilitas[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_packaging[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_konsistensi[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_harga[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_fleksibilitas[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_garansi[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_jarak[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_lokasi[$n_s],4)?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_legalitas[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_manajerial[$n_s],4) ?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($s_komunikasi[$n_s],4)?></td>
                        <td style="text-align:center" width="40"><?php echo number_format($sum_s[$n_s],4) ?></td>
                    </tr>
                <?php
                            
                        $n_s++;
                        } ?>
	        </table>
        </div>
    </div>
    <div>
        <div>
            <h3>Perhitungan Vektor V</h3>
        </div>
        <div style="margin-top: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <?php
                        echo "<th>Nama Supplier</th>";
                        echo "<th>Vektor S </th>";
                        echo "<th>Vektor V</th>";
                        ?>
                        <?php
                        $hasil = array();
                        $v = array();
                        $n_v = 0;
                        for ($i = 0; $i < $n_alt; $i++) {
                            $v[] = round($sum_s[$n_v] / $total_s, 4);
                            $hasil[] = array("supplier" => $alt_nama[$n_v], "S" => $sum_s[$n_v], "V" => $v[$n_v]);
                    ?>
                </tr>
                <tr>
                <td style="text-align:center" width="50"><?php echo $alt_nama[$n_v] ?></td>
				<td style="text-align:center" width="50"><?php echo number_format(round($sum_s[$n_v], 4),4) ?></td>
				<td style="text-align:center" width="50"><?php echo number_format(round($v[$n_v], 4),4) ?></td>
                </tr>
                <?php
                    $n_v++;
                    }
                    $keys = array_column($hasil, 'V');
                    array_multisort($keys, SORT_DESC, $hasil);
                ?>
            </table>
        </div>
    </div>
    <div>
        <?php //echo $total_s;
            $tertinggi=null;
            $terendah=null;
        ?>
        <div>
            <h3>Perangkingan Supplier</h3>
        </div>
        <div style="margin-top: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <?php
                        echo "<th>Rangking</th>";
                        echo "<th>Nama Supplier</th>";
                        echo "<th>Vektor V</th>";
                        $v = array();
                        $n_v = 0;
                        for ($i = 0; $i < count($hasil); $i++) {
                            if($tertinggi==null){
                                $tertinggi=$hasil[$i]['supplier'];
                             }
                                $terendah=$hasil[$i]['supplier'];
                    ?>
                </tr>
                <tr>
                    <td style="text-align:center" width="50"><?php echo ($i + 1); ?></td>
                    <td style="text-align:center" width="50"><?php echo $hasil[$i]['supplier'] ?></td>
                    <td style="text-align:center" width="50"><?php echo $hasil[$i]['V'] ?></td>
                </tr>
                <?php
                    $n_v++;
                    }
                ?>
			</table>
        </div>
    </div>
    <div>
        <div>
            <h3>Kesimpulan Hasil</h3>
        </div>
        <div style="margin-top: 10px;">
            Hasil Rekomendasi Supplier Madu Budidaya Pada Tahun <?php echo $ttahun; ?> dan Periode <?php echo $tperiode; ?> Menghasilkan Supplier <?php echo $tertinggi;?> sebagai supplier dengan Nilai Tertinggi dan Supplier  <?php echo $terendah;?> dengan Nilai Terendah
        </div>
    </div>
</body></html>