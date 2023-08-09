-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 09:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `anju`
--

CREATE TABLE `anju` (
  `Uid` int(2) NOT NULL,
  `image` varchar(150) NOT NULL,
  `video` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `anju`
--

INSERT INTO `anju` (`Uid`, `image`, `video`) VALUES
(61, 'upload/anju.61.gif', ''),
(78, 'upload/anju.78.jpg', ''),
(84, 'upload/anju.84.jpg', ''),
(93, '', 'upload/anju.93.mp4'),
(95, '', 'upload/anju.95.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `archana`
--

CREATE TABLE `archana` (
  `Uid` int(2) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `video` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `archana`
--

INSERT INTO `archana` (`Uid`, `image`, `video`) VALUES
(80, 'upload/archana.80.jpg', NULL),
(40, 'upload/archana.40.jpg', NULL),
(60, NULL, 'upload/archana.60.mp4'),
(95, 'upload/archana.95.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `della`
--

CREATE TABLE `della` (
  `Uid` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `video` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `della`
--

INSERT INTO `della` (`Uid`, `image`, `video`) VALUES
(19, 'upload/della.19.jpg', ''),
(21, 'upload/della.21.jpg', ''),
(43, 'upload/della.49.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobb`
--

CREATE TABLE `jobb` (
  `Uid` int(2) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `video` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jobb`
--

INSERT INTO `jobb` (`Uid`, `image`, `video`) VALUES
(1, 'upload/jobb.jpg', NULL),
(28, 'upload/jobb.28.jpg', NULL),
(55, 'upload/jobb.55.jpg', NULL),
(92, 'upload/jobb.92.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `pincode` int(6) NOT NULL,
  `place` varchar(30) NOT NULL,
  `profile` varchar(150) NOT NULL DEFAULT 'https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `contact`, `gender`, `dob`, `pincode`, `place`, `profile`) VALUES
(1, 'archana', 'b71cad1aa2846b5979cb84c34f7ca880', '8281773576', 'female', '2001-12-13', 673010, 'kozhikode', 'upload/1.jpg'),
(2, 'anju', 'b31df16a88ce00fed951f24b46e08649', '7902748823', 'female', '2001-05-29', 673005, 'Calicut', 'upload/2.jpg'),
(3, 'jiyan', '4a7d1ed414474e4033ac29ccb8653d9b', '9142227651', 'male', '2004-06-16', 645678, 'Kannur', 'upload/3.jpg'),
(4, 'ashiquecm', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', 'male', '1986-04-09', 678934, 'Thanur', 'https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg'),
(5, 'tiya', '674f3c2c1a8a6f90461e8a66fb5550ba', '9446415353', 'male', '1995-10-24', 654730, 'wayanad', 'upload/5.jpg'),
(6, 'della', '2983e3047c0c730d3b7c022584717f3f', '7470747021', 'female', '2023-07-17', 678321, 'Calicut', 'https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg'),
(7, 'jobb', '9d702ffd99ad9c70ac37e506facc8c38', '9349727366', 'male', '2023-08-07', 625378, 'kottyam', 'upload/7.jobb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anju`
--
ALTER TABLE `anju`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `della`
--
ALTER TABLE `della`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `jobb`
--
ALTER TABLE `jobb`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anju`
--
ALTER TABLE `anju`
  MODIFY `Uid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `della`
--
ALTER TABLE `della`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `jobb`
--
ALTER TABLE `jobb`
  MODIFY `Uid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
