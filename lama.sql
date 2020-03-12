-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2020 at 04:09 PM
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
-- Database: `lama`
--

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

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `password`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(3, 'root', '$2y$10$yb1quRYlI6HmsITLK0YRnewHMRXgFKrmeVdSKlXLlGhbKLcrMOg6S', NULL, NULL, NULL, 'super'),
(8, 'super', '55c3b5386c486feb662a0785f340938f518d547f', NULL, NULL, NULL, 'super'),
(9, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'admin'),
(10, 'leo', '5f4dcc3b5aa765d61d8327deb882cf99', 'PQUu6rTAAbSnNoPc', '1d0e1a9b1e4f87e41561fa709eddee33', '2020-03-11 14:14:13', 'super'),
(11, 'new', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'super'),
(12, 'ajith', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, 'super');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(7, 'No. 6', 1, 2, 'no_6.jpg'),
(2, 'Stoney', 3, 1, 'stoney.jpg'),
(3, '24k Magic', 2, 5, '24k_magic.png'),
(8, 'Eminem', 9, 1, 'eminem.jpg'),
(9, 'Blinding Lights', 10, 3, 'The_Weeknd_-_Blinding_Lights.png'),
(10, 'Thank U, Next', 11, 2, 'thank-u-next.jpg'),
(11, 'When We All Fall Asleep, Where Do We Go?', 12, 2, 'when_we_sleep.jpg'),
(23, 'Trench', 19, 3, '1203030346.jpg'),
(18, 'Everyday Life', 15, 1, '1203020304.jpg'),
(19, 'Shawn Mendes: The Album', 16, 2, '1203020357.jpg'),
(21, 'Purpose', 17, 2, '1203030305.jpg'),
(22, 'Red Pill Blues', 18, 2, '1203030341.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Ed Sheeran'),
(2, 'Bruno Mars'),
(3, 'Post Malone'),
(4, 'Camila Cabello'),
(9, 'Eminem'),
(10, 'The Weeknd'),
(11, 'Ariana Grande'),
(12, 'Billie Eilish'),
(13, 'Marilyn Manson'),
(19, 'Twenty One Pilots'),
(15, 'Coldplay'),
(16, 'Shawn Mendes'),
(17, 'Justin Bieber'),
(18, 'Maroon 5');

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

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rap'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'Classic'),
(5, 'R&B'),
(7, 'Heavy Metal');

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

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'English'),
(3, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `date`) VALUES
(8, 'new', 'lavu123', '2020-03-12 00:00:00'),
(7, 'Lavu', 'leo99', '2020-03-12 00:00:00'),
(6, 'Leo', 'leo99', '2020-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

DROP TABLE IF EXISTS `playlistsongs`;
CREATE TABLE IF NOT EXISTS `playlistsongs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `songId` int(11) NOT NULL,
  `playListId` int(11) NOT NULL,
  `playListOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playListId`, `playListOrder`) VALUES
(51, 5, 6, 1),
(52, 42, 7, 1),
(53, 35, 7, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `language`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(3, '24k Magic', 2, 3, 1, 2, '3:46', '24K_Magic.mp3', 1, 77),
(4, 'Congratulations ft. Quavo', 3, 2, 1, 1, '3:47', 'Congratulations_ft_Quavo.mp3', 1, 49),
(5, 'I Don\'t Care', 1, 7, 1, 2, '3:39', 'No_6_06 I Don\'t Care.mp3', 1, 81),
(6, 'Antisocial', 1, 7, 1, 1, '2:41', 'No_6_07 Antisocial.mp3', 2, 80),
(7, 'Feels (feat_ Young Thug & J Hus)', 1, 7, 1, 2, '2:30', 'No_6_09 Feels (feat_ Young Thug & J Hus).mp3', 3, 70),
(31, 'Hello', 9, 8, 1, 1, '4:08', '1203020359.mp3', 2, 0),
(32, 'Not Afraid', 9, 8, 1, 1, '4:10', '1203020324.mp3', 2, 1),
(9, 'BLOW', 1, 7, 1, 3, '3:29', 'No_6_15 BLOW.mp3', 5, 70),
(34, 'Thank U, Next', 11, 10, 1, 1, '3.19', '1203020333.mp3', 1, 0),
(33, 'Orphans', 15, 18, 1, 1, '3:17', '1203020308.mp3', 1, 3),
(35, 'Bad Guy', 12, 11, 1, 2, '3:14', '1203020354.mp3', 1, 3),
(36, 'All the Good Girls Go to Hell', 12, 11, 1, 2, '2:48', '1203020324.mp3', 2, 3),
(37, 'Wish You Were Gay', 12, 11, 1, 2, '3:41', '1203020320.mp3', 3, 1),
(38, 'Blinding Lights', 10, 9, 1, 2, '3:21', '1203020359.mp3', 1, 1),
(39, 'In My Blood', 16, 19, 1, 2, '3:31', '1203020303.mp3', 1, 2),
(40, 'Nervous', 16, 19, 1, 2, '2:44', '1203020346.mp3', 2, 3),
(41, 'Sorry', 17, 21, 1, 2, '3:20', '1203030330.mp3', 1, 1),
(42, 'Love Yourself', 17, 21, 1, 2, '3:52', '1203030305.mp3', 2, 4),
(43, ' I\'ll Show You', 17, 21, 1, 2, '3:20', '1203030312.mp3', 3, 0),
(44, 'Girls Like You', 18, 22, 1, 2, '3:34', '1203030312.mp3', 1, 10),
(45, 'Jumpsuit', 19, 23, 1, 3, '3:58', '1203030303.mp3', 1, 3),
(46, 'My Blood', 19, 23, 1, 3, '3:49', '1203030344.mp3', 2, 0),
(47, 'Chlorine', 19, 23, 1, 3, '3:11', '1203030326.mp3', 3, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `signUpDate`, `Status`, `profilePic`) VALUES
(3, 'batset', 'Leo', 'Prem', 'Leoprem99@gmail.com', '$2y$10$ThIeCe7jiWO7VUkWD2UZp.rT80/l6H9aYanC8ZT6efXA46uxZMT7K', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg'),
(4, 'lavu12', 'Lavanya', 'Lavu', 'Josejames33@gmail.com', '$2y$10$wFAySx4z0C54jNH2cren6eEJ8A391qe3KwVq.FFwd0JfwCZJtRt9.', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg'),
(7, 'Leo99', 'Leo', 'Prem', 'adssd@adasd.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-02-09 00:00:00', 'user', 'assets/images/profile-pic/default.jpg'),
(8, 'lavu123', 'Lavanya', 'Prem', 'Lavu@gmail.com', '8e4eaa4997b91645b0f29a599c43bf3b', '2020-03-12 00:00:00', 'user', 'assets/images/profile-pic/default.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
