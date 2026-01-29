<?php
include "include/koneksi.php";

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $role = 'user'; // Default role

    // Cek apakah email sudah terdaftar
    $cek = mysqli_query($conn, "SELECT email FROM admin WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO admin (nama, email, pass, role) VALUES ('$nama', '$email', '$pass', '$role')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='Login/index.php';</script>";
        } else {
            echo "<script>alert('Gagal Registrasi!'); window.history.back();</script>";
        }
    }
}
