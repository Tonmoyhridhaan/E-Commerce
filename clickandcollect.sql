-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2022 at 04:45 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clickandcollect`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `insert_customers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_customers` (`name` VARCHAR(100), `email` VARCHAR(100), `address` VARCHAR(100), `dob` DATE, `gender` VARCHAR(100), `mobile` VARCHAR(100), `pass` VARCHAR(100), `img` VARCHAR(100), `status` INT)  BEGIN
 INSERT INTO customers(name,email,address,dob,gender, mobile,pass,img,status)
     VALUES(name,email,address,dob,gender, mobile,pass,img,status);
END$$

DROP PROCEDURE IF EXISTS `insert_sellers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_sellers` (`name` VARCHAR(100), `email` VARCHAR(100), `trade_licence` VARCHAR(255), `experience` VARCHAR(255), `cv` VARCHAR(255), `address` VARCHAR(100), `dob` DATE, `gender` VARCHAR(100), `mobile` VARCHAR(100), `pass` VARCHAR(100), `img` VARCHAR(100), `status` INT)  BEGIN
 INSERT INTO `sellers` ( `name`, `email`, `trade_licence`, `experience`, `cv`, `address`, `dob`, `gender`, `mobile`, `pass`, `status`, `img`)
  VALUES(name, email, trade_licence, experience, cv, address, dob, gender, mobile, pass, status, img);
END$$

DROP PROCEDURE IF EXISTS `read_data_customers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_data_customers` ()  BEGIN
 SELECT * from customers WHERE status=1;
END$$

DROP PROCEDURE IF EXISTS `read_data_products`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_data_products` ()  BEGIN
 SELECT * from products WHERE status=1;
END$$

DROP PROCEDURE IF EXISTS `read_data_sellers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `read_data_sellers` ()  BEGIN
 SELECT * from sellers WHERE status=1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `email`, `dob`, `address`, `gender`, `mobile`, `pass`, `img`) VALUES
(1, 'Ripa', 'ripa@gmail.com', '2022-08-16', 'ctg', '', '', '12345', NULL),
(2, 'Jumu', 'jumu@gmail.com', '2022-08-24', 'ctg', '', '', '12345', NULL),
(3, 'admin', 'admin3@gmail.com', '2022-08-08', 'ctg', 'female', '01835493825', '12345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `name`) VALUES
(1, 'Apple'),
(2, 'Nike'),
(3, 'barbie'),
(5, 'Armani'),
(6, 'Arong'),
(7, 'Yellow'),
(8, 'cats Eye'),
(9, 'Plus Point'),
(13, 'Addidas'),
(14, 'Bata'),
(15, 'Bata');

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_delivary`
--

