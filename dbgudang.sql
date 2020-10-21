-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 12:21 PM
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
  `id_detailrak` int(11) NOT NULL
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
  `nama_grup` int(30) NOT NULL,
  `color` varchar(10) NOT NULL,
  `id_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(22, 'q', 'q', '', 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `koordinat_x` int(11) NOT NULL,
  `koordinat_y` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT 0,
  `id_gruprak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_gruprak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
