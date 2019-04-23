-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 05:29 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `19s1_g5`
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
  `l_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `c_id`, `c_name`, `c_password`, `c_year`, `c_term`, `c_sec`, `l_username`, `l_name`, `t_username`) VALUES
(20, '050108', 'ENGLISH FOR SCIENCES', '5c9cd63166868', '2561', 1, 3, 'silain', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(21, '322372', 'SOFTWARE ENGINEERING', '5c9f8a5ba34ea', '2561', 2, 1, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(23, '322435', 'HUMAN-COMPUTER INTERACTION', '5c9fa81b4a9d9', '2561', 1, 1, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(30, '322385', 'Software Quality Assurance', '5ca03c5402429', '2561', 1, 2, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(31, '050108', 'ENGLISH FOR SCIENCES', '5ca24deed1af3', '2561', 1, 2, 'punhor1', '	\r\nผศ.ดร.ปัญญาพล หอระตะ  ', 'thanaporn'),
(35, '322385', 'Software Quality Assurance', '5ca45d6c1c7c7', '2561', 1, 1, 'boonsup', '	\r\nผศ.บุญทรัพย์ ไวคำ', 'thanaporn'),
(36, '322385', 'Software Quality Assurance', '5ca45e057fab1', '2562', 1, 2, 'boonsup', '	\r\nผศ.บุญทรัพย์ ไวคำ', 'thanaporn'),
(37, '322372', 'SOFTWARE ENGINEERING', '5cbddb18ee03b', '2561', 2, 2, 'chitsutha', NULL, NULL);

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
  `status` int(1) DEFAULT '1',
  `sec_from` int(10) DEFAULT NULL,
  `sec_transfer` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(' 593020035-4', '3020035-4', 'นายอภิชาต หวังกลับ', 'วิทยาการคอมพิวเตอร์', '', 3),
(' 593020036-2', '3020036-2', 'นางสาวอารีรัตน์ กัลยกรสกุล', 'วิทยาการคอมพิวเตอร์', '', 3),
(' 593020054-0', '3020054-0', 'นายพรเทพ เนตรเดชา', 'วิทยาการคอมพิวเตอร์', '', 3),
('583020370-9', '3020370-9', 'นายอภิวัฒน์ เมฆวัน	', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020031-2', '3020031-2', 'นางสาวกวินธิดา สายยศ', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020032-0', '3020032-0', 'นายกษิดิ์เดช ก้านทอง', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020034-6', '3020034-6', 'นายรัฐศาสตร์ สิทธิมงคล', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020050-8', '3020050-8', 'นายคมเพชร มีทรัพย์', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020051-6', '3020051-6', 'นายจารุวัฒน์ มะพันธ์', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020052-4', '3020052-4', 'นายปภาวิชญ์ พาศรี	', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020403-1', '3020403-1', 'นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020404-9', '3020404-9', 'นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', '', 3),
('593020409-9', '3020409-9', 'นางสาวจิตรลดา ปัตตาเทศา', 'วิทยาการคอมพิวเตอร์', '', 3),
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
('boonsup', '	\r\nผศ.บุญทรัพย์ ไวคำ', 'boonsupt123', 1),
('chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'chitsutha524', 1),
('khamron', '	\r\nผศ.ดร.คำรณ สุนัติ ', 'khamron123', 1),
('punhor1', '	\r\nผศ.ดร.ปัญญาพล หอระตะ  ', 'punhor123', 1),
('pusadee', '	\r\nผศ.ดร.พุธษดี ศิริแสงตระกูล  ', 'pusadee123', 1),
('silain', '	\r\nผศ.ดร.สิลดา อินทรโสธรฉันท์ ', 'silain123', 1),
('sunkra', '	\r\nผศ.ดร.สิรภัทร เชี่ยวชาญวัฒนา  ', 'sunkra123', 1),
('suntiAT', '	\r\nผศ.สันติ ทินตะนัย  ', 'suntiAT123', 1),
('twachi', '	\r\nอ.ดร.วชิราวุธ ธรรมวิเศษ', 'twachi123', 1),
('urachart', '	\r\nผศ.ดร.อุรฉัตร โคแก้ว', 'urachart123', 1),
('wongsar', 'รศ.ดร.ศาสตรา วงศ์ธนวสุ ', 'wongsar123', 1);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
