-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2015 at 12:43 PM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `genuinet_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `identify` text NOT NULL,
  `email` text NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phone`, `identify`, `email`, `deleted`) VALUES
(1, 'dummy name', 'dummy', 'dummy', 'dummy', 'dummy@dummy.dummy', 0),
(2, 'Ho Duy', '123', '090', '123', 'linh@g', 0),
(3, 'Ho Duy', 'a', '090', 'asd123', 'lin', 0),
(4, 'Ho Duy', 'A', 'A', 'A', 'A', 0),
(5, 'A', 'asd', 'A', 'A', 'A', 0),
(6, 'Mr David', 'Grand Hotel', '0982674451', 'USA', 'thanhliem.tran.vn@gmail.com', 0),
(7, 'ABC', 'Viet Nam', '0982674451', '024287529', 'thanhliem.tran.vn@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `demo_user_address`
--

CREATE TABLE IF NOT EXISTS `demo_user_address` (
  `uadd_id` int(11) NOT NULL AUTO_INCREMENT,
  `uadd_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `uadd_alias` varchar(50) NOT NULL DEFAULT '',
  `uadd_recipient` varchar(100) NOT NULL DEFAULT '',
  `uadd_phone` varchar(25) NOT NULL DEFAULT '',
  `uadd_company` varchar(75) NOT NULL DEFAULT '',
  `uadd_address_01` varchar(100) NOT NULL DEFAULT '',
  `uadd_address_02` varchar(100) NOT NULL DEFAULT '',
  `uadd_city` varchar(50) NOT NULL DEFAULT '',
  `uadd_county` varchar(50) NOT NULL DEFAULT '',
  `uadd_post_code` varchar(25) NOT NULL DEFAULT '',
  `uadd_country` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`uadd_id`),
  UNIQUE KEY `uadd_id` (`uadd_id`),
  KEY `uadd_uacc_fk` (`uadd_uacc_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `demo_user_address`
--

INSERT INTO `demo_user_address` (`uadd_id`, `uadd_uacc_fk`, `uadd_alias`, `uadd_recipient`, `uadd_phone`, `uadd_company`, `uadd_address_01`, `uadd_address_02`, `uadd_city`, `uadd_county`, `uadd_post_code`, `uadd_country`) VALUES
(1, 4, 'Home', 'Joe Public', '0123456789', '', '123', '', 'My City', 'My County', 'My Post Code', 'My Country'),
(2, 4, 'Work', 'Joe Public', '0123456789', 'Flexi', '321', '', 'My Work City', 'My Work County', 'My Work Post Code', 'My Work Country');

-- --------------------------------------------------------

--
-- Table structure for table `demo_user_profiles`
--

CREATE TABLE IF NOT EXISTS `demo_user_profiles` (
  `upro_id` int(11) NOT NULL AUTO_INCREMENT,
  `upro_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upro_company` varchar(50) NOT NULL DEFAULT '',
  `upro_first_name` varchar(50) NOT NULL DEFAULT '',
  `upro_last_name` varchar(50) NOT NULL DEFAULT '',
  `upro_phone` varchar(25) NOT NULL DEFAULT '',
  `upro_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upro_id`),
  UNIQUE KEY `upro_id` (`upro_id`),
  KEY `upro_uacc_fk` (`upro_uacc_fk`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `demo_user_profiles`
--

INSERT INTO `demo_user_profiles` (`upro_id`, `upro_uacc_fk`, `upro_company`, `upro_first_name`, `upro_last_name`, `upro_phone`, `upro_newsletter`) VALUES
(1, 1, '', 'John', 'Admin', '0123456789', 0),
(2, 2, '', 'Jim', 'Moderator', '0123465798', 0),
(3, 3, '', 'Joe', 'Public', '0123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `deleted`) VALUES
(1, 'An Giang', 0),
(2, 'Bà Rịa - Vũng Tàu', 0),
(3, 'Bắc Giang', 0),
(4, 'Bắc Kạn', 0),
(5, 'Bạc Liêu', 0),
(6, 'Bắc Ninh', 0),
(7, 'Bến Tre', 0),
(8, 'Bình Định', 0),
(9, 'Bình Dương', 0),
(10, 'Bình Phước', 0),
(11, 'Bình Thuận', 0),
(12, 'Cà Mau', 0),
(13, 'Cao Bằng', 0),
(14, 'Đắk Lắk', 0),
(15, 'Đắk Nông', 0),
(16, 'Điện Biên', 0),
(17, 'Đồng Nai', 0),
(18, 'Đồng Tháp', 0),
(19, 'Gia Lai', 0),
(20, 'Hà Giang', 0),
(21, 'Hà Tĩnh', 0),
(22, 'Hải Dương', 0),
(23, 'Hậu Giang', 0),
(24, 'Hòa Bình', 0),
(25, 'Hưng Yên', 0),
(26, 'Khánh Hòa', 0),
(27, 'Kiên Giang', 0),
(28, 'Kon Tum', 0),
(29, 'Lai Châu', 0),
(30, 'Lâm Đồng', 0),
(31, 'Lạng Sơn', 0),
(32, 'Lào Cai', 0),
(33, 'Long An', 0),
(34, 'Nam Định', 0),
(35, 'Nghệ An', 0),
(36, 'Ninh Bình', 0),
(37, 'Ninh Thuận', 0),
(38, 'Phú Thọ', 0),
(39, 'Quảng Bình', 0),
(40, 'Quảng Ngãi', 0),
(41, 'Quảng Ninh', 0),
(42, 'Quảng Trị', 0),
(43, 'Sóc Trăng', 0),
(44, 'Sơn La', 0),
(45, 'Tây Ninh', 0),
(46, 'Thái Bình', 0),
(47, 'Thái Nguyên', 0),
(48, 'Thanh Hóa', 0),
(49, 'Thừa Thiên Huế', 0),
(50, 'Tiền Giang', 0),
(51, 'Trà Vinh', 0),
(52, 'Tuyên Quang', 0),
(53, 'Vĩnh Long', 0),
(54, 'Vĩnh Phúc', 0),
(55, 'Yên Bái', 0),
(56, 'Phú Yên', 0),
(57, 'Đà Nẵng', 0),
(58, 'Hải Phòng', 0),
(59, 'Hà Nội', 0),
(60, 'TP HCM', 0),
(61, 'Cần Thơ', 0),
(62, 'Châu Đốc', 0),
(63, 'Phú Quốc', 0),
(64, 'Mũi Né', 0),
(65, 'Nha Trang', 0),
(66, 'Hội An', 0),
(67, 'Đà Lạt', 0),
(68, 'Phan Thiết', 0),
(69, 'Quảng Nam', 0),
(70, 'Correct me', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_cruises`
--

CREATE TABLE IF NOT EXISTS `order_cruises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_location_id` int(11) NOT NULL,
  `to_location_id` int(11) NOT NULL,
  `order_date_id` int(11) NOT NULL,
  `description` text,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order_cruises`
--

INSERT INTO `order_cruises` (`id`, `from_location_id`, `to_location_id`, `order_date_id`, `description`, `deleted`) VALUES
(1, 22, 24, 1, NULL, 0),
(2, 22, 24, 1, NULL, 0),
(3, 20, 60, 2, NULL, 0),
(4, 60, 50, 3, NULL, 0),
(5, 21, 22, 3, NULL, 0),
(6, 60, 60, 1, 'Asd', 0),
(7, 60, 66, 12, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_date`
--

CREATE TABLE IF NOT EXISTS `order_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `order_date`
--

INSERT INTO `order_date` (`id`, `from_date`, `to_date`, `order_id`, `position`, `deleted`) VALUES
(1, '2014-12-18 00:00:00', '2014-12-18 00:00:00', 1, NULL, 0),
(2, '2014-12-19 00:00:00', '2014-12-19 00:00:00', 1, NULL, 0),
(3, '2014-12-11 00:00:00', '2014-12-11 00:00:00', 2, NULL, 0),
(4, '2014-12-12 00:00:00', '2014-12-12 00:00:00', 2, NULL, 0),
(5, '2014-12-13 00:00:00', '2014-12-13 00:00:00', 2, NULL, 0),
(6, '2014-12-14 00:00:00', '2014-12-14 00:00:00', 2, NULL, 0),
(7, '2014-12-15 00:00:00', '2014-12-15 00:00:00', 2, NULL, 0),
(8, '2014-12-16 00:00:00', '2014-12-16 00:00:00', 2, NULL, 0),
(9, '2014-12-17 00:00:00', '2014-12-17 00:00:00', 2, NULL, 0),
(10, '2014-12-18 00:00:00', '2014-12-18 00:00:00', 2, NULL, 0),
(11, '2014-12-19 00:00:00', '2014-12-19 00:00:00', 2, NULL, 0),
(12, '2014-12-25 00:00:00', '2014-12-25 00:00:00', 3, NULL, 0),
(13, '2014-12-26 00:00:00', '2014-12-26 00:00:00', 3, NULL, 0),
(14, '2014-12-27 00:00:00', '2014-12-27 00:00:00', 3, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `service_level_name` varchar(255) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `service_price_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `is_custom`, `service_id`, `price_gross`, `price_number`, `extra_gross`, `extra_number`, `discount`, `description`, `total`, `order_cruise_id`, `order_date_id`, `check_in_date`, `check_out_date`, `service_type_id`, `service_level_name`, `max_discount`, `deleted`, `service_price_id`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 1, '0', 0, 0, 0),
(2, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 2, '0', 0, 0, 0),
(3, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 3, '0', 0, 0, 0),
(4, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 4, '0', 0, 0, 0),
(5, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 0, 1, NULL, NULL, 5, '0', 0, 0, 0),
(6, 1, 1, 0, 0, 0, 0, 0, 0, '', 10, 2, 1, NULL, NULL, 1, '0', 0, 0, 0),
(7, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 2, '0', 0, 0, 0),
(8, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 3, '0', 0, 0, 0),
(9, 1, 1, 0, 0, 0, 0, 0, 0, 'hhhh', 9, 2, 1, NULL, NULL, 4, '0', 0, 0, 0),
(10, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 5, '0', 0, 0, 0),
(11, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 5, '0', 0, 0, 0),
(12, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 2, 1, NULL, NULL, 4, '0', 0, 0, 0),
(13, 1, 1, 0, 0, 0, 0, 0, 0, 'aaaaaaaaaa', 0, 3, 2, NULL, NULL, 1, '0', 0, 0, 0),
(14, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 2, '0', 0, 0, 0),
(15, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 3, '0', 0, 0, 0),
(16, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 4, '0', 0, 0, 0),
(17, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 5, '0', 0, 0, 0),
(18, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 1, '0', 0, 0, 0),
(19, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 3, 2, NULL, NULL, 1, '0', 0, 0, 0),
(20, 2, 1, 0, 0, 0, 0, 0, 0, 'asdasd', 1000, 4, 3, NULL, NULL, 1, '0', 0, 0, 0),
(21, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 2, '0', 0, 0, 0),
(22, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 3, '0', 0, 0, 0),
(23, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 4, '0', 0, 0, 0),
(24, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 5, '0', 0, 0, 0),
(25, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 1, '0', 0, 0, 0),
(26, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 1, '0', 0, 0, 0),
(27, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 4, 3, NULL, NULL, 1, '0', 0, 0, 0),
(28, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 1, '0', 0, 0, 0),
(29, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 2, '0', 0, 0, 0),
(30, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 3, '0', 0, 0, 0),
(31, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 4, '0', 0, 0, 0),
(32, 2, 1, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 5, '0', 0, 0, 0),
(33, 2, 0, 0, 0, 0, 0, 0, 0, '', 0, 5, 3, NULL, NULL, 1, '0', 0, 0, 0),
(34, 1, 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 1, NULL, NULL, 1, '0', 0, 0, 0),
(35, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 6, 1, NULL, NULL, 1, '0', 0, 0, 0),
(36, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 6, 1, NULL, NULL, 2, '0', 0, 0, 0),
(37, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 6, 1, NULL, NULL, 3, '0', 0, 0, 0),
(38, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 6, 1, NULL, NULL, 4, '0', 0, 0, 0),
(39, 1, 1, 0, 0, 0, 0, 0, 0, '', 0, 6, 1, NULL, NULL, 5, '0', 0, 0, 0),
(40, 1, 0, 2, 2470000, 2, 0, 2, 0, 'aksjdlkasjdlkasjdlkasjdlksjaldk', 4940000, 6, 1, NULL, NULL, 1, '91', 0, 0, 0),
(41, 3, 1, 0, 0, 0, 0, 0, 0, '', 0, 7, 12, NULL, NULL, 1, '0', 0, 0, 0),
(42, 3, 1, 0, 0, 0, 0, 0, 0, '', 0, 7, 12, NULL, NULL, 2, '0', 0, 0, 0),
(43, 3, 1, 0, 0, 0, 0, 0, 0, '', 0, 7, 12, NULL, NULL, 3, '0', 0, 0, 0),
(44, 3, 1, 0, 0, 0, 0, 0, 0, '', 0, 7, 12, NULL, NULL, 4, '0', 0, 0, 0),
(45, 3, 1, 0, 0, 0, 0, 0, 0, '', 0, 7, 12, NULL, NULL, 5, '0', 0, 0, 0),
(46, 3, 0, 1, 0, 1, 0, 1, 0, '', 0, 7, 12, NULL, NULL, 1, 'Test', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `description` text,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `customer_count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`, `order_status`, `payment_method`, `customer_count`, `total`, `deleted`) VALUES
(1, 5, NULL, 1, '2014-12-06 00:00:00', NULL, NULL, 0, NULL, 5, 0, 0),
(2, 6, NULL, 1, '2014-12-09 00:00:00', NULL, NULL, 0, NULL, 5, 0, 0),
(3, 7, NULL, 1, '2014-12-23 00:00:00', NULL, NULL, 0, NULL, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location_id_a` int(11) DEFAULT NULL,
  `location_id_b` int(11) DEFAULT NULL,
  `description` text,
  `service_type_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `location_id_a`, `location_id_b`, `description`, `service_type_id`, `image_url`, `deleted`) VALUES
(1, 'GRAND', 60, 0, '', 1, NULL, 0),
(2, 'REX HOTEL SAIGON', 60, 0, '', 1, NULL, 0),
(3, 'NOVOTEL', 60, NULL, '', 1, NULL, 0),
(4, 'MAJESTIC SAIGON', 60, 0, '', 1, NULL, 0),
(5, 'RENAISSANCE', 60, NULL, '', 1, NULL, 0),
(6, 'MAJESTIC SAIGON', 60, 0, '', 1, NULL, 0),
(7, 'CONTINENTAL SAIGON', 60, 0, '', 1, NULL, 0),
(8, 'PALACE', 60, NULL, '', 1, NULL, 0),
(9, 'WINDSOR PLAZA', 60, NULL, '', 1, NULL, 0),
(10, 'PULLMAN SG CENTRE', 60, NULL, '', 1, NULL, 0),
(11, 'SHERATON', 60, NULL, '', 1, NULL, 0),
(12, 'LEGEND', 60, NULL, '', 1, NULL, 0),
(13, 'MOVENPICK', 60, NULL, '', 1, NULL, 0),
(14, 'NIKKO', 60, NULL, '', 1, NULL, 0),
(15, 'LIBERTY CITY POINT', 60, NULL, '', 1, NULL, 0),
(16, 'LIBERTY RIVERSIDE', 60, NULL, '', 1, NULL, 0),
(17, 'RAMANA', 60, NULL, '', 1, NULL, 0),
(18, 'DE NHAT', 60, NULL, '', 1, NULL, 0),
(19, 'HARMONY', 60, NULL, '', 1, NULL, 0),
(20, 'CARAVELLE', 60, NULL, '', 1, NULL, 0),
(21, 'EDEN SG', 60, NULL, '', 1, NULL, 0),
(22, 'DOMAINE LUXURY', 60, NULL, '', 1, NULL, 0),
(23, 'THAO DIEN BOUTIQUE', 60, NULL, '', 1, NULL, 0),
(24, 'SOFITEL', 60, NULL, '', 1, NULL, 0),
(25, 'DUXTON HOTEL SAIGON', 60, 0, '', 1, NULL, 0),
(26, 'NEW PACIFIC', 60, NULL, '', 1, NULL, 0),
(27, 'NORFOLK', 60, NULL, '', 1, NULL, 0),
(28, 'INTERCONTINENTAL', 60, NULL, '', 1, NULL, 0),
(29, 'NEW WORLD', 60, NULL, '', 1, NULL, 0),
(30, 'PARK ROYAL', 60, NULL, '', 1, NULL, 0),
(31, 'HOANG HAI LONG', 60, NULL, '', 1, NULL, 0),
(32, 'GRAND SIVERLAND', 60, NULL, '', 1, NULL, 0),
(33, 'OSCAR SAIGON', 60, 0, '', 1, NULL, 0),
(34, 'LAVENDER', 60, NULL, '', 1, NULL, 0),
(35, 'BOSS GROUP- LIEN THANH', 60, NULL, '', 1, NULL, 0),
(36, 'ELLYSE NGA KHANH', 60, NULL, '', 1, NULL, 0),
(37, 'MAY FLOWER', 60, NULL, '', 1, NULL, 0),
(38, 'COSMOPOLITAN', 60, NULL, '', 1, NULL, 0),
(39, 'TIME DOOR', 60, NULL, '', 1, NULL, 0),
(40, 'VIEN DONG ', 60, NULL, '', 1, NULL, 0),
(41, 'SIGNATURE', 60, NULL, '', 1, NULL, 0),
(42, 'GK CENTRAL', 60, NULL, '', 1, NULL, 0),
(43, 'ASIAN RUBY ', 60, NULL, '', 1, NULL, 0),
(44, 'VICTORY', 60, NULL, '', 1, NULL, 0),
(45, 'QUEEN ANN', 60, NULL, '', 1, NULL, 0),
(46, 'HOANG NGAN', 60, NULL, '', 1, NULL, 0),
(47, 'HOANG PHU GIA', 60, NULL, '', 1, NULL, 0),
(48, 'AU LAC 2', 60, NULL, '', 1, NULL, 0),
(49, 'RUBY RIVER', 60, NULL, '', 1, NULL, 0),
(50, 'WHITE LOTUS', 60, NULL, '', 1, NULL, 0),
(51, 'DUNA', 60, NULL, '', 1, NULL, 0),
(52, 'THE WHITE', 60, NULL, '', 1, NULL, 0),
(53, 'RIVERSIDE', 60, NULL, '', 1, NULL, 0),
(54, 'HUONG SEN', 60, NULL, '', 1, NULL, 0),
(55, 'BONG SEN', 60, NULL, '', 1, NULL, 0),
(56, 'THE KINGSTON', 60, NULL, '', 1, NULL, 0),
(57, 'KELLY', 60, NULL, '', 1, NULL, 0),
(58, 'LIBERTY 2', 60, NULL, '', 1, NULL, 0),
(59, 'LIBERTY 3', 60, NULL, '', 1, NULL, 0),
(60, 'ELIOS', 60, NULL, '', 1, NULL, 0),
(61, 'SIVERLAND SAKYO', 60, NULL, '', 1, NULL, 0),
(62, 'LA JOLIE', 60, NULL, '', 1, NULL, 0),
(63, 'BLUE DIMOND SIGNATURE', 60, NULL, '', 1, NULL, 0),
(64, 'MAY', 60, NULL, '', 1, NULL, 0),
(65, 'SIVERLAND INN', 60, NULL, '', 1, NULL, 0),
(66, 'HOSEN 2', 60, NULL, '', 1, NULL, 0),
(67, 'CATINA', 60, NULL, '', 1, NULL, 0),
(68, 'HAMPTON', 60, NULL, '', 1, NULL, 0),
(69, 'LITTLE SG CORNER', 60, NULL, '', 1, NULL, 0),
(70, 'BLESSING', 60, NULL, '', 1, NULL, 0),
(71, 'BOSS 3', 60, NULL, '', 1, NULL, 0),
(72, 'SUNLAND', 60, NULL, '', 1, NULL, 0),
(73, 'CAP TOWN', 60, NULL, '', 1, NULL, 0),
(74, 'NINH KIEU 1', 61, NULL, '', 1, NULL, 0),
(75, 'NINH KIEU 2', 61, NULL, '', 1, NULL, 0),
(76, 'ASIA ', 61, NULL, '', 1, NULL, 0),
(77, 'HOLIDAY', 61, NULL, '', 1, NULL, 0),
(78, 'SAI CON CAN THO', 61, NULL, '', 1, NULL, 0),
(79, 'VICTORIA', 61, NULL, '', 1, NULL, 0),
(80, 'GOFL', 61, NULL, '', 1, NULL, 0),
(81, 'CHAU PHO', 62, NULL, '', 1, NULL, 0),
(82, 'VICTORIA', 62, NULL, '', 1, NULL, 0),
(83, 'THE SHELLS RESORT &SPA', 63, NULL, 'Ấp Gành Gió, Thị Trấn Dương Đông, Phú Quốc', 1, NULL, 0),
(84, 'FAMIANA RESORT', 63, NULL, 'Ấp cửa lấp, xã Dương Tơ, PQ', 1, NULL, 0),
(85, 'EDEN RESORT', 63, NULL, 'Cửa Lấp, Dương Tơ, Phú Quốc', 1, NULL, 0),
(86, 'MERCURE', 63, NULL, 'Tổ 1, Cửa Lấp, Dương Tơ, Phú Quốc ', 1, NULL, 0),
(87, 'LA VERANDA RESORT', 63, NULL, 'Trần Hưng Đạo, Dương Đông, Phú Quốc', 1, NULL, 0),
(88, 'SASCO BLUE LAGOON', 63, NULL, '64 Trần Hưng Đạo, Dương Đông, Phú Quốc', 1, NULL, 0),
(89, 'SAI GON PHU QUOC', 63, NULL, '62 Trần Hưng Đạo, Dương Đông, Phú Quốc', 1, NULL, 0),
(90, 'LONG BEACH RESORT', 63, NULL, 'Cửa Lấp, Dương Tơ, Phú Quốc ', 1, NULL, 0),
(91, 'LANGCHIA VILLAGE', 63, NULL, 'Ấp cửa Lấp - Xã Dương Tơ, Phú Quốc', 1, NULL, 0),
(92, 'THIEN HAI SON', 63, NULL, '68 – Trần Hưng Đạo – Khu phố 7 – Dương Đông – Phú Quốc ', 1, NULL, 0),
(93, 'KIM HOA', 63, NULL, '88/2 Trần Hưng Đạo, KP7, Dương Đông, Phú Quốc', 1, NULL, 0),
(94, 'HOA BINH', 63, NULL, '71 Trần Hưng Đạo, Khu phố 7 thị trấn Dương Đông, Phú Quốc', 1, NULL, 0),
(95, 'TERRACE RESORT', 63, NULL, '118/6 Trần Hưng Đạo, Thị Trấn Dương Đông, Phú Quốc', 1, NULL, 0),
(96, 'MANGOBAY RESORT', 63, NULL, 'Bãi Biển Ông lãng, Phú Quốc', 1, NULL, 0),
(97, 'THANH KIEU RESORT', 63, NULL, '100C/14 Trần Hưng Đạo, Thị Trấn Đông Dương, Phú Quốc', 1, NULL, 0),
(98, 'TROPICANA RESORT', 63, NULL, '100C/4 Trần Hưng Đạo, khu phố 7, Dương Đông, Phú Quốc ', 1, NULL, 0),
(99, 'BAO QUYNH BUNGALOW', 64, NULL, '26 Nguyen Dinh Chieu, Ham Tien, Mui Ne', 1, NULL, 0),
(100, 'ROMANA RESORT', 64, NULL, ' km 8 Phu Hai, Mui NE, tp. Phan Thiết', 1, NULL, 0),
(101, 'SUNNY BEACH RESORT', 64, NULL, ' 64 Nguyễn Đình Chiểu, Hàm Tiến, Mũi Né', 1, NULL, 0),
(102, 'LOTUS village', 64, NULL, '100 Nguyễn Đình Chiểu, Hàm Tiến, tp. Phan Thiết,', 1, NULL, 0),
(103, 'ALLEZBOO', 64, NULL, '8 Nguyen Dinh Chieu St, Ham Tien,', 1, NULL, 0),
(104, 'SEAHORSE', 64, NULL, '11 Nguyễn Đình Chiểu, khu phố 1, Hàm Tiến. Phan Thiet', 1, NULL, 0),
(105, 'SEALION', 64, NULL, '12 đường Nguyễn Đình CHiểu, Hàm Tiên, Mũi Né', 1, NULL, 0),
(106, 'NOVELA', 64, NULL, '96A Nguyen Dinh Chieu St', 1, NULL, 0),
(107, 'BLUE OCEAN', 64, NULL, '54 Nguyen Dinh Chieu, Ham Tien, Phan Thiet', 1, NULL, 0),
(108, 'CHAM VILLAS', 64, NULL, '32 Nguyễn Đình Chiểu, Hàm Tiến, tp. Phan Thiết', 1, NULL, 0),
(109, 'SUNSEA', 64, NULL, '50 Nguyen Dinh Chieu, KP. 1, Ham Tien Ward, Phan  Thiet', 1, NULL, 0),
(110, 'DYNASTY', 64, NULL, '140A Nguyen Dinh Chieu St, Ham Tien, Phan Thiet', 1, NULL, 0),
(111, 'PANDANUS', 64, NULL, 'Block 5, Mui Ne, tp. Phan Thiết,', 1, NULL, 0),
(112, 'OCEANSKING', 64, NULL, '146 Nguyễn Đình Chiểu - Hàm Tiến - Mũi Né - Phan Thiết', 1, NULL, 0),
(113, 'TIEN DAT', 64, NULL, 'Nguyễn Đình Chiểu, Hàm Tiến, tp. Phan Thiết', 1, NULL, 0),
(114, 'HOANG NGOC RESORT', 64, NULL, '152 Nguyễn Đình Chiểu, Mũi Né', 1, NULL, 0),
(115, 'DIAMOND BAY', 65, NULL, 'Đại Lộ Nguyễn Tất Thành, Sông Lô, Phước Đồng, tp. Nha Trang', 1, NULL, 0),
(116, 'HON TAM HOTEL&RESORT', 65, NULL, 'Hòn Tằm, Vinh Nguyên, Nha Trang, Khánh Hòa', 1, NULL, 0),
(117, 'MICHELIA', 65, NULL, '4 Pasteur, Xương Huân, tp. Nha Trang,', 1, NULL, 0),
(118, 'THE LIGHT HOTEL& RESORT', 65, NULL, '', 1, NULL, 0),
(119, 'VINPERLAND', 65, NULL, '', 1, NULL, 0),
(120, 'NOVOTEL', 65, NULL, '', 1, NULL, 0),
(121, 'SHERATON NHA TRANG', 65, NULL, '', 1, NULL, 0),
(122, 'WHALE ISLAND', 65, NULL, '', 1, NULL, 0),
(123, 'ASIA PARADISE', 65, NULL, '', 1, NULL, 0),
(124, 'LODGE ', 65, NULL, '', 1, NULL, 0),
(125, 'YASAKA', 65, NULL, '', 1, NULL, 0),
(126, 'BLUE MOON', 67, NULL, '', 1, NULL, 0),
(127, 'NGOC LAN', 67, NULL, '', 1, NULL, 0),
(128, 'SAI GON DA LAT', 67, NULL, '', 1, NULL, 0),
(129, 'SAMMY', 67, NULL, '', 1, NULL, 0),
(130, 'BESWESTERN', 67, NULL, '', 1, NULL, 0),
(131, 'SAPHIR', 67, NULL, '', 1, NULL, 0),
(132, 'VINH HUNG RESORT', 66, NULL, '', 1, NULL, 0),
(133, 'VINH HUNG 2', 66, NULL, '', 1, NULL, 0),
(134, 'LONG LIFE RESORT', 66, NULL, '', 1, NULL, 0),
(135, 'PALM GADERN', 66, NULL, '', 1, NULL, 0),
(136, 'VICTORIA', 66, NULL, '', 1, NULL, 0),
(137, 'BOUTIQUE2', 59, NULL, '', 1, NULL, 0),
(138, 'SKYLARK', 59, NULL, '', 1, NULL, 0),
(139, 'GOLDEN RICE ', 59, NULL, '', 1, NULL, 0),
(140, 'NIKKO', 59, NULL, '', 1, NULL, 0),
(141, 'TIRANT', 59, NULL, '', 1, NULL, 0),
(142, 'SILK PATH', 59, NULL, '', 1, NULL, 0),
(143, 'MOVENPICK HANOI HOTEL', 59, NULL, '', 1, NULL, 0),
(144, 'HANOI EMOTION HOTEL ', 59, NULL, '', 1, NULL, 0),
(145, 'None', 2, NULL, NULL, 1, NULL, 1),
(146, 'None', 2, NULL, NULL, 1, NULL, 1),
(147, 'None', 2, NULL, NULL, 1, NULL, 1),
(148, 'None', 2, NULL, NULL, 1, NULL, 1),
(149, 'NINH KIEU 2', 61, 0, NULL, 1, NULL, 0),
(150, 'None', 2, NULL, NULL, 1, NULL, 1),
(151, 'None', 2, NULL, NULL, 1, NULL, 1),
(154, 'None', 2, NULL, NULL, 1, NULL, 0),
(155, 'None', 2, NULL, NULL, 4, NULL, 0),
(156, 'Tràng An Tour', 2, 0, NULL, 4, NULL, 0),
(157, 'Tràng An', 2, 0, NULL, 3, NULL, 1),
(158, 'None', 2, NULL, NULL, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services_level`
--

CREATE TABLE IF NOT EXISTS `services_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `services_level`
--

INSERT INTO `services_level` (`id`, `name`, `description`, `service_type_id`, `deleted`) VALUES
(1, 'Colonial Deluxe (01 night)', '', 1, 0),
(2, 'Colonial City Deluxe (01 night)', '', 1, 0),
(3, 'Colonial Pool Deluxe (01 night)', '', 1, 0),
(4, 'Colonial River Deluxe (01 night)', '', 1, 0),
(5, 'Colonial Suite (01 night)', '', 1, 0),
(6, 'Colonial Deluxe (02 night)', '', 1, 0),
(7, 'Colonial City Deluxe (02 night)', '', 1, 0),
(8, 'Colonial Pool Deluxe(02 night)', '', 1, 0),
(9, 'Colonial River Deluxe(02 night)', '', 1, 0),
(10, 'Colonial Suite (02 night)', '', 1, 0),
(11, 'Colonial Deluxe (≥ 03 night)', '', 1, 0),
(12, 'Colonial City Deluxe (≥ 03 night)', '', 1, 0),
(13, 'Colonial Pool Deluxe (≥ 03 night)', '', 1, 0),
(14, 'Colonial River Deluxe (≥ 03 night)', '', 1, 0),
(15, 'Colonial Suite (≥ 03 night)', '', 1, 0),
(16, 'Colonial Deluxe (01 night)', '', 1, 0),
(17, 'Colonial City Deluxe (01 night)', '', 1, 0),
(18, 'Colonial Pool Deluxe (01 night)', '', 1, 0),
(19, 'Colonial River Deluxe (01 night)', '', 1, 0),
(20, 'Colonial Suite (01 night)', '', 1, 0),
(21, 'Colonial Deluxe (02 night)', '', 1, 0),
(22, 'Colonial City Deluxe (02 night)', '', 1, 0),
(23, 'Colonial Pool Deluxe(02 night)', '', 1, 0),
(24, 'Colonial River Deluxe(02 night)', '', 1, 0),
(25, 'Colonial Suite (02 night)', '', 1, 0),
(26, 'Colonial Deluxe (≥ 03 night)', '', 1, 0),
(27, 'Colonial City Deluxe (≥ 03 night)', '', 1, 0),
(28, 'Colonial Pool Deluxe (≥ 03 night)', '', 1, 0),
(29, 'Colonial River Deluxe (≥ 03 night)', '', 1, 0),
(30, 'Colonial Suite (≥ 03 night)', '', 1, 0),
(31, 'Oscar Cosy', '', 1, 0),
(32, 'Oscar Cosy Elegant', '', 1, 0),
(33, 'Deluxe', '', 1, 0),
(34, 'Premium Deluxe', '', 1, 0),
(35, 'Royal Deluxe', '', 1, 0),
(36, 'Oscar Deluxe', '', 1, 0),
(37, 'Oscar Cosy', '', 1, 0),
(38, 'Oscar Cosy Elegant', '', 1, 0),
(39, 'Deluxe', '', 1, 0),
(40, 'Premium Deluxe', '', 1, 0),
(41, 'Royal Deluxe', '', 1, 0),
(42, 'Oscar Deluxe', '', 1, 0),
(43, 'Oscar Cosy', '', 1, 0),
(44, 'Oscar Cosy Elegant', '', 1, 0),
(45, 'Deluxe', '', 1, 0),
(46, 'Premium Deluxe', '', 1, 0),
(47, 'Royal Deluxe', '', 1, 0),
(48, 'Oscar Deluxe', '', 1, 0),
(49, 'Oscar Cosy', '', 1, 0),
(50, 'Oscar Cosy Elegant', '', 1, 0),
(51, 'Deluxe', '', 1, 0),
(52, 'Premium Deluxe', '', 1, 0),
(53, 'Royal Deluxe', '', 1, 0),
(54, 'Oscar Deluxe', '', 1, 0),
(55, 'Superior (Inside view)', '', 1, 0),
(56, 'Deluxe (City/Garden/ Opera view', '', 1, 0),
(57, 'Junior Suite', '', 1, 0),
(58, 'Premium Suite', '', 1, 0),
(59, 'Continental Suite (Opera/Garden view)', '', 1, 0),
(60, 'Executive Suite (City view)', '', 1, 0),
(61, 'Deluxe (East Wing)', '', 1, 0),
(62, 'Rex Suite (East Wing)', '', 1, 0),
(63, 'Imperial Suite (East Wing)', '', 1, 0),
(64, 'Premium (West Wing)', '', 1, 0),
(65, 'Governor Suite (West Wing)', '', 1, 0),
(66, 'Family Governor Suite (West Wing)', '', 1, 0),
(67, 'Executive Premium (Executive Wing)', '', 1, 0),
(68, 'Executive Governor Suite (Executive Wing)', '', 1, 0),
(69, 'Executive Suite (Executive Wing)', '', 1, 0),
(70, 'Presidential Suite (Executive Wing)', '', 1, 0),
(71, 'Deluxe (East Wing)', '', 1, 0),
(72, 'Rex Suite (East Wing)', '', 1, 0),
(73, 'Imperial Suite (East Wing)', '', 1, 0),
(74, 'Premium (West Wing)', '', 1, 0),
(75, 'Governor Suite (West Wing)', '', 1, 0),
(76, 'Family Governor Suite (West Wing)', '', 1, 0),
(77, 'Executive Premium (Executive Wing)', '', 1, 0),
(78, 'Executive Governor Suite (Executive Wing)', '', 1, 0),
(79, 'Executive Suite (Executive Wing)', '', 1, 0),
(80, 'Presidential Suite (Executive Wing)', '', 1, 0),
(81, 'Deluxe (East Wing)', '', 1, 0),
(82, 'Rex Suite (East Wing)', '', 1, 0),
(83, 'Imperial Suite (East Wing)', '', 1, 0),
(84, 'Premium (West Wing)', '', 1, 0),
(85, 'Governor Suite (West Wing)', '', 1, 0),
(86, 'Family Governor Suite (West Wing)', '', 1, 0),
(87, 'Executive Premium (Executive Wing)', '', 1, 0),
(88, 'Executive Governor Suite (Executive Wing)', '', 1, 0),
(89, 'Executive Suite (Executive Wing)', '', 1, 0),
(90, 'Presidential Suite (Executive Wing)', '', 1, 0),
(91, 'Deluxe ', '', 1, 0),
(92, 'Premium', '', 1, 0),
(93, 'Governor Suite', '', 1, 0),
(94, 'Deluxe', '', 1, 0),
(95, 'Superior (Single Room)', '', 1, 0),
(96, 'Superior (Double/Twin Room)', '', 1, 0),
(97, 'Superior (Single Room)', '', 1, 0),
(98, 'Superior (Double/Twin Room)', '', 1, 0),
(99, 'Superior (SGL)', '', 1, 0),
(100, 'Superior (DBL)', '', 1, 0),
(101, 'Deluxe (SGL)', '', 1, 0),
(102, 'Deluxe (DBL)', '', 1, 0),
(103, 'Suite (SGL)', '', 1, 0),
(104, 'Suite (DBL)', '', 1, 0),
(105, 'Superior (SGL)', '', 1, 0),
(106, 'Superior (DBL)', '', 1, 0),
(107, 'Deluxe (SGL)', '', 1, 0),
(108, 'Deluxe (DBL)', '', 1, 0),
(109, 'Suite (SGL)', '', 1, 0),
(110, 'Suite (DBL)', '', 1, 0),
(111, 'Superior (SGL)', '', 1, 0),
(112, 'Superior (DBL)', '', 1, 0),
(113, 'Deluxe (SGL)', '', 1, 0),
(114, 'Deluxe (DBL)', '', 1, 0),
(115, 'Suite (SGL)', '', 1, 0),
(116, 'Suite (DBL)', '', 1, 0),
(117, 'Superior', '', 1, 0),
(118, 'Deluxe', '', 1, 0),
(119, 'Suite King', '', 1, 0),
(120, 'Family Connecting Room', '', 1, 0),
(121, 'Superior', '', 1, 0),
(122, 'Deluxe', '', 1, 0),
(123, 'Suite King', '', 1, 0),
(124, 'Family Connecting Room', '', 1, 0),
(125, 'Superior', '', 1, 0),
(126, 'Deluxe', '', 1, 0),
(127, 'Suite King', '', 1, 0),
(128, 'Family Connecting Room', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services_price`
--

CREATE TABLE IF NOT EXISTS `services_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `service_level` int(11) NOT NULL,
  `description` text,
  `level_name` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `services_price`
--

INSERT INTO `services_price` (`id`, `service_id`, `service_type_id`, `date_from`, `date_to`, `price_net`, `price_percent`, `price_gross`, `extra_net`, `extra_percent`, `extra_gross`, `discount_max`, `service_level`, `description`, `level_name`, `deleted`) VALUES
(1, 4, 1, '2014-10-01', '2015-03-31', 2500000, '8', 2700000, 0, 0, 0, 3, 1, 'Not in Public Holidays', 'Colonial Deluxe (01 night)', 0),
(2, 4, 1, '2014-10-01', '2015-03-31', 2700000, '8', 2916000, 0, 0, 0, 3, 2, 'Not in Public Holidays', 'Colonial City Deluxe (01 night)', 0),
(3, 4, 1, '2014-10-01', '2015-03-31', 2900000, '8', 3132000, 0, 0, 0, 3, 3, 'Not in Public Holidays', 'Colonial Pool Deluxe (01 night)', 0),
(4, 4, 1, '2014-10-01', '2015-03-31', 3200000, '8', 3456000, 0, 0, 0, 3, 4, 'Not in Public Holidays', 'Colonial River Deluxe (01 night)', 0),
(5, 4, 1, '2014-10-01', '2015-03-31', 3500000, '8', 3780000, 0, 0, 0, 3, 5, 'Not in Public Holidays', 'Colonial Suite (01 night)', 0),
(6, 4, 1, '2014-10-01', '2015-03-31', 2400000, '8', 2592000, 0, 0, 0, 3, 6, 'Not in Public Holidays', 'Colonial Deluxe (02 night)', 0),
(7, 4, 1, '2014-10-01', '2015-03-31', 2600000, '8', 2808000, 0, 0, 0, 3, 7, 'Not in Public Holidays', 'Colonial City Deluxe (02 night)', 0),
(8, 4, 1, '2014-10-01', '2015-03-31', 2800000, '8', 3024000, 0, 0, 0, 3, 8, 'Not in Public Holidays', 'Colonial Pool Deluxe(02 night)', 0),
(9, 4, 1, '2014-10-01', '2015-03-31', 3100000, '8', 3348000, 0, 0, 0, 3, 9, 'Not in Public Holidays', 'Colonial River Deluxe(02 night)', 0),
(10, 4, 1, '2014-10-01', '2015-03-31', 3400000, '8', 3672000, 0, 0, 0, 3, 10, 'Not in Public Holidays', 'Colonial Suite (02 night)', 0),
(11, 4, 1, '2014-10-01', '2015-03-31', 2300000, '8', 2484000, 0, 0, 0, 2, 11, 'Not in Public Holidays', 'Colonial Deluxe (≥ 03 night)', 0),
(12, 4, 1, '2014-10-01', '2015-03-31', 2500000, '8', 2700000, 0, 0, 0, 2, 12, 'Not in Public Holidays', 'Colonial City Deluxe (≥ 03 night)', 0),
(13, 4, 1, '2014-10-01', '2015-03-31', 2700000, '8', 2916000, 0, 0, 0, 2, 13, 'Not in Public Holidays', 'Colonial Pool Deluxe (≥ 03 night)', 0),
(14, 4, 1, '2014-10-01', '2015-03-31', 3000000, '8', 3240000, 0, 0, 0, 2, 14, 'Not in Public Holidays', 'Colonial River Deluxe (≥ 03 night)', 0),
(15, 4, 1, '2014-10-01', '2015-03-31', 3300000, '8', 3564000, 0, 0, 0, 2, 15, 'Not in Public Holidays', 'Colonial Suite (≥ 03 night)', 0),
(16, 4, 1, '2014-10-01', '2015-03-31', 2300000, '8', 2484000, 0, 0, 0, 2, 16, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Deluxe (01 night)', 0),
(17, 4, 1, '2014-10-01', '2015-03-31', 2500000, '8', 2700000, 0, 0, 0, 2, 17, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial City Deluxe (01 night)', 0),
(18, 4, 1, '2014-10-01', '2015-03-31', 2700000, '8', 2916000, 0, 0, 0, 2, 18, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Pool Deluxe (01 night)', 0),
(19, 4, 1, '2014-10-01', '2015-03-31', 3000000, '8', 3240000, 0, 0, 0, 2, 19, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial River Deluxe (01 night)', 0),
(20, 4, 1, '2014-10-01', '2015-03-31', 3300000, '8', 3564000, 0, 0, 0, 2, 20, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Suite (01 night)', 0),
(21, 4, 1, '2014-10-01', '2015-03-31', 2200000, '8', 2376000, 0, 0, 0, 2, 21, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Deluxe (02 night)', 0),
(22, 4, 1, '2014-10-01', '2015-03-31', 2400000, '8', 2592000, 0, 0, 0, 2, 22, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial City Deluxe (02 night)', 0),
(23, 4, 1, '2014-10-01', '2015-03-31', 2600000, '8', 2808000, 0, 0, 0, 2, 23, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Pool Deluxe(02 night)', 0),
(24, 4, 1, '2014-10-01', '2015-03-31', 2900000, '8', 3132000, 0, 0, 0, 2, 24, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial River Deluxe(02 night)', 0),
(25, 4, 1, '2014-10-01', '2015-03-31', 3200000, '8', 3456000, 0, 0, 0, 2, 25, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Suite (02 night)', 0),
(26, 4, 1, '2014-10-01', '2015-03-31', 2100000, '8', 2268000, 0, 0, 0, 2, 26, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Deluxe (≥ 03 night)', 0),
(27, 4, 1, '2014-10-01', '2015-03-31', 2300000, '8', 2484000, 0, 0, 0, 2, 27, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial City Deluxe (≥ 03 night)', 0),
(28, 4, 1, '2014-10-01', '2015-03-31', 2500000, '8', 2700000, 0, 0, 0, 2, 28, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Pool Deluxe (≥ 03 night)', 0),
(29, 4, 1, '2014-10-01', '2015-03-31', 2800000, '8', 3024000, 0, 0, 0, 2, 29, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial River Deluxe (≥ 03 night)', 0),
(30, 4, 1, '2014-10-01', '2015-03-31', 3100000, '8', 3348000, 0, 0, 0, 2, 30, 'Vietnamese/Chinese only, Not in Public Holidays', 'Colonial Suite (≥ 03 night)', 0),
(31, 33, 1, '2015-01-01', '2015-03-31', 925000, '21', 1119250, 0, 0, 0, 3, 31, '', 'Oscar Cosy', 0),
(32, 33, 1, '2015-01-01', '2015-03-31', 968000, '21', 1171280, 0, 0, 0, 3, 32, '', 'Oscar Cosy Elegant', 0),
(33, 33, 1, '2015-01-01', '2015-03-31', 1011000, '21', 1223310, 0, 0, 0, 3, 33, '', 'Deluxe', 0),
(34, 33, 1, '2015-01-01', '2015-03-31', 1032000, '21', 1248720, 0, 0, 0, 3, 34, '', 'Premium Deluxe', 0),
(35, 33, 1, '2015-01-01', '2015-03-31', 1097000, '21', 1327370, 0, 0, 0, 3, 35, '', 'Royal Deluxe', 0),
(36, 33, 1, '2015-01-01', '2015-03-31', 1161000, '21', 1404810, 0, 0, 0, 3, 36, '', 'Oscar Deluxe', 0),
(37, 33, 1, '2015-04-01', '2015-09-30', 800000, '21', 968000, 0, 0, 0, 3, 37, '', 'Oscar Cosy', 0),
(38, 33, 1, '2015-04-01', '2015-09-30', 840000, '21', 1016400, 0, 0, 0, 3, 38, '', 'Oscar Cosy Elegant', 0),
(39, 33, 1, '2015-04-01', '2015-09-30', 885000, '21', 1070850, 0, 0, 0, 3, 39, '', 'Deluxe', 0),
(40, 33, 1, '2015-04-01', '2015-09-30', 965000, '21', 1167650, 0, 0, 0, 3, 40, '', 'Premium Deluxe', 0),
(41, 33, 1, '2015-04-01', '2015-09-30', 1010000, '21', 1222100, 0, 0, 0, 3, 41, '', 'Royal Deluxe', 0),
(42, 33, 1, '2015-04-01', '2015-09-30', 1070000, '21', 1294700, 0, 0, 0, 3, 42, '', 'Oscar Deluxe', 0),
(43, 33, 1, '2015-10-01', '2015-12-31', 925000, '21', 1119250, 0, 0, 0, 3, 43, '', 'Oscar Cosy', 0),
(44, 33, 1, '2015-10-01', '2015-12-31', 968000, '21', 1171280, 0, 0, 0, 3, 44, '', 'Oscar Cosy Elegant', 0),
(45, 33, 1, '2015-10-01', '2015-12-31', 1011000, '21', 1223310, 0, 0, 0, 3, 45, '', 'Deluxe', 0),
(46, 33, 1, '2015-10-01', '2015-12-31', 1032000, '21', 1248720, 0, 0, 0, 3, 46, '', 'Premium Deluxe', 0),
(47, 33, 1, '2015-10-01', '2015-12-31', 1097000, '21', 1327370, 0, 0, 0, 3, 47, '', 'Royal Deluxe', 0),
(48, 33, 1, '2015-10-01', '2015-12-31', 1161000, '21', 1404810, 0, 0, 0, 3, 48, '', 'Oscar Deluxe', 0),
(49, 33, 1, '2014-10-11', '2014-12-31', 600000, '21', 726000, 0, 0, 0, 3, 49, '', 'Oscar Cosy', 0),
(50, 33, 1, '2014-10-11', '2014-12-31', 640000, '21', 774400, 0, 0, 0, 3, 50, '', 'Oscar Cosy Elegant', 0),
(51, 33, 1, '2014-10-11', '2014-12-31', 685000, '21', 828850, 0, 0, 0, 3, 51, '', 'Deluxe', 0),
(52, 33, 1, '2014-10-11', '2014-12-31', 765000, '21', 925650, 0, 0, 0, 3, 52, '', 'Premium Deluxe', 0),
(53, 33, 1, '2014-10-11', '2014-12-31', 810000, '21', 980100, 0, 0, 0, 3, 53, '', 'Royal Deluxe', 0),
(54, 33, 1, '2014-10-11', '2014-12-31', 870000, '21', 1052700, 0, 0, 0, 3, 54, '', 'Oscar Deluxe', 0),
(55, 7, 1, '2014-10-01', '2014-12-31', 2000000, '10', 2200000, 0, 5, 0, 3, 55, '', 'Superior (Inside view)', 0),
(56, 7, 1, '2014-10-01', '2014-12-31', 2200000, '10', 2420000, 630000, 5, 661500, 3, 56, '', 'Deluxe (City/Garden/ Opera view', 0),
(57, 7, 1, '2014-10-01', '2014-12-31', 2500000, '10', 2750000, 630000, 5, 661500, 3, 57, '', 'Junior Suite', 0),
(58, 7, 1, '2014-10-01', '2014-12-31', 2700000, '10', 2970000, 630000, 5, 661500, 3, 58, '', 'Premium Suite', 0),
(59, 7, 1, '2014-10-01', '2014-12-31', 3200000, '10', 3520000, 630000, 5, 661500, 3, 59, '', 'Continental Suite (Opera/Garden view)', 0),
(60, 7, 1, '2014-10-01', '2014-12-31', 4600000, '10', 5060000, 630000, 5, 661500, 3, 60, '', 'Executive Suite (City view)', 0),
(61, 2, 1, '2015-01-01', '2015-04-30', 2687500, '15', 3090625, 0, 5, 0, 2, 61, '', 'Deluxe (East Wing)', 0),
(62, 2, 1, '2015-01-01', '2015-04-30', 2902500, '15', 3337875, 860000, 5, 903000, 2, 62, '', 'Rex Suite (East Wing)', 0),
(63, 2, 1, '2015-01-01', '2015-04-30', 8600000, '15', 9890000, 0, 5, 0, 2, 63, '', 'Imperial Suite (East Wing)', 0),
(64, 2, 1, '2015-01-01', '2015-04-30', 2902500, '15', 3337875, 860000, 5, 903000, 2, 64, '', 'Premium (West Wing)', 0),
(65, 2, 1, '2015-01-01', '2015-04-30', 3225000, '15', 3708750, 860000, 5, 903000, 2, 65, '', 'Governor Suite (West Wing)', 0),
(66, 2, 1, '2015-01-01', '2015-04-30', 6450000, '15', 7417500, 0, 5, 0, 2, 66, '', 'Family Governor Suite (West Wing)', 0),
(67, 2, 1, '2015-01-01', '2015-04-30', 3547500, '15', 4079625, 860000, 5, 903000, 2, 67, '', 'Executive Premium (Executive Wing)', 0),
(68, 2, 1, '2015-01-01', '2015-04-30', 3870000, '15', 4450500, 860000, 5, 903000, 2, 68, '', 'Executive Governor Suite (Executive Wing)', 0),
(69, 2, 1, '2015-01-01', '2015-04-30', 6020000, '15', 6923000, 0, 5, 0, 2, 69, '', 'Executive Suite (Executive Wing)', 0),
(70, 2, 1, '2015-01-01', '2015-04-30', 16125000, '15', 18543750, 0, 5, 0, 2, 70, '', 'Presidential Suite (Executive Wing)', 0),
(71, 2, 1, '2015-05-01', '2015-09-30', 2365000, '15', 2719750, 0, 5, 0, 2, 71, '', 'Deluxe (East Wing)', 0),
(72, 2, 1, '2015-05-01', '2015-09-30', 2580000, '15', 2967000, 860000, 5, 903000, 2, 72, '', 'Rex Suite (East Wing)', 0),
(73, 2, 1, '2015-05-01', '2015-09-30', 8600000, '15', 9890000, 0, 5, 0, 2, 73, '', 'Imperial Suite (East Wing)', 0),
(74, 2, 1, '2015-05-01', '2015-09-30', 2580000, '15', 2967000, 860000, 5, 903000, 2, 74, '', 'Premium (West Wing)', 0),
(75, 2, 1, '2015-05-01', '2015-09-30', 3010000, '15', 3461500, 860000, 5, 903000, 2, 75, '', 'Governor Suite (West Wing)', 0),
(76, 2, 1, '2015-05-01', '2015-09-30', 6450000, '15', 7417500, 0, 5, 0, 2, 76, '', 'Family Governor Suite (West Wing)', 0),
(77, 2, 1, '2015-05-01', '2015-09-30', 3225000, '15', 3708750, 860000, 5, 903000, 2, 77, '', 'Executive Premium (Executive Wing)', 0),
(78, 2, 1, '2015-05-01', '2015-09-30', 3655000, '15', 4203250, 860000, 5, 903000, 2, 78, '', 'Executive Governor Suite (Executive Wing)', 0),
(79, 2, 1, '2015-05-01', '2015-09-30', 6020000, '15', 6923000, 0, 5, 0, 2, 79, '', 'Executive Suite (Executive Wing)', 0),
(80, 2, 1, '2015-05-01', '2015-09-30', 16125000, '15', 18543750, 0, 5, 0, 2, 80, '', 'Presidential Suite (Executive Wing)', 0),
(81, 2, 1, '2015-10-01', '2015-12-31', 2687500, '15', 3090625, 0, 5, 0, 2, 81, '', 'Deluxe (East Wing)', 0),
(82, 2, 1, '2015-10-01', '2015-12-31', 2902500, '15', 3337875, 860000, 5, 903000, 2, 82, '', 'Rex Suite (East Wing)', 0),
(83, 2, 1, '2015-10-01', '2015-12-31', 8600000, '15', 9890000, 0, 5, 0, 2, 83, '', 'Imperial Suite (East Wing)', 0),
(84, 2, 1, '2015-10-01', '2015-12-31', 2902500, '15', 3337875, 860000, 5, 903000, 2, 84, '', 'Premium (West Wing)', 0),
(85, 2, 1, '2015-10-01', '2015-12-31', 3225000, '15', 3708750, 860000, 5, 903000, 2, 85, '', 'Governor Suite (West Wing)', 0),
(86, 2, 1, '2015-10-01', '2015-12-31', 6450000, '15', 7417500, 0, 5, 0, 2, 86, '', 'Family Governor Suite (West Wing)', 0),
(87, 2, 1, '2015-10-01', '2015-12-31', 3547500, '15', 4079625, 860000, 5, 903000, 2, 87, '', 'Executive Premium (Executive Wing)', 0),
(88, 2, 1, '2015-10-01', '2015-12-31', 3870000, '15', 4450500, 860000, 5, 903000, 2, 88, '', 'Executive Governor Suite (Executive Wing)', 0),
(89, 2, 1, '2015-10-01', '2015-12-31', 6020000, '15', 6923000, 0, 5, 0, 2, 89, '', 'Executive Suite (Executive Wing)', 0),
(90, 2, 1, '2015-10-01', '2015-12-31', 16125000, '15', 18543750, 0, 5, 0, 2, 90, '', 'Presidential Suite (Executive Wing)', 0),
(91, 2, 1, '2014-11-17', '2015-03-31', 1900000, '30', 2470000, 0, 5, 0, 2, 91, '', 'Deluxe ', 0),
(92, 2, 1, '2014-11-17', '2015-03-31', 2100000, '30', 2730000, 860000, 5, 903000, 2, 92, '', 'Premium', 0),
(93, 2, 1, '2014-11-17', '2015-03-31', 2600000, '30', 3380000, 860000, 5, 903000, 2, 93, '', 'Governor Suite', 0),
(94, 25, 1, '2014-11-20', '2015-03-31', 1680000, '12', 1881600, 735000, 10, 808500, 2, 94, '', 'Deluxe', 0),
(95, 143, 1, '2014-12-19', '2015-01-04', 1785000, '12', 1999200, 735000, 10, 808500, 0, 95, '', 'Superior (Single Room)', 0),
(96, 143, 1, '2014-12-19', '2015-01-04', 1890000, '12', 2116800, 735000, 10, 808500, 0, 96, '', 'Superior (Double/Twin Room)', 0),
(97, 143, 1, '2015-02-13', '2015-03-01', 1575000, '12', 1764000, 735000, 10, 808500, 0, 97, '', 'Superior (Single Room)', 0),
(98, 143, 1, '2015-02-13', '2015-03-01', 1690000, '12', 1892800, 735000, 10, 808500, 0, 98, '', 'Superior (Double/Twin Room)', 0),
(99, 143, 1, '2015-01-01', '2015-04-30', 2730000, '10', 3003000, 735000, 10, 808500, 2, 99, '', 'Superior (SGL)', 0),
(100, 143, 1, '2015-01-01', '2015-04-30', 2940000, '10', 3234000, 735000, 10, 808500, 2, 100, '', 'Superior (DBL)', 0),
(101, 143, 1, '2015-01-01', '2015-04-30', 3150000, '10', 3465000, 735000, 10, 808500, 2, 101, '', 'Deluxe (SGL)', 0),
(102, 143, 1, '2015-01-01', '2015-04-30', 3360000, '10', 3696000, 735000, 10, 808500, 2, 102, '', 'Deluxe (DBL)', 0),
(103, 143, 1, '2015-01-01', '2015-04-30', 5040000, '10', 5544000, 735000, 10, 808500, 2, 103, '', 'Suite (SGL)', 0),
(104, 143, 1, '2015-01-01', '2015-04-30', 5250000, '10', 5775000, 735000, 10, 808500, 2, 104, '', 'Suite (DBL)', 0),
(105, 143, 1, '2015-10-01', '2015-12-31', 2730000, '10', 3003000, 735000, 10, 808500, 2, 105, '', 'Superior (SGL)', 0),
(106, 143, 1, '2015-10-01', '2015-12-31', 2940000, '10', 3234000, 735000, 10, 808500, 2, 106, '', 'Superior (DBL)', 0),
(107, 143, 1, '2015-10-01', '2015-12-31', 3150000, '10', 3465000, 735000, 10, 808500, 2, 107, '', 'Deluxe (SGL)', 0),
(108, 143, 1, '2015-10-01', '2015-12-31', 3360000, '10', 3696000, 735000, 10, 808500, 2, 108, '', 'Deluxe (DBL)', 0),
(109, 143, 1, '2015-10-01', '2015-12-31', 5040000, '10', 5544000, 735000, 10, 808500, 2, 109, '', 'Suite (SGL)', 0),
(110, 143, 1, '2015-10-01', '2015-12-31', 5250000, '10', 5775000, 735000, 10, 808500, 2, 110, '', 'Suite (DBL)', 0),
(111, 143, 1, '2015-05-01', '2015-09-30', 2520000, '10', 2772000, 735000, 10, 808500, 2, 111, '', 'Superior (SGL)', 0),
(112, 143, 1, '2015-05-01', '2015-09-30', 2730000, '10', 3003000, 735000, 10, 808500, 2, 112, '', 'Superior (DBL)', 0),
(113, 143, 1, '2015-05-01', '2015-09-30', 2940000, '10', 3234000, 735000, 10, 808500, 2, 113, '', 'Deluxe (SGL)', 0),
(114, 143, 1, '2015-05-01', '2015-09-30', 3150000, '10', 3465000, 735000, 10, 808500, 2, 114, '', 'Deluxe (DBL)', 0),
(115, 143, 1, '2015-05-01', '2015-09-30', 4830000, '10', 5313000, 735000, 10, 808500, 2, 115, '', 'Suite (SGL)', 0),
(116, 143, 1, '2015-05-01', '2015-09-30', 5040000, '10', 5544000, 735000, 10, 808500, 2, 116, '', 'Suite (DBL)', 0),
(117, 144, 1, '2015-05-01', '2015-09-30', 693000, '25', 866250, 320000, 25, 400000, 2, 117, '', 'Superior', 0),
(118, 144, 1, '2015-05-01', '2015-09-30', 840000, '25', 1050000, 320000, 25, 400000, 2, 118, '', 'Deluxe', 0),
(119, 144, 1, '2015-05-01', '2015-09-30', 1365000, '25', 1706250, 320000, 25, 400000, 2, 119, '', 'Suite King', 0),
(120, 144, 1, '2015-05-01', '2015-09-30', 1785000, '25', 2231250, 320000, 25, 400000, 2, 120, '', 'Family Connecting Room', 0),
(121, 144, 1, '2015-01-01', '2015-04-30', 840000, '25', 1050000, 320000, 25, 400000, 2, 121, '', 'Superior', 0),
(122, 144, 1, '2015-01-01', '2015-04-30', 945000, '25', 1181250, 320000, 25, 400000, 2, 122, '', 'Deluxe', 0),
(123, 144, 1, '2015-01-01', '2015-04-30', 1575000, '25', 1968750, 320000, 25, 400000, 2, 123, '', 'Suite King', 0),
(124, 144, 1, '2015-01-01', '2015-04-30', 1890000, '25', 2362500, 320000, 25, 400000, 2, 124, '', 'Family Connecting Room', 0),
(125, 144, 1, '2015-10-01', '2015-12-31', 840000, '25', 1050000, 320000, 25, 400000, 2, 125, '', 'Superior', 0),
(126, 144, 1, '2015-10-01', '2015-12-31', 945000, '25', 1181250, 320000, 25, 400000, 2, 126, '', 'Deluxe', 0),
(127, 144, 1, '2015-10-01', '2015-12-31', 1575000, '25', 1968750, 320000, 25, 400000, 2, 127, '', 'Suite King', 0),
(128, 144, 1, '2015-10-01', '2015-12-31', 1890000, '25', 2362500, 320000, 25, 400000, 2, 128, '', 'Family Connecting Room', 0),
(129, 1, 1, '1902-03-05', '0000-00-00', 1000000, '50', 1500000, 0, 0, 0, 0, 9, NULL, 'Colonial River Deluxe(02 night)', 0),
(130, 1, 1, '0000-00-00', '0000-00-00', 1200000, '70', 2040000, 0, 0, 0, 0, 0, NULL, 'B', 1),
(131, 1, 1, '0000-00-00', '0000-00-00', 1000000, '20', 1200000, 0, 0, 0, 0, 0, NULL, '0', 1),
(132, 1, 1, '2014-12-25', '2014-12-26', 700000, '50', 1050000, 0, 0, 0, 0, 0, NULL, '', 1),
(133, 1, 1, '2015-01-01', '2015-01-01', 1000000, '70', 1700000, 0, 0, 0, 0, 0, NULL, '', 1),
(134, 1, 1, '2015-01-01', '2015-01-01', 500000, '60', 800000, 0, 0, 0, 0, 0, NULL, '', 1),
(135, 1, 1, '2015-01-01', '2015-01-01', 800000, '40', 1120000, 0, 0, 0, 0, 0, NULL, '', 1),
(136, 149, 1, '2015-01-01', '2015-12-31', 1730000, '44', 2491200, 250000, 20, 300000, 15, 0, NULL, 'Suite', 0),
(137, 149, 1, '2015-01-01', '2015-01-01', 0, '0', 0, 0, 0, 0, 0, 0, NULL, '', 0),
(138, 1, 1, '2015-01-02', '2015-01-02', 0, '0', 0, 0, 0, 0, 0, 0, NULL, '', 1),
(145, 1, 1, '2014-12-25', '2015-01-03', 1000000, '30', 1300000, 100000, 20, 120000, 10, 0, NULL, 'Test', 0),
(146, 155, 4, '2015-01-09', '2015-01-09', 0, '0', 0, 0, 0, 0, 0, 0, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services_type`
--

CREATE TABLE IF NOT EXISTS `services_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services_type`
--

INSERT INTO `services_type` (`id`, `name`, `description`, `deleted`) VALUES
(1, 'hotel', 'Nhà hàng', 0),
(2, 'restaurent', 'Khách sạn', 0),
(3, 'tour', 'Địa điểm Tour', 0),
(4, 'transport', 'Phuơng tiện', 0),
(5, 'insurence', 'Bảo hiểm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_group_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`) VALUES
(1, 3, 'admin@genuinetours.com.vn', 'admin', '$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq', '127.0.0.1', 'XKVT29q2Jr', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2015-01-12 15:32:07', '2011-01-01 00:00:00'),
(2, 2, 'moderator@moderator.com', 'moderator', '$2a$08$q.0ZhovC5ZkVpkBLJ.Mz.O4VjWsKohYckJNx4KM40MXdP/zEZpwcm', '0.0.0.0', 'ZC38NNBPjF', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2012-04-10 21:58:02', '2011-08-04 16:49:07'),
(3, 1, 'public@public.com', 'public', '$2a$08$GlxQ00VKlev2t.CpvbTOlepTJljxF2RocJghON37r40mbDl4vJLv2', '0.0.0.0', 'CDNFV6dHmn', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2012-04-10 22:01:41', '2011-09-15 12:24:45'),
(4, 1, 'linh232324@gmail.com', 'linhho', '$2a$08$bfJ8IeF/42L2fs0jeLrCgOpnLK.0WGQiVOQJK7VBHePpYH80Vt0MC', '127.0.0.1', 'tzjYBBVWcJ', '97339083811629320b1e7384691a4c68ba123a32', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2015-01-07 17:34:39', '2015-01-07 17:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`) VALUES
(1, 'Public', 'Public User : has no admin access rights.', 0),
(2, 'Moderator', 'Admin Moderator : has partial admin access rights.', 1),
(3, 'Master Admin', 'Master Admin : has full admin access rights.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_sessions`
--

CREATE TABLE IF NOT EXISTS `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_sessions`
--

INSERT INTO `user_login_sessions` (`usess_uacc_fk`, `usess_series`, `usess_token`, `usess_login_date`) VALUES
(1, '', '0058f2baee61521c827c8a8beafa623ace0fdb89', '2015-01-02 13:52:53'),
(1, '', '099e88f4551ee86714304883edff60e0ed7b1e9e', '2015-01-10 17:27:01'),
(1, '', '0c1f804b96f0e7d327ae46cfebf7f2fa1de355e4', '2015-01-07 17:43:49'),
(1, '', '23aa6ae1a32743aabe816932db3740591986de41', '2015-01-10 16:29:51'),
(1, '', '27dcf0f6b61b4e089dbeecbba9fd7ba0653e938b', '2015-01-01 09:09:51'),
(1, '', '2a9adc92b0b2d2f9298606b31dc6afe1a59f6d36', '2015-01-01 11:49:34'),
(1, '', '32c9e1313e5312ed54c034ffbe250c6f670dd184', '2015-01-12 17:44:52'),
(1, '', '383d2371c933f91cf5386be05028729ad09cfe9e', '2015-01-11 04:01:15'),
(1, '', '3d3aef9cf2e4775d0d78956bfc77d2019bb03b66', '2015-01-07 04:18:12'),
(1, '', '528d33a52bd13374f0dde098d317219a6f61c4c3', '2015-01-02 05:29:58'),
(1, '', '670a209c02acd28dacc56b9345108a1ec93bf734', '2015-01-09 03:40:35'),
(1, '', '6c218d237a952aa2e82383437ed41561b095dc69', '2015-01-11 05:45:38'),
(1, '', '756a00d21c4ff4971065aad57f737932fb575abb', '2015-01-01 08:27:52'),
(1, '', '756ccdc353e2055830406fe39841dd4e8ca5ac08', '2015-01-02 06:29:44'),
(1, '', '818a2e4d43db45680c7bc7681e8922270dc39ce7', '2015-01-03 10:04:58'),
(1, '', '85e0543bd1fb0ddca8a3713ce641ab3d2eaf74b1', '2015-01-01 07:54:57'),
(1, '', 'ac68c86a55c8877b724f4b6692c076f5bd7c36f8', '2015-01-01 07:47:51'),
(1, '', 'b1b2328c83cac809062d0daa7ed85022983b96fb', '2015-01-12 09:16:44'),
(1, '', 'b706572e5637ab1604e02d651fbf841481c01e43', '2015-01-09 05:48:31'),
(1, '', 'edda9111e460a8077b1b993727433d3b18358be9', '2015-01-02 14:54:40'),
(1, '', 'f17f73adae7ebfad8ae2504cd8cda2e5f62c2147', '2015-01-02 09:16:03'),
(1, '', 'fea4c38cf02ad060c8dfcc36c9203b122876d3e4', '2015-01-05 03:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_groups`
--

CREATE TABLE IF NOT EXISTS `user_privilege_groups` (
  `upriv_groups_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `upriv_groups_ugrp_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_groups_id`),
  UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_privilege_groups`
--

INSERT INTO `user_privilege_groups` (`upriv_groups_id`, `upriv_groups_ugrp_fk`, `upriv_groups_upriv_fk`) VALUES
(1, 3, 1),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 3, 10),
(11, 3, 11),
(12, 2, 2),
(13, 2, 4),
(14, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_users`
--

CREATE TABLE IF NOT EXISTS `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_privilege_users`
--

INSERT INTO `user_privilege_users` (`upriv_users_id`, `upriv_users_uacc_fk`, `upriv_users_upriv_fk`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 2, 1),
(13, 2, 2),
(14, 2, 3),
(15, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`upriv_id`, `upriv_name`, `upriv_desc`) VALUES
(1, 'View Users', 'User can view user account details.'),
(2, 'View User Groups', 'User can view user groups.'),
(3, 'View Privileges', 'User can view privileges.'),
(4, 'Insert User Groups', 'User can insert new user groups.'),
(5, 'Insert Privileges', 'User can insert privileges.'),
(6, 'Update Users', 'User can update user account details.'),
(7, 'Update User Groups', 'User can update user groups.'),
(8, 'Update Privileges', 'User can update user privileges.'),
(9, 'Delete Users', 'User can delete user accounts.'),
(10, 'Delete User Groups', 'User can delete user groups.'),
(11, 'Delete Privileges', 'User can delete user privileges.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `created_date`, `modified_date`, `role`) VALUES
(1, 'linh', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
