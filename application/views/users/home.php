<?php $this->load->view('users/partials/header.php') ?>
<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(<?= base_url('assets/user/images/slider/medical-team-technology.jpg'); ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Sistem Pakar Deteksi Dini <br>
                        Penyakit Diabetes Militus</h1>
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Silahkan berkonsultasi mengenai penyakit diabetes melitus<br>
                        melalui website yang kami kembangkan</p>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn btn-main" href="<?= base_url('user/konsultasi') ?>">Mulai Konsultasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="service-2 section">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <!-- section title -->
                <div class="title text-center">
                    <h2>Apa itu Sistem Pakar Deteksi Dini Penyakit Diabetes Militus</h2>
                    <p>Sistem pakar deteksi dini penyakit diabetes militus digunakan untuk membantu pengguna untuk mengetahui gejala-gejala yang
                        dialami oleh pengguna terkait penyakit diabetes militus. </p>
                    <div class="border"></div>
                </div>
                <!-- /section title -->
            </div>

            <div class="col-md-4 text-center">
                <img src="<?= base_url() ?>assets/user/images/about/about.png" class="inline-block" alt="">
            </div>
            <div class="col-md-8">
                <div class="row text-center">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="service-item">
                            <i class="tf-ion-ios-briefcase-outline"></i>
                            <h4>SISTEM YANG DIGUNAKAN</h4>
                            <p> Sistem pakar (Expert System) adalah sistem dibuat atau dirancang untuk mengadopsi pengetahuan atau knowledge manusia
                                ke dalam komputer atau sistem. hal tersebut lakukan untuk tujuan agar komputer dapat membatu meneyelesaikan suatu
                                permasalahan tertentu seperti yang dilakukan oleh para ahli / pakar.</p>
                        </div>
                    </div><!-- END COL -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="service-item">
                            <i class="tf-ion-ios-briefcase-outline"></i>
                            <h4>METODE YANG DIGUNAKAN</h4>
                            <p> Sistem pakar dapat dibangun dan dirancang dengan menggunakan beberapa metode yang telah ditemukan oleh para ahli.
                                            salah satunya metode naive bayes yang digunakan pada sistem pakar ini. metode naive bayes digunakan pada sistem 
                                            pakar ini dikarenakan sistem klasifikasi yang digunakan pada naive bayes sangat baik dan memiliki probabilitas yang
                                            tinggi dalam perhitungan pada sistemnya.</p>
                        </div>
                    </div><!-- END COL -->
                </div>
            </div>
        </div> <!-- End row -->
    </div> <!-- End container -->
</section> <!-- End section -->
<?php $this->load->view('users/partials/footer.php') ?>