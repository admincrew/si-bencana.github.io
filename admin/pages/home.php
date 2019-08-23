 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Home
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Home</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <?php

if($_SESSION['level']=="Petugas"){ ?>
       
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php 
                    
                       include './../koneksi/koneksi.php'; 
                       $read=mysqli_query($koneksi,"select * from user");
                        $total1=mysqli_num_rows($read);
                                 
                    ?>
                  <h3><?php echo $total1; ?></h3>
                  <p>User</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="index.php?p=list-user" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                   <?php 

                       $read2=mysqli_query($koneksi,"select * from jenis_bencana");
                        $total2=mysqli_num_rows($read2);
                                 
                    ?>
                  <h3><?php echo $total2; ?></h3>
                  <p>Jenis bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <a href="index.php?p=list-jenis" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                   <?php 

                       $read3=mysqli_query($koneksi,"select * from berita");
                        $total3=mysqli_num_rows($read3);
                                 
                    ?>
                  <h3><?php echo $total3; ?></h3>
                  <p>Berita</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-o"></i>
                </div>
                <a href="index.php?p=list-berita" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php 

                       $read4=mysqli_query($koneksi,"select * from bencana");
                        $total4=mysqli_num_rows($read4);
                                 
                    ?>
                  <h3><?php echo $total4; ?></h3>
                  <p>Bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-picture-o"></i>
                </div>
                <a href="index.php?p=list-bencana" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <?php }elseif ($_SESSION['level']=="Operator") { ?>
            <div class="row">
           
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                   <?php 

                       $read2=mysqli_query($koneksi,"select * from jenis_bencana");
                        $total2=mysqli_num_rows($read2);
                                 
                    ?>
                  <h3><?php echo $total2; ?></h3>
                  <p>Jenis bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <a href="index.php?p=list-jenis" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                   <?php 

                       $read3=mysqli_query($koneksi,"select * from berita");
                        $total3=mysqli_num_rows($read3);
                                 
                    ?>
                  <h3><?php echo $total3; ?></h3>
                  <p>Berita</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-o"></i>
                </div>
                <a href="index.php?p=list-berita" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php 

                       $read4=mysqli_query($koneksi,"select * from bencana");
                        $total4=mysqli_num_rows($read4);
                                 
                    ?>
                  <h3><?php echo $total4; ?></h3>
                  <p>Bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-picture-o"></i>
                </div>
                <a href="index.php?p=list-bencana" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
         <?php }elseif ($_SESSION['level']=="Supervisor") { ?>
          <div class="row">
           
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                 
                  <h3><br></h3>
                  <p>Grafik Bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bar-chart"></i>
                </div>
                <a href="index.php?p=grafik-bencana" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  
                  <h3><br></h3>
                  <p>Laporan Bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-files-o"></i>
                </div>
                <a href="index.php?p=laporan-bencana" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
          </div><!-- /.row -->
         <?php }else{ ?>

          <div class="row">
           
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                 
                  <h3><br></h3>
                  <p>Grafik Bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bar-chart"></i>
                </div>
                <a href="index.php?p=grafik-bencana" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  
                  <h3><br></h3>
                  <p>Laporan Bencana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-files-o"></i>
                </div>
                <a href="index.php?p=laporan-bencana" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
          </div><!-- /.row -->
          
         <?php } ?>
         

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->