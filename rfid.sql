-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 09:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `Customer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`Customer`) VALUES
('TMMIN SUNTER 1'),
('TMMIN STR 1K'),
('TMMIN SPD'),
('TMMIN KRW 43-OP1');

-- --------------------------------------------------------

--
-- Table structure for table `header_table`
--

CREATE TABLE `header_table` (
  `id` varchar(12) NOT NULL,
  `Customer` varchar(128) NOT NULL,
  `Transaksi` varchar(128) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp(),
  `total_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `id` varchar(12) NOT NULL,
  `EPC` varchar(128) NOT NULL,
  `Type` varchar(128) NOT NULL,
  `Customer` varchar(128) NOT NULL,
  `Transaksi` varchar(128) NOT NULL,
  `Waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `EPC` varchar(128) NOT NULL,
  `Type` varchar(128) NOT NULL,
  `Customer` varchar(128) NOT NULL,
  `Last_Seen` date NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`EPC`, `Type`, `Customer`, `Last_Seen`, `Status`) VALUES
('0C00 2802 9C13 0125 9000 3C4C 2A90', 'BOX 331', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A91', 'BOX 331', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A92', 'BOX 331', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A93', 'BOX 331', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A94', 'BOX 331', 'TMMIN KRW 43-OP1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A95', 'BOX 331', 'TMMIN KRW 43-OP1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A96', 'BOX 331', 'TMMIN KRW 43-OP1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A97', 'BOX 331', 'TMMIN KRW 43-OP1', '2022-08-11', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A98', 'BOX 331', 'TMMIN KRW 43-OP1', '2022-08-11', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A99', 'BOX 331', 'TMMIN KRW 43-OP1', '2022-08-11', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A89', 'BOX BIRU SEDANG', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A88', 'BOX BIRU SEDANG', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A87', 'BOX BIRU SEDANG', 'TMMIN SUNTER 1', '2022-08-16', 'AVAILABLE'),
('0C00 2802 9C13 0125 9000 3C4C 2A69', 'PALET HIJAU', 'TMMIN KRW 43-OP1', '2022-08-16', 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `type_table`
--

CREATE TABLE `type_table` (
  `Type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_table`
--

INSERT INTO `type_table` (`Type`) VALUES
('PALET HIJAU'),
('PALET BIRU'),
('BOX 331'),
('BOX BIRU SEDANG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
