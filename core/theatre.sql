-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2019 at 02:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `lugarbalcao`
--

DROP TABLE IF EXISTS `lugarbalcao`;
CREATE TABLE IF NOT EXISTS `lugarbalcao` (
  `numFila` int(11) NOT NULL,
  `numLugar` int(11) NOT NULL,
  `numBalcao` varchar(10) NOT NULL,
  `vendido` int(11) NOT NULL DEFAULT '1',
  `fumador` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`numFila`,`numLugar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lugarbalcao`
--

INSERT INTO `lugarbalcao` (`numFila`, `numLugar`, `numBalcao`, `vendido`, `fumador`) VALUES
(1, 1, '1AA1', 1, 0),
(2, 1, '2AB1', 1, 1),
(3, 1, '3AC1', 1, 0),
(4, 1, '4AD1', 1, 0),
(5, 1, '5BA1', 1, 1),
(6, 10, '6AD10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lugarplateia`
--

DROP TABLE IF EXISTS `lugarplateia`;
CREATE TABLE IF NOT EXISTS `lugarplateia` (
  `numFila` int(11) NOT NULL,
  `numLugar` int(11) NOT NULL,
  `seccao` varchar(10) NOT NULL,
  `vendido` int(11) NOT NULL DEFAULT '1',
  `protocolar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`numFila`,`numLugar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lugarplateia`
--

INSERT INTO `lugarplateia` (`numFila`, `numLugar`, `seccao`, `vendido`, `protocolar`) VALUES
(1, 1, '1AA1', 1, 1),
(2, 1, '2AB1', 1, 0),
(3, 1, '3AC1', 1, 0),
(4, 1, '4AD1', 1, 0),
(5, 1, '5AB1', 1, 0),
(1, 11, '1AA11', 1, 1),
(10, 10, '10AA10', 0, 0),
(1, 19, '1AA19', 0, 0),
(2, 18, '2AA18', 0, 0),
(11, 5, '11AA5', 0, 0),
(3, 5, '3AA5', 0, 0),
(9, 8, '9AN8', 1, 1),
(9, 13, '9AA13', 1, 1),
(6, 12, '6AA12', 1, 0),
(7, 14, '7AZ14', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
