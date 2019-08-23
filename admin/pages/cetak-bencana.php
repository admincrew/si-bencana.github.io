<?php
$namafile = "daftar-bencana-alam.xls";
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=$namafile");
header("Expires:0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Pragma: public");
?>
<body onload="window.print();">
    <h4><b>LAPORAN DATA BENCANA ALAM</b></h4>
    <h4><b>BADAN PENANGGULANGAN BENCANA DAERAH PROVINSI SUMATERA BARAT</b></h4>
    <h3>Jl.Jendral Sudirman No.47  , Telp: (0751) 890720 , Email: bpbd@sumbarprov.go.id </h3>
<p>Per Tanggal : <b><?php echo date('d F Y',strtotime($_GET['tgl1'])); ?> - <?php echo date('d F Y',strtotime($_GET['tgl2'])); ?></b></p>
      <table border="1" cellpadding="5">

                      <tr>
                        <th>No</th>
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
                      </tr>
                   
                        <?php
                       include '../../koneksi/koneksi.php'; 


                          $sql=mysqli_query($koneksi,"SELECT * FROM bencana,nagari,kecamatan,kabupaten,user,jorong WHERE kabupaten.kd_kab=bencana.kd_kab and kecamatan.kd_kec=bencana.kd_kec and nagari.kd_nag=bencana.kd_nag and jorong.kd_jor=bencana.kd_jor and user.kd_us=bencana.kd_operator and date(bencana.tgl_kejadian) between '$_GET[tgl1]' and '$_GET[tgl2]' ORDER BY tgl_kejadian DESC");

                     
                        $no=0;$total=0;$kj=0;
                         $a1=0;$a2=0;$a3=0;$a4=0;$a5=0;$a6=0;$a7=0;$a8=0;$a9=0;$a10=0;$a11=0;$a12=0;$a13=0;$a14=0;$a15=0;$a16=0;$a17=0;$a18=0;$a19=0;$a20=0;$a21=0;$a22=0;$a23=0;$a24=0;$a25=0;$a26=0;$a27=0;$a28=0;$a29=0;$a30=0;$a31=0;
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
                          $bln=$bulan[ (int)$q['bulan'] ];;
                                   $total+=$q['taksiran_kerugian'];
                                    $kj+=$q['jml_kejadian'];
                                   $a1+=$q['meninggal'];$a2+=$q['hilang'];$a3+=$q['luka'];$a4+=$q['menderita'];$a5+=$q['mengunsi_kk'];$a6+=$q['mengunsi_jiwa'];$a7+=$q['terisolir_jiwa'];$a8+=$q['terisolir_kk'];$a9+=$q['rmh_rb'];$a10+=$q['rmh_rs'];$a11+=$q['rmh_rr'];$a12+=$q['terendam'];$a13+=$q['hanyut'];$a14+=$q['sekolah'];$a15+=$q['sarkes'];$a16+=$q['tmp_ibadah'];$a17+=$q['kantor'];$a18+=$q['pasar'];$a19+=$q['kios'];$a20+=$q['bangunan_lain'];$a21+=$q['irigasi'];$a22+=$q['bendungan'];$a23+=$q['jembatan'];$a24+=$q['jln_meter'];$a25+=$q['jln_titik'];$a26+=$q['tebing_sungai'];$a27+=$q['sawah'];$a28+=$q['kebun'];$a29+=$q['kolam_ha'];$a30+=$q['kolam_p'];$a31+=$q['ternak'];   
                    

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
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
                        <td>Rp <?php echo number_format($q['taksiran_kerugian'],0,".","."); ?></td>
                      </tr>

                  <?php } ?>
                    <tr>
                    <td  colspan="10"><b>TOTAL :</b></td>
                    <td><?php echo $kj; ?></td>
                    <td  colspan="4"></td>
                    <td><?php echo $a1; ?></td>
                     <td><?php echo $a2; ?></td>
                     <td><?php echo $a3; ?></td>
                     <td><?php echo $a4; ?></td>
                     <td><?php echo $a5; ?></td>
                     <td><?php echo $a6; ?></td>
                     <td><?php echo $a7; ?></td>
                     <td><?php echo $a8; ?></td>
                     <td><?php echo $a9; ?></td>
                     <td><?php echo $a10; ?></td>
                     <td><?php echo $a11; ?></td>
                     <td><?php echo $a12; ?></td>
                     <td><?php echo $a13; ?></td>
                     <td><?php echo $a14; ?></td>
                     <td><?php echo $a15; ?></td>
                     <td><?php echo $a16; ?></td>
                     <td><?php echo $a17; ?></td>
                     <td><?php echo $a18; ?></td>
                     <td><?php echo $a19; ?></td>
                     <td><?php echo $a20; ?></td>
                     <td><?php echo $a21; ?></td>
                     <td><?php echo $a22; ?></td>
                     <td><?php echo $a23; ?></td>
                     <td><?php echo $a24; ?></td>
                     <td><?php echo $a25; ?></td>
                     <td><?php echo $a26; ?></td>
                     <td><?php echo $a27; ?></td>
                     <td><?php echo $a28; ?></td>
                     <td><?php echo $a29; ?></td>
                     <td><?php echo $a30; ?></td>
                     <td><?php echo $a31; ?></td>
                     <td><b>Rp <?php echo number_format($total,0,".","."); ?></b></td>
                    
                  </tr>
               
                  </table>
                  <p></p>
<div class="ttd" style="float: right;">
  Padang, <?php echo date("d F Y"); ?><br>
  Diketahui

  <br>
  <br>
  <br>
 Pimpinan
</div>
</body>