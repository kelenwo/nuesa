-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 05:56 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(256) NOT NULL,
  `access` varchar(256) NOT NULL,
  `rights` int(11) NOT NULL,
  `dateadded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `executives`
--

CREATE TABLE `executives` (
  `id` varchar(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `position` varchar(100) NOT NULL,
  `passport` varchar(256) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executives`
--

INSERT INTO `executives` (`id`, `name`, `position`, `passport`, `type`) VALUES
('001', 'Ena John', 'president', '001.jpg', 'reg'),
('002', 'kelvin elenwo', 'vice president', '002.jpg', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payerName` varchar(256) NOT NULL,
  `payerFullname` varchar(256) NOT NULL,
  `payerPhone` varchar(20) NOT NULL,
  `payerEmail` varchar(256) NOT NULL,
  `payerLevel` int(11) NOT NULL,
  `payerDepartment` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `transdate` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL,
  `paymentstatus` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payerName`, `payerFullname`, `payerPhone`, `payerEmail`, `payerLevel`, `payerDepartment`, `amount`, `reference`, `transdate`, `session`, `paymentstatus`) VALUES
(0, '16/eg/co/902', 'kelvin elenwo', '0', 'kelenwo68@gmail.com', 400, 'Computer Engineering', 1000, 'L-3437942370', '0000-00-00 00:00:00', '2018/2019', 'unpaid'),
(0, '16/eg/co/999', 'kelvin elenwo', '', 'kelenwo68@gmail.com', 100, 'Computer Engineering', 2000, 'Z-1253231254', '24-Jan-2020', '2018/2019', 'unpaid'),
(0, '16/eg/ce/758', 'kalu miracle ebube', '', 'miraclekalu22@yahoo.com', 400, 'Chemical Engineering', 1000, 'C-1440649590', '28-Jan-2020', '2018/2019', 'unpaid'),
(0, '16/eg/co/903', 'kelvin elenwo', '', 'kelenwo68@gmail.com', 200, 'Computer Engineering', 1000, 'E-2046732024', '28-Jan-2020', '2018/2019', 'unpaid'),
(0, '16/eg/ce/758', 'kalu miracle ebube', '', 'miraclekalu22@yahoo.com', 400, 'Chemical Engineering', 1000, 'C-2170347421', '29-Jan-2020', '2016/2017', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`) VALUES
(0, 'president'),
(0, 'vice president'),
(0, 'secretary'),
(0, 'treasurer'),
(0, 'director of sports'),
(0, 'director of information'),
(0, 'director of academics');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_name` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_name`) VALUES
('2012/2013'),
('2011/2012'),
('2013/2014'),
('2016/2017'),
('2018/2019'),
('2014/2015'),
('2015/2016'),
('2017/2018');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `freshers` varchar(20) NOT NULL,
  `returning` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`freshers`, `returning`) VALUES
('2000', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `name` varchar(256) NOT NULL,
  `content` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`, `content`, `id`, `date`) VALUES
('Kelvin elenwo', 'yutiytiuuwpip', 1, 0),
('Kelvin elenwo', '869508khljhhj', 1, 0),
('Kelvin elenwo', 'hjlklgkopr', 1, 0),
('Kelvin elenwo', 'djghjdkshk', 1, 0),
('Kelvin elenwo', '', 1, 0),
('Kelvin elenwo', 'kelvinm elenwo', 1, 0),
('Kelvin elenwo', 'computer engineering', 1, 0),
('Kelvin elenwo', 'keljgkeje', 1, 0),
('Kelvin elenwo', 'cpe 321', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trial`
--

CREATE TABLE `trial` (
  `name` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type`) VALUES
('faculty'),
('admin'),
('senator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
