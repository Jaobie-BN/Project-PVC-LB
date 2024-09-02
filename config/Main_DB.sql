-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 05:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db63202040097`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_bk` varchar(20) NOT NULL COMMENT 'เลขทะเบียนหนังสือ',
  `id_cate` varchar(20) NOT NULL COMMENT 'เลขหมวดหมู่',
  `name_cate` varchar(50) NOT NULL COMMENT 'ชื่อหมวดหมู่',
  `name_bk` varchar(50) NOT NULL COMMENT 'ชื่อหนังสือ',
  `detail_bk` varchar(200) NOT NULL COMMENT 'รายละเอียด',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dayborr`
--

CREATE TABLE `dayborr` (
  `id_day` int(10) NOT NULL,
  `num_day` int(10) NOT NULL COMMENT 'วันที่ให้ยืม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dayborr`
--

INSERT INTO `dayborr` (`id_day`, `num_day`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `id_fine` int(10) NOT NULL,
  `num_fine` int(10) NOT NULL COMMENT 'ค่าปรับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`id_fine`, `num_fine`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_mem` varchar(20) NOT NULL COMMENT 'รหัสสมาชิก',
  `name_mem` varchar(50) NOT NULL COMMENT 'ชื่อ-สกุล',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(50) NOT NULL COMMENT 'รหัสผ่าน',
  `dep_mem` varchar(50) NOT NULL COMMENT 'แผนก/ชั้น',
  `status_mem` varchar(20) NOT NULL COMMENT 'สถานะภาพ',
  `level_mem` varchar(10) NOT NULL COMMENT 'สถานะสมาชิก',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สร้าง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_mem`, `name_mem`, `username`, `password`, `dep_mem`, `status_mem`, `level_mem`, `create_at`) VALUES
('63202040055', 'staff', 'staff', '123456', 'staff', 'staff', 'staff', '2023-01-27 13:53:38'),
('63202040097', 'admin', 'admin', '123456', 'admin', 'admin', 'admin', '2023-01-27 13:51:39'),
('63202040099', 'bonusss', 'members', '123456', 'ปวช.3 คอมพิวธุรกิจ', 'นักเรียน', 'member', '2023-01-28 11:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE `transection` (
  `id_mem` varchar(20) NOT NULL,
  `id_bk` varchar(20) NOT NULL,
  `lend_tran` date NOT NULL COMMENT 'วันที่ยืม',
  `rest_tran` date NOT NULL COMMENT 'วันที่คืน',
  `status_tran` tinyint(4) NOT NULL COMMENT 'สถานะการคืน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indexes for table `dayborr`
--
ALTER TABLE `dayborr`
  ADD PRIMARY KEY (`id_day`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`id_fine`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_mem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dayborr`
--
ALTER TABLE `dayborr`
  MODIFY `id_day` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `id_fine` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
