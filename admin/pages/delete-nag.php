<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM nagari WHERE kd_nag='$id'");
	
	if($sql){
 echo '<script> alert("Nagari berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Nagari Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>