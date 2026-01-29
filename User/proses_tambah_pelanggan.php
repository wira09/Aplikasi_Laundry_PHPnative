<?php
session_start();
include "../include/koneksi.php";

if (isset($_POST['submit'])) {
    $No_Identitas = mysqli_real_escape_string($conn, $_POST["No_Identitas"]);
    $Nama = mysqli_real_escape_string($conn, $_POST["Nama"]);
    $Alamat = mysqli_real_escape_string($conn, $_POST["Alamat"]);
    $No_Hp = mysqli_real_escape_string($conn, $_POST["No_Hp"]);
    $admin_id = $_SESSION['id'];

    if (empty($No_Identitas) || empty($Nama) || empty($Alamat) || empty($No_Hp)) {
        echo "<script>alert('Data tidak lengkap!'); window.history.back();</script>";
    } else {
        // Kita simpan admin_id untuk menandai siapa yang mendaftarkan pelanggan ini
        $sql = "INSERT INTO `pelanggan` (`No_Identitas`, `Nama`, `Alamat`, `No_Hp`, `admin_id`)
                VALUES ('$No_Identitas', '$Nama', '$Alamat', '$No_Hp', '$admin_id')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Berhasil menambahkan pelanggan!'); window.location='pelanggan.php';</script>";
        } else {
            // Jika kolom admin_id belum ada, kita coba insert tanpa itu (sebagai fallback) agar tidak error total
            $sql_fallback = "INSERT INTO `pelanggan` (`No_Identitas`, `Nama`, `Alamat`, `No_Hp`)
                            VALUES ('$No_Identitas', '$Nama', '$Alamat', '$No_Hp')";
            if (mysqli_query($conn, $sql_fallback)) {
                echo "<script>alert('Berhasil menambahkan pelanggan (Admin-ID skipped)'); window.location='pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan pelanggan!'); window.history.back();</script>";
            }
        }
    }
}
