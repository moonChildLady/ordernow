-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2021 at 11:41 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BUFFET`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CAT`
--

DROP TABLE IF EXISTS `tbl_CAT`;
CREATE TABLE IF NOT EXISTS `tbl_CAT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EnglishName` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `ChiName` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `Ordering` int(11) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CUSTOMER_TABLE`
--

DROP TABLE IF EXISTS `tbl_CUSTOMER_TABLE`;
CREATE TABLE IF NOT EXISTS `tbl_CUSTOMER_TABLE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TableNo` int(11) NOT NULL,
  `InTime` datetime NOT NULL,
  `OutTime` datetime NOT NULL,
  `NumberOfSeat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_DEVICE`
--

DROP TABLE IF EXISTS `tbl_DEVICE`;
CREATE TABLE IF NOT EXISTS `tbl_DEVICE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) NOT NULL,
  `Enable` int(11) NOT NULL DEFAULT '1' COMMENT '1=enable, 0=disable',
  `Addon` datetime DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deviceType` int(11) DEFAULT NULL,
  `kitchenType` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devicetype` (`deviceType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_DEVICETYPE`
--

DROP TABLE IF EXISTS `tbl_DEVICETYPE`;
CREATE TABLE IF NOT EXISTS `tbl_DEVICETYPE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=100 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_FOOD`
--

DROP TABLE IF EXISTS `tbl_FOOD`;
CREATE TABLE IF NOT EXISTS `tbl_FOOD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EnglishName` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `ChiName` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `Description` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `Images` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `Calorie` int(11) DEFAULT NULL,
  `CatID` int(11) DEFAULT NULL,
  `Source` int(11) DEFAULT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MessageID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catID` (`CatID`),
  KEY `source` (`Source`),
  KEY `Message_id` (`MessageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=150 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_FOODCAT`
--

DROP TABLE IF EXISTS `tbl_FOODCAT`;
CREATE TABLE IF NOT EXISTS `tbl_FOODCAT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FoodID` int(11) NOT NULL,
  `CatID` int(11) NOT NULL,
  `Addon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `CatID` (`CatID`),
  KEY `FoodID` (`FoodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_FOODMESSAGE`
--

DROP TABLE IF EXISTS `tbl_FOODMESSAGE`;
CREATE TABLE IF NOT EXISTS `tbl_FOODMESSAGE` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_FOODSTATUS`
--

DROP TABLE IF EXISTS `tbl_FOODSTATUS`;
CREATE TABLE IF NOT EXISTS `tbl_FOODSTATUS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_INVOICE`
--

DROP TABLE IF EXISTS `tbl_INVOICE`;
CREATE TABLE IF NOT EXISTS `tbl_INVOICE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderNo` int(11) NOT NULL,
  `InvoiceAmount` int(11) NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  `ActualAmount` int(11) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  `ServiceCharge` int(11) NOT NULL,
  `StaffCode` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_LICENSE`
--

DROP TABLE IF EXISTS `tbl_LICENSE`;
CREATE TABLE IF NOT EXISTS `tbl_LICENSE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LicenseCode` varchar(45) NOT NULL,
  `Number` int(11) NOT NULL,
  `Addon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_NONAVAILABLE`
--

DROP TABLE IF EXISTS `tbl_NONAVAILABLE`;
CREATE TABLE IF NOT EXISTS `tbl_NONAVAILABLE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Food` int(11) NOT NULL,
  `until_to` datetime NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ORDER`
--

DROP TABLE IF EXISTS `tbl_ORDER`;
CREATE TABLE IF NOT EXISTS `tbl_ORDER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FoodID` int(11) NOT NULL,
  `NumberOfSet` int(11) NOT NULL,
  `TableNo` int(11) NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT '1=enable, 0=viod',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `takeby` int(11) NOT NULL,
  `process` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `food_id` (`FoodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=224 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_PRICE`
--

DROP TABLE IF EXISTS `tbl_PRICE`;
CREATE TABLE IF NOT EXISTS `tbl_PRICE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FoodID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `AddOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Enable` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `food_id` (`FoodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_RATE`
--

DROP TABLE IF EXISTS `tbl_RATE`;
CREATE TABLE IF NOT EXISTS `tbl_RATE` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orderNo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Food_id` int(11) NOT NULL,
  `Rate` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_SOURCE`
--

DROP TABLE IF EXISTS `tbl_SOURCE`;
CREATE TABLE IF NOT EXISTS `tbl_SOURCE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ChiName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `EnglishName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_SPECIAL`
--

DROP TABLE IF EXISTS `tbl_SPECIAL`;
CREATE TABLE IF NOT EXISTS `tbl_SPECIAL` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Food_id` int(11) NOT NULL,
  `Start` datetime NOT NULL,
  `End` datetime NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_STATUS`
--

DROP TABLE IF EXISTS `tbl_STATUS`;
CREATE TABLE IF NOT EXISTS `tbl_STATUS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_TABLE`
--

DROP TABLE IF EXISTS `tbl_TABLE`;
CREATE TABLE IF NOT EXISTS `tbl_TABLE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DeviceID` int(11) NOT NULL,
  `uuid` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `TableNo` int(11) NOT NULL,
  `Enable` int(11) NOT NULL DEFAULT '1',
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `deviceid` (`DeviceID`),
  KEY `table_OD` (`TableNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_TABLELOG`
--

DROP TABLE IF EXISTS `tbl_TABLELOG`;
CREATE TABLE IF NOT EXISTS `tbl_TABLELOG` (
  `TableID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `OrderNo` int(11) NOT NULL,
  `NumberOfSeat` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Type` int(11) NOT NULL,
  `LastOrder` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ExpiredOn` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TableID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_TABLESTATUS`
--

DROP TABLE IF EXISTS `tbl_TABLESTATUS`;
CREATE TABLE IF NOT EXISTS `tbl_TABLESTATUS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TableID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1' COMMENT '1=enable',
  `OrderNo` int(11) NOT NULL,
  `NumberOfSeat` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `LastOrder` int(11) NOT NULL,
  `ExpiredOn` int(11) NOT NULL COMMENT 'mins',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Type` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `table_id` (`TableID`),
  KEY `type_id` (`Type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_TYPE`
--

DROP TABLE IF EXISTS `tbl_TYPE`;
CREATE TABLE IF NOT EXISTS `tbl_TYPE` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `EnglishName` varchar(100) DEFAULT NULL,
  `ChiName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `Enable` int(11) DEFAULT '1' COMMENT '1=enable, 0=disable',
  `LastOrder` int(11) DEFAULT NULL,
  `EndOrder` int(11) DEFAULT NULL,
  `Full` int(11) DEFAULT NULL,
  `Half` int(11) DEFAULT NULL,
  `buffet` int(11) DEFAULT NULL COMMENT '1=yes, 0 =no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_TYPECAT`
--

DROP TABLE IF EXISTS `tbl_TYPECAT`;
CREATE TABLE IF NOT EXISTS `tbl_TYPECAT` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CatID` int(11) DEFAULT NULL,
  `TypeID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CatID` (`CatID`),
  KEY `TYPEID` (`TypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_DEVICE`
--
ALTER TABLE `tbl_DEVICE`
  ADD CONSTRAINT `tbl_DEVICE_ibfk_1` FOREIGN KEY (`deviceType`) REFERENCES `tbl_DEVICETYPE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_FOOD`
--
ALTER TABLE `tbl_FOOD`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CatID`) REFERENCES `tbl_CAT` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_id` FOREIGN KEY (`MessageID`) REFERENCES `tbl_FOODMESSAGE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `source` FOREIGN KEY (`Source`) REFERENCES `tbl_SOURCE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_FOODCAT`
--
ALTER TABLE `tbl_FOODCAT`
  ADD CONSTRAINT `tbl_FOODCAT_ibfk_1` FOREIGN KEY (`CatID`) REFERENCES `tbl_CAT` (`id`),
  ADD CONSTRAINT `tbl_FOODCAT_ibfk_2` FOREIGN KEY (`FoodID`) REFERENCES `tbl_FOOD` (`id`);

--
-- Constraints for table `tbl_ORDER`
--
ALTER TABLE `tbl_ORDER`
  ADD CONSTRAINT `food_ID` FOREIGN KEY (`FoodID`) REFERENCES `tbl_FOOD` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_PRICE`
--
ALTER TABLE `tbl_PRICE`
  ADD CONSTRAINT `foodID` FOREIGN KEY (`FoodID`) REFERENCES `tbl_FOOD` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_TABLE`
--
ALTER TABLE `tbl_TABLE`
  ADD CONSTRAINT `DeviceID` FOREIGN KEY (`DeviceID`) REFERENCES `tbl_DEVICE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_TABLESTATUS`
--
ALTER TABLE `tbl_TABLESTATUS`
  ADD CONSTRAINT `table_ID` FOREIGN KEY (`TableID`) REFERENCES `tbl_TABLE` (`TableNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_id` FOREIGN KEY (`Type`) REFERENCES `tbl_TYPE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_TYPECAT`
--
ALTER TABLE `tbl_TYPECAT`
  ADD CONSTRAINT `tbl_TYPECAT_ibfk_1` FOREIGN KEY (`CatID`) REFERENCES `tbl_CAT` (`id`),
  ADD CONSTRAINT `typeid` FOREIGN KEY (`TypeID`) REFERENCES `tbl_TYPE` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
