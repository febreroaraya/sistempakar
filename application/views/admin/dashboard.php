<?php $this->load->view('admin/partials/header.php') ?>

<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-6 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Jumlah Konsultasi</span>
                <div class="count">2500</div>
            </div>
            <div class="col-md-6 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-check"></i> User Belum Di Konfirmasi</span>
                <div class="count">123.50</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
    <div class="col">
        <h2 style="color: #07A1C8;">
            Selamat Datang, <?php echo $this->session->userdata('username') ?>
        </h2>
        <h4 style=" margin-left: 80%;">
            <script type='text/javascript'>
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

                var date = new Date();

                var day = date.getDate();

                var month = date.getMonth();

                var thisDay = date.getDay(),

                    thisDay = myDays[thisDay];
                var yy = date.getYear();


                var year = (yy < 1000) ? yy + 1900 : yy;

                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            </script>
        </h4>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-4 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sistem Pakar Diagnosa Penyakit Diabetes Meellitus</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>SISTEM YANG DIGUNAKAN</a>
                                        </h2>
                                        <p class="excerpt">
                                            Sistem pakar (Expert System) adalah sistem dibuat atau dirancang untuk mengadopsi pengetahuan atau knowledge manusia
                                            ke dalam komputer atau sistem. hal tersebut lakukan untuk tujuan agar komputer dapat membatu meneyelesaikan suatu 
                                            permasalahan tertentu seperti yang dilakukan oleh para ahli / pakar.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>METODE YANG DIGUNAKAN</a>
                                        </h2>
                                        <p class="excerpt">
                                            Sistem pakar dapat dibangun dan dirancang dengan menggunakan beberapa metode yang telah ditemukan oleh para ahli.
                                            salah satunya metode naive bayes yang digunakan pada sistem pakar ini. metode naive bayes digunakan pada sistem 
                                            pakar ini dikarenakan sistem klasifikasi yang digunakan pada naive bayes sangat baik dan memiliki probabilitas yang
                                            tinggi dalam perhitungan pada sistemnya
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/partials/footer.php') ?>