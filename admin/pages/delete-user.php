<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM user WHERE kd_us='$id'");
	
	if($sql){
 echo '<script> alert("User berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("User Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>