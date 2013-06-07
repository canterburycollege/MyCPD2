-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2013 at 10:07 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycpd`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `provider` varchar(250) NOT NULL,
  `learning_outcomes` varchar(250) NOT NULL,
  `planned_date` date NOT NULL,
  `cpd_type_id` int(11) DEFAULT NULL,
  `target_id` int(11) NOT NULL,
  `impact` varchar(250) DEFAULT NULL,
  `priority_type_id` int(11) DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  `evaluation_url` varchar(50) DEFAULT NULL,
  `hours_of_cpd` decimal(7,2) NOT NULL,
  `rating` int(1) DEFAULT NULL COMMENT 'rating out of 5',
  PRIMARY KEY (`id`),
  KEY `learning_plan_target_id` (`target_id`),
  KEY `priority_type_id` (`priority_type_id`),
  KEY `employee_id` (`employee_id`),
  KEY `cpd_type_id` (`cpd_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `employee_id`, `title`, `provider`, `learning_outcomes`, `planned_date`, `cpd_type_id`, `target_id`, `impact`, `priority_type_id`, `completed_date`, `evaluation_url`, `hours_of_cpd`, `rating`) VALUES
(1, 1, 'Rise and Shine', '', 'Creative assessment techniques to implement in to practice', '2013-02-26', 1, 1, 'Lessons will be structured with regular assessment activities so students are on task and know their progress rate', 7, '2013-03-12', ' ', '0.00', 0),
(2, 1, 'Rise and Shine            ', '', 'Effective questioning technique            ', '2013-02-26', 1, 2, 'Questions will encourage students to think independently, keep them engaged and included', 8, '2013-03-22', ' ', '0.00', 0),
(3, 1, ' Parents evening            ', '', 'Some really important learning outcomes                        ', '2013-03-01', 1, 4, 'Review dyslexia strategies', 8, '2013-03-19', '', '0.00', 0),
(4, 1, 'Claro read training', '', 'Understand the uses of Claro read, how to integrate into lessons and basic awareness of features', '2013-04-19', 1, 4, 'Integration of learning support technology for dyslexic students', 7, NULL, NULL, '0.00', NULL),
(5, 1, 'Peer Observation', '', 'See Colleague C teaching level 1 class using Interactive whiteboard', '2013-03-27', 1, 1, 'Transfer good practice to my level 1 session next Wednesday as part of group assessment task', 8, NULL, NULL, '0.00', NULL),
(6, 1, 'Visit Stakeholder X', '', 'Organise enrichment activity for level 3 following meeting with Colleagues A and B', '2013-06-01', 1, 2, 'Experience a day in the life at Stakeholder X, gain employability skills and experience', 8, NULL, NULL, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpd_type`
--

CREATE TABLE IF NOT EXISTS `cpd_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `sort_order` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cpd_type`
--

INSERT INTO `cpd_type` (`id`, `description`, `sort_order`) VALUES
(1, 'Supported Experiment', 1),
(2, 'Coaching', 2),
(3, 'Peer Observation', 3),
(4, 'Other CPD type', 99);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(50) NOT NULL,
  `moodle_user_id` bigint(10) NOT NULL,
  `mycpd_access_group` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `display_name`, `moodle_user_id`, `mycpd_access_group`) VALUES
(1, 'Treesa Green', 99, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `moodle_user_id` bigint(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`moodle_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manager_group`
--

CREATE TABLE IF NOT EXISTS `manager_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager` bigint(10) NOT NULL COMMENT 'also moodle user id',
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manager` (`manager`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manager_group_detail`
--

CREATE TABLE IF NOT EXISTS `manager_group_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_group` int(11) NOT NULL,
  `moodle_user_id` bigint(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `manager_group` (`manager_group`,`moodle_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `description` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`description`) VALUES
('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html>\n<head>\n</head>\n<body>\n<p>A new mandatory online learning module is now available for all staff to complete from DisabledGo. These modules look at equality in both legal and practical terms as well as language, types of impairment and advice on accessible services. <a href="http://training.disabledgo.com/auth/register/canterbury-college" target="_blank">http://training.disabledgo.com/auth/register/canterbury-college</a> Please follow the link and login by registering an email, username and password. You''ll also be able to access this link via the VLE shortly by looking under Staff Training.</p>\n</body>\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `priority_type`
--

CREATE TABLE IF NOT EXISTS `priority_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `sort_order` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `priority_type`
--

INSERT INTO `priority_type` (`id`, `description`, `sort_order`) VALUES
(7, 'High', 1),
(8, 'Medium', 2),
(9, 'Low', 3);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE IF NOT EXISTS `target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `title_ext` varchar(150) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `employee_id` int(20) DEFAULT NULL,
  `target_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `targets_ibfk_2` (`status_id`),
  KEY `targets_ibfk_1` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `title`, `title_ext`, `description`, `status_id`, `employee_id`, `target_date`) VALUES
(1, '1 Teaching and Learning', 'Assessment and Feedback', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div>&middot; Use a range of assessment methods which evaluate the learning in the classroom every 10 minutes.</div>\r\n<div>&nbsp;</div>\r\n<div>&middot; Provide effective written feedback for assignments within 4 days of submission.</div>\r\n<div>&nbsp;</div>\r\n<div>&middot; Use verbal praise and recognition in the classroom environment...</div>\r\n</body>\r\n</html>', 7, 1, '16/05/2013'),
(2, '2 ACR/Departmental', 'Raise retention on course ABX5689DHJ from 89% to 95%.', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&middot; Liaise with Christine Bunting in ALS regarding the adjustments for dyslexia needed for resources.</p>\r\n<p>&middot; Ensure all lesson plans include the differentiated activities and assessments for students X and Y.</p>\r\n<p>&middot; Share the lesson plan in advance with their LSP.</p>\r\n</body>\r\n</html>', 7, 1, '30/04/2013'),
(4, '3 Student focus', 'Raise retention on course ABX5689DHJ from 89% to 95%.', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html>\n<head>\n</head>\n<body>\n<p>&middot; Feedback states students leave due to lack of enrichment activities and resources available on the VLE.</p>\n<p>&middot; Work with manager to identify good practice</p>\n<p>&middot; peer observe colleague with desired use of ILT</p>\n<p>&middot; Work with colleagues A and B to design 3 enrichment activities and trips which address the employability skills of teamwork, problem solving and communication.</p>\n</body>\n</html>', 7, 1, '18/07/2013'),
(18, '2', '2', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>2</p>\r\n</body>\r\n</html>', 7, 1, '04/06/2013');

-- --------------------------------------------------------

--
-- Table structure for table `target_status`
--

CREATE TABLE IF NOT EXISTS `target_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `target_status`
--

INSERT INTO `target_status` (`id`, `title`, `sort_order`) VALUES
(7, 'Current', 1),
(8, 'Archived', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_activity`
--
CREATE TABLE IF NOT EXISTS `v_activity` (
`id` int(11)
,`employee_id` int(11)
,`title` varchar(250)
,`impact` varchar(250)
,`provider` varchar(250)
,`learning_outcomes` varchar(250)
,`planned_date` date
,`cpd_type_id` int(11)
,`cpd_type` varchar(50)
,`target_id` int(11)
,`target` varchar(150)
,`priority_type_id` int(11)
,`priority_type` varchar(50)
,`completed_date` date
,`evaluation_url` varchar(50)
,`hours_of_cpd` decimal(7,2)
,`rating` int(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_targets_with_status`
--
CREATE TABLE IF NOT EXISTS `v_targets_with_status` (
`id` int(11)
,`title` varchar(150)
,`title_ext` varchar(150)
,`description` varchar(600)
,`status` varchar(50)
,`employee_id` int(20)
,`target_id` int(11)
,`target_date` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_targets_with_status2`
--
CREATE TABLE IF NOT EXISTS `v_targets_with_status2` (
`id` int(11)
,`title` varchar(150)
,`title_ext` varchar(150)
,`description` varchar(600)
,`status` varchar(50)
,`employee_id` int(20)
,`target_date` varchar(20)
);
-- --------------------------------------------------------

--
-- Structure for view `v_activity`
--
DROP TABLE IF EXISTS `v_activity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mycpd_admin`@`%` SQL SECURITY DEFINER VIEW `v_activity` AS (select `activity`.`id` AS `id`,`activity`.`employee_id` AS `employee_id`,`activity`.`title` AS `title`,`activity`.`impact` AS `impact`,`activity`.`provider` AS `provider`,`activity`.`learning_outcomes` AS `learning_outcomes`,`activity`.`planned_date` AS `planned_date`,`activity`.`cpd_type_id` AS `cpd_type_id`,`cpd_type`.`description` AS `cpd_type`,`activity`.`target_id` AS `target_id`,`target`.`title` AS `target`,`activity`.`priority_type_id` AS `priority_type_id`,`priority_type`.`description` AS `priority_type`,`activity`.`completed_date` AS `completed_date`,`activity`.`evaluation_url` AS `evaluation_url`,`activity`.`hours_of_cpd` AS `hours_of_cpd`,`activity`.`rating` AS `rating` from (((`activity` left join `cpd_type` on((`activity`.`cpd_type_id` = `cpd_type`.`id`))) left join `priority_type` on((`activity`.`priority_type_id` = `priority_type`.`id`))) left join `target` on((`activity`.`target_id` = `target`.`id`))));

-- --------------------------------------------------------

--
-- Structure for view `v_targets_with_status`
--
DROP TABLE IF EXISTS `v_targets_with_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mycpd_admin`@`%` SQL SECURITY DEFINER VIEW `v_targets_with_status` AS select `target`.`id` AS `id`,`target`.`title` AS `title`,`target`.`title_ext` AS `title_ext`,`target`.`description` AS `description`,`target_status`.`title` AS `status`,`target`.`employee_id` AS `employee_id`,`target`.`status_id` AS `target_id`,`target`.`target_date` AS `target_date` from (`target` join `target_status` on((`target`.`status_id` = `target_status`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `v_targets_with_status2`
--
DROP TABLE IF EXISTS `v_targets_with_status2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mycpd_admin`@`%` SQL SECURITY DEFINER VIEW `v_targets_with_status2` AS select `target`.`id` AS `id`,`target`.`title` AS `title`,`target`.`title_ext` AS `title_ext`,`target`.`description` AS `description`,`target_status`.`title` AS `status`,`target`.`employee_id` AS `employee_id`,`target`.`target_date` AS `target_date` from (`target` join `target_status` on((`target`.`status_id` = `target_status`.`id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`cpd_type_id`) REFERENCES `cpd_type` (`id`),
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `Learning_plan_detail_ibfk_2` FOREIGN KEY (`target_id`) REFERENCES `target` (`id`),
  ADD CONSTRAINT `Learning_plan_detail_ibfk_3` FOREIGN KEY (`priority_type_id`) REFERENCES `priority_type` (`id`);

--
-- Constraints for table `manager_group`
--
ALTER TABLE `manager_group`
  ADD CONSTRAINT `manager_group_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `manager` (`moodle_user_id`);

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `target_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `target_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
