-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 06:48 AM
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

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_bk`, `id_cate`, `name_cate`, `name_bk`, `detail_bk`, `create_at`) VALUES
('000001', '300', 'ไอหมอก', 'A1001', 'ไอหมอก', '2023-02-04 11:18:08'),
('000002', '100', 'A1002', 'A1002', 'A1002', '2023-02-04 18:39:31'),
('000003', '200', 'A1003', 'A1003', 'A1003', '2023-02-04 18:39:42'),
('000004', '800', 'A1004', 'A1004', 'A1004', '2023-02-04 18:39:53'),
('000005', '500', 'A1005', 'A1005', 'A1005', '2023-02-04 18:40:02'),
('000006', '700', 'A1006', 'A1006', 'A1006', '2023-02-04 18:40:19'),
('000007', '900', 'A1007', 'A1007', 'A1007', '2023-02-04 18:40:41'),
('000008', '400', 'A1008', 'A1008', 'A1008', '2023-02-04 18:41:01'),
('000009', '600', 'A1009', 'A1009', 'A1009', '2023-02-04 18:41:29'),
('000010', '010', 'A1010', 'A1010', 'A1010', '2023-02-04 18:41:50'),
('000011', '100', 'A1011', 'A1011', 'A1011', '2023-02-04 18:44:29');

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
('00000000001', 'main_admin', 'admin_m', 'admin123456', 'main_admin', 'main_admin', 'main_admin', '2023-02-04 07:15:15'),
('63202040055', 'staff', 'staff', '123456', 'staff', 'staff', 'staff', '2023-01-27 13:53:38'),
('63202040066', 'm3', 'm3', 'm3', 'm3', 'm3', 'member', '2023-02-04 10:13:22'),
('63202040088', 'bonus', 'admin1', '123456', 'admin1', 'admin1', 'admin', '2023-02-04 07:40:31'),
('63202040100', 'member', 'member', '123456', 'ปวช.3 คอมพิวเตอร์ธุรกิจ', 'นักเรียน', 'member', '2023-02-04 19:38:27');

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
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`id_mem`, `id_bk`, `lend_tran`, `rest_tran`, `status_tran`) VALUES
('63202040066', '000002', '2023-02-05', '0000-00-00', 1),
('63202040066', '000001', '2023-02-05', '2023-02-05', 0),
('63202040066', '000003', '2023-02-05', '2023-02-05', 0),
('63202040066', '000004', '2023-02-05', '2023-02-05', 0),
('63202040066', '000005', '2023-02-05', '2023-02-05', 0),
('63202040066', '000001', '2023-02-05', '0000-00-00', 1),
('63202040066', '000004', '2023-02-05', '0000-00-00', 1),
('63202040100', '000002', '2023-02-05', '0000-00-00', 1),
('63202040066', '000003', '2023-02-04', '0000-00-00', 1);

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
