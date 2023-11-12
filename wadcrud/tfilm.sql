-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 12, 2023 at 02:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrud_modal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tfilm`
--

CREATE TABLE `tfilm` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `sutradara` varchar(150) NOT NULL,
  `tahun` int(11) NOT NULL,
  `genre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tfilm`
--

INSERT INTO `tfilm` (`id_film`, `judul`, `sutradara`, `tahun`, `genre`) VALUES
(1, 'Autobiography ', 'Makbul Mubarak ', 2022, 'Drama'),
(2, 'The Batman ', 'Matt Reeves ', 2022, 'Action'),
(3, 'Scott pilgrim vs the world ', 'Edgar Wright ', 2010, 'Comedy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tfilm`
--
ALTER TABLE `tfilm`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tfilm`
--
ALTER TABLE `tfilm`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
