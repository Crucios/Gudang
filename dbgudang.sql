-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 09:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kuantitas` int(10) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kuantitas`, `id_rak`, `level`) VALUES
(7, 'Ikan', 5, 169, 1),
(8, 'Ikan', 0, 169, 2),
(9, 'Ikan', 0, 170, 1),
(10, 'Ikan', 15, 170, 2),
(11, 'Ikan', 0, 171, 1),
(12, 'Ikan', 0, 171, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rak`
--

CREATE TABLE `detail_rak` (
  `id_detailrak` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grup_rak`
--

CREATE TABLE `grup_rak` (
  `id_gruprak` int(11) NOT NULL,
  `nama_grup` varchar(30) NOT NULL,
  `color` varchar(10) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `jumlah_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grup_rak`
--

INSERT INTO `grup_rak` (`id_gruprak`, `nama_grup`, `color`, `id_gudang`, `jumlah_level`) VALUES
(29, 'botol', '#39a937', 32, 0),
(30, 'kertas', '#ddbf27', 32, 0),
(31, 'kayu', '#7b6d28', 32, 0),
(32, 'plastik', '#c5cedd', 32, 0),
(33, 'wow', '#d17a83', 33, 0),
(35, 'PINTU', '#fcba03', 32, 0),
(36, 'LINTASAN', '#c4c7b5', 32, 0),
(37, 'PINTU', '#fcba03', 35, 0),
(38, 'COKLAT', '#a04118', 35, 0),
(39, 'AYAM', '#fff1e6', 35, 0),
(40, 'LINTASAN', '#c4c7b5', 35, 0),
(41, 'PINTU', '#fcba03', 35, 0),
(42, 'IKAN', '#9bb441', 35, 0),
(43, 'LINTASAN', '#c4c7b5', 35, 0),
(44, 'Pintu', '#fcba03', 36, 0),
(45, 'Ikan', '#edc4b3', 36, 2),
(46, 'Ayam', '#d54f15', 36, 2),
(47, 'Botol', '#4ed063', 36, 2),
(48, 'Ikan', '#d28260', 33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `ukuran_x` int(11) NOT NULL,
  `ukuran_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama`, `alamat`, `username`, `ukuran_x`, `ukuran_y`) VALUES
(32, 'cabang 2', 'dekat', '', 10, 10),
(33, 'cabang 3', 'aaaaa', '', 20, 20),
(35, 'cabang 4', 'cccc', '', 10, 10),
(36, 'cabang 5', 'dddd', '', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `koordinat_x` int(11) NOT NULL,
  `koordinat_y` int(11) NOT NULL,
  `posisi_urutan` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT 0,
  `id_gruprak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `koordinat_x`, `koordinat_y`, `posisi_urutan`, `kapasitas`, `id_gruprak`) VALUES
(49, 1, 1, 11, 0, 29),
(50, 1, 2, 21, 0, 29),
(51, 1, 3, 31, 0, 29),
(52, 1, 4, 41, 0, 29),
(53, 1, 5, 51, 0, 29),
(54, 7, 1, 17, 0, 30),
(55, 7, 2, 27, 0, 30),
(56, 7, 3, 37, 0, 30),
(57, 7, 4, 47, 0, 30),
(58, 7, 5, 57, 0, 30),
(59, 4, 1, 14, 0, 31),
(60, 4, 2, 24, 0, 31),
(61, 4, 3, 34, 0, 31),
(62, 4, 4, 44, 0, 31),
(63, 4, 5, 54, 0, 31),
(64, 1, 7, 71, 0, 32),
(65, 2, 7, 72, 0, 32),
(66, 3, 7, 73, 0, 32),
(67, 5, 7, 75, 0, 32),
(68, 4, 7, 74, 0, 32),
(69, 6, 7, 76, 0, 32),
(70, 7, 7, 77, 0, 32),
(71, 2, 1, 22, 0, 33),
(72, 3, 1, 23, 0, 33),
(73, 4, 1, 24, 0, 33),
(74, 5, 1, 25, 0, 33),
(75, 2, 4, 82, 0, 33),
(76, 3, 4, 83, 0, 33),
(77, 4, 4, 84, 0, 33),
(78, 5, 4, 85, 0, 33),
(82, 0, 0, 0, 0, 35),
(83, 0, 1, 10, 0, 36),
(84, 0, 2, 20, 0, 36),
(85, 0, 3, 30, 0, 36),
(86, 0, 4, 40, 0, 36),
(87, 0, 5, 50, 0, 36),
(88, 1, 0, 1, 0, 36),
(89, 2, 0, 2, 0, 36),
(90, 2, 1, 12, 0, 36),
(91, 2, 2, 22, 0, 36),
(92, 2, 3, 32, 0, 36),
(93, 2, 4, 42, 0, 36),
(94, 2, 5, 52, 0, 36),
(95, 2, 6, 62, 0, 36),
(96, 1, 6, 61, 0, 36),
(97, 0, 6, 60, 0, 36),
(98, 0, 0, 0, 0, 37),
(99, 2, 2, 22, 0, 38),
(100, 2, 3, 32, 0, 38),
(101, 2, 4, 42, 0, 38),
(102, 2, 5, 52, 0, 38),
(103, 3, 5, 53, 0, 38),
(104, 3, 4, 43, 0, 38),
(105, 3, 3, 33, 0, 38),
(106, 3, 2, 23, 0, 38),
(107, 7, 2, 27, 0, 39),
(108, 7, 3, 37, 0, 39),
(109, 7, 4, 47, 0, 39),
(110, 7, 5, 57, 0, 39),
(111, 0, 1, 10, 0, 40),
(112, 1, 1, 11, 0, 40),
(113, 1, 2, 21, 0, 40),
(114, 1, 3, 31, 0, 40),
(115, 1, 4, 41, 0, 40),
(116, 1, 5, 51, 0, 40),
(117, 1, 6, 61, 0, 40),
(118, 2, 6, 62, 0, 40),
(119, 3, 6, 63, 0, 40),
(120, 4, 6, 64, 0, 40),
(121, 4, 5, 54, 0, 40),
(122, 4, 3, 34, 0, 40),
(123, 4, 2, 24, 0, 40),
(124, 4, 4, 44, 0, 40),
(125, 5, 2, 25, 0, 40),
(126, 6, 2, 26, 0, 40),
(127, 6, 3, 36, 0, 40),
(128, 6, 4, 46, 0, 40),
(129, 6, 5, 56, 0, 40),
(130, 6, 6, 66, 0, 40),
(131, 7, 6, 67, 0, 40),
(132, 8, 6, 68, 0, 40),
(133, 8, 5, 58, 0, 40),
(134, 8, 3, 38, 0, 40),
(135, 8, 2, 28, 0, 40),
(136, 8, 4, 48, 0, 40),
(137, 2, 1, 12, 0, 40),
(138, 3, 1, 13, 0, 40),
(139, 4, 1, 14, 0, 40),
(140, 5, 1, 15, 0, 40),
(141, 6, 1, 16, 0, 40),
(142, 7, 1, 17, 0, 40),
(143, 8, 1, 18, 0, 40),
(144, 1, 0, 1, 0, 41),
(145, 2, 7, 72, 0, 42),
(146, 4, 7, 74, 0, 42),
(147, 3, 7, 73, 0, 42),
(148, 1, 7, 71, 0, 42),
(149, 5, 3, 35, 0, 43),
(150, 5, 4, 45, 0, 43),
(151, 5, 5, 55, 0, 43),
(152, 5, 6, 65, 0, 43),
(153, 0, 0, 0, 0, 44),
(154, 1, 2, 21, 0, 45),
(155, 2, 2, 22, 0, 45),
(156, 3, 2, 23, 0, 45),
(157, 3, 3, 33, 0, 45),
(158, 2, 3, 32, 0, 45),
(159, 1, 3, 31, 0, 45),
(160, 6, 2, 26, 0, 46),
(161, 6, 3, 36, 0, 46),
(162, 6, 4, 46, 0, 46),
(163, 7, 2, 27, 0, 46),
(164, 7, 3, 37, 0, 46),
(165, 7, 4, 47, 0, 46),
(166, 1, 6, 61, 0, 47),
(167, 2, 6, 62, 0, 47),
(168, 3, 6, 63, 0, 47),
(169, 8, 1, 28, 0, 48),
(170, 8, 2, 48, 0, 48),
(171, 8, 3, 68, 0, 48);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `type`) VALUES
('a', '$2y$10$JPGrbbujml0412fbxwbQGeSAr0AYNxILrQCOlxyAVUPTXhjws.N2q', 'a@gmail.com', 0),
('admin', 'admin01', 'admingudang@gmail.com', 0),
('bayu', 'bayu123', 'bayu@gmail.com', 1),
('wow', 'wow123', 'wow@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_rak`
--
ALTER TABLE `detail_rak`
  ADD PRIMARY KEY (`id_detailrak`);

--
-- Indexes for table `grup_rak`
--
ALTER TABLE `grup_rak`
  ADD PRIMARY KEY (`id_gruprak`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_rak`
--
ALTER TABLE `detail_rak`
  MODIFY `id_detailrak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grup_rak`
--
ALTER TABLE `grup_rak`
  MODIFY `id_gruprak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
