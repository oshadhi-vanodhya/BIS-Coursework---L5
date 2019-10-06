-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2017 at 04:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_id` int(5) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `lecturer_fname` char(100) DEFAULT NULL,
  `lecturer_lname` char(100) DEFAULT NULL,
  `lecturer_office` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `username`, `lecturer_fname`, `lecturer_lname`, `lecturer_office`) VALUES
(1, 'Abarnah', 'Abarnah', 'Kirupananda', '2'),
(2, 'Janice', 'Janice', 'Abeykoon', '2');

-- --------------------------------------------------------

--
-- Table structure for table `llogin`
--

CREATE TABLE `llogin` (
  `lecturer_id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `upass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `llogin`
--

INSERT INTO `llogin` (`lecturer_id`, `username`, `upass`) VALUES
(1, 'Abarnah', '123'),
(2, 'Janice', '123');

-- --------------------------------------------------------

--
-- Table structure for table `psession`
--

CREATE TABLE `psession` (
  `session_no` int(2) NOT NULL,
  `session_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `task_to_do` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psession`
--

INSERT INTO `psession` (`session_no`, `session_date`, `start_time`, `end_time`, `task_to_do`) VALUES
(5601, '1996-02-15', NULL, NULL, NULL),
(5602, '2017-05-02', '03:16:14', '05:17:16', 'well done.'),
(5603, '2017-05-02', '03:16:14', '05:17:16', 'well done.'),
(5701, '1996-03-15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `psession_student`
--

CREATE TABLE `psession_student` (
  `session_no` int(2) NOT NULL,
  `student_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psession_student`
--

INSERT INTO `psession_student` (`session_no`, `student_id`) VALUES
(5601, 56),
(5603, 56),
(5701, 57);

-- --------------------------------------------------------

--
-- Table structure for table `slogin`
--

CREATE TABLE `slogin` (
  `student_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slogin`
--

INSERT INTO `slogin` (`student_id`, `username`, `upass`) VALUES
(1, 'oshi', '123'),
(2, 'abc', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(5) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `student_fname` char(100) DEFAULT NULL,
  `student_lname` char(100) DEFAULT NULL,
  `lecturer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `username`, `student_fname`, `student_lname`, `lecturer_id`) VALUES
(56, 'stava', 'Stavanger', 'Nowa', 2),
(57, 'Oshi', 'Oshadhi', 'Vanodhya', 1),
(58, 'Sanu', 'Sanushka', 'Amani', 1),
(59, 'Thara', 'Tharukie', 'Ayodhya', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `llogin`
--
ALTER TABLE `llogin`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indexes for table `psession`
--
ALTER TABLE `psession`
  ADD PRIMARY KEY (`session_no`);

--
-- Indexes for table `psession_student`
--
ALTER TABLE `psession_student`
  ADD PRIMARY KEY (`session_no`,`student_id`),
  ADD UNIQUE KEY `session_no` (`session_no`),
  ADD KEY `sid` (`student_id`);

--
-- Indexes for table `slogin`
--
ALTER TABLE `slogin`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `llogin`
--
ALTER TABLE `llogin`
  MODIFY `lecturer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slogin`
--
ALTER TABLE `slogin`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `psession_student`
--
ALTER TABLE `psession_student`
  ADD CONSTRAINT `psession_student_ibfk_1` FOREIGN KEY (`session_no`) REFERENCES `psession` (`session_no`),
  ADD CONSTRAINT `psession_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
