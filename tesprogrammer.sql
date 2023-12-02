/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : tesprogrammer

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 02/12/2023 23:49:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for instansi
-- ----------------------------
DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `no_telp` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_instansi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `nama_app` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `version` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of instansi
-- ----------------------------
INSERT INTO `instansi` VALUES (1, 'FAST PRINT INDONESIA', 'Jl. Mojo Kidul 171, Mojo,\r\nKec. Gubeng,\r\nSurabaya, Jawa Timur 60285', '085231876597', 'app\\logo.png', 'Warehouse', '1.');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'L QUEENLY');
INSERT INTO `kategori` VALUES (2, 'L MTH AKSESORIS (IM)');
INSERT INTO `kategori` VALUES (3, 'L MTH TABUNG (LK)');
INSERT INTO `kategori` VALUES (4, 'SP MTH SPAREPART (LK)');
INSERT INTO `kategori` VALUES (5, 'CI MTH TINTA LAIN (IM)');
INSERT INTO `kategori` VALUES (6, 'L MTH AKSESORIS (LK)');
INSERT INTO `kategori` VALUES (7, 'S MTH STEMPEL (IM)');

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` double NULL DEFAULT NULL,
  `kategori_id` int NULL DEFAULT NULL,
  `status_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_produk`) USING BTREE,
  INDEX `status_id`(`status_id` ASC) USING BTREE,
  INDEX `produk_ibfk_1`(`kategori_id` ASC) USING BTREE,
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 1, 1);
INSERT INTO `produk` VALUES (2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 2, 1);
INSERT INTO `produk` VALUES (3, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 2, 1);
INSERT INTO `produk` VALUES (4, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 2, 2);
INSERT INTO `produk` VALUES (5, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 2, 1);
INSERT INTO `produk` VALUES (6, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 1, 1);
INSERT INTO `produk` VALUES (7, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 2, 2);
INSERT INTO `produk` VALUES (8, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 2, 2);
INSERT INTO `produk` VALUES (9, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 2, 1);
INSERT INTO `produk` VALUES (10, 'ARM SUPPORT KECIL', 13000, 3, 2);
INSERT INTO `produk` VALUES (11, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 2, 1);
INSERT INTO `produk` VALUES (12, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 2, 2);
INSERT INTO `produk` VALUES (13, 'ARM SUPPORT S IM', 1000, 2, 2);
INSERT INTO `produk` VALUES (14, 'ARM SUPPORT T (IMPORT)', 13000, 2, 1);
INSERT INTO `produk` VALUES (15, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 2, 1);
INSERT INTO `produk` VALUES (16, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 2, 2);
INSERT INTO `produk` VALUES (17, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 2, 1);
INSERT INTO `produk` VALUES (18, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 2, 2);
INSERT INTO `produk` VALUES (19, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 2, 2);
INSERT INTO `produk` VALUES (20, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 5, 2);
INSERT INTO `produk` VALUES (21, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 5, 1);
INSERT INTO `produk` VALUES (22, 'ARM PENDEK MODEL U', 13000, 2, 1);
INSERT INTO `produk` VALUES (23, 'ARM SUPPORT KECIL', 13000, 3, 2);
INSERT INTO `produk` VALUES (24, 'ARM SUPPORT KOTAK PUTIH', 13000, 2, 2);
INSERT INTO `produk` VALUES (25, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 5, 2);
INSERT INTO `produk` VALUES (26, 'ARM SUPPORT PENDEK POLOS', 13000, 3, 1);
INSERT INTO `produk` VALUES (27, 'ARM SUPPORT S IM', 1000, 2, 2);
INSERT INTO `produk` VALUES (28, 'ARM SUPPORT T (IMPORT)', 13000, 2, 1);
INSERT INTO `produk` VALUES (29, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 3, 1);
INSERT INTO `produk` VALUES (30, 'BOTOL 10ML IM', 1000, 7, 2);
INSERT INTO `produk` VALUES (31, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 2, 1);
INSERT INTO `produk` VALUES (32, 'ARM PENDEK MODEL U', 13000, 2, 1);
INSERT INTO `produk` VALUES (33, 'ARM SUPPORT KOTAK PUTIH', 13000, 2, 2);
INSERT INTO `produk` VALUES (34, 'ARM SUPPORT PENDEK POLOS', 13000, 3, 1);
INSERT INTO `produk` VALUES (35, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 3, 1);
INSERT INTO `produk` VALUES (36, 'BODY PRINTER T13X', 15000, 4, 1);
INSERT INTO `produk` VALUES (37, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 5, 1);
INSERT INTO `produk` VALUES (38, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 5, 2);
INSERT INTO `produk` VALUES (39, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 5, 2);
INSERT INTO `produk` VALUES (40, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 5, 2);
INSERT INTO `produk` VALUES (41, 'BODY PRINTER CANON IP2770', 500, 4, 1);
INSERT INTO `produk` VALUES (42, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 5, 2);
INSERT INTO `produk` VALUES (43, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 5, 1);
INSERT INTO `produk` VALUES (44, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 5, 1);
INSERT INTO `produk` VALUES (45, 'BOTOL KOTAK 100ML LK', 1000, 6, 1);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'bisa dijual');
INSERT INTO `status` VALUES (2, 'tidak bisa dijual');

-- ----------------------------
-- Table structure for tb_group
-- ----------------------------
DROP TABLE IF EXISTS `tb_group`;
CREATE TABLE `tb_group`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `group` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_group
-- ----------------------------
INSERT INTO `tb_group` VALUES (1, 'Administrator');
INSERT INTO `tb_group` VALUES (2, 'Pegawai');

-- ----------------------------
-- Table structure for tb_group_akses
-- ----------------------------
DROP TABLE IF EXISTS `tb_group_akses`;
CREATE TABLE `tb_group_akses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_group` int NULL DEFAULT NULL,
  `fk_menu` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_group_akses
-- ----------------------------

-- ----------------------------
-- Table structure for tb_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent` int NULL DEFAULT NULL,
  `menu` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `icon` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aktif` tinyint(1) NULL DEFAULT 1,
  `ordering` tinyint NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_menu
-- ----------------------------
INSERT INTO `tb_menu` VALUES (1, 0, 'Setting', '#', 'fa fa-gear', 1, 0);
INSERT INTO `tb_menu` VALUES (2, 1, 'User', 'user', 'fa fa-user', 1, 2);
INSERT INTO `tb_menu` VALUES (3, 1, 'Group', 'group', 'fa fa-users', 1, 1);
INSERT INTO `tb_menu` VALUES (4, 0, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt', 1, 1);
INSERT INTO `tb_menu` VALUES (5, 0, 'Status', 'status', 'fa fa-bolt', 1, 2);
INSERT INTO `tb_menu` VALUES (6, 0, 'Kategori', 'kategori', 'fa fa-pen-nib', 1, 3);
INSERT INTO `tb_menu` VALUES (7, 0, 'Produk', 'produk', 'fa fa-briefcase', 1, 4);

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `last_login` datetime NULL DEFAULT NULL,
  `no_telp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fk_group` int NULL DEFAULT NULL,
  `aktif` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '', '2023-12-02 16:49:22', '1', 1, 1);
INSERT INTO `tb_user` VALUES (2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai@pegawai.com', '', NULL, '123456', 2, 1);

SET FOREIGN_KEY_CHECKS = 1;
