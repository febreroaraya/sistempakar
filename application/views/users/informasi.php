<?php $this->load->view('users/partials/header.php') ?>
<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Informasi</h2>
                <!-- <ol class="breadcrumb header-bradcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Informasi</li>
                </ol> -->
            </div>
        </div>
    </div>
</section>
<section class="portfolio section-sm" id="portfolio">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <!-- section title -->
                <div class="title text-center">
                    <h2>Daftar Penyakit Terdaftar</h2>
                </div>
                <!-- /section title -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pencegahan</th>
                            <th>Pengobatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penyakit as $p) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p->nm_penyakit ?></td>
                                <td><?= $p->pencegahan ?></td>
                                <td><?= $p->pengobatan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row ">
            <div class="col-lg-12">
                <!-- section title -->
                <div class="title text-center">
                    <h2>Daftar Diagnosa Terakhir</h2>
                </div>
                <!-- /section title -->
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Diagnosa</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Alamat</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($diagnosa as $d) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d->kd_diagnosa ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->jenis_kelamin ?></td>
                                <td><?= $d->usia ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->tgl_diagnosa ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?php $this->load->view('users/partials/footer.php') ?>