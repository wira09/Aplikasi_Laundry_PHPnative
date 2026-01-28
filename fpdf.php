<?php
//lakukan koneksi ke MySQL
mysqli_connect("localhost","root","");

//Pilih database tempat tabel akan dibuat
mysqli_select_db("laundry");

//lakukan query select
SELECT * FROM transaksi
WHERE tanggal >='" .  $_post['Tgl_Terima'] . "'  AND
tanggal >='" . $_post['Tgl_Ambil'] . "'
?>