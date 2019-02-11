-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `qty`, `harga`) VALUES
(1,	'',	'Aut illo sint dolor adipisci e',	299,	0),
(2,	'',	'Meja',	88,	20000),
(3,	'',	'Kursi',	0,	30000),
(4,	'',	'Lemari',	0,	50000),
(5,	'',	'bARU',	0,	2),
(6,	'',	'bARU',	0,	2);

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_tlpn` varchar(12) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `no_tlpn`, `status`) VALUES
(1,	'Olahraga',	'test',	'',	0),
(2,	'Komputer',	'test',	'',	0);

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `login` (`id_login`, `username`, `password`, `level`, `status`) VALUES
(1,	'fahmi',	'202cb962ac59075b964b07152d234b70',	'Admin',	'1'),
(2,	'Rizky',	'202cb962ac59075b964b07152d234b70',	'Admin',	'1');

DROP TABLE IF EXISTS `transaksi_detail_keluar`;
CREATE TABLE `transaksi_detail_keluar` (
  `id_transaksi_detail_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_keluar` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_detail_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi_detail_keluar` (`id_transaksi_detail_keluar`, `id_transaksi_keluar`, `id_barang`, `qty`, `harga_jual`, `subtotal`) VALUES
(19,	11,	0,	0,	0,	NULL),
(20,	11,	0,	0,	0,	NULL),
(21,	11,	0,	0,	0,	NULL),
(22,	11,	0,	0,	0,	NULL),
(23,	11,	0,	0,	0,	NULL),
(24,	19,	3,	1,	12,	NULL),
(25,	19,	3,	1,	12,	NULL),
(26,	20,	2,	1,	12,	NULL),
(27,	20,	5,	940,	12,	NULL),
(28,	20,	3,	100,	12,	NULL),
(29,	21,	4,	837,	12,	NULL),
(30,	22,	1,	11,	0,	0),
(31,	22,	2,	10,	0,	0),
(32,	24,	1,	1,	0,	0),
(33,	24,	2,	2,	0,	0);

DROP TABLE IF EXISTS `transaksi_keluar`;
CREATE TABLE `transaksi_keluar` (
  `id_transaksi_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `grand_total` int(11) NOT NULL,
  `qty_total` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi_keluar` (`id_transaksi_keluar`, `id_customer`, `kode_transaksi`, `tgl_transaksi`, `grand_total`, `qty_total`) VALUES
(11,	1,	'8',	'2019-01-09 00:00:00',	0,	0),
(12,	1,	'8',	'2019-01-09 00:00:00',	0,	0),
(13,	1,	'8',	'2019-01-09 00:00:00',	0,	0),
(14,	1,	'8',	'2019-01-09 00:00:00',	0,	0),
(15,	1,	'8',	'2019-01-09 00:00:00',	0,	0),
(16,	1,	'8',	'2019-01-23 00:00:00',	0,	0),
(17,	1,	'8',	'2019-01-23 00:00:00',	0,	0),
(18,	1,	'8',	'2019-01-23 00:00:00',	0,	0),
(19,	1,	'8',	'2019-01-23 00:00:00',	0,	0),
(20,	2,	'8',	'2019-01-03 00:00:00',	0,	0),
(21,	1,	'8',	'2019-01-15 00:00:00',	0,	0),
(22,	1,	'8',	'2019-02-14 00:00:00',	0,	0),
(23,	0,	'',	'0000-00-00 00:00:00',	0,	0),
(24,	0,	'',	'0000-00-00 00:00:00',	0,	3);

-- 2019-02-11 22:48:10
