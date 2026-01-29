<?php
session_start();
if (isset($_SESSION['id'])) {
    include "./include/koneksi.php";
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
                                <div class="form-group">
                                    <label>Password Baru (kosongkan jika tidak ingin mengganti)</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
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
    header("location:login/index.php");
}
?>