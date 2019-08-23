<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM bencana WHERE kd_bencana='$id'");
	
	if($sql){
 echo '<script> alert("Data Bencana berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Data Bencana Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>