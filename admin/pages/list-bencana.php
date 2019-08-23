<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Bencana
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Bencana</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Bencana</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php 
  include '../koneksi/koneksi.php';

if(!empty($_POST['stt']) and !empty($_POST['kd'])){
      $sql=mysqli_query($koneksi,"UPDATE bencana SET validasi='$_POST[stt]' WHERE kd_bencana='$_POST[kd]'");
      

       echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span></button>
        <strong>Sukses!</strong> Status bencana berhasil diubah.
        </div>';
      }
                            
 ?>   
                   <div class="table-responsive"> 
                     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Validasi</th>
                        <th>KD Bencana</th>
                        <th>Nama Operator</th>
                        <th>Group Operator</th>
                        <th>Status Data</th>
                        <th>Bulan</th>
                        <th>Tanggal Kejadian</th>
                        <th>Bencana/Bukan Bencana</th>
                        <th>Jenis Bencana 1</th>
                        <th>Jenis Bencana 2</th>
                        <th>Jumlah Kejadian</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kecamatan</th>
                        <th>Nagari/Kelurahan/Desa</th>
                        <th>Jorong/Dusun/Korong</th>
                        <th>Meninggal (Jiwa)</th>
                        <th>Hilang (Jiwa)</th>
                        <th>Luka/Sakit (Jiwa)</th>
                        <th>Menderita (Jiwa)</th>
                        <th>Mengunsi (KK)</th>
                        <th>Mengunsi (Jiwa)</th>
                        <th>Terisolir (Jiwa)</th>
                        <th>Terisolir (KK)</th>
                        <th>Rmh RB (Unit)</th>
                        <th>Rmh RS (Unit)</th>
                        <th>Rmh RR (Unit)</th>
                        <th>Rmh Terendam (Unit)</th>
                        <th>Rmh Hanyut (Unit)</th>
                        <th>Sekolah (Unit)</th>
                        <th>Sarkes (Unit)</th>
                        <th>Tmp Ibadah (Unit)</th>
                        <th>Kantor (Unit)</th>
                        <th>Pasar </th>
                        <th>Kios (Unit)</th>
                        <th>Bangunan Lain (Unit)</th>
                        <th>Irigasi (Meter)</th>
                        <th>Bendungan (Unit)</th>
                        <th>Jembatan (Unit)</th>
                        <th>Jalan (Meter)</th>
                        <th>Jalan (Titik)</th>
                        <th>Tebing Sungai (Meter)</th>
                        <th>Kebun/Hutan (Ha)</th>
                        <th>Sawah (Ha)</th>
                        <th>Kolam (Ha)</th>
                        <th>Kolam (Petak)</th>
                        <th>Ternak (Ekor)</th>
                        <th>Taksiran Kerugian (Rp)</th>
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM bencana LEFT JOIN kabupaten ON kabupaten.kd_kab=bencana.kd_kab LEFT JOIN kecamatan ON kecamatan.kd_kec=bencana.kd_kec LEFT JOIN nagari ON nagari.kd_nag=bencana.kd_nag LEFT JOIN jorong ON jorong.kd_jor=bencana.kd_jor LEFT JOIN user ON user.kd_us=bencana.kd_operator ORDER BY tgl_kejadian DESC");
                      while($q=mysqli_fetch_array($sql)){
                        
                        
                        $jenis1=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM jenis_bencana WHERE kd_jenis='$q[kd_jenis]'"));
                         $jenis2=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM jenis_bencana WHERE kd_jenis='$q[kd_jenis2]'"));
                     
                        $no++;
                          $bulan = array (
                                  1 =>   'Januari',
                                  'Februari',
                                  'Maret',
                                  'April',
                                  'Mei',
                                  'Juni',
                                  'Juli',
                                  'Agustus',
                                  'September',
                                  'Oktober',
                                  'November',
                                  'Desember'
                                );
                          $bln=$bulan[ (int)$q['bulan'] ];

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td>

                          <?php if($_SESSION['level']<>"Supervisor"){ ?>

                          <label class="label <?php if($q['validasi']=='Pending'){ echo "label-warning"; }elseif($q['validasi']=='Perbaiki'){ echo "label-danger"; }else{ echo "label-success"; }?>"><?php echo $q['validasi']; ?></label>
                        <?php }else{ ?>
                            <form method="post" action="#">
            <input type="hidden" name="kd" value="<?php echo $q['kd_bencana']; ?>">
          <select name="stt" class="form-control" onchange="this.form.submit();">
            <option value="Pending" <?php if($q['validasi']=="Pending"){ echo"Selected"; }else{ echo""; } ?>><b>Pending</b></option>
            <option value="Perbaiki" <?php if($q['validasi']=="Perbaiki"){ echo"Selected"; }else{ echo""; } ?>><b>Perbaiki</b></option>
            <option value="Ok" <?php if($q['validasi']=="Ok"){ echo"Selected"; }else{ echo""; } ?>><b>Ok</b></option>
          </select>
        </form>
                        <?php } ?>
                      </td>
                        <td><?php echo $q['kd_bencana']; ?></td>
                        <td><?php echo $q['nm_us']; ?></td>
                        <td><?php echo $q['group']; ?></td>
                        <td><?php echo $q['stt_data']; ?></td>
                        <td><?php echo $bln; ?></td>
                        <td><?php echo date("d F Y",strtotime($q['tgl_kejadian'])); ?></td>
                        <td><?php echo $q['bencana']; ?></td>
                        <td><?php echo $jenis1['nm_jenis']; ?></td>
                        <td><?php echo $jenis2['nm_jenis']; ?></td>
                        <td><?php echo $q['jml_kejadian']; ?></td>
                        <td><?php echo $q['nm_kab']; ?></td>
                        <td><?php echo $q['nm_kec']; ?></td>
                        <td><?php echo $q['nm_nag']; ?></td>
                        <td><?php echo $q['nm_jor']; ?></td>
                        <td><?php echo $q['meninggal']; ?></td>
                        <td><?php echo $q['hilang']; ?></td>
                        <td><?php echo $q['luka']; ?></td>
                        <td><?php echo $q['menderita']; ?></td>
                        <td><?php echo $q['mengunsi_kk']; ?></td>
                        <td><?php echo $q['mengunsi_jiwa']; ?></td>
                        <td><?php echo $q['terisolir_kk']; ?></td>
                        <td><?php echo $q['terisolir_jiwa']; ?></td>
                        <td><?php echo $q['rmh_rb']; ?></td>
                        <td><?php echo $q['rmh_rs']; ?></td>
                        <td><?php echo $q['rmh_rr']; ?></td>
                        <td><?php echo $q['terendam']; ?></td>
                        <td><?php echo $q['hanyut']; ?></td>
                        <td><?php echo $q['sekolah']; ?></td>
                        <td><?php echo $q['sarkes']; ?></td>
                        <td><?php echo $q['tmp_ibadah']; ?></td>
                        <td><?php echo $q['kantor']; ?></td>
                        <td><?php echo $q['pasar']; ?></td>
                        <td><?php echo $q['kios']; ?></td>
                        <td><?php echo $q['bangunan_lain']; ?></td>
                        <td><?php echo $q['irigasi']; ?></td>
                        <td><?php echo $q['bendungan']; ?></td>
                        <td><?php echo $q['jembatan']; ?></td>
                        <td><?php echo $q['jln_meter']; ?></td>
                        <td><?php echo $q['jln_titik']; ?></td>
                        <td><?php echo $q['tebing_sungai']; ?></td>
                        <td><?php echo $q['sawah']; ?></td>
                        <td><?php echo $q['kebun']; ?></td>
                        <td><?php echo $q['kolam_ha']; ?></td>
                        <td><?php echo $q['kolam_p']; ?></td>
                        <td><?php echo $q['ternak']; ?></td>
                        <td><?php echo $q['taksiran_kerugian']; ?></td>
                        <td><?php echo $q['tgl_input']; ?></td>

                        <td>
                          <a href="index.php?p=edit-bencana&id=<?php echo $q['kd_bencana']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <a href="./pages/delete-bencana.php?id=<?php echo $q['kd_bencana']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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