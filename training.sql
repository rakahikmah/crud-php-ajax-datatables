-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2017 at 10:24 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kd_fakultas` char(3) NOT NULL,
  `nm_fakultas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kd_fakultas`, `nm_fakultas`) VALUES
('f01', 'Ilmu Komputer'),
('f02', 'Ilmu Komunikasi'),
('f03', 'Teknik'),
('f04', 'Manajemen Dan Bisnis'),
('f05', 'Psikologi');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` int(3) NOT NULL,
  `nm_jurusan` varchar(40) NOT NULL,
  `kd_fakultas` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nm_jurusan`, `kd_fakultas`) VALUES
(1, 'Sistem Informasi', 'f01'),
(2, 'Teknik Informatika', 'f01'),
(3, 'Broadcasting', 'f02'),
(4, 'Public Relations', 'f02'),
(5, 'Teknik Industri', 'f03'),
(6, 'Teknik Sipil', 'f03'),
(7, 'Teknik Elektro', 'f03'),
(8, 'Teknik Mesin', 'f03'),
(9, 'Teknik Arsitektur', 'f03'),
(10, 'Akutansi', 'f04'),
(11, 'Manajemen', 'f04'),
(12, 'Psikologi', 'f05');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `jenis_kel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `tgllahir`, `telp`, `fakultas`, `jurusan`, `jenis_kel`, `agama`) VALUES
('41811410066', 'Raudhah suffaas', 'pondok baharas', '1900-12-22', '089912344323', 'f02', 'Public Relations', 'Perempuan', 'islam'),
('41814010066', 'Raka', 'pondok bahar', '1997-01-21', '082213691782', 'f01', 'Teknik Informatika', 'Laki-laki', 'islam'),
('41814010158', 'Irma Hamidah', 'kemanggisan', '2017-02-17', '089912344321', 'f01', 'Sistem Informasi', 'Perempuan', 'islam');

-- --------------------------------------------------------

--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kd_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`),
  ADD KEY `kd_fakultas` (`kd_fakultas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `kd_jurusan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `members`
--
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`kd_fakultas`) REFERENCES `fakultas` (`kd_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
