<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Berita
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Berita</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Berita</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $auto=rand(11111111,99999999);
                            $_POST['id']="KB".$auto;

                            

                            if(isset($_POST['b1'])){


                            if(empty($_POST['id']) or empty($_POST['jd']) or empty($_POST['isi'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              date_default_timezone_set("Asia/Jakarta");

                              $tmpf=$_FILES['ft']['tmp_name'];

                                  $temp = explode(".", $_FILES["ft"]["name"]);//untuk mengambil nama file gambarnya saja tanpa format gambarnya
                                  $nmf = round(microtime(true)) . '.' . end($temp);//fungsi untuk membuat nama acak

                                $sql=mysqli_query($koneksi,"INSERT INTO berita values ('$_POST[id]','$_POST[jd]','$_POST[isi]','$nmf',NOW())");

                              move_uploaded_file($tmpf,"../images/berita/".$nmf);
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Berita berhasil ditambah.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-berita>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Berita</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST['id']; ?>" placeholder="KD Berita" readonly>
                                    </div>
                                      
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Judul Berita</label>
                                        <input type="text" name="jd" class="form-control" maxlength="100" placeholder="Judul">
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                              
                             

                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Isi Berita</label>
                                         <textarea id="Isi" class="form-control ckeditor" name="isi" rows="15" cols="10" data-msg-required="Please enter your Isi berita." maxlength="5000" placeholder="Isi berita"></textarea>  
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Foto</label>
                                        <input type="file" name="ft" class="form-control" maxlength="100" placeholder="foto">
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Berita</button>
                                    <a href="index.php?p=list-berita" class="btn btn-info"><i class="fa fa-table"></i> Lihat Laporan</a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>