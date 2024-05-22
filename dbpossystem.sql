-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpossystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategorie`
--

CREATE TABLE `tblcategorie` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategorie`
--

INSERT INTO `tblcategorie` (`categoryID`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'กลุ่มชา', '2024-05-19 03:16:09', '2024-05-19 10:16:09'),
(2, 'กลุ่มกาเเฟ', '2024-05-19 03:16:09', '2024-05-19 10:16:09'),
(3, 'กลุ่มเคก & ขนมหวาน', '2024-05-19 03:16:09', '2024-05-19 10:16:09'),
(4, 'กลุ่มน้ำธรรมดา', '2024-05-19 03:23:59', '2024-05-19 10:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `productID` int(11) NOT NULL,
  `productName` varchar(45) NOT NULL,
  `productCategoryID` int(11) NOT NULL,
  `productStock` int(11) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(1) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`productID`, `productName`, `productCategoryID`, `productStock`, `productPrice`, `created_at`, `updated_at`, `deleted`, `img`) VALUES
(1, 'อเมลิกาโน่', 2, 20, 60, '2024-05-19 03:20:14', '2024-05-23 02:14:14', 0, ''),
(2, 'อเมลิกาโน่ มะพร้าว', 2, 10, 70, '2024-05-19 03:20:14', '2024-05-23 02:14:21', 0, ''),
(3, 'ลาเต้', 2, 30, 50, '2024-05-19 03:20:14', '2024-05-23 02:14:26', 0, ''),
(4, 'อเมลิกาโน่ส้ม', 2, 5, 70, '2024-05-19 03:20:14', '2024-05-23 02:14:32', 0, ''),
(5, 'วุ้นมะพร้าว', 3, 4, 25, '2024-05-19 03:20:14', '2024-05-23 02:15:02', 0, ''),
(6, 'ชาเขียวนมสด', 1, 15, 45, '2024-05-19 03:20:14', '2024-05-23 02:15:02', 0, ''),
(7, 'ชาไทยนมสด', 1, 5, 45, '2024-05-19 03:20:14', '2024-05-23 02:15:02', 0, ''),
(8, 'น้ำเเดงโซดา', 4, 20, 35, '2024-05-19 03:24:54', '2024-05-23 02:15:02', 0, ''),
(9, 'น้ำโค้ก', 4, 5, 25, '2024-05-19 03:24:54', '2024-05-23 02:15:02', 0, ''),
(10, 'น้ำเปล่า', 4, 2, 10, '2024-05-19 12:44:11', '2024-05-23 02:15:02', 0, ''),
(11, 'เเอสเปสโซ่', 2, 10, 60, '2024-05-20 12:35:34', '2024-05-23 02:15:02', 0, ''),
(12, 'คาปูชิโน่', 2, 5, 65, '2024-05-20 12:40:13', '2024-05-23 02:15:02', 0, ''),
(13, 'เคกส้ม', 3, 5, 25, '2024-05-21 06:21:10', '2024-05-23 02:14:39', 0, ''),
(27, 'เคกมะพร้าว', 3, 5, 30, '2024-05-22 19:08:31', '2024-05-23 02:08:31', 0, '171640491160v4y2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategorie`
--
ALTER TABLE `tblcategorie`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `productCategoryID` (`productCategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategorie`
--
ALTER TABLE `tblcategorie`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD CONSTRAINT `tblproducts_ibfk_1` FOREIGN KEY (`productCategoryID`) REFERENCES `tblcategorie` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
