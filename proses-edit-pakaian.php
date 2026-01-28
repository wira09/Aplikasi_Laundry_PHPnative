<?php
include "include/koneksi.php";

$Id_Pakaian = $_POST["Id_Pakaian"];
$Jenis_Pakaian = $_POST["Jenis_Pakaian"];
$harga = $_POST["harga"];

if(empty($Id_Pakaian) || empty($Jenis_Pakaian) || !isset($harga)){
	echo "<script language='javascript'>alert('Gagal di Edit. Pastikan semua field terisi.');</script>";
	echo '<meta http-equiv="refresh" content="0; url=editdatapakaian.php?edit='.$Id_Pakaian.'">';
}else{
	$sql = "UPDATE `pakaian` SET `Jenis_Pakaian`='$Jenis_Pakaian', `harga`='$harga' WHERE `Id_Pakaian` = '$Id_Pakaian'";
				$kueri = mysqli_query($conn, $sql);
				echo "<script language='javascript'>alert('Berhasil di Edit');</script>";
				echo '<meta http-equiv="refresh" content="0; url=pakaian.php">';
}
?>
