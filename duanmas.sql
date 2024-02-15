-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 06:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(22500, 'admin1', 'admin1'),
(22501, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aduan_masyarakat`
--

CREATE TABLE `aduan_masyarakat` (
  `ID` int(16) NOT NULL,
  `NIK` int(16) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Nomer_tlp` int(15) NOT NULL,
  `Aduan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aduan_masyarakat`
--

INSERT INTO `aduan_masyarakat` (`ID`, `NIK`, `Nama`, `Email`, `Nomer_tlp`, `Aduan`) VALUES
(97, 2147483647, 'ilham2', 'hh2h@gmail.com', 2147483647, '222'),
(98, 2147483647, 'ilham8', 'hh2h@gmail.com', 2147483647, '666'),
(99, 9989999, 'wibi', 'test@gmail.com', 888888, 'jjjjj');

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id_respon` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `respon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `respon`
--

INSERT INTO `respon` (`id_respon`, `id_masyarakat`, `respon`) VALUES
(20, 97, 'selesai'),
(21, 98, 'done'),
(22, 99, 'kkkk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`),
  ADD KEY `id_admin` (`id_masyarakat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22503;

--
-- AUTO_INCREMENT for table `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `relasi_masyarakat` FOREIGN KEY (`id_masyarakat`) REFERENCES `aduan_masyarakat` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
