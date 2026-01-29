<?php
session_start();
if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hum Hum Laundry</title>
    <?php
    include "include/header.php";
    ?>
  </head>

  <body style="background: #f8fafc;">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">🧺 Hum Hum Laundry</a>
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
        <h3>Laporan Transaksi</h3>
        <hr>
        <div class="tombol" style="margin-bottom: 20px;">
          <a href="cetak.php" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Seluruh Laporan</a>
        </div>
        <br>
        <table id="table" border="2" class="table table-striped table-bordered  table-responsive">
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th>No. Identitas</th>
              <th>Nama</th>
              <th>Tanggal Terima</th>
              <th>Tanggal Ambil</th>
            </tr>
          </thead>

          <tbody>
            <?php
            include "./include/koneksi.php";
            $i = 0 + 1;
            $sql = mysqli_query($conn, "SELECT transaksi.*, pelanggan.Nama FROM transaksi join pelanggan where transaksi.No_Identitas = pelanggan.No_Identitas  ORDER BY `No_Order` DESC");
            while ($hasil = mysqli_fetch_array($sql)) {
            ?>
              <tr>
                <td style="text-align: center;"><?php echo $i; ?></td>
                <td><?php echo $hasil['No_Identitas']; ?></td>
                <td><?php echo $hasil['Nama']; ?></td>
                <td><?php echo $hasil['Tgl_Terima']; ?></td>
                <td><?php echo $hasil['Tgl_Ambil']; ?></td>

              <?php
              $i++;
            }
              ?>

          </tbody>
        </table>
        <br>
        <br>
      </div>

      <script>
        $(document).ready(function() {
          $('#table').DataTable();
        });
      </script>
  </body>

  </html>
<?php
} else {
  header("location:login/index.php");
}
