<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(190, 7, 'Laporan', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'Hum Hum Laundry', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'No_Order', 1, 0, 'C');
$pdf->Cell(65, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(45, 6, 'Total Bayar', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tgl_Terima', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tgl_Ambil', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10, 'C');

include 'include/koneksi.php';
$laundry = mysqli_query($conn, "SELECT transaksi.*, pelanggan.Nama FROM transaksi join pelanggan where transaksi.No_Identitas = pelanggan.No_Identitas  ORDER BY `No_Order` DESC");
while ($row = mysqli_fetch_array($laundry)) {
    $pdf->Cell(20, 6, $row['No_Order'], 1, 0, 'C');
    $pdf->Cell(65, 6, $row['Nama'], 1, 0, 'C');
    $pdf->Cell(45, 6, number_format($row['Total_Bayar'], 0, ',', '.'), 1, 0, 'C');
    $pdf->Cell(30, 6, $row['Tgl_Terima'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['Tgl_Ambil'], 1, 1, 'C');
}
$pdf->Output();
