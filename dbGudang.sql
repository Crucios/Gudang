-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 03:00 AM
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
  `level` int(1) NOT NULL,
  `berat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kuantitas`, `id_rak`, `level`, `berat`) VALUES
(7, 'Ikan', 5, 169, 1, 1),
(8, 'Ikan', 0, 169, 2, 1),
(9, 'Ikan', 0, 170, 1, 1),
(10, 'Ikan', 15, 170, 2, 1),
(11, 'Ikan', 0, 171, 1, 1),
(12, 'Ikan', 0, 171, 2, 1),
(13, 'Susu', 5, 173, 1, 1),
(14, 'Susu', 0, 173, 2, 1),
(15, 'Susu', 0, 174, 1, 1),
(16, 'Susu', 0, 174, 2, 1),
(17, 'Susu', 0, 175, 1, 1),
(18, 'Susu', 0, 175, 2, 1),
(19, 'Kopi', 5, 197, 1, 1),
(20, 'Kopi', 10, 197, 2, 1),
(21, 'Kopi', 0, 198, 1, 1),
(22, 'Kopi', 10, 198, 2, 1),
(23, 'Kopi', 0, 199, 1, 1),
(24, 'Kopi', 0, 199, 2, 1),
(25, 'Kopi', 0, 200, 1, 1),
(26, 'Kopi', 10, 200, 2, 1),
(27, 'Kopi', 0, 201, 1, 1),
(28, 'Kopi', 0, 201, 2, 1),
(29, 'Kopi', 0, 202, 1, 1),
(30, 'Kopi', 0, 202, 2, 1),
(31, 'Susu', 0, 203, 1, 1),
(32, 'Susu', 0, 203, 2, 1),
(33, 'Susu', 0, 203, 3, 1),
(34, 'Susu', 0, 204, 1, 1),
(35, 'Susu', 0, 204, 2, 1),
(36, 'Susu', 0, 204, 3, 1),
(37, 'Susu', 0, 205, 1, 1),
(38, 'Susu', 0, 205, 2, 1),
(39, 'Susu', 0, 205, 3, 1),
(40, 'Susu', 0, 206, 1, 1),
(41, 'Susu', 0, 206, 2, 1),
(42, 'Susu', 0, 206, 3, 1),
(43, 'Susu', 0, 207, 1, 1),
(44, 'Susu', 0, 207, 2, 1),
(45, 'Susu', 0, 207, 3, 1),
(46, 'Ikan', 0, 257, 1, 1),
(47, 'Ikan', 0, 257, 2, 1),
(48, 'Ikan', 0, 258, 1, 1),
(49, 'Ikan', 0, 258, 2, 1),
(50, 'Ikan', 0, 259, 1, 1),
(51, 'Ikan', 0, 259, 2, 1),
(52, 'Ikan', 0, 260, 1, 1),
(53, 'Ikan', 0, 260, 2, 1),
(54, 'Ikan', 0, 261, 1, 1),
(55, 'Ikan', 0, 261, 2, 1),
(56, 'Ikan', 0, 262, 1, 1),
(57, 'Ikan', 0, 262, 2, 1),
(58, 'Teh', 0, 303, 1, 1),
(59, 'Teh', 0, 303, 2, 1),
(60, 'Teh', 0, 304, 1, 1),
(61, 'Teh', 0, 304, 2, 1),
(62, 'Teh', 0, 305, 1, 1),
(63, 'Teh', 0, 305, 2, 1),
(64, 'Teh', 0, 306, 1, 1),
(65, 'Teh', 0, 306, 2, 1),
(66, 'Teh', 0, 307, 1, 1),
(67, 'Teh', 0, 307, 2, 1),
(68, 'Teh', 0, 308, 1, 1),
(69, 'Teh', 0, 308, 2, 1),
(70, 'Biskuit', 0, 309, 1, 1),
(71, 'Biskuit', 0, 309, 2, 1),
(72, 'Biskuit', 0, 309, 3, 1),
(73, 'Biskuit', 0, 310, 1, 1),
(74, 'Biskuit', 0, 310, 2, 1),
(75, 'Biskuit', 0, 310, 3, 1),
(76, 'Biskuit', 0, 311, 1, 1),
(77, 'Biskuit', 0, 311, 2, 1),
(78, 'Biskuit', 0, 311, 3, 1),
(92, 'lemari kayu', 0, 372, 1, 1),
(101, 'lemari besi', 5, 372, 2, 1),
(102, 'lemari kayu ', 2, 372, 2, 1),
(103, 'lemari plastik', 1, 372, 1, 1),
(104, 'lemari kayu', 3, 375, 1, 1),
(105, 'lemari besi', 2, 376, 2, 1),
(106, 'lemari plastik', 4, 373, 1, 1),
(107, 'meja komputer', 2, 421, 1, 1),
(108, 'meja komputer', 3, 421, 2, 1),
(109, 'meja rias', 2, 424, 1, 1),
(110, 'toblerone', 30, 425, 1, 1),
(111, 'Meja Kayu', 2, 428, 1, 1),
(112, 'Meja Besi', 3, 429, 1, 1),
(113, 'Meja Rias', 2, 428, 2, 1),
(114, 'Meja Komputer', 5, 429, 2, 2),
(115, 'Meja Rias', 2, 429, 2, 2);

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
(52, 'Pintu', '#fcba03', 38, 0),
(53, 'Kopi', '#ad6343', 38, 2),
(54, 'Susu', '#ddbea9', 38, 3),
(55, 'lintasan', '#c4c7b5', 38, 0),
(56, 'Pintu', '#fcba03', 39, 0),
(57, 'Ikan', '#58a53b', 39, 2),
(58, 'lintasan', '#c4c7b5', 39, 0),
(60, 'Teh', '#6fcc5c', 38, 2),
(65, 'Pintu', '#fcba03', 41, 0),
(66, 'Nugget', '#dd5e27', 41, 2),
(67, 'lintasan', '#c4c7b5', 41, 0),
(68, 'Pintu', '#fcba03', 42, 0),
(69, 'Lemari', '#cb997e', 42, 2),
(70, 'lintasan', '#c4c7b5', 42, 0),
(71, 'Meja', '#683a27', 42, 2),
(72, 'Coklat', '#a07d6e', 38, 3),
(73, 'Meja', '#ac7f6c', 43, 2),
(74, 'Pintu', '#fcba03', 43, 0),
(75, 'Lemari', '#789f3c', 43, 3),
(76, 'lintasan', '#c4c7b5', 43, 0),
(77, 'coba', '#b7b7a4', 43, 2),
(78, 'coba2', '#969622', 43, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ukuran_x` int(11) NOT NULL,
  `ukuran_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama`, `alamat`, `ukuran_x`, `ukuran_y`) VALUES
(38, 'Gudang Mantap', 'Jl. Ahmad Yani 110', 10, 10),
(39, 'Gudang Seafood', 'Jl Kopo Cirangrang 583, Bandung, Jawa Barat', 20, 20),
(41, 'Gudang BestFood', 'Jl Kyai Caringin 29-31 Wisma Abadi', 10, 10),
(42, 'Ace Hardware', 'Jl Letda Nasir 45 RT 001/02', 10, 10),
(43, 'Gudang Furniture', 'Jl Letjen South Parman Kav 76 Wisma Calindra', 20, 20),
(44, 'Gudang Coba', 'Jl Jend Sudirman Kav 29-31 World Trade Center', 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idrak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `username`, `barang`, `status`, `waktu`, `jumlah`, `idrak`) VALUES
(6, 'bayu', 'Kopi', 'Ambil', '2020-11-25 21:39:53', 5, 'R.197'),
(7, 'bayu', 'lemari kayu', 'Ambil', '2020-11-29 17:59:31', 3, 'R.372'),
(8, 'bayu', 'lemari kayu', 'Ambil', '2020-11-29 18:38:23', 1, 'R.372'),
(9, 'bayu', 'lemari kayu ', 'Ambil', '2020-11-29 18:43:44', 1, 'R.372'),
(10, 'bayu', 'Kopi', 'Ambil', '2020-11-29 19:27:10', 1, 'R.197'),
(11, 'bayu', 'Kopi', 'Ambil', '2020-11-29 19:51:01', 1, 'R.197'),
(12, 'bayu', 'aku', 'Tambah', '2020-11-30 17:00:31', 200, 'R.197'),
(13, 'bayu', 'auww', 'Tambah', '2020-11-30 17:07:56', 20, 'R.198'),
(14, 'bayu', 'aku', 'Ambil', '2020-11-30 17:10:30', 20, 'R.197'),
(15, 'bayu', 'aku', 'Ambil', '2020-11-30 17:12:57', 1, 'R.197'),
(0, 'admin', 'Meja Besi', 'Tambah', '2020-12-01 18:05:11', 5, 'R.429'),
(0, 'admin', 'Meja Besi', 'Ambil', '2020-12-01 18:06:38', 2, 'R.429'),
(0, 'admin', 'Meja Kayu', 'Ambil', '2020-12-01 18:06:38', 3, 'R.428');

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
(196, 0, 0, 0, 0, 52),
(197, 2, 2, 22, 0, 53),
(198, 2, 3, 32, 0, 53),
(199, 2, 4, 42, 0, 53),
(200, 3, 2, 23, 0, 53),
(201, 3, 3, 33, 0, 53),
(202, 3, 4, 43, 0, 53),
(203, 6, 2, 26, 0, 54),
(204, 6, 3, 36, 0, 54),
(205, 6, 4, 46, 0, 54),
(206, 7, 2, 27, 0, 54),
(207, 8, 2, 28, 0, 54),
(208, 0, 1, 10, 0, 55),
(209, 1, 1, 11, 0, 55),
(210, 1, 0, 1, 0, 55),
(211, 2, 0, 2, 0, 55),
(212, 2, 1, 12, 0, 55),
(213, 3, 0, 3, 0, 55),
(214, 3, 1, 13, 0, 55),
(215, 4, 0, 4, 0, 55),
(216, 4, 1, 14, 0, 55),
(217, 1, 2, 21, 0, 55),
(218, 0, 2, 20, 0, 55),
(219, 0, 3, 30, 0, 55),
(220, 1, 3, 31, 0, 55),
(221, 4, 2, 24, 0, 55),
(222, 5, 0, 5, 0, 55),
(223, 5, 1, 15, 0, 55),
(224, 5, 2, 25, 0, 55),
(225, 6, 0, 6, 0, 55),
(226, 6, 1, 16, 0, 55),
(227, 7, 0, 7, 0, 55),
(228, 7, 1, 17, 0, 55),
(229, 8, 0, 8, 0, 55),
(230, 8, 1, 18, 0, 55),
(231, 9, 0, 9, 0, 55),
(232, 9, 1, 19, 0, 55),
(233, 9, 2, 29, 0, 55),
(234, 9, 3, 39, 0, 55),
(235, 8, 3, 38, 0, 55),
(236, 7, 3, 37, 0, 55),
(237, 7, 4, 47, 0, 55),
(238, 8, 4, 48, 0, 55),
(239, 9, 4, 49, 0, 55),
(240, 5, 3, 35, 0, 55),
(241, 4, 3, 34, 0, 55),
(242, 5, 4, 45, 0, 55),
(243, 4, 4, 44, 0, 55),
(244, 9, 5, 59, 0, 55),
(245, 8, 5, 58, 0, 55),
(246, 7, 5, 57, 0, 55),
(247, 6, 5, 56, 0, 55),
(248, 5, 5, 55, 0, 55),
(249, 4, 5, 54, 0, 55),
(250, 3, 5, 53, 0, 55),
(251, 2, 5, 52, 0, 55),
(252, 1, 5, 51, 0, 55),
(253, 0, 5, 50, 0, 55),
(254, 0, 4, 40, 0, 55),
(255, 1, 4, 41, 0, 55),
(256, 0, 0, 0, 0, 56),
(257, 4, 1, 24, 0, 57),
(258, 5, 1, 25, 0, 57),
(259, 6, 1, 26, 0, 57),
(260, 6, 2, 46, 0, 57),
(261, 5, 2, 45, 0, 57),
(262, 4, 2, 44, 0, 57),
(263, 4, 0, 4, 0, 58),
(264, 5, 0, 5, 0, 58),
(265, 6, 0, 6, 0, 58),
(266, 3, 0, 3, 0, 58),
(267, 7, 0, 7, 0, 58),
(268, 8, 0, 8, 0, 58),
(269, 9, 0, 9, 0, 58),
(270, 10, 0, 10, 0, 58),
(271, 11, 0, 11, 0, 58),
(272, 12, 0, 12, 0, 58),
(273, 13, 0, 13, 0, 58),
(274, 14, 0, 14, 0, 58),
(275, 15, 0, 15, 0, 58),
(276, 16, 0, 16, 0, 58),
(277, 17, 0, 17, 0, 58),
(278, 18, 0, 18, 0, 58),
(279, 2, 0, 2, 0, 58),
(280, 1, 0, 1, 0, 58),
(281, 19, 0, 19, 0, 58),
(284, 0, 6, 60, 0, 55),
(285, 1, 6, 61, 0, 55),
(286, 0, 7, 70, 0, 55),
(287, 1, 7, 71, 0, 55),
(288, 0, 8, 80, 0, 55),
(289, 1, 8, 81, 0, 55),
(290, 0, 9, 90, 0, 55),
(291, 1, 9, 91, 0, 55),
(292, 4, 6, 64, 0, 55),
(293, 4, 7, 74, 0, 55),
(294, 4, 8, 84, 0, 55),
(295, 4, 9, 94, 0, 55),
(296, 3, 9, 93, 0, 55),
(297, 2, 9, 92, 0, 55),
(298, 5, 9, 95, 0, 55),
(299, 6, 6, 66, 0, 55),
(300, 6, 7, 76, 0, 55),
(301, 6, 8, 86, 0, 55),
(302, 6, 9, 96, 0, 55),
(303, 2, 6, 62, 0, 60),
(304, 2, 7, 72, 0, 60),
(305, 2, 8, 82, 0, 60),
(306, 3, 8, 83, 0, 60),
(307, 3, 7, 73, 0, 60),
(308, 3, 6, 63, 0, 60),
(346, 0, 0, 0, 0, 65),
(347, 2, 2, 22, 0, 66),
(348, 2, 3, 32, 0, 66),
(349, 3, 2, 23, 0, 66),
(350, 3, 3, 33, 0, 66),
(351, 1, 0, 1, 0, 67),
(352, 1, 1, 11, 0, 67),
(353, 0, 1, 10, 0, 67),
(354, 2, 1, 12, 0, 67),
(355, 3, 1, 13, 0, 67),
(356, 2, 0, 2, 0, 67),
(357, 3, 0, 3, 0, 67),
(358, 4, 0, 4, 0, 67),
(359, 4, 1, 14, 0, 67),
(360, 4, 2, 24, 0, 67),
(361, 4, 3, 34, 0, 67),
(362, 4, 4, 44, 0, 67),
(363, 3, 4, 43, 0, 67),
(364, 2, 4, 42, 0, 67),
(365, 1, 4, 41, 0, 67),
(366, 1, 3, 31, 0, 67),
(367, 1, 2, 21, 0, 67),
(368, 0, 2, 20, 0, 67),
(369, 0, 3, 30, 0, 67),
(370, 0, 4, 40, 0, 67),
(371, 0, 0, 0, 0, 68),
(372, 2, 1, 12, 0, 69),
(373, 2, 2, 22, 0, 69),
(375, 3, 1, 13, 0, 69),
(376, 3, 2, 23, 0, 69),
(377, 3, 3, 33, 0, 69),
(378, 1, 0, 1, 0, 70),
(379, 0, 1, 10, 0, 70),
(380, 1, 1, 11, 0, 70),
(381, 2, 0, 2, 0, 70),
(382, 3, 0, 3, 0, 70),
(383, 4, 0, 4, 0, 70),
(384, 4, 1, 14, 0, 70),
(385, 4, 2, 24, 0, 70),
(386, 4, 4, 44, 0, 70),
(387, 4, 3, 34, 0, 70),
(388, 3, 4, 43, 0, 70),
(389, 2, 4, 42, 0, 70),
(390, 1, 4, 41, 0, 70),
(391, 1, 3, 31, 0, 70),
(392, 1, 2, 21, 0, 70),
(393, 0, 2, 20, 0, 70),
(394, 0, 3, 30, 0, 70),
(395, 0, 4, 40, 0, 70),
(396, 5, 0, 5, 0, 70),
(397, 5, 1, 15, 0, 70),
(398, 5, 2, 25, 0, 70),
(399, 5, 3, 35, 0, 70),
(400, 5, 4, 45, 0, 70),
(401, 5, 5, 55, 0, 70),
(402, 6, 5, 56, 0, 70),
(403, 7, 5, 57, 0, 70),
(404, 7, 6, 67, 0, 70),
(405, 7, 7, 77, 0, 70),
(406, 6, 7, 76, 0, 70),
(407, 5, 7, 75, 0, 70),
(408, 4, 7, 74, 0, 70),
(409, 3, 7, 73, 0, 70),
(410, 2, 7, 72, 0, 70),
(411, 2, 6, 62, 0, 70),
(412, 2, 5, 52, 0, 70),
(413, 3, 5, 53, 0, 70),
(414, 4, 5, 54, 0, 70),
(415, 0, 5, 50, 0, 70),
(416, 1, 5, 51, 0, 70),
(417, 1, 6, 61, 0, 70),
(418, 1, 7, 71, 0, 70),
(419, 0, 7, 70, 0, 70),
(420, 0, 6, 60, 0, 70),
(421, 3, 6, 63, 0, 71),
(422, 4, 6, 64, 0, 71),
(423, 5, 6, 65, 0, 71),
(424, 6, 6, 66, 0, 71),
(425, 5, 6, 65, 0, 72),
(426, 5, 7, 75, 0, 72),
(427, 5, 8, 85, 0, 72),
(428, 2, 1, 22, 0, 73),
(429, 2, 2, 42, 0, 73),
(430, 2, 3, 62, 0, 73),
(431, 3, 1, 23, 0, 73),
(432, 3, 2, 43, 0, 73),
(433, 3, 3, 63, 0, 73),
(434, 0, 0, 0, 0, 74),
(435, 6, 1, 26, 0, 75),
(436, 7, 1, 27, 0, 75),
(437, 8, 1, 28, 0, 75),
(438, 1, 0, 1, 0, 76),
(439, 1, 1, 21, 0, 76),
(440, 0, 1, 20, 0, 76),
(441, 2, 0, 2, 0, 76),
(442, 3, 0, 3, 0, 76),
(443, 4, 0, 4, 0, 76),
(444, 5, 0, 5, 0, 76),
(445, 5, 1, 25, 0, 76),
(446, 4, 1, 24, 0, 76),
(447, 1, 2, 41, 0, 76),
(448, 0, 2, 40, 0, 76),
(449, 0, 3, 60, 0, 76),
(450, 1, 3, 61, 0, 76),
(451, 6, 0, 6, 0, 76),
(452, 7, 0, 7, 0, 76),
(453, 8, 0, 8, 0, 76),
(454, 9, 0, 9, 0, 76),
(455, 9, 1, 29, 0, 76),
(456, 9, 2, 49, 0, 76),
(457, 8, 2, 48, 0, 76),
(458, 8, 3, 68, 0, 76),
(459, 9, 3, 69, 0, 76),
(460, 7, 3, 67, 0, 76),
(461, 7, 2, 47, 0, 76),
(462, 6, 2, 46, 0, 76),
(463, 6, 3, 66, 0, 76),
(464, 5, 3, 65, 0, 76),
(465, 5, 2, 45, 0, 76),
(466, 4, 2, 44, 0, 76),
(467, 4, 3, 64, 0, 76),
(468, 4, 4, 84, 0, 76),
(469, 3, 4, 83, 0, 76),
(470, 2, 4, 82, 0, 76),
(471, 1, 4, 81, 0, 76),
(472, 0, 4, 80, 0, 76),
(473, 6, 4, 86, 0, 77),
(474, 7, 4, 87, 0, 77),
(475, 11, 1, 31, 0, 78),
(476, 12, 1, 32, 0, 78),
(478, 13, 1, 33, 0, 78),
(479, 13, 2, 53, 0, 78),
(480, 12, 2, 52, 0, 78),
(481, 6, 5, 106, 0, 76),
(482, 7, 5, 107, 0, 76),
(483, 10, 0, 10, 0, 76),
(484, 11, 0, 11, 0, 76),
(485, 12, 0, 12, 0, 76),
(486, 13, 0, 13, 0, 76),
(487, 14, 0, 14, 0, 76),
(488, 14, 1, 34, 0, 76),
(489, 14, 2, 54, 0, 76);

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
('admin', '$2y$10$qqBxL7XY9MODEzefQUqJYuTvZE7Ai9IOC705A/Ru6dwwvoy42rvSC', 'admingudang@gmail.com', 0),
('bayu', 'bayu123', 'bayu@gmail.com', 1),
('nic', '$2y$10$SFhw6Bhl.QfB749z.x8wauIScAzDoCJEmw33/Y52NvRmfl7IX6D..', 'nic@gmail.com', 1),
('vincent', '$2y$10$Z1DIZxFXxzRSeIDdj3g5Fu2eUxPZRObSOctuaB5rGvfQI6kCDmuFS', 'vincent@gmail.com', 1),
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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `detail_rak`
--
ALTER TABLE `detail_rak`
  MODIFY `id_detailrak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grup_rak`
--
ALTER TABLE `grup_rak`
  MODIFY `id_gruprak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
