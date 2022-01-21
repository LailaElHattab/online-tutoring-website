-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2022 at 06:37 PM
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
(2, 'Business'),
(3, 'Design'),
(1, 'Development'),
(4, 'Health and Fitness'),
(5, 'Teaching');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `msg_id` int(11) NOT NULL,
  `auditor_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`msg_id`, `auditor_id`, `content`) VALUES
(106, 28, 'harsh'),
(112, 28, 'Inappropriate ');

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
(4, 'WordPress Development with Bootstrap: The Complete Course', 'images/WordPress.jpeg', 'courseInfo/wordPress(content).txt', 'courseInfo/wordpress.txt', 'Beginner', 2500, 0, 1, 1, 11, 5),
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
(21, 'The Complete Graphic Design Theory for Beginners Course', 'images/desgin2.jpeg', 'courseInfo/desgin2(content).txt', 'courseInfo/desgin2.txt', 'beginner', 3000, 0, 1, 3, 11, NULL),
(22, 'Master Digital Product Design: UX Research & UI Design', 'images/desgin3.jpeg', 'courseInfo/desgin3(content).txt', 'courseInfo/desgin3.txt', 'beginner', 5500, 0, 0, 3, 11, NULL),
(23, 'UX Design & User Experience Design Course - Theory Only', 'images/desgin4.png', 'courseInfo/desgin4(content).txt', 'courseInfo/desgin4.txt', 'advanced', 3000, 5, 1, 3, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`learner_id`, `course_id`) VALUES
(14, 1),
(14, 2),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 13),
(15, 1),
(15, 9),
(15, 12),
(15, 13),
(15, 16),
(16, 9),
(25, 9),
(25, 20),
(26, 9);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `learner_id`, `course_id`, `comment`, `rating`) VALUES
(1, 14, 1, 'This course is great', 5),
(12, 14, 2, 'The course is really helpful', 4),
(13, 14, 13, 'interesting', 3),
(15, 25, 9, 'The course was very comprehensive and easy to understand. The instructors made sure that they are giving the information in a way that wont make me confused.', 5),
(16, 15, 9, 'I loved the course! And I am giving it 5 stars even though I do have a few comments. It is a well-rounded course but if you are here to learn teaching, there may be other courses out there.', 5),
(17, 26, 9, 'Thanks fatima for the value. Thanks for being an incredible instructor showing & proving there is still such a human being trying on his own best to deliver something great to our mother world.', 4),
(18, 16, 9, 'Started as very exciting but turned into out of date content. The title is so misleading, unfortunately. Lot of modules were designed in 2020 and not updated to the huge change happened in 2021', 2),
(19, 14, 9, 'This course should be broken into sections with specific topics. I am void of a certificate for my job. What a joke of a course. It was good but lacked focus.', 1),
(20, 15, 12, 'The course is good, but as in everything there are outdated lessons. There is no support from instructor, but other students help a lot answering questions.', 2),
(21, 15, 1, 'The course was perfect. I was a complete beginner in programming in any language but the course has taught me fundamentals of programming through through Python and made me proficient in the language.', 4),
(22, 15, 16, 'Thank you, Thank youuu! I feel like a new person after this course. I am more energetic and definitely will recommend it to others', 4);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL,
  `seen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sent_by`, `received_by`, `message`, `createdAt`, `seen`) VALUES
(77, 2, 5, 'hello laila', '2022-01-17 03:35:03pm', 1),
(80, 5, 2, 'hello basma', '2022-01-17 03:48:41pm', 1),
(88, 2, 5, 'i hope you are fine', '2022-01-17 06:31:36pm', 1),
(89, 5, 2, 'I\'m doing great thank you', '2022-01-17 06:34:25pm', 1),
(101, 28, 5, 'hi Laila', '2022-01-18 07:52:08pm', 1),
(102, 28, 5, 'how are youuu?', '2022-01-18 07:52:18pm', 1),
(103, 5, 28, 'I am good ', '2022-01-21 04:08:09am', 1),
(106, 5, 2, 'you crazy', '2022-01-21 04:15:22am', 1),
(109, 5, 6, 'hi mohamed', '2022-01-21 04:27:07am', NULL),
(111, 5, 28, 'good evening', '2022-01-21 05:05:27am', 1),
(112, 5, 6, 'how are you', '2022-01-21 05:08:08am', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `createdAt` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `learner_id`, `createdAt`, `details`) VALUES
(7, 14, '2022-01-17 03:35:03pm', '750'),
(8, 15, '2022-01-21 03:04:00am', '3560'),
(9, 15, '2022-01-21 03:10:52am', '3000'),
(10, 15, '2022-01-21 03:14:13am', '500'),
(11, 15, '2022-01-21 03:16:29am', '300');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseItem`
--

CREATE TABLE `purchaseItem` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchaseItem`
--

INSERT INTO `purchaseItem` (`id`, `purchase_id`, `course_id`) VALUES
(1, 7, 8),
(2, 7, 11),
(7, 8, 12),
(8, 9, 13),
(9, 10, 1),
(10, 11, 16);

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
(11, 4, 'Kawthar', 'Kawthar@gmail.com', '202cb962ac59075b964b07152d234b70', 'koko', 'images/kawthar.png', 1, NULL, NULL, ''),
(14, 2, 'Suzan', 'Suzan@gmail.com', '202cb962ac59075b964b07152d234b70', 'soso', 'images/suzan.jpeg', NULL, NULL, NULL, ''),
(15, 2, 'mai', 'mai@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'sandy', 'images/mai.jpeg', NULL, NULL, NULL, ''),
(16, 2, 'sondos', 'sondos@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'spongy', 'images/sondos.jpeg', NULL, NULL, NULL, ''),
(18, 4, 'kariman', 'kariman@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'jojo', 'images/kariman.jpeg', 1, NULL, NULL, ''),
(21, 4, 'karim', 'Karim@gmail.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'Lola', 'images/karim.jpeg', 0, NULL, NULL, NULL),
(22, 4, 'ather', 'ather@gmail.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'soka', 'images/ather.jpeg', 1, NULL, NULL, NULL),
(23, 4, 'fatima', 'fatima@gmail.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'mocha', NULL, 0, NULL, NULL, NULL),
(24, 4, 'mariam', 'mariam@gmail.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'Caramel', NULL, 0, NULL, NULL, NULL),
(25, 2, 'faten', 'faten@gmail.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', 'koko', NULL, NULL, NULL, NULL, NULL),
(26, 2, 'Ibrahim', 'Ibrahim@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'soty', NULL, NULL, NULL, NULL, NULL),
(28, 3, 'Maha', 'maha@gmail.com', '202cb962ac59075b964b07152d234b70', 'soty', 'images/maha.jpeg', NULL, NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`sent_by`),
  ADD KEY `user2_id` (`received_by`),
  ADD KEY `received_by` (`received_by`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `purchaseItem`
--
ALTER TABLE `purchaseItem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchaseItem`
--
ALTER TABLE `purchaseItem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`received_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`sent_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchaseItem`
--
ALTER TABLE `purchaseItem`
  ADD CONSTRAINT `purchaseitem_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchaseitem_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
