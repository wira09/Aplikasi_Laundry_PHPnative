<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Pakaian - Hum Hum Laundry</title>
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
            $('#menu-pakaian').addClass('active');
        </script>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Harga Pakaian</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>Jenis Pakaian</th>
                                    <th>Harga (per Kg/Pcs)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../include/koneksi.php";
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM pakaian ORDER BY Jenis_Pakaian ASC");
                                while ($hasil = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i++; ?></td>
                                        <td><?php echo $hasil['Jenis_Pakaian']; ?></td>
                                        <td>Rp <?php echo number_format($hasil['harga'], 0, ',', '.'); ?></td>
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