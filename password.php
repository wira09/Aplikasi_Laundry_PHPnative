<?php
session_start();
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ganti Password - Hum Hum Laundry</title>
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
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Ganti Password</h3>
                        </div>
                        <div class="panel-body">
                            <form action="proses-ganti-password.php" method="POST">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="pass_baru" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" name="pass_konf" class="form-control" required>
                                </div>
                                <hr>
                                <button type="submit" name="submit" class="btn btn-warning btn-block">Update Password</button>
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