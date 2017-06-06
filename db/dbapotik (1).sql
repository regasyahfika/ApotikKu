-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 04:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbapotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_user` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'Rega Syahfika', 'rega.syahfika@gmail.com', 'A'),
(2, 'pemilik', 'pemilik', 'Bos Ku', 'owner@gmail.com', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE IF NOT EXISTS `detail_order` (
  `Kd_Order` char(10) NOT NULL,
  `Id_Produk` char(10) NOT NULL,
`Id_Detail` int(5) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`Kd_Order`, `Id_Produk`, `Id_Detail`, `Harga`, `Quantity`) VALUES
('F0001', 'P0001', 301, 9000, 1),
('F0002', 'P0002', 302, 18000, 1),
('F0003', 'P0003', 303, 2000, 1),
('F0004', 'P0004', 304, 10000, 1),
('F0005', 'P0005', 305, 18000, 1),
('F0006', 'P0007', 354, 9000, 1),
('F0007', 'P0004', 355, 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `Id_Kategori` char(10) NOT NULL,
  `Nama_Kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`Id_Kategori`, `Nama_Kategori`) VALUES
('K0001', 'Obat Batuk'),
('K0002', 'Obat Flue'),
('K0003', 'Obat Dewasa'),
('K0004', 'Suplement');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
`Id_Keranjang` int(5) NOT NULL,
  `Id_Produk` char(10) NOT NULL,
  `Id_Session` varchar(100) NOT NULL,
  `Tanggal_Keranjang` date NOT NULL,
  `Qty` int(4) NOT NULL,
  `harga` int(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE IF NOT EXISTS `orderan` (
  `Kd_Order` char(10) NOT NULL,
  `Id_Pelanggan` char(10) NOT NULL,
  `Jumlah` int(5) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Total_Harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`Kd_Order`, `Id_Pelanggan`, `Jumlah`, `Tanggal`, `Total_Harga`) VALUES
('F0001', 'Y0001', 1, '2017-01-10 09:26:06', 9000),
('F0002', 'Y0002', 1, '2017-01-10 09:46:23', 18000),
('F0003', 'Y0003', 1, '2017-01-10 09:48:22', 2000),
('F0004', 'Y0003', 1, '2017-01-10 09:48:35', 10000),
('F0005', 'Y0003', 1, '2017-01-10 09:48:56', 18000),
('F0006', 'Y0003', 1, '2017-01-10 10:05:15', 9000),
('F0007', 'Y0001', 1, '2017-01-10 10:05:36', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `Id_Pelanggan` char(10) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Alamat` varchar(80) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `Username`, `Password`, `Alamat`, `Email`, `Telepon`) VALUES
('Y0001', 'user', 'user1234', 'jogja', 'user@gmail.com', 2147483647),
('Y0002', 'budi', 'budi1234', 'jogja', 'budi@gmail.com', 2147483647),
('Y0003', 'rega', 'rega1', 'regadsadas', 'rega.syahfika@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `Id_Produk` char(10) NOT NULL,
  `Id_Kategori` char(10) NOT NULL,
  `kd_supplier` char(10) NOT NULL,
  `Nama_Produk` varchar(20) NOT NULL,
  `Harga_Produk` decimal(11,0) NOT NULL,
  `Stock` int(5) NOT NULL,
  `Gambar` varchar(50) NOT NULL,
  `Tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Id_Kategori`, `kd_supplier`, `Nama_Produk`, `Harga_Produk`, `Stock`, `Gambar`, `Tanggal`) VALUES
('P0001', 'K0001', 'S0001', 'Formula 44', '10000', 99, 'B01.jpg', '2016-11-14 22:36:05'),
('P0002', 'K0001', 'S0002', 'Bisolvon', '19000', 99, 'B02.jpg', '2016-12-15 15:36:37'),
('P0003', 'K0001', 'S0001', 'Actifed', '18000', 96, 'B03.jpg', '2016-12-15 15:36:52'),
('P0004', 'K0003', 'S0001', 'Woods', '20000', 98, 'B04.jpg', '2016-12-15 15:37:15'),
('P0005', 'K0002', 'S0001', 'Konidin', '2000', 89, 'B05.jpg', '2016-12-15 15:39:33'),
('P0006', 'K0001', 'S0001', 'Mengkudu', '25000', 100, 'B06.jpg', '2016-12-15 15:57:50'),
('P0007', 'K0001', 'S0003', 'Sirup Gurah', '9000', 99, 'B07.jpg', '2016-12-21 00:00:00'),
('P0008', 'K0001', 'S0002', 'Vitalong C', '5000', 1000, 'B09.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resepobat`
--

CREATE TABLE IF NOT EXISTS `resepobat` (
`id_resep` int(11) NOT NULL,
  `nm_resep` varchar(50) DEFAULT NULL,
  `alamat` text,
  `telp` char(12) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statustransaksi`
--

CREATE TABLE IF NOT EXISTS `statustransaksi` (
  `id_status` char(5) NOT NULL,
  `nm_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statustransaksi`
--

INSERT INTO `statustransaksi` (`id_status`, `nm_status`) VALUES
('M0001', 'Menunggu Dikirim'),
('M0002', 'DiKirim');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `kd_supplier` char(10) NOT NULL,
  `nm_supplier` varchar(50) DEFAULT NULL,
  `alamat` text,
  `telp` char(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `telp`, `email`) VALUES
('S0001', 'PT. Kimia Farma', 'Jl. Condong Catur RT.01 RW.18 ', '089314141414', 'rega.syahfika@gmail.com'),
('S0002', 'PT. Maju Mundur', 'Jl Jonggol selatan godean', '089414141414', 'rega.syahfika@gmail.com'),
('S0003', 'PT. Saudara Sendiri', 'Selokan mataram', '081293396676', 'rega.syahfika@yahoo.co.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
 ADD PRIMARY KEY (`Id_Detail`), ADD KEY `Kd_Order` (`Kd_Order`), ADD KEY `Id_Produk` (`Id_Produk`), ADD KEY `Kd_Order_2` (`Kd_Order`), ADD KEY `Kd_Order_3` (`Kd_Order`), ADD KEY `Kd_Order_4` (`Kd_Order`), ADD KEY `Kd_Order_5` (`Kd_Order`), ADD KEY `Kd_Order_6` (`Kd_Order`), ADD KEY `Kd_Order_7` (`Kd_Order`), ADD KEY `Kd_Order_8` (`Kd_Order`), ADD KEY `Kd_Order_9` (`Kd_Order`), ADD KEY `Kd_Order_10` (`Kd_Order`), ADD KEY `Kd_Order_11` (`Kd_Order`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`Id_Kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
 ADD PRIMARY KEY (`Id_Keranjang`), ADD KEY `Id_Keranjang` (`Id_Keranjang`), ADD KEY `Id_Produk` (`Id_Produk`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
 ADD PRIMARY KEY (`Kd_Order`), ADD KEY `Id_Pelanggan` (`Id_Pelanggan`), ADD KEY `Id_Pelanggan_2` (`Id_Pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`Id_Produk`), ADD KEY `Id_Kategori` (`Id_Kategori`), ADD KEY `Id_Kategori_2` (`Id_Kategori`), ADD KEY `Id_Produk` (`Id_Produk`), ADD KEY `Id_Kategori_3` (`Id_Kategori`), ADD KEY `Id_Kategori_4` (`Id_Kategori`), ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `resepobat`
--
ALTER TABLE `resepobat`
 ADD PRIMARY KEY (`id_resep`), ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `statustransaksi`
--
ALTER TABLE `statustransaksi`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`kd_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
MODIFY `Id_Detail` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
MODIFY `Id_Keranjang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `resepobat`
--
ALTER TABLE `resepobat`
MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `Id_Kategori` FOREIGN KEY (`Id_Kategori`) REFERENCES `kategori` (`Id_Kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
