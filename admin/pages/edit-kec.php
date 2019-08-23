<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Kecamatan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Kecamatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Kecamatan</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['kdk']) or empty($_POST['nmk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                            
                              
                                $sql=mysqli_query($koneksi,"UPDATE kecamatan SET nm_kec='$_POST[nmk]',kd_kab='$_POST[kab]' where kd_kec='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Kecamatan berhasil diedit.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-kec>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                       <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM kecamatan WHERE kd_kec='$id'"));
                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Kecamatan</label>
                                        <input type="text" name="kdk" class="form-control" maxlength="100" value="<?php echo $q['kd_kec']; ?>" placeholder="KD Kabupaten" readonly>
                                    </div>
                                      
                                </div>
                            </div>

                            <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Kabupaten</label>
                                        <select name="kab" class="form-control">
                                          <option>-Kabupaten-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kabupaten ORDER BY nm_kab ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option value="<?php echo $k['kd_kab']; ?>" <?php if($k['kd_kab']==$q['kd_kab']){ echo"Selected"; }else{ echo""; } ?>><?php echo $k['nm_kab']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                      
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nama Kecamatan</label>
                                        <input type="text" name="nmk" class="form-control" maxlength="100" placeholder="Nama Jenis" value="<?php echo $q['nm_kec']; ?>">
                                    </div>
                                      
                                </div>
                            </div>
                              
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Kecamatan</button>
                                    <a href="index.php?p=list-kec" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>