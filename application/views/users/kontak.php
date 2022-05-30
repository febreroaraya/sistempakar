<?php $this->load->view('users/partials/header.php') ?>
<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Kontak</h2>
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
                    <h2>Kontak Admin</h2>
                </div>
                <form action="<?= base_url('user/save_pesan') ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pesan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="pesan" rows="3"></textarea>
                    </div>
                    <button type="submit" style="margin-left: 45%;" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    <?php if ($this->session->flashdata('berhasil_terkirim')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data pesan berhasil dikirim',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('users/partials/footer.php') ?>