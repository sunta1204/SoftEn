-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2019 at 12:04 AM
-- Server version: 5.5.62
-- PHP Version: 7.2.7

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
(20, '050108', 'ENGLISH FOR SCIENCES', '5c9cd63166868', '2561', 1, 3, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(21, '322372', 'SOFTWARE ENGINEERING', '5c9f8a5ba34ea', '2561', 2, 1, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(23, '322435', 'HUMAN-COMPUTER INTERACTION', '5c9fa81b4a9d9', '2561', 1, 1, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(30, '322385', 'Software Quality Assurance', '5ca03c5402429', '2561', 1, 2, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(31, '050108', 'ENGLISH FOR SCIENCES', '5ca24deed1af3', '2561', 1, 2, 'chitsutha', 'อ.ดร.ชิตสุธา สุ่มเล็ก', 'thanaporn'),
(34, '000101', 'Eng Lv1', '5ca4530097829', '2562', 2, 17, 'boonsup', '	\r\nผศ.บุญทรัพย์ ไวคำ', 'thanaporn'),
(35, '322385', 'Software Quality Assurance', '5ca45d6c1c7c7', '2561', 1, 1, 'boonsup', '	\r\nผศ.บุญทรัพย์ ไวคำ', 'thanaporn'),
(36, '322385', 'Software Quality Assurance', '5ca45e057fab1', '2562', 1, 2, 'boonsup', '	\r\nผศ.บุญทรัพย์ ไวคำ', 'thanaporn');

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
(147, '050108', 'ENGLISH FOR SCIENCES', 3, '2561', 1, NULL, NULL, NULL, NULL, '﻿593020052-4', 'นายปภาวิชญ์ พาศรี', 'วิทยาการคอมพิวเตอร์', 3),
(148, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020403-1', 'นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', 1),
(149, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020404-9', 'นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', 1),
(150, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020409-9', 'นางสาวจิตรลดา ปัตตาเทศา', 'วิทยาการคอมพิวเตอร์', 1),
(151, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020410-4', 'นายจีรศักดิ์ เครือเนียม', 'วิทยาการคอมพิวเตอร์', 1),
(152, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020412-0', ' นางสาวชนิตา เกษมสุข', 'วิทยาการคอมพิวเตอร์', 1),
(154, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, ' 593020036-2', 'นางสาวอารีรัตน์ กัลยกรสกุล', 'วิทยาการคอมพิวเตอร์', 1),
(155, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, ' 593020035-4', 'นายอภิชาต หวังกลับ', 'วิทยาการคอมพิวเตอร์', 1),
(156, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '583020330-1', ' นายณัฎฐพงค์ รัตนศิริพรหม', 'วิทยาการคอมพิวเตอร์', 1),
(157, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '583020370-9', ' นายอภิวัฒน์ เมฆวัน', 'วิทยาการคอมพิวเตอร์', 1),
(158, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020052-4', ' นายปภาวิชญ์ พาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(159, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020403-1', ' นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', 1),
(160, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020404-9', ' นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', 1),
(161, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020409-9', ' นางสาวจิตรลดา ปัตตาเทศา', 'วิทยาการคอมพิวเตอร์', 1),
(162, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020412-0', ' นางสาวชนิตา เกษมสุข', 'วิทยาการคอมพิวเตอร์', 1),
(163, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020418-8', ' นางสาวณัฐชยา แฝงเมืองคุก', 'วิทยาการคอมพิวเตอร์', 1),
(164, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020419-6', ' นายณัฐพงศ์ โภคาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(165, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020423-5', ' นางสาวณิชกานต์ ปัตลา', 'วิทยาการคอมพิวเตอร์', 1),
(166, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020425-1', ' นายธณัฐพงษ์ เค้ามาก', 'วิทยาการคอมพิวเตอร์', 1),
(167, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020432-4', ' นางสาวนธิภรณ์ พละพันธ์', 'วิทยาการคอมพิวเตอร์', 1),
(168, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020437-4', ' นางสาวประภัสสร จันทราษี', 'วิทยาการคอมพิวเตอร์', 1),
(169, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020440-5', ' นายพงศกร แซ่ตั้ง', 'วิทยาการคอมพิวเตอร์', 1),
(170, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020441-3', ' นายพงศกร นาคอก', 'วิทยาการคอมพิวเตอร์', 1),
(171, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020443-9', ' นายพชร สรภูมิ', 'วิทยาการคอมพิวเตอร์', 1),
(172, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020452-8', ' นายภูวเดช ผาปริญญา', 'วิทยาการคอมพิวเตอร์', 1),
(173, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020455-2', ' นายรัฐพล กิจวิวัฒน์กุล', 'วิทยาการคอมพิวเตอร์', 1),
(174, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020459-4', ' นางสาววศินี ชมชื่น', 'วิทยาการคอมพิวเตอร์', 1),
(175, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020462-5', ' นางสาววิลาวัณย์ ชินสงคราม', 'วิทยาการคอมพิวเตอร์', 1),
(176, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020463-3', ' นายวิษณุ พลไธสง', 'วิทยาการคอมพิวเตอร์', 1),
(177, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020466-7', ' นายศุภณัฐ บุญสารี', 'วิทยาการคอมพิวเตอร์', 1),
(178, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020467-5', ' นายสิทธิ สุทธิธรรม', 'วิทยาการคอมพิวเตอร์', 1),
(179, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020468-3', ' นายสุตชาติ ปุ๊กหมื่นไวย์', 'วิทยาการคอมพิวเตอร์', 1),
(180, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020470-6', ' นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', 1),
(181, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020474-8', ' นางสาวอุรชา ภูดิฐวัฒนโชค', 'วิทยาการคอมพิวเตอร์', 1),
(182, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020791-6', ' นางสาวชนาเนตร คำเพิงใจ', 'วิทยาการคอมพิวเตอร์', 1),
(183, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020806-9', ' นายวิทยา คงกระพันธุ์', 'วิทยาการคอมพิวเตอร์', 1),
(184, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020931-6', ' นายอัครเดช แก้วมณีโชติ', 'วิทยาการคอมพิวเตอร์', 1),
(185, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021264-4', ' นางสาวกนกพร ธนวัฒนากูล', 'วิทยาการคอมพิวเตอร์', 1),
(186, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021265-2', ' นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', 1),
(187, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021266-0', ' นายกิตติธัช ปลั่งกลาง', 'วิทยาการคอมพิวเตอร์', 1),
(188, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021270-9', ' นางสาวฑิตยา ศรีวุฒิทรัพย์', 'วิทยาการคอมพิวเตอร์', 1),
(189, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021273-3', ' นางสาวภควดี สุวรรณะ', 'วิทยาการคอมพิวเตอร์', 1),
(190, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021275-9', ' นายยศสรัล กิตติปฐมวิทย์', 'วิทยาการคอมพิวเตอร์', 1),
(191, '050108', 'ENGLISH FOR SCIENCES', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021279-1', ' นายศักดิ์ยะวัชร สีกู่กา', 'วิทยาการคอมพิวเตอร์', 1),
(192, '322372', 'SOFTWARE ENGINEERING', 1, '2561', 2, NULL, NULL, NULL, NULL, '593020403-1', 'นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', 1),
(193, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '583020330-1', ' นายณัฎฐพงค์ รัตนศิริพรหม', 'วิทยาการคอมพิวเตอร์', 1),
(194, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '583020370-9', ' นายอภิวัฒน์ เมฆวัน', 'วิทยาการคอมพิวเตอร์', 1),
(195, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020052-4', ' นายปภาวิชญ์ พาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(196, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020403-1', ' นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', 1),
(197, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020404-9', ' นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', 1),
(198, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020409-9', ' นางสาวจิตรลดา ปัตตาเทศา', 'วิทยาการคอมพิวเตอร์', 1),
(199, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020412-0', ' นางสาวชนิตา เกษมสุข', 'วิทยาการคอมพิวเตอร์', 1),
(200, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020418-8', ' นางสาวณัฐชยา แฝงเมืองคุก', 'วิทยาการคอมพิวเตอร์', 1),
(201, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020419-6', ' นายณัฐพงศ์ โภคาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(202, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020423-5', ' นางสาวณิชกานต์ ปัตลา', 'วิทยาการคอมพิวเตอร์', 1),
(203, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020425-1', ' นายธณัฐพงษ์ เค้ามาก', 'วิทยาการคอมพิวเตอร์', 1),
(204, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020432-4', ' นางสาวนธิภรณ์ พละพันธ์', 'วิทยาการคอมพิวเตอร์', 1),
(205, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020437-4', ' นางสาวประภัสสร จันทราษี', 'วิทยาการคอมพิวเตอร์', 1),
(206, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020440-5', ' นายพงศกร แซ่ตั้ง', 'วิทยาการคอมพิวเตอร์', 1),
(207, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020441-3', ' นายพงศกร นาคอก', 'วิทยาการคอมพิวเตอร์', 1),
(208, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020443-9', ' นายพชร สรภูมิ', 'วิทยาการคอมพิวเตอร์', 1),
(209, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020452-8', ' นายภูวเดช ผาปริญญา', 'วิทยาการคอมพิวเตอร์', 1),
(210, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020455-2', ' นายรัฐพล กิจวิวัฒน์กุล', 'วิทยาการคอมพิวเตอร์', 1),
(211, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020459-4', ' นางสาววศินี ชมชื่น', 'วิทยาการคอมพิวเตอร์', 1),
(212, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020462-5', ' นางสาววิลาวัณย์ ชินสงคราม', 'วิทยาการคอมพิวเตอร์', 1),
(213, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020463-3', ' นายวิษณุ พลไธสง', 'วิทยาการคอมพิวเตอร์', 1),
(214, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020466-7', ' นายศุภณัฐ บุญสารี', 'วิทยาการคอมพิวเตอร์', 1),
(215, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020467-5', ' นายสิทธิ สุทธิธรรม', 'วิทยาการคอมพิวเตอร์', 1),
(216, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020468-3', ' นายสุตชาติ ปุ๊กหมื่นไวย์', 'วิทยาการคอมพิวเตอร์', 1),
(217, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020470-6', ' นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', 1),
(218, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020474-8', ' นางสาวอุรชา ภูดิฐวัฒนโชค', 'วิทยาการคอมพิวเตอร์', 1),
(219, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020791-6', ' นางสาวชนาเนตร คำเพิงใจ', 'วิทยาการคอมพิวเตอร์', 1),
(220, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020806-9', ' นายวิทยา คงกระพันธุ์', 'วิทยาการคอมพิวเตอร์', 1),
(221, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020931-6', ' นายอัครเดช แก้วมณีโชติ', 'วิทยาการคอมพิวเตอร์', 1),
(222, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021264-4', ' นางสาวกนกพร ธนวัฒนากูล', 'วิทยาการคอมพิวเตอร์', 1),
(223, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021265-2', ' นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', 1),
(224, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021266-0', ' นายกิตติธัช ปลั่งกลาง', 'วิทยาการคอมพิวเตอร์', 1),
(225, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021270-9', ' นางสาวฑิตยา ศรีวุฒิทรัพย์', 'วิทยาการคอมพิวเตอร์', 1),
(226, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021273-3', ' นางสาวภควดี สุวรรณะ', 'วิทยาการคอมพิวเตอร์', 1),
(227, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021275-9', ' นายยศสรัล กิตติปฐมวิทย์', 'วิทยาการคอมพิวเตอร์', 1),
(228, '000123', 'Create', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021279-1', ' นายศักดิ์ยะวัชร สีกู่กา', 'วิทยาการคอมพิวเตอร์', 1),
(229, '322372', 'SOFTWARE ENGINEERING', 1, '2561', 2, NULL, NULL, NULL, NULL, ' 593020036-2', 'นางสาวอารีรัตน์ กัลยกรสกุล', 'วิทยาการคอมพิวเตอร์', 1),
(230, '000101', 'Eng Lv1', 17, '2562', 2, NULL, NULL, NULL, NULL, '593020404-9', 'นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', 1),
(231, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '583020330-1', ' นายณัฎฐพงค์ รัตนศิริพรหม', 'วิทยาการคอมพิวเตอร์', 1),
(232, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '583020370-9', ' นายอภิวัฒน์ เมฆวัน', 'วิทยาการคอมพิวเตอร์', 1),
(233, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020052-4', ' นายปภาวิชญ์ พาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(234, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020403-1', ' นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', 1),
(235, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020404-9', ' นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', 1),
(236, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020409-9', ' นางสาวจิตรลดา ปัตตาเทศา', 'วิทยาการคอมพิวเตอร์', 1),
(237, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020412-0', ' นางสาวชนิตา เกษมสุข', 'วิทยาการคอมพิวเตอร์', 1),
(238, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020418-8', ' นางสาวณัฐชยา แฝงเมืองคุก', 'วิทยาการคอมพิวเตอร์', 1),
(239, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020419-6', ' นายณัฐพงศ์ โภคาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(240, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020423-5', ' นางสาวณิชกานต์ ปัตลา', 'วิทยาการคอมพิวเตอร์', 1),
(241, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020425-1', ' นายธณัฐพงษ์ เค้ามาก', 'วิทยาการคอมพิวเตอร์', 1),
(242, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020432-4', ' นางสาวนธิภรณ์ พละพันธ์', 'วิทยาการคอมพิวเตอร์', 1),
(243, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020437-4', ' นางสาวประภัสสร จันทราษี', 'วิทยาการคอมพิวเตอร์', 1),
(244, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020440-5', ' นายพงศกร แซ่ตั้ง', 'วิทยาการคอมพิวเตอร์', 1),
(245, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020441-3', ' นายพงศกร นาคอก', 'วิทยาการคอมพิวเตอร์', 1),
(246, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020443-9', ' นายพชร สรภูมิ', 'วิทยาการคอมพิวเตอร์', 1),
(247, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020452-8', ' นายภูวเดช ผาปริญญา', 'วิทยาการคอมพิวเตอร์', 1),
(248, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020455-2', ' นายรัฐพล กิจวิวัฒน์กุล', 'วิทยาการคอมพิวเตอร์', 1),
(249, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020459-4', ' นางสาววศินี ชมชื่น', 'วิทยาการคอมพิวเตอร์', 1),
(250, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020462-5', ' นางสาววิลาวัณย์ ชินสงคราม', 'วิทยาการคอมพิวเตอร์', 1),
(251, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020463-3', ' นายวิษณุ พลไธสง', 'วิทยาการคอมพิวเตอร์', 1),
(252, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020466-7', ' นายศุภณัฐ บุญสารี', 'วิทยาการคอมพิวเตอร์', 1),
(253, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020467-5', ' นายสิทธิ สุทธิธรรม', 'วิทยาการคอมพิวเตอร์', 1),
(254, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020468-3', ' นายสุตชาติ ปุ๊กหมื่นไวย์', 'วิทยาการคอมพิวเตอร์', 1),
(255, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020470-6', ' นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', 1),
(256, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020474-8', ' นางสาวอุรชา ภูดิฐวัฒนโชค', 'วิทยาการคอมพิวเตอร์', 1),
(257, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020791-6', ' นางสาวชนาเนตร คำเพิงใจ', 'วิทยาการคอมพิวเตอร์', 1),
(258, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020806-9', ' นายวิทยา คงกระพันธุ์', 'วิทยาการคอมพิวเตอร์', 1),
(259, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593020931-6', ' นายอัครเดช แก้วมณีโชติ', 'วิทยาการคอมพิวเตอร์', 1),
(260, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021264-4', ' นางสาวกนกพร ธนวัฒนากูล', 'วิทยาการคอมพิวเตอร์', 1),
(261, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021265-2', ' นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', 1),
(262, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021266-0', ' นายกิตติธัช ปลั่งกลาง', 'วิทยาการคอมพิวเตอร์', 1),
(263, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021270-9', ' นางสาวฑิตยา ศรีวุฒิทรัพย์', 'วิทยาการคอมพิวเตอร์', 1),
(264, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021273-3', ' นางสาวภควดี สุวรรณะ', 'วิทยาการคอมพิวเตอร์', 1),
(265, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021275-9', ' นายยศสรัล กิตติปฐมวิทย์', 'วิทยาการคอมพิวเตอร์', 1),
(266, '322385', 'Software Quality Assurance', 1, '2561', 1, NULL, NULL, NULL, NULL, '593021279-1', ' นายศักดิ์ยะวัชร สีกู่กา', 'วิทยาการคอมพิวเตอร์', 1),
(267, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '583020330-1', ' นายณัฎฐพงค์ รัตนศิริพรหม', 'วิทยาการคอมพิวเตอร์', 1),
(268, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '583020370-9', ' นายอภิวัฒน์ เมฆวัน', 'วิทยาการคอมพิวเตอร์', 1),
(269, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020052-4', ' นายปภาวิชญ์ พาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(270, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020403-1', ' นางสาวกนกสุดา ดีแล้ว', 'วิทยาการคอมพิวเตอร์', 1),
(271, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020404-9', ' นางสาวกรรณิกา ตากิ่มนอก', 'วิทยาการคอมพิวเตอร์', 1),
(272, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020409-9', ' นางสาวจิตรลดา ปัตตาเทศา', 'วิทยาการคอมพิวเตอร์', 1),
(273, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020412-0', ' นางสาวชนิตา เกษมสุข', 'วิทยาการคอมพิวเตอร์', 1),
(274, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020418-8', ' นางสาวณัฐชยา แฝงเมืองคุก', 'วิทยาการคอมพิวเตอร์', 1),
(275, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020419-6', ' นายณัฐพงศ์ โภคาศรี', 'วิทยาการคอมพิวเตอร์', 1),
(276, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020423-5', ' นางสาวณิชกานต์ ปัตลา', 'วิทยาการคอมพิวเตอร์', 1),
(277, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020425-1', ' นายธณัฐพงษ์ เค้ามาก', 'วิทยาการคอมพิวเตอร์', 1),
(278, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020432-4', ' นางสาวนธิภรณ์ พละพันธ์', 'วิทยาการคอมพิวเตอร์', 1),
(279, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020437-4', ' นางสาวประภัสสร จันทราษี', 'วิทยาการคอมพิวเตอร์', 1),
(280, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020440-5', ' นายพงศกร แซ่ตั้ง', 'วิทยาการคอมพิวเตอร์', 1),
(281, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020441-3', ' นายพงศกร นาคอก', 'วิทยาการคอมพิวเตอร์', 1),
(282, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020443-9', ' นายพชร สรภูมิ', 'วิทยาการคอมพิวเตอร์', 1),
(283, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020452-8', ' นายภูวเดช ผาปริญญา', 'วิทยาการคอมพิวเตอร์', 1),
(284, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020455-2', ' นายรัฐพล กิจวิวัฒน์กุล', 'วิทยาการคอมพิวเตอร์', 1),
(285, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020459-4', ' นางสาววศินี ชมชื่น', 'วิทยาการคอมพิวเตอร์', 1),
(286, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020462-5', ' นางสาววิลาวัณย์ ชินสงคราม', 'วิทยาการคอมพิวเตอร์', 1),
(287, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020463-3', ' นายวิษณุ พลไธสง', 'วิทยาการคอมพิวเตอร์', 1),
(288, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020466-7', ' นายศุภณัฐ บุญสารี', 'วิทยาการคอมพิวเตอร์', 1),
(289, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020467-5', ' นายสิทธิ สุทธิธรรม', 'วิทยาการคอมพิวเตอร์', 1),
(290, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020468-3', ' นายสุตชาติ ปุ๊กหมื่นไวย์', 'วิทยาการคอมพิวเตอร์', 1),
(291, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020470-6', ' นายสุริยพงศ์ มอญขาม', 'วิทยาการคอมพิวเตอร์', 1),
(292, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020474-8', ' นางสาวอุรชา ภูดิฐวัฒนโชค', 'วิทยาการคอมพิวเตอร์', 1),
(293, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020791-6', ' นางสาวชนาเนตร คำเพิงใจ', 'วิทยาการคอมพิวเตอร์', 1),
(294, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020806-9', ' นายวิทยา คงกระพันธุ์', 'วิทยาการคอมพิวเตอร์', 1),
(295, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593020931-6', ' นายอัครเดช แก้วมณีโชติ', 'วิทยาการคอมพิวเตอร์', 1),
(296, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021264-4', ' นางสาวกนกพร ธนวัฒนากูล', 'วิทยาการคอมพิวเตอร์', 1),
(297, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021265-2', ' นายกษิดิศ ไกรศรีวรรธนะ', 'วิทยาการคอมพิวเตอร์', 1),
(298, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021266-0', ' นายกิตติธัช ปลั่งกลาง', 'วิทยาการคอมพิวเตอร์', 1),
(299, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021270-9', ' นางสาวฑิตยา ศรีวุฒิทรัพย์', 'วิทยาการคอมพิวเตอร์', 1),
(300, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021273-3', ' นางสาวภควดี สุวรรณะ', 'วิทยาการคอมพิวเตอร์', 1),
(301, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021275-9', ' นายยศสรัล กิตติปฐมวิทย์', 'วิทยาการคอมพิวเตอร์', 1),
(302, '322385', 'Software Quality Assurance', 2, '2562', 1, NULL, NULL, NULL, NULL, '593021279-1', ' นายศักดิ์ยะวัชร สีกู่กา', 'วิทยาการคอมพิวเตอร์', 1);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
