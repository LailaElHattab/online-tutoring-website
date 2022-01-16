-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2022 at 07:47 PM
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
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(50) NOT NULL,
  `message` varchar(255) NOT NULL
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
(3, 'Learn Python Programming Masterclass', 'images/Python.jpg', 'courseInfo/Learn Python Programming Masterclass(content).txt', 'courseInfo/Learn Python Programming Masterclass.txt', 'beginner', 3000, 3, 1, 1, 11, 5),
(4, 'WordPress Development with Bootstrap: The Complete Course', 'images/WordPress.jpeg', 'courseInfo/WordPress Development with Bootstrap- The Complete Course(content).txt', 'courseInfo/WordPress Development with Bootstrap- The Complete Course.txt', 'Beginner', 2500, 0, 1, 1, 11, 5),
(8, 'The Business Intelligence Analyst Course 2022', 'images/intelligence.jpeg', 'courseInfo/intelligence(content).txt', 'courseInfo/intelligence.txt', 'intermediate', 500, 5, 1, 2, 24, NULL),
(9, 'Teach English Online: find students and start teaching now', 'images/teaching.jpeg', 'courseInfo/teaching(content).txt', 'courseInfo/teaching.txt', 'Beginner', 200, 3, 1, 5, 23, NULL),
(10, 'Teaching English as a Foreign Language TEFL', 'images/teaching2.jpeg', 'courseInfo/teaching2(content).txt', 'courseInfo/teaching2.txt', 'Advanced', 3000, 5, 1, 5, 23, NULL),
(11, 'Reasonable Teaching: The 13x4 to Master The Art of Teaching', 'images/teaching3.jpeg', 'courseInfo/teaching3(content).txt', 'courseInfo/teaching3.txt', 'Intermediate', 250, 3, 1, 5, 23, NULL),
(12, 'Learn Teaching Tools For Effective On Line Teaching', 'images/teaching4.jpeg', 'courseInfo/teaching4(content).txt', 'courseInfo/teaching4.txt', 'intermediate', 3560, 4, 1, 5, 22, NULL),
(13, 'Microsoft Power BI Desktop for Business Intelligence', 'images/business2.jpeg', 'courseInfo/business2(content).txt', 'courseInfo/business2.txt', 'advanced', 3000, 3, 1, 2, 21, NULL),
(14, 'PMP Exam Prep Seminar - 2021 Exam Content with 35 PDUs', 'images/business3.jpeg', 'courseInfo/business3(content).txt', 'courseInfo/business3.txt', 'advanced', 300, 4, 1, 2, 18, NULL),
(15, 'Tableau 2020 A-Z: Hands-On Tableau Training for Data Science', 'images/business4.jpeg', 'courseInfo/business4(content).txt', 'courseInfo/business4.txt', 'intermediate', 300, 0, 0, 2, 18, NULL),
(16, 'The Complete Fitness & Health Masterclass - 21 Courses in 1', 'images/fitness1.jpeg', 'courseInfo/fitness1(content).txt', 'courseInfo/fitness1.txt', 'beginner', 300, 4, 1, 4, 21, NULL),
(17, 'A Total Beginners Guide to Wellness, Health and Fitness', 'images/fitness2.jpeg', 'courseInfo/fitness2(content).txt', 'courseInfo/fitness2.txt', 'intermediate', 3000, 0, 0, 4, 21, NULL),
(18, 'Use Your Health & Fitness Expertise to Earn A Living Online', 'images/fitness3.jpeg', 'courseInfo/fitness3(content).txt', 'courseInfo/fitness3.txt', 'advanced', 300, 0, 0, 4, 21, NULL),
(19, 'Working With Seniors In Health and Fitness Related Fields', 'images/fitness4.jpeg', 'courseInfo/fitness4(content).txt', 'courseInfo/fitness4.txt', 'beginner', 300, 4, 1, 4, 21, NULL),
(20, 'Figma UI UX Design Essentials', 'images/desgin1.jpeg', 'courseInfo/desgin1(content).txt', 'courseInfo/desgin1.txt', 'beginner', 1000, 4, 1, 3, 11, NULL),
(21, 'The Complete Graphic Design Theory for Beginners Course', 'images/desgin2.jpeg', 'courseInfo/desgin2(content).txt', 'courseInfo/desgin2.txt', 'beginner', 3000, 0, 0, 3, 11, NULL),
(22, 'Master Digital Product Design: UX Research & UI Design', 'images/desgin3.jpeg', 'courseInfo/desgin3(content).txt', 'courseInfo/desgin3.txt', 'beginner', 5500, 0, 0, 3, 11, NULL),
(23, 'UX Design & User Experience Design Course - Theory Only', 'images/desgin4.png', 'courseInfo/desgin4(content).txt', 'courseInfo/desgin4.txt', 'advanced', 3000, 5, 1, 3, 11, NULL);

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
  `tutor_cv` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `fname`, `email`, `password`, `security_ans`, `picture`, `tutor_status`, `admin_rank`, `tutor_cv`, `status`) VALUES
