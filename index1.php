<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PUTRI LAUNDRY</title>

    <?php
      include "include/header.php";
    ?>
  </head>
  <body style="background: #f8fafc;">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
      <a class="navbar-brand" href="#">🧺 Putri Laundry</a>
    </div>
    <ul class="nav navbar-nav">
      <?php
        include "include/list.php"
      ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="margin-right: 5px;"></span> Keluar</a></li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="jumbotron text-center" style="padding:100px 50px;">
        <div style="font-size: 4rem; margin-bottom: 1rem;">👋</div>
        <h1>Halo, Selamat Datang!</h1>
        <p style="font-size: 1.2rem; opacity: 0.9;">Panel Admin Putri Laundry - Kelola transaksi dengan mudah dan cepat.</p>
    </div>
</div>

<?php
}else{
	header("location:login/index.php");
}
