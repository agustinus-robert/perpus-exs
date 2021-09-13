-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2021 at 05:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_buku`
--

CREATE TABLE `lib_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(60) DEFAULT NULL,
  `pengarang` varchar(60) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `penerbit` varchar(60) DEFAULT NULL,
  `isbn` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_buku`
--

INSERT INTO `lib_buku` (`id`, `judul`, `pengarang`, `foto`, `penerbit`, `isbn`) VALUES
(10, 'Aku', 'Chairil Anwar', NULL, 'Jakarta', '123456789'),
(11, 'steve jobs', 'walter issacson', NULL, 'gramedia', '555666777'),
(12, 'buku saya', 'saya sendiri', NULL, 'saya juga', '1222');

-- --------------------------------------------------------

--
-- Table structure for table `lib_denda`
--

CREATE TABLE `lib_denda` (
  `id` int(11) NOT NULL,
  `id_pinjam` varchar(6) DEFAULT NULL,
  `jml_denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lib_denda_detail`
--

CREATE TABLE `lib_denda_detail` (
  `id` int(11) NOT NULL,
  `id_denda` varchar(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tipe_denda` varchar(11) DEFAULT NULL COMMENT 'Jika 1 barang terlambat, 2 barang rusak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lib_jumlah_buku`
--

CREATE TABLE `lib_jumlah_buku` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_jumlah_buku`
--

INSERT INTO `lib_jumlah_buku` (`id`, `id_buku`, `jumlah_buku`, `created_at`, `updated_at`) VALUES
(6, 11, 2, '2021-09-08 08:00:14', '2021-09-08 08:00:14'),
(7, 10, 5, '2021-09-12 10:00:21', '2021-09-12 10:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `lib_peminjam`
--

CREATE TABLE `lib_peminjam` (
  `id` int(11) NOT NULL,
  `id_pengunjung` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `pengembalian` int(11) DEFAULT 0 COMMENT 'jika 0 maka belum transaksi keluar dan kembali, jika 1 barang keluar, jika 2 barang kembali',
  `tgl_pengembalian` date DEFAULT NULL,
  `status_denda` int(11) DEFAULT 0 COMMENT 'Jika 0 maka proses denda dapat dilakukan, jika 1 proses denda telah dilakukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_peminjam`
--

INSERT INTO `lib_peminjam` (`id`, `id_pengunjung`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `pengembalian`, `tgl_pengembalian`, `status_denda`) VALUES
(7, 8, '2021-09-12', '2021-09-14', 1, 2, '2021-09-12', 0),
(8, 8, NULL, NULL, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lib_peminjaman_detail`
--

CREATE TABLE `lib_peminjaman_detail` (
  `id` int(11) NOT NULL,
  `id_trans_pinjam` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_pinjam` int(11) DEFAULT NULL,
  `jumlah_aktual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_peminjaman_detail`
--

INSERT INTO `lib_peminjaman_detail` (`id`, `id_trans_pinjam`, `id_buku`, `jumlah_pinjam`, `jumlah_aktual`) VALUES
(8, 7, 10, 1, 5),
(9, 8, 10, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lib_pengunjung`
--

CREATE TABLE `lib_pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `no_kartu` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_pengunjung`
--

INSERT INTO `lib_pengunjung` (`id`, `nama`, `no_kartu`, `tgl_lahir`, `alamat`) VALUES
(8, 'agus', '123', '2021-09-02', 'solo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_buku`
--
ALTER TABLE `lib_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_denda`
--
ALTER TABLE `lib_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_denda_detail`
--
ALTER TABLE `lib_denda_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_jumlah_buku`
--
ALTER TABLE `lib_jumlah_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_peminjam`
--
ALTER TABLE `lib_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_peminjaman_detail`
--
ALTER TABLE `lib_peminjaman_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_pengunjung`
--
ALTER TABLE `lib_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lib_buku`
--
ALTER TABLE `lib_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lib_denda`
--
ALTER TABLE `lib_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lib_denda_detail`
--
ALTER TABLE `lib_denda_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lib_jumlah_buku`
--
ALTER TABLE `lib_jumlah_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lib_peminjam`
--
ALTER TABLE `lib_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lib_peminjaman_detail`
--
ALTER TABLE `lib_peminjaman_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lib_pengunjung`
--
ALTER TABLE `lib_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