DROP TABLE IF EXISTS `cash_on_delivary`;
CREATE TABLE IF NOT EXISTS `cash_on_delivary` (
  `deliver_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`deliver_id`),
  KEY `fk_cash_deliver` (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `cash_on_delivary`
--

INSERT INTO `cash_on_delivary` (`deliver_id`, `o_id`, `status`) VALUES
(6, 103, 0),
(7, 104, 0),
(8, 105, 0),
(9, 106, 0),
(10, 107, 0),
(11, 108, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'toys'),
(2, 'mancloth'),
(3, 'womancloth'),
(4, 'manShoesandWallets'),
(5, 'womanhandbagandwallets'),
(6, 'manAccessories'),
(7, 'WomanAccessories'),
(8, 'Home Appliances'),
(9, 'Kitchen Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(255) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `email`, `address`, `dob`, `gender`, `mobile`, `pass`, `status`, `img`) VALUES
(1, 'Farhana Amin Emo', 'emo@gmail.com', 'ctgg', '2022-08-30', 'female', '01835493825', '12', 1, NULL),
(2, 'montaha', 'montaha@gmail.com', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(4, 'customer1', 'customer1@gmail.com', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(5, 'customer2', 'customer2@gmail.com', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(6, 'customer22', 'customer3@gmail.com', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(7, 'customer4', 'customer4@gmail.com', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 0, NULL),
(8, 'customer5', 'customer5@gmail.com', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(9, 'Nasrin Jahan Ripaa', 'ripanasrin62@gmail.com', 'ctg', '2022-08-09', 'female', '01835493825', '12345', 0, 'NULL'),
(10, 'Mumi', 'admin1@gmail.com', 'cox', '2022-08-25', 'female', '01835493825', '1', 1, 'NULL'),
(11, 'saymon', 'tonmoy@gmail.com', 'cox', '2022-08-11', 'male', '01835493827', '1', 0, 'NULL'),
(12, 'njripa', 'puja@gmail.com', 'cti', '2022-10-04', 'female', '01835493826', '12', 0, 'cf218686a812598d148c76b0a77650f1.jpg'),
(13, 'saymon', 'd@gmail.com', 'ctg', '2022-09-11', 'female', '01835493827', '12345', 0, '8f9cb862f3eb9e09c538220b4ffb84f8.jpg'),
(14, '$name', '$mail', '$address', '2001-01-01', 'null', '$contact', '$pass1', 0, 'null'),
(15, 'saymon', 's@gmailcom', 'cox', '2000-02-02', 'null', '01835493825', '123', 0, 'null'),
(16, 'morshed khan', 'm@gmailcom', 'cty', '2000-02-02', 'null', '01835493827', '123', 0, 'null'),
(18, 'afia', 'afia@gmail.com', 'chittagong', '2022-09-15', 'female', '01325243199', '12345', 0, 'f64defbf9ad48227ce9b3ac9c74a4c44.09'),
(19, 'costomerorder', 'admin1-00@gmail.com', 'chittagong', '2022-09-28', 'female', '01325243190', '12345', 0, 'NULL'),
(20, 'name', 'admin001@gmail.com', 'chittagong', '2022-09-21', 'female', '01325243190', '12345', 0, 'NULL'),
(21, 'afiat', 'afia0000@gmail.coml', 'chtg', '2022-09-13', 'female', '01322931993', '12345', 0, ''),
(22, 'afia', 'afia00@gmail.com', 'chittagong', '2022-09-28', 'male', '01325243190', '12345', 0, ''),
(23, 'afia', 'afia190@gmail.com', 'chittagong', '2000-02-02', 'null', '01122222222222', '12345', 0, 'null'),
(24, 'afia', 'afia100@gmail.com', 'chittagong', '2022-09-22', 'female', '01325243190', '12345', 0, 'null'),
(25, 'Nasrin Jahan Ripa', 'tonmoyuui@gmail.com', 'cti', '2000-02-02', 'null', '01835493826', '12', 0, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `Delivery_address` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `order_date` date DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  KEY `FK_customer_order` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`o_id`, `c_id`, `Delivery_address`, `order_date`) VALUES
(103, 1, 'cox', '2022-10-26'),
(104, 1, '', '2022-10-26'),
(105, 1, '', '2022-10-26'),
(106, 1, 'cox', '2022-10-26'),
(107, 1, 'vos', '2022-10-26'),
(108, 1, 'chtg', '2022-10-27'),
(109, 4, 'ctg', '2022-11-03'),
(110, 1, 'ctg', '2022-11-03'),
(111, 1, 'dhaka', '2022-11-03'),
(112, 1, 'comilla', '2022-11-03'),
(113, 1, 'dhaka', '2022-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`e_id`),
  KEY `FK_img` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`e_id`, `p_id`, `image`) VALUES
(30, 31, '473a435e7a7c73da12bab53db0d937cb.jpg'),
(31, 31, 'c162086d40326ef80ae9971f64bfb9df.jpg'),
(32, 32, '32Product-i.jpg'),
(33, 32, '32Product-ii.jpg'),
(34, 32, '32Product-iii.jpg'),
(35, 33, '33Product-i.jpg'),
(36, 33, '33Product-ii.jpg'),
(37, 33, '33Product-iii.jpg'),
(38, 34, '34Product-i.jpg'),
(39, 34, '34Product-ii.jpg'),
(40, 34, '34Product-iii.jpg'),
(41, 35, '35Product-i.jpg'),
(42, 35, '35Product-ii.jpg'),
(43, 35, '35Product-iii.jpg'),
(44, 36, '36Product-i.jpg'),
(45, 36, '36Product-ii.jpg'),
(46, 36, '36Product-iii.jpg'),
(47, 37, '37Product-i.jpg'),
(48, 37, '37Product-ii.jpg'),
(74, 60, '60Product-i.jpg'),
(75, 60, '60Product-ii.jpg'),
(76, 60, '60Product-iii.jpg'),
(80, 62, '62Product-i.jpg'),
(81, 62, '62Product-ii.jpg'),
(82, 62, '62Product-iii.jpg'),
(83, 63, '63Product-i.jpg'),
(84, 63, '63Product-ii.jpg'),
(85, 63, '63Product-iii.jpg'),
(86, 64, '64Product-i.jpg'),
(87, 64, '64Product-ii.jpg'),
(88, 64, '64Product-iii.jpg'),
(89, 65, '65Product-i.jpg'),
(90, 65, '65Product-ii.jpg'),
(91, 65, '65Product-iii.jpg'),
(92, 66, '66Product-i.jpg'),
(93, 66, '66Product-ii.jpg'),
(94, 66, '66Product-iii.jpg'),
(95, 68, '68Product-i.jpg'),
(96, 68, '68Product-ii.jpg'),
(97, 68, '68Product-iii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invc_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  PRIMARY KEY (`invc_id`),
  KEY `FK_invoice` (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invc_id`, `o_id`) VALUES
