-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 05:18 PM
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
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `usergroup` varchar(250) NOT NULL,
  `photoPath` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `usergroup`, `photoPath`) VALUES
(1, 'Andreas Bjorkman', 'test.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'operator', '../images/tyu.png'),
(2, 'jENS Bjorkman', 'jens.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'floor manager', '../images/asd.png'),
(3, 'Catarina Bjorkman', 'cat.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'admin', '../images/tyu.png'),
(13, 'shreyaswaitforitdorle@gmail.com', 'shreyaswaitforitdorle@gmail.com', '6d0007e52f7afb7d5a0650b0ffb8a4d1', 'operator', '../images/asd.png');

-- --------------------------------------------------------

--
-- Table structure for table `floormanager`
--

CREATE TABLE `floormanager` (
  `srNo` int(11) NOT NULL,
  `user` varchar(250) DEFAULT NULL,
  `line` varchar(250) DEFAULT NULL,
  `station` varchar(250) DEFAULT NULL,
  `variant` varchar(250) DEFAULT NULL,
  `serial` varchar(250) DEFAULT NULL,
  `timeStamp` datetime DEFAULT NULL,
  `questions` varchar(500) DEFAULT NULL,
  `answers` varchar(250) DEFAULT NULL,
  `actionTaken` varchar(250) DEFAULT NULL,
  `department` varchar(250) DEFAULT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `totalTime` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floormanager`
--

INSERT INTO `floormanager` (`srNo`, `user`, `line`, `station`, `variant`, `serial`, `timeStamp`, `questions`, `answers`, `actionTaken`, `department`, `reason`, `totalTime`) VALUES
(2, 'Andreas Bjorkman', 'TL', 'T2', 'Honda', 't5', '2021-03-24 16:42:57', 'Did you see Bigfoot?Can you see the moon?Do you know how to swim?Can you play poker?Do you have a twin?', 'Yes, No, Skip,Yes,', 'unsolved', 'Supply Chain Maintainence Quality ', ' sc2 m1 q1 ', '0:23'),
(3, 'Andreas Bjorkman', 'TL', 'T3', 'Honda', 'gh', '2021-03-24 17:05:38', 'Were you born in the summer?Do you believe in Santa Claus?Can you make yourself disappear?Were you on Survivor last year?Do you know the Schrödinger equation of quantum theory?', ' No, Skip, No, Skip,', 'unsolved', 'Supply Chain Store Methods ', ' sc1 s1 mt2 ', '0:15'),
(4, 'Andreas Bjorkman', 'TL', 'T3', 'Honda', '45', '2021-03-24 17:10:24', 'Were you born in the summer?Do you believe in Santa Claus?Can you make yourself disappear?Were you on Survivor last year?Do you know the Schrödinger equation of quantum theory?', ' No, Skip, No, Skip,', 'unsolved', 'Supply Chain Maintainence Quality ', ' sc1 m3 q1 ', '0:37');

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
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionno` int(11) NOT NULL,
  `questionname` text NOT NULL,
  `answer` varchar(250) NOT NULL DEFAULT 'Yes; No; Skip',
  `variantno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionno`, `questionname`, `answer`, `variantno`) VALUES
(1, 'Do you believe in ghosts?', 'Yes ;No ;Skip', 1),
(2, 'Have you ever seen a UFO?', 'Yes ;No ;Skip ', 1),
(3, 'Can cats jump six times their length?', 'Yes ;No ;Skip ', 1),
(4, 'Do you like chocolate milkshakes?', 'Yes ;No ;Skip ', 1),
(5, 'Were you in the swamp yesterday?', 'Yes ;No ;Skip ', 1),
(6, 'Did you see Bigfoot?', 'Yes; No; Skip', 2),
(7, 'Can you see the moon?', 'Yes; No; Skip', 2),
(8, 'Do you know how to swim?', 'Yes; No; Skip', 2),
(9, 'Can you play poker?', 'Yes; No; Skip', 2),
(10, 'Do you have a twin?', 'Yes; No; Skip', 2),
(11, 'Were you born in the summer?', 'Yes; No; Skip', 3),
(12, 'Do you believe in Santa Claus?', 'Yes; No; Skip', 3),
(13, 'Can you make yourself disappear?', 'Yes; No; Skip', 3),
(14, 'Were you on Survivor last year?', 'Yes; No; Skip', 3),
(15, 'Do you know the Schrödinger equation of quantum theory?', 'Yes; No; Skip', 3),
(16, 'Do mice really eat cheese?', 'Yes; No; Skip', 4),
(17, 'Is your shoe size 14?', 'Yes; No; Skip', 4),
(18, 'Can you see out the back of your head?', 'Yes; No; Skip', 4),
(19, 'Are Martians really green?', 'Yes; No; Skip', 4),
(20, 'Have elves always live at the North Pole?', 'Yes; No; Skip', 4),
(21, 'Do you believe in ghosts?', 'Yes ;No ;Skip', 5),
(22, 'Have you ever seen a UFO?', 'Yes ;No ;Skip ', 5),
(23, 'Can cats jump six times their length?', 'Yes ;No ;Skip ', 5),
(24, 'Do you like chocolate milkshakes?', 'Yes ;No ;Skip ', 5),
(25, 'Were you in the swamp yesterday?', 'Yes ;No ;Skip ', 5),
(26, 'Did you see Bigfoot?', 'Yes; No; Skip', 6),
(27, 'Can you see the moon?', 'Yes; No; Skip', 6),
(28, 'Do you know how to swim?', 'Yes; No; Skip', 6),
(29, 'Can you play poker?', 'Yes; No; Skip', 6),
(30, 'Do you have a twin?', 'Yes; No; Skip', 6),
(31, 'Were you born in the summer?', 'Yes; No; Skip', 7),
(32, 'Do you believe in Santa Claus?', 'Yes; No; Skip', 7),
(33, 'Can you make yourself disappear?', 'Yes; No; Skip', 7),
(34, 'Were you on Survivor last year?', 'Yes; No; Skip', 7),
(35, 'Do you know the Schrödinger equation of quantum theory?', 'Yes; No; Skip', 7),
(36, 'Do mice really eat cheese?', 'Yes; No; Skip', 8),
(37, 'Is your shoe size 14?', 'Yes; No; Skip', 8),
(38, 'Can you see out the back of your head?', 'Yes; No; Skip', 8),
(39, 'Are Martians really green?', 'Yes; No; Skip', 8),
(40, 'Have elves always live at the North Pole?', 'Yes; No; Skip', 8),
(41, 'Do you believe in ghosts?', 'Yes ;No ;Skip', 9),
(42, 'Have you ever seen a UFO?', 'Yes ;No ;Skip ', 9),
(43, 'Can cats jump six times their length?', 'Yes ;No ;Skip ', 9),
(44, 'Do you like chocolate milkshakes?', 'Yes ;No ;Skip ', 9),
(45, 'Were you in the swamp yesterday?', 'Yes ;No ;Skip ', 9),
(46, 'Did you see Bigfoot?', 'Yes; No; Skip', 9),
(47, 'Can you see the moon?', 'Yes; No; Skip', 10),
(48, 'Do you know how to swim?', 'Yes; No; Skip', 10),
(49, 'Can you play poker?', 'Yes; No; Skip', 10),
(50, 'Do you have a twin?', 'Yes; No; Skip', 10),
(51, 'Were you born in the summer?', 'Yes; No; Skip', 11),
(52, 'Do you believe in Santa Claus?', 'Yes; No; Skip', 11),
(53, 'Can you make yourself disappear?', 'Yes; No; Skip', 11),
(54, 'Were you on Survivor last year?', 'Yes; No; Skip', 11),
(55, 'Do you know the Schrödinger equation of quantum theory?', 'Yes; No; Skip', 11),
(56, 'Do mice really eat cheese?', 'Yes; No; Skip', 12),
(57, 'Is your shoe size 14?', 'Yes; No; Skip', 12),
(58, 'Can you see out the back of your head?', 'Yes; No; Skip', 12),
(59, 'Are Martians really green?', 'Yes; No; Skip', 12),
(60, 'Have elves always live at the North Pole?', 'Yes; No; Skip', 12);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationno` int(11) NOT NULL,
  `stationname` varchar(250) NOT NULL,
  `variant` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `issuePresent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationno`, `stationname`, `variant`, `line`, `issuePresent`) VALUES
(1, 'E1', 1, 1, 1),
(2, 'E2', 2, 1, 1),
(3, 'E3', 3, 1, 0),
(4, 'E4', 4, 1, 0),
(5, 'T1', 5, 2, 0),
(6, 'T2', 6, 2, 0),
(7, 'T3', 7, 2, 0),
(8, 'T4', 8, 2, 0),
(9, 'A1', 9, 3, 0),
(10, 'A2', 10, 3, 1),
(11, 'A3', 11, 3, 0),
(12, 'A4', 12, 3, 0),
(19, 'rty', 9, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variantno` int(11) NOT NULL,
  `variantname` varchar(250) NOT NULL,
  `serial` varchar(250) NOT NULL,
  `pdfpath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`variantno`, `variantname`, `serial`, `pdfpath`) VALUES
(1, 'Dzire', '34', '../pdfs/EALE1Dzire.pdf'),
(2, 'Dzire', 'EALE2', '../pdfs/EALE2Dzire.pdf'),
(3, 'Dzire', 'EALE3', '../pdfs/EALE3Dzire.pdf'),
(4, 'Dzire', 'EALE4', '../pdfs/EALE4Dzire.pdf'),
(5, 'Honda', 'H1', '../pdfs/TLT1Honda.pdf'),
(6, 'Honda', 't5', '../pdfs/TLT2Honda.pdf'),
(7, 'Honda', '45', '../pdfs/TLT3Honda.pdf'),
(8, 'Honda', 'H1', '../pdfs/TLT4Honda.pdf'),
(9, 'S_Class', 'ALA1', '../pdfs/ALA1S_Class.pdf'),
(10, 'S_Class', '34', '../pdfs/ALA2S_Class.pdf'),
(11, 'S_Class', '56', '../pdfs/ALA3S_Class.pdf'),
(12, 'S_Class', 'ALA4', '../pdfs/ALA4S_Class.pdf'),
(36, 't5', ' ', '..%pdfs%t5.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floormanager`
--
ALTER TABLE `floormanager`
  ADD PRIMARY KEY (`srNo`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`lineno`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionno`),
  ADD KEY `variantno` (`variantno`);

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
  ADD PRIMARY KEY (`variantno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `floormanager`
--
ALTER TABLE `floormanager`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `lineno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variantno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `line` FOREIGN KEY (`line`) REFERENCES `line` (`lineno`),
  ADD CONSTRAINT `variant` FOREIGN KEY (`variant`) REFERENCES `variant` (`variantno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
