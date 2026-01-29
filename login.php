<?php
session_start();
include "include/koneksi.php";
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND pass='$password'");
	$num = mysqli_num_rows($sql);
	if ($num > 0) {
		$data = mysqli_fetch_array($sql);
		$_SESSION['id'] = $data['id'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['role'] = isset($data['role']) ? $data['role'] : 'user';
		$_SESSION['nama'] = isset($data['nama']) ? $data['nama'] : 'Admin';
		echo "<script language='javascript'>alert('Login Berhasil')</script>";
		if ($_SESSION['role'] == 'admin') {
			echo '<meta http-equiv="refresh" content="0; url=index1.php">';
		} else {
			echo '<meta http-equiv="refresh" content="0; url=User/index.php">';
		}
	} else {
		echo "<script language='javascript'>alert('Login Gagal')</script>";
		echo '<meta http-equiv="refresh" content="0; url=Login/index.php">';
	}
}
