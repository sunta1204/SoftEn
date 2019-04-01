-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 04:13 PM
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
  `c_term` int(1) NOT NULL,
  `c_sec` int(3) NOT NULL,
  `l_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `t_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `c_id`, `c_name`, `c_password`, `c_year`, `c_term`, `c_sec`, `l_username`, `t_username`) VALUES
(15, '050108', 'ENGLISH FOR SCIENCES', '5c9c6fbb97a54', '2561', 1, 1, 'chitsutha', 'thanaporn'),
(20, '050108', 'ENGLISH FOR SCIENCES', '5c9cd63166868', '2561', 1, 3, 'chitsutha', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(10) NOT NULL,
  `c_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_sec` int(3) NOT NULL,
  `c_year` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_term` int(1) NOT NULL,
  `l_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_department` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `c_id`, `c_name`, `c_sec`, `c_year`, `c_term`, `l_name`, `l_username`, `t_username`, `t_name`, `s_id`, `s_name`, `s_department`, `status`) VALUES
(100, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020470-6', 'นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', 1),
(101, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021265-2', 'นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', 1),
(102, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020145-5', 'gjhgjgjhg', 'hgjhgjhgj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `n_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `l_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `permission` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_password`, `s_name`, `s_department`, `s_profile`, `permission`) VALUES
('593020145-5', '1234', 'gjhgjgjhg', 'hgjhgjhgj', '', 3),
('593020470-6', '0860896847', 'นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', '', 3),
('593021265-2', 'kasidit123', 'นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `t_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `t_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `t_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`t_username`, `t_password`, `t_name`, `permission`) VALUES
('thanaporn', 'thanaporn123', 'นางสาวธนพร ฉัตรมงคลชาติ', 2);

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
('chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'chitsutha524', 1);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`t_username`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
