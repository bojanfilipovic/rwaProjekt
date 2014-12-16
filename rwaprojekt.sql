-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2014 at 07:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rwaprojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `admin`) VALUES
('bojan', '123', 1),
('ivo', '321', 0),
('domagoj', '12345', 1),
('iva', '123456', 0),
('skins', 'skins', 0),
('kikica', 'pikica', 0),
('kikica', 'pikica', 0),
('kikica', 'pikica', 0),
('kikica', 'pikica', 0),
('kikica', 'pikica', 0),
('kikica', 'fdb66430b98428c92fc49e29489c09ce', 0),
('kilo', '410f5b6b9c408882f0921ad1597f6247', 0),
('sandikralj', 'ac9b4e0b6a21758534db2a6324d34a54', 0),
('josip', '8e55bbc08589b717d080fab27b50f07d', 0),
('skins', 'ada1fd05db818d2ce8b75dcbcfbc5efd', 0),
('skins', 'ada1fd05db818d2ce8b75dcbcfbc5efd', 0),
('skins', 'ada1fd05db818d2ce8b75dcbcfbc5efd', 0),
('jodlo', '81dc9bdb52d04dc20036dbd8313ed055', 0),
('uglalalalalal', '827ccb0eea8a706c4c34a16891f84e7b', 0),
('jasminka', '81dc9bdb52d04dc20036dbd8313ed055', 0),
('dededeed', '202cb962ac59075b964b07152d234b70', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
