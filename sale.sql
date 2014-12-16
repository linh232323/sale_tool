-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 05:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `identify` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `identify`, `email`) VALUES
(1, 'dummy name', 'dummy', 'dummy', 'dummy', 'dummy@dummy.dummy'),
(2, 'Ho Duy', '123', '090', '123', 'linh@g'),
(3, 'Ho Duy', 'a', '090', 'asd123', 'lin'),
(4, 'Ho Duy', 'A', 'A', 'A', 'A'),
(5, 'A', 'asd', 'A', 'A', 'A'),
(6, 'Mr David', 'Grand Hotel', '0982674451', 'USA', 'thanhliem.tran.vn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'An Giang'),
(2, 'Bà Rịa - Vũng Tàu'),
(3, 'Bắc Giang'),
(4, 'Bắc Kạn'),
(5, 'Bạc Liêu'),
(6, 'Bắc Ninh'),
(7, 'Bến Tre'),
(8, 'Bình Định'),
(9, 'Bình Dương'),
(10, 'Bình Phước'),
(11, 'Bình Thuận'),
(12, 'Cà Mau'),
(13, 'Cao Bằng'),
(14, 'Đắk Lắk'),
(15, 'Đắk Nông'),
(16, 'Điện Biên'),
(17, 'Đồng Nai'),
(18, 'Đồng Tháp'),
(19, 'Gia Lai'),
(20, 'Hà Giang'),
(21, 'Hà Tĩnh'),
(22, 'Hải Dương'),
(23, 'Hậu Giang'),
(24, 'Hòa Bình'),
(25, 'Hưng Yên'),
(26, 'Khánh Hòa'),
(27, 'Kiên Giang'),
(28, 'Kon Tum'),
(29, 'Lai Châu'),
(30, 'Lâm Đồng'),
(31, 'Lạng Sơn'),
(32, 'Lào Cai'),
(33, 'Long An'),
(34, 'Nam Định'),
(35, 'Nghệ An'),
(36, 'Ninh Bình'),
(37, 'Ninh Thuận'),
(38, 'Phú Thọ'),
(39, 'Quảng Bình'),
(40, 'Quảng Ngãi'),
(41, 'Quảng Ninh'),
(42, 'Quảng Trị'),
(43, 'Sóc Trăng'),
(44, 'Sơn La'),
(45, 'Tây Ninh'),
(46, 'Thái Bình'),
(47, 'Thái Nguyên'),
(48, 'Thanh Hóa'),
(49, 'Thừa Thiên Huế'),
(50, 'Tiền Giang'),
(51, 'Trà Vinh'),
(52, 'Tuyên Quang'),
(53, 'Vĩnh Long'),
(54, 'Vĩnh Phúc'),
(55, 'Yên Bái'),
(56, 'Phú Yên'),
(57, 'Đà Nẵng'),
(58, 'Hải Phòng'),
(59, 'Hà Nội'),
(60, 'TP HCM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `description` text,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `customer_count` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`, `order_status`, `payment_method`, `customer_count`, `total`) VALUES
(1, 5, NULL, 1, '2014-12-06 00:00:00', NULL, NULL, 0, NULL, 5, 0),
(2, 6, NULL, 1, '2014-12-09 00:00:00', NULL, NULL, 0, NULL, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_cruises`
--

CREATE TABLE IF NOT EXISTS `order_cruises` (
`id` int(11) NOT NULL,
  `from_location_id` int(11) NOT NULL,
  `to_location_id` int(11) NOT NULL,
  `order_date_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_cruises`
--

INSERT INTO `order_cruises` (`id`, `from_location_id`, `to_location_id`, `order_date_id`) VALUES
(1, 22, 24, 1),
(2, 22, 24, 1),
(3, 20, 60, 2),
(4, 60, 50, 3),
(5, 21, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_date`
--

CREATE TABLE IF NOT EXISTS `order_date` (
`id` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_date`
--

INSERT INTO `order_date` (`id`, `from_date`, `to_date`, `order_id`, `position`) VALUES
(1, '2014-12-18 00:00:00', '2014-12-18 00:00:00', 1, NULL),
(2, '2014-12-19 00:00:00', '2014-12-19 00:00:00', 1, NULL),
(3, '2014-12-11 00:00:00', '2014-12-11 00:00:00', 2, NULL),
(4, '2014-12-12 00:00:00', '2014-12-12 00:00:00', 2, NULL),
(5, '2014-12-13 00:00:00', '2014-12-13 00:00:00', 2, NULL),
(6, '2014-12-14 00:00:00', '2014-12-14 00:00:00', 2, NULL),
(7, '2014-12-15 00:00:00', '2014-12-15 00:00:00', 2, NULL),
(8, '2014-12-16 00:00:00', '2014-12-16 00:00:00', 2, NULL),
(9, '2014-12-17 00:00:00', '2014-12-17 00:00:00', 2, NULL),
(10, '2014-12-18 00:00:00', '2014-12-18 00:00:00', 2, NULL),
(11, '2014-12-19 00:00:00', '2014-12-19 00:00:00', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_custom` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price_gross` double NOT NULL,
  `price_number` int(11) NOT NULL,
  `extra_gross` double NOT NULL,
  `extra_number` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `total` double NOT NULL,
  `order_cruise_id` int(11) DEFAULT NULL,
  `order_date_id` int(11) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_level_id` int(11) NOT NULL,
  `max_discount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `is_custom`, `service_id`, `price_gross`, `price_number`, `extra_gross`, `extra_number`, `discount`, `description`, `total`, `order_cruise_id`, `order_date_id`, `check_in_date`, `check_out_date`, `service_type_id`, `service_level_id`, `max_discount`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 1, 0, 0),
(2, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 2, 0, 0),
(3, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 3, 0, 0),
(4, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 4, 0, 0),
(5, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 5, 0, 0),
(6, 1, 1, 0, 0, 0, 0, 0, 0, '', 10, 2, 1, NULL, NULL, 1, 0, 0),
(7, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 2, 0, 0),
(8, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 3, 0, 0),
(9, 1, 1, 0, 0, 0, 0, 0, 0, 'hhhh', 9, 2, 1, NULL, NULL, 4, 0, 0),
(10, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 5, 0, 0),
(11, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 5, 0, 0),
(12, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 4, 0, 0),
(13, 1, 1, 0, 0, 0, 0, 0, 0, 'aaaaaaaaaa', 0, 3, 2, NULL, NULL, 1, 0, 0),
(14, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 2, 0, 0),
(15, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 3, 0, 0),
(16, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 4, 0, 0),
(17, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 5, 0, 0),
(18, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 1, 0, 0),
(19, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 1, 0, 0),
(20, 2, 1, 0, 0, 0, 0, 0, 0, 'asdasd', 1000, 4, 3, NULL, NULL, 1, 0, 0),
(21, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 2, 0, 0),
(22, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 3, 0, 0),
(23, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 4, 0, 0),
(24, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 5, 0, 0),
(25, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 1, 0, 0),
(26, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 1, 0, 0),
(27, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 1, 0, 0),
(28, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 1, 0, 0),
(29, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 2, 0, 0),
(30, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 3, 0, 0),
(31, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 4, 0, 0),
(32, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 5, 0, 0),
(33, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_id_a` int(11) DEFAULT NULL,
  `location_id_b` int(11) DEFAULT NULL,
  `description` text,
  `service_type_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `location_id_a`, `location_id_b`, `description`, `service_type_id`, `image_url`) VALUES
(1, 'Novotel', 21, NULL, NULL, 1, NULL),
(2, 'X', 1, 4, NULL, 1, NULL),
(3, 'Y', 2, 3, NULL, 1, NULL),
(4, 'X', 1, 4, NULL, 1, NULL),
(5, 'Y', 2, 3, NULL, 1, NULL),
(6, 'X', 1, 4, NULL, 1, NULL),
(7, 'Y', 2, 3, NULL, 1, NULL),
(8, 'X', 1, 4, NULL, 1, NULL),
(9, 'Y', 2, 3, NULL, 1, NULL),
(10, 'X', 1, 4, NULL, 1, NULL),
(11, 'Y', 2, 3, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_level`
--

CREATE TABLE IF NOT EXISTS `services_level` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `service_type_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_level`
--

INSERT INTO `services_level` (`id`, `name`, `description`, `service_type_id`) VALUES
(1, 'V.I.P', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services_price`
--

CREATE TABLE IF NOT EXISTS `services_price` (
`id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `price_net` bigint(20) NOT NULL,
  `price_percent` decimal(10,0) NOT NULL,
  `price_gross` bigint(20) NOT NULL,
  `extra_net` int(11) NOT NULL,
  `extra_percent` int(11) NOT NULL,
  `extra_gross` int(11) NOT NULL,
  `discount_max` int(11) NOT NULL,
  `service_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_price`
--

INSERT INTO `services_price` (`id`, `service_id`, `service_type_id`, `date_from`, `date_to`, `price_net`, `price_percent`, `price_gross`, `extra_net`, `extra_percent`, `extra_gross`, `discount_max`, `service_level`) VALUES
(1, 1, 1, '2014-12-01', '2014-12-06', 100, '150', 150, 100, 140, 140, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services_type`
--

CREATE TABLE IF NOT EXISTS `services_type` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_type`
--

INSERT INTO `services_type` (`id`, `name`, `description`) VALUES
(1, 'hotel', 'Hotel'),
(2, 'restaurent', 'Restaurent'),
(3, 'tour', 'Tour'),
(4, 'transport', 'Transport'),
(5, 'insurence', 'Insurence');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usersalt` varchar(255) NOT NULL,
  `loginattemp` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `loginattempt` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `username`, `email`, `usersalt`, `loginattemp`, `session_id`, `ipaddress`, `loginattempt`, `type`, `logintype`) VALUES
(0, 'Unknown', '0', '', 0, '', '127.0.0.1', '1', '', 'Backend'),
(0, 'Unknown', '0', '', 0, '', '127.0.0.1', '1', '', 'Backend'),
(0, 'Unknown', '0', '', 0, '', '127.0.0.1', '1', '', 'Backend');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `usersalt` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_date`, `modified_date`, `role`, `email`, `type`, `usersalt`, `name`) VALUES
(1, 'admin', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'admin@gmail.com', 'ADMIN', '', 'Admin than thanh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cruises`
--
ALTER TABLE `order_cruises`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_date`
--
ALTER TABLE `order_date`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_level`
--
ALTER TABLE `services_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_price`
--
ALTER TABLE `services_price`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_type`
--
ALTER TABLE `services_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_cruises`
--
ALTER TABLE `order_cruises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_date`
--
ALTER TABLE `order_date`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `services_level`
--
ALTER TABLE `services_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_price`
--
ALTER TABLE `services_price`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services_type`
--
ALTER TABLE `services_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
