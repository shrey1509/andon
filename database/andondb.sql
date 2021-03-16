-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 09:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `usergroup` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `designation`, `email`, `password`, `usergroup`) VALUES
(1, 'Andreas Bjorkman', 'Developer', 'test.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'operator'),
(2, 'jENS Bjorkman', 'Developer', 'jens.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'floor manager'),
(3, 'Catarina Bjorkman', 'Developer', 'cat.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `lineno` int(11) NOT NULL,
  `linename` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`lineno`, `linename`) VALUES
(1, 'EAL'),
(2, 'TL'),
(3, 'AL');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `answers` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questions`, `answers`) VALUES
(1, 'Do you believe in ghosts?; Have you ever seen a UFO?; Can cats jump six times their length?; Do you like chocolate milkshakes?; Were you in the swamp yesterday?', 'Yes ;No ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip .'),
(2, 'Did you see Bigfoot?; Can you see the moon?; Do you know how to swim?; Can you play poker?; Do you have a twin?', 'Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . '),
(3, 'Were you born in the summer?; Do you believe in Santa Claus?; Can you make yourself disappear?; Were you on Survivor last year?; Do you know the Schrödinger equation of quantum theory?', 'Yes ;No ;Skip . Yes ;No ;Skip .  Yes ;No ;Skip .  Yes ;No ;Skip .  Yes ;No ;Skip .    '),
(4, 'Do mice really eat cheese?; Is your shoe size 14?; Can you see out the back of your head?; Are Martians really green?; Have elves always live at the North Pole?; Do you have a scar from playing sports?', 'Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . '),
(5, 'Do you believe in ghosts?; Have you ever seen a UFO?; Can cats jump six times their length?; Do you like chocolate milkshakes?; Were you in the swamp yesterday?', 'Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip .'),
(6, 'Did you see Bigfoot?; Can you see the moon?; Do you know how to swim?; Can you play poker?; Do you have a twin?', 'Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . '),
(7, 'Were you born in the summer?; Do you believe in Santa Claus?; Can you make yourself disappear?; Were you on Survivor last year?; Do you know the Schrödinger equation of quantum theory?', 'Yes ;No ;Skip . Yes ;No ;Skip .  Yes ;No ;Skip .  Yes ;No ;Skip .  Yes ;No ;Skip .    '),
(8, 'Do mice really eat cheese?; Is your shoe size 14?; Can you see out the back of your head?; Are Martians really green?; Have elves always live at the North Pole?; Do you have a scar from playing sports?', 'Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . '),
(9, 'Do you believe in ghosts?; Have you ever seen a UFO?; Can cats jump six times their length?; Do you like chocolate milkshakes?; Were you in the swamp yesterday?', 'Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip . Yes ;No  ;Skip .'),
(10, 'Did you see Bigfoot?; Can you see the moon?; Do you know how to swim?; Can you play poker?; Do you have a twin?', 'Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . Yes ;No ;Skip . '),
(11, 'Were you born in the summer?; Do you believe in Santa Claus?; Can you make yourself disappear?; Were you on Survivor last year?; Do you know the Schrödinger equation of quantum theory?', 'Yes ;No ;Skip . Yes ;No ;Skip .  Yes ;No ;Skip .  Yes ;No ;Skip .  Yes ;No ;Skip .    '),
(12, 'Do mice really eat cheese?; Is your shoe size 14?; Can you see out the back of your head?; Are Martians really green?; Have elves always live at the North Pole?; Do you have a scar from playing sports?', 'Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . Yes; No ;Skip . ');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationno` int(11) NOT NULL,
  `stationname` varchar(250) NOT NULL,
  `variant` int(11) NOT NULL,
  `line` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationno`, `stationname`, `variant`, `line`) VALUES
(1, 'E1', 1, 1),
(2, 'E2', 2, 1),
(3, 'E3', 3, 1),
(4, 'E4', 4, 1),
(5, 'T1', 5, 2),
(6, 'T2', 6, 2),
(7, 'T3', 7, 2),
(8, 'T4', 8, 2),
(9, 'A1', 9, 3),
(10, 'A2', 10, 3),
(11, 'A3', 11, 3),
(12, 'A4', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variantno` int(11) NOT NULL,
  `variantname` varchar(250) NOT NULL,
  `serial` varchar(250) NOT NULL,
  `pdfpath` varchar(250) NOT NULL,
  `questid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`variantno`, `variantname`, `serial`, `pdfpath`, `questid`) VALUES
(1, 'Dzire', 'EALE1', 'pdfs/EALE1Dzire.pdf', 1),
(2, 'Dzire', 'EALE2', 'pdfs/EALE2Dzire.pdf', 2),
(3, 'Dzire', 'EALE3', 'pdfs/EALE3Dzire.pdf', 3),
(4, 'Dzire', 'EALE4', 'pdfs/EALE4Dzire.pdf', 4),
(5, 'Honda', 'TLT1', 'pdfs/TLT1Honda.pdf', 5),
(6, 'Honda', 'TLT2', 'pdfs/TLT2Honda.pdf', 6),
(7, 'Honda', 'TLT3', 'pdfs/TLT3Honda.pdf', 7),
(8, 'Honda', 'TLT4', 'pdfs/TLT4Honda.pdf', 8),
(9, 'S_Class', 'ALA1', 'pdfs/ALA1S_Class.pdf', 9),
(10, 'S_Class', 'ALA2', 'pdfs/ALA2S_Class.pdf', 10),
(11, 'S_Class', 'ALA3', 'pdfs/ALA3S_Class.pdf', 11),
(12, 'S_Class', 'ALA4', 'pdfs/ALA4S_Class.pdf', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`lineno`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationno`),
  ADD KEY `line` (`line`),
  ADD KEY `variant` (`variant`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variantno`),
  ADD KEY `forkey` (`questid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `lineno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variantno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `line` FOREIGN KEY (`line`) REFERENCES `line` (`lineno`),
  ADD CONSTRAINT `variant` FOREIGN KEY (`variant`) REFERENCES `variant` (`variantno`);

--
-- Constraints for table `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `forkey` FOREIGN KEY (`questid`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
