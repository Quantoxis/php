-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2020 at 02:35 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victor_fysioterapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `vf_users`
--

CREATE TABLE `vf_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `pwhash` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0' COMMENT '0=non admin, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vf_users`
--

INSERT INTO `vf_users` (`id`, `username`, `pwhash`, `admin`) VALUES
(61, 'admin', '$2y$10$ZbO101140Z0yMI/QLgFgGuZRvvZXouAxJGKm220aCHApTnopgLrru', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vf_users`
--
ALTER TABLE `vf_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vf_users`
--
ALTER TABLE `vf_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
