-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2016 at 11:46 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Food'),
(2, 'Electronics'),
(3, 'Raw Material'),
(4, 'Entertainment'),
(5, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `create_deal`
--

CREATE TABLE IF NOT EXISTS `create_deal` (
  `deal_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `user_name` varchar(64) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `deal_category` varchar(64) DEFAULT NULL,
  `qty` varchar(50) DEFAULT NULL,
  `max_order` int(50) DEFAULT NULL,
  `unit_price` varchar(50) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `other_unit` varchar(16) DEFAULT NULL,
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
  `max_quantity` varchar(64) DEFAULT NULL,
  `location_restricted` varchar(10) DEFAULT NULL,
  `location_description` text,
  `shipping_included` varchar(10) DEFAULT NULL,
  `shipping_description` text,
  `deal_image` varchar(64) DEFAULT NULL,
  `deal_closed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`deal_id`),
  KEY `id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `create_deal`
--

INSERT INTO `create_deal` (`deal_id`, `user_id`, `user_name`, `title`, `description`, `deal_category`, `qty`, `max_order`, `unit_price`, `unit`, `other_unit`, `time_restricted`, `start_date`, `end_date`, `number_discount_option`, `number_discount_1`, `amount_discount_1`, `number_discount_2`, `amount_discount_2`, `number_discount_3`, `amount_discount_3`, `max_quantity`, `location_restricted`, `location_description`, `shipping_included`, `shipping_description`, `deal_image`, `deal_closed`) VALUES
(56, NULL, 'abc@gmail.com', 'Laptop', '15.6" Full HD (1920*1080) provides more clarity and sharp visual experience on video, photo and games\r\nPowerful 5th-generation Intel Core i3-5010U 2.1GHz, Broadwell.\r\n4GB RAM/ 500GB 5400RPM with DL DVD±RW/CD-RW.\r\nEquipped WiFi 802.11ac. This is almost 3x faster than the typical 802.11n.\r\nFeature 2 x USB 3.0, 1 x USB 2.0, 1 x HDMI and VGA ports.\r\n1 year International Warranty with 1 year Accidental Damage Protection\r\nErgonomically designed keyboard with IceCool technology keeps the palm rest at a comfort temperature', '4', '10', 20, '250', 'piece', NULL, 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', '500', 'yes', 'Sale of laptop description', 'yes', '2', 'laptop.jpe', 0),
(57, NULL, NULL, 'iPhone', 'Sale of iphone description\r\nApple iPhone 5s 16GB (Space Gray) - Verizon Wireless\r\n16 GB Storage Capacity (Estimated Free Space 12.2 GB)', '5', '10', 20, '250', 'Kg', NULL, 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', '500', 'yes', 'Sale of iphone description', 'yes', '2', 'iphone.jpe', 0),
(59, 18, 'sv.nikita91@gmail.com', 'Sugar', 'Sale of sugar description', '1', '10', 20, '250', 'case', NULL, 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', '500', 'yes', 'Sale of sugar description', 'yes', '2', 'sugar bag.jpe', 0),
(60, 18, 'sv.nikita91@gmail.com', 'Rice', 'After removal of the rice grain from the chaff, the rice can be used as brown rice or further processed to remove the bran to produce white rice. Brown and white rice may be consumed after cooking or may be ground into rice flour. Rice can be puffed under low pressure to produce puffed rice that is commonly used as a breakfast cereal. Rice bran oil can be produced from the inner husk and can be used as a cooking oil. Rice starch can be extracted and fermented to produce rice wine or brewed to produce sake.', '1', '10', 20, '250', 'case', NULL, 'yes', '2016-03-14', '2016-06-06', '2', '100', '200', '500', '100', '', '', '500', 'yes', 'Sale of Rice description', 'yes', '2', 'Rice bag.jpe', 0),
(61, NULL, NULL, 'Rice', 'Sale of Rice description', '1', '10', 20, '250', 'case', NULL, 'yes', '2016-03-14', '2016-06-06', '2', '100', '20', '500', '10', '', '', '500', 'yes', 'Sale of Rice description', 'yes', '2', 'Rice bag.jpe', 0),
(70, 18, 'sv.nikita91@gmail.com', 'table', 'Powder-coated steel and high-density polyethylene (hdpe) plastic\r\n48-inch x 24-inch molded tabletop\r\nFolds in half for storage and transport\r\nThree Adjustable Height Settings; (22-Inch, 29-Inch and 36-Inch)\r\nConvenient carry handle', '3', '5', 5, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'yes', 'California only', 'no', '', 'black table.jpe', 0),
(71, NULL, 'abc@gmail.com', 'table', 'Powder-coated steel and high-density polyethylene (hdpe) plastic\r\n48-inch x 24-inch molded tabletop\r\nFolds in half for storage and transport\r\nThree Adjustable Height Settings; (22-Inch, 29-Inch and 36-Inch)\r\nConvenient carry handle\r\n2 in 1 Coffee table with hidden accent table on wheels\r\nHandy drawer for TV remote, magazines pens etc\r\nUnique concept with 2 tables in one\r\nDimensions: 38" Diameter x 20" H. Accent table: 21 1/2" Diameter x 15" H', '3', '10', 10, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '500', '200', '', '', '', '', '500', 'yes', 'Texas only', 'no', '', 'black table.jpe', 0),
(72, NULL, NULL, 'table', 'description of table', '', '10', 20, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'table.jpe', 0),
(73, 18, 'sv.nikita91@gmail.com', 'table', 'description of table', '3', '10', 20, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'table.jpe', 0),
(76, 18, 'sv.nikita91@gmail.com', 'table', 'description of table', '3', '10', 20, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'table.jpe', 0),
(77, NULL, 'sv.nikita91@gmail.com', 'table', 'description of table', '3', '10', 20, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'black table.jpe', 0),
(78, NULL, 'sv.nikita91@gmail.com', 'table', 'description of table', '3', '10', 20, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'table.jpe', 0),
(79, NULL, 'sv.nikita91@gmail.com', 'table', 'description of table', '3', '10', 20, '5', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'black table.jpe', 0),
(80, NULL, 'abc@gmail.com', 'table', 'description of table', '3', '10', 30, '50', 'case', NULL, 'yes', '2016-03-15', '2016-05-03', '1', '150', '20', '', '', '', '', '150', 'no', 'description of table', 'no', '', 'black table.jpe', 0),
(82, NULL, 'abc@gmail.com', 'deal 12', 'description goes here', '1', '10', 20, '20', 'bottles', NULL, 'yes', '2016-03-29', '2016-05-03', '2', '500', '12', '800', '10', '', '', '800', 'yes', 'description goes here', 'yes', '2', 'sugar bag.jpe', 0),
(83, NULL, 'abc@gmail.com', 'deal 12', 'description goes here', '1', '10', 20, '20', 'bottles', NULL, 'yes', '2016-03-29', '2016-05-03', '2', '500', '12', '800', '10', '', '', '800', 'yes', 'description goes here', 'yes', '2', 'sugar bag.jpe', 0),
(84, 4, 'abc@gmail.com', 'deal 12', 'description goes here', '1', '10', 50, '20', 'bottles', NULL, 'yes', '2016-03-29', '2016-05-03', '2', '500', '12', '800', '10', '', '', '800', 'yes', 'description goes here', 'yes', '2', 'sugar bag.jpe', 0),
(85, 4, 'abc@gmail.com', 'deal 13', 'description with user name', '1', '20', 50, '50', 'bottles', NULL, 'yes', '2016-08-12', '2016-09-12', '1', '500', '35', '800', '10', '', '', NULL, 'no', 'description with user name', 'no', '', 'sugar bag.jpe', 1),
(88, 4, 'abc@gmail.com', 'test 2', 'checking for catefory', '4', '50', 100, '10', 'vpack', NULL, 'yes', '2016-08-12', '2016-09-12', '1', '500', '5', '800', '2', '', '', NULL, 'no', 'checking for catefory', 'no', '', 'laptop.jpe', 0),
(89, 4, 'abc@gmail.com', 'deal 23', 'Testing user key', '2', '50', 100, '10', 'bottles', NULL, 'yes', '2016-04-01', '2016-04-30', '1', '800', '7.50', '1000', '5', '', '', NULL, 'no', 'Testing user key', 'no', '', 'laptop.jpe', 1),
(90, 4, 'abc@gmail.com', 'deal 23', 'Testing user key', '2', '50', 100, '10', 'bottles', NULL, 'yes', '2016-04-01', '2016-04-30', '1', '800', '7.50', '1000', '6', '', '', NULL, 'no', 'Testing user key', 'no', '', 'laptop.jpe', 0),
(91, 4, 'abc@gmail.com', 'deal 23', 'Testing user key', '2', '50', 100, '10', 'bottles', NULL, 'yes', '2016-04-01', '2016-04-30', '1', '800', '7.50', '1000', '6', '', '', NULL, 'no', 'Testing user key', 'no', '', 'laptop.jpe', 1),
(94, 4, 'abc@gmail.com', 'Cycle', 'new product cycle', '4', '5', 10, '500', 'case', NULL, 'yes', '2016-04-09', '2016-04-30', '1', '100', '350', '', '', '', '', NULL, 'no', 'new product cycle', 'no', '', 'mtb-cycle-250x250.jpg', 0),
(95, 4, 'abc@gmail.com', 'Cycle', 'new product cycle', '4', '5', 10, '500', 'case', NULL, 'yes', '2016-04-09', '2016-04-30', '1', '100', '350', '', '', '', '', '100', 'no', 'new product cycle', 'no', '', 'mtb-cycle-250x250.jpg', 0),
(96, 4, 'abc@gmail.com', 'Cycle', 'new product cycle', '4', '5', 10, '500', 'case', NULL, 'yes', '2016-04-09', '2016-04-30', '1', '100', '350', '', '', '', '', '100', 'no', 'new product cycle', 'no', '', 'mtb-cycle-250x250.jpg', 0),
(97, 4, 'abc@gmail.com', 'Tyre', 'new product cycle tyre', '4', '50', 60, '500', 'case', NULL, 'yes', '2016-04-09', '2016-04-30', '2', '100', '350', '200', '300', '', '', '200', 'no', 'new product cycle tyre', 'no', '', 'mtb-cycle-250x250.jpg', 0),
(98, 4, 'abc@gmail.com', 'Tyre', 'new product cycle tyre', '4', '50', 60, '500', 'case', NULL, 'yes', '2016-04-09', '2016-04-30', '3', '100', '350', '200', '300', '250', '250', '250', 'no', 'new product cycle tyre', 'no', '', 'mtb-cycle-250x250.jpg', 1),
(101, 29, 'asdf@asdf.com', 'Performance Mouse MX', 'The Darkfield Laser Sensorâ€”a Logitech exclusiveâ€” tracks flawlessly where optical and standard laser mice fail.', '2', '10', 100, '99', 'other', NULL, 'no', '2016-04-21', '2016-05-21', '2', '100', '94', '200', '89', '', '', NULL, 'no', '', 'no', '', '19678.png', 1),
(102, 4, 'abc@gmail.com', 'mountain bike', 'For a classic mountain bike with quality features, the DiamondbackÂ® Adult Overdrive Mountain Bike is the bike for you. Take the Overdrive Bike on a cross-country ride and experience its lightweight 6061-T6 aluminum frame, Shimano 8-speeds, and SR Suntour XCT suspension fork. Its 27.5" wheels and mechanical disc brakes offer control and clearance for quick stops as you travel on dirt tracks.', '4', '10', 20, '600', 'case', NULL, 'yes', '2016-04-22', '2016-05-30', '2', '50', '500', '100', '400', '', '', NULL, 'no', '', 'no', '', 'mountain bike.png', 1),
(103, 4, 'abc@gmail.com', 'mountain bike', 'The Ledge 2.1 Mountain Bike is great for young riders who are looking to start pushing their limits on mountain bike trails. The four-bar linkage, full-suspension frame offers a comfortable, controlled ride while providing a stable base.', '4', '20', 30, '600', 'case', NULL, 'yes', '2016-04-22', '2016-05-30', '3', '100', '500', '200', '400', '300', '350', NULL, 'no', '', 'no', '', 'mountain bike.png', 1),
(104, 4, 'abc@gmail.com', 'hp laptop', 'Work confidently on the 15.6-inch diagonal HP ProBook 455 that passed MIL-STD 810G testing[2] with an aluminum reinforced keyboard deck and a new gravity black LCD cover design.\r\n15.6" Full HD (1920*1080) provides more clarity and sharp visual experience on video, photo and games\r\nPowerful 5th-generation Intel Core i3-5010U 2.1GHz, Broadwell.\r\n4GB RAM/ 500GB 5400RPM with DL DVD±RW/CD-RW.\r\nEquipped WiFi 802.11ac. This is almost 3x faster than the typical 802.11n.\r\nFeature 2 x USB 3.0, 1 x USB 2.0, 1 x HDMI and VGA ports.\r\n1 year International Warranty with 1 year Accidental Damage Protection\r\nErgonomically designed keyboard with IceCool technology keeps the palm rest at a comfort temperature', '2', '10', 20, '699', 'case', NULL, 'yes', '2016-04-25', '2016-05-25', '2', '60', '500', '100', '400', '', '', NULL, 'no', '', 'no', '', 'Hp laptop.png', 1),
(105, 4, 'abc@gmail.com', 'organic nuts', 'These little gems are packed full of mono-unsaturated fatty acids, Vitamin E, selenium, antioxidants, thiamin, copper and magnesium. High in calories and protein, these nuts are a staple to the Amazonian diet and should be in yours, too! ', '1', '10', 20, '20', 'bags', NULL, 'yes', '2016-04-30', '2016-05-15', '2', '100', '17.65', '200', '12.65', '', '', NULL, 'no', '', 'no', '', 'Nuts.png', 1),
(106, 4, 'abc@gmail.com', 'rice bag', ' 	Long Grain White Rice - Bulk 50 Pound Bag ', '1', '5', 10, '150', 'bags', NULL, 'yes', '2016-04-23', '2016-05-30', '3', '100', '110', '150', '90', '200', '80', NULL, 'yes', 'for california only', 'no', '', 'Rice Bag.png', 1),
(107, 4, 'abc@gmail.com', 'canon camera', 'Canon EOS 5D Mark III DSLR Camera with 24â€“70mm f/4L IS lens: Snap crisp, detailed photos of important moments for your clients or your loved ones using this DSLR camera, which comes with a 24-70mm lens with image stabilization to help you get started. The DIGIC 5+ image processor and 22.3-megapixel CMOS sensor ensure edge-to-edge image clarity while maintaining rapid capture speeds. ', '2', '20', 50, '600', 'case', NULL, 'no', '2016-04-22', '2016-05-22', '3', '500', '500', '1000', '450', '1500', '380', NULL, 'no', '', 'yes', '$20', 'canon digital camera.png', 0),
(108, 4, 'abc@gmail.com', 'ipod', 'Apple 64GB iPod Touch (6th Generation) Like an iPhone without the phone, the iPod Touch has a crisp Retina touchscreen display, WiFi connectivity, access to Appleâ€™s huge App Store, and, of course, enough storage space to store tons of music.', '5', '10', 20, '279.99', 'case', NULL, 'no', '2016-04-22', '2016-05-22', '3', '100', '244.99', '200', '199.99', '500', '159.99', '500', 'no', '', 'yes', '$10', 'iPod.png', 0),
(109, 35, 'kevin.csuf@gmail.com', 'Mechanical Keyboard', 'A mechanical keyboard uses actual, physical switches underneath the keys to determine when the user has pushed a key.', '2', '10', 100, '100', 'other', 'ea', 'no', '2016-04-25', '2016-05-25', '3', '30', '95', '60', '90', '100', '85', '100', 'no', '', 'no', '', 'keyboard0424.png', 1),
(110, 40, 'sonia0682@gmail.com', 'play station-3', 'The ultimate in gaming and home entertainment, PlayStationÂ®3 creates brand new experiences for the whole family. Go on incredible adventures, watch movies in stunning High Definition, dive into a world of entertainment with free access to PlayStationÂ®Network and more.', '2', '5', 10, '250', 'case', '', 'no', '2016-04-26', '2016-05-26', '1', '10', '200', '', '', '', '', '10', 'yes', 'california only', 'yes', '$5.99', 'play station 3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `join_deal`
--

CREATE TABLE IF NOT EXISTS `join_deal` (
  `order_id` int(32) NOT NULL AUTO_INCREMENT,
  `create_deal_id` int(32) DEFAULT NULL,
  `user_id` int(32) DEFAULT NULL,
  `order_quantity` int(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zipcode` int(64) DEFAULT NULL,
  `closure_date` date DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `join_deal`
--

INSERT INTO `join_deal` (`order_id`, `create_deal_id`, `user_id`, `order_quantity`, `address`, `state`, `zipcode`, `closure_date`) VALUES
(1, NULL, 4, NULL, NULL, NULL, NULL, NULL),
(2, 91, 4, NULL, NULL, NULL, NULL, NULL),
(3, 91, 4, 50, NULL, NULL, NULL, NULL),
(4, 91, 4, 50, '13374 Linnea St', NULL, NULL, NULL),
(5, 91, 4, 50, '13374 Linnea St', 'California', 92880, NULL),
(6, 91, 4, 50, '13374 Linnea St', 'California', 92880, '2016-04-30'),
(7, 91, 4, 50, '13374 Linnea St', 'California', 92880, '2016-04-30'),
(8, 98, 4, 50, '13374 Linnea St', 'California', 92880, '2016-04-30'),
(9, 98, 22, 50, '750 Hamner', 'CA', 94401, '2016-04-30'),
(10, 87, 22, 100, '13374 Linnea St', 'California', 92880, '2016-04-13'),
(11, 87, 22, 100, '13374 Linnea St', 'California', 92880, '2016-04-13'),
(12, 87, 22, 100, '13374 Linnea St', 'California', 92880, '2016-04-13'),
(13, 87, 22, 100, '13374 Linnea St', 'California', 92880, '2016-04-13'),
(14, 87, 22, 100, '13374 Linnea St', 'California', 92880, '2016-04-13'),
(17, 60, 22, 10, '13374 Linnea St', 'California', 92880, '2016-06-06'),
(18, 60, 34, 10, 'aca', 'asda', 62335, '2016-06-06'),
(19, 109, 36, 100, '777 Prince Dr. Fulleron', 'CA', 94444, '2016-05-25'),
(20, 61, 37, 20, 'CSU', 'CALIFORNIA', 92880, '2016-06-06'),
(21, 108, 37, 20, 'cSU,fullerton', 'CALIFORNIA', 92880, '2016-05-22'),
(22, 110, 37, 10, 'Chicago ', 'Chicago', 60292, '2016-05-26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `type`, `email`, `password`, `first_name`, `last_name`, `business_name`, `food_category`, `electronics_category`, `rawmaterial_Category`, `entertainment_Category`, `Address`, `mobile_number`, `receive_message`) VALUES
(4, 'seller', 'abc@gmail.com', 'a8b767bb9cf0938dc7f40603f33987e5', 'Jack', 'nikita', 'Electronics', 1, 1, 0, 0, '133 liN', '9884710231', 'no'),
(12, 'seller', 'sv.nikita.nikita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055<br/>', 'jack', 'VIJAYAN', 'food', 0, 0, 1, 0, '31B/116 LOGANATHAN STREET\r\n', '099405924', 'yes'),
(18, 'seller', 'sv.nikita91@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'jack', 'Sadinidhi', '1991', 0, 0, 1, 1, '13374 Linnea St\r\nEastvale', '9512646992', 'yes'),
(19, 'buyer', 'sv.nikita91@yahoo.com', '1234', 'jack', 'SADINIDHI', NULL, 1, 1, 0, 0, '13374 Linnea St', '9512646992', 'yes'),
(20, 'seller', 'svn@gmail.com', 'b00a50c448238a71ed479f81fa4d9066', 'jack', 'sadinidhi', 'Food', 1, 0, 0, 0, '31b Loganathan st\r\nambattur', '9940592419', 'yes'),
(22, 'buyer', 'sv@yahoo.com', 'b00a50c448238a71ed479f81fa4d9066', 'jack', 'Buyer', 'food', 1, 0, 1, 0, '31 Nutwood ave', '9940596992', 'yes'),
(23, 'seller', 'sv.nikita91@advanced.com', 'a8b767bb9cf0938dc7f40603f33987e5', 'jack', 'Sadinidhi', '1991', 1, 0, 0, 0, '13374 Linnea St\r\nEastvale', '9512646992', 'yes'),
(24, 'buyer', 'sv.nikita91@yahoo.com', '', 'Nikita', 'vijayan', NULL, 0, 0, 1, 1, '13374 corona', '9512646992', 'yes'),
(25, 'buyer', 'sv.nikita91@yahoo.com', 'b00a50c448238a71ed479f81fa4d9066', 'Nikita', 'vijayan', NULL, 0, 0, 1, 1, '13374 corona', '9512646992', 'yes'),
(26, 'buyer', 'sv.nikita91@yahoo.com', 'b00a50c448238a71ed479f81fa4d9066', 'Nikita', 'vijayan', NULL, 0, 0, 1, 1, '13374 corona', '9512646992', 'yes'),
(27, 'buyer', 'sv.nikita.nikita@gmail.com', 'b00a50c448238a71ed479f81fa4d9066', 'Nikita', 'vija', NULL, 0, 1, 0, 0, '31 loganathan ambattur', '9940592419', 'yes'),
(28, 'buyer', 'qwer@qwer.com', 'e369853df766fa44e1ed0ff613f563bd', 'Buyer', 'Lier', NULL, 0, 1, 0, 0, 'qwer', '3333333333', 'no'),
(29, 'seller', 'asdf@asdf.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Seller', 'Yeller', 'asdf', 0, 0, 1, 0, 'asdf', '2222222222', 'no'),
(30, 'buyer', 'sv.91@yahoo.com', 'b00a50c448238a71ed479f81fa4d9066', 'Nikita', 'Vijayan', NULL, 1, 1, 0, 0, '13374 Linnea St', '9512646992', 'yes'),
(31, 'seller', 'soniarawat@csuf.com', 'd31cb1e2b7902e8e9b4d1793e94c38a0', 'sonia', 'rawat', 'Ford Motor Company', 0, 1, 0, 0, '13374 Linnea St', '9512646992', 'yes'),
(32, 'buyer', 'sonia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Sonia', 'rawat', NULL, 0, 1, 0, 0, 'California', '2488710000', 'yes'),
(33, 'buyer', 'sv.nikita.nikita@gmail.com', 'b00a50c448238a71ed479f81fa4d9066', 'Nikita', 'Vijyay', NULL, 1, 1, 0, 0, '31 loganathan ambattur', '9940592419', 'yes'),
(34, 'buyer', 'test@test.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'sean', 'claxon', NULL, 1, 1, 1, 0, '12354 asdcv', '123456985', 'no'),
(35, 'seller', 'kevin.csuf@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Seller', 'Kevin', 'Kevin Store', 0, 1, 0, 0, '5678 King dr.\r\nFullerton, CA 92000', '1231231234', 'yes'),
(36, 'buyer', 'kevin.csuf@csu.fullerton.edu', 'e369853df766fa44e1ed0ff613f563bd', 'Kevin', 'Buyer', '', 0, 0, 0, 1, '432 Quinn Dr\r\nFullerton, CA 93333', '2342342345', 'yes'),
(37, 'buyer', 'soniarawat@csu.fullerton.edu', '0c3bdeaabb41dc7d450da79e9edf1ed8', 'sonia', 'r', '', 0, 1, 1, 0, 'cal state university', '2480000000', 'yes'),
(38, 'seller', 'soniarawat@csu.fullerton.edu', '74ee00fa20bc6b0fef52f4049ec126d6', 'sonia', 'r', 'electronics supplier', 0, 1, 1, 0, 'csu fullerton', '2480000000', 'yes'),
(39, 'seller', 'sonia0682@gmail.com', '574cf77411c3281d990ac988ad07fb60', 'sonia', 'R', 'electronics for you', 0, 1, 1, 0, 'csu fullerton', '7140000000', 'yes'),
(40, 'seller', 'sonia0682@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sonia', 'R', 'electronics for you', 0, 1, 1, 0, 'csu,fullerton', '7140000000', 'yes');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `create_deal`
--
ALTER TABLE `create_deal`
  ADD CONSTRAINT `create_deal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
