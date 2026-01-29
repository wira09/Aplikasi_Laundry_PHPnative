<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Riwayat Transaksi - Hum Hum Laundry</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../asset/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../asset/css/admin-style.css">
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <script src="../asset/js/datatables.min.js"></script>
        <script src="../asset/js/dataTables.bootstrap.min.js"></script>
    </head>

    <body style="background: #f8fafc;">
        <?php include "include/nav.php"; ?>
        <script>
            $('#menu-riwayat').addClass('active');
        </script>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Riwayat Transaksi Saya</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>No. Order</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tgl Terima</th>
                                    <th>Tgl Ambil</th>
                                    <th>Total Bayar</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../include/koneksi.php";
                                $id_user = $_SESSION['id'];
                                $i = 1;
                                // Hanya menampilkan transaksi yang admin_id nya sesuai dengan ID user yang login
                                $sql = mysqli_query($conn, "SELECT transaksi.*, pelanggan.Nama FROM transaksi 
                                           JOIN pelanggan ON transaksi.No_Identitas = pelanggan.No_Identitas 
                                           WHERE transaksi.admin_id = '$id_user' 
                                           ORDER BY transaksi.No_Order DESC");
                                while ($hasil = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i++; ?></td>
                                        <td><?php echo $hasil['No_Order']; ?></td>
                                        <td><?php echo $hasil['Nama']; ?></td>
                                        <td><?php echo $hasil['Tgl_Terima']; ?></td>
                                        <td><?php echo $hasil['Tgl_Ambil'] ? $hasil['Tgl_Ambil'] : '<span class="label label-warning">Belum Diambil</span>'; ?></td>
                                        <td>Rp <?php echo number_format($hasil['Total_Bayar'], 0, ',', '.'); ?></td>
                                        <td style="text-align: center;">
                                            <a href="../download-laporan.php?cetak=<?php echo $hasil['No_Order']; ?>" class="btn btn-xs btn-info" target="_blank">Cetak</a>
                                        </td>
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