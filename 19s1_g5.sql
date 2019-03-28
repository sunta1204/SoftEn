-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 12:54 PM
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
  `l_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `t_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `c_id`, `c_name`, `c_password`, `c_year`, `c_term`, `l_username`, `t_username`) VALUES
(1, '050108', 'ENGLISH FOR SCIENCES', '5c8de7209bcd0', '2561', 2, 'admin1234', ''),
(4, '322391', 'RM', '5c8f7db64c59c', '2561', 2, '', ''),
(5, '322435', 'HUMAN-COMPUTER INTERACTION', '5c8f7f02e16e5', '2561', 2, '', ''),
(7, '1122', 'wwww', '5c90c9cab7335', '2561', 2, 'admin1234', ''),
(8, '4567', 'dfghjk', '5c90cc6b954ee', '2561', 1, '', ''),
(9, '45678', 'ไพไำพไำพ', '5c90cc8335974', '2561', 1, 'admin1234', ''),
(10, '123456', 'terterterte', '5c90cce3a1fe9', '2561', 2, 'admin1234', ''),
(11, '050108', 'ENGLISH FOR SCIENCES', '5c90d3e6dc2b0', '2561', 1, 'admin1234', 'ta001');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(10) NOT NULL,
  `c_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `l_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_sec` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `c_id`, `c_name`, `l_name`, `l_username`, `s_id`, `s_name`, `s_sec`) VALUES
(1, '050108 ', 'ENGLISH FOR SCIENCES', 'admin admin', 'admin1234', '593020470-6', 'นายุสุริยพงศ์ มอญขาม', 3),
(2, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', 'admin1234', '593021265-2', 'นายกษิดิศ ไกรศรีวรรธนะ', 3),
(3, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', 'admin1234', '593020440-5', 'นายพงศกร แซ่ตั้ง', 3),
(4, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', '', '593020448-9', 'นายภัทรดนัย สุขร่วม', 3),
(5, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', '', '593020451-0', 'นายภูมิพัฒน์ ผาสุขธนไพศาล', 3),
(6, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', '', '593020452-8', 'นายภูวเดช ผาปริญญา', 3),
(7, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', '', '593020455-2', 'นายรัฐพล กิจวิวัฒน์กุล', 3),
(8, '050108', 'ENGLISH FOR SCIENCES', 'admin admin', '', '593020467-5', 'นายสิทธิ สุทธิธรรม', 3),
(9, '322391', 'RESEARCH METHODOLOGY', 'admin admin', '', '593020470-6', 'นายุสุริยพงศ์ มอญขาม', 1),
(10, '050108', 'ENGLISH FOR SCIENCES', 'Suriyapong Monkham', '', '593020440-5', 'นายกษิดิศ ไกรศรีวรรธนะ', 2),
(11, '050108', 'ENGLISH FOR SCIENCES', 'Suriyapong Monkham', '', '593021265-2', 'นายุสุริยพงศ์ มอญขาม', 3),
(12, '050108', 'ENGLISH FOR SCIENCES', 'Suriyapong Monkham', '', '593020448-9', 'นายภัทรดนัย สุขร่วม', 1),
(13, '050108', 'ENGLISH FOR SCIENCES', 'Suriyapong Monkham', '', '593020470-6', 'นายุสุริยพงศ์ มอญขาม', 3),
(14, '050108', 'ENGLISH FOR SCIENCES', 'Suriyapong Monkham', '', '593020448-9', 'นายภัทรดนัย สุขร่วม', 3);

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `n_title`, `n_description`, `n_date`, `l_username`, `l_name`, `c_id`) VALUES
(5, 'gggg', 'sdfsdfsdf', '', 'admin1234', 'Suriyapong Monkham', '050108'),
(6, 'พพพพ', 'rrrrrr', '19/03/2019-05:13:19pm', 'admin1234', 'Suriyapong Monkham', '322391');

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
('593021265-2', 'kasidit123', 'นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', '', 1, 3);

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
('chitsutha', 'อ.ดร.ชิตสุทา สุ่มเล็ก', 'chitsutha524', 1);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
