-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 08:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpajaxlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `country` varchar(50) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vcode` varchar(50) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `country`, `username`, `email`, `password`, `vcode`, `joined_at`) VALUES
(1, 'naman kumar', 'india', 'naman123', 'naman@gmail.com', '$2y$10$jZJYtTGGQDtxkBzzCMJ6sugpOGXZeanG6kRzgf7oxcw./Ts.OdXLy', '8A#0$1KZtMbdYL&', '2018-12-01 08:36:25'),
(2, 'raman kumar', 'india', 'raman123', 'raman@gmail.com', '$2y$10$TarhwIZsn356AJAB17GTNeu.KZeHvEMoJMqRp6.yZ3OKwyyLpTYDO', '8560m4ge0K9M1w%', '2018-12-02 09:40:43'),
(3, 'Daman Kumar', 'India', 'daman', 'daman@gmail.com', '$2y$10$NLr.MQeNIhI.szheblKA4OPAZCmUMsjV9CW7H9CIvcwQcpDC.jpYK', '&A&cYsNfmx8Kzt6', '2018-12-02 13:07:13'),
(4, 'Aman Kumar ', 'India', 'aman123', 'aman123@gmail.com', '$2y$10$hxlpQ1wOY6bvB9Z2BvVohehi2fn7tSZ/LopKjZOvoTyCwEf/hX9bm', '2Ybm3skMP1htp0z', '2018-12-02 13:13:04'),
(7, 'Tapan Kumar', 'India', 'tapan', 'tapan@gmail.com', '$2y$10$4nogNEA8AzKfFxBuqtPayOAM1I7pTIr51MzoZrNcKjO68Mb/UmFA6', 'RLq1A5TzyMhx7m8', '2018-12-07 15:12:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
