-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 03:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `ID_admin` int(11) NOT NULL,
  `Name_admin` varchar(255) NOT NULL,
  `Email_admin` varchar(100) NOT NULL,
  `User_admin` varchar(255) NOT NULL,
  `Pass_admin` varchar(255) NOT NULL,
  `Level_admin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`ID_admin`, `Name_admin`, `Email_admin`, `User_admin`, `Pass_admin`, `Level_admin`) VALUES
(1, 'Nguyen Thanh Sang', 'nguyenthanhsang6492@gmail.com', 'sang.nguyentngh2907', '9d63957bf9411486726fcff6875df2e6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_author`
--

CREATE TABLE `table_author` (
  `auID` int(11) NOT NULL,
  `auName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_author`
--

INSERT INTO `table_author` (`auID`, `auName`) VALUES
(3, 'Tố Hữu'),
(4, 'Đặng Tiến');

-- --------------------------------------------------------

--
-- Table structure for table `table_cart`
--

CREATE TABLE `table_cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sessionID` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`catID`, `catName`) VALUES
(11, 'Phong Cảnh'),
(12, 'Chân Dung'),
(13, 'Tĩnh Vật');

-- --------------------------------------------------------

--
-- Table structure for table `table_customer`
--

CREATE TABLE `table_customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Zipcode` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_customer`
--

INSERT INTO `table_customer` (`ID`, `Name`, `City`, `Country`, `Zipcode`, `Phone`, `Email`, `Address`, `Password`) VALUES
(14, 'NGUYEN THANH SANG', 'Hồ Chí Minh', 'null', '123', '0767934760', 'nguyenthanhsang6492@gmail.com', 'Tiền Giang', '250cf8b51c773f3f8dc8b4be867a9a02');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `ID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`ID`, `productID`, `productName`, `customerID`, `quantity`, `price`, `total`, `date`) VALUES
(5, 8, 'Sún', 9, 1, '200.000', '', '2021-11-26 22:41:36'),
(6, 2, 'Bến Cá Phù Long', 9, 1, '115.000', '', '2021-11-26 22:41:36'),
(7, 5, 'Một Thoáng Hội An', 9, 1, '200.000', '', '2021-11-26 22:41:36'),
(8, 6, 'Bông Lau', 9, 1, '200.000', '', '2021-11-26 22:41:36'),
(9, 5, 'Một Thoáng Hội An', 9, 1, '200.000', '', '2021-11-26 22:41:36'),
(10, 5, 'Một Thoáng Hội An', 9, 1, '200.000', 'total', '2021-11-26 22:41:36'),
(11, 6, 'Bông Lau', 9, 1, '200.000', 'total', '2021-11-26 22:41:36'),
(12, 2, 'Bến Cá Phù Long', 9, 3, '115.000', '345', '2021-11-26 22:41:36'),
(13, 5, 'Một Thoáng Hội An', 9, 1, '200.000', '200', '2021-11-26 22:41:36'),
(14, 6, 'Bông Lau', 9, 1, '200.000', '200', '2021-11-26 22:41:36'),
(15, 8, 'Sún', 9, 1, '200.000', '200', '2021-11-26 22:41:36'),
(16, 5, 'Một Thoáng Hội An', 14, 1, '200.000', '200', '2021-11-27 10:32:39'),
(17, 6, 'Bông Lau', 14, 1, '200.000', '200', '2021-11-27 12:57:41'),
(18, 8, 'Sún', 14, 1, '200.000', '200', '2021-11-27 12:57:41'),
(19, 5, 'Một Thoáng Hội An', 14, 1, '200.000', '200', '2021-11-27 13:38:44'),
(20, 6, 'Bông Lau', 14, 1, '200.000', '200', '2021-11-27 13:38:44'),
(21, 8, 'Sún', 14, 1, '200.000', '200', '2021-11-27 13:38:44'),
(22, 5, 'Một Thoáng Hội An', 14, 3, '200.000', '600', '2021-11-27 13:40:36'),
(23, 6, 'Bông Lau', 14, 1, '200.000', '200', '2021-11-27 13:41:32'),
(24, 8, 'Sún', 14, 1, '200.000', '200', '2021-11-27 13:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `productID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`productID`, `catID`, `authorID`, `product_desc`, `type`, `price`, `image`, `productName`) VALUES
(2, 11, 4, '<p>Rất đẹp</p>', 1, '115.000', '476ed16b9b.jpg', 'Bến Cá Phù Long'),
(5, 11, 4, '<p>Rất đẹp</p>', 1, '200.000', '94a931b0f3.jpg', 'Một Thoáng Hội An'),
(6, 11, 4, '<p>Rất Đẹp</p>', 1, '200.000', 'e5f5fce7a9.jpg', 'Bông Lau'),
(8, 12, 4, '<p>Rất đẹp</p>', 1, '200.000', 'ad45ee00e8.jpg', 'Sún');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `table_author`
--
ALTER TABLE `table_author`
  ADD PRIMARY KEY (`auID`);

--
-- Indexes for table `table_cart`
--
ALTER TABLE `table_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `table_customer`
--
ALTER TABLE `table_customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_author`
--
ALTER TABLE `table_author`
  MODIFY `auID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_cart`
--
ALTER TABLE `table_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `table_customer`
--
ALTER TABLE `table_customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
