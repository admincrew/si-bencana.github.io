  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Bencana
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Laporan Bencana</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Rekap Kerusakan Bangunan</h3>  
                </div><!-- /.box-header -->
                  <div class="box-header">
                    <div class="row">
                     <form action="#" method="post">
                      <div class="col-md-12">
                    
                        <div class="col-md-4">
                         
                    <select name=thn class='form-control'>
                    <option value='' selected>-Pilih Tahun-</option>
                    <?php
                    $thn_skrg=date('Y');

                    for ($thn=2000;$thn<=$thn_skrg;$thn++)
                    { ?>
                   <option value="<?php echo $thn; ?>" <?php if(!empty($_POST["thn"]) and $_POST["thn"]==$thn){ echo "Selected"; }else{ echo""; } ?>><?php echo $thn; ?></option>
                   <?php } ?>
                    </select>

                        </div>
                      
                          <div class="col-md-1"><button type="submit" name="b1" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                          </div>
                          <?php if(!empty($_POST['thn'])) { ?>
                          <div class="col-md-1"><a href="./pages/cetak-kerusakan-bangunan.php?thn=<?php echo $_POST['thn']; ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>
                          </div>
                          <?php } ?>
                    
                    </div>
                      </form>
                  </div>
                </div>
                   
                <div class="box-body">
                  <div class="table-responsive">     
                      <table kd="example1" class="table table-bordered table-striped">
                      
                     <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kabupaten</th>
                        <th>Rumah RB</th>
                        <th>Rumah RS</th>
                        <th>Rumah RR</th>
                        <th>Rmh Terendam</th>
                        <th>Rmh Hanyut</th>
                        <th>Sekolah</th>
                        <th>Sarkes</th>
                        <th>T4 Ibadah</th>
                        <th>Kantor</th>
                        <th>Pasar</th>
                        <th>Kios</th>
                        <th>Bendungan</th>
                        <th>Jembatan</th>
                        <th>Jalan (Meter)</th>
                        <th>Jalan (Titik)</th>
                        <th>Bangunan Lain</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                       include './../koneksi/koneksi.php'; 

                              
                     $sql=mysqli_query($koneksi,"SELECT * FROM kabupaten ORDER BY nm_kab ASC");
                   
                        $no=0;$total=0;
                        if(empty($_POST['thn'])){
                          $th=date('Y');
                        }else{
                          $th=$_POST['thn'];
                        }
                        while($q=mysqli_fetch_array($sql)){
                        $no++
                        
                     
                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $q['nm_kab']; ?></td>
                        <td>
                          <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(rmh_rb) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?>
                        </td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(rmh_rs) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(rmh_rr) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(terendam) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(hanyut) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(sekolah) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(sarkes) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                          <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(tmp_ibadah) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                           <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(kantor) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                           <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(pasar) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                           <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(kios) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                            <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(bendungan) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                            <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(jembatan) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                            <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(jln_meter) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                            <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(jln_titik) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                            <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(bangunan_lain) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                      </tr>

                  <?php } ?>
                  
                    </tbody>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
