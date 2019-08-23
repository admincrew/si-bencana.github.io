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
                  <h3 class="box-title">Rekap Bencana / Jenis Bencana
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
                          <div class="col-md-1"><a href="./pages/cetak-rekap-perjenis.php?thn=<?php echo $_POST['thn']; ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>
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
                       include './../koneksi/koneksi.php'; 

                              
                     $sql=mysqli_query($koneksi,"SELECT * FROM jenis_bencana ORDER BY nm_jenis ASC");
                   
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
