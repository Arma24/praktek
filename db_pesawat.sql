-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2017 at 05:44 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pesawat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `nama_maskapai` varchar(200) NOT NULL,
  `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `kota_asal` varchar(200) NOT NULL,
  `kota_tujuan` varchar(200) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  PRIMARY KEY (`kd_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`nama_maskapai`, `kd_jadwal`, `kota_asal`, `kota_tujuan`, `tgl_berangkat`) VALUES
('PT. GARUDA INDONESIA', 16, 'Bali', 'Bandung', '2017-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `kd_transaksi` int(11) NOT NULL,
  `nama_maskapai` varchar(100) NOT NULL,
  `seat` varchar(100) NOT NULL,
  `jumlah_seat` int(11) NOT NULL,
  `kota_asal` varchar(200) NOT NULL,
  `kota_tujuan` varchar(200) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `harga` int(20) NOT NULL,
  PRIMARY KEY (`seat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maskapai`
--

CREATE TABLE IF NOT EXISTS `maskapai` (
  `kd_maskapai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_maskapai` varchar(100) NOT NULL,
  `jumlah_armada` int(20) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `jumlah_seat` int(11) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_maskapai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `maskapai`
--

INSERT INTO `maskapai` (`kd_maskapai`, `nama_maskapai`, `jumlah_armada`, `slogan`, `jumlah_seat`, `website`) VALUES
(1, 'PT. GARUDA INDONESIA', 85, 'The Airline of Indonesia', 300, 'www.garuda-indonesia.com'),
(2, 'PT LION MENTARI', 93, 'We make people fly', 250, 'www.lionair.co.id'),
(5, 'PT SRIWIJAYA AIR', 40, 'Your Flying Partner', 250, 'www.sriwijayaair.co.id'),
(6, 'PT CITILINK INDONESIA', 20, 'Your Right Link', 270, 'www.citilink.co.id'),
(8, 'PT SKY AVIATION', 8, 'Limitless Sky Experience', 230, 'www.sky-aviation.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_maskapai` int(11) NOT NULL,
  `seat` varchar(11) NOT NULL,
  `kota_asal` varchar(200) NOT NULL,
  `kota_tujuan` varchar(200) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `harga` int(20) NOT NULL,
  PRIMARY KEY (`kd_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `kd_maskapai`, `seat`, `kota_asal`, `kota_tujuan`, `tgl_berangkat`, `harga`) VALUES
(5, 1, 'A1', 'Bali', 'Bandung', '2017-06-11', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`) VALUES
(1, 'arma', 'ffce3759c0d736c5365efe989eb2e16e', 'admin'),
(2, 'tyas', '0c36534326afe8f3c3e7f4d1aaab1079', 'staff'),
(43, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(51, 'staff', '1253208465b1efa876f982d8a9e73eef', 'staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
