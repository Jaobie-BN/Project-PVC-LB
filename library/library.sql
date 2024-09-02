-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` varchar(20) NOT NULL,
  `btitle` varchar(255) NOT NULL,
  `bcate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `btitle`, `bcate`) VALUES
('1', 'CP', 'IT'),
('CP101', 'Computer and internet', 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` varchar(20) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `mdep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `mname`, `mdep`) VALUES
('A1001', 'มานี ลองมา', 'คอมพิวเตอร์ธุรกิจ'),
('A1002', 'มานะ ลองไป', 'คอมพิวเตอร์กราฟฟิก'),
('A1003', 'สมใจ อยากได้', 'การบัญชี');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `mid` varchar(20) NOT NULL,
  `bid` varchar(20) NOT NULL,
  `tlend` date NOT NULL,
  `trest` date NOT NULL,
  `tstat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`mid`, `bid`, `tlend`, `trest`, `tstat`) VALUES
('A1001', '1', '2023-02-02', '2023-02-02', 0),
('A1001', 'CP101', '2023-02-02', '2023-02-03', 0),
('A1002', 'CP101', '2023-02-02', '2023-02-03', 0),
('A1002', 'CP101', '2023-02-03', '2023-02-03', 0),
('A1002', 'CP101', '2023-02-03', '2023-02-03', 0),
('A1001', 'CP101', '2023-02-03', '2023-02-03', 0),
('A1001', 'CP101', '2023-02-03', '2023-02-03', 0),
('A1001', 'CP101', '2023-02-03', '2023-02-03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
