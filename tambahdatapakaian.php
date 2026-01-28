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
    <h3>Form Tambah Data Pakaian</h3>
    <hr>
    <br>
    <form action="proses-tambah-pakaian.php" method="POST" >
        <div class="form-group">
          <label>Kode Pakaian</label>
          <input type="text" class="form-control" name="Id_Pakaian" placeholder="Contoh: B1" required>
        </div>
        <div class="form-group">
          <label>Jenis Pakaian</label>
          <input type="text" class="form-control" name="Jenis_Pakaian" placeholder="Contoh: Baju Muslim" required>
        </div>
        <div class="form-group">
          <label>Harga Satuan (Rp)</label>
          <input type="number" class="form-control" name="harga" placeholder="Contoh: 5000" required>
        </div>
        <div style="margin-top: 2rem;">
          <button type="submit" name="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span> Simpan Data
          </button>
          <a href="pakaian.php" class="btn btn-default">Batal</a>
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
