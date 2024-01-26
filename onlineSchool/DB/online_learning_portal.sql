-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 11:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_learning_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `c_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `deadline` datetime NOT NULL,
  `file` text NOT NULL,
  `inc_title` text NOT NULL,
  `inc_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `course_code` varchar(6) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`course_code`, `c_id`) VALUES
('CSE370', 451666),
('CSE340', 989843),
('CSE340', 947374),
('CSE330', 958825);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `c_id` int(11) NOT NULL,
  `c_type` text NOT NULL,
  `update_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`c_id`, `c_type`, `update_time`) VALUES
(451666, 'exam', '05:43:30'),
(947374, 'exam', '04:53:21'),
(958825, 'exam', '07:33:50'),
(989843, 'exam', '09:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(11) NOT NULL,
  `course_name` text NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_name`, `faculty_id`) VALUES
('CSE330', 'Numerical Method', 1),
('CSE340', 'COMPUTER ARCHITECTURE', 1),
('CSE370', 'Database Management', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `user_id` int(11) NOT NULL,
  `course_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `c_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `max_attempt` int(11) NOT NULL,
  `examStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`c_id`, `name`, `date`, `duration`, `start_time`, `end_time`, `max_attempt`, `examStatus`) VALUES
(451666, 'Quiz-1', '2022-04-26', 2, '21:43:00', '21:45:00', 3, 'ended'),
(947374, 'QUIZ2', '2022-04-26', 30, '20:53:00', '21:53:00', 3, 'active'),
(958825, 'QUIZ1', '2022-05-27', 1, '23:33:00', '23:35:00', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `user_id` int(11) NOT NULL,
  `rank` text NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`user_id`, `rank`, `department`) VALUES
(1, 'Lecturer', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_videos`
--

CREATE TABLE `lecture_videos` (
  `c_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `file` text NOT NULL,
  `inc_title` text NOT NULL,
  `inc_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participates`
--

CREATE TABLE `participates` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attempts` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `correct_option` text NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `c_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`, `marks`) VALUES
(175965, 947374, 'jujutsu kaisen', 'opt1', 'opt2', 'opt3', 'opt4', 'option_4', 1),
(448208, 958825, 'choose the right option', 'opt1', 'opt2', 'opt3', 'opt4', 'option_2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'faculty1', 'faculty1@gmail.com', 'faculty1', 'faculty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD KEY `course_code` (`course_code`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD UNIQUE KEY `c_id_2` (`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lecture_videos`
--
ALTER TABLE `lecture_videos`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `participates`
--
ALTER TABLE `participates`
  ADD KEY `exam_id` (`c_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `exam_id` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contents` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contents` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrolls_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contents` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `lecture_videos`
--
ALTER TABLE `lecture_videos`
  ADD CONSTRAINT `lecture_videos_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contents` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contents` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participates_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contents` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
