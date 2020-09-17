-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 10:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coronajepara`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `idanyar` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `pp` int(100) NOT NULL,
  `odp` int(100) NOT NULL,
  `otg` int(100) NOT NULL,
  `pdp` int(100) NOT NULL,
  `positif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`idanyar`, `kecamatan`, `pp`, `odp`, `otg`, `pdp`, `positif`) VALUES
(1, 'kedung', 857, 188, 0, 21, 40),
(2, 'pecangaan', 1050, 52, 0, 12, 26),
(3, 'kalinyamatan', 259, 20, 0, 10, 10),
(4, 'welahan', 1401, 56, 0, 16, 28),
(5, 'mayong', 977, 64, 0, 16, 7),
(6, 'nalumsari', 1703, 65, 0, 13, 8),
(7, 'batealit', 574, 45, 0, 7, 26),
(8, 'tahunan', 714, 35, 0, 7, 15),
(9, 'jepara', 1356, 44, 0, 15, 33),
(10, 'bangsri', 2015, 47, 0, 9, 15),
(12, 'keling', 1393, 137, 0, 9, 1),
(13, 'karimunjawa', 281, 1, 0, 0, 0),
(14, 'kembang', 2177, 18, 0, 6, 4),
(15, 'donorojo', 1752, 41, 0, 5, 0),
(16, 'pakisaji', 564, 59, 0, 0, 7),
(17, 'luar daerah', 0, 6, 0, 20, 9);

-- --------------------------------------------------------

--
-- Table structure for table `datacorona`
--

CREATE TABLE `datacorona` (
  `id` int(20) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `pp` int(15) NOT NULL,
  `odp` int(20) NOT NULL,
  `otg` int(20) NOT NULL,
  `pdp` int(20) NOT NULL,
  `positif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datacorona`
--

INSERT INTO `datacorona` (`id`, `kecamatan`, `pp`, `odp`, `otg`, `pdp`, `positif`) VALUES
(1, 'kedung', 857, 188, 2, 21, 40),
(19, 'pecangaan', 1050, 52, 10, 12, 26),
(20, 'kalinyamatan', 259, 20, 0, 10, 10),
(21, 'welahan', 1401, 56, 0, 16, 28),
(22, 'mayong', 977, 64, 0, 16, 7),
(23, 'nalumsari', 1703, 65, 0, 13, 8),
(24, 'batealit', 574, 45, 0, 7, 26),
(25, 'tahunan', 714, 35, 0, 7, 15),
(26, 'jepara', 1356, 44, 21, 15, 33),
(27, 'mlonggo', 1436, 46, 0, 15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`) VALUES
(1, 'Anang Ma\'ruf', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Faisal Bama Sasciki', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, 'faisal', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`idanyar`);

--
-- Indexes for table `datacorona`
--
ALTER TABLE `datacorona`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `idanyar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `datacorona`
--
ALTER TABLE `datacorona`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
