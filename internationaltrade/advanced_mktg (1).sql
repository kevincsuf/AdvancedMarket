-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2016 at 05:08 AM
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
-- Table structure for table `create_deal`
--
-- Creation: Mar 12, 2016 at 03:55 AM
--

CREATE TABLE IF NOT EXISTS `create_deal` (
  `Deal_id` int(50) NOT NULL AUTO_INCREMENT,
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
  `number_discount_1` varchar(64) NOT NULL,
  `amount_discount_1` varchar(64) NOT NULL,
  `number_discount_2` varchar(64) DEFAULT NULL,
  `amount_discount_2` varchar(64) DEFAULT NULL,
  `number_discount_3` varchar(64) DEFAULT NULL,
  `amount_discount_3` varchar(64) DEFAULT NULL,
  `location_restricted` varchar(10) DEFAULT NULL,
  `location_description` text,
  `shipping_included` varchar(10) DEFAULT NULL,
  `shipping_description` text,
  PRIMARY KEY (`Deal_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `create_deal`
--

INSERT INTO `create_deal` (`Deal_id`, `id`, `title`, `description`, `qty`, `unit_price`, `unit`, `time_restricted`, `start_date`, `end_date`, `number_discount_option`, `number_discount_1`, `amount_discount_1`, `number_discount_2`, `amount_discount_2`, `number_discount_3`, `amount_discount_3`, `location_restricted`, `location_description`, `shipping_included`, `shipping_description`) VALUES
(1, NULL, 'dsfds', 'rocky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(2, NULL, 'yourock', 'rocky12', '100', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(3, NULL, 'yourocky', 'rocky12rw', '100', '10', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(4, NULL, 'yourockyw', 'rocky12rwer', '100', '10', NULL, 'No', NULL, NULL, '1', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(5, NULL, 'youro', 'hiboss', '100', '10', NULL, 'No', NULL, NULL, '1', '', '', '', '', '', '', 'No', NULL, 'No', NULL),
(6, NULL, 'timerest', 'hellothere', '10', '10', NULL, 'Yes', '2016-03-09', NULL, '1', '', '', '', '', '', '', 'No', NULL, 'No', NULL),
(7, NULL, 'timerest', 'hellothere', '10', '10', NULL, 'No', '2016-03-09', NULL, '1', '', '', '', '', '', '', 'No', NULL, 'No', NULL),
(8, NULL, 'timetest', 'makeitwork', '10', '10', NULL, 'Yes', '2016-03-09', '2016-03-10', '1', '', '', '', '', '', '', 'No', NULL, 'No', NULL),
(9, NULL, 'it works', 'makeitwork', '10', '10', NULL, 'Yes', '2016-03-09', '2016-03-10', '1', '', '', '', '', '', '', 'No', NULL, 'No', NULL),
(10, NULL, 'it works again', 'makeitwork', '10', '10', NULL, 'Yes', '2016-03-10', '2016-03-10', '1', '', '', '', '', '', '', 'No', NULL, 'No', NULL),
(11, NULL, 'Food Corp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(12, NULL, 'Food Corp', 'Food Corp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(13, NULL, 'Food Corp', 'Food Corp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(14, NULL, 'Food Corp', 'Food Corp', '100', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(15, NULL, 'Food Corp', 'Food Corp', '100', NULL, 'kg', NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(16, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'kg', NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(17, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'kg', 'No', NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(18, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'Bags', 'No', NULL, NULL, NULL, '', '', '', '', '', '', 'No', NULL, NULL, NULL),
(19, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'Bags', 'No', NULL, NULL, NULL, '', '', '', '', '', '', 'Yes', 'Only for California', NULL, NULL),
(20, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'Bags', 'No', NULL, NULL, NULL, '', '', '', '', '', '', 'Yes', 'Only for California', NULL, 'Shipping cost is $10'),
(21, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'Bags', 'Yes', '2016-03-10', '2016-03-20', NULL, '', '', '', '', '', '', 'Yes', 'Only for California', NULL, 'Shipping cost is $10'),
(22, NULL, 'Food Corp', 'Food Corp', '100', '$60', 'Bags', 'Yes', '2016-03-10', '2016-03-20', '2', '', '', '', '', '', '', 'Yes', 'Only for California', NULL, 'Shipping cost is $10'),
(23, NULL, 'Food Corp', 'Food Corp', '1000', '$60', 'Bottles', 'Yes', '2016-03-10', '2016-03-20', '2', '', '', '', '', '', '', 'Yes', 'Only for California, Nevada', NULL, 'Shipping cost is $20');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--
-- Creation: Mar 11, 2016 at 08:41 PM
-- Last update: Mar 12, 2016 at 01:52 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(14, 'seller', 'sv.nikita.nikita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'NIKITA', 'VIJAYAN', 'food', 0, 0, 1, 1, '31B/116 LOGANATHAN STREET\r\n', '099405924', 'yes');

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
