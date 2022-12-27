-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 09:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipcruise`
--

-- --------------------------------------------------------

--
-- Table structure for table `cruise`
--

CREATE TABLE `cruise` (
  `id` int(11) NOT NULL,
  `shipId` int(11) NOT NULL,
  `image` text NOT NULL,
  `nombreNuits` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `startPort` int(11) NOT NULL,
  `label` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruise`
--

INSERT INTO `cruise` (`id`, `shipId`, `image`, `nombreNuits`, `startDate`, `startPort`, `label`) VALUES
(1, 1, 'img-1.jpeg', 2, '2022-12-24', 1, 'Cruise of Kings'),
(4, 1, 'img-1.jpeg', 3, '2022-12-25', 1, 'BLA BLA');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cruisev`
-- (See below for the actual view)
--
CREATE TABLE `cruisev` (
`id` int(11)
,`shipId` int(11)
,`image` text
,`nombreNuits` int(11)
,`startDate` date
,`startPort` int(11)
,`label` varchar(256)
,`ship` varchar(512)
,`startPortName` varchar(512)
);

-- --------------------------------------------------------

--
-- Table structure for table `passage`
--

CREATE TABLE `passage` (
  `cruiseId` int(11) NOT NULL,
  `portId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passage`
--

INSERT INTO `passage` (`cruiseId`, `portId`) VALUES
(1, 3),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `id` int(11) NOT NULL,
  `label` varchar(512) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`id`, `label`, `image`) VALUES
(1, 'teststartPort', 'img-1.jpeg'),
(3, 'Casablanca', 'casa.jpeg'),
(4, 'Paris', 'paris.jpeg'),
(5, 'Madrid', 'madrid.jpeg'),
(6, 'New York', 'ny.jpeg'),
(7, 'Shanghai', 'cn.jpeg'),
(8, 'Dakar', 'dk.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `roomId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `shipId` int(11) NOT NULL,
  `typeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `description`, `price`) VALUES
(1, 'Solo', 100);

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `label` varchar(512) NOT NULL,
  `image` text NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `label`, `image`, `capacity`) VALUES
(1, 'TestShip', 'ship.jpeg', 1700);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `password` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `firstName`, `lastName`, `role`, `password`, `created_at`) VALUES
(1, 'test@test.t', 'test', 'test', 'client', 'nonhashed', '2022-12-21 13:39:41');

-- --------------------------------------------------------

--
-- Structure for view `cruisev`
--
DROP TABLE IF EXISTS `cruisev`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cruisev`  AS SELECT `c`.`id` AS `id`, `c`.`shipId` AS `shipId`, `c`.`image` AS `image`, `c`.`nombreNuits` AS `nombreNuits`, `c`.`startDate` AS `startDate`, `c`.`startPort` AS `startPort`, `c`.`label` AS `label`, `s`.`label` AS `ship`, `p`.`label` AS `startPortName` FROM ((`cruise` `c` join `ship` `s` on(`c`.`shipId` = `s`.`id`)) join `port` `p` on(`c`.`startPort` = `p`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruise`
--
ALTER TABLE `cruise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipId` (`shipId`),
  ADD KEY `startPort` (`startPort`);

--
-- Indexes for table `passage`
--
ALTER TABLE `passage`
  ADD PRIMARY KEY (`portId`,`cruiseId`),
  ADD KEY `cruiseId` (`cruiseId`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`userId`,`roomId`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipId` (`shipId`),
  ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cruise`
--
ALTER TABLE `cruise`
  ADD CONSTRAINT `cruise_ibfk_1` FOREIGN KEY (`shipId`) REFERENCES `ship` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cruise_ibfk_2` FOREIGN KEY (`startPort`) REFERENCES `port` (`id`);

--
-- Constraints for table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `passage_ibfk_1` FOREIGN KEY (`cruiseId`) REFERENCES `ship` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `passage_ibfk_2` FOREIGN KEY (`portId`) REFERENCES `port` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`shipId`) REFERENCES `ship` (`id`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`typeId`) REFERENCES `room_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
