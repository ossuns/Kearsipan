-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 09:02 AM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

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
(1, 1, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(2, 1, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(3, 1, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(4, 1, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(5, 1, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(8, 1, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 1, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(11, 2, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(12, 2, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(13, 2, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(14, 2, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(15, 2, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 2, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 2, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(18, 2, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 2, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 2, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(21, 3, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(22, 3, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(23, 3, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(24, 3, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(25, 3, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 3, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 3, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(28, 3, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 3, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 3, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(31, 10, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(32, 10, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(33, 10, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(34, 10, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(35, 10, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 10, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 10, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(38, 10, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 10, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 10, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(41, 12, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(42, 12, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(43, 12, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(44, 12, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(45, 12, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 12, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 12, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(48, 12, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 12, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 12, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(51, 13, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(52, 13, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(53, 13, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(54, 13, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(55, 13, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 13, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 13, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(58, 13, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 13, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 13, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(61, 14, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(62, 14, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(63, 14, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(64, 14, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(65, 14, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 14, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 14, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(68, 14, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 14, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 14, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(71, 15, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(72, 15, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(73, 15, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(74, 15, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(75, 15, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 15, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 15, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(78, 15, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 15, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 15, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326),
(81, 16, 101, 0, 10, 0, 0, 1, 0, 0, 0, 0, 0, 11),
(82, 16, 102, 0, 14, 0, 0, 1, 0, 0, 0, 0, 0, 15),
(83, 16, 103, 14, 0, 2, 0, 0, 0, 0, 0, 0, 0, 16),
(84, 16, 104, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10),
(85, 16, 106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 16, 107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 16, 108, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 13),
(88, 16, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 16, 110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 16, 111, 90, 206, 30, 0, 0, 0, 0, 0, 0, 0, 326);

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
(1, 1, 101, 0),
(2, 1, 102, 0),
(3, 1, 103, 0),
(4, 1, 104, 0),
(5, 1, 106, 0),
(6, 1, 107, 0),
(7, 1, 108, 0),
(8, 1, 109, 0),
(9, 1, 110, 0),
(10, 1, 111, 100),
(11, 2, 101, 0),
(12, 2, 102, 0),
(13, 2, 103, 0),
(14, 2, 104, 0),
(15, 2, 106, 0),
(16, 2, 107, 0),
(17, 2, 108, 0),
(18, 2, 109, 0),
(19, 2, 110, 0),
(20, 2, 111, 100),
(21, 3, 101, 0),
(22, 3, 102, 0),
(23, 3, 103, 0),
(24, 3, 104, 0),
(25, 3, 106, 0),
(26, 3, 107, 0),
(27, 3, 108, 0),
(28, 3, 109, 0),
(29, 3, 110, 0),
(30, 3, 111, 100),
(31, 10, 101, 0),
(32, 10, 102, 0),
(33, 10, 103, 0),
(34, 10, 104, 0),
(35, 10, 106, 0),
(36, 10, 107, 0),
(37, 10, 108, 0),
(38, 10, 109, 0),
(39, 10, 110, 0),
(40, 10, 111, 100),
(41, 12, 101, 0),
(42, 12, 102, 0),
(43, 12, 103, 0),
(44, 12, 104, 0),
(45, 12, 106, 0),
(46, 12, 107, 0),
(47, 12, 108, 0),
(48, 12, 109, 0),
(49, 12, 110, 0),
(50, 12, 111, 100),
(51, 13, 101, 0),
(52, 13, 102, 0),
(53, 13, 103, 0),
(54, 13, 104, 0),
(55, 13, 106, 0),
(56, 13, 107, 0),
(57, 13, 108, 0),
(58, 13, 109, 0),
(59, 13, 110, 0),
(60, 13, 111, 100),
(61, 14, 101, 0),
(62, 14, 102, 0),
(63, 14, 103, 0),
(64, 14, 104, 0),
(65, 14, 106, 0),
(66, 14, 107, 0),
(67, 14, 108, 0),
(68, 14, 109, 0),
(69, 14, 110, 0),
(70, 14, 111, 100),
(71, 15, 101, 0),
(72, 15, 102, 0),
(73, 15, 103, 0),
(74, 15, 104, 0),
(75, 15, 106, 0),
(76, 15, 107, 0),
(77, 15, 108, 0),
(78, 15, 109, 0),
(79, 15, 110, 0),
(80, 15, 111, 100),
(81, 16, 101, 0),
(82, 16, 102, 0),
(83, 16, 103, 0),
(84, 16, 104, 0),
(85, 16, 106, 0),
(86, 16, 107, 0),
(87, 16, 108, 0),
(88, 16, 109, 0),
(89, 16, 110, 0),
(90, 16, 111, 100);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode` int(5) NOT NULL,
  `nama_obat` varchar(150) NOT NULL,
  `satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode`, `nama_obat`, `satuan`) VALUES
(101, 'IV CATHETER NO 24 G\r\n', 'SET'),
(102, 'IV CATHETER NO. 22 G\r\n', 'SET'),
(103, 'ASIKLOVIR KRIM 5%', 'TUBE 5 GRAM'),
(104, 'ASIKLOVIR TABLET 200 MG', 'TABLET'),
(106, 'ALAT SUNTIK SEKALI PAKAI 1 ML', 'SET'),
(107, 'ALAT SUNTIK SEKALI PAKAI 2,5 ML', 'SET'),
(108, 'ALAT SUNTIK SEKALI PAKAI 5 ML', 'SET'),
(109, 'ALBENDAZOL 400 MG', 'TABLET'),
(110, 'ALLOPURINOL TABLET 100 MG', 'TABLET'),
(111, 'AMINOFILIN TABLET  200 MG', 'TABLET'),
(112, 'AMINOFILIN INJ 24 MG/ML', 'AMPUL'),
(115, 'AMOKSISILLIN SIRUP KERING 125 MG/5ML', 'BOTOL 60 ML'),
(116, 'AMPICILLIN INJ.', 'VIAL'),
(119, 'ANTALGIN INJEKSI 250 MG', 'AMPUL'),
(120, 'ANTALGIN TABLET 500 MG', 'TABLET'),
(121, 'ANTASIDA DOEN I TABLET KUNYAH, KOMBINASI : ALUMINI', 'TABLET'),
(122, 'ANTASIDA DOEN II SUSPENSI KOMBINASI:ALUMINIUM HIDROKSIDA 200 MG/5ML+MAGNESIUM HIDROKSIDA 200 MG/5ML', 'BOTOL 60 ML'),
(123, 'ANTI BAKTERI DOEN SALEP KOMBINASI : BASITRASIN 500 IU/G + POLIMIKSIN 10.000 IU/G', 'TUBE'),
(124, 'ANTIHEMOROID DOEN KOMBINASI BISMUTH SUBGALAT 150 MG + HEKSAKLOROFEN 2,5 MG', 'SUPP'),
(125, 'ANTI FUNGI DOEN KOMBINASI SALEP', 'POT'),
(126, 'ANTIMIGREN: ERGOTAMIN TARTRAT 1 MG + KOFEIN 50 MG', 'TABLET'),
(127, 'DIMENHIDRINAT TABLET 50 MG', 'TABLET'),
(128, 'AQUA PRO INJ', '10 VIAL/KOTAK'),
(131, 'ASAM MEFENAMAT', 'TABLET'),
(132, 'ASETOSAL TABLET', 'TABLET'),
(133, 'ASPAR K TABLET', 'TABLET'),
(135, 'ATROPIN INJ ', 'AMPUL'),
(140, 'AMOKSISILIN INJEKSI', 'VIAL'),
(145, 'ANTI BISA ULAR POLIVALEN', 'VIAL'),
(157, 'AMBROKSOL SIRUP', 'BOTOL'),
(158, 'AMBROKSOL 30 MG', 'TABLET'),
(159, 'AMLODIPIN 5 MG TABLET', 'TABLET'),
(166, 'ARDIOS TABLET', 'TABLET'),
(178, 'ASERING', 'FLABOT'),
(201, 'BENZATIN BENZIL PENISILIN 2,4 JUTA IU/VIAL', 'VIAL'),
(202, 'BESI II SULFAT KOMBINASI ASAM FOLAT', 'TABLET'),
(206, 'HYOSCHINE N BUTIL BROMIDA INJEKSI 20 MG/ML\r\n', 'AMPUL'),
(207, 'HYOSCHINE N BUTIL BROMIDA TABLET 10 MG\r\n', 'TABLET'),
(221, 'BETAMETASON KRIM 0,1% (SEBAGAI VALERAT)', 'TUBE'),
(224, 'BATUGIN ELIXIR\r\n', 'BOTOL'),
(225, 'BONDING', 'SET'),
(302, 'CAT GUT/ BENANG BEDAH 3/0 24 MM', 'PCS'),
(305, 'SIPROFLOKSASIN HCL TABLET 500 MG\r\n', '100 TABLET/KOTAK'),
(306, 'CARBAMAZEPINE 200MG ', 'TABLET'),
(309, 'SEFIKSIM 100 MG KAPSUL\r\n', 'KAPSUL'),
(310, 'SEFOTAKSIM INJEKSI 1 G\r\n', 'AMPUL'),
(317, 'SEFADROKSIL KAPSUL 500 MG\r\n', 'KAPSUL'),
(319, 'COMPOSIT LIGHT CURING', 'SET'),
(321, 'CAVIT', 'SET'),
(404, 'DEKSAMETASON INJK 5 MG/ML-1ML', 'TABLET'),
(405, 'DEKSTROMETORFAN SIRUP KOMBINASI', 'BOTOL'),
(408, 'DEVITALISASI PASTA (NON ARSEN)', 'BOTOL/KOTAK'),
(409, 'DEXAMETASON INJ IV 5 MG/ML', 'AMPUL'),
(410, 'DIAZEPAM 2 MG TABLET', 'TABLET'),
(413, 'DIFENHIDRAMIN HCL INJ 10 MG / ML', 'AMPUL'),
(414, 'DIGOKSIN TABLET 0,25 MG', 'TABLET'),
(418, 'DASABION', 'KAPSUL'),
(426, 'DOMPERIDON SIRUP ', 'BOTOL'),
(501, 'EFEDRIN 25 MG TABLET', 'TABLET'),
(502, 'EKSTRAK BELADON TABLET 10 MG', '1000 TABLET/BOTOL'),
(504, 'DENZYMFORT', 'TABLET'),
(506, 'DEKSTROMETORFAN TABLET KOMBINASI', 'TABLET'),
(510, 'ETANOL 70%\r\n', 'BOTOL 1 L'),
(511, 'ETIL KLORIDA SPRAY\r\n', 'VIAL/CAN/100 ML'),
(512, 'EUGENOL CAIRAN\r\n', 'BOTOL'),
(513, 'ERITROMISIN 500MG\r\n', 'KAPLET'),
(517, 'ETHCING\r\n', 'SET'),
(518, 'ENKASARI', 'BOTOL'),
(519, 'ETANOL 70%\r\n', 'BOTOL 100 ML'),
(603, 'FENOBARBITAL INJEKSI\r\n', 'AMPUL'),
(605, 'FENOBARBITAL TABLET 30 MG\r\n', 'TABLET'),
(607, 'FENOL GLISEROL TT 10 %\r\n', 'BOTOL'),
(610, 'FUROSEMID TABLET 40 MG\r\n', 'TABLET'),
(612, 'FOLEY CATHETER 2 WAY NO.16\r\n', 'PCS'),
(613, 'TABLET TAMBAH DARAH KOMBINASI\r\n', '30 TABLET/SASE'),
(614, 'FAMOTIDIN TABLET 20 MG\r\n', 'TABLET'),
(702, 'GARAM ORALIT KOMBINASI : NATRIUM 0,70 G, KALIUM KLORIDA 0,30 G, TRINATRIUM SITRAT DIHIDRAT 0,58 G, GLUKOSA ANHIDRAT 2,7 G\r\n', 'SASET'),
(703, 'GENTAMISIN INJ 40 MG / ML\r\n', 'AMPUL'),
(704, 'GENTIAN VIOLET LARUTAN 1%\r\n', 'BOTOL 10 ML'),
(705, 'GLASS IONOMER FUJI\r\n', 'SET'),
(706, 'GLIBENCLAMIDE TABLET 5 MG\r\n', 'TABLET'),
(707, 'GLISERIL GUAIKOLAT TABLET 100 MG\r\n', 'TABLET'),
(710, 'GLUKKOSA LAUTAN INFUS 5% STERIL\r\n', 'BOTOL 500 ML'),
(711, 'GRISEUFULVIN TABLET 125 MG\r\n', 'TABLET'),
(716, 'GENTAMISIN SALEP KULIT 0,1 %\r\n', 'TUBE'),
(718, 'GERIAVITA \r\n', 'TABLET'),
(801, 'HALOPERIDOL TABLET 0,5 MG\r\n', 'TABLET'),
(802, 'BROMHEKSIN TABLET 8 MG', 'TABLET'),
(803, 'HIDROKLOROTIAZID TABLET 25 MG\r\n', 'TABLET'),
(804, 'HIDROKORTISON KRIM 2,5%\r\n', 'TUBE'),
(812, 'HEMOROGARD\r\n', 'KAP'),
(813, 'HANDSCOEN\r\n', 'BIJI'),
(819, 'HANDSCOEN STERIL\r\n', 'PASANG'),
(902, 'ICHTYOL SALEP\r\n', 'POT'),
(903, 'INFUS SET ANAK\r\n', 'SET/KANTONG'),
(904, 'INFUS SET DEWASA\r\n', 'SET/KANTONG'),
(909, 'ISOSORBID DINITRAT TABLET SUBLINGUAL 5 MG\r\n', 'TABLET'),
(910, 'IBUPROFEN TABLET 400 MG\r\n', 'TABLET'),
(917, 'IMULAN \r\n', 'KTK 30 KAP'),
(1001, 'JARUM JAHIT NO 13\r\n', 'LUSIN'),
(1006, 'JARUM JAHIT DALAM NO. 21\r\n', 'SET'),
(1102, 'KALSIUM HIDROKSIDA PASTA\r\n', 'TUBE'),
(1103, 'KALSIUM LAKTAT TABLET 500 MG\r\n', 'TABLET'),
(1106, 'KAPAS PEMBALUT / ABSORBEN 250 GRAM\r\n', 'BUNGKUS'),
(1107, 'KAPTOPRIL TABLET 25 MG\r\n', 'TABLET'),
(1109, 'KASSA KOMPRES STERIL 40/40\r\n', 'BUNGKUS'),
(1110, 'KASA PEMBALUT 2M X 80 CM\r\n', 'ROL'),
(1111, 'KASA HIDROFIL 4 X 15\r\n', 'ROL'),
(1113, 'KLORAMFENIKOL INJEKSI 1GRAM/5ML\r\n', 'VIAL 5ML'),
(1116, 'KLONIDIN 0,15 TABLET\r\n', 'TABLET'),
(1117, 'KLORAMFENIKOL KAPSUL 250 MG\r\n', 'KAPSUL'),
(1118, 'KLORAMFENIKOL SALEP MATA 1%\r\n', 'TUBE 5 GRAM'),
(1119, 'KLORAMFENIKOL SUSPENSI 125 MG/5 ML\r\n', 'BOTOL 60 ML'),
(1120, 'KLORAMFENIKOL TETES MATA 0,5%\r\n', 'BOTOL 5 ML'),
(1121, 'KLORAMFENIKOL TETES TELINGA\r\n', 'BOTOL 5 ML'),
(1122, 'KLORFENIRAMINA MEALEAT (CTM) TABLET 4 MG\r\n', 'TABLET'),
(1123, 'KLORFENOL KAMFER MENTHOL (CHKM)\r\n', 'BOTOL 10 ML'),
(1133, 'KOTRIMOXAZOL SUSPENSI KOMB : SULFAMETOKSAZOL 200 MG + TRIMETOPTIM 40 MG / 5 ML\r\n', 'BOTOL 60 ML'),
(1135, 'KONTRIMOXAZOL DOEN I (DEWASA) KOMBINASI : SULFAMETOKSAZOL 400 MG, TRIMETOPRIM 80 MG\r\n', 'TABLET'),
(1138, 'KETOKONAZOL 200 MG\r\n', 'TABLET'),
(1141, 'KASA GULUNG PANJANG\r\n', 'ROL'),
(1148, 'KLORIN(BAYCLIN)\r\n', 'BOTOL'),
(1154, 'KURKUMEX KAP\r\n', 'KTK 100 KAP'),
(1155, 'KURKUMEX SYR\r\n', 'BOTOL'),
(1161, 'KA EN 3A\r\n', 'FLABOT'),
(1162, 'KA EN 3B\r\n', 'FLABOT'),
(1209, 'FUROSEMID INJ I.V/I.M 10 MG/ML\r\n', 'AMPUL'),
(1210, 'BISACODIL 5MG', 'TABLET'),
(1211, 'LAVERTRAN SALEP\r\n', 'POT'),
(1212, 'LIDOKAIN INJEKSI 2% (HCL) + EPINEFRIN 1 : 80.000-2ML/ PEHACAIN INJ\r\n', 'AMPUL'),
(1213, 'LYSOL MENGANDUNG KRESOL TERSABUN 50%\r\n', 'BOTOL 1000 ML'),
(1214, 'LOPERAMID TABLET 2 MG\r\n', 'TABLET'),
(1217, 'LORATADIN TABLET 10 MG\r\n', 'TABLET'),
(1303, 'BETAHISTIN MESILAT TABLET 6 MG', 'TABLET'),
(1305, 'METILERGOMETRIN MALEAT INJEKSI 0,200 MG - 1 ML\r\n', 'AMPUL'),
(1306, 'METILERGOMETRIN MALEAT (METILERGOMETRIN) TABLET SALUT 0,125 MG\r\n', 'KOTAK 10 X`10 TABLET SALUT'),
(1307, 'METOKLOPRAMID TABLET 10 MG\r\n', 'TABLET'),
(1308, 'METRONIDAZOLE 250 MG\r\n', 'TABLET'),
(1310, 'MIKONAZOL KRIM/SALEP 2% (NITRAT)\r\n', 'TUBE'),
(1311, 'MUMMIFYING PASTA\r\n', 'BOTOL/KOTAK'),
(1314, 'METFORMIN 500 MG\r\n', '100 TAB/KTK'),
(1315, 'METRONIDAZOL TABLET 500 MG\r\n', 'TABLET'),
(1316, 'METOKLOPRAMID INJEKSI 5 MG/ML\r\n', 'AMPUL'),
(1318, 'MINYAK KAYU PUTIH\r\n', 'BOTOL'),
(1320, 'MASKER\r\n', 'BIJI'),
(1331, 'METILPREDNISOLON TABLET 8 MG\r\n', 'TABLET'),
(1401, 'NATRIUM BIKARBONAT TABLET 500 MG\r\n', 'TABLET'),
(1403, 'NATRIUM KLORIDA LART INF 0,9 %\r\n', '500 ML/BOTOL'),
(1405, 'KAOLIN TABLET (NEO DIAFORM )\r\n', 'TABLET'),
(1408, 'NIFEDIPIN TABLET 10 MG\r\n', 'TABLET'),
(1409, 'NISTATIN TABLET SALUT 500.000 IU/G\r\n', 'TABLET'),
(1410, 'NISTATIN VAGINAL TABLET SALUT 100.000 IU/G\r\n', 'TABLET'),
(1417, 'NEUROTROPIK 5000 INJEKSI(NEUROBION INJ)\r\n', 'AMPUL'),
(1432, 'NATRIUM DIKLOFENAK 25 MG\r\n', 'TABLET'),
(1501, 'OAT FDC KATAGORI I \r\n', 'PAKET'),
(1502, 'OAT KATAGORI II\r\n', 'PAKET'),
(1504, 'OAT KATAGORI ANAK \r\n', 'PAKET'),
(1506, 'OCO\r\n', 'SET'),
(1507, 'OBAT BATUK HITAM (OBH) CAIRAN\r\n', 'BOTOL 100 ML'),
(1508, 'OKSITETRASIKLIN SALEP KULIT\r\n', 'TUBE'),
(1509, 'OKSITETRASIKLIN HCL SALEP MATA 1%\r\n', 'TUBE'),
(1511, 'OKSITOSIN INJEKSI 10 IU/ML-1 ML\r\n', 'AMPUL'),
(1516, 'OMEPRAZOL 20 MG\r\n', 'KAPSUL'),
(1517, 'OCUGARD\r\n', 'KTK 30 KAP'),
(1602, 'PAPAVERIN TABLET 40 MG\r\n', 'TABLET'),
(1604, 'PARACETAMOL SYRUP 120 MG / 5 ML\r\n', '60 ML/BOTOL'),
(1606, 'PARASETAMOL TABLET 500 MG\r\n', 'TABLET'),
(1607, 'PEHACAIN INJ\r\n', 'AMPUL'),
(1614, 'PIROKSIKAM 10 MG\r\n', 'TABLET'),
(1616, 'PLESTER 5 YARDS X 2 INCH\r\n', 'ROL'),
(1618, 'POVIDON IODIDA 10%\r\n', '30 ML/BOTOL'),
(1619, 'PREDNISON 5 MG TABLET\r\n', 'TABLET'),
(1625, 'PROPANOLOL TABLET 10 MG (HCL)\r\n', 'TABLET'),
(1626, 'PROPIL TIO URASIL TABLET 100 MG\r\n', '100 TABLET/BOTOL'),
(1635, 'PIRACETAM TABLET 400 MG\r\n', 'TABLET'),
(1801, 'RANITIDIN TABLET 150 MG\r\n', 'TABLET'),
(1804, 'RESERPIN 0,25 MG TABLET\r\n', 'TABLET'),
(1807, 'RINGER LAKTAT LARUTAN INFUS\r\n', 'BOTOL 500 ML'),
(1810, 'RANITIDIN INJEKSI 25 MG/ML\r\n', 'AMPUL'),
(1901, 'SALBUTAMOL TABLET 2 MG (SEBAGAI SULFAT)\r\n', 'TABLET'),
(1902, 'SALEP 2-4, KOMBINASI : ASAM SALISILAT 2% + BELERANG ENDAP 4%\r\n', 'POT'),
(1903, 'SALISIL BEDAK 2 %\r\n', 'KOTAK 50 GR'),
(1905, 'SEMEN SENG FOSFAT SERBUK DAN CAIRAN\r\n', 'SET @ 30 GRAM/BOTOL'),
(1906, 'SERUM ATS\r\n', 'AMPUL'),
(1907, 'SILK (BENANG BEDAH SUTERA) NO. 3/0 DENGAN JARUM BEDAH\r\n', 'BIJI'),
(1914, 'SULFASETAMIDA NATRIUM TETES MATA 15 %\r\n', ' BOTOL 5 ML'),
(1915, 'DIAZEPAM SUPP', 'SUPP'),
(1923, 'SIMVASTATIN TABLET 10 MG\r\n', 'TABLET'),
(1927, 'SALBUTAMOL NEBULIZER 2,5 MG/2,5ML\r\n', 'BOTOL'),
(1936, 'SIMVASTATIN TABLET 20 MG\r\n', 'TABLET'),
(2001, 'TEMPORARY STOPPING FLETCHER (FLETCHER) SERBUK DAN CAIRAN\r\n', 'SET @ 100 GR/BOTOL'),
(2002, 'TENSIGARD\r\n', '30 KAPSUL/KOTAK'),
(2003, 'TETRASIKLIN KAP 500 MG\r\n', 'KAPSUL'),
(2006, 'TRAMADOL INJEKSI 50 MG/ML\r\n', 'AMPUL'),
(2017, 'TENSOCREPE\r\n', 'BIJI'),
(2103, 'URINE BAG', 'PCS'),
(2202, 'VITAMIN B KOMPLEKS TABLET', 'TABLET'),
(2203, 'VITAMIN B1 (TIAMIN) INJEKSI 10 MG/ ML \r\n', 'AMPUL'),
(2204, 'VITAMIN B1 (TIAMIN) TABLET 50 MG (HCL/NITRAT)\r\n', 'TABLET'),
(2205, 'VITAMIN B12 (SIANOKOBALAMIN) INJEKSI 500 MCG\r\n', 'AMPUL'),
(2206, 'VITAMIN B12 (SIANOKOBALAMIN) TABLET 50 MCG\r\n', 'TABLET'),
(2207, 'PIRIDOKSIN (VITAMIN B6) TABLET 10 MG (HCL)\r\n', 'TABLET'),
(2208, 'VITAMIN C (ASAM ASKORBAT) 50 MG\r\n', 'TABLET'),
(2209, 'VITAMIN K1 (FITOMENADION) INJ 10 MG/ML-1 ML\r\n', 'AMPUL'),
(2210, 'VITAMIN K1 (FITOMENADION) TABLET SALUT GULA 10 MG\r\n', 'TABLET'),
(2211, 'VITAMIN A 100.000 UI', '50 KAP/BOTOL'),
(2212, 'VITAMIN A 200.000 UI', '50 KAP/BOTOL'),
(2401, 'XYLOMIDON\r\n', 'VIAL'),
(2602, 'ZINK TABLET 20 MG', 'TABLET'),
(2603, 'FRAMESETIN SULFAT 1 %', 'PCS'),
(2604, 'PHARMAFIX', 'ROL'),
(2605, 'ATS INJK', 'AMPUL'),
(2606, 'ALKOHOL SWAB', 'BOX'),
(2607, 'MULTIVITAMIN SIRUP', 'BTL'),
(3000, 'kode', 'kode');

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
(1, 1, 'Januari', '2018', 0),
(2, 1, 'Februari', '2018', 0),
(3, 3, 'April', '2018', 0),
(4, 5, 'Januari', '2018', 0),
(5, 1, 'Januari', '2018', 0),
(6, 1, 'Januari', '2018', 0),
(7, 1, 'Januari', '2018', 0),
(8, 1, 'Januari', '2018', 0),
(9, 1, 'Januari', '2018', 0),
(10, 13, 'Juli', '2018', 0),
(11, 2, 'Januari', '2018', 0),
(12, 5, 'Januari', '2018', 0),
(13, 7, 'Februari', '2018', 0),
(14, 1, 'Februari', '2', 0),
(15, 3, 'Februari', '2018', 0),
(16, 16, 'Januari', '2018', 0);

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
(1, 1, 'Januari', '2018', 0),
(2, 1, 'Februari', '2018', 0),
(3, 3, 'April', '2018', 0),
(4, 5, 'Januari', '2018', 0),
(5, 1, 'Januari', '2018', 0),
(6, 1, 'Januari', '2018', 0),
(7, 1, 'Januari', '2018', 0),
(8, 1, 'Januari', '2018', 0),
(9, 1, 'Januari', '2018', 0),
(10, 13, 'Juli', '2018', 0),
(11, 2, 'Januari', '2018', 0),
(12, 5, 'Januari', '2018', 0),
(13, 7, 'Februari', '2018', 0),
(14, 1, 'Februari', '2', 0),
(15, 3, 'Februari', '2018', 0),
(16, 16, 'Januari', '2018', 0);

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
(1, 1, 101, 'Januari', '2018', 202, 202, 191, 0, 0),
(2, 1, 102, 'Januari', '2018', 333, 333, 318, 0, 0),
(3, 1, 103, 'Januari', '2018', 516, 516, 500, 0, 0),
(4, 1, 104, 'Januari', '2018', 873, 873, 863, 1000, 0),
(5, 1, 106, 'Januari', '2018', 0, 0, 0, 0, 0),
(6, 1, 107, 'Januari', '2018', 855, 855, 855, 500, 0),
(7, 1, 108, 'Januari', '2018', 979, 979, 966, 500, 0),
(8, 1, 109, 'Januari', '2018', 96, 96, 96, 0, 0),
(9, 1, 110, 'Januari', '2018', 0, 0, 0, 0, 0),
(10, 1, 111, 'Januari', '2018', 253, 353, 27, 1000, 0),
(11, 1, 101, 'Februari', '2018', 202, 202, 191, 0, 0),
(12, 1, 102, 'Februari', '2018', 333, 333, 318, 0, 0),
(13, 1, 103, 'Februari', '2018', 516, 516, 500, 0, 0),
(14, 1, 104, 'Februari', '2018', 873, 873, 863, 1000, 0),
(15, 1, 106, 'Februari', '2018', 0, 0, 0, 0, 0),
(16, 1, 107, 'Februari', '2018', 855, 855, 855, 500, 0),
(17, 1, 108, 'Februari', '2018', 979, 979, 966, 500, 0),
(18, 1, 109, 'Februari', '2018', 96, 96, 96, 0, 0),
(19, 1, 110, 'Februari', '2018', 0, 0, 0, 0, 0),
(20, 1, 111, 'Februari', '2018', 253, 353, 27, 1000, 0),
(21, 3, 101, 'April', '2018', 202, 202, 191, 0, 0),
(22, 3, 102, 'April', '2018', 333, 333, 318, 0, 0),
(23, 3, 103, 'April', '2018', 516, 516, 500, 0, 0),
(24, 3, 104, 'April', '2018', 873, 873, 863, 1000, 0),
(25, 3, 106, 'April', '2018', 0, 0, 0, 0, 0),
(26, 3, 107, 'April', '2018', 855, 855, 855, 500, 0),
(27, 3, 108, 'April', '2018', 979, 979, 966, 500, 0),
(28, 3, 109, 'April', '2018', 96, 96, 96, 0, 0),
(29, 3, 110, 'April', '2018', 0, 0, 0, 0, 0),
(30, 3, 111, 'April', '2018', 253, 353, 27, 1000, 0),
(31, 13, 101, 'Juli', '2018', 202, 202, 191, 0, 0),
(32, 13, 102, 'Juli', '2018', 333, 333, 318, 0, 0),
(33, 13, 103, 'Juli', '2018', 516, 516, 500, 0, 0),
(34, 13, 104, 'Juli', '2018', 873, 873, 863, 1000, 0),
(35, 13, 106, 'Juli', '2018', 0, 0, 0, 0, 0),
(36, 13, 107, 'Juli', '2018', 855, 855, 855, 500, 0),
(37, 13, 108, 'Juli', '2018', 979, 979, 966, 500, 0),
(38, 13, 109, 'Juli', '2018', 96, 96, 96, 0, 0),
(39, 13, 110, 'Juli', '2018', 0, 0, 0, 0, 0),
(40, 13, 111, 'Juli', '2018', 253, 353, 27, 1000, 0),
(41, 5, 101, 'Januari', '2018', 202, 202, 191, 0, 0),
(42, 5, 102, 'Januari', '2018', 333, 333, 318, 0, 0),
(43, 5, 103, 'Januari', '2018', 516, 516, 500, 0, 0),
(44, 5, 104, 'Januari', '2018', 873, 873, 863, 1000, 0),
(45, 5, 106, 'Januari', '2018', 0, 0, 0, 0, 0),
(46, 5, 107, 'Januari', '2018', 855, 855, 855, 500, 0),
(47, 5, 108, 'Januari', '2018', 979, 979, 966, 500, 0),
(48, 5, 109, 'Januari', '2018', 96, 96, 96, 0, 0),
(49, 5, 110, 'Januari', '2018', 0, 0, 0, 0, 0),
(50, 5, 111, 'Januari', '2018', 253, 353, 27, 1000, 0),
(51, 7, 101, 'Februari', '2018', 202, 202, 191, 0, 0),
(52, 7, 102, 'Februari', '2018', 333, 333, 318, 0, 0),
(53, 7, 103, 'Februari', '2018', 516, 516, 500, 0, 0),
(54, 7, 104, 'Februari', '2018', 873, 873, 863, 1000, 0),
(55, 7, 106, 'Februari', '2018', 0, 0, 0, 0, 0),
(56, 7, 107, 'Februari', '2018', 855, 855, 855, 500, 0),
(57, 7, 108, 'Februari', '2018', 979, 979, 966, 500, 0),
(58, 7, 109, 'Februari', '2018', 96, 96, 96, 0, 0),
(59, 7, 110, 'Februari', '2018', 0, 0, 0, 0, 0),
(60, 7, 111, 'Februari', '2018', 253, 353, 27, 1000, 0),
(61, 1, 101, 'Februari', '2', 202, 202, 191, 0, 0),
(62, 1, 102, 'Februari', '2', 333, 333, 318, 0, 0),
(63, 1, 103, 'Februari', '2', 516, 516, 500, 0, 0),
(64, 1, 104, 'Februari', '2', 873, 873, 863, 1000, 0),
(65, 1, 106, 'Februari', '2', 0, 0, 0, 0, 0),
(66, 1, 107, 'Februari', '2', 855, 855, 855, 500, 0),
(67, 1, 108, 'Februari', '2', 979, 979, 966, 500, 0),
(68, 1, 109, 'Februari', '2', 96, 96, 96, 0, 0),
(69, 1, 110, 'Februari', '2', 0, 0, 0, 0, 0),
(70, 1, 111, 'Februari', '2', 253, 353, 27, 1000, 0),
(71, 3, 101, 'Februari', '2018', 202, 202, 191, 0, 0),
(72, 3, 102, 'Februari', '2018', 333, 333, 318, 0, 0),
(73, 3, 103, 'Februari', '2018', 516, 516, 500, 0, 0),
(74, 3, 104, 'Februari', '2018', 873, 873, 863, 1000, 0),
(75, 3, 106, 'Februari', '2018', 0, 0, 0, 0, 0),
(76, 3, 107, 'Februari', '2018', 855, 855, 855, 500, 0),
(77, 3, 108, 'Februari', '2018', 979, 979, 966, 500, 0),
(78, 3, 109, 'Februari', '2018', 96, 96, 96, 0, 0),
(79, 3, 110, 'Februari', '2018', 0, 0, 0, 0, 0),
(80, 3, 111, 'Februari', '2018', 253, 353, 27, 1000, 0),
(81, 16, 101, 'Januari', '2018', 202, 202, 191, 0, 0),
(82, 16, 102, 'Januari', '2018', 333, 333, 318, 0, 0),
(83, 16, 103, 'Januari', '2018', 516, 516, 500, 0, 0),
(84, 16, 104, 'Januari', '2018', 873, 873, 863, 1000, 0),
(85, 16, 106, 'Januari', '2018', 0, 0, 0, 0, 0),
(86, 16, 107, 'Januari', '2018', 855, 855, 855, 500, 0),
(87, 16, 108, 'Januari', '2018', 979, 979, 966, 500, 0),
(88, 16, 109, 'Januari', '2018', 96, 96, 96, 0, 0),
(89, 16, 110, 'Januari', '2018', 0, 0, 0, 0, 0),
(90, 16, 111, 'Januari', '2018', 253, 353, 27, 1000, 0);

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
(1, 'Colomadu1', 'Colomadu'),
(2, 'Colomadu2', 'Colomadu'),
(3, 'Gondangrejo', 'Gondangrejo'),
(4, 'Jaten1', 'Jaten'),
(5, 'Jaten2', 'Jaten'),
(6, 'Jatipuro', 'Jatipuro'),
(7, 'Jatiyoso', 'Jatiyoso'),
(8, 'Jenawi', 'Jenawi'),
(9, 'Jumapolo', 'Jumapolo'),
(10, 'Jumantono', 'Jumantono'),
(11, 'Karanganyar', 'Karanganyar'),
(12, 'Karangpandan', 'Karangpandan'),
(13, 'Kebakkramat1', 'Kebakkramat'),
(14, 'Kebakkramat2', 'Kebakkramat'),
(15, 'Kerjo', 'Kerjo'),
(16, 'Matesih', 'Matesih'),
(17, 'Mojogedang1', 'Mojogedang'),
(18, 'Mojogedang2', 'Mojogedang'),
(19, 'Ngargoyoso', 'Ngargoyoso'),
(20, 'Tasikmadu', 'Tasikmadu'),
(21, 'Tawangmangu', 'Tawangmangu');

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
  MODIFY `id_pakai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `detail_penerimaan`
--
ALTER TABLE `detail_penerimaan`
  MODIFY `id_detailpenerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `id_pemakaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id_penerimaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id_puskesmas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
