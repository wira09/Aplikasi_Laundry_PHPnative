<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - Hum Hum Laundry</title>
        <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../asset/css/admin-style.css">
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </head>

    <body style="background: #f8fafc;">
        <?php include "include/nav.php"; ?>
        <script>
            $('#menu-beranda').addClass('active');
        </script>
        <div class="container">
            <div class="jumbotron text-center" style="padding:100px 50px;">
                <div style="font-size: 4rem; margin-bottom: 1rem;">👋</div>
                <h1>Halo, <?php echo ucwords(isset($_SESSION['nama'])) ? ucwords($_SESSION['nama']) : 'User'; ?>!</h1>
                <p style="font-size: 1.2rem; opacity: 0.9;">Panel User Hum Hum Laundry - Selamat bekerja!</p>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:../Login/index.php");
}
?>