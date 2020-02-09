-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2020 at 07:05 PM
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

﻿--
-- Database: `lama`
--
﻿
-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
﻿
--
-- Dumping data for table `admin_accounts`
--

﻿INSERT INTO `admin_accounts` (`id`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(3, 'root', '$2y$10$yb1quRYlI6HmsITLK0YRnewHMRXgFKrmeVdSKlXLlGhbKLcrMOg6S', NULL, NULL, NULL, 'super')﻿,
(8, 'super', '55c3b5386c486feb662a0785f340938f518d547f', NULL, NULL, NULL, 'super')﻿,
(9, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'super')﻿,
(10, 'leo', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'super')﻿,
(11, 'new', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'super')﻿,
(12, 'ajith', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'super')﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
﻿
--
-- Dumping data for table `album`
--

﻿INSERT INTO `album` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(7, 'No. 6', 1, 2, 'assets\\images\\artwork\\no_6.jpg')﻿,
(2, 'Stoney', 3, 1, 'assets/images/artwork/stoney.jpg')﻿,
(3, '24k Magic', 2, 5, 'assets/images/artwork/24k_magic.png')﻿,
(8, 'Eminem', 9, 1, 'assets\\images\\artwork\\eminem.jpg')﻿,
(9, 'Blinding Lights', 10, 3, 'assets\\images\\artwork\\The_Weeknd_-_Blinding_Lights.png')﻿,
(10, 'Thank U, Next', 11, 2, 'assets\\images\\artwork\\thank-u-next.jpg')﻿,
(11, 'When We All Fall Asleep, Where Do We Go?', 12, 2, 'assets\\images\\artwork\\when_we_sleep.jpg')﻿,
(12, 'Lest We Forget: The Best Of', 13, 7, 'assets\\images\\artwork\\manson.jpg')﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
﻿
--
-- Dumping data for table `artist`
--

﻿INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Ed Sheeran')﻿,
(2, 'Bruno Mars')﻿,
(3, 'Post Malone')﻿,
(4, 'Camila Cabello')﻿,
(9, 'Eminem')﻿,
(10, 'The Weeknd')﻿,
(11, 'Ariana Grande')﻿,
(12, 'Billie Eilish')﻿,
(13, 'Marilyn Manson')﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
﻿
--
-- Dumping data for table `customers`
--

﻿INSERT INTO `customers` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(18, 'bhushan', 'Chhadva', 'male', 'Padmavati', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1991-06-18', 0, NULL, 0, NULL)﻿,
(19, 'Jayant', 'atre', 'male', 'Priyadarshini A102, adwa2', 'wad', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1998-05-18', 0, NULL, 0, NULL)﻿,
(21, 'bhushan', 'sutar', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-24', 0, NULL, 0, NULL)﻿,
(23, 'Paolo', ' Accorti', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1992-02-04', 0, NULL, 0, NULL)﻿,
(24, 'Roland', ' Mendel', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-30', 0, NULL, 0, NULL)﻿,
(25, 'John', 'doe', 'male', 'City, view', '', 'Maharashtra', '8875207658', 'john@abc.com', '2017-01-27', 0, NULL, 0, NULL)﻿,
(26, 'Maria', 'Anders', 'female', 'New york city', '', 'Maharashtra', '8856705387', 'chetanshenai9@gmail.com', '2017-01-28', 0, NULL, 0, NULL)﻿,
(27, 'Ana', ' Trujillo', 'female', 'Street view', '', 'Maharashtra', '9975658478', 'chetanshenai9@gmail.com', '1992-07-16', 0, NULL, 0, NULL)﻿,
(28, 'Thomas', 'Hardy', 'male', '120 Hanover Sq', '', 'Maharashtra', '885115323', 'abc@abc.com', '1985-06-24', 0, NULL, 0, NULL)﻿,
(29, 'Christina', 'Berglund', 'female', 'Berguvsvägen 8', '', 'Maharashtra', '9985125366', 'chetanshenai9@gmail.com', '1997-02-12', 0, NULL, 0, NULL)﻿,
(30, 'Ann', 'Devon', 'male', '35 King George', '', 'Maharashtra', '8865356988', 'abc@abc.com', '1988-02-09', 0, NULL, 0, NULL)﻿,
(31, 'Helen', 'Bennett', 'female', 'Garden House Crowther Way', '', 'Maharashtra', '75207654', 'chetanshenai9@gmail.com', '1983-06-15', 0, NULL, 0, NULL)﻿,
(32, 'Annette', 'Roulet', 'female', '1 rue Alsace-Lorraine', '', ' ', '3410005687', 'abc@abc.com', '1992-01-13', 0, NULL, 0, NULL)﻿,
(33, 'Yoshi', 'Tannamuri', 'male', '1900 Oak St.', '', 'Maharashtra', '8855647899', 'chetanshenai9@gmail.com', '1994-07-28', 0, NULL, 0, NULL)﻿,
(34, 'Carlos', 'González', 'male', 'Barquisimeto', '', 'Maharashtra', '9966447554', 'abc@abc.com', '1997-06-24', 0, NULL, 0, NULL)﻿,
(35, 'Fran', ' Wilson', 'male', 'Priyadarshini ', '', 'Maharashtra', '5844775565', 'fran@abc.com', '1997-01-27', 0, NULL, 0, NULL)﻿,
(36, 'Jean', ' Fresnière', 'female', '43 rue St. Laurent', '', 'Maharashtra', '9975586123', 'chetanshenai9@gmail.com', '2002-01-28', 0, NULL, 0, NULL)﻿,
(37, 'Jose', 'Pavarotti', 'male', '187 Suffolk Ln.', '', 'Maharashtra', '875213654', ' Pavarotti@gmail.com', '1997-02-04', 0, NULL, 0, NULL)﻿,
(38, 'Palle', 'Ibsen', 'female', 'Smagsløget 45', '', 'Maharashtra', '9975245588', 'Palle@gmail.com', '1991-06-17', 0, NULL, 0, '2018-01-14 17:11:42')﻿,
(39, 'Paula', 'Parente', 'male', 'Rua do Mercado, 12', '', 'Maharashtra', '659984878', 'abc@gmail.com', '1996-02-06', 0, NULL, 0, NULL)﻿,
(40, 'Matti', ' Karttunen', 'female', 'Keskuskatu 45', '', 'Maharashtra', '845555125', 'abc@abc.com', '1984-06-19', 0, NULL, 0, NULL)﻿,
(47, 'Chetan ', 'Doe', 'male', 'afa', NULL, 'Maharashtra', '9934678658', 'chetanshenai9@gmail.com', NULL, 0, '2018-11-17 18:26:16', 0, NULL)﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
﻿
--
-- Dumping data for table `genres`
--

﻿INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rap')﻿,
(2, 'Pop')﻿,
(3, 'Rock')﻿,
(4, 'Classic')﻿,
(5, 'R&B')﻿,
(7, 'Heavy Metal')﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
﻿
--
-- Dumping data for table `languages`
--

﻿INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'English')﻿,
(3, 'Hindi')﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(250) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
﻿
--
-- Dumping data for table `songs`
--

﻿INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `language`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(3, '24k Magic', 2, 3, 1, 2, '3:46', 'assets\\music\\24K_Magic.mp3', 1, 0)﻿,
(4, 'Congratulations ft. Quavo', 3, 2, 1, 1, '3:47', 'assets\\music\\Congratulations_ft_Quavo.mp3', 1, 0)﻿;
﻿
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `Status` varchar(10) NOT NULL,
  `profilePic` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
﻿
--
-- Dumping data for table `users`
--

﻿INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `signUpDate`, `Status`, `profilePic`) VALUES
(3, 'batset', 'Leo', 'Prem', 'Leoprem99@gmail.com', '$2y$10$ThIeCe7jiWO7VUkWD2UZp.rT80/l6H9aYanC8ZT6efXA46uxZMT7K', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg')﻿,
(4, 'lavu12', 'Lavanya', 'Lavu', 'Josejames33@gmail.com', '$2y$10$wFAySx4z0C54jNH2cren6eEJ8A391qe3KwVq.FFwd0JfwCZJtRt9.', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg')﻿,
(7, 'Leo99', 'Leo', 'Prem', 'Leoisleo99@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-02-09 00:00:00', 'user', 'assets/images/profile-pic/default.jpg')﻿;
﻿COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