(72, 103),
(73, 104),
(74, 105),
(75, 106),
(76, 107),
(77, 108),
(78, 109),
(79, 110),
(80, 111),
(81, 112),
(82, 113);

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

DROP TABLE IF EXISTS `order_line`;
CREATE TABLE IF NOT EXISTS `order_line` (
  `ol_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`ol_id`),
  KEY `FK_order_line2` (`p_id`),
  KEY `FK_order_line` (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`ol_id`, `o_id`, `p_id`, `quantity`) VALUES
(106, 103, 31, 2),
(107, 106, 31, 1),
(108, 107, 31, 2),
(109, 108, 32, 2),
(110, 109, 32, 2),
(111, 110, 31, 2),
(112, 111, 31, 2),
(113, 111, 32, 2),
(114, 112, 32, 2),
(115, 112, 35, 2),
(116, 113, 32, 3),
(117, 113, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `pmnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `tx_id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`pmnt_id`),
  KEY `FK_payment` (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pmnt_id`, `o_id`, `tx_id`) VALUES
(71, 109, 'ch_3Lzx8XLpwbIlWtiM0hLvH6IR'),
(72, 110, 'ch_3Lzx9iLpwbIlWtiM1VVikFup'),
(73, 111, 'ch_3LzxAtLpwbIlWtiM1XreF5Jo'),
(74, 112, 'ch_3LzxDcLpwbIlWtiM0SdeO6Rw'),
(75, 113, 'ch_3M0rFTLpwbIlWtiM0xNnPOH5');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `s_id` int(11) NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `prev_price` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `FK_brand1` (`b_id`),
  KEY `FK_catagory1` (`sub_id`),
  KEY `FK_seller` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `b_id`, `sub_id`, `s_id`, `size`, `description`, `prev_price`, `price`, `quantity`, `status`) VALUES
