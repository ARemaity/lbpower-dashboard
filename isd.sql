-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 12:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `PID` int(10) NOT NULL,
  `SID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `PID`, `SID`) VALUES
(1, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `PID` int(11) NOT NULL,
  `fk_supplier` int(11) NOT NULL,
  `Supplier_Company` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `PID`, `fk_supplier`, `Supplier_Company`) VALUES
('1', 1, 3, 'LBPower'),
('2', 5, 3, 'LBPower');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complaint_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detials` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_type` int(11) DEFAULT NULL,
  `fk_sender` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complaint_type`, `detials`, `sender_type`, `fk_sender`) VALUES
(1, 'Hardware', 'qddc', 1, NULL),
(2, 'Software', 'Banana', 1, NULL),
(3, 'Software', 'my device is not working properly', 0, NULL),
(4, 'Software', 'my device is not working properly', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `id_cc` int(11) NOT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `name_holder` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_number` int(11) DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `balance` decimal(15,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`id_cc`, `fk_user`, `name_holder`, `cc_number`, `cvc`, `expire_date`, `balance`) VALUES
(1, 1, 'ALI', 2123242413, 212, '2019-04-17', '100.0000');

-- --------------------------------------------------------

--
-- Table structure for table `cumulative`
--

CREATE TABLE `cumulative` (
  `fk_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cumulative`
--

INSERT INTO `cumulative` (`fk_id`, `value`) VALUES
('1', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `day_value`
--

CREATE TABLE `day_value` (
  `id` int(11) NOT NULL,
  `fk_client` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `dates` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `day_value`
--

INSERT INTO `day_value` (`id`, `fk_client`, `value`, `dates`) VALUES
(1, 1, 1000, '2019-04-19'),
(2, 1, 1000, '2019-04-19'),
(3, 1, 1000, '2019-04-19'),
(4, 1, 1000, '2019-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id_device` int(11) NOT NULL,
  `device_sn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deive_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amper_capacity` int(11) DEFAULT NULL,
  `fk_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id_device`, `device_sn`, `deive_type`, `amper_capacity`, `fk_client`) VALUES
(16, '123546654', 'wfuw', 21, 5),
(17, '123465678', 'big device', 654, 1);

-- --------------------------------------------------------

--
-- Table structure for table `firebase_config`
--

CREATE TABLE `firebase_config` (
  `apiKey` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `authDomain` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `databaseURL` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `projectId` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `storageBucket` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `messagingSenderId` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hour_value`
--

CREATE TABLE `hour_value` (
  `id` int(11) NOT NULL,
  `fk_client` int(11) DEFAULT NULL,
  `val` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hour_value`
--

INSERT INTO `hour_value` (`id`, `fk_client`, `val`) VALUES
(1, 1, 100),
(2, 1, 100),
(3, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month_value`
--

CREATE TABLE `month_value` (
  `id` int(11) NOT NULL,
  `fk_client` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `month_value`
--

INSERT INTO `month_value` (`id`, `fk_client`, `value`, `dates`) VALUES
(1, 1, 9600, '2019-04-19'),
(2, 1, 9600, '2019-05-19'),
(3, 1, 5400, '2019-06-19'),
(4, 1, 4000, '2019-07-19'),
(5, 1, 4000, '2019-08-19'),
(6, 1, 4000, '2019-09-19'),
(7, 1, 4000, '2019-10-19'),
(8, 1, 4000, '2019-11-19'),
(9, 1, 4000, '2019-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `SID` int(10) NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`SID`, `password`) VALUES
(0, 'banana'),
(1, '123456'),
(2, 'toysRus'),
(3, 'minions');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `fk_client` int(11) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `payment_st` int(11) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `fk_client`, `balance`, `payment_st`, `issued_date`, `payment_date`) VALUES
(1, 1, 231, 1, '2019-04-09', '2019-04-23'),
(2, 2, 432, 1, '2019-04-03', '2019-04-24'),
(5, 1, 100, 1, '2019-04-15', '2019-04-18'),
(6, 1, 100, 0, '2019-04-02', NULL),
(7, 1, 250, 0, '2019-04-19', NULL),
(8, 1, 240000, 0, '2019-04-19', NULL),
(9, 1, 240000, 0, '2019-04-19', NULL),
(10, 1, 240000, 0, '2019-04-19', NULL),
(11, 1, 240000, 0, '2019-04-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `PID` int(11) NOT NULL,
  `role` int(2) NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`PID`, `role`, `fname`, `lname`, `city`, `street`, `phone`, `email`) VALUES
(1, 0, 'Natsu', 'Dragneel', 'Hargeon', 'Lacrema', 12345666, 'ndrag@gmail.com'),
(3, 1, 'John', 'Doe', 'Amsterdam', 'Wall', 3093937, 'johndoe@gmail.com'),
(4, 1, 'jon', 'snow', 'winterfell', 'white street', 1313456, 'jonsnow@gmail.com'),
(5, 0, 'lucy', 'heartfelia', 'hargeon', 'Lacrema St.', 12345777, 'lucyh@gmail.com'),
(6, 1, 'Ibrahim', 'Roumieh', 'Dearborn', 'Main', 76719671, 'just4uroumieh@gmail.com'),
(7, 2, 'Igneel', 'Dragonborn', 'Dragon City', 'N/A', 11122233, 'igneel@gmail.com'),
(12, 1, 'Bibs', 'Roumieh', 'Tyre', 'Main', 3093937, 'bibsroumieh94@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `SID` int(10) NOT NULL,
  `comapany_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost_1kw` double DEFAULT NULL,
  `user_capacity` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `PID`, `SID`, `comapany_name`, `cost_1kw`, `user_capacity`) VALUES
(2, 3, 1, 'LBPower', 65, 300),
(3, 6, 0, 'chicken', 60, 30),
(4, 12, 3, 'Epic Games', 125, 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`id_cc`);

--
-- Indexes for table `day_value`
--
ALTER TABLE `day_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id_device`);

--
-- Indexes for table `hour_value`
--
ALTER TABLE `hour_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_value`
--
ALTER TABLE `month_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id_cc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `day_value`
--
ALTER TABLE `day_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hour_value`
--
ALTER TABLE `hour_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `month_value`
--
ALTER TABLE `month_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
