<?php
session_start();
include "../include/koneksi.php";

if (isset($_POST['No_Order'])) {
    $No_Order = $_POST['No_Order'];
    $Id_Pakaian = $_POST['Id_Pakaian'];
    $Jumlah_Pakaian = $_POST['Jumlah_Pakaian'];

    $sql = "INSERT INTO detail_transaksi (No_Order, Id_Pakaian, Jumlah_pakaian) VALUES ('$No_Order', '$Id_Pakaian', '$Jumlah_Pakaian')";
    if (mysqli_query($conn, $sql)) {
        header("location:transaksi_baru.php");
    } else {
        echo "<script>alert('Gagal menambahkan item'); window.history.back();</script>";
    }
}
