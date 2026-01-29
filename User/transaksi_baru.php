<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
    include "../include/koneksi.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transaksi Baru - Hum Hum Laundry</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../asset/css/admin-style.css">
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <style type="text/css">
            .css_pesan {
                background-color: #F0FFED;
                border: 1px solid #215800;
                padding: 10px;
                width: 100%;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body style="background: #f8fafc;">
        <?php include "include/nav.php"; ?>
        <script>
            $('#menu-transaksi').addClass('active');
        </script>

        <?php
        $sql_last = mysqli_query($conn, "SELECT No_Order FROM transaksi ORDER BY No_Order DESC LIMIT 1");
        $last_order = mysqli_fetch_assoc($sql_last);
        $next_order = ($last_order['No_Order'] ?? 0) + 1;

        // Hitung total dari detail sementara
        $sql_temp = mysqli_query($conn, "SELECT p.harga, dt.Jumlah_pakaian FROM detail_transaksi dt JOIN pakaian p ON dt.Id_Pakaian = p.Id_Pakaian WHERE dt.No_Order = '$next_order'");
        $total_temp = 0;
        while ($temp = mysqli_fetch_array($sql_temp)) {
            $total_temp += ($temp['harga'] * $temp['Jumlah_pakaian']);
        }
        ?>

        <div class="container">
            <h3>Form Transaksi Baru</h3>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form name="form" action="proses-tambah-transaksi.php" method="POST">
                                <div class="form-group">
                                    <label>No. Order</label>
                                    <input type="text" class="form-control" name="No_Order" value="<?php echo $next_order; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Pelanggan</label>
                                    <select class="form-control" name="No_Identitas" required>
                                        <option value="">-- Pilih Pelanggan --</option>
                                        <?php
                                        $id_user = $_SESSION['id'];
                                        $sql_p = mysqli_query($conn, "SELECT No_Identitas, Nama FROM pelanggan WHERE admin_id = '$id_user' ORDER BY Nama");
                                        while ($p = mysqli_fetch_array($sql_p)) {
                                            echo "<option value='" . $p['No_Identitas'] . "'>" . $p['Nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Total Harga Pakaian (Rp)</label>
                                    <input type="text" id="total_berat" class="form-control" name="total_berat" value="<?php echo $total_temp; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Diskon (%)</label>
                                    <input type="number" id="diskon" class="form-control" name="diskon" value="0" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Total Bayar Akhir (Rp)</label>
                                    <input type="text" id="total_bayar" class="form-control" name="total_bayar" value="<?php echo $total_temp; ?>" readonly>
                                </div>
                                <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">

                                <button type="button" onClick="hitungTotal()" class="btn btn-primary">Hitung Total</button>
                                <button type="submit" name="submit" class="btn btn-success">Simpan Transaksi</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div id="pesan"></div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalTambah">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Item Pakaian
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pakaian</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sql_dt = mysqli_query($conn, "SELECT p.Jenis_Pakaian, p.harga, dt.Id_Pakaian, dt.Jumlah_pakaian FROM detail_transaksi dt JOIN pakaian p ON dt.Id_Pakaian = p.Id_Pakaian WHERE dt.No_Order = '$next_order'");
                                while ($dt = mysqli_fetch_array($sql_dt)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $dt['Jenis_Pakaian']; ?></td>
                                        <td><?php echo $dt['Jumlah_pakaian']; ?></td>
                                        <td><?php echo number_format($dt['harga'] * $dt['Jumlah_pakaian'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="proses-hapus-detail.php?order=<?php echo $next_order; ?>&pakaian=<?php echo $dt['Id_Pakaian']; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Detail -->
        <div class="modal fade" id="ModalTambah" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Item Pakaian</h4>
                    </div>
                    <form action="proses-tambah-detail.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="No_Order" value="<?php echo $next_order; ?>">
                            <div class="form-group">
                                <label>Pilih Pakaian</label>
                                <select class="form-control" name="Id_Pakaian" required>
                                    <?php
                                    $sql_pk = mysqli_query($conn, "SELECT * FROM pakaian ORDER BY Jenis_Pakaian");
                                    while ($pk = mysqli_fetch_array($sql_pk)) {
                                        echo "<option value='" . $pk['Id_Pakaian'] . "'>" . $pk['Jenis_Pakaian'] . " - Rp " . number_format($pk['harga'], 0, ',', '.') . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah (Qty)</label>
                                <input type="number" class="form-control" name="Jumlah_Pakaian" required min="1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">Tambah</button>
                            <button class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function hitungTotal() {
                var total = parseFloat(document.getElementById('total_berat').value) || 0;
                var diskon = parseFloat(document.getElementById('diskon').value) || 0;
                var bayar = total - (total * diskon / 100);
                document.getElementById('total_bayar').value = bayar;
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("location:../Login/index.php");
}
?>