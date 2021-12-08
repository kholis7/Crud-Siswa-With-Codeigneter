-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 03:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niomic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelajar`
--

CREATE TABLE `tbl_pelajar` (
  `nis` int(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelajar`
--

INSERT INTO `tbl_pelajar` (`nis`, `nama_siswa`, `kelas`, `jurusan`, `email`) VALUES
(3, 'Nur Kholis', 'X', 'Rekayasa Perangkat Lunak', 'kholissetia17@gmail.com'),
(4, 'Durrohim', 'XII', 'Perhotelan', 'durrohim@gmail.com'),
(5, 'Fahrul Faozi', 'XI', 'Rekayasa Perangkat Lunak', 'fahrul@gmail.com'),
(6, 'Yayan', 'XI', 'Teknik dan Bisnis Sepeda Motor', 'yayan@gmail.com'),
(7, 'Aji Saka', 'XII', 'Perhotelan', 'ajisaka@gmail.com'),
(8, 'Aji Saka', 'XII', 'Perhotelan', 'ajisaka@gmail.com'),
(202101003, 'M. Ridho', 'X', 'Rekayasa Perangkat Lunak', 'ridho@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pelajar`
--
ALTER TABLE `tbl_pelajar`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pelajar`
--
ALTER TABLE `tbl_pelajar`
  MODIFY `nis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202101004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
