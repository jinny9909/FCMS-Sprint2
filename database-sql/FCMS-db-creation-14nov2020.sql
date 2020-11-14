-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 06:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_package`
--

CREATE TABLE `catering_package` (
  `PackageID` varchar(11) NOT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackageDescription` varchar(255) DEFAULT NULL,
  `PricePerPax` int(11) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catering_package`
--

INSERT INTO `catering_package` (`PackageID`, `PackageName`, `PackageDescription`, `PricePerPax`, `ImagePath`) VALUES
('CP00000001', 'Chinese Catering Package', 'This is Chinese Cuisine', 500, 'images\\packages\\packageA.jpg'),
('CP00000002', 'Western Catering Package', 'This is Indian Cuisine', 200, 'images\\packages\\packageB.jpg'),
('CP00000003', 'Mix Catering Package', 'This is Malay Cuisine', 400, 'images\\packages\\packageC.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` varchar(10) NOT NULL,
  `MemberID` varchar(10) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(10) UNSIGNED DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `MemberID`, `Status`, `Username`, `Email`, `ImagePath`, `Password`, `PhoneNumber`, `token`) VALUES
('CL00000001', 'CM00000001', 1, 'user1', 'ljunyee@gmail.com', 'images\\ProfilePicture\\user1.jpg', '123456', 1234567891, 'aeeegteRrA'),
('CL00000002', 'CM00000002', 1, 'user2', 'user2@gmail.com', 'images\\ProfilePicture\\user2.jpg', 'abc123', 1234567892, ''),
('CL00000003', 'CM00000003', 1, 'user3', 'user3@gmail.com', 'images\\ProfilePicture\\user3.jpg', 'abc123', 1234567893, ''),
('CL00000004', 'CM00000004', 1, 'user4', 'user4@gmail.com', 'images\\ProfilePicture\\user4.jpg', 'abc123', 1234567893, '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `FoodID` varchar(11) NOT NULL,
  `PackageID` varchar(11) NOT NULL,
  `FoodName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`FoodID`, `PackageID`, `FoodName`) VALUES
('CF00000001', 'CP00000001', 'Chinese Fried Rice'),
('CF00000002', 'CP00000001', 'Breaised Noodles'),
('CF00000003', 'CP00000001', 'Seafood with Chilli Crab Sauce'),
('CF00000004', 'CP00000001', 'Omelette');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` varchar(11) NOT NULL,
  `MemberPoint` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `MemberPoint`) VALUES
('CM00000001', 100),
('CM00000002', 50),
('CM00000003', 200),
('CM00000004', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mtaccount`
--

CREATE TABLE `mtaccount` (
  `MTID` varchar(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtaccount`
--

INSERT INTO `mtaccount` (`MTID`, `user_name`, `password`, `email`, `token`) VALUES
('MT000001', 'MT01', 'abcd12345', 'ljunyee@gmail.com', 'Me61283eaS'),
('MT000002', 'MT02', 'abc123', 'MT02@gmail.com', ''),
('MT000003', 'MT03', 'abc123', 'MT03@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `operationteam`
--

CREATE TABLE `operationteam` (
  `OperationID` varchar(11) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operationteam`
--

INSERT INTO `operationteam` (`OperationID`, `Username`, `password`, `Status`, `Email`, `token`) VALUES
('OT00000001', 'operation1', 'abc123', 1, 'operation1@gmail.com', ''),
('OT00000002', 'operation2', '', 1, 'operation1@gmail.com', ''),
('OT00000003', 'operation3', '', 1, 'operation1@gmail.com', ''),
('OT00000004', 'operation4', '', 1, 'operation1@gmail.com', ''),
('OT00000005', 'operation5', '', 1, 'operation1@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `reward_item`
--

CREATE TABLE `reward_item` (
  `ItemID` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemPoints` int(11) NOT NULL,
  `ItemImgPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reward_item`
--

INSERT INTO `reward_item` (`ItemID`, `ItemName`, `ItemPoints`, `ItemImgPath`) VALUES
(0, 'Mineral Water', 50, 'images\\reward1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering_package`
--
ALTER TABLE `catering_package`
  ADD PRIMARY KEY (`PackageID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`FoodID`),
  ADD KEY `PackageID` (`PackageID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `mtaccount`
--
ALTER TABLE `mtaccount`
  ADD PRIMARY KEY (`MTID`);

--
-- Indexes for table `operationteam`
--
ALTER TABLE `operationteam`
  ADD PRIMARY KEY (`OperationID`);

--
-- Indexes for table `reward_item`
--
ALTER TABLE `reward_item`
  ADD PRIMARY KEY (`ItemID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`PackageID`) REFERENCES `catering_package` (`PackageID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
