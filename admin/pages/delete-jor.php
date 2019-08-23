<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM jorong WHERE kd_jor='$id'");
	
	if($sql){
 echo '<script> alert("Jorong berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Jorong Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>