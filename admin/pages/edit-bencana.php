<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Data Bencana
            
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
                  <h3 class="box-title">Form Edit Data Bencana</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];
                            $ido = $_SESSION['id'];

                            if(isset($_POST['b1'])){

                             if(empty($_POST['id']) or empty($_POST['stt']) or empty($_POST['bln']) or empty($_POST['tgl'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                            
                              
                                $sql=mysqli_query($koneksi,"UPDATE bencana SET kd_operator='$ido',stt_data='$_POST[stt]',bulan='$_POST[bln]',tgl_kejadian='$_POST[tgl]',bencana='$_POST[ben]',kd_jenis='$_POST[jns1]',kd_jenis2='$_POST[jns2]',jml_kejadian='$_POST[jmlk]',kd_kab='$_POST[kab]',kd_kec='$_POST[kec]',kd_nag='$_POST[nag]',kd_jor='$_POST[jor]',meninggal='$_POST[meninggal]',hilang='$_POST[hilang]',luka='$_POST[luka]',menderita='$_POST[derita]',mengunsi_kk='$_POST[ngunsik]',mengunsi_jiwa='$_POST[ngunsij]',terisolir_kk='$_POST[isolirk]',terisolir_jiwa='$_POST[isolirj]',rmh_rb='$_POST[rrb]',rmh_rs='$_POST[rrs]',rmh_rr='$_POST[rrr]',terendam='$_POST[terendam]',hanyut='$_POST[hanyut]',sekolah='$_POST[sekolah]',sarkes='$_POST[sarkes]',tmp_ibadah='$_POST[tmpi]',kantor='$_POST[kantor]',pasar='$_POST[pasar]',kios='$_POST[kios]',bangunan_lain='$_POST[baglain]',irigasi='$_POST[irigasi]',bendungan='$_POST[bendungan]',jembatan='$_POST[jembatan]',jln_meter='$_POST[jalanm]',jln_titik='$_POST[jalant]',tebing_sungai='$_POST[tsung]',sawah='$_POST[sawah]',kebun='$_POST[kebun]',kolam_ha='$_POST[kolamha]',kolam_p='$_POST[kolamp]',ternak='$_POST[ternak]',taksiran_kerugian='$_POST[taksir]' where kd_bencana='$id'");
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data Bencana berhasil diedit.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=list-bencana>";
                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                     <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM bencana where kd_bencana='$id'"));
                      ?>
                        <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>KD Data Bencana</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $id; ?>" placeholder="KD Data Bencana" readonly>
                                    </div>
                                     
                                    <div class="col-md-3">
                                     <label>Status Bencana</label>
                                        <select name="stt" class="form-control" required="">
                                          <option value="">-Status-</option>
                                          <option value="Awal" <?php if($q['stt_data']=="Awal"){echo "Selected";}else{echo "";}?>>Awal</option>
                                          <option value="Final" <?php if($q['stt_data']=="Final"){echo "Selected";}else{echo "";}?>>Final</option>
                                        </select>
                                    </div>
                                     <div class="col-md-3">
                                     <label>Bulan Kejadian</label>
                                        <select name="bln" class="form-control" required="">
                                          <option value="">-Bulan-</option>
                                          <option value="1" <?php if($q['bulan']=="1"){echo "Selected";}else{echo "";}?>>Januari</option>
                                          <option value="2" <?php if($q['bulan']=="2"){echo "Selected";}else{echo "";}?>>Februari</option>
                                          <option value="3" <?php if($q['bulan']=="3"){echo "Selected";}else{echo "";}?>>Maret</option>
                                          <option value="4" <?php if($q['bulan']=="4"){echo "Selected";}else{echo "";}?>>April</option>
                                          <option value="5" <?php if($q['bulan']=="5"){echo "Selected";}else{echo "";}?>>Mei</option>
                                          <option value="6" <?php if($q['bulan']=="6"){echo "Selected";}else{echo "";}?>>Juni</option>
                                          <option value="7" <?php if($q['bulan']=="7"){echo "Selected";}else{echo "";}?>>Juli</option>
                                          <option value="8" <?php if($q['bulan']=="8"){echo "Selected";}else{echo "";}?>>Agustus</option>
                                          <option value="9" <?php if($q['bulan']=="9"){echo "Selected";}else{echo "";}?>>September</option>
                                          <option value="10" <?php if($q['bulan']=="10"){echo "Selected";}else{echo "";}?>>Oktober</option>
                                          <option value="11" <?php if($q['bulan']=="11"){echo "Selected";}else{echo "";}?>>November</option>
                                          <option value="12" <?php if($q['bulan']=="12"){echo "Selected";}else{echo "";}?>>Desember</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                     <label>Tanggal Kejadian</label>
                                       <input type="text" name="tgl" class="form-control" placeholder="Tanggal Kejadian" id="datepicker1" value="<?php echo $q['tgl_kejadian']; ?>" required="">
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
                                          <option value="Ya" <?php if($q['bencana']=="Ya"){echo "Selected";}else{echo "";}?>>Ya</option>
                                          <option value="Tidak" <?php if($q['bencana']=="Tidak"){echo "Selected";}else{echo "";}?>>Tidak</option>
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
                                          <option value="<?php echo $k['kd_jenis']; ?>" <?php if($q['kd_jenis']==$k['kd_jenis']){echo "Selected";}else{echo "";}?>><?php echo $k['nm_jenis']; ?></option>
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
                                          <option value="<?php echo $k['kd_jenis']; ?>" <?php if($q['kd_jenis2']==$k['kd_jenis']){echo "Selected";}else{echo "";}?>><?php echo $k['nm_jenis']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                     <label>Jumlah Kejadian</label>
                                       <input type="text" name="jmlk" placeholder="Jumlah Kejadian" value="<?php echo $q['jml_kejadian'] ?>" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                           
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Kabupaten</label>
                                        <select name="kab" class="form-control" id="combo_kabupaten" required="">
                                          <option>-Kabupaten-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kabupaten ORDER BY nm_kab ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option value="<?php echo $k['kd_kab']; ?>" <?php if($q['kd_kab']==$k['kd_kab']){echo "Selected";}else{echo "";}?>><?php echo $k['nm_kab']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                     <label>Kecamatan</label>
                                        <select name="kec" class="form-control" id="combo_kecamatan" required="">
                                          <option>-Kecamatan-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY nm_kec ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_kab']; ?>" value="<?php echo $k['kd_kec']; ?>" <?php if($q['kd_kec']==$k['kd_kec']){echo "Selected";}else{echo "";}?>><?php echo $k['nm_kec']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                     <label>Nagari</label>
                                        <select name="nag" class="form-control" id="combo_nagari" required="">
                                          <option>-Nagari-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM nagari ORDER BY nm_nag ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_kec']; ?>" value="<?php echo $k['kd_nag']; ?>" <?php echo $k['kd_kec']; ?>" <?php if($q['kd_nag']==$k['kd_nag']){echo "Selected";}else{echo "";}?>><?php echo $k['nm_nag']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                      <div class="col-md-3">
                                     <label>Jorong</label>
                                        <select name="jor" class="form-control" id="combo_jorong" required="">
                                          <option>-Jorong-</option>
                                          <?php 
                                            $sql=mysqli_query($koneksi,"SELECT * FROM jorong ORDER BY nm_jor ASC");
                                            while($k=mysqli_fetch_array($sql)){
                                          ?>
                                          <option class="dt <?php echo $k['kd_nag']; ?>" value="<?php echo $k['kd_jor']; ?>" <?php if($q['kd_jor']==$k['kd_jor']){echo "Selected";}else{echo "";}?>><?php echo $k['nm_jor']; ?></option>
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
                                       <input type="text" name="meninggal" placeholder="Jumlah Meninggal" class="form-control" required="" value="<?php echo $q['meninggal'] ?>">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Hilang (Jiwa)</label>
                                       <input type="text" name="hilang" placeholder="Jumlah Hilang" class="form-control" value="<?php echo $q['hilang'] ?>" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Luka/Sakit (Jiwa)</label>
                                       <input type="text" name="luka" placeholder="Jumlah Luka" class="form-control" value="<?php echo $q['luka'] ?>" required="">
                                    </div>
                                      <div class="col-md-3">
                                     <label>Menderita (Jiwa)</label>
                                       <input type="text" name="derita" value="<?php echo $q['menderita'] ?>" placeholder="Jumlah Menderita" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                             
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Mengungsi (KK)</label>
                                       <input type="text" name="ngunsik" placeholder="Mengungsi (KK)" class="form-control" value="<?php echo $q['mengunsi_kk'] ?>" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Mengungsi (Jiwa)</label>
                                       <input type="text" name="ngunsij" value="<?php echo $q['mengunsi_jiwa'] ?>" placeholder="Mengungsi (Jiwa)" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Terisolir (KK)</label>
                                       <input type="text" name="isolirk" placeholder="Terisolir (KK)" value="<?php echo $q['terisolir_kk'] ?>" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Terisolir (Jiwa)</label>
                                       <input type="text" name="isolirj" value="<?php echo $q['terisolir_jiwa'] ?>" placeholder="Terisolir(Jiwa)" class="form-control" required="">
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
                                       <input type="text" name="rrb" value="<?php echo $q['rmh_rb'] ?>" placeholder="Rumah Rusak" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Rumah Rusak Sedang</label>
                                       <input type="text" name="rrs" value="<?php echo $q['rmh_rs'] ?>" placeholder="Rumah Rusak" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Rumah Rusak Ringan</label>
                                       <input type="text" name="rrr" value="<?php echo $q['rmh_rr'] ?>" placeholder="Rumah Rusak Ringan" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Rumah Terendam (Unit)</label>
                                       <input type="text" name="terendam" value="<?php echo $q['terendam'] ?>" placeholder="Terendam" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Rumah Hanyut (Unit)</label>
                                       <input type="text" name="hanyut" value="<?php echo $q['hanyut'] ?>" placeholder="Hanyut" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Sekolah (Unit)</label>
                                       <input type="text" name="sekolah" value="<?php echo $q['sekolah'] ?>" placeholder="Sekolah" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Sarana Kesehatan (Unit)</label>
                                       <input type="text" name="sarkes" value="<?php echo $q['sarkes'] ?>" placeholder="Sarana kesehatan" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Tempat Ibadah (Unit)</label>
                                       <input type="text" name="tmpi" value="<?php echo $q['tmp_ibadah'] ?>" placeholder="Tempat Ibadah" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                             
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Kantor (Unit)</label>
                                       <input type="text" name="kantor" placeholder="Kantor (Unit)" value="<?php echo $q['kantor'] ?>" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Pasar</label>
                                       <input type="text" name="pasar" value="<?php echo $q['pasar'] ?>" placeholder="Pasar" class="form-control" required="">
                                    </div>
                                     <div class="col-md-3">
                                     <label>Kios (Unit)</label>
                                       <input type="text" name="kios" value="<?php echo $q['kios'] ?>" placeholder="Kios" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Bangunan Lainya (Unit)</label>
                                       <input type="text" name="baglain" value="<?php echo $q['bangunan_lain'] ?>" placeholder="Bagunan Lainya" class="form-control" required="">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Irigasi (Meter)</label>
                                       <input type="text" name="irigasi" placeholder="Irigasi" value="<?php echo $q['irigasi'] ?>" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Bendungan (Unit)</label>
                                       <input type="text" name="bendungan" value="<?php echo $q['bendungan'] ?>" placeholder="Bendungan" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Jembatan (Unit)</label>
                                       <input type="text" name="jembatan" placeholder="Jembatan" value="<?php echo $q['jembatan'] ?>" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Jalan (meter)</label>
                                       <input type="text" name="jalanm" placeholder="Jalan (Meter)" value="<?php echo $q['jln_meter'] ?>" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                     <label>Jalan (Titik)</label>
                                       <input type="text" name="jalant" value="<?php echo $q['jln_titik'] ?>" placeholder="Jalan (Titik)" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Tebing Sungai (Meter)</label>
                                       <input type="text" name="tsung" placeholder="tebing Sungai" value="<?php echo $q['tebing_sungai'] ?>" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                     <label>Sawah (Ha)</label>
                                       <input type="text" name="sawah" placeholder="Sawah" value="<?php echo $q['sawah'] ?>" class="form-control" required="">
                                    </div>
                                       <div class="col-md-3">
                                     <label>Kebun (Ha)</label>
                                       <input type="text" name="kebun" placeholder="Kebun" value="<?php echo $q['kebun'] ?>" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                            <br>
                            
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                     <label>Kolam (Ha)</label>
                                       <input type="text" name="kolamha" placeholder="kolam" value="<?php echo $q['kolam_ha'] ?>" class="form-control" required="">
                                    </div>
                                       <div class="col-md-4">
                                     <label>Kolam (Petak)</label>
                                       <input type="text" name="kolamp" placeholder="kolam" class="form-control" value="<?php echo $q['kolam_p'] ?>" required="">
                                    </div>
                                    <div class="col-md-4">
                                     <label>Ternak (Ekor)</label>
                                       <input type="text" name="ternak" value="<?php echo $q['ternak'] ?>" placeholder="Ternak" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                          </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Taksiran Kerugian (Rp)</label>
                                       <input type="text" name="taksir" placeholder="Taksiran Kerugian" value="<?php echo $q['taksiran_kerugian'] ?>" class="form-control" required="">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Edit Data Bencana</button>
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