-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 08:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `aname`, `dob`, `bio`) VALUES
(1, 'Arijit Singh', '1997-12-12', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos facilis saepe quisquam dolorum quas unde eligendi fuga eveniet praesentium repudiandae necessitatibus voluptates mollitia.'),
(2, 'Neha Kakkad', '1996-12-12', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos facilis saepe quisquam dolorum quas unde eligendi fuga eveniet praesentium repudiandae necessitatibus voluptates mollitia.'),
(3, 'Emiway Bantai', '2001-01-02', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos facilis saepe quisquam dolorum quas unde eligendi fuga eveniet praesentium repudiandae necessitatibus voluptates mollitia.');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `artwork` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `sname`, `rdate`, `aname`, `artwork`) VALUES
(5, 'Eclipse', '2022-06-09', 'Neha Kakkad', 'mixtape.jpg'),
(6, 'Ami jetu maa', '2022-06-22', 'Arijit Singh', 'Untitled design (7).jpg'),
(7, 'Tujhe dekha to ye jana sanam ', '2001-12-12', 'Udit Narayan', 'institute-management-system-in-php-free-source-code.png'),
(8, 'Dil Abhi Bhara Nahi', '2003-12-02', 'Lata Mangeshkar', 'Untitled design (7).jpg'),
(9, 'Dil hai ki manta nahi', '2003-12-12', 'Neha Kakkad', 'marvin-meyer-SYTO3xs06fU-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
