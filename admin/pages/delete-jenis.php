<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM jenis_bencana WHERE kd_jenis='$id'");
	
	if($sql){
 echo '<script> alert("Jenis Bencana berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Jenis Bencana Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>