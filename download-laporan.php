<?php
ob_start();
error_reporting(0);
ini_set('display_errors', 0);
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$No_Order = $_GET['cetak'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Struk Transaksi - <?php echo $No_Order; ?></title>
  <style>
    @page {
      margin: 1.5cm 1cm;
    }

    body {
      font-family: 'Helvetica', 'Arial', sans-serif;
      font-size: 11px;
      line-height: 1.4;
      color: #333;
    }

    .header {
      text-align: center;
      margin-bottom: 25px;
      padding-bottom: 12px;
      border-bottom: 2px double #000;
    }

    .header h1 {
      margin: 0;
      padding: 0;
      font-size: 22px;
      letter-spacing: 1px;
      line-height: 1.3;
    }

    .header .tagline {
      margin-top: 8px;
      font-size: 11px;
    }

    .header .alamat {
      margin-top: 4px;
      font-size: 10px;
    }

    .info-table {
      width: 100%;
      margin-bottom: 15px;
    }

    .info-table td {
      vertical-align: top;
      padding: 2px 0;
      border: none;
    }

    .main-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }

    .main-table th,
    .main-table td {
      border: 1px solid #000;
      padding: 6px;
      text-align: left;
    }

    .main-table th {
      background-color: #f2f2f2;
    }

    .footer-info {
      width: 100%;
    }

    .footer-info td {
      border: none;
      padding: 2px 0;
    }

    .total-box {
      text-align: right;
      font-weight: bold;
      font-size: 13px;
      margin-top: 10px;
      padding-top: 5px;
      border-top: 1px solid #000;
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>

<body>

  <?php
  include "./include/koneksi.php";
  $sql = mysqli_query($conn, "SELECT Nama, Alamat, Tgl_Terima, No_Order from (pelanggan join transaksi on pelanggan.No_Identitas = transaksi.No_Identitas) WHERE No_Order = '$No_Order'");
  if ($hasil = mysqli_fetch_array($sql)) {
    $tgl1 = $hasil['Tgl_Terima'];
    $tgl2 = date('Y-m-d', strtotime('+2 days', strtotime($tgl1)));
  ?>
    <!-- <div class="header">
      <h1>PUTRI LAUNDRY</h1>
      <div class="tagline">
        MAU NGIRIT AIR / LISTRIK DATANG KE LAUNDRY AJA
      </div>
      <div class="alamat">
        Jl. Contoh No. 123 - No. HP: 0812 9095 3790
      </div>
    </div> -->
    <table class="info-table">
      <tr>
        <td width="15%"><strong>Nama</strong></td>
        <td width="35%">: <?php echo $hasil['Nama']; ?></td>
        <td width="20%"><strong>Tgl Terima</strong></td>
        <td width="30%">: <?php echo $hasil['Tgl_Terima']; ?></td>
      </tr>
      <tr>
        <td><strong>Alamat</strong></td>
        <td>: <?php echo $hasil['Alamat']; ?></td>
        <td><strong>Tgl Kembali</strong></td>
        <td>: <?php echo $tgl2; ?></td>
      </tr>
      <tr>
        <td><strong>No. Order</strong></td>
        <td colspan="3">: <?php echo $hasil['No_Order']; ?></td>
      </tr>
    </table>
  <?php } ?>

  <table class="main-table">
    <thead>
      <tr>
        <th width="10%" class="text-center">No</th>
        <th width="60%">Jenis Pakaian</th>
        <th width="30%" class="text-center">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      $sql_detail = mysqli_query($conn, "SELECT Jenis_Pakaian, Jumlah_Pakaian from (detail_transaksi join pakaian on detail_transaksi.Id_Pakaian = pakaian.Id_Pakaian) WHERE No_Order = '$No_Order'");
      while ($detail = mysqli_fetch_array($sql_detail)) {
      ?>
        <tr>
          <td class="text-center"><?php echo $i++; ?></td>
          <td><?php echo $detail['Jenis_Pakaian']; ?></td>
          <td class="text-center"><?php echo $detail['Jumlah_Pakaian']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <?php
  $sql_summary = mysqli_query($conn, "SELECT total_berat, diskon, Total_Bayar from transaksi WHERE No_Order = '$No_Order'");
  if ($summary = mysqli_fetch_array($sql_summary)) {
  ?>
    <table class="footer-info">
      <tr>
        <td width="70%">Total Berat</td>
        <td width="30%" class="text-right"><?php echo $summary['total_berat']; ?> Kg</td>
      </tr>
      <tr>
        <td>Diskon</td>
        <td class="text-right">Rp <?php echo number_format($summary['diskon'], 0, ',', '.'); ?></td>
      </tr>
      <tr>
        <td>Total Bayar</td>
        <td class="text-right">Rp <?php echo number_format($summary['Total_Bayar'], 0, ',', '.'); ?></td>
      </tr>
    </table>

    <!-- <div class="total-box">
      TOTAL BAYAR: Rp <?php echo number_format($summary['Total_Bayar'], 0, ',', '.'); ?>
    </div> -->
  <?php } ?>

  <div style="margin-top: 30px; text-align: center; font-style: italic; font-size: 10px;">
    Terima kasih telah mempercayakan cucian Anda kepada kami.
  </div>
</body>

</html>

<?php
$html = ob_get_clean();
$dompdf = new Dompdf();
$dompdf->set_paper("A5", "portrait");
$dompdf->load_html($html);

ob_start();
$dompdf->render();
ob_end_clean();

$dompdf->stream('struk_' . $No_Order . '.pdf', array("Attachment" => false));
exit;