(26, 'kurti1', 6, 17, 2, '36', 'sdfffffffffffffffffffffffffgvryh', '200', 590, 56, 0),
(27, 'kurti2', 6, 17, 2, '36', '333333sadfffffffffff', '200', 900, 70, 0),
(28, 'kurti3', 6, 17, 2, '36', 'dfdfdfdfdfdfdfdfdf', '200', 700, 36, 0),
(29, 'kurti4', 6, 17, 2, '36', 'vcfcfcfcfcfcfcfcfc', '200', 1000, 36, 0),
(31, 'kurti2', 5, 17, 2, '36', 'squdghwyfgcasuihcasuidghciua', '200', 560, 12, 1),
(32, 'Shirt', 8, 1, 2, '41', 'Military style long sleeve men casual shirt. Color: Green, Bro', '200', 500, 9, 1),
(33, 'Fashion Hoodies', 8, 2, 1, '41', 'Stylish Hoodie for men. Color: White, Brown, Black. Material: Fabric Cotton', '200', 700, 37, 1),
(34, 'Sweatshirts', 8, 2, 1, '39,41,43', 'The Modern Sweatshirts. Color: Merun, Brown, Yellow. Material: Fabric Cotton', '200', 600, 30, 0),
(35, 'Sweaters', 9, 3, 1, '39,41,43', 'Luxury Brand Woolen Sweater Best Quality Men Pullover Fashion Design. Color: NavyBlue, Gray, Black. Material: Cotton, Wool.', '200', 650, 19, 1),
(36, 'Jackets', 9, 4, 1, '41', 'Full Sleeve Men Cotton Jackets. Color: Maroon, Black, NavyBlue.', '200', 750, 45, 1),
(37, 'Coats', 8, 4, 1, '43', 'Winter Trench Coats for Men.', '200', 800, 20, 2),
(60, 'Jeans', 6, 5, 1, '32,34,36', 'Mens Denim Jeans', '200', 800, 17, 1),
(62, 'Trousers', 8, 6, 1, '29', 'Best trousers for men', '200', 600, 50, 1),
(63, 'Capris and Shorts', 8, 7, 1, '30,32,34', 'Summer Mens Cotton capris and shorts', '200', 500, 100, 1),
(64, 'Swim', 2, 8, 1, '28,30,32,34', 'The best nike swim trunks for men', '200', 400, 60, 1),
(65, 'Suits', 8, 9, 1, '34,36,38', 'Fashion suits for men,Designer suits for men', '200', 900, 100, 1),
(66, 'Sports Coats', 8, 9, 1, '34,36', 'Sports Coats-Shop top designer sports coats', '200', 900, 9, 1),
(68, 'Shocks', 14, 11, 1, 'L,M', 'Premium ankle shocks for men', '200', 200, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_category`
--

DROP TABLE IF EXISTS `report_category`;
CREATE TABLE IF NOT EXISTS `report_category` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `report_category`
--

INSERT INTO `report_category` (`report_id`, `name`) VALUES
(1, 'harassment'),
(2, 'duplicate Product'),
(3, 'violence'),
(4, 'fake products'),
(6, 'spam');

-- --------------------------------------------------------

--
-- Table structure for table `report_product`
--

DROP TABLE IF EXISTS `report_product`;
CREATE TABLE IF NOT EXISTS `report_product` (
  `rp_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `massage` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`rp_id`),
  KEY `c_id` (`c_id`),
  KEY `p_id` (`p_id`),
  KEY `report_id` (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `report_product`
--

INSERT INTO `report_product` (`rp_id`, `report_id`, `c_id`, `p_id`, `massage`) VALUES
(6, 1, 1, 32, 'n'),
(7, 1, 1, 32, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`r_id`),
  KEY `FK1_review` (`p_id`),
  KEY `FK2_review` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `p_id`, `review`, `c_id`) VALUES
