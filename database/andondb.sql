-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2021 at 06:49 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `usergroup` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `line`;
CREATE TABLE IF NOT EXISTS `line` (
  `lineno` int(11) NOT NULL AUTO_INCREMENT,
  `linename` varchar(250) NOT NULL,
  PRIMARY KEY (`lineno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `questionno` int(11) NOT NULL AUTO_INCREMENT,
  `questionname` text NOT NULL,
  `answer` varchar(250) NOT NULL DEFAULT 'Yes; No; Skip',
  `variantno` int(11) NOT NULL,
  PRIMARY KEY (`questionno`),
  KEY `variantno` (`variantno`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

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
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` varchar(500) NOT NULL,
  `answers` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `stationno` int(11) NOT NULL AUTO_INCREMENT,
  `stationname` varchar(250) NOT NULL,
  `variant` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  PRIMARY KEY (`stationno`),
  KEY `line` (`line`),
  KEY `variant` (`variant`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

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
(12, 'A4', 12, 3),
(16, 'A6', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

DROP TABLE IF EXISTS `variant`;
CREATE TABLE IF NOT EXISTS `variant` (
  `variantno` int(11) NOT NULL AUTO_INCREMENT,
  `variantname` varchar(250) NOT NULL,
  `serial` varchar(250) NOT NULL,
  `pdfpath` varchar(250) NOT NULL,
  PRIMARY KEY (`variantno`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variant`
--

INSERT INTO `variant` (`variantno`, `variantname`, `serial`, `pdfpath`) VALUES
(1, 'Dzire', 'EALE1', 'pdfs/EALE1Dzire.pdf'),
(2, 'Dzire', 'EALE2', 'pdfs/EALE2Dzire.pdf'),
(3, 'Dzire', 'EALE3', 'pdfs/EALE3Dzire.pdf'),
(4, 'Dzire', 'EALE4', 'pdfs/EALE4Dzire.pdf'),
(5, 'Honda', 'TLT1', 'pdfs/TLT1Honda.pdf'),
(6, 'Honda', 'TLT2', 'pdfs/TLT2Honda.pdf'),
(7, 'Honda', 'TLT3', 'pdfs/TLT3Honda.pdf'),
(8, 'Honda', 'TLT4', 'pdfs/TLT4Honda.pdf'),
(9, 'S_Class', 'ALA1', 'pdfs/ALA1S_Class.pdf'),
(10, 'S_Class', 'ALA2', 'pdfs/ALA2S_Class.pdf'),
(11, 'S_Class', 'ALA3', 'pdfs/ALA3S_Class.pdf'),
(12, 'S_Class', 'ALA4', 'pdfs/ALA4S_Class.pdf');

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
