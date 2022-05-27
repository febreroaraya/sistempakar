<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Login</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/admin/build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/sweetalert2-all.js"></script>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?= base_url('admin/login') ?>" method="post">
                        <h1>Form Login</h1>
                        <div>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="text" class="form-control" placeholder="Username" name="username" />
                        </div>
                        <div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            <input type="password" class="form-control" placeholder="Password" name="password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-desktop"></i> Sistem pakar deteksi dini penyakit diabetes mellitus!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Website by febrero araya</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
<script>
    <?php if ($this->session->flashdata('gagal')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal untuk login!',
            text: 'silahkan tunggu konfirmasi dari admin',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('passwordsalah')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Password anda masukkan salah!',
            text: 'silahkan coba lagi',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('usernamesalah')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Username anda masukkan salah!',
            text: 'silahkan coba lagi',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('logout')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Anda berhasil logout',
            text: 'silahkan login untuk masuk kembali',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('gagal')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Maaf anda gagal mengganti password!',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>

</html>