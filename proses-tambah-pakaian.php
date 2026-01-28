<?php
include "include/koneksi.php";

$Id_Pakaian = $_POST["Id_Pakaian"];
$Jenis_Pakaian = $_POST["Jenis_Pakaian"];
$harga = $_POST["harga"];

if(empty($Id_Pakaian) || empty($Jenis_Pakaian) || !isset($harga)){
	echo "<script language='javascript'>alert('Gagal di tambahkan. Pastikan semua field terisi.');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatapakaian.php">';
}else{
	$sql = "INSERT INTO `pakaian` (`Id_Pakaian`, `Jenis_Pakaian`, `harga`)
			VALUES ('$Id_Pakaian', '$Jenis_Pakaian', '$harga')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=pakaian.php">';
}
?>
