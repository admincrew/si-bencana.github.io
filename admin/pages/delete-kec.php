<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM kecamatan WHERE kd_kec='$id'");
	
	if($sql){
 echo '<script> alert("Kecamatan berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Kecamatan Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>