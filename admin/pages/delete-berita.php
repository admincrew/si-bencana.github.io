<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"DELETE FROM berita WHERE kd_berita='$id'");
	
	if($sql){
 echo '<script> alert("Berita berhasil dihapus."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Berita Gagal dihapus."); javascript:history.back(); </script>';	
	}

  

?>