-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 08:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(30) NOT NULL,
  `CreditCardno` varchar(20) NOT NULL DEFAULT 'N/A',
  `ExpirationDate` varchar(20) NOT NULL DEFAULT 'N/A',
  `CCV` varchar(20) NOT NULL DEFAULT 'N/A',
  `phone` varchar(20) NOT NULL,
  `TransactionCode` varchar(50) NOT NULL,
  `Amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `Name`, `Email`, `Address`, `City`, `CreditCardno`, `ExpirationDate`, `CCV`, `phone`, `TransactionCode`, `Amount`) VALUES
(1, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW1933288', 5000),
(2, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW7043112', 5000),
(3, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW8693012', 5000),
(4, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW8321097', 5000),
(5, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', 'N/A', 'N/A', 'N/A', '254702502952', 'ws_CO_15032023140940452702502952', 5000),
(6, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', 'N/A', 'N/A', 'N/A', '254702502952', 'ws_CO_15032023141005525702502952', 5000),
(7, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', 'N/A', 'N/A', 'N/A', '254702502952', 'ws_CO_15032023141051978702502952', 5000),
(8, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', 'N/A', 'N/A', 'N/A', '254702502952', 'ws_CO_15032023141238195702502952', 5000),
(9, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW5990210', 5000),
(10, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW6075107', 5000),
(11, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '1234567890', '1122', '112', '254702502952', 'AZW7749176', 5000),
(12, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '12345678', '1122', '112', '254702502952', 'AZW1903680', 5000),
(13, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Nairobi', '12345678', '1122', '112', '254702502952', 'AZW2121512', 5000),
(14, 'VINCENT KIPKURUI', 'vincentbettoh@gmail.com', 'Nakuru, Kenya', 'Kericho', '12345678', '0324', '112', '0702502952', 'AZW9622950', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'vincentbettoh@gmail.com', '123456', 'donor'),
(2, 'admin', 'admin', 'admin'),
(3, 'victorbettoh', '123456', 'donor');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_description` varchar(100) NOT NULL,
  `banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_description`, `banner`) VALUES
(1, 'Turkana', 'Good for children', 'image.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
