<!-- DIBUAT NOPEN RIANTO -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/logo.png"/>
   <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak rekap</title>
</head>

<style type="text/css" media="print">

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;

}
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;


}
</style>

<body onload="window.print();">
     <table>
        <tr>
          <td width="20%"><img src="../../images/logo.png" alt="" style="width:100px;height:80px;"></div></td>
          <td width="80%">
          
    <h4><b>REKAP DATA BENCANA ALAM PER JENIS BENCANA</b></h4>
    <h5><b>BADAN PENANGGULANGAN BENCANA DAERAH PROVINSI SUMATERA BARAT</b></h5>
    <p>Jl.Jendral Sudirman No.47  , Telp: (0751) 890720 , Email: bpbd@sumbarprov.go.id </p>

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
 <center><b>Tahun :</b> <?php echo $_GET["thn"]; ?></center>
 <br>
  </div>

  <div style="width: 100%;float: left">
    <table kd="example1" class="table table-bordered table-striped">
                      
                     <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Jenis</th>
                        <th>Januari</th>
                        <th>Februari</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                        <th>Juli</th>
                        <th>Agustus</th>
                        <th>September</th>
                        <th>Oktober</th>
                        <th>November</th>
                        <th>Desember</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                       include '../../koneksi/koneksi.php'; 

                              
                     $sql=mysqli_query($koneksi,"SELECT * FROM jenis_bencana ORDER BY nm_jenis ASC");
                   
                        $no=0;$total=0;
                         if(empty($_GET['thn'])){
                          $th=date('Y');
                        }else{
                          $th=$_GET['thn'];
                        }
                        while($q=mysqli_fetch_array($sql)){
                        $no++
                        
                     
                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['nm_jenis']; ?></td>
                        <td>
                          <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='1' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?>
                        </td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='2' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='3' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='4' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='5' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='6' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='7' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='8' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='9' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='10' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='11' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM bencana WHERE kd_jenis='$q[kd_jenis]' and MONTH(tgl_kejadian)='12' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml;
                          ?></td>
                      </tr>

                  <?php } ?>
                  
                    </tbody>
                  </table>
  </div>
<div class="ttd" style="float: right;">
  Padang, <?php echo date("d F Y"); ?><br>
  Diketahui

  <br>
  <br>
  <br>
 Pimpinan
</div>
</body>
</html>
