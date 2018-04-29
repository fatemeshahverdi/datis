-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2015 at 04:22 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `abstract` text NOT NULL,
  `keys` tinytext NOT NULL,
  `time` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idCustomer` varchar(50) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `msg` text NOT NULL,
  `time` int(11) NOT NULL,
  `writer` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chempdt`
--

CREATE TABLE `chempdt` (
  `cpID` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(25) NOT NULL,
  `BPNo` varchar(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `CasNo` varchar(30) DEFAULT NULL,
  `Formula` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cpID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `family` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `matn` text NOT NULL,
  `time` int(11) NOT NULL,
  `read` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `cpID` int(11) NOT NULL,
  `GPI` text,
  `CPD` text,
  `Specification` text,
  `Package` text,
  `Toxicology` text,
  PRIMARY KEY (`cpID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `glass`
--

CREATE TABLE `glass` (
  `gID` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(30) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `eName` varchar(255) DEFAULT NULL,
  `size` text,
  `comment` text,
  `pic` text,
  PRIMARY KEY (`gID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `text` varchar(30) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `time` int(11) NOT NULL,
  `keys` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(30) NOT NULL,
  `lName` varchar(30) DEFAULT NULL,
  `birthDate` int(10) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `marriage` tinyint(1) DEFAULT NULL,
  `military` tinyint(4) NOT NULL,
  `degree` tinyint(4) DEFAULT NULL,
  `universityPl` varchar(30) NOT NULL,
  `major` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `cel` int(11) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `resume` varchar(255) NOT NULL,
  `regTime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` int(11) DEFAULT NULL,
  `work` varchar(100) NOT NULL,
  `workP` varchar(100) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `mob` varchar(11) NOT NULL,
  `regTime` int(11) NOT NULL,
  `specific` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sial`
--

CREATE TABLE `sial` (
  `cpID` int(11) NOT NULL DEFAULT '0',
  `brand` varchar(25) NOT NULL,
  `BPNo` varchar(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `CasNo` varchar(30) DEFAULT NULL,
  `Formula` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `passWord` varchar(30) NOT NULL,
  `level` bigint(20) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `online` int(11) DEFAULT NULL,
  `lastActivity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
