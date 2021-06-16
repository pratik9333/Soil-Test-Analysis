-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 12:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soil_test_analysis`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `Name` varchar(128) NOT NULL,
  `Age` int(3) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Aadhar` bigint(12) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`Name`, `Age`, `Address`, `Aadhar`, `Contact`, `Email`, `password`) VALUES
('Rohit', 12, 'Dev kutir ', 123456789111, '9191919191', 'abc@gmail.com', '123'),
('Pratik', 12, 'dev kutir a wing mumbai', 448781962421, '9324130045', 'pratik@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `Name` char(50) NOT NULL,
  `Workspace` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`Name`, `Workspace`, `Contact`, `Email`, `password`) VALUES
('ABC', 'mumbai', '9393939393', 'harsh@gmail.com', '123'),
('Yash', 'mumbai', '9324130045', 'yash@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `TestID` int(10) NOT NULL,
  `PH` int(10) NOT NULL,
  `Nitrogen` int(10) NOT NULL,
  `Phosphorus` int(10) NOT NULL,
  `Pottasium` int(10) NOT NULL,
  `Calcium` int(10) NOT NULL,
  `Magnesium` int(10) NOT NULL,
  `Salinity` int(10) NOT NULL,
  `Zinc` int(10) NOT NULL,
  `Iron` int(10) NOT NULL,
  `Manganese` int(10) NOT NULL,
  `Copper` int(10) NOT NULL,
  `Sodium` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`TestID`, `PH`, `Nitrogen`, `Phosphorus`, `Pottasium`, `Calcium`, `Magnesium`, `Salinity`, `Zinc`, `Iron`, `Manganese`, `Copper`, `Sodium`) VALUES
(13568, 12, 14, 72, 17, 67, 87, 12, 65, 12, 66, 97, 12),
(18552, 12, 13, 17, 81, 17, 7, 79, 77, 12, 54, 17, 88),
(23897, 6, 83, 15, 27, 12, 10, 20, 25, 78, 80, 35, 10),
(47659, 12, 13, 15, 17, 87, 12, 45, 76, 78, 87, 99, 76);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TestID` int(10) NOT NULL,
  `Name` char(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Aadhar` bigint(12) NOT NULL,
  `Acres` int(20) NOT NULL,
  `TestAlloted` char(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TestID`, `Name`, `Address`, `Aadhar`, `Acres`, `TestAlloted`, `UserEmail`, `Description`, `Status`) VALUES
(13568, 'Pratik', '                            dev kutir a wing mumbai                            ', 448781962421, 1028, 'Yash', 'pratik@gmail.com', 'Crops quality is detroitaded', 'Tested'),
(18552, 'Rohit', '                            Dev kutir                             ', 123456789111, 120, 'Yash', 'abc@gmail.com', 'Crops quality is damaged\r\n', 'Tested');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`Aadhar`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`TestID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TestID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
