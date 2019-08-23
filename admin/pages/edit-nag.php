<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Nagari
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Nagari</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Nagari</h3>
                 
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

                            
                              
                                $sql=mysqli_query($koneksi,"UPDATE nagari SET nm_nag='$_POST[nmk]',kd_kec='$_POST[kec]' where kd_nag='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Nagari berhasil diedit.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-nag>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                       <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM nagari,kecamatan where kecamatan.kd_kec=nagari.kd_kec and nagari.kd_nag='$id'"));
                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>KD Nagari</label>
                                        <input type="text" name="kdk" class="form-control" maxlength="100" value="<?php echo $q['kd_nag']; ?>" placeholder="KD Kabupaten" readonly>
                                    </div>
                                      
                                </div>
                            </div>

                            <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Kabupaten</label>
                                        <select name="kab" class="form-control" id="combo_kabupaten">
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
                                     <label>Kecamatan</label>
                                        <select name="kec" class="form-control" id="combo_kecamatan">
                                          <option>-Kecamatan-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY nm_kec ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_kab']; ?>" value="<?php echo $k['kd_kec']; ?>" <?php if($k['kd_kec']==$q['kd_kec']){ echo"Selected"; }else{ echo""; } ?>><?php echo $k['nm_kec']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                      
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nama Nagari</label>
                                        <input type="text" name="nmk" class="form-control" maxlength="100" placeholder="Nama Jenis" value="<?php echo $q['nm_nag']; ?>">
                                    </div>
                                      
                                </div>
                            </div>
                              
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Nagari</button>
                                    <a href="index.php?p=list-nag" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>
    <script src="./../plugins/jquery/jquery-2.1.4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var combo_kecamatan = $("#combo_kecamatan");
            
            temp = combo_kecamatan.children(".dt").clone();
             $("#combo_kabupaten").change(function(){
              var value = $(this).val();              
                combo_kecamatan.children(".dt").remove();
                if(value!==''){
                    temp.clone().filter("."+value).appendTo(combo_kecamatan);
                } else {
                    temp.clone().appendTo(combo_kecamatan);
                }
             });
    });
  </script>