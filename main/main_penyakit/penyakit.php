<style type="text/css">
.style1 {
	color: #336699;
}
</style>
<span class="style1"></span>
<?php

echo "
<div class=judul><h2>Daftar Penyakit Terdaftar</h2></div>
<br/><br/><br/>"; 
	
	$sql=mysql_query("SELECT * FROM penyakit");
	$no=1; 
	echo "<br/>
	<table id=o width=100%><tbody> <tr>
			  <th class=th>No</th>
			  <th class=th>Nama</th>
			  <th class=th>Pencegahan</th>
			  <th class=th>Pengobatan</th>
	      </tr>";
    while($q=mysql_fetch_array($sql)){
	if (($no % 2) > 0)
            $bg = '#ffffff'; else
            $bg = '#f5f5f5';
       echo "	         
         
		  <tr bgcolor=" . $bg . ">
		      <td class=td align=center>$no</td>
              <td class=td>$q[nm_penyakit]</td>
              <td class=td>$q[pencegahan]</td>
              <td class=td>$q[pengobatan]</td>  
		 </tr>";
		 $no++;
		 }
		 echo"</tbody></table><hr><br/>";


echo "
<div class=judul><h2>Daftar Diagnosa Terakhir</h2></div>
<br/><br/><br/>"; 
	
	$sql=mysql_query("SELECT * FROM diagnosa");
	$no=1; 
	echo "<br/>
	<table id=o width=100%><tbody> <tr>
			  <th class=th>No</th>
			  <th class=th>Kode Diagnosa</th>
			  <th class=th>Nama</th>
			  <th class=th>Jenis Kelamin</th>
			  <th class=th>Usia</th>
			  <th class=th>Alamat</th>
			  <th class=th>Tanggal</th>
	      </tr>";
    while($q=mysql_fetch_array($sql)){
	if (($no % 2) > 0)
            $bg = '#ffffff'; else
            $bg = '#f5f5f5';
       echo "	         
         
		  <tr bgcolor=" . $bg . ">
		      <td class=td align=center>$no</td>
              <td class=td align=center>$q[kd_diagnosa]</td>
              <td class=td>$q[nama]</td>
              <td class=td>$q[jenis_kelamin]</td> 
              <td class=td align=center>$q[usia]</td>
              <td class=td>$q[alamat]</td>
              <td class=td>$q[tgl_diagnosa]</td> 
		 </tr>";
		 $no++;
		 }
		 echo"</tbody></table><hr>";

?>