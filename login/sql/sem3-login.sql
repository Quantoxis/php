-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2020 at 02:32 PM
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
-- Database: `sem3-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `pi_color`
--

CREATE TABLE `pi_color` (
  `id` int(11) NOT NULL,
  `colorname` varchar(45) DEFAULT NULL,
  `cssclass` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pi_color`
--

INSERT INTO `pi_color` (`id`, `colorname`, `cssclass`) VALUES
(1, 'Yellow', 'postityellow'),
(2, 'Green', 'postitgreen'),
(3, 'Red', 'postitred'),
(4, 'Blue', 'postitblue');

-- --------------------------------------------------------

--
-- Table structure for table `pi_postit`
--

CREATE TABLE `pi_postit` (
  `id` int(11) NOT NULL,
  `createdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `headertext` varchar(45) DEFAULT NULL,
  `bodytext` varchar(100) DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pi_postit`
--

INSERT INTO `pi_postit` (`id`, `createdate`, `headertext`, `bodytext`, `color_id`, `users_id`) VALUES
(2, '2018-09-14 10:36:32', 'over', 'brød', 1, 2),
(4, '2019-04-11 16:21:01', 'jyyjjy', 'yjyj', 1, 1),
(5, '2019-04-11 16:21:05', 'yjjy', 'jyyj', 4, 1),
(6, '2019-10-04 00:12:46', 'gfgf', 'fg', 1, 1),
(7, '2019-10-04 00:12:50', 'sdggsd', 'gsd', 1, 1),
(8, '2019-10-04 00:12:53', 'sggsd', 'sgd', 1, 1),
(10, '2019-10-04 00:13:00', 'sgd', 'gsd', 1, 1),
(11, '2019-10-04 00:14:30', 'sg', 'gsf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pi_users`
--

CREATE TABLE `pi_users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `pwhash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pi_users`
--

INSERT INTO `pi_users` (`id`, `username`, `pwhash`) VALUES
(1, 'adnan', '$2y$10$EmluxHwhg1kXOPKXy5xT7.X.xvOaNQEjU6tNJ4Xa6nu3CaqZLg7fy'),
(2, 'adnan2', '$2y$10$TGB0saVV.414r025Hl6vGOXlqvx35FbTkJjG9jkhbNqZnkZl5EgiG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pi_color`
--
ALTER TABLE `pi_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_postit`
--
ALTER TABLE `pi_postit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_postit_color_idx` (`color_id`),
  ADD KEY `fk_postit_users1_idx` (`users_id`);

--
-- Indexes for table `pi_users`
--
ALTER TABLE `pi_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pi_color`
--
ALTER TABLE `pi_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pi_postit`
--
ALTER TABLE `pi_postit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pi_users`
--
ALTER TABLE `pi_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pi_postit`
--
ALTER TABLE `pi_postit`
  ADD CONSTRAINT `fk_postit_color` FOREIGN KEY (`color_id`) REFERENCES `pi_color` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_postit_users1` FOREIGN KEY (`users_id`) REFERENCES `pi_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
