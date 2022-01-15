-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2022 at 11:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IS3`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'business'),
(3, 'design'),
(1, 'development'),
(4, 'health and fitness'),
(5, 'teaching');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `msg_id` int(11) NOT NULL,
  `auditor_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `image`, `content`, `description`, `level`, `price`, `rating`, `status`, `category`, `tutor_id`, `admin_id`) VALUES
(1, 'The Web Developer Bootcamp 2022', 'images/web.png', 'courseInfo/web(content).txt', 'courseInfo/web.txt', 'beginner', 500, 5, 1, 1, 11, 5),
(2, 'iOS & Swift - The Complete iOS App Development Bootcamp', 'images/Swift-Development-for-iOS.jpg', 'courseInfo/iOS & Swift - The Complete iOS App Development Bootcamp(content).txt', 'courseInfo/iOS & Swift - The Complete iOS App Development Bootcamp.txt', 'Intermediate', 1500, 0, 1, 1, 11, 5),
(3, 'Learn Python Programming Masterclass', 'images/Learn Python Programming Masterclass.jpg', 'courseInfo/Learn Python Programming Masterclass(content).txt', 'courseInfo/Learn Python Programming Masterclass.txt', 'beginner', 3000, 3, 1, 1, 11, 5),
(4, 'WordPress Development with Bootstrap: The Complete Course', 'images/WordPress Development with Bootstrap- The Complete Course.jpeg', 'courseInfo/WordPress Development with Bootstrap- The Complete Course(content).txt', 'courseInfo/WordPress Development with Bootstrap- The Complete Course.txt', 'Beginner', 2500, 0, 1, 1, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`learner_id`, `course_id`, `progress`) VALUES
(14, 1, 0),
(14, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `comment` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `user_type`) VALUES
(1, 'admin'),
(2, 'learner'),
(3, 'auditor'),
(4, 'tutor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(62) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_ans` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `tutor_status` int(11) DEFAULT NULL,
  `admin_rank` int(11) DEFAULT NULL,
  `tutor_cv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `fname`, `email`, `password`, `security_ans`, `picture`, `tutor_status`, `admin_rank`, `tutor_cv`) VALUES
(1, 1, 'salma', 'salma@gmail.com', '123', 'Rusty', 'images/salma.jpg', NULL, 1, NULL),
(2, 1, 'Basma', 'basma@gmail.com', '234', 'King', 'images/basma.jpg', NULL, 1, NULL),
(3, 1, 'Yosr', 'yosr@gmail.com', '345', 'Oreo', 'images/yosr.jpg', NULL, 1, NULL),
(4, 1, 'Hagar', 'hagar@gmail.com', '456', 'Koky', 'images/hagar.jpg', NULL, 1, NULL),
(5, 1, 'Laila', 'laila@gmail.com', 'H7l2xraq', 'Caramel', 'images/laila.jpg', NULL, 1, NULL),
(6, 1, 'Mohamed', 'mohamed@gmail.com', '678', 'Copper', 'images/mohamed.jpeg', NULL, 2, NULL),
(7, 1, 'Mostafa', 'mostafa@gmail.com', '789', 'Max', 'images/mostafa.jpeg', NULL, 2, NULL),
(8, 1, 'kamal', 'kamal@gmail.com', '342', 'simba', 'images/kamal.png', NULL, 2, NULL),
(11, 4, 'Kawthar', 'Kawthar@gmail.com', '123', 'koko', NULL, NULL, NULL, NULL),
(14, 2, 'Suzan', 'Suzan@gmail.com', '123', 'soso', 'images/suzan.jpeg', NULL, NULL, NULL),
(15, 2, 'mai', 'mai@gmail.com', '345', 'sandy', NULL, NULL, NULL, NULL),
(16, 2, 'sondos', 'sondos@gmail.com', '345', 'spongy', NULL, NULL, NULL, NULL),
(18, 4, 'kariman', 'kariman@gmail.com', '345', 'jojo', NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `ques_id` (`ques_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`msg_id`,`auditor_id`),
  ADD KEY `auditor_id` (`auditor_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`learner_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`learner_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`ques_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `message` (`msg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`auditor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
