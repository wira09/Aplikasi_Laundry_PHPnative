<?php
session_start();
include "../include/koneksi.php";

if (isset($_GET['order']) && isset($_GET['pakaian'])) {
    $order = $_GET['order'];
    $pakaian = $_GET['pakaian'];

    $sql = "DELETE FROM detail_transaksi WHERE No_Order = '$order' AND Id_Pakaian = '$pakaian'";
    if (mysqli_query($conn, $sql)) {
        header("location:transaksi_baru.php");
    } else {
        echo "<script>alert('Gagal menghapus item'); window.history.back();</script>";
    }
}
