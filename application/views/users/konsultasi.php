<?php $this->load->view('users/partials/header.php') ?>
<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Konsultasi</h2>
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
        <form action="<?= base_url('user/proses_diagnosa') ?>" method="post">
            <div class="row">
                <div class="col-lg-9">
                    <!-- section title -->
                    <div class="title text-center">
                        <h2>Data Pasien</h2>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Kelamin</label>
                        <br>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-Laki &nbsp;&nbsp;
                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Usia</label>
                        <input type="number" class="form-control" name="usia" placeholder="Usia" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-9">
                    <!-- section title -->
                    <div class="title text-center">
                        <h2>Pilih Gejala Yang Dialami</h2>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($gejala as $g) {
                                $no++; ?>
                                <tr>
                                    <td><?= $g->kd_gejala ?></td>
                                    <td hidden><input name="id_gejala[]" value=<?= $g->kd_gejala ?> /></td>
                                    <td><?= $g->nm_gejala ?></td>
                                    <td>
                                        <?php
                                        $tmp = ['YA', 'TIDAK'];
                                        foreach ($tmp as $t) { ?>
                                            <input type="checkbox" name="jwb_gejala[]" value=<?= $t ?>> <?= $t ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" style="margin-left: 45%;"> Diagnosa</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('tidak_terdeteksi')) : ?>
        Swal.fire({
            icon: 'info',
            title: 'Anda tidak terdeteksi penyakit silahkan coba lagi!',
            showConfirmButton: true,
            // timer: 1500
        })
        <?php elseif ($this->session->flashdata('belum_pilih')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Anda belum memilih gejala!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>

<?php $this->load->view('users/partials/footer.php') ?>