-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2012 at 07:34 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courseweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('17a2c6c1a77a2f48138ed5e44e06f630', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7', 1328124584, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:12:"prakhars2013";s:9:"logged_in";b:1;}'),
('dda92776a955599236dd5038c8d7245b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0) Gecko/20100101 Firefox/10.0', 1328120156, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:12:"prakhars2013";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `seats` int(11) NOT NULL,
  `round1` int(11) NOT NULL,
  `opentobid` tinyint(1) NOT NULL,
  `credits` float NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `faculty`, `seats`, `round1`, `opentobid`, `credits`) VALUES
('cs-101', 'Programming Fundamentalscs-101', 'Rohit Katiyar', 45, 6, 1, 3),
('cs-102', 'Programming Fundamentalscs-102', 'Rohit Katiyar', 45, 3, 1, 3),
('cs-103', 'Programming Fundamentalscs-103', 'Rohit Katiyar', 45, 6, 0, 3),
('cs-104', 'Programming Fundamentalscs-104', 'Rohit Katiyar', 45, 2, 0, 3),
('cs-105', 'Programming Fundamentalscs-105', 'Rohit Katiyar', 45, 3, 0, 3),
('cs-106', 'Programming Fundamentalscs-106', 'Rohit Katiyar', 45, 3, 1, 3),
('cs-107', 'Programming Fundamentalscs-107', 'Rohit Katiyar', 45, 2, 1, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `courseslist`
--

CREATE TABLE IF NOT EXISTS `courseslist` (
  `slot` int(2) NOT NULL DEFAULT '0',
  `rownum` int(2) NOT NULL DEFAULT '0',
  `course` varchar(40) NOT NULL DEFAULT '0',
  `faculty` varchar(40) NOT NULL DEFAULT '0',
  `applied` int(4) NOT NULL DEFAULT '0',
  `seats` int(4) NOT NULL DEFAULT '0',
  `apply` int(2) NOT NULL DEFAULT '0',
  `opentobid` int(2) NOT NULL DEFAULT '0',
  `credit` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseslist`
--

INSERT INTO `courseslist` (`slot`, `rownum`, `course`, `faculty`, `applied`, `seats`, `apply`, `opentobid`, `credit`) VALUES
(1, 1, 'mi-102', 'a', 1, 1000, 0, 1, 3),
(1, 2, 'mi-101', 'a', 0, 1000, 0, 1, 3),
(1, 3, 'mi-103', 'a', 0, 1000, 0, 1, 3),
(2, 6, 'mi-106', 'a', 1, 1000, 0, 1, 3),
(2, 5, 'mi-105', 'a', 0, 1000, 0, 1, 3),
(2, 4, 'mi-104', 'a', 0, 1000, 0, 1, 3),
(3, 9, 'mi-109', 'a', 0, 1000, 0, 1, 3),
(3, 7, 'mi-107', 'a', 1, 1000, 0, 1, 3),
(3, 8, 'mi-108', 'a', 0, 1000, 0, 1, 3),
(4, 10, 'fi-101', 'a', 0, 1000, 0, 1, 3),
(4, 11, 'fi-102', 'a', 1, 1000, 0, 1, 3),
(4, 12, 'fi-103', 'a', 0, 1000, 0, 0, 3),
(5, 16, 'fi-107', 'a', 0, 1000, 0, 0, 3),
(5, 15, 'fi-106', 'a', 0, 1000, 0, 0, 3),
(5, 14, 'fi-105', 'a', 1, 1000, 0, 0, 3),
(5, 13, 'fi-104', 'a', 0, 1000, 0, 0, 3),
(6, 17, 'ec-101', 'a', 0, 1000, 0, 0, 1.5),
(6, 20, 'fi-108', 'a', 0, 1000, 0, 0, 3),
(6, 21, 'fi-109', 'a', 1, 1000, 0, 0, 3),
(6, 19, 'ec-103', 'a', 0, 1000, 0, 0, 3),
(6, 18, 'ec-102', 'a', 0, 1000, 0, 0, 1.5),
(7, 22, 'ec-104', 'a', 0, 1000, 0, 0, 3),
(8, 26, 'a-104', 'a', 0, 100, 0, 0, 1.5),
(8, 27, 'b-101', 'a', 0, 100, 0, 0, 1.5),
(8, 28, 'c-101', 'a', 0, 100, 0, 0, 1.5),
(8, 29, 'd-101', 'a', 0, 100, 0, 0, 1.5),
(8, 24, 'ec-106', 'a', 0, 1000, 0, 0, 3),
(8, 23, 'ec-105', 'a', 0, 1000, 0, 0, 3),
(8, 25, 'a-103', 'a', 0, 100, 0, 0, 1.5),
(9, 30, 'e-101', 'a', 0, 100, 0, 0, 1.5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `opentobid_view`
--
CREATE TABLE IF NOT EXISTS `opentobid_view` (
`course_id` varchar(10)
,`seats` int(11)
,`faculty` varchar(200)
,`course_name` varchar(200)
,`credits` float
,`round2` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `round1_users`
--

CREATE TABLE IF NOT EXISTS `round1_users` (
  `user_id` varchar(50) NOT NULL,
  `courses` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `round2_display_view`
--
CREATE TABLE IF NOT EXISTS `round2_display_view` (
`course_id` varchar(10)
,`course_name` varchar(200)
,`faculty` varchar(200)
,`seats` int(11)
,`applied` int(11)
,`slot` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `round2_slots`
--

CREATE TABLE IF NOT EXISTS `round2_slots` (
  `slot` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  PRIMARY KEY (`slot`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round2_slots`
--

INSERT INTO `round2_slots` (`slot`, `course_id`) VALUES
(1, 'cs-101'),
(2, 'cs-102'),
(1, 'cs-103'),
(3, 'cs-103'),
(2, 'cs-104'),
(3, 'cs-106');

-- --------------------------------------------------------

--
-- Table structure for table `round2_users`
--

CREATE TABLE IF NOT EXISTS `round2_users` (
  `user_id` varchar(60) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round2_users`
--

INSERT INTO `round2_users` (`user_id`, `course_id`) VALUES
('rohitk2013', 'cs-101'),
('rohitk2013', 'cs-102'),
('rohitk2013', 'cs-103'),
('prakhars2013', 'cs-101'),
('prakhars2013', 'cs-104'),
('prakhars2013', 'cs-103'),
('akashd2013', 'cs-101'),
('akashd2013', 'cs-104'),
('akashd2013', 'cs-103'),
('ashishkj11', 'cs-101'),
('ashishkj11', 'cs-102'),
('ashishkj11', 'cs-103');

-- --------------------------------------------------------

--
-- Table structure for table `round3_users`
--

CREATE TABLE IF NOT EXISTS `round3_users` (
  `user_id` varchar(50) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `bid` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round3_users`
--

INSERT INTO `round3_users` (`user_id`, `course_id`, `bid`) VALUES
('akashd2013', 'cs-101', 156),
('ashishkj11', 'cs-101', 700),
('ashishkj11', 'cs-102', 400),
('rohitk2013', 'cs-101', 500),
('rohitk2013', 'cs-102', 250);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status` varchar(40) NOT NULL DEFAULT 'round1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
('round 1');

-- --------------------------------------------------------

--
-- Table structure for table `users12`
--

CREATE TABLE IF NOT EXISTS `users12` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `username` varchar(40) NOT NULL DEFAULT '0',
  `password` varchar(40) NOT NULL DEFAULT '0',
  `admin` int(2) NOT NULL DEFAULT '0',
  `lock` int(2) NOT NULL DEFAULT '0',
  `term4` float NOT NULL DEFAULT '0',
  `term5` float NOT NULL DEFAULT '0',
  `term6` float NOT NULL DEFAULT '0',
  `TotalBidSpent` int(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users12`
--

INSERT INTO `users12` (`id`, `username`, `password`, `admin`, `lock`, `term4`, `term5`, `term6`, `TotalBidSpent`) VALUES
('1', 'varun', 'hero', 0, 0, 18, 0, 0, 660),
('2', 'pgprep', 'nautanki', 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure for view `opentobid_view`
--
DROP TABLE IF EXISTS `opentobid_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `opentobid_view` AS select `courses`.`course_id` AS `course_id`,`courses`.`seats` AS `seats`,`courses`.`faculty` AS `faculty`,`courses`.`course_name` AS `course_name`,`courses`.`credits` AS `credits`,(select count(0) from `round2_users` where (`round2_users`.`course_id` = `courses`.`course_id`)) AS `round2` from `courses` where (`courses`.`opentobid` = 1);

-- --------------------------------------------------------

--
-- Structure for view `round2_display_view`
--
DROP TABLE IF EXISTS `round2_display_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `round2_display_view` AS select `courses`.`course_id` AS `course_id`,`courses`.`course_name` AS `course_name`,`courses`.`faculty` AS `faculty`,`courses`.`seats` AS `seats`,`courses`.`round1` AS `applied`,`round2_slots`.`slot` AS `slot` from (`courses` join `round2_slots` on((`courses`.`course_id` = `round2_slots`.`course_id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `round2_slots`
--
ALTER TABLE `round2_slots`
  ADD CONSTRAINT `round2_slots_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE NO ACTION;

--
-- Constraints for table `round2_users`
--
ALTER TABLE `round2_users`
  ADD CONSTRAINT `round2_users_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
