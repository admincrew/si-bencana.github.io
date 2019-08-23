<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Berita
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Berita</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Berita</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                   <div class="table-responsive">    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>ID Berita</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal input</th>
                        
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT berita.* FROM berita  ORDER BY tgl_input DESC");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="../images/berita/<?php echo $q['foto']; ?>" style="width: 150px;height: 100px;"></td>
                        <td><?php echo $q['kd_berita']; ?></td>
                        <td><?php echo $q['judul']; ?></td>
                        <td><div style="height: 160px;overflow: hidden;"><?php echo $q['isi']; ?></div></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_input'])); ?></td>
                        <td>
                          <a href="index.php?p=edit-berita&id=<?php echo $q['kd_berita']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-berita.php?id=<?php echo $q['kd_berita']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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