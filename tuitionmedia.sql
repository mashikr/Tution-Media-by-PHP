-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 11:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuitionmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `username`, `name`, `phone`, `email`, `profession`, `address`, `image`, `status`) VALUES
(1, 'sony', 'Saif Sony', '018147xxxxx', 'sony@gmail.com', 'job', 'Kabirhat,Noakhali', 'img/sony.jpg', 'set'),
(2, 'abul', NULL, '01712327242', NULL, NULL, NULL, NULL, 'unset'),
(3, 'rahima', NULL, '018147', NULL, NULL, NULL, NULL, 'unset');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `days` int(3) NOT NULL,
  `salary` int(5) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `content`, `days`, `salary`, `location`, `date`, `time`, `status`) VALUES
(4, 'forhad', '9 (Science Group)', 'Teacher need for class 9', 4, 2000, 'Munsirhat,Senbagh,Noakhali', '2020-03-04', '10:56:46', 'pending'),
(7, 'sony', '11 (Business Group)', 'Teacher need for class 11', 4, 3500, 'Cowmuni,Begumganj,Noakhali', '2020-03-04', '12:12:28', 'pending'),
(8, 'asif2', '11 (Science Group)', 'Teacher need for class 11', 3, 3000, 'Chatkhil bazar,Chatkhil,Noakhali', '2020-03-11', '22:02:00', 'pending'),
(9, 'asif2', '5', 'Teacher need for class 5', 4, 2500, 'Sree bazar,Companiganj,Noakhali', '2020-03-11', '22:02:25', 'pending'),
(10, 'rahim', '8', 'Teacher need for class 8', 4, 3000, 'Housing,Noakhali Sadar,Noakhali', '2020-03-11', '22:05:20', 'pending'),
(11, 'rahim', '3', 'Teacher need for class 3', 5, 2000, 'Center bazar,Hatiya,Noakhali', '2020-03-11', '22:05:43', 'pending'),
(12, 'forhad', '10 (Business Group)', 'Teacher need for class 9', 4, 2000, 'Thana counsil,Noakhali Sadar,Noakhali', '2020-03-11', '22:37:31', 'pending'),
(13, 'sony', 'Honours', 'Teacher need for Honours Student Math subject', 3, 4000, 'Thana counsil,Noakhali Sadar,Noakhali', '2020-03-12', '01:35:51', 'pending'),
(14, 'forhad', '11 (Science Group)', 'Teacher ned for 11 Sience group', 4, 3500, 'Cowmuni bazar,Begumganj,Noakhali', '2020-03-12', '11:09:01', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `user_by` varchar(30) NOT NULL,
  `by` varchar(25) NOT NULL,
  `to` varchar(30) NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unseen',
  `situation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `user_by`, `by`, `to`, `post_id`, `title`, `date`, `time`, `status`, `situation`) VALUES
(14, 'asif', 'Asif', 'sony', 7, 'Teacher need for Class 11 (Business Group)', '2020-03-12', '04:05:17', 'seen', NULL),
(15, 'asif', 'Asif', 'sony', 13, 'Teacher need for Class Honours', '2020-03-12', '10:19:04', 'seen', NULL),
(17, 'sony', 'Saif Sony', 'asif', 13, 'Teacher need for Class Honours', '2020-03-12', '10:42:49', 'seen', 'accept'),
(18, 'asif', 'Asif', 'forhad', 4, 'Teacher need for Class 9 (Science Group)', '2020-03-12', '11:09:41', 'seen', NULL),
(19, 'forhad', 'Md Kamruzzaman', 'asif', 4, 'Teacher need for Class 9 (Science Group)', '2020-03-12', '11:11:21', 'seen', 'accept'),
(20, 'forhad', 'Md Kamruzzaman', 'asif', 4, 'Teacher need for Class 9 (Science Group)', '2020-03-16', '22:26:19', 'seen', 'decline'),
(21, 'forhad', 'Md Kamruzzaman', 'asif', 4, 'Teacher need for Class 9 (Science Group)', '2020-03-16', '22:39:24', 'seen', 'accept'),
(22, 'forhad', 'Md Kamruzzaman', 'asif', 4, 'Teacher need for Class 9 (Science Group)', '2020-03-16', '22:42:23', 'seen', 'decline');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `name`, `phone`, `email`, `education`, `address`, `image`, `status`) VALUES
(1, 'forhad', 'Md Kamruzzaman', '01712327242', 'forhad@gmail.com', ' 11 (Noakhali Govt College)', 'Maijdee,Noakhali', 'img/forhad.jpg', 'set'),
(2, 'asif2', 'Asif', '01712327242', 'asif@gmail.com', '11 (Cowmuhony Govt College)', 'Kabirhat,Noakhali', 'img/', 'set'),
(3, 'rahim', 'Rahim', '01712327242', 'rahim@gmail.com', '8 (Noakhali Zilla School)', 'Senbagh,Noakhali', 'img/', 'set'),
(4, 'karim', NULL, '01712327242', NULL, NULL, NULL, NULL, 'unset');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `primary` varchar(255) DEFAULT NULL,
  `secondary` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `honours` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `name`, `phone`, `email`, `education`, `address`, `image`, `primary`, `secondary`, `college`, `honours`, `status`) VALUES
(1, 'ashik', 'Ashikur Rahman', '01712327242', 'ashik@gmail.com', 'CSTE,NSTU', 'Housing state, Maijdee, Noakhali', NULL, NULL, '9,10 Science Group', '11,12 (Physics, Math, ICT)', NULL, 'set'),
(2, 'asif', 'Asif', '018147', 'asif@gmail.com', 'Agriculture,NSTU', 'Cowmuni bazar,Begumganj,Noakhali', 'img/asif.PNG', '5,6,7,8', 'Science Group', 'Science Group', '', 'set'),
(3, 'forhadt', NULL, '018147', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(4, 'rubelt', NULL, '01712327242', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(5, 'sonyt', 'Saif Sony', '01712327242', 'sony@gmail.com', 'Math,NSTU', 'Comuni munshi,Senbagh,Noakhali', 'img/sony.jpg', '5,6,7,8', 'Science Group(Physics,Chemistry,Math)', 'Science Group(Physics,Chemistry,Math)', 'Math', 'set');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'ashik', '12345', 'teacher'),
(2, 'forhad', '54321', 'student'),
(8, 'sony', '12345', 'parents'),
(9, 'asif2', '12345', 'student'),
(10, 'asif', '12345', 'teacher'),
(11, 'forhadt', '12345', 'teacher'),
(12, 'rubelt', '12345', 'teacher'),
(13, 'sonyt', '12345', 'teacher'),
(14, 'rahim', '12345', 'student'),
(15, 'karim', '12345', 'student'),
(16, 'abul', '12345', 'parents'),
(17, 'rahima', '12345', 'parents');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
