<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Dusun
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Dusun</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Dusun <a href="./pages/cetak-data-jorong.php" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a></h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                   <div class="table-responsive">    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Desa</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Nama Dusun</th>
                       
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM jorong,nagari,kecamatan,kabupaten WHERE kabupaten.kd_kab=kecamatan.kd_kab and kecamatan.kd_kec=nagari.kd_kec and nagari.kd_nag=jorong.kd_nag ORDER BY nm_jor Asc");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                     
                        <td><?php echo $q['kd_jor']; ?></td>
                        <td><?php echo $q['nm_kab']; ?></td>
                        <td><?php echo $q['nm_kec']; ?></td>
                        <td><?php echo $q['nm_nag']; ?></td>
                        <td><?php echo $q['nm_jor']; ?></td>
                        <td>
                          <a href="index.php?p=edit-jor&id=<?php echo $q['kd_jor']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-jor.php?id=<?php echo $q['kd_jor']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
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