-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 03:51 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_statistik`
--

-- --------------------------------------------------------

--
-- Table structure for table `corona`
--

CREATE TABLE IF NOT EXISTS `corona` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `odp` int(255) NOT NULL,
  `pdp` int(255) NOT NULL,
  `positif` int(255) NOT NULL,
  `pp` int(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corona`
--

INSERT INTO `corona` (`id`, `kecamatan`, `odp`, `pdp`, `positif`, `pp`, `tanggal`) VALUES
(1, 'Bangsri', 50, 17, 48, 2015, '2020-07-17'),
(2, 'Welahan', 61, 23, 70, 1401, '2020-07-17'),
(4, 'Pecangaan', 54, 14, 78, 1058, '2020-07-17'),
(5, 'Pakisaji', 60, 7, 35, 564, '2020-07-17'),
(7, 'Mlonggo', 66, 24, 45, 1436, '2020-07-17'),
(8, 'Mayong', 65, 21, 54, 978, '2020-07-17'),
(9, 'Luar Daerah', 7, 24, 34, 0, '2020-07-17'),
(10, 'Batealit', 49, 12, 35, 574, '2020-07-17'),
(11, 'Tahunan', 38, 15, 60, 714, '2020-07-17'),
(14, 'Kedung', 259, 30, 85, 869, '2020-07-17'),
(15, 'Karimunjawa', 1, 1, 0, 365, '2020-07-17'),
(16, 'Kalinyamatan', 20, 17, 40, 259, '2020-07-17'),
(18, 'Pecangaan', 5, 10, 23, 3002, '2020-07-16'),
(19, 'Kalinyamatan', 0, 5, 24, 2006, '2020-07-18'),
(20, 'Nalumsari', 0, 1, 23, 2015, '2020-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'nafiuddin', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'nafiuddin.att@gmail.com', 'Nafiuddin Attamimi', 'admin', '2020-07-22 01:22:28', 'user_no_image.jpg', '2020-04-29 08:20:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corona`
--
ALTER TABLE `corona`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corona`
--
ALTER TABLE `corona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
