-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 04:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `id_grup_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grup_rak`
--

INSERT INTO `grup_rak` (`id_gruprak`, `nama_grup`, `color`, `id_gudang`) VALUES
(15, 'rak a', '#7a8dd1', 31),
(16, 'rak b', '#5bcfd7', 31),
(17, 'rak c', '#5bcfd7', 31),
(18, 'rak a', '#7a8dd1', 31),
(19, 'rak b', '#5bcfd7', 31),
(20, 'rak c', '#5bcfd7', 31),
(21, 'aaa', '#d17a83', 31),
(22, 'bb', '#419f85', 31),
(23, 'cc', '#8b9f41', 31),
(24, 'aa', '#8b9f41', 31),
(25, 'bb', '#419f99', 31),
(26, 'aa', '#d17a83', 31),
(27, 'a', '#d17a83', 31),
(28, 'a', '#d17a83', 31);

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
(1, 'gudang percobaan', 'di tengah hutan', 'bayu', 20, 30),
(3, '', '', '', 1, 2),
(4, '', '', '', 10, 10),
(5, '', '', '', 3, 3),
(6, 'A', 'aa', '', 2, 3),
(7, 'A', 'aa', '', 2, 3),
(8, 'A', 'aa', '', 5, 3),
(9, 'A', 'aa', '', 5, 3),
(10, '', '', '', 3, 3),
(11, 'aa', '223', '', 23, 23),
(12, 'aa', '223', '', 23, 23),
(13, 'a', '1', '', 2, 3),
(14, 'a', 'aa', '', 3, 3),
(15, 'a', 'aa', '', 3, 3),
(16, 'a', 'aa', '', 3, 3),
(17, 'a', 'aa', '', 3, 4),
(18, 'aa', 'a', '', 4, 5),
(19, 'aa', 'df', '', 4, 6),
(20, 'a', '2', '', 3, 4),
(21, 'a', '2', '', 3, 15),
(22, 'q', 'q', '', 15, 4),
(23, 'a', 'a', '', 4, 4),
(24, 'a', 'a', '', 3, 4),
(25, 'a', 'a', '', 3, 3),
(26, 'adf', 'a', '', 10, 3),
(27, 'a', 'a', '', 3, 5),
(28, '234', 'a', '', 3, 5),
(29, '234', 'a', '', 3, 10),
(30, 'a', 'a', '', 5, 15),
(31, 'a', 'a', '', 5, 7);

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
(22, 0, 0, 0, 0, 15),
(23, 1, 0, 1, 0, 15),
(24, 2, 0, 2, 0, 16),
(25, 3, 0, 3, 0, 16),
(26, 4, 0, 4, 0, 17),
(27, 0, 1, 5, 0, 17),
(28, 0, 0, 0, 0, 18),
(29, 1, 0, 1, 0, 18),
(30, 2, 0, 2, 0, 19),
(31, 3, 0, 3, 0, 19),
(32, 4, 0, 4, 0, 20),
(33, 0, 1, 5, 0, 20),
(34, 0, 0, 0, 0, 21),
(35, 1, 0, 1, 0, 21),
(36, 2, 0, 2, 0, 22),
(37, 3, 0, 3, 0, 22),
(38, 4, 0, 4, 0, 23),
(39, 0, 1, 5, 0, 23),
(40, 1, 1, 6, 0, 23),
(41, 2, 1, 7, 0, 23),
(42, 0, 0, 0, 0, 24),
(43, 2, 0, 2, 0, 24),
(44, 3, 0, 3, 0, 25),
(45, 4, 0, 4, 0, 25),
(46, 1, 0, 1, 0, 26),
(47, 2, 0, 2, 0, 27),
(48, 4, 0, 4, 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `nama`) VALUES
('a', '$2y$10$JPGrbbujml0412fbxwbQGeSAr0AYNxILrQCOlxyAVUPTXhjws.N2q', 'a@gmail.com', 'a');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_rak`
--
ALTER TABLE `detail_rak`
  MODIFY `id_detailrak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grup_rak`
--
ALTER TABLE `grup_rak`
  MODIFY `id_gruprak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
