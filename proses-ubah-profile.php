<?php
session_start();
include "./include/koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($password)) {
        // Jika ganti password
        $query = "UPDATE admin SET nama='$nama', email='$email', pass='$password' WHERE id='$id'";
    } else {
        // Jika tidak ganti password
        $query = "UPDATE admin SET nama='$nama', email='$email' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;
        echo "<script>alert('Profil berhasil diperbarui!'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profil!'); window.history.back();</script>";
    }
}
