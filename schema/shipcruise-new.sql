-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 12:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `nights` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `startPort` int(11) DEFAULT NULL,
  `label` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruise`
--

INSERT INTO `cruise` (`id`, `shipId`, `image`, `nights`, `startDate`, `startPort`, `label`) VALUES
(10, 1, 'img-1.jpeg', 2, '2022-12-28', NULL, 'Sweden Cruise'),
(11, 1, 'img-1.jpeg', 7, '2022-12-16', NULL, 'Atlantic Ocean'),
(23, 1, 'casa.jpeg', 5, '2023-01-04', 6, 'Cruise of People'),
(24, 1, 'casa.jpeg', 9, '2023-01-11', 3, 'Cruise 658'),
(25, 1, 'casa.jpeg', 4, '2023-01-07', 6, 'Cruise 654'),
(26, 2, '242506712_1282308865539958_7823311323625195426_n.jpg', 5, '2023-01-04', 5, 'Midjourney'),
(27, 2, '242506712_1282308865539958_7823311323625195426_n.jpg', 7, '2023-01-06', 6, 'Rihla'),
(28, 2, 'wallpapersden.com_dragons-above-cloud-game-of-throne-season-8_7680x4320.jpg', 6, '2023-01-18', 3, 'Journey'),
(30, 1, 'wallpapersden.com_dragons-above-cloud-game-of-throne-season-8_7680x4320.jpg', 6, '2023-02-02', 3, 'Sea Trip');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cruisev`
-- (See below for the actual view)
--
CREATE TABLE `cruisev` (
`id` int(11)
,`shipId` int(11)
,`image` text
,`nights` int(11)
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
(25, 3),
(27, 3),
(24, 5),
(27, 5),
(28, 5),
(30, 5),
(24, 6),
(26, 6),
(28, 6),
(30, 6),
(27, 7),
(28, 7),
(30, 7),
(25, 8),
(26, 8),
(26, 14);

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
(3, 'Casablanca', 'img-1.jpeg'),
(5, 'Madrid', 'img-1.jpeg'),
(6, 'New York', 'img-1.jpeg'),
(7, 'Shanghai', 'img-1.jpeg'),
(8, 'Dakar', 'img-1.jpeg'),
(14, 'Agadir', 'inception.png');

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

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `shipId`, `typeId`) VALUES
(1, 2, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `roomv`
-- (See below for the actual view)
--
CREATE TABLE `roomv` (
`id` int(11)
,`type` varchar(255)
,`cruiseId` int(11)
,`price` double
);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `label`, `price`) VALUES
(1, 'Solo', 100),
(2, 'Duo', 200),
(3, 'Family', 550);

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
(1, 'Titanic', 'img-1.jpeg', 1700),
(2, 'Maradona', 'templateCrousel.jpeg', 800);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cruisev`  AS SELECT `c`.`id` AS `id`, `c`.`shipId` AS `shipId`, `c`.`image` AS `image`, `c`.`nights` AS `nights`, `c`.`startDate` AS `startDate`, `c`.`startPort` AS `startPort`, `c`.`label` AS `label`, `s`.`label` AS `ship`, `p`.`label` AS `startPortName` FROM ((`cruise` `c` join `ship` `s` on(`c`.`shipId` = `s`.`id`)) join `port` `p` on(`c`.`startPort` = `p`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `roomv`
--
DROP TABLE IF EXISTS `roomv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `roomv`  AS SELECT `r`.`id` AS `id`, `rt`.`label` AS `type`, `c`.`id` AS `cruiseId`, `rt`.`price` AS `price` FROM (((`room` `r` join `room_type` `rt` on(`rt`.`id` = `r`.`typeId`)) join `ship` `s` on(`r`.`shipId` = `s`.`id`)) join `cruise` `c` on(`s`.`id` = `c`.`shipId`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cruise`
--
ALTER TABLE `cruise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `start_port_fk` (`startPort`),
  ADD KEY `cruise_ship_fk` (`shipId`);

--
-- Indexes for table `passage`
--
ALTER TABLE `passage`
  ADD PRIMARY KEY (`portId`,`cruiseId`),
  ADD KEY `cruise_fk` (`cruiseId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `cruise_ship_fk` FOREIGN KEY (`shipId`) REFERENCES `ship` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `start_port_fk` FOREIGN KEY (`startPort`) REFERENCES `port` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `cruise_fk` FOREIGN KEY (`cruiseId`) REFERENCES `cruise` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `port_fk` FOREIGN KEY (`portId`) REFERENCES `port` (`id`) ON DELETE CASCADE;

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
