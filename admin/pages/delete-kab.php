<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM kabupaten WHERE kd_kab='$id'");
	
	if($sql){
 echo '<script> alert("Kabupaten berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Kabupaten Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>