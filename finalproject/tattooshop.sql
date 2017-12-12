-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 08:47 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tattooshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `username` varchar(18) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `employeeid` int(11) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `employeeid`) VALUES
('adrfig966', '336', 1),
('admin', 's3cr3t', 2),
('cul13n', '336', 3);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `color` tinyint(1) NOT NULL,
  `price` float NOT NULL,
  `employeeid` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `time` smallint(6) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`color`, `price`, `employeeid`, `date`, `time`, `id`, `password`) VALUES
(1, 150, 2, '2018-01-18', 1500, 4, '5695372'),
(0, 300, 2, '2018-01-18', 1600, 5, '8093406'),
(1, 100, 2, '2018-01-18', 1700, 6, '4092061'),
(0, 0, 2, '2017-12-05', 2300, 7, '9087650'),
(1, 80, 1, '2018-01-29', 900, 8, '9957631'),
(1, 500, 2, '2018-01-15', 700, 9, '9776309'),
(0, 800, 2, '2018-01-03', 1300, 10, '9216136'),
(1, 200, 2, '2018-01-15', 800, 11, '6103822'),
(1, 200, 2, '2018-01-18', 1800, 12, '4862189'),
(0, 900, 2, '2018-01-18', 1900, 13, '4478733'),
(0, 900, 2, '2018-02-08', 900, 14, '9137094'),
(1, 300, 2, '2018-03-21', 1500, 15, '7874109'),
(1, 500, 2, '2018-03-21', 1600, 16, '4461515'),
(1, 400, 2, '2018-03-21', 1700, 17, '7604401'),
(1, 900, 2, '2018-03-21', 1800, 18, '3276021'),
(1, 500, 2, '2018-03-16', 1200, 19, '6327044'),
(0, 660, 2, '2018-03-16', 1300, 20, '3989649'),
(0, 200, 2, '2018-03-16', 1400, 21, '2062815'),
(0, 300, 2, '2018-03-16', 1500, 22, '5797059'),
(1, 100, 2, '2018-03-16', 1600, 23, '9571527');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `phonenumber`, `email`) VALUES
(1, 'adrian', 'figueroa', '2391236578', 'adrfigueroa@csumb.edu'),
(2, 'jason', 'myttas', '666', 'jmts@gmail.com'),
(3, 'cullen', 'marchenko', '12128013289', 'cmarchenko @gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
