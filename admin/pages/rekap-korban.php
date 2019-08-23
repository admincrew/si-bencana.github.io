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
                  <h3 class="box-title">Rekap Bencana</h3>  
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
                          <div class="col-md-1"><a href="./pages/cetak-rekap-korban.php?thn=<?php echo $_POST['thn']; ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>
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
                        <th>Meninggal</th>
                        <th>Hilang</th>
                        <th>Luka/Sakit</th>
                        <th>Menderita</th>
                        <th>Mengunsi(KK)</th>
                        <th>Mengunsi(Jiwa)</th>
                        <th>Terisolir(Jiwa)</th>
                        <th>Terisolir(KK)</th>
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
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(meninggal) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?>
                        </td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(hilang) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(luka) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(menderita) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(mengunsi_jiwa) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(mengunsi_kk) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                        <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(terisolir_jiwa) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
                       echo $jml['jmlm'];
                          ?></td>
                          <td> <?php 
                       $jml=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(terisolir_kk) as jmlm FROM bencana WHERE kd_kab='$q[kd_kab]' and YEAR(tgl_kejadian)='$th'"));
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
