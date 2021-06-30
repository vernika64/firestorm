-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2021 at 04:38 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sislaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio_pelapor`
--

DROP TABLE IF EXISTS `bio_pelapor`;
CREATE TABLE IF NOT EXISTS `bio_pelapor` (
  `kode_identitas` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kota_asal` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  PRIMARY KEY (`kode_identitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_pelapor`
--

INSERT INTO `bio_pelapor` (`kode_identitas`, `nama`, `status`, `tgl_lahir`, `kota_asal`, `no_hp`, `email`, `password`, `tgl_daftar`, `tgl_update`) VALUES
(1212, 'Junaedi', 'Swasta', '1997-01-22', 'Malang', 2147483647, 'juned@gmail.com', 'junaedi', '2021-06-28 05:56:26', '2021-06-28 05:56:26'),
(9125, 'Veru', 'Swordman', '2021-06-08', 'Valhalla', 909175, 'kadal@waw.com', '1212', '2021-06-28 06:11:54', '2021-06-28 06:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `cpanel_user`
--

DROP TABLE IF EXISTS `cpanel_user`;
CREATE TABLE IF NOT EXISTS `cpanel_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kd_divisi` char(10) NOT NULL,
  `level` int(5) NOT NULL,
  `tanggal_reg` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_divisi` (`kd_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpanel_user`
--

INSERT INTO `cpanel_user` (`id`, `username`, `password`, `nama`, `kd_divisi`, `level`, `tanggal_reg`) VALUES
(3, 'baru', 'ini', 'Valas', 'SBK', 1, '2021-06-24 12:15:30'),
(4, 'inibaru', 'inibaru', 'Waw', 'SBAK', 1, '2021-06-24 12:28:12');

--
-- Triggers `cpanel_user`
--
DROP TRIGGER IF EXISTS `Trigger User Cpanel Baru`;
DELIMITER $$
CREATE TRIGGER `Trigger User Cpanel Baru` AFTER INSERT ON `cpanel_user` FOR EACH ROW INSERT INTO log (nama_event,deskripsi,waktu_event) VALUES ('TAMBAH','User admin baru telah ditambahkan ke dalam database',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `kd_divisi` char(10) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_diupdate` datetime NOT NULL,
  PRIMARY KEY (`kd_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kd_divisi`, `nama_divisi`, `tgl_dibuat`, `tgl_diupdate`) VALUES
('EL', 'Jurusan Elektro', '2021-06-24 11:55:41', '2021-06-24 11:55:41'),
('MB', 'Jurusan Manajemen Bisnis', '2021-06-24 11:56:04', '2021-06-24 11:56:04'),
('MKU', 'MKU', '2021-06-24 11:58:41', '2021-06-24 11:58:41'),
('MN', 'Jurusan Mesin', '2021-06-24 11:53:29', '2021-06-24 11:53:29'),
('P2M', 'P2M', '2021-06-24 11:58:13', '2021-06-24 11:58:13'),
('SBAK', 'SBAK', '2021-06-24 11:54:16', '2021-06-24 11:54:16'),
('SBK', 'SBKK', '2021-06-24 11:54:36', '2021-06-24 11:54:36'),
('SBPK', 'SBPK', '2021-06-24 11:55:01', '2021-06-24 11:55:01'),
('SBUM', 'SBUM', '2021-06-24 11:55:27', '2021-06-24 11:55:27'),
('SPI', 'SPI', '2021-06-24 11:58:25', '2021-06-24 11:58:25'),
('TI', 'Jurusan Teknik Informatika', '2021-06-24 11:52:46', '2021-06-24 11:52:46'),
('UPT-PA', 'UPT-PENGADAAN', '2021-06-24 11:57:34', '2021-06-24 11:57:34'),
('UPTPERPUS', 'UPT-PERPUS', '2021-06-24 11:57:01', '2021-06-24 11:57:01'),
('UPTPM', 'UPT-PM', '2021-06-24 11:57:51', '2021-06-24 11:57:51'),
('UPTPP', 'UPT-PP', '2021-06-24 11:56:19', '2021-06-24 11:56:19'),
('UPTSI', 'UPT-SI', '2021-06-24 11:56:45', '2021-06-24 11:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `kabag_res_laporan`
--

DROP TABLE IF EXISTS `kabag_res_laporan`;
CREATE TABLE IF NOT EXISTS `kabag_res_laporan` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kd_user_cpanel` int(20) NOT NULL,
  `kode_laporan` int(20) NOT NULL,
  `respon` int(1) NOT NULL,
  `tanggapan` int(255) NOT NULL,
  `tgl_respon` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_laporan` (`kode_laporan`),
  KEY `kd_user_cpanel` (`kd_user_cpanel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE IF NOT EXISTS `laporan` (
  `kode_laporan` int(20) NOT NULL AUTO_INCREMENT,
  `kode_identitas` int(30) NOT NULL,
  `judul_laporan` varchar(100) NOT NULL,
  `desc_laporan` text NOT NULL,
  `kd_divisi` char(10) NOT NULL,
  `map_file` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `tanggapan` varchar(255) DEFAULT NULL,
  `tgl_lap_masuk` datetime DEFAULT NULL,
  `tgl_lap_update` datetime DEFAULT NULL,
  `tgl_lap_status` datetime DEFAULT NULL,
  `kd_user_verify` int(11) DEFAULT NULL,
  `kd_kabag_approve` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_laporan`),
  KEY `kode_identitas` (`kode_identitas`),
  KEY `kd_divisi` (`kd_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`kode_laporan`, `kode_identitas`, `judul_laporan`, `desc_laporan`, `kd_divisi`, `map_file`, `status`, `tanggapan`, `tgl_lap_masuk`, `tgl_lap_update`, `tgl_lap_status`, `kd_user_verify`, `kd_kabag_approve`) VALUES
(7, 1212, 'Laporan Ada Gas Meledug', '12124', 'MN', NULL, 3, NULL, '2021-06-28 11:47:03', '2021-06-28 11:47:03', NULL, NULL, NULL),
(8, 1212, 'Laporan Kucing Lompat', '121252136', 'UPTPERPUS', NULL, 0, NULL, '2021-06-28 12:07:36', '2021-06-28 12:07:36', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` char(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `waktu_event` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `nama_event`, `deskripsi`, `waktu_event`) VALUES
(2, 'TAMBAH', 'User admin baru telah ditambahkan ke dalam database', '2021-06-24 12:28:34');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpanel_user`
--
ALTER TABLE `cpanel_user`
  ADD CONSTRAINT `cpanel_user_ibfk_1` FOREIGN KEY (`kd_divisi`) REFERENCES `divisi` (`kd_divisi`) ON UPDATE CASCADE;

--
-- Constraints for table `kabag_res_laporan`
--
ALTER TABLE `kabag_res_laporan`
  ADD CONSTRAINT `kabag_res_laporan_ibfk_1` FOREIGN KEY (`kode_laporan`) REFERENCES `laporan` (`kode_laporan`),
  ADD CONSTRAINT `kabag_res_laporan_ibfk_2` FOREIGN KEY (`kd_user_cpanel`) REFERENCES `cpanel_user` (`id`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`kode_identitas`) REFERENCES `bio_pelapor` (`kode_identitas`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`kd_divisi`) REFERENCES `divisi` (`kd_divisi`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
