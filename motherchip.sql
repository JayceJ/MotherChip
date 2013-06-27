-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2013 at 01:09 p.m.
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `motherchip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Credit` int(11) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`CustomerID`, `FirstName`, `LastName`, `Address`, `Telephone`, `Email`, `UserName`, `Password`, `Credit`) VALUES
(1, 'Nathaniel', 'Smith', '1 Ilivehereatthis place', '123456789', 'nat@notmyemail.com', 'nathaniel.smith', 'thisismypassword', 10),
(3, 'Test', 'Ificate', '1 thisismyaddress street', '987654321', 'test@myemail.com', 'Test.Ificate', 'hihihi', 80),
(4, 'Jayce', 'Jordan', '123 asdf street', '123456789', 'jayce.jordan@nomail.com', 'jayce.jordan', 'thisisapassword', 9001),
(5, 'Enzo', 'Something', '1 thisisenzosroad street', '234534534', 'enzo.something@nomail.com', 'enzo.something', 'thisismypasswordforenzo', 1),
(16, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 0),
(17, 'Test', 'Person', '123 Street Road', '123456788', 'test@test.com', 'test', 'test', 0),
(76, 'qwe', 'qwe', 'qwe', 'qwe', 'we', 'qwe', 'qwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE IF NOT EXISTS `tborder` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`OrderID`, `OrderDate`, `DeliveryDate`, `OrderStatus`, `CustomerID`) VALUES
(1, '2013-06-10', '2013-06-15', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tborderline`
--

CREATE TABLE IF NOT EXISTS `tborderline` (
  `OrderlineID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`OrderlineID`),
  KEY `OrderID` (`OrderID`,`ProductID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tborderline`
--

INSERT INTO `tborderline` (`OrderlineID`, `OrderID`, `ProductID`, `Quantity`) VALUES
(1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE IF NOT EXISTS `tbproduct` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(200) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Price` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `StockLevel` int(11) NOT NULL,
  `PhotoPath` varchar(200) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `TypeID` (`TypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`ProductID`, `ProductName`, `Description`, `Price`, `TypeID`, `StockLevel`, `PhotoPath`, `Active`) VALUES
(1, 'Super Gweefix Card', 'The best ever.', 1500, 1, 10, 'testingdb.jpg', 1),
(2, 'Worst MuthaBoard', 'The worst one ever.', 200, 2, 200, 'worstmotherboard.jpg', 1),
(5, 'Corsair RAM', 'The most expensive ram possible', 200, 5, 20, 'corsairram.jpg', 1),
(6, 'Cooler Master RAM', 'Slightly less expensive RAM', 150, 5, 30, 'coolermasterram.jpg', 1),
(7, 'Literal RAM', 'This is actually a real ram', 175, 5, 3, 'thisisaram.jpg', 1),
(8, 'Nvidia GTX Titan', 'Ultimate GFX card  ', 1900, 1, 6, 'titan.jpg', 1),
(9, 'Radeon HD 7990', 'Ultimate GFX card', 1900, 1, 6, '7990.jpg', 1),
(10, 'Antec Eleven Hundred', 'Simple Antec case with nice cable management', 200, 3, 3, '1100.jpg', 1),
(11, 'CoolerMaster Cosmos II', 'Ultimate Ultra Tower case', 700, 3, 2, 'cosmos.jpg', 1),
(12, 'Storm Scout II', 'CoolerMaster branded. Nice high end case', 200, 3, 2, 'scout.jpg', 1),
(13, 'ASUS Z77 Sabertooth', 'Great high end motherboard', 360, 2, 4, 'sabertooth.jpg', 1),
(14, 'Gigabyte Z77X-UD3H', 'Mid to high end motherboard supports 1155 intel CPU''s', 240, 2, 5, 'gigabytez77.jpg', 1),
(15, 'Intel i7-3770K', 'High end i7 CPU. Unlocked', 450, 4, 8, 'i7.jpg', 1),
(16, 'Intel i5-3570', 'High end i5 CPU. Not unlocked', 300, 4, 8, 'i5.jpg', 1),
(17, 'Intel i5-4670K (Haswell)', 'New Haswell line of CPU. Ulocked. A step up from Ivy Bridge', 380, 4, 7, 'haswell.jpg', 1),
(18, 'Corsair Hydro H100i', 'Closed loop CPU cooling with dual 120mm radiator', 200, 6, 8, 'h100i.jpg', 1),
(19, 'Antec Big Boy 200', 'Giant 200mm exhaust fan compatible with most cases.', 50, 6, 9, 'antecbb.jpg', 1),
(20, 'Sickleflow 120 (green)', 'Green LED 120mm fans. Great for intake. ~65CFM', 25, 6, 20, 'sickleflow.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbproducttype`
--

CREATE TABLE IF NOT EXISTS `tbproducttype` (
  `TypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(100) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `DisplayOrder` int(11) NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbproducttype`
--

INSERT INTO `tbproducttype` (`TypeID`, `TypeName`, `Description`, `DisplayOrder`) VALUES
(1, 'Graphics Card', 'Run stuff really fast with super expensive graphics hardware', 1),
(2, 'Motherboard', 'For pluggin all ya stuff.', 2),
(3, 'Chassis', 'Computer cases of all sizes', 3),
(4, 'Processors', 'The processor for the computer', 4),
(5, 'Memory', 'Random access memory', 5),
(6, 'Cooling', 'Fans and water cooling', 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tborder`
--
ALTER TABLE `tborder`
  ADD CONSTRAINT `tborder_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `tbcustomer` (`CustomerID`);

--
-- Constraints for table `tborderline`
--
ALTER TABLE `tborderline`
  ADD CONSTRAINT `tborderline_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `tborder` (`OrderID`),
  ADD CONSTRAINT `tborderline_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `tbproduct` (`ProductID`);

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `tbproducttype` (`TypeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
