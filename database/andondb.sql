-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 01:19 PM
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
-- Table structure for table `deptemail`
--

CREATE TABLE `deptemail` (
  `deptno` int(11) NOT NULL,
  `deptname` varchar(250) NOT NULL,
  `deptemails` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deptemail`
--

INSERT INTO `deptemail` (`deptno`, `deptname`, `deptemails`) VALUES
(1, 'Supply Chain', ''),
(2, 'Maintainence', ''),
(3, 'Production', ''),
(4, 'Store', ''),
(5, 'Quality', ''),
(6, 'Methods', '');

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
(1, 'Andreas Bjorkman', 'test.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'operator', '../userimg/tyu.png'),
(2, 'jENS Bjorkman', 'jens.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'floor manager', '../userimg/asd.png'),
(3, 'Catarina Bjorkman', 'cat.test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'admin', '../userimg/tyu.png');

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
(4, 'Andreas Bjorkman', 'TL', 'T3', 'Honda', '45', '2021-03-24 17:10:24', 'Were you born in the summer?Do you believe in Santa Claus?Can you make yourself disappear?Were you on Survivor last year?Do you know the Schrödinger equation of quantum theory?', ' No, Skip, No, Skip,', 'unsolved', 'Supply Chain, Maintainence, Production, Quality, ', ' sc2 m2 p3 q2 ', '0:10'),
(8, 'Andreas Bjorkman', 'TL', 'T2', 'Honda', '56', '2021-03-30 09:32:27', 'Did you see Bigfoot?Can you see the moon?Do you know how to swim?Can you play poker?Do you have a twin?', 'Yes, No, Skip, No,', 'unsolved', 'Maintainence, Production, Quality, ', ' m2 p2 q1 ', '0:27'),
(9, 'Andreas Bjorkman', 'AL', 'A4', 'S_Class', '54', '2021-03-30 17:21:35', 'Do mice really eat cheese?Is your shoe size 14?Can you see out the back of your head?Are Martians really green?Have elves always live at the North Pole?', 'Yes, No, Skip,Yes,', 'unsolved', 'Supply Chain, Maintainence, Store, ', ' sc2 m3 s2 ', '0:25'),
(10, 'Andreas Bjorkman', 'EAL', 'E3', 'Dzire', '534', '2021-03-30 17:37:31', 'Were you born in the summer?Do you believe in Santa Claus?Can you make yourself disappear?Were you on Survivor last year?Do you know the Schrödinger equation of quantum theory?', ' No, Skip,Yes, No,', 'unsolved', 'Maintainence, Production, Methods, ', ' m2 p3 mt2 ', '0:18'),
(11, 'Andreas Bjorkman', 'TL', 'T3', 'Honda', '345', '2021-03-30 18:25:55', 'Were you born in the summer?Do you believe in Santa Claus?Can you make yourself disappear?Were you on Survivor last year?Do you know the Schrödinger equation of quantum theory?', ' No,Yes, Skip, No,', 'unsolved', 'Supply Chain, ', ' sc1 ', '0:7'),
(13, 'Andreas Bjorkman', 'TL', 'T2', 'Honda', '45', '2021-04-10 10:40:08', 'Did you see Bigfoot?Can you see the moon?Do you know how to swim?Can you play poker?Do you have a twin?Were you born in the summer?Do you believe in Santa Claus?Can you make yourself disappear?Were you on Survivor last year?Do you know the Schrödinger equation of quantum theory?', ',,,,', 'unsolved', 'Supply Chain, Maintainence, Production, Quality, ', ' sc2 m2 p3 q2 ', '0:10'),
(14, 'Andreas Bjorkman', 'TL', 'T2', 'Honda', '32', '2021-04-10 10:41:12', 'Did you see Bigfoot?Can you see the moon?Do you know how to swim?Can you play poker?Do you have a twin?', ',,,,', 'unsolved', 'Supply Chain, Maintainence, Production, Methods, ', ' sc2 m3 p3 mt3 ', '0:24'),
(37, 'Andreas Bjorkman', 'EAL', '2', 'Dzire', 'as2', '2021-05-10 14:51:29', 'Have you ever seen a UFO?Were you on Survivor last year?Did you see Bigfoot?Can you see out the back of your head?Do you have a twin?', 'No;Yes;Yes;No;Yes;', 'unsolved', NULL, NULL, '0:30'),
(39, 'Andreas Bjorkman', 'EAL', '2', 'Dzire', 'as2', '2021-05-10 15:02:25', 'Have you ever seen a UFO?Were you on Survivor last year?Did you see Bigfoot?Can you see out the back of your head?Do you have a twin?', 'Yes;Yes;Yes;Yes;Yes;', 'solved', 'Supply Chain, ', ' sc1 ', '0:15'),
(42, 'Andreas Bjorkman', 'EAL', '1', 'Dzire', 'hj5', '2021-05-15 13:05:37', 'Do you believe in ghosts?Can you make yourself disappear?Were you in the swamp yesterday?Is your shoe size 14?Can you play poker? SdsakdlfWaddup asdf1', 'Yes;Yes;No;Yes;No;Yes;Yes;Yes;', 'unsolved', 'Supply Chain, ', ' sc1 ', '1:37'),
(43, 'Andreas Bjorkman', 'EAL', '1', 'Dzire', 'hj5', '2021-05-15 13:07:22', 'Do you believe in ghosts?Can you make yourself disappear?Were you in the swamp yesterday?Is your shoe size 14?Can you play poker? SdsakdlfWaddup asdf1', 'Yes;Yes;No;Yes;No;Yes;Yes;Yes;', 'unsolved', 'Supply Chain, ', ' sc1 ', '1:37');

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
  `answer` varchar(250) NOT NULL DEFAULT 'Yes; No',
  `stationno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionno`, `questionname`, `answer`, `stationno`) VALUES
(1, 'Do you believe in ghosts?', 'Yes; No', 1),
(2, 'Have you ever seen a UFO?', 'Yes; No', 2),
(3, 'Can cats jump six times their length?', 'Yes; No', 3),
(4, 'Do you like chocolate milkshakes?', 'Yes; No', 4),
(5, 'Were you in the swamp yesterday?', 'Yes; No', 5),
(6, 'Did you see Bigfoot?', 'Yes; No', 6),
(7, 'Can you see the moon?', 'Yes; No', 7),
(8, 'Do you know how to swim?', 'Yes; No', 8),
(9, 'Can you play poker?', 'Yes; No', 9),
(10, 'Do you have a twin?', 'Yes; No', 10),
(11, 'Were you born in the summer?', 'Yes; No', 11),
(12, 'Do you believe in Santa Claus?', 'Yes; No', 12),
(13, 'Can you make yourself disappear?', 'Yes; No', 1),
(14, 'Were you on Survivor last year?', 'Yes; No', 2),
(15, 'Do you know the Schrödinger equation of quantum theory?', 'Yes; No', 3),
(16, 'Do mice really eat cheese?', 'Yes; No', 4),
(17, 'Is your shoe size 14?', 'Yes; No', 5),
(18, 'Can you see out the back of your head?', 'Yes; No', 6),
(19, 'Are Martians really green?', 'Yes; No', 7),
(20, 'Have elves always live at the North Pole?', 'Yes; No', 8),
(21, 'Do you believe in ghosts?', 'Yes; No', 9),
(22, 'Have you ever seen a UFO?', 'Yes; No', 10),
(23, 'Can cats jump six times their length?', 'Yes; No', 11),
(24, 'Do you like chocolate milkshakes?', 'Yes; No', 12),
(25, 'Were you in the swamp yesterday?', 'Yes; No', 1),
(26, 'Did you see Bigfoot?', 'Yes; No', 2),
(27, 'Can you see the moon?', 'Yes; No', 3),
(28, 'Do you know how to swim?', 'Yes; No', 4),
(29, 'Can you play poker?', 'Yes; No', 5),
(30, 'Do you have a twin?', 'Yes; No', 6),
(31, 'Were you born in the summer?', 'Yes; No', 7),
(32, 'Do you believe in Santa Claus?', 'Yes; No', 8),
(33, 'Can you make yourself disappear?', 'Yes; No', 9),
(34, 'Were you on Survivor last year?', 'Yes; No', 10),
(35, 'Do you know the Schrödinger equation of quantum theory?', 'Yes; No', 11),
(36, 'Do mice really eat cheese?', 'Yes; No', 12),
(37, 'Is your shoe size 14?', 'Yes; No', 1),
(38, 'Can you see out the back of your head?', 'Yes; No', 2),
(39, 'Are Martians really green?', 'Yes; No', 3),
(40, 'Have elves always live at the North Pole?', 'Yes; No', 4),
(41, 'Do you believe in ghosts?', 'Yes; No', 5),
(42, 'Have you ever seen a UFO?', 'Yes; No', 6),
(43, 'Can cats jump six times their length?', 'Yes; No', 7),
(44, 'Do you like chocolate milkshakes?', 'Yes; No', 8),
(45, 'Were you in the swamp yesterday?', 'Yes; No', 9),
(46, 'Did you see Bigfoot?', 'Yes; No', 10),
(47, 'Can you see the moon?', 'Yes; No', 11),
(48, 'Do you know how to swim?', 'Yes; No', 12),
(49, 'Can you play poker?', 'Yes; No', 1),
(50, 'Do you have a twin?', 'Yes; No', 2),
(51, 'Were you born in the summer?', 'Yes; No', 3),
(52, 'Do you believe in Santa Claus?', 'Yes; No', 4),
(53, 'Can you make yourself disappear?', 'Yes; No', 5),
(54, 'Were you on Survivor last year?', 'Yes; No', 6),
(55, 'Do you know the Schrödinger equation of quantum theory?', 'Yes; No', 7),
(56, 'Do mice really eat cheese?', 'Yes; No', 8),
(57, 'Is your shoe size 14?', 'Yes; No', 9),
(58, 'Can you see out the back of your head?', 'Yes; No', 10),
(59, 'Are Martians really green?', 'Yes; No', 11),
(60, 'Have elves always live at the North Pole?', 'Yes; No', 12);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationno` int(11) NOT NULL,
  `stationname` varchar(250) NOT NULL,
  `variant` int(11) DEFAULT NULL,
  `line` int(11) NOT NULL,
  `pdfPath` varchar(500) NOT NULL,
  `issuePresent` int(11) NOT NULL DEFAULT 0,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationno`, `stationname`, `variant`, `line`, `pdfPath`, `issuePresent`, `department`) VALUES
(1, 'E1', 58, 1, '..%pdfs%EALE1S_Class.pdf', 3, 'Supply Chain, '),
(2, 'E2', 60, 1, '..%pdfs%nmp.pdf', 0, ''),
(3, 'E3', 3, 1, '..%pdfs%EALE1S_Class.pdf', 1, 'Maintainence, Production, Methods, '),
(4, 'E4', 4, 1, '..%pdfs%E4.pdf', 0, ''),
(5, 'T1', 5, 2, '..%pdfs%T1yoyo.pdf', 0, ''),
(6, 'T2', 6, 2, '..%pdfs%TLT2Honda.pdf', 5, 'Supply Chain, Maintainence, Production, Methods, '),
(7, 'T3', 7, 2, '..%pdfs%EALE1S_Class.pdf', 2, 'Maintainence, Production, Quality, '),
(8, 'T4', 8, 2, '..%pdfs%EALE1S_Class.pdf', 0, ''),
(9, 'A1', 9, 3, '..%pdfs%ALA1Honda.pdf', 0, ''),
(10, 'A2', 10, 3, '..%pdfs%ALA2saf32.pdf', 1, 'Maintainence, Production, Quality, '),
(11, 'A3', 11, 3, '..%pdfs%EALE1S_Class.pdf', 0, ''),
(12, 'A4', 12, 3, '..%pdfs%ALA4S_Class.pdf', 2, 'Supply Chain, Maintainence, Store, ');

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variantno` int(11) NOT NULL,
  `variantname` varchar(250) NOT NULL,
  `serial` varchar(250) NOT NULL,
  `lineno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`variantno`, `variantname`, `serial`, `lineno`) VALUES
(1, 'Dzire', 'as23', 1),
(2, 'Dzire', '12', 2),
(3, 'Dzire', '45', 3),
(4, 'Dzire', 'hj5', 1),
(5, 'Honda', '346', 2),
(6, 'Honda', '32', 3),
(7, 'Honda', 'x4', 1),
(8, 'Honda', 'H1', 2),
(9, 'S_Class', 'ALA1', 3),
(10, 'S_Class', 'c5', 1),
(11, 'S_Class', '45', 2),
(12, 'S_Class', '54', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deptemail`
--
ALTER TABLE `deptemail`
  ADD PRIMARY KEY (`deptno`);

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
  ADD PRIMARY KEY (`questionno`);

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
  ADD KEY `line1` (`lineno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deptemail`
--
ALTER TABLE `deptemail`
  MODIFY `deptno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `floormanager`
--
ALTER TABLE `floormanager`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `lineno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variantno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  ADD CONSTRAINT `line1` FOREIGN KEY (`lineno`) REFERENCES `line` (`lineno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
