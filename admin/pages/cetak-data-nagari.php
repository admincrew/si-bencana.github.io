<!-- DIBUAT NOPEN RIANTO -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/logo.png"/>
   <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak</title>
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
          
    <h4><b>LAPORAN DATA NAGARI</b></h4>
    <h5><b>BADAN PENANGGULANGAN BENCANA DAERAH PROVINSI SUMATERA BARAT</b></h5>
    <p>Jl.Jendral Sudirman No.47  , Telp: (0751) 890720 , Email: bpbd@sumbarprov.go.id </p>

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>

 <br>
  </div>

  <div style="width: 100%;float: left">
       <table kd="example1" class="table table-bordered table-striped">
                      
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Nagari</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Nama Nagari</th>
                 
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include '../../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM nagari,kecamatan,kabupaten WHERE kabupaten.kd_kab=kecamatan.kd_kab and kecamatan.kd_kec=nagari.kd_kec ORDER BY nm_nag Asc");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                     
                        <td><?php echo $q['kd_nag']; ?></td>
                        <td><?php echo $q['nm_kab']; ?></td>
                        <td><?php echo $q['nm_kec']; ?></td>
                        <td><?php echo $q['nm_nag']; ?></td>
                       
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
