-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 06:41 AM
-- Server version: 5.7.20-log
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancemanager`
--
CREATE DATABASE IF NOT EXISTS `attendancemanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `attendancemanager`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sub_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `att` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `sub_id`, `stu_id`, `att`) VALUES
(5, '2019-01-30', 1, 5, 1),
(9, '2018-05-30', 1, 5, 1),
(13, '2019-05-30', 1, 5, 1),
(17, '2019-10-10', 1, 5, 1),
(21, '2019-10-24', 1, 5, 1),
(24, '2019-10-10', 1, 5, 1),
(25, '2020-01-01', 1, 5, 1),
(26, '2020-01-01', 1, 8, 1),
(27, '2020-01-01', 1, 9, 1),
(28, '2020-01-01', 1, 5, 0),
(29, '2020-01-01', 1, 8, 1),
(30, '2020-01-01', 1, 9, 1),
(31, '2020-01-01', 1, 5, 0),
(32, '2020-01-01', 1, 8, 1),
(33, '2020-01-01', 1, 9, 1),
(34, '2020-01-01', 1, 5, 0),
(35, '2020-01-01', 1, 8, 1),
(36, '2020-01-01', 1, 9, 1),
(37, '2020-01-01', 1, 5, 1),
(38, '2020-01-01', 1, 8, 1),
(39, '2020-01-01', 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'MCA I'),
(2, 'CSE'),
(3, 'MCA II'),
(4, 'MCA III');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `regno` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `add1` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `regno`, `fname`, `lname`, `mobno`, `dob`, `email_id`, `add1`, `city`, `state`) VALUES
(1, 205118001, 'mudit', 'gupta', '8905809991', '1991-05-20', 'jainavi30@gmail.com', 'banthia', 'Bikaner', 'Rajasthan'),
(2, 205117001, 'Sanjeev', 'aaaa', '8905809991', '1997-09-30', 'jainavi30@gmail.com', 'aaaaaa', 'aaaa', 'aaaa'),
(3, 205119025, 'Basharat', 'nawaj', '8905809991', '1999-01-30', 'jainavi30#@gmail.com', 'aaaa', 'aaa', 'aa'),
(4, 205119015, 'aa', '', '8905809991', '1999-05-20', 'jainavi30@gmail.com', 'aaaa', 'aaaaaa', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_branch_subject`
--

CREATE TABLE `faculty_branch_subject` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_branch_subject`
--

INSERT INTO `faculty_branch_subject` (`id`, `faculty_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(16) NOT NULL,
  `type_id` int(11) NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type_id`, `login_count`) VALUES
(1, 'admin', 'admin', 1, 1),
(2, '205119019', '1234', 3, 9),
(3, '205118001', '1234', 2, 14),
(4, '205119078', '1234', 3, 3),
(5, '205119007', 'eshhay991ore', 3, 1),
(6, '205118019', 'eshesh991ore', 3, 1),
(7, '205119051', '1234', 3, 4),
(8, '205117001', '1234', 2, 4),
(9, '205118031', '1234', 3, 3),
(10, '205119025', 'aa30991aaa', 2, 1),
(11, '205119015', 'aaa20991aaa', 2, 1),
(12, '205119018', 'aaaant991aaa', 3, 1),
(13, '205119053', 'aaaaaa991aaa', 3, 1),
(14, '205119056', 'aaaaaa991aaa', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `outof` int(11) NOT NULL,
  `marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `stu_id`, `sub_id`, `date`, `outof`, `marks`) VALUES
(4, 5, 1, '2019-08-30', 50, 25),
(8, 5, 1, '2019-05-30', 50, 50),
(13, 5, 1, '2019-05-30', 50, 5),
(16, 5, 1, '2019-10-10', 50, 5),
(19, 5, 1, '2019-10-30', 50, 5.55),
(22, 5, 1, '2019-10-10', 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(75) NOT NULL,
  `lname` varchar(75) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `mobno` varchar(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `rollno` int(9) NOT NULL,
  `add1` varchar(200) NOT NULL,
  `add2` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `branch` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `father_name`, `mother_name`, `mobno`, `email_id`, `rollno`, `add1`, `add2`, `city`, `state`, `branch`) VALUES
(5, 'Lakshay', 'Mitha', 'aaaa', 'aa', '8905809991', 'jainavi30@gmail.com', 205119051, 'aaaa', 'aaa', 'aaaaa', 'aaaaa', 1),
(8, 'aaaaa', '', 'aaaaaa', 'aaaaa', '8905809991', 'jainavi30@gmail.com', 205119053, 'aaaaa', 'aaaaa', 'aaaa', 'aaaa', 1),
(9, 'aaaaa', '', 'aaaaaa', 'aaaaa', '8905809991', 'jainavi30@gmail.com', 205119056, 'aaaaa', 'aaaaa', 'aaaa', 'aaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `max_marks` int(11) NOT NULL,
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `max_marks`, `branch`) VALUES
(1, 'Data Structure', 100, 1),
(2, 'Computer Organisation', 100, 1),
(3, 'Probabelity and Statistics', 100, 1),
(4, 'Mathematical Foundations', 100, 1),
(5, 'Accounts', 100, 1),
(6, 'Operating system', 100, 3),
(8, 'Database', 100, 3),
(9, 'Object Oriented Programming', 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `path_to_open` varchar(500) NOT NULL,
  `newpass_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `path_to_open`, `newpass_path`) VALUES
(1, 'admin', 'users_templates/admin', 'users_templates/admin'),
(2, 'faculty', 'users_templates/faculty', 'users_templates/new_password.html'),
(3, 'student', 'users_templates/student', 'users_templates/new_password.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regno` (`regno`);

--
-- Indexes for table `faculty_branch_subject`
--
ALTER TABLE `faculty_branch_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);
