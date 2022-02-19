-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 11:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistempakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `id` int(11) NOT NULL,
  `problems_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_uji`
--

INSERT INTO `data_uji` (`id`, `problems_id`) VALUES
(1, 1),
(2, 1),
(4, 6),
(5, 8),
(6, 8),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `data_uji_detail`
--

CREATE TABLE `data_uji_detail` (
  `id` int(11) NOT NULL,
  `code_gejala` varchar(25) NOT NULL,
  `data_uji_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_uji_detail`
--

INSERT INTO `data_uji_detail` (`id`, `code_gejala`, `data_uji_id`) VALUES
(1, 'G01', 1),
(2, 'G02', 1),
(3, 'G03', 1),
(4, 'G01', 2),
(5, 'G02', 2),
(6, 'G04', 2),
(7, 'G02', 3),
(8, 'G22', 3),
(9, 'G12', 4),
(10, 'G13', 4),
(11, 'G24', 4),
(12, 'G16', 5),
(13, 'G17', 5),
(14, 'G11', 6),
(15, 'G12', 6),
(16, 'G17', 6),
(17, 'G18', 6),
(18, 'G19', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(12) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `code`, `name`, `description`) VALUES
(1, 'G01', 'Bercak-bercak putih pada daun', 'Bercak-bercak putih pada daun adalah'),
(2, 'G02', 'Daun mengering', 'Daun mengering adalaha'),
(3, 'G03', 'Seluruh helaian daun penuh dengan korokan', 'Seluruh helaian daun penuh dengan korokan adlaah'),
(4, 'G04', 'Daun berlubang tidak beraturan', 'Daun berlubang tidak beraturan adalah'),
(5, 'G05', 'Umbi habis termakan ulat', 'Umbi habis termakan ulat adalah'),
(6, 'G06', 'Daun menjadi pipih', 'Daun menjadi pipih adalah'),
(7, 'G07', 'Ujung daun berlubang', 'Ujung daun berlubang adalah'),
(8, 'G08', 'Daun tampak mengeriting', 'Daun tampak mengeriting adlaah'),
(9, 'G09', 'Daun akan berliku', 'Daun akan berliku adlaah'),
(10, 'G10', 'Warna daun kelabu', 'Warna daun kelabua adalah'),
(11, 'G11', 'Ujung daun bengkok', 'Ujung daun bengkok adalah'),
(12, 'G12', 'Akar rusak', 'Akar rusak adlaah'),
(13, 'G13', 'Tangkai daun rusak', 'Tangkai daun rusak adlaah'),
(14, 'G14', 'Pangkal daun rusak', 'Pangkal daun rusak adalah'),
(15, 'G15', 'Bercak-bercak kekuning-kuningan', 'Bercak-bercak kekuning-kuningan adalah'),
(16, 'G16', 'Bercak Berwarna Ungu', 'Bercak Berwarna Ungu adalah'),
(17, 'G17', 'Ujung daun mengering', 'Bercak Berwarna Ungu adlaah'),
(18, 'G18', 'Umbi membusuk', 'Umbi membusuk adalah'),
(19, 'G19', 'Pangkal daun memanjang', 'Pangkal daun memanjang adalah'),
(20, 'G20', 'Tangkai daun mengering', 'Tangkai daun mengering adalah'),
(21, 'G21', 'Ujung daun berwarna puca', 'Ujung daun berwarna puca adlaah'),
(22, 'G22', 'Terdapat kumpulan titik hitam melingkar', 'Terdapat kumpulan titik hitam melingka adlaah'),
(23, 'G23', 'Pangkal daun mengering', 'Pangkal daun mengering adalah'),
(24, 'G24', 'Tangkai daun membusuk', 'Tangkai daun membusuk adlaha');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(12) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `solution` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `code`, `name`, `description`, `image`, `solution`) VALUES
(1, 'P01', 'Lalat Pengorok Daun', 'Lalat Pengorok Daun adalah', 'default.jpg', 'Solusi yang bisa dilakukan adalah'),
(2, 'P02', 'Ulat Grayak', 'Ulat Grayak adalah', 'default.jpg', 'cara mengatasinya Ulat Grayak adalah'),
(3, 'P03', 'Ulat Bawang', 'Ulat Bawang adalah', 'default.jpg', 'cara mengatasi Ulat Bawang'),
(4, 'P04', 'Hama Putih Atau Trips', 'Hama Putih Atau Trips adalah', 'default.jpg', 'cara mengatasi Hama Putih Atau Trips'),
(5, 'P05', 'Orong-Orong', 'Orong-Orong adalah', 'default.jpg', 'cara mengatasi Orong-Orong'),
(6, 'P06', 'Ulat Tanah', 'Ulat Tanah adalah', 'default.jpg', 'Cara mengatasi Ulat Tanah'),
(7, 'P07', 'Penyakit Ngelumpruk Atau Leumpeuh', 'Penyakit Ngelumpruk Atau Leumpeuh adalah', 'default.jpg', 'cara mengatasi Penyakit Ngelumpruk Atau Leumpeuh'),
(8, 'P08', 'Bercak ungu atau Trotol', 'Bercak ungu atau Trotol adalah', 'default.jpg', 'cara mengatasi Bercak ungu atau Trotol'),
(9, 'P09', 'Penyakit Moler', 'Penyakit Moler adalah', 'default.jpg', 'cara mengatasi Penyakit Moler'),
(10, 'P10', 'Embun Buluk', 'Embun Buluk adalah', 'default.jpg', 'cara mengatasi Embun Buluk'),
(11, 'P11', 'Antraknosa', 'Antraknosa adalah', 'default.jpg', 'cara mengatasi Antraknosa'),
(12, 'P12', 'Bercak Daun', 'Bercak Daun adlaah', 'default.jpg', 'cara mengatasi Bercak Daun'),
(13, 'P13', 'Busuk leher akar', 'Busuk leher akar adlaah', 'default.jpg', 'cara megatasi Busuk leher akar');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(12) NOT NULL,
  `code` varchar(25) NOT NULL,
  `belief` double NOT NULL,
  `problems_id` int(12) NOT NULL,
  `gejala_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `code`, `belief`, `problems_id`, `gejala_id`) VALUES
(1, 'R01', 0.5, 1, 1),
(2, 'R02', 0.5, 3, 3),
(3, 'R03', 0.25, 1, 2),
(4, 'R04', 0.25, 3, 2),
(5, 'R05', 0.25, 5, 2),
(6, 'R06', 0.25, 11, 2),
(7, 'R07', 0.85, 1, 3),
(8, 'R08', 0.85, 2, 4),
(9, 'R09', 0.85, 2, 5),
(10, 'R10', 0.85, 2, 6),
(11, 'R11', 0.85, 3, 7),
(12, 'R12', 0.25, 4, 8),
(13, 'R13', 0.85, 4, 9),
(14, 'R14', 0.85, 4, 10),
(15, 'R15', 0.25, 4, 11),
(16, 'R16', 0.25, 5, 12),
(17, 'R17', 0.25, 9, 12),
(18, 'R18', 0.25, 13, 12),
(19, 'R19', 0.85, 6, 10),
(20, 'R20', 0.85, 6, 14),
(21, 'R21', 0.85, 7, 15),
(22, 'R22', 0.85, 12, 15),
(23, 'R23', 1, 8, 16),
(24, 'R24', 0.85, 8, 17),
(25, 'R25', 0.85, 8, 18),
(26, 'R26', 0.85, 9, 18),
(27, 'R27', 0.5, 9, 19),
(28, 'R28', 0.85, 10, 20),
(29, 'R29', 0.85, 10, 21),
(30, 'R30', 1, 11, 22),
(31, 'R31', 0.5, 12, 23),
(32, 'R32', 0.5, 13, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(10) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tanggal_registrasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `alamat`, `no_telp`, `tanggal_registrasi`) VALUES
(1, 'Ari Sumardi', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'Tangerang', '085863727216', '2021-12-22 06:42:10'),
(2, 'Dimas Arestu', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2', 'Pekanbaru', '087223727211', '2021-12-22 06:42:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `problems_id` (`problems_id`);

--
-- Indexes for table `data_uji_detail`
--
ALTER TABLE `data_uji_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_uji_id` (`data_uji_id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `problem_id` (`problems_id`),
  ADD KEY `evidences_id` (`gejala_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_uji_detail`
--
ALTER TABLE `data_uji_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD CONSTRAINT `data_uji_ibfk_1` FOREIGN KEY (`problems_id`) REFERENCES `problems` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `data_uji_detail`
--
ALTER TABLE `data_uji_detail`
  ADD CONSTRAINT `data_uji_detail_ibfk_1` FOREIGN KEY (`data_uji_id`) REFERENCES `data_uji` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`problems_id`) REFERENCES `problems` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