(1, 1, 'salma', 'salma@gmail.com', '202cb962ac59075b964b07152d234b70', 'Rusty', 'images/salma.jpg', NULL, 1, NULL, ''),
(2, 1, 'Basma', 'basma@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', 'King', 'images/basma.jpg', NULL, 1, NULL, ''),
(3, 1, 'Yosr', 'yosr@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'Oreo', 'images/yosr.jpg', NULL, 1, NULL, ''),
(4, 1, 'Hagar', 'hagar@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Koky', 'images/hagar.jpg', NULL, 1, NULL, ''),
(5, 1, 'Laila', 'laila@gmail.com', '202cb962ac59075b964b07152d234b70', 'Caramel', 'images/laila.jpg', NULL, 1, NULL, ''),
(6, 1, 'Mohamed', 'mohamed@gmail.com', '9fe8593a8a330607d76796b35c64c600', 'Copper', 'images/mohamed.jpeg', NULL, 2, NULL, ''),
(7, 1, 'Mostafa', 'mostafa@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', 'Max', 'images/mostafa.jpeg', NULL, 2, NULL, ''),
(8, 1, 'kamal', 'kamal@gmail.com', '58238e9ae2dd305d79c2ebc8c1883422', 'simba', 'images/kamal.png', NULL, 2, NULL, ''),
(11, 4, 'Kawthar', 'Kawthar@gmail.com', '202cb962ac59075b964b07152d234b70', 'koko', 'images/kawthar.png', NULL, NULL, NULL, ''),
(14, 2, 'Suzan', 'Suzan@gmail.com', '202cb962ac59075b964b07152d234b70', 'soso', 'images/suzan.jpeg', NULL, NULL, NULL, ''),
(15, 2, 'mai', 'mai@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'sandy', 'images/mai.jpeg', NULL, NULL, NULL, ''),
(16, 2, 'sondos', 'sondos@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'spongy', 'images/sondos.jpeg', NULL, NULL, NULL, ''),
(18, 4, 'kariman', 'kariman@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'jojo', 'images/kariman.jpeg', 1, NULL, NULL, ''),
(21, 4, 'karim', 'Karim@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Lola', 'images/karim.jpeg', 0, NULL, NULL, NULL),
(22, 4, 'ather', 'ather@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'soka', 'images/ather.jpeg', 1, NULL, NULL, NULL),
(23, 4, 'fatima', 'fatima@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'mocha', NULL, 0, NULL, NULL, NULL),
(24, 4, 'mariam', 'mariam@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Caramel', NULL, 0, NULL, NULL, NULL),
(25, 2, 'faten', 'faten@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'koko', NULL, NULL, NULL, NULL, NULL),
(26, 2, 'Ibrahim', 'Ibrahim@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'soty', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
