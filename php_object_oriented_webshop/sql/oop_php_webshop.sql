-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2020 at 01:58 PM
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
-- Database: `oop_php_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `oopphp_items`
--

CREATE TABLE `oopphp_items` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemDescription` varchar(1024) NOT NULL,
  `itemPrice` float NOT NULL,
  `itemStock` int(11) NOT NULL,
  `itemImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oopphp_items`
--

INSERT INTO `oopphp_items` (`itemID`, `itemName`, `itemDescription`, `itemPrice`, `itemStock`, `itemImagePath`) VALUES
(73, 'Black shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 500, 0, 'images/imagesItems/1588674459-black-shoes.jpg'),
(74, 'Blue pants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 400, 3, 'images/imagesItems/1588674480-blue-pants.jpg'),
(75, 'Blue shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 300, 10, 'images/imagesItems/1588674498-blue-shoes.jpg'),
(76, 'Brown shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1000, 2, 'images/imagesItems/1588674519-brown-shoes.jpg'),
(77, 'Green pants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 400, 3, 'images/imagesItems/1588674531-green-pants.jpg'),
(78, 'Pink shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 850, 4, 'images/imagesItems/1588674547-pink-shoes.jpg'),
(79, 'Pink t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 400, 4, 'images/imagesItems/1588674572-pink-tshirt.jpg'),
(80, 'Purple shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 550, 0, 'images/imagesItems/1588674610-purple-shoes.jpg'),
(81, 'Red t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 300, 0, 'images/imagesItems/1588674676-red-tshirt.jpg'),
(82, 'White pants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 400, 5, 'images/imagesItems/1588674702-white-pants.jpg'),
(83, 'White shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 1, 'images/imagesItems/1588674715-white-shoes.jpg'),
(84, 'White t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100, 0, 'images/imagesItems/1588674731-white-tshirt.jpg'),
(85, 'Yellow t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100, 0, 'images/imagesItems/1588674768-yellow-tshirt.jpg'),
(88, 'alert(&#39;1&#39;);', 'alert(&#39;1&#39;);', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oopphp_users`
--

CREATE TABLE `oopphp_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `userPassword_hash` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT '0' COMMENT '1=admin, 0=non-admin',
  `wishlistIsPublic` tinyint(1) DEFAULT '0' COMMENT '1=public, 0=private',
  `userImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oopphp_users`
--

INSERT INTO `oopphp_users` (`userID`, `userName`, `userPassword_hash`, `isAdmin`, `wishlistIsPublic`, `userImagePath`) VALUES
(1, 'admin', '$2y$10$lVGcqkka8BblY5GPud2D0.gzaStVTFdZZYU0OBjm52nU.0Ygd4K6C', 1, 1, NULL),
(82, 'adnan bacic', '$2y$10$tCnK/h/GKdsf4HMVi7AHAeJVqWwmIebXFINiasU.fIV7etsckWsme', 0, 1, NULL),
(83, 'admin2', '$2y$10$5Ly7QA53yEtC/Pobel9wiOqlpsfZNAGwnHvjRNOA8T5OQldllflhW', 1, 0, NULL),
(84, 'user', '$2y$10$9/tWLoU2cuSIisBjpu/Ns.fmzEk40/J4fyzPouogjW9ITwW23td4m', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oopphp_wishlist`
--

CREATE TABLE `oopphp_wishlist` (
  `insertID` int(11) NOT NULL,
  `userID_fk` int(11) NOT NULL,
  `itemID_fk` int(11) NOT NULL,
  `itemName_fk` varchar(255) NOT NULL,
  `itemDescription_fk` varchar(1024) NOT NULL,
  `itemPrice_fk` float NOT NULL,
  `itemStock_fk` varchar(255) NOT NULL,
  `itemImagePath_fk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oopphp_wishlist`
--

INSERT INTO `oopphp_wishlist` (`insertID`, `userID_fk`, `itemID_fk`, `itemName_fk`, `itemDescription_fk`, `itemPrice_fk`, `itemStock_fk`, `itemImagePath_fk`) VALUES
(2, 82, 74, 'Blue pants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 400, '3', 'images/imagesItems/1588674480-blue-pants.jpg'),
(3, 82, 75, 'Blue shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 300, '10', 'images/imagesItems/1588674498-blue-shoes.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oopphp_items`
--
ALTER TABLE `oopphp_items`
  ADD PRIMARY KEY (`itemID`),
  ADD UNIQUE KEY `itemName` (`itemName`);

--
-- Indexes for table `oopphp_users`
--
ALTER TABLE `oopphp_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `oopphp_wishlist`
--
ALTER TABLE `oopphp_wishlist`
  ADD PRIMARY KEY (`insertID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oopphp_items`
--
ALTER TABLE `oopphp_items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `oopphp_users`
--
ALTER TABLE `oopphp_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `oopphp_wishlist`
--
ALTER TABLE `oopphp_wishlist`
  MODIFY `insertID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
