-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 02:18 PM
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
-- Database: `nettside`
--
CREATE DATABASE IF NOT EXISTS `nettside` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nettside`;

-- --------------------------------------------------------

--
-- Table structure for table `evenquiz`
--

CREATE TABLE `evenquiz` (
  `questionId` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `questionAnswer` varchar(255) DEFAULT NULL,
  `questionOption1` varchar(255) DEFAULT NULL,
  `questionOption2` varchar(255) DEFAULT NULL,
  `questionOption3` varchar(255) DEFAULT NULL,
  `questionImg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evenquiz`
--

INSERT INTO `evenquiz` (`questionId`, `question`, `questionAnswer`, `questionOption1`, `questionOption2`, `questionOption3`, `questionImg`) VALUES
(1, 'Hva heter Even?', 'Ev1', 'Even', 'even', 'Even Myrvoll', './assets/ev1.jpg'),
(2, 'Hvor gammel er Ev1?', '21', '17', '17 år', '17,7492', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `evenQuestionsAnswered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `evenQuestionsAnswered`) VALUES
('admin', '$2y$10$FfOFlMoHXNh9JfsDS1CuReq8ARnLFTbb9HQg2EvM3GuXRm5W4lLhe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evenquiz`
--
ALTER TABLE `evenquiz`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evenquiz`
--
ALTER TABLE `evenquiz`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
