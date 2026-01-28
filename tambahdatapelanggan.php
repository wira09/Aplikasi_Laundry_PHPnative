<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laundry</title>

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
  <div class="panel" style="max-width: 600px; margin: 2rem auto;">
    <h3>Form Tambah Data Pelanggan</h3>
    <hr>
    <br>
    <form action="proses-tambah-pelanggan.php" method="POST" >
        <div class="form-group">
          <label>No. Identitas</label>
          <input type="text" class="form-control" name="No_Identitas" placeholder="Contoh: 12345678" required>
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control" name="Nama" placeholder="Nama Pelanggan" required>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" name="Alamat" placeholder="Alamat Lengkap" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label>No. Telepon / HP</label>
          <input type="text" class="form-control" name="No_Hp" placeholder="08xxxxxxxxxx" required>
        </div>
        <div style="margin-top: 2rem;">
          <button type="submit" name="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span> Simpan Pelanggan
          </button>
          <a href="pelanggan.php" class="btn btn-default">Batal</a>
        </div>
    </form>
  </div>
</div>

</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
