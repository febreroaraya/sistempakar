<?php $this->load->view('users/partials/header.php') ?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_spdiabetes");
?>
<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Hasil Diagnosa</h2>
                <!-- <ol class="breadcrumb header-bradcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Informasi</li>
                </ol> -->
            </div>
        </div>
    </div>
</section>
<section class="portfolio section-sm" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- section title -->
                <div class="title text-center">
                    <h2>Data Pasien</h2>
                </div>
            </div>
            <div class="card" style="width: 25rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama : <?= $pasien['nama'] ?></li>
                    <li class="list-group-item">Jenis Kelamin : <?= $pasien['jenis_kelamin'] ?></li>
                    <li class="list-group-item">Usia : <?= $pasien['usia'] ?></li>
                    <li class="list-group-item">Alamat : <?= $pasien['alamat'] ?></li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- section title -->
                <div class="title text-center">
                    <h2>Hasil Diagnosa Metode Naive Bayes</h2>
                </div>
            </div>
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    Gejala yang dialami:
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($gejala_pilihan as $gejala_pilihan) { ?>
                        <li class="list-group-item"><?= $gejala_pilihan->kd_gejala ?> : <?= $gejala_pilihan->nm_gejala ?></li>
                    <?php } ?>
                </ul>
            </div>
            <br>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- section title -->
                <div class="title text-center">
                    <h4>Step 4:</h4>
                </div>
            </div>
            <?php
            $Hi = 1;
            $h = 0;
            $PH = 0;
            foreach ($penyakit as $penyakit) {
                if (count($gejala2) <= 0) {
                    $Em = 0;
                } else {
                    $Em = 1;
                } ?>
                <div class="card" style="width: 50rem;">
                    <div class="card-header">
                        <?= $penyakit->nm_penyakit ?>
                    </div>
                    <?php foreach ($gejala_pilihan2 as $gejala) {
                        $aturanSql  = "SELECT * FROM aturan WHERE kd_penyakit='$penyakit->kd_penyakit' AND kd_gejala='" . $gejala->kd_gejala . "'";
                        $aturanQry  = mysqli_query($koneksi, $aturanSql);
                        $aturanData = mysqli_fetch_array($aturanQry);
                    ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $aturanData['kd_gejala']; ?> . Probabilitas : <?= $aturanData['nilai_probabilitas']; ?></li>
                        </ul>
                    <?php
                        if ($this->db->query($aturanSql)->num_rows() >= 1) {
                            // $Em = $this->m_user->calcKali($Em, $nilai_probabilitas);
                            $Em = $Em * $aturanData['nilai_probabilitas'];
                        } else {
                            // Jika tidak ada, atau bernilai 0.0000
                            // $Em = $this->m_user->calcKali($Em, 0.0000);
                            $Em = $Em * 0.0000;
                        }
                    }
                    // $Hi = $this->m_user->calcKali($Em, $np_populasi);
                    $Hi = $Em * $penyakit->np_populasi;
                    // $PH = $this->m_user->calcTambah($PH, $Hi);
                    $PH = $PH + $Hi;

                    // Simpan hasil kali ke variabel Array $hiHasil[Hx]
                    $HiHasil[$penyakit->kd_penyakit] = $Hi;
                    ?>
                    <div class="card-footer">
                        <li class="list-group-item">Hasil p(E01, E02, .. En) = <?= $Em ?></li>
                        <br>
                        <li class="list-group-item">Populasi Penyakit <?= $penyakit->kd_penyakit ?> = <?= $penyakit->np_populasi ?></li>
                        <li class="list-group-item">p(E01 | Hi) x p(E01 | Hi) x p(En | Hi) : <?= $Em ?> * <?= $penyakit->np_populasi ?> = <?= $Hi ?></li>
                    </div>
                </div>
                <br>
            <?php } ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- section title -->
                <div class="title text-center">
                    <h4>Step 5:</h4>
                    <!-- <p>Pembagi = <?= $PH ?></p> -->
                </div>
            </div>
            <div class="card" style="width: 50rem;">
                <div class="card-header">
                    Pembagi = <?= $PH ?>
                </div>
                <?php
                $PHitung = array();
                foreach ($HiHasil as $kode => $nilai) {
                    $PHitung[$kode] = ($nilai / $PH);
                    $hasill = $nilai / $PH;
                ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Hasil dari <?= $kode ?> :</li>
                        <li class="list-group-item">p(Hi | E01, E02, En) : <?= $nilai ?> / <?= $PH ?> = <?= round($hasill, 6) ?></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- section title -->
                <div class="title text-center">
                    <h4>Step 6:</h4>
                </div>
            </div>

            <div class="card" style="width: 50rem;">
                <?php
                $ID        = str_replace(".", "", $_SERVER['REMOTE_ADDR']);
                $maxSql = "SELECT * FROM tmp_diagnosa WHERE hasil_hitung=(SELECT MAX(hasil_hitung) FROM tmp_diagnosa WHERE ID='$ID') AND ID='$ID'";
                $maxHsl = $this->db->query($maxSql)->result();
                foreach ($maxHsl as $maxHsl) {
                    $maxHasil = $maxHsl->hasil_hitung;
                    // var_dump($maxHasil);
                    $penyakit2Sql = "SELECT * FROM penyakit WHERE kd_penyakit='$maxHsl->kd_penyakit'";
                    $penyakit2Hsl = $this->db->query($penyakit2Sql)->result();
                    foreach ($penyakit2Hsl as $penyakit2) {
                        $nama_penyakit = $penyakit2->nm_penyakit;
                        if ($maxHasil < 0) {
                            $hasil = "Tidak diketahui";
                        } elseif ($maxHasil == -1) {
                            $hasil = "Negatif";
                        } elseif ($maxHasil >  -1 && $maxHasil <= -0.8) {
                            $hasil = "Negatif";
                        } elseif ($maxHasil >  -0.8 && $maxHasil <= -0.6) {
                            $hasil = "Negatif";
                        } elseif ($maxHasil >  -0.6 && $maxHasil <= -0.4) {
                            $hasil = "Negatif";
                        } elseif ($maxHasil >  -0.4 && $maxHasil <= -0.2) {
                            $hasil = "Negatif";
                        } elseif ($maxHasil >  -0.2 && $maxHasil <= -0.2) {
                            $hasil = "Negatif";
                        } elseif ($maxHasil >  0.2 && $maxHasil <= 0.4) {
                            $hasil = "Positif";
                        } elseif ($maxHasil >  0.4 && $maxHasil <= 0.6) {
                            $hasil = "Positif";
                        } else if ($maxHasil >  0.6 && $maxHasil <= 0.8) {
                            $hasil = "Positif";
                        } else if ($maxHasil >  0.8 && $maxHasil <= 1) {
                            $hasil = "Positif";
                        } else if ($maxHasil > 1) {
                            $hasil = "Tidak diketahui";
                        }
                        // var_dump($nama_penyakit)
                ?>
                        <div class="card-header">
                            Kesimpulan diambil paling besar Max(H01, Hn) dengan kode penyakit <b> <?= $maxHsl->kd_penyakit ?>= <?= $maxHasil ?> (<?= $nama_penyakit ?>) </b>
                        </div>
                        <div class="card-header">
                            <b>Step 7:</b>
                        </div>
                        <li class="list-group-item">Pasien <b><?= $hasil ?></b> menderita penyakit <b><?= $nama_penyakit ?></b> dengan nilai probabilitas <b><?= $maxHasil ?></b></li>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('users/partials/footer.php') ?>