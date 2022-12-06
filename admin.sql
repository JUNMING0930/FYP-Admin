-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 02:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(5) NOT NULL,
  `Admin_Fname` varchar(100) NOT NULL,
  `Admin_Lname` varchar(100) NOT NULL,
  `Admin_Email` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL,
  `Admin_Phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `Admin_Fname`, `Admin_Lname`, `Admin_Email`, `Admin_Password`, `Admin_Phone`) VALUES
(1, 'Lim ', 'Jun Ming i', 'abcabc@gmail.com', 'Lim_0930', '01223104583'),
(2, 'Edmund', 'Tan', 'Tan082022@gmail.com', '456456', '000012233'),
(3, 'Marcuss', 'Wann', 'Wan@gmail.com', '789789', '01122333123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(5) NOT NULL,
  `Cate_Name` varchar(200) NOT NULL,
  `Cate_Description` text DEFAULT NULL,
  `Cate_Status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Cate_Name`, `Cate_Description`, `Cate_Status`) VALUES
(1, 'SANDALS', '         I LOVE SANDALS\r\n', 1),
(2, '123', '      HI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(5) NOT NULL,
  `Category_ID` int(5) NOT NULL,
  `Pro_Name` varchar(100) NOT NULL,
  `Pro_Description` text DEFAULT NULL,
  `Pro_Price` decimal(5,2) NOT NULL,
  `Pro_Image` varchar(200) NOT NULL,
  `Pro_Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Category_ID`, `Pro_Name`, `Pro_Description`, `Pro_Price`, `Pro_Image`, `Pro_Status`) VALUES
(1, 1, '33', 'BEAUTIFUL', '33.00', '1669025943.JPG                 ', 1),
(9, 1, 'xg', '123', '123.50', '1668047093.JPG     ', 0),
(14, 2, 'LALALAL', 'ASHDASHDHASKDHAJSD', '999.00', '1669647844.JPG', 1),
(15, 2, 'LALALA', '123123123', '200.00', '1669717755.JPG', 1),
(16, 1, '123123', '333', '333.00', '1669812024.JPG', 1),
(17, 1, '456456', 'asdasdasd', '50.00', '1669964032.JPG ', 1),
(18, 1, '333', '33', '100.00', '1669964193.JPG ', 1),
(19, 1, 'SANDALS', '123123123', '333.00', '1669964311.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `ID` int(3) NOT NULL,
  `EUsize` int(3) NOT NULL,
  `CMsize` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`ID`, `EUsize`, `CMsize`) VALUES
(1, 37, '22.05'),
(2, 38, '22.90'),
(3, 39, '23.75'),
(4, 40, '24.60'),
(5, 41, '25.45'),
(6, 42, '26.30'),
(7, 43, '27.15'),
(8, 44, '28.00'),
(9, 45, '28.85');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ID` int(5) NOT NULL,
  `Category_ID` int(5) NOT NULL,
  `Product_ID` int(5) NOT NULL,
  `Product_Size` int(3) NOT NULL,
  `Product_Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ID`, `Category_ID`, `Product_ID`, `Product_Size`, `Product_Quantity`) VALUES
(13, 1, 1, 43, 99),
(14, 1, 1, 38, 567),
(15, 2, 15, 39, 33),
(16, 1, 9, 43, 0),
(17, 1, 1, 37, 3),
(18, 1, 1, 39, 99),
(19, 2, 14, 42, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
