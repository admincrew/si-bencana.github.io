<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Kabupaten
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active"> Kabupaten</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form  Kabupaten</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $auto=rand(1111,9999);
                            $_POST['id']=$auto;

                            

                            if(isset($_POST['b1'])){


                            if(empty($_POST['id']) or empty($_POST['nmk'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                $sql=mysqli_query($koneksi,"INSERT INTO kabupaten values ('$_POST[id]','$_POST[nmk]')");

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Kabupaten berhasil ditambah.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-kab>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Kabupaten</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST['id']; ?>" placeholder="KD Kabupaten" readonly>
                                    </div>
                                      
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nama Kabupaten</label>
                                        <input type="text" name="nmk" class="form-control" maxlength="100" placeholder="Nama Kabupaten">
                                    </div>
                                      
                                </div>
                            </div>
                             <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Kabupaten</button>
                                    <a href="index.php?p=list-kab" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>