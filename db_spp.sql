/*
 Navicat Premium Data Transfer

 Source Server         : falonez
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : localhost:3306
 Source Schema         : db_spp

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : 65001

 Date: 28/03/2020 04:40:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_menu
-- ----------------------------
DROP TABLE IF EXISTS `access_menu`;
CREATE TABLE `access_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of access_menu
-- ----------------------------
INSERT INTO `access_menu` VALUES (1, 'admin', 1);
INSERT INTO `access_menu` VALUES (2, 'admin', 2);
INSERT INTO `access_menu` VALUES (3, 'admin', 3);
INSERT INTO `access_menu` VALUES (4, 'admin', 4);
INSERT INTO `access_menu` VALUES (5, 'admin', 5);
INSERT INTO `access_menu` VALUES (6, 'petugas', 5);
INSERT INTO `access_menu` VALUES (7, 'petugas', 6);
INSERT INTO `access_menu` VALUES (8, 'siswa', 8);
INSERT INTO `access_menu` VALUES (9, 'siswa', 9);
INSERT INTO `access_menu` VALUES (10, 'admin', 6);
INSERT INTO `access_menu` VALUES (11, 'admin', 7);
INSERT INTO `access_menu` VALUES (12, 'ortu', 8);
INSERT INTO `access_menu` VALUES (13, 'ortu', 9);
INSERT INTO `access_menu` VALUES (14, 'admin', 10);
INSERT INTO `access_menu` VALUES (15, 'admin', 11);

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `konten` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `gambar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES (1, 'Ini Adalah Beritaku Di SMK Angkasa 1 Margahayu, Sekolah Ini Sangat Lah Bagus Sekali Terutama Jurusan RPL', '896461.jpg');
INSERT INTO `berita` VALUES (2, 'sadsadasdasdasdasdasdsadsadsadasdasdas         asdasdasd', '58746.jpg');
INSERT INTO `berita` VALUES (16, 'sadsa', 'Screenshot_2.png');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kompetensi_keahlian` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (1, 'XI', 'Rekayasa Perangkat Lunak');
INSERT INTO `kelas` VALUES (3, 'XII', 'Teknik Komputer Jaringan');
INSERT INTO `kelas` VALUES (4, 'XII', 'Rekayasa Perangkat Lunak');
INSERT INTO `kelas` VALUES (5, 'X', 'Rekayasa Perangkat Lunak');
INSERT INTO `kelas` VALUES (6, 'XI', 'Teknik Komputer Jaringan');
INSERT INTO `kelas` VALUES (7, 'X', 'Teknik Komputer Jaringan');
INSERT INTO `kelas` VALUES (8, 'XI', 'Teknik Audio Video');
INSERT INTO `kelas` VALUES (9, 'XI', 'Teknik Kendaraan Ringan');
INSERT INTO `kelas` VALUES (12, 'XII', 'Teknik Audio Video');
INSERT INTO `kelas` VALUES (13, 'X', 'Teknik Audio Video');
INSERT INTO `kelas` VALUES (14, 'XII', 'Teknik Pesawat Udara');
INSERT INTO `kelas` VALUES (15, 'X', 'Teknik Pesawat Udara');
INSERT INTO `kelas` VALUES (16, 'XII', 'Teknik Cinta');

-- ----------------------------
-- Table structure for log_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `log_pembayaran`;
CREATE TABLE `log_pembayaran`  (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_dibayar` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  INDEX `FK_id_spp`(`id_spp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of log_pembayaran
-- ----------------------------
INSERT INTO `log_pembayaran` VALUES (1203001, 7, '0010607710', '2012-03-20', '', '0', 209, 3000000);
INSERT INTO `log_pembayaran` VALUES (1203002, 7, '0010607723', '2012-03-20', '', '0', 211, 25);
INSERT INTO `log_pembayaran` VALUES (1203003, 7, '0010607723', '2012-03-20', '', '0', 211, 250000);
INSERT INTO `log_pembayaran` VALUES (1203004, 7, '0010607748', '2012-03-20', '', '0', 207, 250000);
INSERT INTO `log_pembayaran` VALUES (1703005, 7, '0010607723', '2017-03-20', '', '0', 211, 250000);
INSERT INTO `log_pembayaran` VALUES (1803006, 7, '0010607745', '2018-03-20', '', '2018', 212, 2750000);
INSERT INTO `log_pembayaran` VALUES (1903006, 7, '0010607752', '2019-03-20', '', '2020', 205, 2000000);
INSERT INTO `log_pembayaran` VALUES (2003007, 7, '0010607723', '2020-03-20', '', '0', 211, 250000);
INSERT INTO `log_pembayaran` VALUES (2003008, 7, '0010607723', '2020-03-20', '', '0', 211, 250000);
INSERT INTO `log_pembayaran` VALUES (2203009, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203010, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203011, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203012, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203013, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203014, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203015, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203016, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203017, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203018, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203019, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203020, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203021, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203022, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203023, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203024, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203025, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203026, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203027, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203028, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203029, 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `log_pembayaran` VALUES (2203030, 7, '0010607737', '2022-03-20', '', '0', 217, 249890);
INSERT INTO `log_pembayaran` VALUES (2203031, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203032, 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2203033, 7, '0010607740', '2022-03-20', '', '0', 216, 250000);
INSERT INTO `log_pembayaran` VALUES (2403034, 7, '0010607737', '2024-03-20', '', '0', 217, 250000);
INSERT INTO `log_pembayaran` VALUES (2403035, 7, '0010607740', '2024-03-20', '', '0', 216, 2500000);
INSERT INTO `log_pembayaran` VALUES (2403036, 7, '0010607740', '2024-03-20', '', '0', 216, 250000);

-- ----------------------------
-- Table structure for ortu
-- ----------------------------
DROP TABLE IF EXISTS `ortu`;
CREATE TABLE `ortu`  (
  `id_ortu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ortu` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_ortu`) USING BTREE,
  UNIQUE INDEX `Username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ortu
-- ----------------------------
INSERT INTO `ortu` VALUES (1, 'Sodiyah', '081222560289', 'sodiyah', '$2y$10$4tdTXeepdr1VRZcNKZgkHOH1HNoBubvgkKHyMNgir25MxlreiHutS', NULL);

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id_pembayaran` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun_dibayar` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`) USING BTREE,
  INDEX `FK_id_spp`(`id_spp`) USING BTREE,
  CONSTRAINT `FK_id_spp` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES ('1203001', 7, '0010607710', '2012-03-20', '', '0', 209, 3000000);
INSERT INTO `pembayaran` VALUES ('1203002', 7, '0010607723', '2012-03-20', '', '0', 211, 25);
INSERT INTO `pembayaran` VALUES ('1203003', 7, '0010607723', '2012-03-20', '', '0', 211, 250000);
INSERT INTO `pembayaran` VALUES ('1203004', 7, '0010607748', '2012-03-20', '', '0', 207, 250000);
INSERT INTO `pembayaran` VALUES ('1703005', 7, '0010607723', '2017-03-20', '', '0', 211, 250000);
INSERT INTO `pembayaran` VALUES ('1903006', 7, '0010607752', '2019-03-20', '', '2020', 205, 2000000);
INSERT INTO `pembayaran` VALUES ('2003007', 7, '0010607723', '2020-03-20', '', '0', 211, 250000);
INSERT INTO `pembayaran` VALUES ('2003008', 7, '0010607723', '2020-03-20', '', '0', 211, 250000);
INSERT INTO `pembayaran` VALUES ('2203009', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203010', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203011', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203012', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203013', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203014', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203015', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203016', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203017', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203018', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203019', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203020', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203021', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203022', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203023', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203024', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203025', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203026', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203027', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203028', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203029', 7, '0010607737', '2022-03-20', '', '0', 217, 10);
INSERT INTO `pembayaran` VALUES ('2203030', 7, '0010607737', '2022-03-20', '', '0', 217, 249890);
INSERT INTO `pembayaran` VALUES ('2203031', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203032', 7, '0010607737', '2022-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2203033', 7, '0010607740', '2022-03-20', '', '0', 216, 250000);
INSERT INTO `pembayaran` VALUES ('2403034', 7, '0010607737', '2024-03-20', '', '0', 217, 250000);
INSERT INTO `pembayaran` VALUES ('2403035', 7, '0010607740', '2024-03-20', '', '0', 216, 2500000);
INSERT INTO `pembayaran` VALUES ('2403036', 7, '0010607740', '2024-03-20', '', '0', 216, 250000);

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas`  (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_petugas` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('admin','petugas') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_petugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of petugas
-- ----------------------------
INSERT INTO `petugas` VALUES (7, 'falonez', '$2y$10$YrXR8xJkyBtbMNLlrYF9mOJmicc7LVhJPLXj1G38V4H.luVDfgAFK', 'Fathan Mubarok', 'admin', 'Screenshot_6.png');
INSERT INTO `petugas` VALUES (10, 'cantik', '$2y$10$IrAxU72JP9zzB3Gj3c1hVuMiW8P3qRGyxlWp7JracQAf0fus3wjYa', 'Sofia Marsha', 'admin', 'default.jpg');
INSERT INTO `petugas` VALUES (11, 'azhara', '$2y$10$OuLk4l5PxXLJcwu7QakEHOz94OkN0xkuM2Pnts466/lbIohrmsbdO', 'Azhara Ayu Lestari', 'petugas', 'default.jpg');
INSERT INTO `petugas` VALUES (12, 'falonezz', '$2y$10$DETnLRmATmB0BfVvQhRRpeI0lR8EJHlthH01NEjnLVepzh2SXwnfm', 'alonez', 'admin', 'default.jpg');
INSERT INTO `petugas` VALUES (13, 'fariq', '$2y$10$4GZjeMhuJI9NawiTYS3IxeJ20xsvH/go6/FaL1TWIj.8TOSlOIJ2m', 'fariq', 'petugas', 'default.jpg');
INSERT INTO `petugas` VALUES (14, 'catikk', '$2y$10$nPjvuDd.fPqfT4SySfVIEed53YBYhOhlbkqEX7ajFqdhUCfLAw7Ee', 'Azhara Ayu Lestari', 'admin', 'default.jpg');
INSERT INTO `petugas` VALUES (15, 'cantikk', '$2y$10$m/yTZ3oAvkJdX6BA3njFUe5Cp4x6jVg1AqTsZhuV6XSKVgJz9eJ06', 'Fathan Mubarok', 'petugas', 'default.jpg');
INSERT INTO `petugas` VALUES (16, 'falonezs', '$2y$10$qzaKC2yNPPGSfVZtTnfQEedAN11BJroBI/jprl4vhPhkqnR9IaVbq', 'Fathan Mubarok', 'petugas', 'default.jpg');
INSERT INTO `petugas` VALUES (17, 'cantiw', '$2y$10$/ztT32SVY2gbbV1RfodsD.uYNjpMbzUGEJvTl46kA0kHFeIn.b/1e', 'Fathan Mubarok', 'admin', 'default.jpg');
INSERT INTO `petugas` VALUES (18, 'cantiksa', '$2y$10$hh.a/lgMOgHFJ8kAHjH4RuFUjagtioUoNchra3.4my74Asb7MzXiO', 'FathanMubarok', 'petugas', 'default.jpg');

-- ----------------------------
-- Table structure for set_spp
-- ----------------------------
DROP TABLE IF EXISTS `set_spp`;
CREATE TABLE `set_spp`  (
  `id` int(11) NOT NULL,
  `nominal` int(255) NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal_perbulan` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of set_spp
-- ----------------------------
INSERT INTO `set_spp` VALUES (1, 3000000, '2018', 500000);

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `nisn` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_view` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nisn`) USING BTREE,
  INDEX `id_spp`(`id_spp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('0010607710', '1171', 'Ahmad Fattah Rizqi Akbar', 3, 'Kp. Selayan', '081222560902', 209, '$2y$10$akYFRkIMzY3V3w9eOWIZWO7EY.K1s.iP.ebO.Pu8E.K5svrj4sFPS', '746531', 'default.jpg', 'falonez0w122@gmail.com');
INSERT INTO `siswa` VALUES ('0010607723', '20181000', 'Rezan Jaifar', 3, 'sad', '081222560902', 211, '$2y$10$2lLwRw88ERA8YPNAZGop8eJRyD4pjOQY/p2sxuq/HTvjDHFqRZWF.', '504962', 'default.jpg', 'falonez10@gmail.com');
INSERT INTO `siswa` VALUES ('0010607727', '17181018', 'falonezsa', 1, 'Kp.BojongBuah', '081222560289', 218, '$2y$10$/g6yEoYEWX5QywE/7GG6TujibI9UJm9eDZ3ianUPlCiy9shjqx3ta', '614972', 'default.jpg', 'falonez0w12@gmail.com');
INSERT INTO `siswa` VALUES ('0010607737', '17181013', 'Azhara Ayu Lestari', 1, 'Kp.BojongBuah', '081222560289', 217, '$2y$10$QMpihhvc9jif4deGjxy4GerdrmAaF1VVN4ZbNjczvwro7YXRkBW3e', '673951', 'default.jpg', 'falonez0122@gmail.com');
INSERT INTO `siswa` VALUES ('0010607740', '17181013', 'Fathan Mubarok', 1, 'Bandung', '081222560280', 216, '$2y$10$WiBrEpGfgcZ15VBX0/MB6.58CsVEkYdkp22Z4nUGCNl/jPNFOAtEK', '901573', 'default.jpg', 'falonez01@gmail.com');
INSERT INTO `siswa` VALUES ('0010607748', '20181000', 'Salma Gracela', 4, 'Kp. Selayan', '081222560902', 207, '$2y$10$sB6z5fun9TOU6sAcR7n6MuD6FQjlaZKoeGD/PBL0LAY0VHtDOhNqK', '721495', 'default.jpg', 'falonez013@gmail.com');
INSERT INTO `siswa` VALUES ('0010607749', '17181013', 'Fathan Mubarok', 4, 'Kp.BojongBuah', '081222560289', 204, '$2y$10$CEoNMmhL5NganwMdOSQD2.V6Vue6eVO3EK.fWrE1ajl8RUd1fdZAu', 'falonez', 'Screenshot_2.png', NULL);
INSERT INTO `siswa` VALUES ('0010607751', '1171', 'Azhara Ayu Lestari', 7, 'Kp. Selayan', '081222560902', 202, '$2y$10$WLWqbgoauihqjUtPuKLj3excuS6Zocjy0Dv4WwwA1LEAn0S3bDXYy', '270431', 'default.jpg', NULL);
INSERT INTO `siswa` VALUES ('0010607752', '1171', 'Sofia Marsha Ramadani', 4, 'Kp. Selayan', '081222560902', 205, '$2y$10$QO/S/eO.Y7bHs.iwrfBEwOgeY7qfTc6XiHaS3HC8g5gAD1RAM9Ize', '804315', 'default.jpg', NULL);
INSERT INTO `siswa` VALUES ('0010607759', '1171', 'Fariq Adillah', 8, 'Awe', '081222560902', 206, '$2y$10$ka5mZxdgdwulXBHKeZUm.ui0I/nDKNaAN01ydvDF0ZFokd.vlPZqC', '264807', 'default.jpg', NULL);
INSERT INTO `siswa` VALUES ('0010607791', '20181000', 'Love You', 10, 'Kp. Selayan', '081222560902', 213, '$2y$10$9UwNYHziDYQNJ7unP0Oy/.WPXewdGB2/4bruSweo3hUhIwhlG3iG6', '704196', 'default.jpg', NULL);

-- ----------------------------
-- Table structure for spp
-- ----------------------------
DROP TABLE IF EXISTS `spp`;
CREATE TABLE `spp`  (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `total_terbayar` int(255) NULL DEFAULT NULL,
  `nominal_perbulan` int(255) NULL DEFAULT NULL,
  `total_bulan` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_spp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 219 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of spp
-- ----------------------------
INSERT INTO `spp` VALUES (202, 2020, 3000000, 0, 300000, 0);
INSERT INTO `spp` VALUES (204, 2020, 3000000, 0, 250000, 0);
INSERT INTO `spp` VALUES (205, 2020, 3000000, 2000000, 250000, 8);
INSERT INTO `spp` VALUES (206, 2020, 3000000, 0, 250000, 0);
INSERT INTO `spp` VALUES (207, 0, 3000000, 250000, 250000, 1);
INSERT INTO `spp` VALUES (209, 0, 3000000, 3000000, 250000, 12);
INSERT INTO `spp` VALUES (211, 0, 3000000, 750025, 250000, 3);
INSERT INTO `spp` VALUES (213, 0, 3000000, 0, 250000, 0);
INSERT INTO `spp` VALUES (216, 0, 3000000, 3000000, 250000, 12);
INSERT INTO `spp` VALUES (217, 0, 3000000, 2750000, 250000, 11);
INSERT INTO `spp` VALUES (218, 2018, 6000000, NULL, 500000, 0);

-- ----------------------------
-- Table structure for user_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `head_menu` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_menu
-- ----------------------------
INSERT INTO `user_menu` VALUES (1, 'Petugas', 'admin/petugas', 'fa fa-fw fa-user-cog', 'Data Management');
INSERT INTO `user_menu` VALUES (2, 'Siswa', 'admin/siswa', 'fa fa-fw fa-users', 'Data Management');
INSERT INTO `user_menu` VALUES (3, 'Kelas', 'admin/kelas', 'fa fa-fw fa-cogs', 'Data Management');
INSERT INTO `user_menu` VALUES (4, 'Spp', 'admin/spp', 'fas fa-fw fa-file-invoice', 'Data Management');
INSERT INTO `user_menu` VALUES (5, 'Pembayaran', 'admin/pembayaran', 'fas fa-fw fa-receipt', NULL);
INSERT INTO `user_menu` VALUES (6, 'History', 'admin/history', 'fas fa-fw fa-history', NULL);
INSERT INTO `user_menu` VALUES (7, 'Laporan', 'admin/laporan', 'fa fa-fw fa-clone', NULL);
INSERT INTO `user_menu` VALUES (8, 'History', 'user/history', 'fas fa-fw fa-history', NULL);
INSERT INTO `user_menu` VALUES (9, 'Setting', 'user/setting', 'fa fa-fw fa-user-cog', NULL);
INSERT INTO `user_menu` VALUES (10, 'Setting', 'admin/setting', 'fa fa-fw fa-user-cog', NULL);
INSERT INTO `user_menu` VALUES (11, 'Berita', 'admin/berita', 'fas fa-newspaper', NULL);

-- ----------------------------
-- Triggers structure for table pembayaran
-- ----------------------------
DROP TRIGGER IF EXISTS `after_insert_pembayaran`;
delimiter ;;
CREATE TRIGGER `after_insert_pembayaran` AFTER INSERT ON `pembayaran` FOR EACH ROW INSERT INTO log_pembayaran VALUES (NEW.id_pembayaran,NEW.id_petugas,NEW.nisn,NEW.tgl_bayar,NEW.bulan_dibayar,NEW.tahun_dibayar,NEW.id_spp,NEW.jumlah_bayar)
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table siswa
-- ----------------------------
DROP TRIGGER IF EXISTS `BEFORE_DELETE`;
delimiter ;;
CREATE TRIGGER `BEFORE_DELETE` BEFORE DELETE ON `siswa` FOR EACH ROW DELETE FROM pembayaran WHERE id_spp=OLD.id_spp
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table siswa
-- ----------------------------
DROP TRIGGER IF EXISTS `AFTER_DELETE`;
delimiter ;;
CREATE TRIGGER `AFTER_DELETE` AFTER DELETE ON `siswa` FOR EACH ROW DELETE FROM spp WHERE id_spp=OLD.id_spp
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
