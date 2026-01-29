<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
    include "../include/koneksi.php";
    $id = $_SESSION['id'];
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE id='$id'");
    $data = mysqli_fetch_array($query);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ubah Profil - Hum Hum Laundry</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../asset/css/admin-style.css">
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </head>

    <body style="background: #f8fafc;">
        <?php include "include/nav.php"; ?>
        <script>
            $('#menu-akun').addClass('active');
        </script>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Ubah Profil</h3>
                        </div>
                        <div class="panel-body">
                            <form action="proses-ubah-profile.php" method="POST">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
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