(1, 31, '$review', 1),
(2, 32, 'very good Products', 1),
(3, 32, 'very bad products', 1),
(11, 32, 'products is very comportable', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `trade_licence` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` int(255) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`s_id`, `name`, `email`, `trade_licence`, `experience`, `cv`, `address`, `dob`, `gender`, `mobile`, `pass`, `status`, `img`) VALUES
(1, 'Saymon', 'saymon@gmail.com', '199', 'working as a sellers in strange store for 3 years', 'no file uploaded', 'ctg', '2022-08-24', 'male', '01835493825', '12345', 0, NULL),
(2, 'sabiha', 'montaha@gmail.com', '22', 'working as a sellers in strange store for 3 years', 'no file uploaded', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(4, 'seller2', 'seller2@gmail.com', '44', 'working as a sellers in strange store for 3 years', 'no file uploaded', 'ctg', '2022-08-16', 'female', '01835493825', '12345', 1, NULL),
(15, 'Nasrin Jahan Ripaa', 'ripanasrin62@gmail.com', '55', 'I  have been  driving a bus with the weight of  more than 4500kg for 2 years.', 'no file attach', 'chittagong', '2022-09-18', 'female', '01325243199', '12345', 1, 'null'),
(16, 'afia', 'afia@gmail.com', '55', 'I  have been  driving a bus with the weight of  more than 4500kg for 2 years.', 'no file attach', 'chittagong', '2022-10-06', 'female', '01325243199', '12345', 1, 'null'),
(17, 'costomerorder', 'admin1@gmail.com', '11', 'I  have been  driving a bus with the weight of  more than 4500kg for 2 years.', 'no file attach', 'chittagong', '2022-09-19', 'female', '01325243199', '12345', 1, 'null'),
(18, 'afiat', 'afia000056@gmail.coml', '11', 'I  have been  driving a bus with the weight of  more than 4500kg for 2 years.', '', 'chtg', '2022-09-22', 'female', '01835493825', '12345', 1, 'null'),
(21, 'costomerorder', 'admin90@gmail.com', '55', 'I  have been  driving a bus with the weight of  more than 6500kg for 3 years.', 'Screenshot (141).png', 'chittagong', '2022-09-24', 'female', '01835493826', '12345', 1, NULL),
(22, 'wedwrf', 'fw@gnail.com', 'sdwq', 'qwedqwwe', 'qwee.pdf', 'qwe', '2022-09-13', 'qqdqwdrw', 'qwedwerqr', '1234', 2, NULL),
(23, 'wedwrf', 'fw@gnail.com', 'sdwq', 'qwedqwwe', 'qwee.pdf', 'qwe', '2022-09-13', 'qqdqwdrw', 'qwedwerqr', '1234', 2, NULL),
(24, 'wedwrf', 'fw@gnail.com', 'sdwq', 'qwedqwwe', 'qwee.pdf', 'qwe', '2022-09-13', 'qqdqwdrw', 'qwedwerqr', '1234', 2, NULL),
(26, 'wedwrf', 'fw@gnail.com', 'sdwq', 'qwedqwwe', 'qwee.pdf', 'qwe', '2022-09-13', 'qqdqwdrw', 'qwedwerqr', '1234', 1, NULL),
(27, 'wedwrf', 'fw@gnail.com', 'sdwq', 'qwedqwwe', 'qwee.pdf', 'qwe', '2022-09-13', 'qqdqwdrw', 'qwedwerqr', '1234', 1, NULL),
(28, '$name', '$mail', '$trade', '$experience', '$cv', '$address', '2022-02-02', '$gender', '$contact', '$pass1', 1, 'null'),
(29, 'afia', 'afia300@gmail.com', '199', 'I  have been  driving a bus with the weight of  more than 5000kg for 3 years.', 'Screenshot (141).png', 'chittagong', '2022-09-08', 'female', '01325243190', '12345', 1, 'null'),
(30, 'njripa', 'puja@gmail.com', '55', 'I  have been  driving a bus with the weight of  more than 6500kg for 3 years.', 'cmeplcover.docx', 'ctg', '2022-09-10', 'female', '01835493825', '12', 2, 'null'),
(31, 'njripa', 'admin1==@gmail.com', '55', 'I  have been  driving a bus with the weight of  more than 4000kg for 6 years.', 'Screenshot (139).png', 'ctg', '2022-09-13', 'male', '01835493825', '12', 2, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `starreview`
--

DROP TABLE IF EXISTS `starreview`;
CREATE TABLE IF NOT EXISTS `starreview` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  PRIMARY KEY (`st_id`),
  KEY `FK1_products` (`p_id`),
  KEY `FK2_customer` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `starreview`
--

INSERT INTO `starreview` (`st_id`, `p_id`, `c_id`, `star`) VALUES
(1, 32, 1, 1),
(2, 32, 2, 3),
(3, 32, 4, 5),
(4, 32, 5, 1),
(5, 32, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `FK_catagory` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `name`, `cat_id`) VALUES
(1, '  Shirts ', 2),
(2, ' Fashion Hoodies , Sweatshirts ', 2),
(3, 'Sweaters', 2),
(4, ' Jackets , Coats', 2),
(5, ' Jeans ', 2),
(6, ' Pants , Trousers', 2),
(7, 'Capris and Shorts ', 2),
(8, ' Swim', 2),
(9, ' Suits , Sport Coats', 2),
(10, ' Underwear', 2),
(11, '  Socks', 2),
(12, ' Sleep , Lounge', 2),
(13, 'T-Shirts , Tanks ', 2),
(14, '  Active', 2),
(15, '   Sport Coats ', 2),
(16, 'Shapewear', 3),
(17, 'Tops and shirts,kurti', 3),
(18, 'Sweatshirts', 3),
(19, 'Jeans and Trousers', 3),
(20, 'Fashion Hood ', 3),
(21, 'Capris and Shoe', 3),
(22, 'Leggings', 3),
(23, 'Swimsuits and Cover Ups ', 3),
(24, 'Lingerie, Sleep and Lounge', 3),
(25, 'Inner and Nightwear ', 3),
(26, 'Jumpsuits, Rompers and Overalls', 3),
(27, 'Coats, Jackets and Vests', 3),
(28, 'Suiting and Blazers ', 3),
(29, 'Socks and Hosiery', 3),
(30, 'Fashion Sneakers', 4),
(31, ' Loafers', 4),
(32, 'Slip-Ons', 4),
(33, ' Clogs', 4),
(34, 'outdoor', 4),
(35, 'oxford', 4),
(36, 'slippers', 4),
(37, 'Clutches', 5),
(38, ' Cross-Body Bags', 5),
(39, 'Evening Bags', 5),
(40, ' Shoulder Bags', 5),
(41, 'Top-Handle Bags', 5),
(42, 'Wristlets', 5),
(43, 'Belts', 6),
(44, 'Suspenders', 6),
(45, 'Eyewear Accessories', 6),
(46, 'Neckties', 6),
(47, 'Bow Ties and Cummerbunds', 6),
(48, 'Collar Stays', 6),
(49, 'Handbag Accessories', 7),
(50, 'Sunglasses Accessories', 7),
(51, 'Eyewear Accessories', 7),
(52, 'Scarves and Wraps', 7),
(53, 'Gloves and Mittens', 7),
(54, 'Hats and Caps', 7),
(55, 'Air Coolers', 8),
(56, 'Fans', 8),
(57, 'Microwaves', 8),
(58, 'Refrigerators', 8),
(59, 'Washing Machines', 8),
(60, 'Jars and Containers ', 8),
(61, 'LED and CFL bulbs', 8),
(62, 'Drying Racks ', 8),
(63, 'Laundry Baskets', 8),
(64, 'Vases ', 8),
(65, 'Clocks', 8),
(66, 'Bedsheets', 8),
(67, 'Air Fryers', 9),
(68, ' Espresso Machines', 9),
(69, 'Food Processors', 9),
(70, 'Hand Blenders', 9),
(71, 'Induction Cooktops', 9),
(72, 'Juicers', 9),
(73, 'Microwave Ovens', 9),
(74, 'Mixers , Grinders', 9),
(75, 'Ovens', 9),
(76, 'Rice Cookers', 9),
(77, 'Stand Mixers', 9),
(78, 'Sandwich Makers', 9),
(79, 'Tandoor , Grills', 9),
(80, 'Toasters', 9),
(81, 'PARTS', 5),
(82, 'hudi', 2),
(83, 'khelna ghor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warningmassage`
--

DROP TABLE IF EXISTS `warningmassage`;
CREATE TABLE IF NOT EXISTS `warningmassage` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `massage` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`w_id`),
  KEY `FK1_admin` (`a_id`),
  KEY `FK2_seller` (`s_id`),
  KEY `FK3_product` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `warningmassage`
