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

 Date: 03/08/2021 20:04:13
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
-- Records of lib_buku
-- ----------------------------
BEGIN;
INSERT INTO `lib_buku` VALUES (1, 'Aku', 'Chairil anwar', 'Gramedia Solo', NULL, '1234567891012', 'chairil.jpg');
INSERT INTO `lib_buku` VALUES (3, 'Steve Jobs', 'Walter Issacson', 'gramedia', NULL, '2345678910111', NULL);
INSERT INTO `lib_buku` VALUES (4, 'the broken wings', 'Khalil Gibran', 'Gramedia', NULL, '345678910113', NULL);
INSERT INTO `lib_buku` VALUES (7, 'Das Kapital', 'Karl Mark', 'Gramedia', NULL, '1234567891011', 'karl.jpg');
COMMIT;

-- ----------------------------
-- Table structure for lib_denda
-- ----------------------------
DROP TABLE IF EXISTS `lib_denda`;
CREATE TABLE `lib_denda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pinjam` varchar(6) DEFAULT NULL,
  `kode_kembali` varchar(6) DEFAULT NULL,
  `jml_denda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lib_denda
-- ----------------------------
BEGIN;
COMMIT;

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
-- Records of lib_jumlah_buku
-- ----------------------------
BEGIN;
INSERT INTO `lib_jumlah_buku` VALUES (1, 1, 2, 1, '2021-07-29 15:22:02', '2021-07-29 15:22:08');
INSERT INTO `lib_jumlah_buku` VALUES (2, 1, 4, 3, '2021-07-29 08:21:49', '2021-07-29 08:21:49');
INSERT INTO `lib_jumlah_buku` VALUES (3, 7, 10, 1, '2021-07-29 08:53:23', '2021-07-29 08:53:23');
COMMIT;

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
  `pengembalian` int(11) DEFAULT NULL COMMENT 'jika 0 maka barang keluar, jika 1 barang sudah kembali',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lib_peminjam
-- ----------------------------
BEGIN;
INSERT INTO `lib_peminjam` VALUES (1, 1, '2021-08-03', '2021-08-06', 1, NULL);
INSERT INTO `lib_peminjam` VALUES (2, 2, '2021-08-03', '2021-08-06', 1, NULL);
INSERT INTO `lib_peminjam` VALUES (3, 1, '2021-08-03', '2021-08-07', 1, NULL);
INSERT INTO `lib_peminjam` VALUES (4, 3, '2021-08-03', '2021-08-07', 1, NULL);
INSERT INTO `lib_peminjam` VALUES (5, 1, '2021-08-03', '2021-08-05', 1, NULL);
INSERT INTO `lib_peminjam` VALUES (6, 2, NULL, NULL, 0, NULL);
COMMIT;

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
-- Records of lib_peminjaman_detail
-- ----------------------------
BEGIN;
INSERT INTO `lib_peminjaman_detail` VALUES (1, 1, 1, 1, 6);
INSERT INTO `lib_peminjaman_detail` VALUES (2, 1, 3, 1, 10);
INSERT INTO `lib_peminjaman_detail` VALUES (3, 2, 3, 1, 6);
INSERT INTO `lib_peminjaman_detail` VALUES (4, 3, 3, 1, 6);
INSERT INTO `lib_peminjaman_detail` VALUES (5, 4, 7, 1, 10);
INSERT INTO `lib_peminjaman_detail` VALUES (6, 5, 7, 4, 10);
INSERT INTO `lib_peminjaman_detail` VALUES (7, 6, 1, 1, 6);
COMMIT;

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
-- Records of lib_pengunjung
-- ----------------------------
BEGIN;
INSERT INTO `lib_pengunjung` VALUES (1, 'robert', '123456', '2021-07-14', 'solo');
INSERT INTO `lib_pengunjung` VALUES (2, 'maria', '89994343', '2021-07-21', 'Solo');
INSERT INTO `lib_pengunjung` VALUES (3, 'Fera', '3424342', '2021-07-13', 'Solo');
COMMIT;

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

-- ----------------------------
-- Records of lib_supplier
-- ----------------------------
BEGIN;
INSERT INTO `lib_supplier` VALUES (1, 'PT buku 1', 12345);
INSERT INTO `lib_supplier` VALUES (2, 'PT buku 2', 23456);
INSERT INTO `lib_supplier` VALUES (3, 'PT buku 3', 34567);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
