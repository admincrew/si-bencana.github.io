<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan User
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Laopran User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data User</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                   <div class="table-responsive">    
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>KD User</th>
                        <th>Nama lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Group Operator</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM user");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="./../images/<?php echo $q['foto']; ?>" style="width:80px;"></td>
                        <td><?php echo $q['kd_us']; ?></td>
                        <td><?php echo $q['nm_us']; ?></td>
                        <td><?php echo date('d F Y',strtotime($q['tgl_lhr'])); ?></td>
                        <td><?php echo $q['jk']; ?></td>
                        <td><?php echo $q['alm']; ?></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['group_operator']; ?></td>
                        <td><?php echo $q['level']; ?></td>
                        <td><?php echo $q['username']; ?></td>
                        <td><?php echo $q['password']; ?></td>
                        <td>
                          <a href="index.php?p=edit-user&id=<?php echo $q['kd_us']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-user.php?id=<?php echo $q['kd_us']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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