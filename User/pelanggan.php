<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pelanggan Saya - Hum Hum Laundry</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../asset/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../asset/css/admin-style.css">
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <script src="../asset/js/datatables.min.js"></script>
        <script src="../asset/js/dataTables.bootstrap.min.js"></script>
    </head>

    <body style="background: #f8fafc;">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">🧺 Hum Hum Laundry</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
                    <li class="active"><a href="pelanggan.php"><span class="glyphicon glyphicon-user"></span> Data User</a></li>
                    <li><a href="transaksi_baru.php"><span class="glyphicon glyphicon-plus"></span> Transaksi Baru</a></li>
                    <li><a href="riwayat.php"><span class="glyphicon glyphicon-list-alt"></span> Riwayat Transaksi</a></li>
                    <li><a href="pakaian.php"><span class="glyphicon glyphicon-tags"></span> Data Pakaian</a></li>
                    <li class="dropdown" id="menu-akun">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog"></span> Akun <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Ubah Profil</a></li>
                            <li><a href="password.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="margin-right: 5px;"></span> Keluar</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="panel-title">Data Saya</h3>
                    <a href="tambah_pelanggan.php" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>ID / KTP</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../include/koneksi.php";
                                $id_user = $_SESSION['id'];
                                $i = 1;
                                // Hanya menampilkan pelanggan yang didaftarkan oleh user ini (jika kolom admin_id ada)
                                // Jika kolom admin_id belum ada di tabel pelanggan, ini akan menampilkan semua sebagai fallback
                                $check_col = mysqli_query($conn, "SHOW COLUMNS FROM `pelanggan` LIKE 'admin_id'");
                                if (mysqli_num_rows($check_col) > 0) {
                                    $sql = mysqli_query($conn, "SELECT * FROM pelanggan WHERE admin_id = '$id_user' ORDER BY Nama ASC");
                                } else {
                                    $sql = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY Nama ASC");
                                }

                                while ($hasil = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i++; ?></td>
                                        <td><?php echo $hasil['No_Identitas']; ?></td>
                                        <td><?php echo $hasil['Nama']; ?></td>
                                        <td><?php echo $hasil['Alamat']; ?></td>
                                        <td><?php echo $hasil['No_Hp']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    header("location:../Login/index.php");
}
?>