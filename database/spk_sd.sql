-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 05:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_sd`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` bigint(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `sandi` varchar(20) NOT NULL,
  `level` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`, `keterangan`, `sandi`, `level`) VALUES
(2147765667110040, 'Agus Rifai', 'Guru Kelas 5', 'agus', 0),
(196306051984051009, 'Samiran', 'Kepala Sekolah', 'samiran1234', 1),
(196505291992032002, 'Ambaryati', 'Kelas 1', 'ambaryati', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(10) NOT NULL,
  `id_guru` bigint(25) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `id_guru`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tanggal_lahir`, `alamat`) VALUES
(1, 196505291992032002, 113635038, 'Agustin Citra Nuraini', 'P', '2011-08-07', 'Semaitan'),
(2, 196505291992032002, 112075492, 'Ahmad Fatahan Aji', 'L', '2011-11-24', 'Kayuares'),
(3, 196505291992032002, 116906810, 'Syarif Hidayatullah', 'L', '2011-08-29', 'Mendak'),
(4, 196505291992032002, 118760325, 'Ananda Farhan Aditya', 'L', '2011-07-25', 'Dekoro'),
(5, 196505291992032002, 108322912, 'Devina Anggraini', 'P', '2010-12-26', 'Gemulung'),
(6, 2147765667110040, 65539504, 'Al Farizi Taufikur Rikza', 'L', '2007-06-03', 'Mendak'),
(7, 2147765667110040, 89922034, 'Khabiburrokhman Choirul Akmal', 'L', '2007-05-09', 'Gemulung'),
(8, 2147765667110040, 82213886, 'Dina Maharani', 'P', '2007-09-07', 'Dekoro'),
(9, 2147765667110040, 87623976, 'Niken Sholikhak', 'P', '2008-05-26', 'Mendak'),
(10, 2147765667110040, 82788299, 'Rangga Putra Hermawan', 'L', '2008-05-12', 'Semaitan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(10) NOT NULL,
  `kriteria` text NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `kriteria`, `bobot`) VALUES
(1, 'Akhlak', 0.3),
(2, 'Sikap', 0.3),
(3, 'Nilai Rapot', 0.3),
(4, 'Kuesioner', 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_normal`
--

CREATE TABLE `tb_normal` (
  `id_normal` int(11) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_normal`
--

INSERT INTO `tb_normal` (`id_normal`, `id_siswa`, `id_kriteria`, `normalisasi`) VALUES
(1, 1, 1, 0.889),
(2, 1, 2, 0.889),
(3, 1, 3, 0.889),
(4, 1, 4, 0.889),
(5, 2, 1, 0.889),
(6, 2, 2, 0.889),
(7, 2, 3, 0.889),
(8, 2, 4, 0.889),
(9, 3, 1, 1),
(10, 3, 2, 1),
(11, 3, 3, 1),
(12, 3, 4, 0.889),
(13, 4, 1, 0.889),
(14, 4, 2, 1),
(15, 4, 3, 1),
(16, 4, 4, 0.889),
(17, 5, 1, 1),
(18, 5, 2, 0.889),
(19, 5, 3, 0.889),
(20, 5, 4, 0.889),
(21, 6, 1, 0.889),
(22, 6, 2, 1),
(23, 6, 3, 0.889),
(24, 6, 4, 1),
(25, 7, 1, 0.889),
(26, 7, 2, 0.889),
(27, 7, 3, 1),
(28, 7, 4, 1),
(29, 8, 1, 0.889),
(30, 8, 2, 1),
(31, 8, 3, 1),
(32, 8, 4, 0.889),
(33, 9, 1, 1),
(34, 9, 2, 1),
(35, 9, 3, 1),
(36, 9, 4, 1),
(37, 10, 1, 0.889),
(38, 10, 2, 0.889),
(39, 10, 3, 0.889),
(40, 10, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rank`
--

CREATE TABLE `tb_rank` (
  `id_hasil` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rank`
--

INSERT INTO `tb_rank` (`id_hasil`, `id_siswa`, `nilai`) VALUES
(1, 1, 0.889),
(2, 2, 0.889),
(3, 3, 0.9889),
(4, 4, 0.9556),
(5, 5, 0.9223),
(6, 6, 0.9334),
(7, 7, 0.9334),
(8, 8, 0.9556),
(9, 9, 1),
(10, 10, 0.9001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_siswa_2` (`id_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tb_normal`
--
ALTER TABLE `tb_normal`
  ADD PRIMARY KEY (`id_normal`);

--
-- Indexes for table `tb_rank`
--
ALTER TABLE `tb_rank`
  ADD PRIMARY KEY (`id_hasil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
