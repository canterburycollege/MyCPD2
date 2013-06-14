-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2013 at 10:09 AM
-- Server version: 5.1.66-community-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `{Insert this view into your Moodle Database}`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_scores`
--
CREATE TABLE IF NOT EXISTS `v_scores` (
`title` varchar(255)
,`value` longtext
,`course` bigint(10) unsigned
,`userid` bigint(10) unsigned
);
-- --------------------------------------------------------

--
-- Structure for view `v_scores`
--
DROP TABLE IF EXISTS `v_scores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `v_scores` AS select `mdl_scorm_scoes`.`title` AS `title`,`mdl_scorm_scoes_track`.`value` AS `value`,`mdl_scorm`.`course` AS `course`,`mdl_scorm_scoes_track`.`userid` AS `userid` from ((moodle.`mdl_scorm_scoes_track` join moodle.`mdl_scorm_scoes` on((`mdl_scorm_scoes_track`.`scoid` = `mdl_scorm_scoes`.`id`))) join moodle.`mdl_scorm` on((`mdl_scorm_scoes_track`.`scormid` = `mdl_scorm`.`id`))) where ((`mdl_scorm_scoes_track`.`element` = 'cmi.core.score.raw') and ((`mdl_scorm`.`course` = '328') or (`mdl_scorm`.`course` = '333') or (`mdl_scorm`.`course` = '334') or (`mdl_scorm`.`course` = '335') or (`mdl_scorm`.`course` = '336') or (`mdl_scorm`.`course` = '337') or (`mdl_scorm`.`course` = '338') or (`mdl_scorm`.`course` = '339') or (`mdl_scorm`.`course` = '340') or (`mdl_scorm`.`course` = '1910')));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
