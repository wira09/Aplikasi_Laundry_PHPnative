-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jan 2026 pada 05.02
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `pass`, `role`) VALUES
(1, 'wira', 'sbd8@email.com', 'bismillah', 'admin'),
(2, 'berlian', 'berlian@gmail.com', 'berlian123', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `No_Order` char(4) NOT NULL,
  `Id_Pakaian` char(2) NOT NULL,
  `Jumlah_pakaian` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`No_Order`, `Id_Pakaian`, `Jumlah_pakaian`) VALUES
('1135', 'B3', 2),
('1135', 'S4', 2),
('1134', 'S4', 8),
('1136', 'B1', 1),
('1136', 'K2', 1),
('1137', 'K1', 1),
('1137', 'B1', 1),
('1138', 'K1', 2),
('1138', 'K3', 1),
('1139', 'J1', 2),
('1139', 'M1', 1),
('1139', 'S2', 1),
('1140', 'B2', 1),
('1141', 'B1', 2),
('1140', 'C2', 2),
('1141', 'C1', 1),
('1142', 'B2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakaian`
--

CREATE TABLE `pakaian` (
  `Id_Pakaian` char(2) NOT NULL,
  `Jenis_Pakaian` varchar(15) NOT NULL,
  `harga` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pakaian`
--

INSERT INTO `pakaian` (`Id_Pakaian`, `Jenis_Pakaian`, `harga`) VALUES
('B1', 'Baju Muslim', 5000),
('B2', 'Bad Cover', 10000),
('B3', 'Boneka', 10000),
('C1', 'Celana Dalam', 5000),
('C2', 'Celana Panjang', 8000),
('C3', 'Celana Pendek', 6000),
('D1', 'Daster', 5000),
('H1', 'Handuk', 3000),
('J1', 'Jaket', 10000),
('K1', 'Kaos', 5000),
('K2', 'Kaos Dalam', 3000),
('K3', 'Kaos Kaki', 1000),
('K4', 'Kebaya', 25000),
('K5', 'Kemeja', 10000),
('M1', 'Mukena', 10000),
('R1', 'Rok', 10000),
('R2', 'Rompi', 10000),
('S1', 'Sarung Bantal', 5000),
('S2', 'Sejadah', 5000),
('S3', 'Sarung Guling', 5000),
('S4', 'Selimut', 15000),
('S5', 'Seprei', 15000),
('S6', 'Sweater', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `No_Identitas` char(8) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(30) DEFAULT NULL,
  `No_Hp` varchar(15) NOT NULL,
  `admin_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`No_Identitas`, `Nama`, `Alamat`, `No_Hp`, `admin_id`) VALUES
('10115562', 'Hani', 'Bandung', '081232121111', NULL),
('10115310', 'Barrur', 'Bandung', '089123222321', NULL),
('10115315', 'Nanda', 'Bandung', '087824521555', NULL),
('10115313', 'Fata', 'Bandung', '087822555784', NULL),
('10115322', 'Sinta', 'Bandung', '082313112111', NULL),
('10115320', 'Nur', 'Bandung', '082122122122', NULL),
('1212123', 'Berlian', 'bebas', '08123123134', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `No_Order` char(4) NOT NULL,
  `No_Identitas` char(8) NOT NULL,
  `Tgl_Terima` date DEFAULT NULL,
  `Tgl_Ambil` date DEFAULT NULL,
  `total_berat` float NOT NULL,
  `diskon` float NOT NULL,
  `Total_Bayar` int DEFAULT NULL,
  `admin_id` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`No_Order`, `No_Identitas`, `Tgl_Terima`, `Tgl_Ambil`, `total_berat`, `diskon`, `Total_Bayar`, `admin_id`) VALUES
('1134', '10115562', '2017-06-10', '2017-06-12', 7.7, 0, 46000, 1),
('1135', '10115310', '2017-06-10', '2017-06-12', 4, 0, 24000, 1),
('1136', '10115315', '2017-06-11', '2017-06-13', 2, 0, 12000, 1),
('1137', '10115313', '2017-06-12', '2017-06-14', 1.6, 0, 9000, 1),
('1138', '10115322', '2017-06-12', '2017-06-14', 2.7, 0, 16200, 1),
('1139', '10115320', '2017-06-13', '2017-06-14', 4, 0, 24000, 1),
('1140', '10115310', '2018-01-23', '2018-01-23', 3, 0, 21000, 0),
('1141', '10115310', '2018-01-23', '2018-01-23', 3, 0, 21000, 0),
('1142', '1212123', '2026-01-29', '2026-01-29', 20000, 0, 20000, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `No_Order` (`No_Order`),
  ADD KEY `Id_Pakaian` (`Id_Pakaian`);

--
-- Indeks untuk tabel `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`Id_Pakaian`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`No_Identitas`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`No_Order`),
  ADD KEY `No_Identitas` (`No_Identitas`),
  ADD KEY `No_Identitas_2` (`No_Identitas`),
  ADD KEY `No_Identitas_3` (`No_Identitas`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
