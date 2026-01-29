<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Pelanggan - Hum Hum Laundry</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../asset/css/admin-style.css">
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </head>

    <body style="background: #f8fafc;">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">🧺 Hum Hum Laundry</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
                    <li class="active"><a href="pelanggan.php"><span class="glyphicon glyphicon-user"></span> Pelanggan Saya</a></li>
                    <li><a href="transaksi_baru.php"><span class="glyphicon glyphicon-plus"></span> Transaksi Baru</a></li>
                    <li><a href="riwayat.php"><span class="glyphicon glyphicon-list-alt"></span> Riwayat Transaksi</a></li>
                    <li><a href="pakaian.php"><span class="glyphicon glyphicon-tags"></span> Data Pakaian</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="margin-right: 5px;"></span> Keluar</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="panel panel-default" style="max-width: 600px; margin: 2rem auto;">
                <div class="panel-heading">
                    <h3 class="panel-title">Registrasi Pelanggan Baru</h3>
                </div>
                <div class="panel-body">
                    <form action="proses_tambah_pelanggan.php" method="POST">
                        <div class="form-group">
                            <label>No. Identitas / KTP</label>
                            <input type="text" class="form-control" name="No_Identitas" placeholder="Masukkan nomor identitas" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" name="Nama" placeholder="Nama lengkap pelanggan" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="Alamat" rows="3" placeholder="Alamat lengkap" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" class="form-control" name="No_Hp" placeholder="08xxxxxxxxxx" required>
                        </div>
                        <hr>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan Data Pelanggan</button>
                        <a href="pelanggan.php" class="btn btn-default btn-block">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/index.php");
}
?>