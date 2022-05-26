<?php 
include "../config/koneksi.php";//koneksi ke database
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<style type="text/css" media="print">
table#container {display:none}
div#print_div {
display:block;
left: 0px;
top: 0px;
right: 0px;
bottom: 0px;
position: absolute;
height: 100%;
width: 100%;
}
</style>
	<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' href='style/style.css' type='text/css'  />

	<!--[if lte IE 6]><link rel='stylesheet' href='css/ie6.css' type='text/css' media='all' /><![endif]-->
    <script type="text/javascript" src="javascript/superfish.js" ></script>
    <script type="text/javascript" src="javascript/jquery-1.js" ></script>
	<script type="text/javascript">
            // initialise plugins
            jQuery(function(){
                jQuery('ul.sf-menu').superfish();
            });
        </script>
<title>Sistem Pakar Diabetes Mellitus</title></head>
<body>

<!-- Shell -->	
<div class='shell'>
	
	<!-- Header -->	
 <div id="header1">
	
 </div> 
<div id='header'>  
		<!-- Navigation -->
		<div id='navigation' style='text-transform: uppercase;'>
			<ul>
			    <li><a href="index.php">Beranda</a></li>
                <li><a href='penyakit.html'>Informasi</a></li>
                <li><a href='solusi.html'>Konsultasi</a></li>   
                <li><a href='bukutamu.html'>Kontak</a></li>
                <li><a href='admin/hal_admin/index.php?main=home'>Masuk</a></li>
			</ul>
		</div>

  </div>
	<!-- End Header -->
	   
	<!-- media -->
<div id='media'>
		<div class='cl'>&nbsp;</div>
		<!-- Content -->
        <div id='print_div'>
		<div id='content'>
           <div id="kontenkanan">
              <div class=content> 
 		      <?php include "main_menu.php"; ?>
              </div>
           </div>	
	    </div>
        </div>
		<!-- End Content -->
     		
</div>

	<!-- Footer -->
  <div id='footer'>
       <ul>
         Sistem Pakar Diabetes Mellitus &copy; <?= date('Y')  ?> <a href="#">#</a>
       </ul>
  </div>
	<!-- End Footer -->
</div>	
</body>
</html>