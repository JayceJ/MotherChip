-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2013 at 12:10 p.m.
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
  `Telephone` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Credit` int(11) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`CustomerID`, `FirstName`, `LastName`, `Address`, `Telephone`, `Email`, `UserName`, `Password`, `Credit`) VALUES
(1, 'Nathaniel', 'Smith', '1 Ilivehereatthis place', 123456789, 'nat@notmyemail.com', 'nathaniel.smith', 'thisismypassword', 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`ProductID`, `ProductName`, `Description`, `Price`, `TypeID`, `StockLevel`, `PhotoPath`, `Active`) VALUES
(1, 'Super Gweefix Card', 'The best ever.', 1500, 1, 10, 'testingdb.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbproducttype`
--

INSERT INTO `tbproducttype` (`TypeID`, `TypeName`, `Description`, `DisplayOrder`) VALUES
(1, 'Graphics Card', 'Run stuff really fast with super expensive graphics hardware', 1);

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
  ADD CONSTRAINT `tborderline_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `tbproduct` (`ProductID`),
  ADD CONSTRAINT `tborderline_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `tborder` (`OrderID`);

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `tbproducttype` (`TypeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
