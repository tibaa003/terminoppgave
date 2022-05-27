-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 11:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evenquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenquizquestions`
--

DROP TABLE IF EXISTS `evenquizquestions`;
CREATE TABLE `evenquizquestions` (
  `ID` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `imgName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evenquizstats`
--

DROP TABLE IF EXISTS `evenquizstats`;
CREATE TABLE `evenquizstats` (
  `userID` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `correctAnswers` int(11) NOT NULL,
  `answeredQuestions` int(11) NOT NULL DEFAULT 0,
  `finished` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `ID` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `polishcowmilkerstats`
--

DROP TABLE IF EXISTS `polishcowmilkerstats`;
CREATE TABLE `polishcowmilkerstats` (
  `userID` int(11) NOT NULL,
  `milk` int(11) NOT NULL,
  `milkers` int(11) NOT NULL,
  `slaves` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(97) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evenquizquestions`
--
ALTER TABLE `evenquizquestions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `evenquizstats`
--
ALTER TABLE `evenquizstats`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `question` (`question`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `polishcowmilkerstats`
--
ALTER TABLE `polishcowmilkerstats`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evenquizquestions`
--
ALTER TABLE `evenquizquestions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenquizstats`
--
ALTER TABLE `evenquizstats`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polishcowmilkerstats`
--
ALTER TABLE `polishcowmilkerstats`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evenquizstats`
--
ALTER TABLE `evenquizstats`
  ADD CONSTRAINT `evenquizstats_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evenquizstats_ibfk_2` FOREIGN KEY (`question`) REFERENCES `evenquizquestions` (`ID`);

--
-- Constraints for table `polishcowmilkerstats`
--
ALTER TABLE `polishcowmilkerstats`
  ADD CONSTRAINT `polishcowmilkerstats_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
