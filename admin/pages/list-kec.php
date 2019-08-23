<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Kecamatan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Kecamatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kecamatan <a href="./pages/cetak-data-kecamatan.php" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a></h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                   <div class="table-responsive">    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>KD Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Nama Kecamatan</th>
                       
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan,kabupaten WHERE kabupaten.kd_kab=kecamatan.kd_kab ORDER BY nm_kec Asc");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                     
                        <td><?php echo $q['kd_kec']; ?></td>
                        <td><?php echo $q['nm_kab']; ?></td>
                        <td><?php echo $q['nm_kec']; ?></td>
                        <td>
                          <a href="index.php?p=edit-kec&id=<?php echo $q['kd_kec']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-kec.php?id=<?php echo $q['kd_kec']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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