--

INSERT INTO `warningmassage` (`w_id`, `a_id`, `p_id`, `s_id`, `massage`) VALUES
(1, 3, 32, 1, 'habijabi'),
(2, 1, 31, 2, 'reyryhrt54yhrt5yhr4t5yh'),
(17, 1, 35, 1, 'dfedfgvre'),
(18, 1, 37, 1, 'rfergrt5yr'),
(19, 1, 33, 1, 'dfedfgvre'),
(20, 1, 37, 1, 'rfergrt5yr');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_on_delivary`
--
ALTER TABLE `cash_on_delivary`
  ADD CONSTRAINT `fk_cash_deliver` FOREIGN KEY (`o_id`) REFERENCES `customer_order` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `FK_customer_order` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_img` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_invoice` FOREIGN KEY (`o_id`) REFERENCES `customer_order` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `FK_order_line` FOREIGN KEY (`o_id`) REFERENCES `customer_order` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment` FOREIGN KEY (`o_id`) REFERENCES `customer_order` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_SUB` FOREIGN KEY (`sub_id`) REFERENCES `sub_category` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_brand` FOREIGN KEY (`b_id`) REFERENCES `brand` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_seller` FOREIGN KEY (`s_id`) REFERENCES `sellers` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report_product`
--
ALTER TABLE `report_product`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_id` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_id` FOREIGN KEY (`report_id`) REFERENCES `report_category` (`report_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK1_review` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_review` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `starreview`
--
ALTER TABLE `starreview`
  ADD CONSTRAINT `FK1_products` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_customer` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `FK_catagory` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warningmassage`
--
ALTER TABLE `warningmassage`
  ADD CONSTRAINT `FK1_admin` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_seller` FOREIGN KEY (`s_id`) REFERENCES `sellers` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK3_product` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
