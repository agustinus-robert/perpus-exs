/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : perpustakaan

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 06/08/2021 19:38:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lib_buku
-- ----------------------------
DROP TABLE IF EXISTS `lib_buku`;
CREATE TABLE `lib_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(60) DEFAULT NULL,
  `pengarang` varchar(60) DEFAULT NULL,
  `penerbit` varchar(60) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `isbn` char(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_denda
-- ----------------------------
DROP TABLE IF EXISTS `lib_denda`;
CREATE TABLE `lib_denda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjam` varchar(6) DEFAULT NULL,
  `jml_denda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_denda_detail
-- ----------------------------
DROP TABLE IF EXISTS `lib_denda_detail`;
CREATE TABLE `lib_denda_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_denda` varchar(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tipe_denda` varchar(11) DEFAULT NULL COMMENT 'Jika 1 barang terlambat, 2 barang rusak',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_jumlah_buku
-- ----------------------------
DROP TABLE IF EXISTS `lib_jumlah_buku`;
CREATE TABLE `lib_jumlah_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_peminjam
-- ----------------------------
DROP TABLE IF EXISTS `lib_peminjam`;
CREATE TABLE `lib_peminjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengunjung` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `pengembalian` int(11) DEFAULT 0 COMMENT 'jika 0 maka belum transaksi keluar dan kembali, jika 1 barang keluar, jika 2 barang kembali',
  `tgl_pengembalian` date DEFAULT NULL,
  `status_denda` int(11) DEFAULT 0 COMMENT 'Jika 0 maka proses denda dapat dilakukan, jika 1 proses denda telah dilakukan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_peminjaman_detail
-- ----------------------------
DROP TABLE IF EXISTS `lib_peminjaman_detail`;
CREATE TABLE `lib_peminjaman_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans_pinjam` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_pinjam` int(11) DEFAULT NULL,
  `jumlah_aktual` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_pengunjung
-- ----------------------------
DROP TABLE IF EXISTS `lib_pengunjung`;
CREATE TABLE `lib_pengunjung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) DEFAULT NULL,
  `no_kartu` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for lib_supplier
-- ----------------------------
DROP TABLE IF EXISTS `lib_supplier`;
CREATE TABLE `lib_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `kode_supplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
