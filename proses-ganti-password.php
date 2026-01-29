<?php
session_start();
include "./include/koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $pass_baru = $_POST['pass_baru'];
    $pass_konf = $_POST['pass_konf'];

    if ($pass_baru !== $pass_konf) {
        echo "<script>alert('Konfirmasi password tidak cocok!'); window.history.back();</script>";
        exit();
    }

    $query = "UPDATE admin SET pass='$pass_baru' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Password berhasil diperbarui!'); window.location='index1.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui password!'); window.history.back();</script>";
    }
}
