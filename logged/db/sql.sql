-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 09:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`id`, `name`, `phone`, `gender`, `age`, `address`, `password`, `deleted`) VALUES
(2, 'BAMURERE', '0780777770', 'Female', '20', 'kigali', 0, 0),
(3, 'HARERIMANA', '0780777888', 'Male', '58', 'KIMIRONKO', 0, 0),
(4, 'UWITONZE', '0789088880', 'Male', '20', 'KABUGA', 0, 0),
(5, 'ELISE MUKAMUSONI', '0789000008', 'Female', '23', 'BUGESERA', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `consumed`
--

CREATE TABLE `consumed` (
  `id` int(10) UNSIGNED NOT NULL,
  `temperature` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consumed`
--

INSERT INTO `consumed` (`id`, `temperature`, `humidity`, `reading_time`) VALUES
(5, 20.91, 40.91, '2022-12-02 06:46:26'),
(6, 0, 0, '2022-12-02 06:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `dht11_sensorlog`
--

CREATE TABLE `dht11_sensorlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `temperature` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dht11_sensorlog`
--

INSERT INTO `dht11_sensorlog` (`id`, `temperature`, `humidity`, `reading_time`) VALUES
(9, 0, 0, '2022-12-02 05:41:16'),
(10, 0, 0, '2022-12-02 05:46:11'),
(11, 0, 0, '2022-12-02 05:53:20'),
(12, 0, 0, '2022-12-02 05:58:19'),
(13, 0, 0, '2022-12-02 06:02:44'),
(14, 0, 0, '2022-12-02 06:03:45'),
(15, 0, 0, '2022-12-02 06:04:44'),
(16, 0, 0, '2022-12-02 06:05:45'),
(17, 0, 0, '2022-12-02 06:09:46'),
(18, 0, 0, '2022-12-02 06:10:47'),
(19, 0, 0, '2022-12-02 06:11:53'),
(20, 2, 4, '2022-12-02 06:26:14'),
(21, 2, 4, '2022-12-02 06:31:55'),
(22, 2, 4, '2022-12-02 06:32:57'),
(23, 2, 4, '2022-12-02 06:35:02'),
(24, 2, 4, '2022-12-02 06:36:04'),
(25, 2, 4, '2022-12-02 06:39:30'),
(26, 2, 4, '2022-12-02 06:40:31'),
(27, 2, 4, '2022-12-02 06:45:24'),
(28, 2, 4, '2022-12-02 06:46:26'),
(29, 2, 4, '2022-12-02 06:50:02'),
(30, 0, 0, '2022-12-02 06:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `minute`
--

CREATE TABLE `minute` (
  `id` int(11) NOT NULL,
  `minut` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `minute`
--

INSERT INTO `minute` (`id`, `minut`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newrecord`
--

CREATE TABLE `newrecord` (
  `id` int(11) NOT NULL,
  `tim` time NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newrecord`
--

INSERT INTO `newrecord` (`id`, `tim`, `dat`) VALUES
(10, '11:00:00', '2022-11-07'),
(11, '10:00:00', '2022-10-31'),
(12, '00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `item` time NOT NULL,
  `description` date NOT NULL,
  `cid` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `rdatetime` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `item`, `description`, `cid`, `room`, `rdatetime`, `status`) VALUES
(17, '11:11:00', '2022-11-01', '2', 'Female Shower Room', '1669464267', 1),
(18, '11:00:00', '2022-11-07', '2', 'Female Shower Room', '1669566978', 2),
(19, '11:00:00', '2022-11-27', '2', 'Male Shower Room', '1669567062', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `room` varchar(100) NOT NULL,
  `temp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumed`
--
ALTER TABLE `consumed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dht11_sensorlog`
--
ALTER TABLE `dht11_sensorlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minute`
--
ALTER TABLE `minute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newrecord`
--
ALTER TABLE `newrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
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
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consumed`
--
ALTER TABLE `consumed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dht11_sensorlog`
--
ALTER TABLE `dht11_sensorlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `minute`
--
ALTER TABLE `minute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newrecord`
--
ALTER TABLE `newrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
