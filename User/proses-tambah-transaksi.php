<?php
session_start();
include "../include/koneksi.php";

$No_Order = $_POST["No_Order"];
$No_Identitas = $_POST["No_Identitas"];
$total_berat = $_POST["total_berat"];
$diskon = $_POST["diskon"];
$total_bayar = $_POST["total_bayar"];
$Tgl_Terima = $_POST["tanggal"];
$id_user = $_SESSION['id'];

if (empty($No_Order) || empty($No_Identitas) || empty($total_bayar) || empty($Tgl_Terima)) {
    echo "<script language='javascript'>alert('Gagal ditambahkan, data tidak lengkap'); window.history.back();</script>";
} else {
    $sql = "INSERT INTO `transaksi` (`No_Order`, `No_Identitas`, `Tgl_Terima`, `Tgl_Ambil`, `total_berat`, `diskon`, `Total_Bayar`, `admin_id`)
			VALUES ('$No_Order', '$No_Identitas', '$Tgl_Terima', NULL, '$total_berat', '$diskon', '$total_bayar', '$id_user')";
    $kueri = mysqli_query($conn, $sql);
    echo "<script language='javascript'>alert('Transaksi Berhasil ditambahkan'); window.location='riwayat.php';</script>";
}
