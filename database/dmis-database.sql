-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 07:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmis-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoryrecord`
--

CREATE TABLE `categoryrecord` (
  `categoryID` varchar(50) NOT NULL,
  `categoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoryrecord`
--

INSERT INTO `categoryrecord` (`categoryID`, `categoryName`) VALUES
('CTGRYPRD-9ZSJH3VO', 'Romper'),
('CTGRYPRD-H7N9PKR6', 'Jumpsuit'),
('CTGRYPRD-P5E5G35S', 'Bottom'),
('CTGRYPRD-Y6N2DS70', 'Dress'),
('CTGRYPRD-ZNCIRE9C', 'Top');

-- --------------------------------------------------------

--
-- Table structure for table `productrecord`
--

CREATE TABLE `productrecord` (
  `productId` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productCategory` varchar(50) NOT NULL,
  `productCondition` varchar(50) NOT NULL,
  `productQuantity` int(20) NOT NULL,
  `DateTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productrecord`
--

INSERT INTO `productrecord` (`productId`, `productName`, `productCategory`, `productCondition`, `productQuantity`, `DateTime`) VALUES
('PRD-22T3ZHW9', 'Camo Pants', 'Bottom', 'Good', 20, '2022-02-27T11:42'),
('PRD-2P9S16M7', 'Blue Lounge Pants ', 'Bottom', 'Good', 225, '2021-11-09T13:49'),
('PRD-2TC35DBP', 'Skater Skirt', 'Bottom', 'Good', 67, '2021-09-06T23:53'),
('PRD-3ZSSSHKH', 'Black Jumpsuit with Gold Details', 'Jumpsuit', 'Good', 0, '2021-12-08T18:41'),
('PRD-48ASLHFN', 'White Off Shoulder Romper', 'Romper', 'Good', 60, '2021-11-04T16:46'),
('PRD-AWFSB3LK', 'Cat Print Polo', 'Top', 'Good', 75, '2022-01-04T11:48'),
('PRD-BQ3O25EK', 'Brown Paperbag Pants', 'Bottom', 'Good', 400, '2021-09-27T15:26'),
('PRD-EHTQEG7X', 'Khaki Puff Sleeve Dress', 'Dress', 'Good', 150, '2021-08-16T23:46'),
('PRD-GJ3XVBMO', 'Leather Paperbag Pants ', 'Bottom', 'Good', 300, '2021-12-08T16:43'),
('PRD-GNKWYN3P', 'Black Flare Pants', 'Bottom', 'Bad', 4, '2020-09-27T13:37'),
('PRD-HXSPUJ6J', 'Tutu Skirt', 'Bottom', 'Good', 100, '2020-07-27T14:41'),
('PRD-KXKBSRMZ', 'Pink Dress with Slit', 'Dress', 'Good', 95, '2021-12-21T23:44'),
('PRD-L7S48ZGT', 'Plaid Trousers ', 'Bottom', 'Good', 78, '2021-11-14T14:52'),
('PRD-P6I72LZB', 'Oversized Floral Polo', 'Top', 'Good', 90, '2021-10-11T15:47'),
('PRD-WYM7OIJW', 'Camo Pants', 'Bottom', 'Bad', 12, '2022-02-07T11:41'),
('PRD-X4VBE6KM', 'Black Jumpsuit with Pearl', 'Jumpsuit', 'Good', 200, '2022-02-09T17:49'),
('PRD-XAQRJ7KB', 'Eyelet Mini Dress', 'Dress', 'Good', 450, '2022-02-08T15:49'),
('PRD-XN4PVXV4', 'Red Polka Shirt', 'Top', 'Bad', 12, '2020-05-04T16:40'),
('PRD-Y585C3LQ', 'Purple Ribbed Long Sleeves', 'Top', 'Good', 150, '2020-02-27T23:40'),
('PRD-ZBOKTWIA', 'Silver Satin Dress', 'Dress', 'Good', 450, '2022-01-25T17:44');

-- --------------------------------------------------------

--
-- Table structure for table `reqproductrecord`
--

CREATE TABLE `reqproductrecord` (
  `reqproductId` varchar(50) NOT NULL,
  `productId` varchar(50) NOT NULL,
  `reqproductQuantity` int(20) NOT NULL,
  `reqDateTime` datetime NOT NULL,
  `reqproductStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reqproductrecord`
--

INSERT INTO `reqproductrecord` (`reqproductId`, `productId`, `reqproductQuantity`, `reqDateTime`, `reqproductStatus`) VALUES
('REQPRD-2AK4NHMC', 'PRD-BQ3O25EK', 200, '2022-02-28 01:56:00', 'Rejected'),
('REQPRD-6YG0XR0T', 'PRD-22T3ZHW9', 14, '2022-02-28 00:00:00', 'Approved'),
('REQPRD-E9L3W4ZK', 'PRD-22T3ZHW9', 50, '2022-02-28 01:55:00', 'Rejected'),
('REQPRD-HKZ1YJKZ', 'PRD-2TC35DBP', 50, '2022-02-28 01:54:00', 'Rejected'),
('REQPRD-R4WK5PBD', 'PRD-3ZSSSHKH', 500, '2022-02-28 01:56:00', 'Approved'),
('REQPRD-XZTIQV94', 'PRD-22T3ZHW9', 50, '2022-02-28 01:55:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_name`
--

CREATE TABLE `tbl_name` (
  `id` int(11) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `contactNo` int(15) NOT NULL,
  `bio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_name`
--

INSERT INTO `tbl_name` (`id`, `lastName`, `firstName`, `birthdate`, `contactNo`, `bio`) VALUES
(8, 'aaa', 'ccc', '1992-12-04', 90909090, 'asda a a');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'warehouse', 'warehouse@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoryrecord`
--
ALTER TABLE `categoryrecord`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `productrecord`
--
ALTER TABLE `productrecord`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `reqproductrecord`
--
ALTER TABLE `reqproductrecord`
  ADD PRIMARY KEY (`reqproductId`);

--
-- Indexes for table `tbl_name`
--
ALTER TABLE `tbl_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_name`
--
ALTER TABLE `tbl_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
