-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2019 at 08:45 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8992783_isd`
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

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `PID` int(20) NOT NULL,
  `fkSupplier` int(11) DEFAULT NULL,
  `Supplier_Company` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `PID`, `fkSupplier`, `Supplier_Company`) VALUES
('tFjtHhMX5HOfthWG9yko0ePqqm62', 3, 2, 'LBpower');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complaint_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detials` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_type` int(11) DEFAULT NULL,
  `fk_sender` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complaint_type`, `detials`, `sender_type`, `fk_sender`) VALUES
(0, 'Software', 'my login isnt working', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `id_cc` int(11) NOT NULL,
  `fk_user` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
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
(1, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 'ALI', 2123242413, 212, '2019-04-17', '100.0000');

-- --------------------------------------------------------

--
-- Table structure for table `cumulative`
--

CREATE TABLE `cumulative` (
  `fk_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cumulative`
--

INSERT INTO `cumulative` (`fk_id`, `value`) VALUES
('1', 2300),
('tFjtHhMX5HOfthWG9yko0ePqqm62', 504);

-- --------------------------------------------------------

--
-- Table structure for table `day_value`
--

CREATE TABLE `day_value` (
  `id` int(11) NOT NULL,
  `fk_client` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `dates` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `day_value`
--

INSERT INTO `day_value` (`id`, `fk_client`, `value`, `dates`) VALUES
(1, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 280, '2019-05-01'),
(2, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 280, '2019-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id_device` int(11) NOT NULL,
  `device_sn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deive_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amper_capacity` int(11) DEFAULT NULL,
  `fk_client` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fkSupplier` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `fk_client` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `val` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hour_value`
--

INSERT INTO `hour_value` (`id`, `fk_client`, `val`) VALUES
(1, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 28),
(2, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 28),
(3, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 28),
(4, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 28),
(5, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 28),
(6, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 28);

-- --------------------------------------------------------

--
-- Table structure for table `month_value`
--

CREATE TABLE `month_value` (
  `id` int(11) NOT NULL,
  `fk_client` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `month_value`
--

INSERT INTO `month_value` (`id`, `fk_client`, `value`, `dates`) VALUES
(1, '1', 4000, '2019-05-01'),
(2, '1', 4000, '2019-05-01'),
(3, '1', 4000, '2019-05-01'),
(4, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 3280, '2019-05-01');

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
(4, 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `fk_client` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consumption` double DEFAULT NULL,
  `costof1` float NOT NULL,
  `Total` float NOT NULL,
  `payment_st` int(11) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `fk_client`, `consumption`, `costof1`, `Total`, `payment_st`, `issued_date`, `payment_date`) VALUES
(12, '1', 4000, 0, 0, 0, '2019-05-01', NULL),
(13, '1', 4000, 100, 400000, 0, '2019-05-01', NULL),
(14, '1', 4000, 100, 400000, 0, '2019-05-01', NULL),
(15, 'tFjtHhMX5HOfthWG9yko0ePqqm62', 3280, 0, 0, 0, '2019-05-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `PID` int(20) NOT NULL,
  `role` int(1) NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`PID`, `role`, `fname`, `lname`, `city`, `street`, `phone`, `email`) VALUES
(2, 1, 'ali', 'ibrahim', 'adad', 'dadad', 23123131, 'asdasd@gmail.com'),
(3, 0, 'hassan', 'aknan', 'biruet', 'fourth street', 30423424, 'a@gmail.om');

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
(2, 2, 4, 'LBPower', 100, 50);

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
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `id_cc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `day_value`
--
ALTER TABLE `day_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hour_value`
--
ALTER TABLE `hour_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `month_value`
--
ALTER TABLE `month_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `PID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
