-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 03 Okt 2024 pada 13.55
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_produk`, `jumlah`, `harga`) VALUES
(1, 1, 14, 1, 2500),
(2, 1, 15, 2, 4000),
(3, 2, 14, 1, 2500),
(4, 2, 15, 1, 2000),
(5, 3, 14, 2, 5000),
(6, 4, 14, 1, 2500),
(7, 4, 15, 1, 2000),
(15, 11, 15, 2, 4000),
(16, 11, 14, 2, 5000),
(26, 21, 14, 1, 2500),
(27, 21, 15, 2, 4000),
(28, 22, 15, 4, 8000),
(29, 22, 14, 1, 2500),
(30, 23, 15, 1, 2000),
(31, 23, 14, 2, 5000),
(32, 24, 15, 1, 2000),
(33, 25, 15, 2, 4000),
(34, 26, 14, 2, 5000),
(35, 27, 14, 2, 5000),
(36, 27, 15, 2, 4000),
(37, 28, 14, 3, 7500),
(38, 29, 15, 1, 2000),
(39, 31, 32, 1, 1000),
(40, 32, 14, 1, 2500),
(41, 33, 32, 1, 1000),
(42, 34, 15, 1, 2000),
(43, 34, 32, 2, 2000),
(44, 35, 32, 1, 1000),
(45, 36, 32, 1, 1000),
(46, 37, 14, 1, 2500),
(47, 38, 15, 1, 2000),
(48, 42, 15, 1, 2000),
(49, 46, 15, 1, 2000),
(50, 48, 15, 1, 2000),
(51, 51, 15, 1, 2000),
(52, 52, 15, 1, 2000),
(53, 53, 14, 1, 2500),
(54, 53, 15, 2, 4000),
(55, 54, 15, 1, 2000),
(56, 54, 14, 1, 2500),
(57, 54, 32, 1, 1000),
(58, 55, 14, 1, 2500),
(59, 55, 15, 2, 4000),
(60, 56, 33, 2, 7000),
(61, 56, 32, 3, 3000),
(62, 57, 33, 1, 3500),
(63, 57, 15, 2, 4000),
(64, 58, 14, 1, 2500),
(65, 58, 32, 2, 2000),
(66, 59, 15, 2, 4000),
(67, 59, 33, 2, 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` char(1) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`, `nama_pengguna`, `alamat`, `nomor_telepon`, `foto`, `tanggal_update`) VALUES
(1, 'maman', '123957', '1', 'Ahmad Lukman', 'Sidomulyo, Gulon, Salam, Magelang.', '089504260916', 'Hitam_dan_Putih_Modern_Nama_Toko_Logo.png', '2024-10-03'),
(12, 'yogi', '123456', '2', 'Ahmad Dwi Ariyanto', 'Prambanan', '089654324573', 'gelang_prusik_Logo_-_Original_-_5000x5000.png', '2024-06-25'),
(18, 'ahmad', '123456', '2', 'ahmad', 'Gulon', '089765213456', '', '2024-09-21'),
(20, 'hiban', '123456', '1', 'Ahmad Hiban', 'Gulon, Salam, Magelang', '089765433456', 'PRUSIK_Logo_-_White_with_Black_Background_-_5000x5000.png', '2024-10-03'),
(21, 'baban', '123456', '2', 'Hiban', '', '', '', '2024-10-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `metode_pembayaran` char(1) NOT NULL,
  `status_penjualan` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pengguna`, `tanggal_penjualan`, `metode_pembayaran`, `status_penjualan`) VALUES
(1, 12, '2024-07-21', '1', '1'),
(2, 12, '2024-08-01', '2', '1'),
(3, 12, '2024-09-01', '1', '1'),
(4, 12, '2024-09-17', '1', '1'),
(11, 12, '2024-09-19', '2', '1'),
(21, 18, '2024-09-21', '1', '1'),
(22, 12, '2024-09-23', '1', '1'),
(23, 12, '2024-09-23', '1', '1'),
(24, 12, '2024-09-24', '2', '1'),
(25, 12, '2024-09-26', '1', '1'),
(26, 12, '2024-09-26', '1', '1'),
(27, 12, '2024-09-26', '1', '1'),
(28, 12, '2024-09-30', '1', '1'),
(29, 12, '2024-10-03', '2', '1'),
(30, 12, '2024-10-03', '1', '1'),
(31, 12, '2024-10-03', '1', '1'),
(32, 12, '2024-10-03', '1', '1'),
(33, 12, '2024-10-03', '1', '1'),
(34, 12, '2024-10-03', '2', '1'),
(35, 12, '2024-10-03', '2', '1'),
(36, 12, '2024-10-03', '2', '1'),
(37, 12, '2024-10-03', '1', '1'),
(38, 12, '2024-10-03', '2', '1'),
(39, 12, '2024-10-03', '2', '1'),
(40, 12, '2024-10-03', '2', '1'),
(41, 12, '2024-10-03', '2', '1'),
(42, 12, '2024-10-03', '1', '1'),
(43, 12, '2024-10-03', '2', '1'),
(44, 12, '2024-10-03', '2', '1'),
(45, 12, '2024-10-03', '2', '1'),
(46, 12, '2024-10-03', '1', '1'),
(47, 12, '2024-10-03', '2', '1'),
(48, 12, '2024-10-03', '1', '1'),
(49, 12, '2024-10-03', '2', '1'),
(50, 12, '2024-10-03', '2', '1'),
(51, 12, '2024-10-03', '2', '1'),
(52, 12, '2024-10-03', '2', '1'),
(53, 12, '2024-10-03', '2', '1'),
(54, 12, '2024-10-03', '2', '1'),
(55, 12, '2024-10-03', '1', '1'),
(56, 21, '2024-10-03', '1', '1'),
(57, 21, '2024-10-03', '2', '1'),
(58, 21, '2024-10-03', '1', '1'),
(59, 21, '2024-10-03', '2', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_beli`, `harga_jual`, `stok`, `gambar`, `deskripsi`, `tanggal_update`) VALUES
(14, 2, 'Aqua', 2200, 2500, 47, '10003814_1.jpg', 'Air Mineral Aqua ukuran 600 ml', '2024-09-23'),
(15, 1, 'Wafer', 1800, 2000, 258, 'ffdd1518-81ee-4235-b584-97446278078c.jpg', 'Biskuit Roma Wafello ukuran 48 gram', '2024-08-10'),
(32, 1, 'Mie Gemez Enak', 800, 1000, 43, 'aecc1925ceedb07a15868fa1c41f8018_jpg_720x720q80.jpg', 'Mie Gemez Enak ukuran 100g', '2024-09-30'),
(33, 2, 'Fanta', 3000, 3500, 60, '70e28624e2990c004e9fae98a750e88e.jpg', 'Fanta merah ukuran 250ml', '2024-10-03'),
(35, 1, 'Fullo', 800, 1000, 25, 'brc-8991102381000-1.jpg', 'Fullo ukuran 9g', '2024-10-03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `fk_penjualan_detail_penjualan` (`id_penjualan`),
  ADD KEY `fk_penjualan_produk` (`id_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_produk` (`id_produk`),
  ADD KEY `fk_keranjang_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_penjualan_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `fk_penjualan_detail_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `fk_penjualan_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_keranjang_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
