-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2018 at 10:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `song_id`) VALUES
(1, 7, 1),
(2, 7, 1),
(4, 8, 2),
(5, 8, 2),
(6, 8, 2),
(9, 7, 1),
(10, 7, 1),
(11, 7, 2),
(12, 7, 2),
(13, 7, 1),
(14, 7, 1),
(15, 7, 1),
(16, 7, 1),
(17, 7, 1),
(18, 7, 1),
(19, 7, 2),
(20, 7, 2),
(21, 7, 1),
(22, 7, 1),
(23, 7, 1),
(24, 7, 1),
(25, 7, 1),
(26, 7, 1),
(27, 7, 1),
(28, 7, 1),
(29, 7, 2),
(30, 7, 2),
(31, 7, 2),
(32, 7, 2),
(33, 7, 2),
(34, 7, 2),
(35, 7, 2),
(36, 7, 2),
(37, 7, 2),
(38, 7, 2),
(39, 7, 2),
(40, 7, 2),
(41, 7, 2),
(42, 7, 2),
(43, 7, 2),
(44, 7, 2),
(45, 7, 2),
(46, 7, 2),
(47, 7, 2),
(48, 7, 2),
(49, 7, 2),
(50, 7, 2),
(51, 7, 1),
(52, 7, 1),
(53, 7, 1),
(54, 7, 1),
(55, 7, 2),
(56, 7, 2),
(57, 7, 1),
(58, 7, 1),
(59, 7, 1),
(60, 7, 1),
(61, 7, 2),
(62, 7, 2),
(63, 7, 1),
(64, 7, 1),
(65, 7, 1),
(66, 7, 1),
(67, 7, 2),
(68, 7, 2),
(69, 7, 1),
(70, 7, 1),
(71, 7, 2),
(72, 7, 2),
(73, 7, 2),
(74, 7, 2),
(75, 7, 2),
(76, 7, 2),
(77, 7, 2),
(78, 7, 2),
(79, 7, 2),
(80, 7, 2),
(81, 7, 2),
(82, 7, 2),
(83, 7, 2),
(84, 7, 2),
(85, 7, 2),
(86, 7, 2),
(87, 7, 2),
(88, 7, 2),
(89, 8, 2),
(90, 8, 2),
(91, 8, 1),
(92, 8, 1),
(93, 8, 1),
(94, 8, 1),
(95, 8, 2),
(96, 8, 2),
(97, 8, 1),
(98, 8, 1),
(99, 8, 1),
(100, 8, 1),
(101, 8, 1),
(102, 8, 1),
(103, 8, 1),
(104, 8, 1),
(105, 8, 1),
(106, 8, 1),
(107, 8, 1),
(108, 8, 1),
(109, 8, 1),
(110, 8, 1),
(111, 8, 1),
(112, 8, 1),
(113, 8, 1),
(114, 8, 1),
(115, 8, 1),
(116, 8, 1),
(117, 8, 1),
(118, 8, 1),
(119, 8, 1),
(120, 8, 1),
(121, 8, 1),
(122, 8, 1),
(123, 8, 1),
(124, 8, 1),
(125, 8, 2),
(126, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlist_id`, `name`, `user_id`) VALUES
(1, 'My Music', '8'),
(2, 'test ', '8'),
(3, 'dev', '7'),
(22, 'gfesd', '8');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_assoc`
--

CREATE TABLE `playlist_assoc` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist_assoc`
--

INSERT INTO `playlist_assoc` (`id`, `playlist_id`, `song_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 1),
(4, 2, 2),
(5, 3, 2),
(6, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `name`, `location`) VALUES
(1, 'Activation', '../music/activation.mp3'),
(2, 'Sadie', '../music/sadie.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, '0', '0'),
(2, '0', '0'),
(3, '0', '0'),
(4, '0', '0'),
(5, '0', '0'),
(7, 'dev', 'e77989ed21758e78331b20e477fc5582'),
(8, 'abc', '900150983cd24fb0d6963f7d28e17f72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `playlist_assoc`
--
ALTER TABLE `playlist_assoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `playlist_assoc`
--
ALTER TABLE `playlist_assoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
