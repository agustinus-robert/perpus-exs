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

 Date: 27/07/2021 16:20:28
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lib_buku
-- ----------------------------
BEGIN;
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
-- Table structure for lib_peminjam
-- ----------------------------
DROP TABLE IF EXISTS `lib_peminjam`;
CREATE TABLE `lib_peminjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengunjung` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `kode_pinjam` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lib_peminjam
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for lib_pengembalian
-- ----------------------------
DROP TABLE IF EXISTS `lib_pengembalian`;
CREATE TABLE `lib_pengembalian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `kode_pinjam` varchar(6) DEFAULT NULL,
  `kode_kembali` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lib_pengembalian
-- ----------------------------
BEGIN;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lib_pengunjung
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
