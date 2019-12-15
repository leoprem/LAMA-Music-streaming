-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2019 at 02:22 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `signUpDate`, `Status`, `profilePic`) VALUES
(1, 'Leo99', 'Leo', 'Prem', 'Leoisleo99@gmail.com', '$2y$10$sv/jxnkvmX0RBwA3t70tVepHp0xvllLthyo0UPHLNM5BrjhfvEdpm', '2019-12-14 00:00:00', 'user', 'assets/images/profile-pic/default.jpg'),
(3, 'batset', 'Leo', 'Prem', 'Leoprem99@gmail.com', '$2y$10$ThIeCe7jiWO7VUkWD2UZp.rT80/l6H9aYanC8ZT6efXA46uxZMT7K', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg'),
(4, 'lavu12', 'Lavanya', 'Lavu', 'Josejames33@gmail.com', '$2y$10$wFAySx4z0C54jNH2cren6eEJ8A391qe3KwVq.FFwd0JfwCZJtRt9.', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg'),
(5, 'Leo11', 'Leo', 'Prem', 'Leo@gmail.com', '$2y$10$KWjMB5HulyB.IfUj6w4f8uCkTHZuvo50eWHOioQry3NrjLtZLy1yq', '2019-12-15 00:00:00', 'user', 'assets/images/profile-pic/default.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
