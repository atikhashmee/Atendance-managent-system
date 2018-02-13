-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2017 at 04:03 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_course_to_teacher`
--

CREATE TABLE `assign_course_to_teacher` (
  `ass_id` int(11) NOT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `schedule_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_course_to_teacher`
--

INSERT INTO `assign_course_to_teacher` (`ass_id`, `teacher_id`, `course_id`, `section_id`, `schedule_id`) VALUES
(1, '2', '1', '1', '1'),
(2, '2', '2', '2', '2'),
(3, '2', '1', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `assign_student`
--

CREATE TABLE `assign_student` (
  `assign_st_id` int(11) NOT NULL,
  `student_id` int(255) DEFAULT NULL,
  `courses_id` int(255) DEFAULT NULL,
  `sec_id` int(255) DEFAULT NULL,
  `sched_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_student`
--

INSERT INTO `assign_student` (`assign_st_id`, `student_id`, `courses_id`, `sec_id`, `sched_id`) VALUES
(1, 1, 1, 1, 1),
(2, 6, 1, 1, 1),
(3, 7, 1, 1, 1),
(4, 8, 1, 1, 1),
(5, 6, 2, 2, 2),
(6, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attandence`
--

CREATE TABLE `attandence` (
  `attnd_id` int(11) NOT NULL,
  `crse_name` varchar(255) NOT NULL,
  `sec_name` varchar(200) NOT NULL,
  `attnd_date` varchar(200) NOT NULL,
  `st_id` varchar(200) NOT NULL,
  `st_attnd` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attandence`
--

INSERT INTO `attandence` (`attnd_id`, `crse_name`, `sec_name`, `attnd_date`, `st_id`, `st_attnd`) VALUES
(13, '1', '1', '2017-10-07', '1', 0),
(14, '1', '1', '2017-10-07', '6', 1),
(15, '1', '1', '2017-10-07', '7', 1),
(16, '1', '1', '2017-10-07', '8', 0),
(17, '1', '1', '2017-10-08', '1', 0),
(18, '1', '1', '2017-10-08', '6', 1),
(19, '1', '1', '2017-10-08', '7', 1),
(20, '1', '1', '2017-10-08', '8', 1),
(25, '1', '1', '2017-10-10', '1', 0),
(26, '1', '1', '2017-10-10', '6', 1),
(27, '1', '1', '2017-10-10', '7', 1),
(28, '1', '1', '2017-10-10', '8', 1),
(29, '2', '2', '2017-10-08', '6', 1),
(30, '1', '1', '2017-10-09', '1', 1),
(31, '1', '1', '2017-10-09', '6', 1),
(32, '1', '1', '2017-10-09', '7', 0),
(33, '1', '1', '2017-10-09', '8', 0),
(35, '2', '2', '2017-10-13', '6', 1),
(36, '1', '1', '2017-10-13', '1', 1),
(37, '1', '1', '2017-10-13', '6', 1),
(38, '1', '1', '2017-10-13', '7', 1),
(39, '1', '1', '2017-10-13', '8', 1),
(40, '1', '1', '2017-10-04', '1', 1),
(41, '1', '1', '2017-10-04', '6', 0),
(42, '1', '1', '2017-10-04', '7', 1),
(43, '1', '1', '2017-10-04', '8', 0),
(52, '1', '1', '2017-10-12', '1', 1),
(53, '1', '1', '2017-10-12', '6', 0),
(54, '1', '1', '2017-10-12', '7', 1),
(55, '1', '1', '2017-10-12', '8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_code` varchar(200) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `department` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_code`, `c_name`, `department`) VALUES
(1, 'ENG 101', 'Basic English ', 4),
(2, 'CSC 183', 'Fundamental of computer ', 1),
(3, 'MAT 107', 'Basic Mathematics ', 1),
(4, 'MAT 147', 'Applied Calculus ', 1),
(5, 'BAN 101', 'Bangla Language', 4);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `de_id` int(11) NOT NULL,
  `de_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`de_id`, `de_name`) VALUES
(1, 'Science'),
(2, 'Arts'),
(3, 'Commerce'),
(4, 'General ');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` int(11) NOT NULL,
  `s_time_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`s_id`, `s_time_name`) VALUES
(1, '8.30-9.30'),
(2, '10.35-11.40'),
(3, '11.45-12.40'),
(4, '1.20-2.30'),
(5, '3.35-4.40'),
(6, '4.45-5.40'),
(7, '9.35-10.30');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sec_id` int(11) NOT NULL,
  `sec_name` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sec_id`, `sec_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_pass` varchar(200) NOT NULL,
  `role` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_pass`, `role`) VALUES
(1, 'stu1', '123456', 2),
(2, 'te1', '123456', 1),
(3, 'admin', '123456', 0),
(4, 'te2', '123456', 1),
(5, 'te3', '123456', 1),
(6, 'stu2', '123456', 2),
(7, 'stu3', '123456', 2),
(8, 'stu4', '123456', 2),
(9, 'stu5', '123456', 2),
(10, 'stu6', '123456', 2),
(11, 'stu7', '123456', 2),
(12, 'stu8', '123456', 2),
(13, 'stu9', '123456', 2),
(14, 'stu10', '123456', 2),
(15, 'stu11', '123456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_id`, `full_name`, `date_of_birth`, `gender`, `email`, `phone`, `adress`) VALUES
(1, 1, 'student1', '2017-10-12', 'male', 'atikhashmee6235@gmail.com', '017366767877', 'Shtkhirea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_course_to_teacher`
--
ALTER TABLE `assign_course_to_teacher`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `assign_student`
--
ALTER TABLE `assign_student`
  ADD PRIMARY KEY (`assign_st_id`);

--
-- Indexes for table `attandence`
--
ALTER TABLE `attandence`
  ADD PRIMARY KEY (`attnd_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_course_to_teacher`
--
ALTER TABLE `assign_course_to_teacher`
  MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assign_student`
--
ALTER TABLE `assign_student`
  MODIFY `assign_st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attandence`
--
ALTER TABLE `attandence`
  MODIFY `attnd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
