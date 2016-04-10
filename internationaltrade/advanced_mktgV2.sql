-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 07:23 AM
-- Server version: 5.7.9-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advanced_mktg`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Food'),
(2, 'Electronics'),
(3, 'Raw Material'),
(4, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `create_deal`
--

CREATE TABLE IF NOT EXISTS `create_deal` (
  `deal_id` int(50) NOT NULL AUTO_INCREMENT,
  `id` int(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `qty` varchar(50) DEFAULT NULL,
  `unit_price` varchar(50) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `time_restricted` varchar(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `number_discount_option` varchar(100) DEFAULT NULL,
  `number_discount_1` varchar(64) DEFAULT NULL,
  `amount_discount_1` varchar(64) DEFAULT NULL,
  `number_discount_2` varchar(64) DEFAULT NULL,
  `amount_discount_2` varchar(64) DEFAULT NULL,
  `number_discount_3` varchar(64) DEFAULT NULL,
  `amount_discount_3` varchar(64) DEFAULT NULL,
  `location_restricted` varchar(10) DEFAULT NULL,
  `location_description` text,
  `shipping_included` varchar(10) DEFAULT NULL,
  `shipping_description` text,
  `deal_image` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`deal_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `create_deal`
--

INSERT INTO `create_deal` (`deal_id`, `id`, `title`, `description`, `qty`, `unit_price`, `unit`, `time_restricted`, `start_date`, `end_date`, `number_discount_option`, `number_discount_1`, `amount_discount_1`, `number_discount_2`, `amount_discount_2`, `number_discount_3`, `amount_discount_3`, `location_restricted`, `location_description`, `shipping_included`, `shipping_description`, `deal_image`) VALUES
(55, NULL, 'Image', 'Checking database for image', '10', '20', 'bottles', 'yes', '2016-03-14', '2016-06-06', '1', '200', '10.00', '', '', '', '', 'no', 'Checking database for image', 'no', '', 'IMG_1003.JPG'),
(56, NULL, 'Laptop', 'Sale of laptop description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', 'yes', 'Sale of laptop description', 'yes', '2', 'laptop.jpe'),
(57, NULL, 'iPhone', 'Sale of iphone description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', 'yes', 'Sale of iphone description', 'yes', '2', 'iphone.jpe'),
(58, NULL, 'Milk', 'Sale of food description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', 'yes', 'Sale of food description', 'yes', '2', 'milk.jpe'),
(59, NULL, 'Sugar', 'Sale of sugar description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', 'yes', 'Sale of sugar description', 'yes', '2', 'sugar bag.jpe'),
(60, NULL, 'Rice', 'Sale of Rice description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', 'yes', 'Sale of Rice description', 'yes', '2', 'Rice bag.jpe'),
(61, NULL, 'Rice', 'Sale of Rice description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '20', '500', '10', '', '', 'yes', 'Sale of Rice description', 'yes', '2', 'Rice bag.jpe'),
(62, NULL, 'New product', 'Sale of Rice description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '20', '500', '10', '', '', 'yes', 'Sale of Rice description', 'yes', '2', 'Rice bag.jpe'),
(63, NULL, 'flowers', 'Sale of Rice description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '20', '500', '10', '', '', 'yes', 'Sale of Rice description', 'yes', '2', 'IMG_0001.JPG'),
(64, NULL, 'flowers', 'Sale of Rice description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '20', '500', '10', '', '', 'yes', 'Sale of Rice description', 'yes', '2', 'IMG_0002.JPG'),
(65, NULL, 'flowers', 'Sale of Rice description', '10', '20', 'case', 'yes', '2016-03-14', '2016-06-06', '2', '100', '20', '500', '10', '', '', 'yes', 'Sale of Rice description', 'yes', '2', 'IMG_0131.JPG'),
(66, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'red table.jpe'),
(67, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'red table.jpe'),
(68, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'table.jpe'),
(69, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'black table.jpe'),
(70, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'black table.jpe'),
(71, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'black table.jpe'),
(72, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'table.jpe'),
(73, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'table.jpe'),
(74, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'table.jpe'),
(75, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'table.jpe'),
(76, NULL, 'table', 'description of table', '10', '5', 'case', 'yes', '2016-03-15', '2016-05-03', '1', '15', '20', '', '', '', '', 'no', 'description of table', 'no', '', 'table.jpe');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `business_name` varchar(50) DEFAULT NULL,
  `food_category` tinyint(1) DEFAULT NULL,
  `electronics_category` tinyint(1) DEFAULT NULL,
  `rawmaterial_Category` tinyint(1) DEFAULT NULL,
  `entertainment_Category` tinyint(1) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `receive_message` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `type`, `email`, `password`, `first_name`, `last_name`, `business_name`, `food_category`, `electronics_category`, `rawmaterial_Category`, `entertainment_Category`, `Address`, `mobile_number`, `receive_message`) VALUES
(4, 'seller', 'abc@gmail.com', 'hithere', 'jack', 'sparrow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'seller', 'sv.nikita91@yahoo.com', '1234', 'Nikita', 'Sadinidhi', '1991', 0, 1, 0, 0, '13374 Linnea St\r\nEastvale', '9512646992', 'yes'),
(8, 'buyer', 'sv.nikita91@yahoo.com', '2345', 'Nikita', 'Sadinidhi', '', 0, 0, 1, 0, '13374 Linnea St', '', 'yes'),
(9, 'buyer', 'sv.nikita91@yahoo.com', '2345', 'Nikita', 'Sadinidhi', NULL, 0, 0, 1, 0, '13374 Linnea St', '9512646992', 'yes'),
(10, 'buyer', 'sv.nikita91@yahoo.com', '2345', 'Nikita', 'Sadinidhi', NULL, 0, 0, 1, 0, '13374 Linnea St', '9512646992', 'yes'),
(11, 'buyer', 'sv.nikita91@yahoo.com', '2345', 'Nikita', 'Sadinidhi', NULL, 0, 0, 1, 0, '13374 Linnea St', '9512646992', 'yes'),
(12, 'seller', 'sv.nikita.nikita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055<br/>', 'NIKITA', 'VIJAYAN', 'food', 0, 0, 1, 0, '31B/116 LOGANATHAN STREET\r\n', '099405924', 'yes'),
(13, 'seller', 'sv.nikita.nikita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'NIKITA', 'VIJAYAN', 'food', 0, 0, 1, 0, '31B/116 LOGANATHAN STREET\r\n', '099405924', 'yes'),
(14, 'seller', 'sv.nikita.nikita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'NIKITA', 'VIJAYAN', 'food', 0, 0, 1, 1, '31B/116 LOGANATHAN STREET\r\n', '099405924', 'yes'),
(15, 'seller', 'sv.nikita91@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Nikita', 'Sadinidhi', '1991', 1, 1, 0, 0, '13374 Linnea St\r\nEastvale', '9512646992', 'yes'),
(16, 'seller', 'sv.nikita91@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Nikita', 'Sadinidhi', '1991', 1, 1, 0, 0, '13374 Linnea St\r\nEastvale', '9512646992', 'yes'),
(17, 'seller', 'asdf@asdf.com', '12', 'fff', 'lll', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'seller', 'sv.nikita91@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Nikita', 'Sadinidhi', '1991', 0, 0, 1, 1, '13374 Linnea St\r\nEastvale', '9512646992', 'yes'),
(19, 'buyer', 'sv.nikita91@yahoo.com', '1234', 'Nikita', 'SADINIDHI', NULL, 1, 1, 0, 0, '13374 Linnea St', '9512646992', 'yes');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `create_deal`
--
ALTER TABLE `create_deal`
  ADD CONSTRAINT `create_deal_ibfk_1` FOREIGN KEY (`id`) REFERENCES `register` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
