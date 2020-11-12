-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 09:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` varchar(10) NOT NULL,
  `MemberID` varchar(10) NOT NULL,
  `PicturePath` varchar(256) NOT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `MemberID`, `PicturePath`, `Status`, `Username`, `Email`, `Password`, `PhoneNumber`) VALUES
('CL00000001', 'CM00000001', 'images\\ProfilePicture\\user1.jpg', 1, 'user1', 'user1@gmail.com', 'abc123', 1234567891),
('CL00000002', 'CM00000002', 'images\\ProfilePicture\\user2.jpg', 1, 'user2', 'user2@gmail.com', 'abc123', 1234567892),
('CL00000003', 'CM00000003', 'images\\ProfilePicture\\user3.jpg', 1, 'user3', 'user3@gmail.com', 'abc123', 1234567893),
('CL00000004', 'CM00000004', 'images/ProfilePicture/Uncle Roger.png', 0, 'Uncle Roger', 'ur@gmail.com', 'Haiyah1234', 54678910);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`,`MemberID`) USING BTREE,
  ADD KEY `MemberID` (`MemberID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
