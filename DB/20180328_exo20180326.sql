-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2018 at 02:00 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exo20180326`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image_link` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `image_link`) VALUES
(9, 'Donald', 'Super Beautifull Donald without Trump !', 'donald.jpg'),
(10, 'Mickey', 'The Fabulous Mickey Mouse !!!!!! The real one !', 'michey.jpg'),
(11, 'Simpley', 'Simpley form \"La Belle au bois dormant\"', 'nain.jpg'),
(12, 'Cinderella', 'The Wonderfull Cenderella. The real one !!!!!', 'cinderella.jpg'),
(13, 'Dingo', 'And know everything goes wrong ! Take care !', 'dingo.jpg'),
(15, 'Nemo Fish', 'If you swim like a fish, Nemo is your best friend !', 'nemo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(70) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `fullname`, `pwd`) VALUES
(3, 'eric', 'Eric LALLEMAND', '$2y$10$GCPe/L1G.tf4O/pHfyDbMOO2/azJXjMzXkxRQUkihCKApz59ZAp5q'),
(5, 'sedat', 'Mother F', '$2y$10$4BZksEZgOxyQ4swpa259duRu5THa/gPMDJWcWj3CTVGPZJ6jzBHI.'),
(6, 'Sandrine', 'FMI', '$2y$10$Z43heA8/8GajD4xDCGhn1.f8BNHHXshZkKNQpud.0AwEJfC93dupy'),
(7, 'Serah', 'He is there', '$2y$10$8qOBzYWzPwS3iwCSdDQqUONkzR6d487RhVnfbwDStgpFhWaqhvCjK'),
(8, 'Romain', 'RORO', '$2y$10$DVckmNK7rvhqiBeN9Z56Yuy/li0ry51QyjUW8ZmD8aQFmpJGhbCnm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
