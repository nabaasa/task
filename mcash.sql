-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 06:56 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcash`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataentrants`
--

CREATE TABLE `dataentrants` (
  `id` int(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataentrants`
--

INSERT INTO `dataentrants` (`id`, `email`, `password`) VALUES
(1, 'archie@mcash.ug', '202cb962ac59075b964b07152d234b70'),
(2, 'j@mcash.ug', 'c20ad4d76fe97759aa27a0c99bff6710'),
(3, 't@mcash.ug', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `id` int(50) NOT NULL,
  `AccountName` text NOT NULL,
  `PAN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`id`, `AccountName`, `PAN`) VALUES
(1, 'emmanuel ecodu', '6376540110000245'),
(2, 'Mukuza ezekiel', '6376540110000252'),
(3, 'nabaasa', '6376540110000260'),
(4, 'kamya  edward', '6376540110000278');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `AccountName` text NOT NULL,
  `PAN` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `AccountName`, `PAN`, `phone`) VALUES
(1, 'Nabaasa Archie', '0011000023', ''),
(2, 'emmanuel ecodu', '0011000024', ''),
(4, 'Mukuza ezekiel', '0011000025', ''),
(5, 'nabaasa', '0011000026', ''),
(6, 'kamya  edward', '0011000027', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataentrants`
--
ALTER TABLE `dataentrants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataentrants`
--
ALTER TABLE `dataentrants`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
