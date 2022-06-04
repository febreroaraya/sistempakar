<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Bingo One page parallax responsive HTML Template ">

    <meta name="author" content="Themefisher.com">

    <title><?= $title ?></title>

    <!-- Mobile Specific Meta
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- CSS
  ================================================== -->
    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox.min css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/plugins/lightbox2/dist/css/lightbox.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/plugins/slick/slick.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/sweetalert2-all.js"></script>

</head>

<body id="body">

    <!--
  Start Preloader
  ==================================== -->
    <div id="preloader">
        <div class='preloader'>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--
  End Preloader
  ==================================== -->




    <!--
Fixed Navigation
==================================== -->
    <header class="navigation fixed-top">
        <div class="container">
            <!-- main nav -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- logo -->
                <a class="navbar-brand logo" href="index.html">
                    <img class="logo-default" src="<?= base_url() ?>assets/user/images/sistempakar.png" width="100" alt="logo" />
                    <img class="logo-white" src="<?= base_url() ?>assets/user/images/sistempakar.png" height="50" alt="logo" />
                </a>
                <!-- /logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('user') ?>">
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url('user/informasi') ?>">Informasi</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url('user/konsultasi') ?>">Konsultasi</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url('user/kontak') ?>">Kontak</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url('admin/v_login') ?>">Masuk</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /main nav -->
        </div>
    </header>
    <!--
End Fixed Navigation
==================================== -->