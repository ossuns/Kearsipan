-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 09:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lplpo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemakaian`
--

CREATE TABLE `detail_pemakaian` (
  `id_pakai` int(5) NOT NULL,
  `id_pemakaian` int(5) NOT NULL,
  `kode` int(5) NOT NULL,
  `umum` int(10) NOT NULL,
  `jknpbi` int(10) NOT NULL,
  `jknnonpbi` int(10) NOT NULL,
  `jamkesda` int(10) NOT NULL,
  `jamkesdasktm` int(10) NOT NULL,
  `jamkesdajamkesmas` int(10) NOT NULL,
  `uks` int(10) NOT NULL,
  `kir` int(10) NOT NULL,
  `gratis` int(10) NOT NULL,
  `lainlain` int(10) NOT NULL,
  `jumlah_pemakaian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemakaian`
--

INSERT INTO `detail_pemakaian` (`id_pakai`, `id_pemakaian`, `kode`, `umum`, `jknpbi`, `jknnonpbi`, `jamkesda`, `jamkesdasktm`, `jamkesdajamkesmas`, `uks`, `kir`, `gratis`, `lainlain`, `jumlah_pemakaian`) VALUES
(1, 1, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(2, 2, 1, 5, 5, 0, 0, 5, 0, 0, 0, 0, 0, 10),
(3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penerimaan`
--

CREATE TABLE `detail_penerimaan` (
  `id_detailpenerimaan` int(11) NOT NULL,
  `id_penerimaan` int(5) NOT NULL,
  `kode` int(5) NOT NULL,
  `jumlah_terima` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penerimaan`
--

INSERT INTO `detail_penerimaan` (`id_detailpenerimaan`, `id_penerimaan`, `kode`, `jumlah_terima`) VALUES
(1, 1, 1, 30),
(2, 1, 2, 1),
(3, 2, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode` int(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode`, `nama_obat`, `satuan`) VALUES
(1, 'promaag', 'tablet'),
(2, 'flu', 'tablet');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `id_pemakaian` int(5) NOT NULL,
  `id_puskesmas` int(5) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `total_pemakaian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`id_pemakaian`, `id_puskesmas`, `bulan`, `tahun`, `total_pemakaian`) VALUES
(1, 1, 'Januari', '2018', 30),
(2, 2, 'Juli', '2018', 50),
(3, 1, 'Januari', '2016', 50);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` int(5) NOT NULL,
  `id_puskesmas` int(5) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `jumlah_penerimaan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `id_puskesmas`, `bulan`, `tahun`, `jumlah_penerimaan`) VALUES
(1, 1, 'Januari', '2018', 80),
(2, 1, 'Juli', '2018', 30);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` int(5) NOT NULL,
  `id_puskesmas` int(5) NOT NULL,
  `kode` int(5) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `stok_awal` int(10) NOT NULL,
  `persediaan` int(10) NOT NULL,
  `sisa_stok` int(10) NOT NULL,
  `permintaan` int(10) NOT NULL,
  `pemberian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `id_puskesmas`, `kode`, `bulan`, `tahun`, `stok_awal`, `persediaan`, `sisa_stok`, `permintaan`, `pemberian`) VALUES
(1, 1, 1, 'Januari', '2018', 1000, 0, 0, 0, 0),
(2, 2, 2, 'Juli', '2018', 600, 0, 0, 0, 0),
(3, 2, 1, 'Januari', '2017', 10000, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id_puskesmas` int(5) NOT NULL,
  `nama_puskesmas` varchar(50) NOT NULL,
  `kecamatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`id_puskesmas`, `nama_puskesmas`, `kecamatan`) VALUES
(1, 'kra', 'karanganyar'),
(2, 'Jaten', 'Jaten');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
  ADD PRIMARY KEY (`id_pakai`);

--
-- Indexes for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  ADD PRIMARY KEY (`id_detailpenerimaan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`id_pemakaian`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id_puskesmas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
  MODIFY `id_pakai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  MODIFY `id_detailpenerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id_pemakaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id_penerimaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id_puskesmas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
