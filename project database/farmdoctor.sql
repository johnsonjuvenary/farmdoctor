-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 08:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmdoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctorreply`
--

CREATE TABLE `doctorreply` (
  `id` int(10) NOT NULL,
  `message` text NOT NULL,
  `farmer` text NOT NULL,
  `doctor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorreply`
--

INSERT INTO `doctorreply` (`id`, `message`, `farmer`, `doctor`) VALUES
(2, 'i  will you next week', 'johnsonjuvenary@gmail.com', 1),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iste obcaecati aliquam, dolorem vero quis et. Labore ut nulla tempora quo corporis dolores magni, porro sint doloremque aliquid velit voluptate!\r\n', 'kevi@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmdoctor`
--

CREATE TABLE `farmdoctor` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile_pic` text NOT NULL DEFAULT 'default_profile.png',
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmdoctor`
--

INSERT INTO `farmdoctor` (`id`, `name`, `profile_pic`, `password`) VALUES
(1, 'Farm Doctor', 'default_profile.png', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `farmerproblem`
--

CREATE TABLE `farmerproblem` (
  `id` int(10) NOT NULL,
  `message` text NOT NULL,
  `attachment` text NOT NULL,
  `farmer` varchar(256) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seenByDoctor` text NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerproblem`
--

INSERT INTO `farmerproblem` (`id`, `message`, `attachment`, `farmer`, `time`, `seenByDoctor`) VALUES
(4, 'I have problem with fertilizer i use, please can u advice me which one can i use , to increase my production,\r\nthanks! here is my farm', '5e5171711d34b8.19307717.jpg', 'johnsonjuvenary@gmail.com', '2020-02-22 18:25:34', 'Yes'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iste obcaecati aliquam, dolorem vero quis et. Labore ut nulla tempora quo corporis dolores magni, porro sint doloremque aliquid velit voluptate!', '5e517e4755dd13.89676742.jpg', 'kevi@gmail.com', '2020-02-22 19:18:11', 'Yes'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iste obcaecati aliquam, dolorem vero quis et. Labore ut nulla tempora quo corporis dolores magni, porro sint doloremque aliquid velit voluptate!', '5e517eb8522873.84707443.jpg', 'david@gmail.com', '2020-02-22 19:19:20', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `farmerz`
--

CREATE TABLE `farmerz` (
  `id` int(255) NOT NULL,
  `uname` varchar(256) NOT NULL,
  `gender` text NOT NULL,
  `region` text NOT NULL,
  `district` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `profile_pic` text NOT NULL DEFAULT 'default_profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerz`
--

INSERT INTO `farmerz` (`id`, `uname`, `gender`, `region`, `district`, `email`, `phone`, `password`, `profile_pic`) VALUES
(1, 'Johnson Juvenary', 'Male', 'DAR ES SALAAM', 'KINONDONI', 'johnsonjuvenary@gmail.com', '0769335532', '$2y$10$Am3oxjT.dCrJ.jNdZf.e.eO34GPU.rDs9MLzyybORQQOQYI1tkD8.', '5e5166df83c1f9.27196964.jpg'),
(2, 'Kevin Muyungi', 'Male', 'ARUSHA', 'ARUSHA URBAN', 'kevinmuyungi@gmail.com', '0745617509', '$2y$10$tVOnbBnlVccFLgZA05lY7OkRM50mv8gWGctMke0C9wOPTqi79kbIi', 'default_profile.png'),
(3, 'Sungusia', 'Male', 'DAR ES SALAAM', 'UBUNGO', 'sungusia@gmail.com', '0712345678', '$2y$10$w5Ey6z3w9yzuqMQARC/NAOeCAHmWmObyDpH0wyOJqiHYSK1MlkNem', '5e511042070609.06079173.jpg'),
(4, 'David', 'Male', 'DAR ES SALAAM', 'KINONDONI', 'david@gmail.com', '0771234567', '$2y$10$3znBUaaqZc6QAC.GaMJSbeK8viPSnhiq6l2oC7pbRTc/4ymZmSepi', 'default_profile.png'),
(5, 'Kevin', 'Male', 'DAR ES SALAAM', 'ILALA', 'kevi@gmail.com', '0781234567', '$2y$10$6cPb7RG2dfT4Mja5koZeNe/6tzDLHk/I1jMucdiERSc4blESE4GVC', '5e517e2b553a74.10462483.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(10) NOT NULL,
  `log_name` text NOT NULL,
  `user` text NOT NULL,
  `time_happend` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_name`, `user`, `time_happend`) VALUES
(1, 'Changed Password', 'johnsonjuvenary@gmail.com', '2020-02-22 17:32:16'),
(2, 'logged in', 'johnsonjuvenary@gmail.com', '2020-02-22 17:32:34'),
(3, 'composed problem', 'johnsonjuvenary@gmail.com', '2020-02-22 17:34:53'),
(4, 'updated profile', 'johnsonjuvenary@gmail.com', '2020-02-22 17:37:35'),
(5, 'logged in', '1', '2020-02-22 17:39:52'),
(6, 'logged in', 'Farm Doctor', '2020-02-22 17:42:17'),
(7, 'logged in', 'johnsonjuvenary@gmail.com', '2020-02-22 18:21:05'),
(8, 'composed problem', 'johnsonjuvenary@gmail.com', '2020-02-22 18:22:41'),
(9, 'logged in', 'Farm Doctor', '2020-02-22 18:25:23'),
(10, 'Replied', 'Farm Doctor', '2020-02-22 18:27:37'),
(11, 'Replied', 'Farm Doctor', '2020-02-22 18:29:04'),
(12, 'composed problem', 'johnsonjuvenary@gmail.com', '2020-02-22 18:29:48'),
(13, 'logged in', 'Farm Doctor', '2020-02-22 18:36:45'),
(14, 'logged in', 'Farm Doctor', '2020-02-22 18:40:41'),
(15, 'logged in', 'johnsonjuvenary@gmail.com', '2020-02-22 19:09:40'),
(16, 'logged in', 'kevi@gmail.com', '2020-02-22 19:16:33'),
(17, 'updated profile', 'kevi@gmail.com', '2020-02-22 19:16:59'),
(18, 'composed problem', 'kevi@gmail.com', '2020-02-22 19:17:27'),
(19, 'changed password', 'kevi@gmail.com', '2020-02-22 19:17:40'),
(20, 'logged in', 'Farm Doctor', '2020-02-22 19:17:49'),
(21, 'logged in', 'Farm Doctor', '2020-02-22 19:18:04'),
(22, 'Replied', 'Farm Doctor', '2020-02-22 19:18:17'),
(23, 'logged in', 'david@gmail.com', '2020-02-22 19:19:07'),
(24, 'composed problem', 'david@gmail.com', '2020-02-22 19:19:20'),
(25, 'logged in', 'Farm Doctor', '2020-02-22 19:19:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctorreply`
--
ALTER TABLE `doctorreply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc` (`doctor`);

--
-- Indexes for table `farmdoctor`
--
ALTER TABLE `farmdoctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmerproblem`
--
ALTER TABLE `farmerproblem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmerProblem` (`farmer`);

--
-- Indexes for table `farmerz`
--
ALTER TABLE `farmerz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctorreply`
--
ALTER TABLE `doctorreply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmdoctor`
--
ALTER TABLE `farmdoctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farmerproblem`
--
ALTER TABLE `farmerproblem`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `farmerz`
--
ALTER TABLE `farmerz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorreply`
--
ALTER TABLE `doctorreply`
  ADD CONSTRAINT `doc` FOREIGN KEY (`doctor`) REFERENCES `farmdoctor` (`id`);

--
-- Constraints for table `farmerproblem`
--
ALTER TABLE `farmerproblem`
  ADD CONSTRAINT `farmerProblem` FOREIGN KEY (`farmer`) REFERENCES `farmerz` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
