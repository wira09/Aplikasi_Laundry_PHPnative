<li><a href="index1.php"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>

<?php
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
if ($role == 'admin'):
?>
    <li><a href="pelanggan.php"><span class="glyphicon glyphicon-user"></span> Data Pelanggan</a></li>
    <li><a href="tambahdatatransaksi.php"><span class="glyphicon glyphicon-plus"></span> Transaksi Baru</a></li>
    <li><a href="transaksi.php"><span class="glyphicon glyphicon-list-alt"></span> Data Transaksi</a></li>
    <li><a href="pakaian.php"><span class="glyphicon glyphicon-tags"></span> Data Pakaian</a></li>
    <li><a href="laporan1.php"><span class="glyphicon glyphicon-print"></span> Laporan</a></li>
<?php else: ?>
    <li><a href="transaksi.php"><span class="glyphicon glyphicon-list-alt"></span> Riwayat Transaksi</a></li>
<?php endif; ?>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-cog"></span> Akun <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Ubah Profil</a></li>
        <li><a href="password.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
    </ul>
</li>