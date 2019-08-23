<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Bencana
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active"> Data Bencana</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form  Data Bencana</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $auto=rand(1111111,9999999);
                            $_POST['id']="BC".$auto;

                            
                            $id = $_SESSION['id'];

                            

                            if(isset($_POST['b1'])){

                            

                            if(empty($_POST['id']) or empty($_POST['stt']) or empty($_POST['bln']) or empty($_POST['tgl'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              date_default_timezone_set("Asia/Jakarta");

                                $sql=mysqli_query($koneksi,"INSERT INTO bencana values ('$_POST[id]','$id','$_POST[gr]','$_POST[stt]','$_POST[bln]','$_POST[tgl]','$_POST[ben]','$_POST[jns1]','$_POST[jns2]','$_POST[jmlk]','$_POST[kab]','$_POST[kec]','$_POST[nag]','$_POST[jor]','$_POST[meninggal]','$_POST[hilang]','$_POST[luka]','$_POST[derita]','$_POST[ngunsik]','$_POST[ngunsij]','$_POST[isolirk]','$_POST[isolirj]','$_POST[rrb]','$_POST[rrs]','$_POST[rrr]','$_POST[terendam]','$_POST[hanyut]','$_POST[sekolah]','$_POST[sarkes]','$_POST[tmpi]','$_POST[kantor]','$_POST[pasar]','$_POST[kios]','$_POST[baglain]','$_POST[irigasi]','$_POST[bendungan]','$_POST[jembatan]','$_POST[jalanm]','$_POST[jalant]','$_POST[tsung]','$_POST[sawah]','$_POST[kebun]','$_POST[kolamha]','$_POST[kolamp]','$_POST[ternak]','$_POST[taksir]','Pending',NOW())");

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data Bencana berhasil ditambah.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-bencana>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                     
                        <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                     <label>KD Data Bencana</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $_POST['id']; ?>" placeholder="KD Data Bencana" readonly>
                                    </div>
                                     <div class="col-md-2">
                                     <label>Group Operator</label>
                                        <select name="gr" class="form-control" required="">
                                          <option value="">-Group-</option>
                                          <option value="I">I</option>
                                          <option value="II">II</option>
                                          <option value="III">III</option>
                                          <option value="IV">IV</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                     <label>Status Bencana</label>
                                        <select name="stt" class="form-control" required="">
                                          <option value="">-Status-</option>
                                          <option value="Awal">Awal</option>
                                          <option value="Final">Final</option>
                                        </select>
                                    </div>

                                     <div class="col-md-3">
                                     <label>Bulan Kejadian</label>
                                        <select name="bln" class="form-control" required="">
                                          <option value="">-Bulan-</option>
                                          <option value="1">Januari</option>
                                          <option value="2">Februari</option>
                                          <option value="3">Maret</option>
                                          <option value="4">April</option>
                                          <option value="5">Mei</option>
                                          <option value="6">Juni</option>
                                          <option value="7">Juli</option>
                                          <option value="8">Agustus</option>
                                          <option value="9">September</option>
                                          <option value="10">Oktober</option>
                                          <option value="11">November</option>
                                          <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                     <label>Tanggal Kejadian</label>
                                       <input type="text" name="tgl" class="form-control" placeholder="Tanggal Kejadian" id="datepicker1" required="">
                                    </div>

                                </div>
                            </div>

                           <br>
                           
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Bencana/Bukan Bencana</label>
                                        <select name="ben" class="form-control" required="">
                                          <option value="">-Bencana-</option>
                                          <option value="Ya">Ya</option>
                                          <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                      <div class="col-md-3">
                                     <label>Jenis Bencana 1</label>
                                        <select name="jns1" class="form-control" required="">
                                          <option>-Jenis Bencana-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM jenis_bencana ORDER BY nm_jenis ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option value="<?php echo $k['kd_jenis']; ?>"><?php echo $k['nm_jenis']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                     <div class="col-md-3">
                                     <label>Jenis Bencana 2</label>
                                        <select name="jns2" class="form-control" required="">
                                          <option>-Jenis Bencana-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM jenis_bencana ORDER BY nm_jenis ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option value="<?php echo $k['kd_jenis']; ?>"><?php echo $k['nm_jenis']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                     <label>Jumlah Kejadian</label>
                                       <input type="text" name="jmlk" placeholder="Jumlah Kejadian" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Kabupaten</label>
                                        <select name="kab" class="form-control" id="combo_kabupaten">
                                          <option value="">-Kabupaten-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kabupaten ORDER BY nm_kab ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option value="<?php echo $k['kd_kab']; ?>"><?php echo $k['nm_kab']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                     <label>Kecamatan</label>
                                        <select name="kec" class="form-control" id="combo_kecamatan">
                                          <option value="">-Kecamatan-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY nm_kec ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_kab']; ?>" value="<?php echo $k['kd_kec']; ?>"><?php echo $k['nm_kec']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                     <label>Nagari</label>
                                        <select name="nag" class="form-control" id="combo_nagari">
                                          <option value="">-Nagari-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM nagari ORDER BY nm_nag ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_kec']; ?>" value="<?php echo $k['kd_nag']; ?>"><?php echo $k['nm_nag']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-3">
                                     <label>Jorong</label>
                                        <select name="jor" class="form-control" id="combo_jorong">
                                          <option value="">-Jorong-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM jorong ORDER BY nm_jor ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_nag']; ?>" value="<?php echo $k['kd_jor']; ?>"><?php echo $k['nm_jor']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                              <label>KORBAN JIWA</label>
                            <div class="korban" style="border:1px solid #555;padding: 10px;margin: 5px;">
                            
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Meninggal (Jiwa)</label>
                                       <input type="text" name="meninggal" placeholder="Jumlah Meninggal" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Hilang (Jiwa)</label>
                                       <input type="text" name="hilang" placeholder="Jumlah Hilang" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Luka/Sakit (Jiwa)</label>
                                       <input type="text" name="luka" placeholder="Jumlah Luka" class="form-control" required="">
                                    </div>
                                      <div class="col-md-3">
                                     <label>Menderita (Jiwa)</label>
                                       <input type="text" name="derita" placeholder="Jumlah Menderita" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                             
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Mengungsi (KK)</label>
                                       <input type="text" name="ngunsik" placeholder="Mengungsi (KK)" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Mengungsi (Jiwa)</label>
                                       <input type="text" name="ngunsij" placeholder="Mengungsi (Jiwa)" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Terisolir (KK)</label>
                                       <input type="text" name="isolirk" placeholder="Terisolir (KK)" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Terisolir (Jiwa)</label>
                                       <input type="text" name="isolirj" placeholder="Terisolir(Jiwa)" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                            <br>
                          </div>
                          <label>KERUSAKAN</label>
                           <div class="korban" style="border:1px solid #555;padding: 10px;margin: 5px;">
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Rumah Rusak Berat</label>
                                       <input type="text" name="rrb" placeholder="Rumah Rusak" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Rumah Rusak Sedang</label>
                                       <input type="text" name="rrs" placeholder="Rumah Rusak" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Rumah Rusak Ringan</label>
                                       <input type="text" name="rrr" placeholder="Rumah Rusak Ringan" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Rumah Terendam (Unit)</label>
                                       <input type="text" name="terendam" placeholder="Terendam" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Rumah Hanyut (Unit)</label>
                                       <input type="text" name="hanyut" placeholder="Hanyut" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Sekolah (Unit)</label>
                                       <input type="text" name="sekolah" placeholder="Sekolah" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Sarana Kesehatan (Unit)</label>
                                       <input type="text" name="sarkes" placeholder="Sarana kesehatan" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Tempat Ibadah (Unit)</label>
                                       <input type="text" name="tmpi" placeholder="Tempat Ibadah" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                             
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Kantor (Unit)</label>
                                       <input type="text" name="kantor" placeholder="Kantor (Unit)" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Pasar</label>
                                       <input type="text" name="pasar" placeholder="Pasar" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Kios (Unit)</label>
                                       <input type="text" name="kios" placeholder="Kios" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Bangunan Lainya (Unit)</label>
                                       <input type="text" name="baglain" placeholder="Bagunan Lainya" class="form-control" required="">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Irigasi (Meter)</label>
                                       <input type="text" name="irigasi" placeholder="Irigasi" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Bendungan (Unit)</label>
                                       <input type="text" name="bendungan" placeholder="Bendungan" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Jembatan (Unit)</label>
                                       <input type="text" name="jembatan" placeholder="Jembatan" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Jalan (meter)</label>
                                       <input type="text" name="jalanm" placeholder="Jalan (Meter)" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Jalan (Titik)</label>
                                       <input type="text" name="jalant" placeholder="Jalan (Titik)" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Tebing Sungai (Meter)</label>
                                       <input type="text" name="tsung" placeholder="tebing Sungai" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Sawah (Ha)</label>
                                       <input type="text" name="sawah" placeholder="Sawah" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Kebun (Ha)</label>
                                       <input type="text" name="kebun" placeholder="Kebun" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                     <label>Kolam (Ha)</label>
                                       <input type="text" name="kolamha" placeholder="kolam" class="form-control" required="">
                                    </div>
                                       <div class="col-md-4">
                                     <label>Kolam (Petak)</label>
                                       <input type="text" name="kolamp" placeholder="kolam" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                     <label>Ternak (Ekor)</label>
                                       <input type="text" name="ternak" placeholder="Ternak" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                          </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Taksiran Kerugian (Rp)</label>
                                       <input type="text" name="taksir" placeholder="Taksiran Kerugian" class="form-control" required="">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Data Bencana</button>
                                    <a href="index.php?p=list-bencana" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
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
      //kecamatan
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
      //Nagari
      var combo_nagari = $("#combo_nagari");

            temp2 = combo_nagari.children(".dt").clone();

             $("#combo_kecamatan").change(function(){
              var value2 = $(this).val();              
                combo_nagari.children(".dt").remove();
                if(value2!==''){
                    temp2.clone().filter("."+value2).appendTo(combo_nagari);
                } else {
                    temp2.clone().appendTo(combo_nagari);
                }
             });
      //Jorong
      var combo_jorong = $("#combo_jorong");

            temp3 = combo_jorong.children(".dt").clone();

             $("#combo_nagari").change(function(){
              var value3 = $(this).val();              
                combo_jorong.children(".dt").remove();
                if(value3!==''){
                    temp3.clone().filter("."+value3).appendTo(combo_jorong);
                } else {
                    temp3.clone().appendTo(combo_jorong);
                }
             });
    });
  </script>