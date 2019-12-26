-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 03:16 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE `edit` (
  `ID` int(10) NOT NULL,
  `Fname` varchar(25) NOT NULL,
  `Lname` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Gender` varchar(22) NOT NULL,
  `DOB` date NOT NULL,
  `Job` varchar(22) NOT NULL,
  `Picture` mediumblob NOT NULL,
  `Salary` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `ID` int(255) NOT NULL,
  `Question` text NOT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`ID`, `Question`, `Answer`) VALUES
(1, 'is Joe ebn wes5a?', 'Yes Joe is sometimes ebn wes5a'),
(2, 'Do u offer some pussy?', 'Unfortunatly no but we offer some nigger\'s dick');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `ID` int(255) NOT NULL,
  `Sender` int(255) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Priority` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Attachment` mediumblob DEFAULT NULL,
  `Date` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `Shown` tinyint(1) DEFAULT 0,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`ID`, `Sender`, `Subject`, `Priority`, `Description`, `Attachment`, `Date`, `Shown`, `Status`) VALUES
(50, 28, 'Salary', 'MOD', 'Hey sir,\r\nhow u doin?', '', '2019-12-26 12:19:29.000', 0, NULL),
(51, 28, 'Resignation', 'CRIT', 'please heeeeelp', '', '2019-12-26 13:44:09.000', 0, NULL),
(52, 28, 'Complaint', 'MAJ', 'fast action please', '', '2019-12-26 13:44:20.000', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Name`) VALUES
('Bonus'),
('Complaint'),
('Experience Certificate'),
('Loan'),
('Resignation'),
('Salary ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `Fname` varchar(256) NOT NULL,
  `Lname` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Gender` varchar(22) NOT NULL,
  `DOB` date NOT NULL,
  `Job` varchar(6) NOT NULL DEFAULT 'Emp',
  `Picture` mediumblob NOT NULL,
  `Salary` decimal(65,0) DEFAULT NULL,
  `activate` int(2) NOT NULL DEFAULT 0,
  `Verify` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Fname`, `Lname`, `Email`, `Password`, `Gender`, `DOB`, `Job`, `Picture`, `Salary`, `activate`, `Verify`) VALUES
(28, 'Albert ', 'Louca', 'a@gmail.com', 'asdasdasd', 'Male', '1998-12-30', 'Emp', 0x70726f66696c65732f494d475f343030392e4a5047, NULL, 0, 0),
(30, 'Conan', 'Edogawa', 'aptx@gmail.com', 'asdasd', 'Male', '2019-12-10', 'Emp', 0x70726f66696c65732f436f6e616e20476c61737365732e706e67, NULL, 0, 0),
(32, 'haha', 'xaxaxa', 'xaxa@gmail.com', 'asdasdasd', 'Male', '2019-12-12', 'Emp', 0x70726f66696c65732f436f6e616e20476c61737365732e706e67, NULL, 0, 0),
(33, 'xaxa', 'eeeee', 'ag@gmail.com', 'asdasd', 'Male', '2019-12-19', 'Emp', 0x70726f66696c65732f, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `edit`
--
ALTER TABLE `edit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Sender` (`Sender`),
  ADD KEY `Subject` (`Subject`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `edit`
--
ALTER TABLE `edit`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `letters`
--
ALTER TABLE `letters`
  ADD CONSTRAINT `letters_ibfk_1` FOREIGN KEY (`Sender`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `letters_ibfk_2` FOREIGN KEY (`Subject`) REFERENCES `subjects` (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
