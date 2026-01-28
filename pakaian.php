<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUTRI LAUNDRY</title>
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
  <div class="panel">
    <h3>Data Pakaian</h3>
    <hr>
    <div class="tombol" style="margin-bottom: 20px;">
      <a href="tambahdatapakaian.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data Pakaian</a>
    </div>
    
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="text-align: center; width: 50px;">No</th>
            <th>Kode Pakaian</th>
            <th>Jenis Pakaian</th>
            <th>Harga (Rp)</th>
            <th style="text-align: center; width: 150px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include "./include/koneksi.php";
            $i = 1;
            $sql = mysqli_query($conn, "SELECT * FROM pakaian ORDER BY Id_Pakaian");
            while ($hasil = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <td style="text-align: center;"><?php echo $i; ?></td>
            <td><code><?php echo $hasil['Id_Pakaian']; ?></code></td>
            <td><strong><?php echo $hasil['Jenis_Pakaian']; ?></strong></td>
            <td>Rp <?php echo number_format($hasil['harga'], 0, ',', '.'); ?></td>
            <td style="text-align: center;">
              <a href="editdatapakaian.php?edit=<?php echo $hasil['Id_Pakaian']; ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="proses-hapus-pakaian.php?hapus=<?php echo $hasil['Id_Pakaian']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php
            $i++;
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<br>
<br>
</div>



<script>
    $(document).ready(function() {
	   $('#table').DataTable();
	} );
</script>
</body>
</html>
<?php
}else{
	header("location:login/index.php");
}
