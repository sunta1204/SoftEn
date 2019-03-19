-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 12:09 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soften`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkclass`
--

CREATE TABLE `checkclass` (
  `check_id` int(20) NOT NULL,
  `check_attend` int(10) NOT NULL,
  `c_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `l_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `check_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(10) NOT NULL,
  `c_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_password` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `c_year` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_term` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `c_id`, `c_name`, `c_password`, `c_year`, `c_term`) VALUES
(1, '050108', 'ENGLISH FOR SCIENCES', '5c8de7209bcd0', '2561', 2),
(2, '322278', 'SoftEn', '5c8de615f2e3d', '2561', 2);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(10) NOT NULL,
  `c_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_sec` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `c_id`, `c_name`, `l_name`, `s_id`, `s_name`, `s_sec`) VALUES
(1, '050108 ', 'ENGLISH FOR SCIENCES', 'admin admin', '593020470-6', 'นายุสุริยพงศ์ มอญขาม', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_department` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_sec` int(1) NOT NULL,
  `permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_password`, `s_name`, `s_department`, `s_profile`, `s_sec`, `permission`) VALUES
('593020470-6', '0860896847', 'นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `l_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `l_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`l_username`, `l_name`, `l_password`, `permission`) VALUES
('admin1234', 'admin admin', 'admin1234', 1),
('ta001', 'สมใจ แสนสุก', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkclass`
--
ALTER TABLE `checkclass`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`l_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkclass`
--
ALTER TABLE `checkclass`
  MODIFY `check_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
