-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 11:42 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insertit`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `username`, `password`, `name`, `address`, `email`, `phone`, `status`) VALUES
(1, 'new', 'new', 'new', 'nnew', 'new', '0990023851', 'user'),
(3, 'suphason19', '123456789', 'New suphason 19', 'หัวหิน', 'suphason19@gmail.com', '0990023851', 'user'),
(4, 'suphason1999', '123456789 ', 'New suphason ', 'หัวหิน', 'suphason19@gmail.com', '0990023851', 'user'),
(5, 'adminaof', '123', 'แอดมินออฟ', 'แอดมินออฟแอดมินออฟแอดมินออฟแอดมินออฟแอดมินออฟ', 'aof@gmail.com', '0325786945', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` enum('รอชำระเงิน','กำลังตรวจสอบ','กำลังจัดส่งสินค้า') NOT NULL DEFAULT 'รอชำระเงิน',
  `ID` int(5) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `slip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `name`, `address`, `email`, `phone`, `bank`, `price`, `status`, `ID`, `OrderDate`, `slip`) VALUES
(1, 'new', 'new', 'new', '0990023851', 'ธนาคารกรุงไทย', '407', 'กำลังจัดส่งสินค้า', 0, '2021-03-22 10:36:03', '2.jpg'),
(2, 'new', 'sdasdasdasd', 'tzi_newza@hotmail.com', '0990023851', '', '1,370', 'กำลังจัดส่งสินค้า', 0, '2021-03-22 10:36:10', ''),
(3, 'ศุภสณห์ ', 'หัวหิน3', 'suphason19@gmail.com', '0990023851', 'ธนาคารกรุงไทย', '84,028', 'กำลังจัดส่งสินค้า', 0, '2021-03-22 10:36:45', '1-111.jpg'),
(4, 'sad', 'asd', 'asd@sda', 'asd', 'ธนาคารกรุงไทย', '4,901', '', 0, '2021-03-22 09:49:12', '1-111.jpg'),
(5, 'ืำไ', 'ำืไ', 'newq@sdfs', '099885555', '', '14,103', 'รอชำระเงิน', 0, '2021-03-22 03:24:39', ''),
(6, 'aof', 'sadasd', 'asd@ss', 'asd', '', '4,901', 'รอชำระเงิน', 1, '2021-03-22 03:59:57', ''),
(7, 'New suphason', 'หัวหิน', 'suphason19@gmail.com', '0990023851', '', '4,901', 'รอชำระเงิน', 3, '2021-03-22 04:10:43', ''),
(8, 'sd', 'asdsad', 'asd@sda', '0990023851', '', '2,760,900', 'รอชำระเงิน', 0, '2021-03-22 04:38:37', ''),
(9, 'ฟหก', 'ฟหก', 'suphason19@gmail.com', '0325786945', '', '39,376,300', 'รอชำระเงิน', 0, '2021-03-22 04:40:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `OrderDetail` int(3) NOT NULL,
  `OrderID` int(3) NOT NULL,
  `ProductID` int(3) NOT NULL,
  `Qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`OrderDetail`, `OrderID`, `ProductID`, `Qty`) VALUES
(1, 1, 4, '1'),
(2, 2, 4, '10'),
(3, 3, 2, '1'),
(4, 3, 1, '1'),
(5, 3, 3, '1'),
(6, 3, 4, '1'),
(7, 4, 2, '1'),
(8, 5, 2, '3'),
(9, 6, 2, '1'),
(10, 7, 2, '1'),
(11, 8, 2, '600'),
(12, 9, 1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(3) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_detail` varchar(50) NOT NULL,
  `p_price` varchar(10) NOT NULL,
  `p_item` varchar(10) NOT NULL,
  `c_id` varchar(10) NOT NULL,
  `new_id` varchar(10) NOT NULL,
  `sale_id` varchar(10) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_view` varchar(10) NOT NULL DEFAULT '0',
  `p_qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `p_name`, `p_detail`, `p_price`, `p_item`, `c_id`, `new_id`, `sale_id`, `p_img`, `p_view`, `p_qty`) VALUES
(1, 'cpu', 'ทดสอบระบบ', '73600', '0', '1', '1', '0', '1.jpg', '20', '500'),
(2, 'เมาส์โรจีเทค', 'เมาส์โรจีเทคเมาส์โรจีเทค', '4300', '0', '2', '1', '0', '1-111.jpg', '35', '0'),
(3, 'คีบอร์ดกากๆ', 'คีบอร์ดกากมากๆ', '250', '299', '4', '0', '1', '5.jpg', '1', '0'),
(4, 'test', 'test', '100', '170', '9', '0', '0', '7.jpg', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `t_id` int(3) NOT NULL,
  `t_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`t_id`, `t_name`) VALUES
(1, 'ซีพียู'),
(2, 'เมาส์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`OrderDetail`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `OrderDetail` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `t_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
