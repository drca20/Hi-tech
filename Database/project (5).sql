-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2020 at 09:22 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `Appartment_Id` int(10) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `Appartment_Id`, `Description`, `time`, `status`) VALUES
(1, 1, 'this is my first ', '2020-03-29 17:25:20', 0),
(8, 1, 'rwer', '2020-03-30 00:35:43', 0),
(9, 1, 'trr', '2020-03-30 00:35:47', 0),
(6, 1, 'asdada', '2020-03-30 00:15:23', 0),
(7, 1, 'fsdfsjkfjsklfn;lamsfmklanskf asjdbfjkabskldna;smd', '2020-03-30 00:15:42', 1),
(10, 1, 'sdasdas', '2020-03-30 00:47:58', 1),
(11, 1, 'asdsa', '2020-03-30 00:51:18', 0),
(12, 1, 'd', '2020-03-30 00:51:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appartment`
--

DROP TABLE IF EXISTS `appartment`;
CREATE TABLE IF NOT EXISTS `appartment` (
  `AppartmentId` int(11) NOT NULL AUTO_INCREMENT,
  `Appartment_Name` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(25) NOT NULL,
  `FLOOR` int(11) NOT NULL,
  `Total_Blocks` int(11) NOT NULL,
  `Secretary_Name` varchar(50) NOT NULL,
  `Secretary_Email` varchar(50) DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `ParkingSlot` int(11) DEFAULT NULL,
  PRIMARY KEY (`AppartmentId`),
  UNIQUE KEY `AppartmentId` (`AppartmentId`),
  UNIQUE KEY `AppartmentId_3` (`AppartmentId`),
  KEY `AppartmentId_2` (`AppartmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=42850 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appartment`
--

INSERT INTO `appartment` (`AppartmentId`, `Appartment_Name`, `Address`, `City`, `FLOOR`, `Total_Blocks`, `Secretary_Name`, `Secretary_Email`, `STATUS`, `ParkingSlot`) VALUES
(1, 'AksharGreen', 'Rajkot', 'Rajkot', 5, 20, 'Darshan', 'akshar@gmail.com', 1, 20),
(2, 'SunCity', 'Surat', 'Surat', 4, 12, 'Mr.Bhide', NULL, 1, 12),
(26, 'Santivilla', 'Rajkot', 'Rajkot', 5, 20, 'Mahendra', NULL, 1, NULL),
(29, 'SaiVilla', 'Surat', 'Surat', 2, 4, 'darshan', 'er.darshan@gmail.com', 1, NULL),
(30, 'santi', 'rajkot', 'rajkot', 5, 5, 'Devraj', 'devraj@gmail.com', 1, NULL),
(42849, 'Syamal Vatika', 'Surat , New Ring Road', 'Surat', 10, 123, 'Archit', 'ghetiyarchit007@gmail.com', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billpayment`
--

DROP TABLE IF EXISTS `billpayment`;
CREATE TABLE IF NOT EXISTS `billpayment` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `AppartmentId` int(10) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `BlockNumber` int(10) NOT NULL,
  `Amount` mediumint(20) NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_due` timestamp NOT NULL,
  `time_pay` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billpayment`
--

INSERT INTO `billpayment` (`id`, `AppartmentId`, `description`, `BlockNumber`, `Amount`, `time_create`, `time_due`, `time_pay`, `status`) VALUES
(2, 1, 'Light', 302, 500, '2020-03-30 16:43:07', '2020-03-30 00:26:48', '2020-03-30 00:30:10', 1),
(3, 1, 'Chair', 302, 523, '2020-03-30 17:11:18', '2020-03-30 17:11:18', '2020-03-29 23:49:46', 0),
(4, 1, 'Fun', 302, 800, '2020-03-30 18:07:54', '2020-04-01 00:37:54', NULL, 1),
(6, 1, 'Monthly ', 302, 5000, '2020-03-30 18:22:46', '2020-04-04 00:52:46', NULL, 1),
(7, 1, 'Monthly ', 303, 5000, '2020-03-30 18:22:46', '2020-04-04 00:52:46', NULL, 1),
(8, 1, 'Monthly ', 304, 5000, '2020-03-30 18:22:46', '2020-04-04 00:52:46', NULL, 1),
(9, 1, 'Monthly ', 123, 5000, '2020-03-30 18:22:46', '2020-04-04 00:52:46', NULL, 1),
(10, 1, 'Monthly ', 301, 5000, '2020-03-30 18:22:46', '2020-04-04 00:52:46', NULL, 1),
(11, 1, 'asdasd', 302, 1000, '2020-03-31 07:38:43', '2020-04-01 02:08:43', '2020-03-31 02:08:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
CREATE TABLE IF NOT EXISTS `block` (
  `BlockId` int(11) NOT NULL AUTO_INCREMENT,
  `BlockNumber` int(11) DEFAULT NULL,
  `AppartmentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`BlockId`),
  KEY `AppartmentId` (`AppartmentId`),
  KEY `BlockNumber_2` (`BlockNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`BlockId`, `BlockNumber`, `AppartmentId`) VALUES
(1, 302, 1),
(2, 101, 2),
(3, 102, 2),
(5, 303, 1),
(6, 304, 1),
(7, 123, 1),
(9, 303, 2),
(10, 506, NULL),
(12, 101, 26),
(14, 5, NULL),
(15, 5, NULL),
(16, 101, 29),
(17, 302, 30),
(18, 301, 1),
(19, 101, 42849),
(20, 102, 42849);

-- --------------------------------------------------------

--
-- Table structure for table `block_con`
--

DROP TABLE IF EXISTS `block_con`;
CREATE TABLE IF NOT EXISTS `block_con` (
  `BlockId` int(11) NOT NULL AUTO_INCREMENT,
  `BlockNumber` int(11) DEFAULT NULL,
  `AppartmentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`BlockId`),
  KEY `AppartmentId` (`AppartmentId`),
  KEY `BlockNumber_2` (`BlockNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block_con`
--

INSERT INTO `block_con` (`BlockId`, `BlockNumber`, `AppartmentId`) VALUES
(1, 302, 1),
(2, 101, 2),
(3, 102, 2),
(4, 301, 1),
(5, 303, 1),
(6, 304, 1),
(7, 123, 1),
(9, 303, 2),
(10, 506, NULL),
(12, 101, 26),
(14, 5, NULL),
(15, 5, NULL),
(16, 101, 29),
(17, 302, 30);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `Appartment_Id` int(10) NOT NULL,
  `complain_name` varchar(20) DEFAULT NULL,
  `Description` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `Appartment_Id`, `complain_name`, `Description`, `time`, `status`) VALUES
(1, 1, 'darshan', 'this is my first ', '2020-03-29 17:25:20', 0),
(8, 1, NULL, 'rwer', '2020-03-30 00:35:43', 0),
(9, 1, NULL, 'trr', '2020-03-30 00:35:47', 0),
(6, 1, NULL, 'asdada', '2020-03-30 00:15:23', 0),
(7, 1, 'darshan', 'fsdfsjkfjsklfn;lamsfmklanskf asjdbfjkabskldna;smd', '2020-03-30 00:15:42', 1),
(10, 1, 'darshan', 'sdfds', '2020-03-30 00:49:08', 1),
(11, 1, NULL, 'a', '2020-03-30 00:50:56', 0),
(12, 1, NULL, '', '2020-03-30 06:29:21', 0),
(13, 1, NULL, 'sdfdsfsdfs', '2020-03-29 21:02:24', 0),
(14, 1, 'Kishan', 'asd', '2020-03-31 02:23:18', 1),
(15, 1, 'Kishan', 'asd', '2020-03-31 02:23:35', 0),
(16, 42849, 'Urvi', 'hi this is test', '2020-03-31 03:03:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

DROP TABLE IF EXISTS `emergency`;
CREATE TABLE IF NOT EXISTS `emergency` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `Appartment_Id` int(10) NOT NULL,
  `Profile` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `mobile` bigint(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id`, `Appartment_Id`, `Profile`, `Name`, `mobile`, `status`) VALUES
(1, 1, 'Elevator Emergency\r\n', 'Akshit Patel', 7025852585, 1),
(2, 1, 'Fire Emergency\r\n', 'Rajkot Fire Brigade', 1123, 1),
(4, 1, 'Gas Repair', 'Ramnik Bhai', 741852967, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `AppartmentId` int(10) NOT NULL,
  `expense_amount` mediumint(20) NOT NULL,
  `expense_desc` varchar(200) NOT NULL,
  `expense_payer` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `AppartmentId`, `expense_amount`, `expense_desc`, `expense_payer`, `time`, `status`) VALUES
(1, 1, 500, 'Light Bill', 'Darshan ', '2020-03-31 08:03:03', 1),
(2, 1, 589, 'Gas Connection', 'Darshan', '2020-03-31 08:04:24', 1),
(3, 1, 458, 'Fan Bill', 'Archit', '2020-03-31 08:22:20', 0),
(4, 42849, 10000, 'Common Light Bill', 'Archit', '2020-03-31 08:36:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

DROP TABLE IF EXISTS `parking`;
CREATE TABLE IF NOT EXISTS `parking` (
  `ParkingId` int(11) NOT NULL AUTO_INCREMENT,
  `AppartmentId` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ParkingId`),
  KEY `AppartmentId` (`AppartmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`ParkingId`, `AppartmentId`, `Status`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 0),
(10, 1, 0),
(12, 1, 1),
(123, 29, 1),
(124, 42849, 1),
(125, 42849, 1),
(126, 42849, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) NOT NULL,
  `amount` bigint(50) NOT NULL,
  `gatwayname` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `orderid`, `amount`, `gatwayname`, `timestamp`) VALUES
(1, 'ORDS2605559', 1, 'HDFC', '2020-03-28 16:46:01'),
(2, 'ORDS97804728', 1, 'INDS', '2020-03-28 16:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

DROP TABLE IF EXISTS `secretary`;
CREATE TABLE IF NOT EXISTS `secretary` (
  `SecretaryId` int(11) NOT NULL AUTO_INCREMENT,
  `Secretary_Name` varchar(40) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `AppartmentId` int(11) NOT NULL,
  PRIMARY KEY (`SecretaryId`),
  KEY `AppartmentId` (`AppartmentId`),
  KEY `Secretary_Name` (`Secretary_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`SecretaryId`, `Secretary_Name`, `Phone`, `AppartmentId`) VALUES
(1, 'Darshan', '5645689', 1),
(3, 'darshan', '7418529630', 29),
(4, 'Devraj', '1234', 30),
(5, 'Archit', '9904426028', 42849);

-- --------------------------------------------------------

--
-- Table structure for table `tempotpverify`
--

DROP TABLE IF EXISTS `tempotpverify`;
CREATE TABLE IF NOT EXISTS `tempotpverify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `Otp` bigint(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempotpverify`
--

INSERT INTO `tempotpverify` (`id`, `EmailAddress`, `Otp`, `timestamp`) VALUES
(5, 'er.darshanghetiya@gmail.com', 1031, '2020-03-25 03:39:51'),
(4, 'er.darshanghetiya@gmail.com', 6566, '2020-03-25 02:44:56'),
(6, 'er.darshanghetiya@gmail.com', 4938, '2020-03-25 03:51:43'),
(7, 'er.darshanghetiya@gmail.com', 9896, '2020-03-25 03:56:17'),
(8, 'er.darshanghetiya@gmail.com', 3894, '2020-03-25 04:01:04'),
(9, 'er.darshanghetiya@gmail.com', 2900, '2020-03-25 04:06:07'),
(10, 'er.darshanghetiya@gmail.com', 3324, '2020-03-25 04:12:32'),
(11, 'er.darshanghetiya@gmail.com', 1798, '2020-03-25 04:14:14'),
(12, 'er.darshanghetiya@gmail.com', 8725, '2020-03-25 04:28:07'),
(13, 'er.darshanghetiya@gmail.com', 7824, '2020-03-25 04:38:04'),
(14, 'er.darshanghetiya@gmail.com', 5246, '2020-03-25 04:46:49'),
(15, 'arb@gmail.com', 5929, '2020-03-25 04:52:02'),
(16, 'er.darshanghetiya@gmail.com', 2540, '2020-03-26 02:23:04'),
(17, 'er.darshan@gmail.com', 9353, '2020-03-28 04:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `MobileNumber` decimal(18,0) NOT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `BloodGroup` varchar(50) DEFAULT NULL,
  `AppartmentId` int(11) DEFAULT NULL,
  `Secretary_Name` varchar(20) DEFAULT NULL,
  `isSecretary` int(1) NOT NULL DEFAULT '0',
  `BlockNumber` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`UserId`),
  KEY `AppartmentId` (`AppartmentId`),
  KEY `BlockNumber` (`BlockNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `password`, `MobileNumber`, `EmailAddress`, `BloodGroup`, `AppartmentId`, `Secretary_Name`, `isSecretary`, `BlockNumber`, `status`) VALUES
(1, 'Kishan', 'Ghetiya', '1234', '1234567890', 'er.darshanghetiya@gmail.com', 'A+', 1, 'Darshan', 1, 302, 1),
(10, 'Mahendra', NULL, '1234', '9714232147', 'mahendra@gmail.com', 'b+', 26, 'Mahendra', 1, 101, 1),
(11, 'darshan', 'ghetiya', '1234', '7418529630', 'er.darshan@gmail.com', 'b+', 29, 'darshan', 1, 101, 1),
(13, 'Sachine', 'Patel', '1234', '7418529638', 'sachine@gmail.com', 'g+', 1, 'Darshan', 0, 301, 1),
(14, 'Archit', 'Ghetiya', '1234', '9904426028', 'ghetiyarchit007@gmail.com', 'o+', 42849, 'Archit', 1, 101, 1),
(15, 'Urvi', 'Javia', '1234', '9924510412', 'urvijavia31@gmail.com', 'b+', 42849, 'Archit', 0, 102, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `VehicleId` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleType` varchar(50) NOT NULL,
  `VehicleNumber` varchar(50) NOT NULL,
  `AppartmentId` int(11) NOT NULL,
  `BlockNumber` int(11) NOT NULL,
  PRIMARY KEY (`VehicleId`),
  KEY `AppartmentId` (`AppartmentId`),
  KEY `BlockNumber` (`BlockNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleId`, `VehicleType`, `VehicleNumber`, `AppartmentId`, `BlockNumber`) VALUES
(1, 'MotorCycle', 'GJ03FZ0072', 1, 302),
(2, 'Car', 'GJ03KL3020', 1, 302),
(6, 'Car', 'Gj03xx7894', 42849, 101),
(7, 'Bike', 'GJ08TT7418', 42849, 102);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `VisitorsID` int(11) NOT NULL AUTO_INCREMENT,
  `gatepass_id` bigint(50) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `MobileNumber` bigint(15) NOT NULL,
  `ArrivedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Address` varchar(50) DEFAULT NULL,
  `AppartmentId` int(11) NOT NULL,
  `Appartment_Name` varchar(50) DEFAULT NULL,
  `LeaveTime` datetime DEFAULT NULL,
  `BlockNumber` int(11) NOT NULL,
  PRIMARY KEY (`VisitorsID`),
  KEY `AppartmentId` (`AppartmentId`),
  KEY `BlockNumber` (`BlockNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`VisitorsID`, `gatepass_id`, `Name`, `MobileNumber`, `ArrivedTime`, `Address`, `AppartmentId`, `Appartment_Name`, `LeaveTime`, `BlockNumber`) VALUES
(20, 9938, 'mahendara', 7418529630, '2020-03-29 18:03:02', 'rajkot', 1, 'AksharGreen', '2020-03-29 12:58:08', 302),
(21, 9932, 'anikrt', 7418596352, '2020-03-30 20:00:30', 'rajkot', 1, 'AksharGreen', '2020-03-30 02:30:57', 302),
(22, 1087, 'asdad', 1234567890, '2020-03-31 12:46:03', 'asfas', 1, 'AksharGreen', NULL, 302);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block_con`
--
ALTER TABLE `block_con`
  ADD CONSTRAINT `block_con_ibfk_1` FOREIGN KEY (`AppartmentId`) REFERENCES `appartment` (`AppartmentId`);

--
-- Constraints for table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `parking_ibfk_1` FOREIGN KEY (`AppartmentId`) REFERENCES `appartment` (`AppartmentId`);

--
-- Constraints for table `secretary`
--
ALTER TABLE `secretary`
  ADD CONSTRAINT `secretary_ibfk_1` FOREIGN KEY (`AppartmentId`) REFERENCES `appartment` (`AppartmentId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`AppartmentId`) REFERENCES `appartment` (`AppartmentId`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`BlockNumber`) REFERENCES `block_con` (`BlockNumber`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`AppartmentId`) REFERENCES `appartment` (`AppartmentId`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`BlockNumber`) REFERENCES `block_con` (`BlockNumber`);

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`AppartmentId`) REFERENCES `appartment` (`AppartmentId`),
  ADD CONSTRAINT `visitors_ibfk_2` FOREIGN KEY (`BlockNumber`) REFERENCES `block_con` (`BlockNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
