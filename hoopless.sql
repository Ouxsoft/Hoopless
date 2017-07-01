-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2017 at 09:15 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoopless`
--
CREATE DATABASE IF NOT EXISTS `hoopless` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hoopless`;

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` int(11) NOT NULL,
  `category` enum('Web skills','Web tools','Art skills','Art tools','Robotic skills','Robotic tools','Game skills','Game tools','Software skills','Software tools','Languages') NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `started` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `category`, `name`, `score`, `started`, `timestamp`) VALUES
(1, 'Web skills', 'CSS3', 5, NULL, '2016-07-25 05:08:40'),
(2, 'Web skills', 'HTML5', 5, NULL, '2016-07-25 05:08:40'),
(3, 'Web skills', 'MySQL', 5, NULL, '2016-07-25 05:08:40'),
(4, 'Web skills', 'PHP', 5, NULL, '2016-07-25 05:08:40'),
(5, 'Web skills', 'Javascript', 5, NULL, '2016-07-25 05:08:40'),
(6, 'Web skills', 'JQuery', 4, NULL, '2016-07-25 05:08:40'),
(7, 'Web skills', 'XML', 4, NULL, '2016-07-25 05:08:40'),
(8, 'Web skills', 'JSON', 4, NULL, '2016-07-25 05:08:40'),
(9, 'Web skills', 'Bootstrap Framework', 4, NULL, '2016-07-25 05:08:40'),
(10, 'Web skills', 'Java', 3, NULL, '2016-07-25 05:08:40'),
(11, 'Game skills', 'DarkBasic', 3, NULL, '2016-07-25 05:08:40'),
(12, 'Game skills', 'Lua', 5, NULL, '2016-07-25 05:08:40'),
(13, 'Web skills', 'Wordpress', 4, NULL, '2016-07-25 05:08:40'),
(14, 'Software skills', 'Object-oriented programming', 5, NULL, '2016-07-25 05:08:40'),
(15, 'Web skills', 'AngularJS', 2, NULL, '2016-07-25 05:08:40'),
(48, 'Game skills', 'Three.js', 3, NULL, '2016-07-29 19:54:55'),
(17, 'Robotic skills', 'Fanuc Karel', 5, NULL, '2016-07-25 05:08:40'),
(18, 'Software skills', 'C++', 3, NULL, '2016-07-25 05:08:40'),
(19, 'Art tools', 'ZBrush', 4, NULL, '2016-07-25 05:49:44'),
(20, 'Art tools', 'Adobe Illustrator', 4, NULL, '2016-07-25 05:08:40'),
(21, 'Art tools', 'Adobe Photoshop', 4, NULL, '2016-07-25 05:08:40'),
(38, 'Web tools', 'Git / Git Flow', 4, '2012-01-03', '2016-07-25 05:08:40'),
(23, 'Web skills', 'Coldfusion', 2, NULL, '2016-07-25 05:08:40'),
(24, 'Software skills', 'Visual Basic .NET (VB.NET)', 4, NULL, '2016-07-31 15:59:15'),
(25, 'Software skills', 'Borland C++', 3, NULL, '2016-07-25 05:08:40'),
(26, 'Web skills', 'SEO', 4, NULL, '2016-07-25 05:08:40'),
(27, 'Web skills', 'Command line', 3, NULL, '2016-07-25 05:08:40'),
(28, 'Software skills', 'Microsoft Visual C - C#', 3, NULL, '2016-07-25 05:08:40'),
(29, 'Art tools', 'Sketchup', 4, NULL, '2016-07-25 07:00:00'),
(30, 'Web tools', 'Notepad++', 5, NULL, '2016-07-25 05:10:13'),
(31, 'Languages', 'English (native)', 5, NULL, '2016-07-25 00:11:41'),
(32, 'Languages', 'Russian (survivable)', 2, '2011-06-04', '2016-07-25 01:44:25'),
(33, 'Web skills', 'Ruby', 1, NULL, '2016-07-25 05:10:13'),
(34, 'Web skills', 'Python', 2, NULL, '2016-07-25 05:10:13'),
(35, 'Web tools', 'Internet Explorer', 5, NULL, '2016-07-25 05:10:13'),
(36, 'Web tools', 'Windows', 5, '1992-10-01', '2016-07-25 05:10:21'),
(37, 'Web tools', 'Mac', 3, '1993-08-01', '2016-07-25 05:10:13'),
(39, 'Web tools', 'Linux', 4, '2003-08-01', '2016-07-25 05:11:00'),
(41, 'Web skills', 'Apache', 4, NULL, '2016-07-25 06:49:49'),
(42, 'Web skills', 'Actionscript', 3, NULL, '2016-07-25 06:49:23'),
(44, 'Art tools', 'Wacom Tablet Intuos 4', 5, NULL, '2016-07-25 05:50:22'),
(45, 'Web tools', 'CPanel', 4, NULL, '2016-07-25 16:27:28'),
(46, 'Web tools', 'Mozilla Firefox', 5, NULL, '2016-07-25 16:27:28'),
(47, 'Web tools', 'Google Chrome', 5, NULL, '2016-07-25 16:37:11'),
(49, 'Game skills', 'Ruby', 1, NULL, '2016-07-29 19:55:46'),
(50, 'Game skills', 'Javascript', 5, NULL, '2016-07-29 19:55:13'),
(51, 'Game skills', 'Visual Basic 6.0', 4, NULL, '2016-07-29 19:56:05'),
(52, 'Game skills', 'Visual Basic .NET (VB.NET)', 4, NULL, '2016-07-31 15:59:15'),
(53, 'Game skills', 'C Programming', 3, NULL, '2016-07-29 19:56:38'),
(54, 'Game skills', 'C++', 3, NULL, '2016-07-29 19:56:46'),
(55, 'Game skills', 'Actionscript', 3, NULL, '2016-07-29 19:56:57'),
(56, 'Robotic tools', 'Visual Basic .NET (VB.NET)', 4, NULL, '2016-08-02 13:28:33'),
(57, 'Web skills', 'Bash (Unix shell)', 4, NULL, '2016-07-31 18:53:14'),
(58, 'Art tools', 'CAD (DraftSight)', 3, NULL, '2016-08-02 12:48:36'),
(59, 'Art tools', 'Kerkythea (Render)', 3, NULL, '2016-08-02 12:48:36'),
(60, 'Art skills', 'Perspective', 4, NULL, '2016-08-02 12:50:13'),
(61, 'Art skills', 'Human Anatomy', 4, NULL, '2016-08-02 12:50:13'),
(62, 'Art skills', 'Creativity', 4, NULL, '2016-08-02 12:51:28'),
(63, 'Art tools', 'Pen and Ink', 3, NULL, '2016-08-02 12:53:27'),
(64, 'Art tools', 'Acrylics', 4, NULL, '2016-08-02 12:53:27'),
(65, 'Art tools', 'Watercolor', 3, NULL, '2016-08-02 12:54:07'),
(66, 'Web tools', 'Oil Painting', 3, NULL, '2016-08-02 12:54:07'),
(67, 'Robotic skills', 'Understanding of 6-Axis Industrial Robots', 4, NULL, '2016-08-02 13:27:02'),
(68, 'Art tools', 'FANUC Controller Software', 3, NULL, '2016-08-02 13:28:33'),
(69, 'Robotic tools', 'Fanuc Controller / Teach Pendant', 5, NULL, '2016-08-02 13:35:53'),
(70, 'Robotic skills', 'Icon Design', 4, NULL, '2016-08-02 13:38:14'),
(71, 'Robotic skills', 'PR (Position Register) on FANUC TPP', 5, NULL, '2016-08-02 13:39:06'),
(72, 'Robotic skills', 'Documentation (Web Based)', 4, NULL, '2016-08-02 13:39:54'),
(73, 'Robotic skills', 'TP Programming', 5, NULL, '2016-08-02 13:44:12'),
(74, 'Robotic skills', 'Rj32 Framework', 4, NULL, '2016-08-02 14:12:23'),
(75, 'Web skills', 'Drupal', 3, NULL, '2016-07-25 05:08:40'),
(76, 'Web skills', 'SASS (SCSS)', 5, NULL, '2016-07-25 05:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` longtext,
  `abbreviation` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `abbreviation`) VALUES
(1, 'English', 'EN'),
(2, 'Albanian ', 'SQ'),
(3, 'Arabic ', 'AR'),
(4, 'Armenian ', 'HY'),
(5, 'Basque ', 'EU'),
(6, 'Bengali ', 'BN'),
(7, 'Bulgarian ', 'BG'),
(8, 'Catalan ', 'CA'),
(9, 'Cambodian ', 'KM'),
(10, 'Chinese (Mandarin) ', 'ZH'),
(11, 'Croatian ', 'HR'),
(12, 'Czech ', 'CS'),
(13, 'Danish ', 'DA'),
(14, 'Dutch ', 'NL'),
(15, 'Afrikaans', 'AF'),
(16, 'Estonian ', 'ET'),
(17, 'Fiji ', 'FJ'),
(18, 'Finnish ', 'FI'),
(19, 'French ', 'FR'),
(20, 'Georgian ', 'KA'),
(21, 'German ', 'DE'),
(22, 'Greek ', 'EL'),
(23, 'Gujarati ', 'GU'),
(24, 'Hebrew ', 'HE'),
(25, 'Hindi ', 'HI'),
(26, 'Hungarian ', 'HU'),
(27, 'Icelandic ', 'IS'),
(28, 'Indonesian ', 'ID'),
(29, 'Irish ', 'GA'),
(30, 'Italian ', 'IT'),
(31, 'Japanese ', 'JA'),
(32, 'Javanese ', 'JW'),
(33, 'Korean ', 'KO'),
(34, 'Latin ', 'LA'),
(35, 'Latvian ', 'LV'),
(36, 'Lithuanian ', 'LT'),
(37, 'Macedonian ', 'MK'),
(38, 'Malay ', 'MS'),
(39, 'Malayalam ', 'ML'),
(40, 'Maltese ', 'MT'),
(41, 'Maori ', 'MI'),
(42, 'Marathi ', 'MR'),
(43, 'Mongolian ', 'MN'),
(44, 'Nepali ', 'NE'),
(45, 'Norwegian ', 'NO'),
(46, 'Persian ', 'FA'),
(47, 'Polish ', 'PL'),
(48, 'Portuguese ', 'PT'),
(49, 'Punjabi ', 'PA'),
(50, 'Quechua ', 'QU'),
(51, 'Romanian ', 'RO'),
(52, 'Russian ', 'RU'),
(53, 'Samoan ', 'SM'),
(54, 'Serbian ', 'SR'),
(55, 'Slovak ', 'SK'),
(56, 'Slovenian ', 'SL'),
(57, 'Spanish ', 'ES'),
(58, 'Swahili ', 'SW'),
(59, 'Swedish  ', 'SV'),
(60, 'Tamil ', 'TA'),
(61, 'Tatar ', 'TT'),
(62, 'Telugu ', 'TE'),
(63, 'Thai ', 'TH'),
(64, 'Tibetan ', 'BO'),
(65, 'Tonga ', 'TO'),
(66, 'Turkish ', 'TR'),
(67, 'Ukrainian ', 'UK'),
(68, 'Urdu ', 'UR'),
(69, 'Uzbek ', 'UZ'),
(70, 'Vietnamese ', 'VI'),
(71, 'Welsh ', 'CY'),
(72, 'Xhosa ', 'XH');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `title`) VALUES
(1, 'top-menu');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `item_id` int(25) NOT NULL,
  `menu_id` int(25) NOT NULL,
  `node_id` int(25) NOT NULL,
  `parent_id` int(25) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`item_id`, `menu_id`, `node_id`, `parent_id`, `title`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 12, 2, NULL),
(3, 1, 13, 2, NULL),
(4, 1, 14, 2, NULL),
(5, 1, 15, 2, NULL),
(6, 1, 17, NULL, NULL),
(7, 1, 3, NULL, NULL),
(8, 1, 4, NULL, NULL),
(9, 1, 34, 17, NULL),
(10, 1, 30, 17, NULL),
(11, 1, 31, 17, NULL),
(12, 1, 32, 17, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `node_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `page_heading` varchar(255) DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `change_freq` enum('always','hourly','daily','weekly','monthly','yearly','never') NOT NULL DEFAULT 'weekly',
  `priority` decimal(2,1) DEFAULT '0.5',
  `standalone` tinyint(4) DEFAULT NULL COMMENT 'header/footer disabled (1) enabled (null)',
  `signin_required` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`node_id`, `parent_id`, `title`, `page_heading`, `meta_description`, `change_freq`, `priority`, `standalone`, `signin_required`, `timestamp`) VALUES
(1, 0, 'Home', 'Full-Stack Developer', 'A full-stack developer\'s home', 'weekly', '1.0', 0, 0, '2017-04-22 22:59:03'),
(2, 1, 'Portfolio', 'Portfolio', 'Works completed', 'weekly', '1.0', 0, 0, '2017-03-20 01:50:17'),
(3, 1, 'Resume', 'Resume', 'Resume', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(4, 1, 'Contact', 'Contact', 'Contact and connect', 'monthly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(5, 33, 'Nodes', 'Nodes', 'Node Settings', 'weekly', '0.0', 0, NULL, '2017-03-20 01:50:17'),
(6, 1, 'Users', 'Users', 'Change group permissions, account settings, create an account, manage user groups, send a message to another user, etc', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(7, 6, 'Sign-in', 'Sign-in', 'Sign-in to your account.', 'weekly', '0.5', 0, NULL, '2017-04-17 03:29:56'),
(8, 6, 'Settings', 'Settings', 'Update your settings', 'weekly', '0.5', 0, 1, '2017-03-20 01:50:17'),
(9, 6, 'Sign Up', 'Sign Up', 'Sign up for an account', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(10, 1, 'Site Map', 'Site Map', NULL, 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(11, 10, 'Sitemap XML', 'Sitemap XML', NULL, 'weekly', '0.5', 1, 0, '2017-03-20 01:50:17'),
(12, 2, 'Web Development', 'Web Development', 'Web design and development', 'weekly', '0.7', 0, 0, '2017-03-20 01:50:17'),
(13, 2, 'Art Design', 'Art Design', 'Art design', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(14, 2, 'Robotics Development', 'Robotics Development', 'Robotics development', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(15, 2, 'Game Design', 'Game Design', 'Game design', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(16, 33, 'Development', 'Development', 'dev', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(17, 1, 'Case Studies', 'Case Studies', 'Studies about a situation that have been studied over time.', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(18, 31, 'Luck', 'Luck', 'luck', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(19, 31, 'Afflictions', 'Afflictions', 'afflictions', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(20, 30, 'Color Selection', 'Color Selection', 'color selection', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(21, 30, 'Pair 10', 'Pair 10', NULL, 'monthly', '0.5', NULL, NULL, '2017-04-23 00:51:50'),
(22, 34, 'Broadsword', 'Broadsword', 'Broadsword', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(23, 31, 'Instance', 'Instance', 'instance', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(25, 1, 'Search', 'Search', 'Search', 'weekly', '0.5', 0, 0, '2017-03-20 01:50:17'),
(26, 32, 'Determining Square Root', 'Determining Square Root', 'Robot determining square root', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(27, 32, 'Solving Scrap', 'Solving Scrap', 'Robotics Solving Scrap', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(28, 32, 'Process Optimization', 'Process Optimization', 'Process Optimization', 'weekly', '0.5', 0, NULL, '2017-04-23 01:05:50'),
(30, 17, 'AngularJS', 'AngularJS', 'Description', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(31, 17, 'PHP', 'PHP', 'Description', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(32, 17, 'Robotics', 'Robotics', 'Description', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(33, 1, 'Administration', 'Administration', 'Description', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(34, 17, '3D', '3D', 'Description', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(35, 5, 'Edit', 'Edit', 'Edit nodes', 'weekly', '0.5', 0, NULL, '2017-03-20 01:50:17'),
(36, 1, 'Title', NULL, 'Description', 'weekly', '0.5', NULL, NULL, '2017-04-17 03:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `node_alias`
--

CREATE TABLE `node_alias` (
  `alias_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `retired` tinyint(1) DEFAULT NULL,
  `redirect_node_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node_alias`
--

INSERT INTO `node_alias` (`alias_id`, `node_id`, `alias`, `retired`, `redirect_node_id`, `user_id`, `timestamp`) VALUES
(1, 1, '/', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(2, 2, '/portfolio', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(3, 3, '/resume', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(4, 4, '/contact', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(5, 5, '/admin/node/settings', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(6, 6, '/users', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(7, 7, '/users/sign-in', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(8, 8, '/users/settings', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(9, 9, '/users/sign-up', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(10, 10, '/site-map', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(11, 11, '/sitemap.xml', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(12, 12, '/portfolio/web-design-and-development', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(13, 13, '/portfolio/art-design', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(14, 14, '/portfolio/robotics-development', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(15, 15, '/portfolio/game-design', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(16, 16, '/dev', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(17, 17, '/case-studies', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(18, 18, '/case-studies/php/luck', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(19, 19, '/case-studies/php/afflictions', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(20, 20, '/snippets/color-selection', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(21, 21, '/case-studies/angularjs/pair-10', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(22, 22, '/case-studies/3d/broadsword', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(23, 23, '/case-studies/php/instance', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(24, 25, '/search', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(25, 26, '/case-studies/robotics/squareroot', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(26, 27, '/case-studies/robotics/solving-scrap', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(27, 28, '/case-studies/robotics/single-program', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(28, 30, '/case-studies/angularjs', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(29, 31, '/case-studies/php', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(30, 32, '/case-studies/robotics', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(31, 33, '/admin', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(32, 34, '/case-studies/3d', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(33, 35, '/admin/node/edit', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(34, 36, '/new-page', NULL, NULL, NULL, '2017-05-26 12:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `node_permission`
--

CREATE TABLE `node_permission` (
  `permission_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `state` enum('disabled','active','protected') CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node_permission`
--

INSERT INTO `node_permission` (`permission_id`, `node_id`, `state`) VALUES
(1, 1, 'active'),
(2, 2, 'active'),
(3, 3, 'active'),
(4, 4, 'active'),
(5, 12, 'active'),
(6, 13, 'active'),
(7, 14, 'active'),
(8, 15, 'active'),
(9, 16, 'active'),
(10, 17, 'active'),
(11, 18, 'active'),
(12, 19, 'active'),
(13, 20, 'active'),
(14, 21, 'active'),
(15, 22, 'active'),
(16, 23, 'active'),
(36, 35, 'active'),
(18, 25, 'active'),
(19, 11, 'active'),
(20, 26, 'active'),
(21, 27, 'active'),
(22, 28, 'active'),
(23, 5, 'active'),
(37, 36, 'active'),
(25, 30, 'active'),
(26, 31, 'active'),
(27, 32, 'active'),
(28, 33, 'active'),
(29, 34, 'active'),
(38, 7, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `category` enum('art','game','web','robot') NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `category`, `title`, `media`, `href`, `thumbnail`, `year`) VALUES
(60, 'robot', 'Eliminating Scrap', 'Designed and Programmed (ASP.Net, VB.Net, KARNEL, FANUC, HTML, CSS, etc.)', 'solving-scrap.jpg', 'solving-scrap.jpg', 2009),
(1, 'web', 'Hazardous Materials Table Lookup', 'Designed, developed, and maintained (LAMP)', 'jnh-hmt.jpg', 'jnh-hmt.jpg', 2015),
(2, 'web', 'GHS Labeling System', 'Designed, developed, and maintained (LAMP)', 'jnh-ghs-label.jpg', 'jnh-ghs-label.jpg', 2015),
(3, 'web', 'Gameframe Website', 'Designed and developed (HTML, CSS, Javascript)', 'gameframe.jpg', 'gameframe.jpg', 2005),
(4, 'web', 'JNH Website', 'Designed, developed, and maintained (LAMP)', 'jnh-main.jpg', 'jnh-main.jpg', 2016),
(5, 'web', 'PHP Example Website', 'Designed and developed (LAMP)', 'php-class-site.jpg', 'php-class-site.jpg', 2009),
(6, 'web', 'Air Emission Reporting System', 'Designed, developed, and maintained (LAMP)', 'jnh-air-emission-report.jpg', 'jnh-air-emission-report.jpg', 2014),
(7, 'web', 'Compliance Files', 'Designed, developed, and maintained (LAMP)', 'jnh-compliance-files.jpg', 'jnh-compliance-files.jpg', 2015),
(8, 'web', 'Dashboard', 'Designed, developed, and maintained (LAMP)', 'jnh-dashboard.jpg', 'jnh-dashboard.jpg', 2015),
(10, 'web', 'Groundwater Direction Calculator', 'Designed, developed, and maintained (LAMP)', 'jnh-groundwater.jpg', 'jnh-groundwater.jpg', 2005),
(11, 'web', 'Safety Data Sheet Info', 'Designed, developed, and maintained (LAMP)', 'jnh-sds-info.jpg', 'jnh-sds-info.jpg', 2016),
(12, 'web', 'Set User Group', 'Designed, developed, and maintained (LAMP)', 'jnh-set-user-groups.jpg', 'jnh-set-user-groups.jpg', 2015),
(13, 'web', 'Training System', 'Designed, developed, and maintained (LAMP)', 'jnh-training.jpg', 'jnh-training.jpg', 2015),
(14, 'web', 'Waste Labeling System', 'Designed, developed, and maintained (LAMP)', 'jnh-waste-label.jpg', 'jnh-waste-label.jpg', 2015),
(15, 'web', 'Game Development Website', 'Designed, developed, and maintained (LAMP)', 'game-dev-site3.jpg', 'game-dev-site3.jpg', 2006),
(16, 'web', 'Game Development Website', 'Designed, developed, and maintained (LAMP)', 'game-dev-site2.jpg', 'game-dev-site2.jpg', 2005),
(17, 'web', 'Game Development Website', 'Designed, developed, and maintained (LAMP)', 'game-dev-site.jpg', 'game-dev-site.jpg', 2005),
(18, 'web', 'Trailside Lodge', 'Designed and developed (HTML and CSS)', 'trailside-logde.jpg', 'trailside-logde.jpg', 2003),
(19, 'art', 'Hyena', 'Painted (Wood Stain)', 'hyena-on-wood.jpg', 'hyena-on-wood.jpg', 2015),
(20, 'art', 'John L Norris Art Center', 'Painted (Watercolors)', 'john-l-norris-art-center.jpg', 'john-l-norris-art-center.jpg', 2005),
(21, 'art', 'Self Portrait', 'Digital Design', 'portrait.jpg', 'portrait.jpg', 2010),
(22, 'art', 'Train Demo', 'Digital Design (Rendered on PSP&reg;)', 'train-demo.jpg', 'train-demo.jpg', 2005),
(23, 'art', 'Hamsa The All-Seeing', 'Painted (Arcylic)', 'hansen-the-all-seeing.jpg', 'hansen-the-all-seeing.jpg', 2015),
(24, 'art', NULL, 'Painted (Arcylic)', 'conscience.jpg', 'conscience.jpg', 2012),
(25, 'art', 'Oni Form', 'Digital Design (Photoshop)', 'oni-form.jpg', 'oni-form.jpg', 2012),
(26, 'art', 'Ace of Spades', 'Painted (Arcylic)', 'ace-of-spades.jpg', 'ace-of-spades.jpg', 2012),
(27, 'art', 'JNH Logo', '3D Digital Design (Sketchup, Kerkythea, etc.)', 'jnh-logo.jpg', 'jnh-logo.jpg', 2015),
(28, 'art', 'Seedling', 'Painted (Sketch Mix Media)', 'seedling.jpg', 'seedling.jpg', 2011),
(29, 'art', 'Computing Monster', 'Painted (Mixed Media)', 'computing-monster.jpg', 'computing-monster.jpg', 2011),
(30, 'art', 'Taken', 'Digital Design (Photoshop)', 'taken.jpg', 'taken.jpg', 2009),
(31, 'art', 'Roy Wind', 'Painted (Pen and Ink)', 'roy-wind.jpg', 'roy-wind.jpg', 2003),
(32, 'art', 'Dirty Toilet', 'Digital Design (Photoshop)', 'dirty-toilet.jpg', 'dirty-toilet.jpg', 2008),
(33, 'art', 'Random Landscape', 'Digital Design (Photoshop)', 'random-landscape-design.jpg', 'random-landscape-design.jpg', 2008),
(34, 'art', 'Sword', '3D Sculpture (Zbrush)', 'fathers-sword.jpg', 'fathers-sword.jpg', 2016),
(35, 'art', NULL, 'Digital Design (mspaint.exe)', 'lacking-spirit.jpg', 'lacking-spirit.jpg', 2003),
(36, 'art', 'Pick My Brain', 'Digital Design (Photoshop)', 'pick-my-brain.jpg', 'pick-my-brain.jpg', 2008),
(38, 'art', 'Playing Dead', 'Digital Design (Photoshop)', 'playing-dead.jpg', 'playing-dead.jpg', 2010),
(39, 'game', 'HUD', 'Digital Design (Photoshop)', 'hud.jpg', 'hud.jpg', 2005),
(40, 'game', 'Project Vercon', 'Digital Desigin (Illustrator)', 'vercon-parts.jpg', 'vercon-parts.jpg', 2004),
(41, 'game', 'Character Design', 'Digital Design (Photoshop)', 'a-true-oni.jpg', 'a-true-oni.jpg', 2008),
(42, 'game', 'Level Editor', 'Programmed (C#)', 'level-editor1.png', 'level-editor1.jpg', NULL),
(43, 'game', 'Level Editor', 'Programmed (C#)', 'level-editor2.png', 'level-editor2.jpg', NULL),
(44, 'game', 'Window Large Sprite', 'Digital Design', 'window_large.png', 'window_large.jpg', 2005),
(45, 'game', 'Walls Sprite', 'Digital Design', 'wall-type.png', 'wall-type.jpg', 2005),
(46, 'game', 'Tileset Sprites', 'Digital Design', 'tileset-demo.png', 'tileset-demo.jpg', 2005),
(47, 'game', 'Seat Sprite', 'Digital Design', 'seat.png', 'seat.jpg', 2005),
(48, 'game', 'Game Screenshot', 'Digital Design (Rendered on PSP&reg;)', 'screenshot3.png', 'screenshot3.jpg', 2005),
(49, 'game', 'Game Screenshot', 'Digital Design (Rendered on PSP&reg;)', 'screenshot2.png', 'screenshot2.jpg', 2005),
(50, 'game', 'Game Screenshot', 'Digital Design (Rendered on PSP&reg;)', 'screenshot1.png', 'screenshot1.jpg', 2005),
(51, 'game', 'Nightstand Sprite', 'Digital Design', 'nightstand.png', 'nightstand.jpg', 2005),
(52, 'game', 'ISO Character Design', 'Digital Design', 'iso-character.png', 'iso-character.jpg', 2005),
(53, 'game', 'PSP Font (Built Font Lib in SDK)', 'Digital Design', 'font.png', 'font.jpg', 2005),
(54, 'game', 'Chest Sprite', 'Digital Design', 'chest.png', 'chest.jpg', 2005),
(55, 'game', 'Bed Sprite', 'Digital Design', 'bed.png', 'bed.jpg', 2005),
(56, 'robot', 'Teaching Robot to Find a Square Root', 'Designed and Programmed (KARNEL)', 'squareroot.jpg', 'squareroot.jpg', 2009),
(57, 'robot', 'Cut All Suite', 'Designed and Programmed (ASP.Net, VB.Net, KARNEL, FANUC, HTML, CSS, etc.)', 'cut-all.jpg', 'cut-all.jpg', 2009),
(58, 'robot', 'Robot Controller Setup', NULL, 'computer-controller.jpg', 'computer-controller.jpg', 2009),
(59, 'web', 'Hazardous Waste Shipping System', 'Designed, developed, and maintained (LAMP)', 'manifest.jpg', 'manifest.jpg', 2015),
(61, 'web', 'Demonstration of SSH Access Using SSH Keys ', 'SSH, Putty, BASH, Pageant', 'ssh.jpg', 'ssh.jpg', 2016),
(62, '', 'Castleton State College CMS Proposal', 'Wordpress (PHP, HTML, CSS)', 'castleton.jpg', 'castleton.jpg', 2012),
(63, 'web', 'Castleton State College CMS Proposal', 'Wordpress (PHP, HTML, CSS)', 'castleton.jpg', 'castleton.jpg', 2012),
(64, 'game', '3D Game Engine', 'MySQL, HTML5, Javascript', 'javascript-game-engine.jpg', 'javascript-game-engine.jpg', 2016),
(65, 'robot', 'Formula Example', 'Pen Paper, et al.', 'robot-calc-e.jpg', 'robot-calc-e.jpg', 2009),
(66, 'game', 'Menu Design WIP', 'Digital Design - Fireworks', 'menu-design1.jpg', 'menu-design1.jpg', 2006),
(67, 'art', 'Death Valley Unfinished', 'Acrylic', 'death-valley.jpg', 'death-valley.jpg', 2012),
(68, 'art', 'MrHeroux Logo Design', '3D Sculpture', 'hx-logo-design.jpg', 'hx-logo-design.jpg', 2016),
(69, '', 'PSP Game Engine Render Lava', 'Lua (PSP Game Engine)', 'render-lava-level.jpg', 'render-lava-level.jpg', 2006),
(70, '', 'Tileset Lava Test', NULL, 'render-lava.jpg', 'render-lava.jpg', 2005),
(71, 'game', 'PSP Game Engine Render Lava', 'Lua (PSP Game Engine)', 'render-lava-level.jpg', 'render-lava-level.jpg', 2006),
(72, 'game', 'Tileset Lava Test', NULL, 'render-lava.jpg', 'render-lava.jpg', 2005),
(73, 'game', 'Character Low Polygon 3D Design', '3D Sculpture (Blender)', 'character-blender.jpg', 'character-blender.jpg', 2006),
(74, 'art', 'Ouroboros Sketch', 'Photoshop and Wacom Intuos 4', 'line-practice.jpg', 'line-practice.jpg', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_tag_id`, `post_id`, `tag_id`, `last_modified`) VALUES
(1, 1, 1, '2016-08-02 16:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `date`, `last_modified`) VALUES
(1, 'Choosing Colors For Your Web Page', '<p>In general, it is recommended that a website should follow the 60/30/10 rule. This refers to the practice of using one color for 60% of the page, one color for 30%, and one color for 10%. The 10% is used for call to actions, such as my shopping cart. This practice makes balancing your color pallet easier. Of course, there are exception to this rule, such as with sites featuring deserve images.</p><p>Another good idea, is to consider using your company\'s colors. If they work it will help add cohesion to your marketing.</p><p>Now there are a lot of colors to choose from. For this site, currently I picked blue for a number of reasons, including</p><ul><li>Between different genders, the most preferred color is blue.</li><li>Blue symbolizes trust, loyalty, wisdom, confidence, intelligence, faith, truth, and heaven.</li><li>Blue is considered beneficial to the mind and body.</li></ul><p>In short, always you should always consider the meaning of the colors you are representing.</p>', '2016-08-02 00:00:00', '2016-08-02 16:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `title`, `last_modified`) VALUES
(1, 'Web Design and Development', '2016-08-02 16:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_authentication`
--

CREATE TABLE `user_authentication` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remote_address` varchar(255) DEFAULT NULL,
  `authenticated` tinyint(1) DEFAULT NULL,
  `sign_in_time` datetime DEFAULT NULL,
  `sign_out_time` datetime DEFAULT NULL,
  `stay_signed_in` tinyint(1) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authentication`
--

INSERT INTO `user_authentication` (`id`, `user_id`, `remote_address`, `authenticated`, `sign_in_time`, `sign_out_time`, `stay_signed_in`, `token`, `timestamp`) VALUES
(12, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 00:56:29'),
(11, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-18 03:54:21'),
(10, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-18 03:54:16'),
(9, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-18 03:51:36'),
(8, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-18 03:49:57'),
(7, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-18 03:48:31'),
(13, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 00:56:59'),
(14, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 00:57:08'),
(15, 3, '127.0.0.1', 0, NULL, '2017-06-03 12:58:08', NULL, NULL, '2017-04-19 01:23:21'),
(16, 3, '127.0.0.1', 1, '2017-04-18 21:24:04', '2017-06-03 20:28:57', 0, NULL, '2017-04-19 01:24:04'),
(17, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 02:39:52'),
(18, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 02:40:01'),
(19, 3, '127.0.0.1', 1, '2017-04-18 22:40:19', '2017-06-03 23:33:03', 0, NULL, '2017-04-19 02:40:19'),
(20, 3, '127.0.0.1', 1, '2017-04-18 22:50:07', '2017-06-12 20:30:15', 0, NULL, '2017-04-19 02:50:07'),
(21, 3, '127.0.0.1', 1, '2017-04-18 22:52:15', NULL, 0, NULL, '2017-04-19 02:52:15'),
(22, 3, '127.0.0.1', 1, '2017-04-18 22:56:10', NULL, 0, NULL, '2017-04-19 02:56:10'),
(23, 3, '127.0.0.1', 1, '2017-04-18 22:57:58', NULL, 0, NULL, '2017-04-19 02:57:58'),
(24, 3, '127.0.0.1', 1, '2017-04-18 23:06:41', NULL, 0, NULL, '2017-04-19 03:06:41'),
(25, 3, '127.0.0.1', 1, '2017-04-18 23:09:52', NULL, 0, NULL, '2017-04-19 03:09:52'),
(26, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 03:23:57'),
(27, NULL, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-04-19 03:24:02'),
(28, 3, '127.0.0.1', 1, '2017-04-18 23:24:11', NULL, 0, NULL, '2017-04-19 03:24:11'),
(29, 3, '127.0.0.1', 1, '2017-04-20 20:52:26', NULL, 0, NULL, '2017-04-21 00:52:26'),
(30, 3, '127.0.0.1', 1, '2017-04-20 22:40:30', NULL, 0, NULL, '2017-04-21 02:40:30'),
(31, 3, '127.0.0.1', 1, '2017-06-03 11:58:01', NULL, 0, NULL, '2017-06-03 15:58:01'),
(32, 3, '127.0.0.1', 1, '2017-06-03 12:41:15', NULL, 0, NULL, '2017-06-03 16:41:15'),
(33, 3, '127.0.0.1', 1, '2017-06-03 19:53:08', NULL, 0, NULL, '2017-06-03 23:53:08'),
(34, 3, '127.0.0.1', 1, '2017-06-03 20:29:06', NULL, 0, NULL, '2017-06-04 00:29:06'),
(35, 3, '127.0.0.1', 1, '2017-06-03 23:28:56', NULL, 0, NULL, '2017-06-04 03:28:56'),
(36, 3, '127.0.0.1', 1, '2017-06-03 23:33:16', NULL, 0, NULL, '2017-06-04 03:33:16'),
(37, 3, '127.0.0.1', 1, '2017-06-04 09:57:37', NULL, 0, NULL, '2017-06-04 13:57:37'),
(38, 3, '127.0.0.1', 1, '2017-06-04 12:05:10', NULL, 0, NULL, '2017-06-04 16:05:10'),
(39, 3, '127.0.0.1', 1, '2017-06-04 18:24:23', NULL, 0, NULL, '2017-06-04 22:24:23'),
(40, 3, '127.0.0.1', 1, '2017-06-04 21:21:45', NULL, 0, NULL, '2017-06-05 01:21:45'),
(41, 3, '127.0.0.1', 1, '2017-06-05 19:09:31', NULL, 0, NULL, '2017-06-05 23:09:31'),
(42, 3, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-06-06 00:26:02'),
(43, 3, '127.0.0.1', 1, '2017-06-05 20:26:11', NULL, 0, NULL, '2017-06-06 00:26:11'),
(44, 3, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-06-06 01:56:44'),
(45, 3, '127.0.0.1', 1, '2017-06-05 21:56:54', NULL, 0, NULL, '2017-06-06 01:56:54'),
(46, 3, '127.0.0.1', 1, '2017-06-07 20:01:27', NULL, 0, NULL, '2017-06-08 00:01:27'),
(47, 3, '127.0.0.1', 1, '2017-06-08 19:08:46', NULL, 0, NULL, '2017-06-08 23:08:46'),
(48, 3, '127.0.0.1', 0, NULL, NULL, NULL, NULL, '2017-06-13 00:16:05'),
(49, 3, '127.0.0.1', 1, '2017-06-12 20:16:20', NULL, 0, NULL, '2017-06-13 00:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_members`
--

CREATE TABLE `user_group_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE `user_group_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `permission` tinyint(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `grantable` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether user can assign',
  `active` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `postal_code` varchar(25) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `office_number` varchar(50) DEFAULT NULL,
  `fax_number` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `home_number` varchar(50) DEFAULT NULL,
  `salt` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(92) CHARACTER SET utf8 NOT NULL,
  `timezone` varchar(50) CHARACTER SET utf8 DEFAULT 'US/Eastern',
  `dateformat` varchar(100) DEFAULT NULL,
  `timeformat` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `company`, `job_title`, `lat`, `lng`, `street_address`, `locality`, `region`, `postal_code`, `country`, `office_number`, `fax_number`, `mobile_number`, `home_number`, `salt`, `password`, `timezone`, `dateformat`, `timeformat`, `timestamp`) VALUES
(3, 'admin', 'admin@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '686a6345c775992ef897e5e75b017bcd', '$6$50$MWonXqsDeUy7gjEz3FUlqWcrjAr2rB166sdK0/Ktc2lVykokmsvxbFKHwwYBwu4u3EMVJG6tb7LBR6gAFzcCn/', 'US/Eastern', 'F j, Y', 'g:i a', '2014-03-21 09:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `node_alias`
--
ALTER TABLE `node_alias`
  ADD PRIMARY KEY (`alias_id`);

--
-- Indexes for table `node_permission`
--
ALTER TABLE `node_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_tag_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user_authentication`
--
ALTER TABLE `user_authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_members`
--
ALTER TABLE `user_group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `item_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `node_alias`
--
ALTER TABLE `node_alias`
  MODIFY `alias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `node_permission`
--
ALTER TABLE `node_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `post_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_authentication`
--
ALTER TABLE `user_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `user_group_members`
--
ALTER TABLE `user_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;--
-- Database: `mqbtg`
--
CREATE DATABASE IF NOT EXISTS `mqbtg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mqbtg`;

-- --------------------------------------------------------

--
-- Table structure for table `action_queue`
--

CREATE TABLE `action_queue` (
  `action_queue_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `category` enum('wait','action','recovery') DEFAULT NULL,
  `expiration` datetime DEFAULT NULL,
  `bonus` int(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_queue`
--

INSERT INTO `action_queue` (`action_queue_id`, `char_id`, `action_id`, `category`, `expiration`, `bonus`, `timestamp`) VALUES
(1, 1, 1, 'action', '2016-08-19 18:18:55', 9, '2016-08-19 23:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `action_id` int(2) NOT NULL,
  `name` varchar(28) DEFAULT NULL,
  `description` varchar(230) DEFAULT NULL,
  `wait_type` enum('dynamic','static') NOT NULL,
  `wait_time` time DEFAULT NULL,
  `action_type` enum('dynamic','static') NOT NULL,
  `action_time` time DEFAULT NULL,
  `recovery_type` enum('dynamic','static') NOT NULL,
  `recovery_time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`action_id`, `name`, `description`, `wait_type`, `wait_time`, `action_type`, `action_time`, `recovery_type`, `recovery_time`) VALUES
(55, 'Gluttonous Desire', 'Comsumer food items twice as fast.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(56, 'Blood Lust', 'Speed in battle increased.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(57, 'Greedy Intent', 'Gain 5% more experience than party.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(58, 'Sloth Composure', 'Blows taken when not doing action are halved', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(59, 'Envious of Combat', 'Gain more rage from watching combat.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(60, 'Restoring Aura', 'Allies withing 5 foot radius slowly gain life. 1/2 of Spirit per/sec', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(61, 'Resurrect', 'Cures Lifeless', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(62, 'Cure', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(63, 'Heal', 'Restore life to one target', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(64, 'Heal All', 'Restore life to all nearby targets', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(65, 'Cheer', 'Targets Spirit increases by 10% for a duration', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(66, 'Support', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(67, 'Hope', 'The most powerful status bonus', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(68, 'Inspire', 'Increases target Drive gauge', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(69, 'Strike', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(70, 'Double Back flip \r\nBack flip', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(71, 'Back flip', 'Quickly move backwards', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(72, 'Prepare Food', '\r\nPrepare food', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(73, 'Bake', 'Create Consumables from Recipes', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(74, 'Improved Dodging', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(75, 'Quick', ' Increase movement speed', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(76, 'Darkness', ' Decrease the area that your opponent can see.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(77, 'Fighter', 'Double Strike', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(78, 'Block', 'Block enemies with wielding item. Preventing Crital Attacks from doing additional damage', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(79, 'Cleave', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(80, 'Oni', ' Become engulfed in a blood thirsty rage that multiplies your power but drains spirit. If character stays in Oni too long they will go Berserk.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(81, 'True Oni', 'Become engulfed in a more powerful blood thirsty rage that multiplies your power but drains spirit. If character stays in Oni too long they will go Berserk. Player must have very little life left and max Drive in order to perform.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(82, 'Climb', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(83, 'Trek', 'Used to determine how steep an angled tile you can stand on. If your character fails to trek the tile then they will fall from it and will be to step onto it.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(84, 'Duck', '(Hold Square + Backwards?) used to evaded attacks works best if preformed during attack.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(85, 'Jump', '(Square) Jumping uses stamina and can be used to move to otherwise unreachable places. The more stamina', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(86, 'High Jump', 'Charged vertical jump', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(87, 'Long Jump', 'Jump a long way (different than running?)', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(88, 'Running Jump', 'Running while jumping', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(89, 'Swim', 'Must be learned', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(90, 'Dive', 'Take a breath and dive down based on stamina', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(91, 'Run', 'Move quickly using stamina', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(92, 'Walk', 'Moving slowly', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(93, 'Fly', 'magic person?', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(49, 'Cheer', 'Targets Spirit increases by 10% for a duration.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(50, 'Support', 'The most powerful status bonus', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(51, 'Bluff', 'Deceive a character.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(52, 'Sense Bluff', 'Detect if someone is lying (indicated by a icon when character is talking)', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(53, 'Wraftful Blow', 'If a player holds down the button for a basic attack move they will do additional physical damage at the cost of Life to the Berserker. The longer they hold down the button the more Life will be taken in the exchange.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(54, 'Undying Pride', 'Gain Rage twice as fast when attacked.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(3, 'Scout', 'Break away from party', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(4, 'Scan', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(5, 'Search', 'Look for items', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(6, 'Guard', 'Protect ally from attack', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(7, 'Protect', 'same as guard?', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(8, 'Focus', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(9, 'Parry', 'Attack someones attack to block', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(10, 'Order/Command', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(11, 'Formation', 'Get in predifend organization', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(12, 'Boast/Rally/Inspire', 'Increase allies determination', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(13, 'Liberate', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(14, 'Disobey', 'Block a command', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(15, 'Cleave lv2', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(16, 'Protect', 'Guard an ally', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(17, 'Desolate', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(18, 'Rage', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(19, 'Tsunami', 'Water attack', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(20, 'Quake', 'Shake earth', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(21, 'Stop', 'Freeze oppoint', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(22, 'Slow', 'Slows oppent down', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(23, 'Haste', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(24, 'Charm, Chill', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(25, 'Quake', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(26, 'Blizzard', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(28, 'Frost', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(29, 'Chill', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(30, 'Absorb', 'Aborb the targets life', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(31, 'Drain', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(32, 'Summon', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(33, 'Dismiss', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(34, 'Command', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(35, '', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(36, 'Dual Weld', 'Can use two one handed weapons at once. Both malace and penny can learn this.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(37, '', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(38, '', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(39, 'Doom', 'Inflicts Doomed', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(40, '', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(41, '', '', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(42, 'Craft', 'Combined multiple items into one.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(43, 'Ward', 'Keep enemies from getting close. (Good for when party is powering up)', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(44, 'Seal', 'Keep enemies from getting close. (Good for when party is powering up)', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(45, 'Reflect', 'Send enemies moves back at them.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(46, 'Lullaby', 'Send enemies moves back at them.', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(47, 'Light', 'Keep enemies from moving for a duration of time.– chance Puts enemy to sleep. Stops rage', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(48, 'Protection', ' Create a barrier around a ally', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL),
(1, 'Command', 'telling a part member what to do.', 'dynamic', '00:00:01', 'dynamic', '00:00:01', 'dynamic', '00:00:01'),
(2, 'Cleave', 'Slash teqiuqe', 'dynamic', NULL, 'dynamic', NULL, 'dynamic', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `afflictions`
--

CREATE TABLE `afflictions` (
  `affliction_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `expires` tinyint(1) DEFAULT NULL,
  `description` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `afflictions`
--

INSERT INTO `afflictions` (`affliction_id`, `name`, `expires`, `description`, `timestamp`) VALUES
(1, 'weak', NULL, 'to weak to move', '2016-08-19 07:00:00'),
(2, 'clumsy', NULL, 'to clumsy to move', '2016-08-19 16:11:04'),
(3, 'fatique', NULL, 'to fatigue to move', '2016-08-19 16:11:04'),
(4, 'feeble', NULL, 'To feeble minded to move', '2016-08-19 16:11:04'),
(5, 'spiritless', NULL, 'Without the morale to move', '2016-08-19 16:11:04'),
(6, 'lost', NULL, 'Without the resolve to move', '2016-08-19 16:11:04'),
(7, 'lifeless', NULL, '', '2016-08-19 23:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `char_actions`
--

CREATE TABLE `char_actions` (
  `char_action_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `special_affect` varchar(255) NOT NULL,
  `wait_modifier` decimal(5,3) DEFAULT NULL,
  `action_modifier` decimal(5,3) DEFAULT NULL,
  `recovery_modifier` decimal(5,3) DEFAULT NULL,
  `completed` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `char_actions`
--

INSERT INTO `char_actions` (`char_action_id`, `char_id`, `action_id`, `special_affect`, `wait_modifier`, `action_modifier`, `recovery_modifier`, `completed`, `timestamp`) VALUES
(1, 1, 1, '', '0.500', '0.750', '1.000', 30, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `char_afflictions`
--

CREATE TABLE `char_afflictions` (
  `char_affliction_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `affliction_id` int(11) NOT NULL,
  `expires` tinyint(1) NOT NULL,
  `expiration` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `char_afflictions`
--

INSERT INTO `char_afflictions` (`char_affliction_id`, `char_id`, `affliction_id`, `expires`, `expiration`, `timestamp`) VALUES
(1, 2, 7, 0, NULL, '2016-08-19 23:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `char_stats`
--

CREATE TABLE `char_stats` (
  `char_stat_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `life_value` int(11) DEFAULT NULL,
  `life_max` int(11) DEFAULT NULL,
  `life_mod` int(11) DEFAULT NULL,
  `drive_value` int(11) DEFAULT NULL,
  `drive_max` int(11) DEFAULT NULL,
  `drive_mod` int(11) DEFAULT NULL,
  `strength_value` int(11) DEFAULT NULL,
  `strength_max` int(11) DEFAULT NULL,
  `strength_mod` int(11) DEFAULT NULL,
  `agility_value` int(11) DEFAULT NULL,
  `agility_max` int(11) DEFAULT NULL,
  `agility_mod` int(11) DEFAULT NULL,
  `stamina_value` int(11) DEFAULT NULL,
  `stamina_max` int(11) DEFAULT NULL,
  `stamina_mod` int(11) DEFAULT NULL,
  `intellect_value` int(11) DEFAULT NULL,
  `intellect_max` int(11) DEFAULT NULL,
  `intellect_mod` int(11) DEFAULT NULL,
  `spirit_value` int(11) DEFAULT NULL,
  `spirit_max` int(11) DEFAULT NULL,
  `spirit_mod` int(11) DEFAULT NULL,
  `charisma_value` int(11) DEFAULT NULL,
  `charisma_max` int(11) DEFAULT NULL,
  `charisma_mod` int(11) DEFAULT NULL,
  `luck_value` int(11) DEFAULT NULL,
  `luck_max` int(11) DEFAULT NULL,
  `luck_mod` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `char_stats`
--

INSERT INTO `char_stats` (`char_stat_id`, `char_id`, `life_value`, `life_max`, `life_mod`, `drive_value`, `drive_max`, `drive_mod`, `strength_value`, `strength_max`, `strength_mod`, `agility_value`, `agility_max`, `agility_mod`, `stamina_value`, `stamina_max`, `stamina_mod`, `intellect_value`, `intellect_max`, `intellect_mod`, `spirit_value`, `spirit_max`, `spirit_mod`, `charisma_value`, `charisma_max`, `charisma_mod`, `luck_value`, `luck_max`, `luck_mod`) VALUES
(1, 1, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10),
(2, 2, 0, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `chars`
--

CREATE TABLE `chars` (
  `char_id` int(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `hair_color` varchar(12) DEFAULT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `biography` longtext,
  `symbolic` varchar(25) DEFAULT NULL,
  `spirit_animal` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chars`
--

INSERT INTO `chars` (`char_id`, `first_name`, `last_name`, `alias`, `hair_color`, `weight`, `biography`, `symbolic`, `spirit_animal`) VALUES
(1, 'Meeku', 'Oni', 'Kid, Brother,', 'Brown', '136.000', 'A boy who has lost his way', 'Humility', 'Hawk'),
(2, 'Loomee', 'Angora', 'The Keeper of Heart, The Song Maiden', 'Light Blonde', '110.000', 'governs and protects his heart to make sure it isn\'t lost.', 'Chastity', 'Turkish Angora'),
(3, 'Traez', 'Uthsha', '', 'Green', '96.700', 'Rebel fighter. Good with mechanical devices', 'Diligence', ''),
(4, 'Malace', 'Tsia', 'Sacrifice, Ouroboros, The Bringer of Death', 'Black', '182.000', '', 'Desire to Die', 'Dragon'),
(5, 'Gunter', 'Stonewell', '', 'Gray', '326.000', '', 'Patience', ''),
(6, 'Penny', 'Kibbutz', '', 'Red', '146.000', '', 'Kindness', ''),
(7, 'Faye', 'Imago', '', 'Light Violet', '86.000', '', 'Charity', ''),
(8, 'Gaali', 'Runewin', '', 'White', '163.000', 'Is a prince that has little interest in becoming king. He lives on for perfecting his sword plan.', 'Temperance', ''),
(10, 'Genki', '', '', '', '0.000', '', 'Wrath', 'Fish'),
(11, 'Lawzon', '', '', '', '210.000', '', 'Sloth', 'Wolf'),
(12, 'Mahdi', 'Tsia', '', 'Black', '212.200', 'when the world is about to end he is its savor', '', 'Chameleon'),
(13, 'Suyri', '', '', '', '128.000', '', 'Luxury (later lust)', 'Fox'),
(14, 'Wisp', '', '', '', '0.000', 'uses strong magical powers', 'Gluttony', 'Henya'),
(15, 'Asmin', '', '', '', '356.000', '', 'Pride', 'Ox'),
(16, 'Diag', '', '', '', '0.000', '', 'Envy', 'Snake'),
(17, 'Janus', '', 'The Keeper of Time', '', '156.000', 'governs the flow of time he\'s been in this state.', '', ''),
(18, 'Mischievous', '', 'The Keeper of Law', '', '10.000', 'governs the logical of this realm.', '', 'Cat'),
(19, 'Ouern', 'Oni', 'Plague', '', '0.000', 'Meeku and Vallon\'s dad. He who was foretold to create the plague that will wipe all things from this world', '', ''),
(20, 'Vallon', 'Oni', 'Brother,', '', '196.000', '', 'Desire to live', ''),
(21, 'Monarch', '', 'The Deadly One', '', '0.000', '', '', ''),
(22, 'Wooden', 'Person', NULL, NULL, '130.000', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `damage_types`
--

CREATE TABLE `damage_types` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(8) DEFAULT NULL,
  `COL 3` varchar(46) DEFAULT NULL,
  `COL 4` varchar(6) DEFAULT NULL,
  `COL 5` varchar(17) DEFAULT NULL,
  `COL 6` varchar(13) DEFAULT NULL,
  `COL 7` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `damage_types`
--

INSERT INTO `damage_types` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`) VALUES
(1, 'Nature', 'this is the damage type modifier for nature', 'Growth', 'fire', '', ''),
(2, 'Electric', 'this is the damage type modifier for lightning', 'Shock', 'Earth', 'Water, Nature', 'Psychic'),
(3, 'Fire', 'this is the damage type modifier for fire', 'Burn', 'Water', '', 'Light'),
(4, 'Water', 'this is the damage type modifier for water', '', 'Water', 'Earth', 'Nature'),
(5, 'Air', 'this is the damage type modifier for wind', '', 'Electric', 'Water', 'Fire'),
(6, 'Earth', 'this is the damage type modifier for earth', '', 'Air', '', ''),
(7, 'Unholy', 'this is the damage type modifier for darkness.', '', 'Unholy', 'Holy', ''),
(8, 'Holy', 'this is the damage type modifier for light.', '', 'Water', 'Unholy', 'Nature'),
(9, 'Physical', 'this is the damage type modifier for physical.', '', 'Fire, Air, Water,', '', ''),
(10, 'Psychic', 'this is the damage type modifier for psychic', '', 'Physical', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(16) DEFAULT NULL,
  `COL 3` varchar(411) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`COL 1`, `COL 2`, `COL 3`) VALUES
(17, 'Guard', 'Specializes in protecting other players'),
(20, 'Knight', 'A rank of Solider > Guard > Knight given to those who choice an allaince to a kingdom'),
(21, 'Gymnast', 'This Discipline helps improve a characters agility, speed, and coordination.'),
(22, 'Possessed', 'Possessed learning how to control the Demons sealed inside them. The Possessed lure these demons out from the pit of their soul by letting the barrier surrounding their soul down while there is the scent of human blood present. They try to remain in control while the Demon(s) feed off their Spirit in order to gain its abilities for the duration. If they lose control however the demon will consume their soul.'),
(23, 'Engineer', 'This is a Discipline that focuses on learning to use and create technologically advanced items. Progression within this Discipline is heavily based on Intelligence.'),
(1, 'Thief', 'This is a Discipline which focuses on stealing items from others, picking locks and pockets. Its is heavily basted on the characters Charisma, Agility, Intellect stats.'),
(2, 'Body Builder', 'building additional strength for the character. This Discipline comes with large upgrades to a characters Strength and Stamina stats. This does not help build Agility however so they will have a high health and very damaging attacks but slow.'),
(3, 'Guard', 'This is a Discipline which focuses on holding enemies off and slowly defeating them.'),
(4, 'Engineer', 'This is a Discipline that focuses on learning to use and create technologically advanced items. Progression within this Discipline is heavily based on Intelligence.'),
(5, 'Lightning Master', 'This is a Discipline that focuses on using electricity with martial arts.'),
(6, 'Ninja', 'This is a Discipline focuses on the craft of the Ninja. Ninja specialize in Assassination, Espionage, and Martial Arts.'),
(7, 'Amber Assassin', 'This Discipline focuses on the using the'),
(8, 'Historian', 'This Discipline focuses on studying items from the past to help better understand the present. This helps the character most of all build intelligence.'),
(9, 'Assassin (Mega)', ''),
(10, 'Wizard', ''),
(11, 'Bard', ''),
(12, 'Duelist', ''),
(13, 'Rune King', ''),
(14, 'Rebel', ''),
(15, 'Solider', 'Based upon strict maneuvers. Solider is a classed formed for followers of the United Forces. This class can be taken up by: Gunter, Meeku and Malace. Soldier - This is a Discipline which focuses on making the Soldier good at basic combat with his close range weapon. Soldiers are payed each month for their services.');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(23) DEFAULT NULL,
  `COL 3` varchar(113) DEFAULT NULL,
  `COL 4` varchar(40) DEFAULT NULL,
  `COL 5` int(2) DEFAULT NULL,
  `COL 6` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
(1, 'Gold Bracelets', 'Weighted gold bracelets that occupy both wrists meant to keep Meeku’s power at bay (increase experience earned)', '', 1, 'accessories'),
(3, 'Funeral Jar', 'A jar that contains the ashes of the dead', '', 2, 'accessories'),
(4, 'Sword sheath', 'a sheath meant to hold a broad sword.', 'allows sword to be put away when equiped', 3, 'accessories'),
(5, 'Magnetic Gloves', 'Improves catching metal objects and helps resist disarm', 'decrease chances of being disarmed', 4, 'accessories'),
(6, 'Catcher\'s Mitt', 'Improves catching small objects.', '+20% Catch Action', 5, 'accessories'),
(11, 'Catchers Mask', 'a mask warn to protect those who kill from being killers', '', 6, 'accessories'),
(21, 'Beret', 'a stylistic hat', '', 16, 'accessory'),
(22, 'Choker', 'a tight necklace', '', 17, 'accessory'),
(23, 'Slingback', 'a type of shoes', '', 18, 'accessory'),
(24, 'Chukkas', ' a pair of ankle length boots', '', 19, ''),
(25, 'Red Scarf', 'a red scarf knitted by Meeku’s mother to keep him warm.', '', 20, 'accessory'),
(26, 'Doublet', 'A fancy sleeveless jacket', '', 21, 'garment'),
(27, 'Breeches', 'A type of pants', '', 22, 'garment'),
(28, 'Rain Jacket', 'a waterproof jacket', '', 23, 'garment'),
(29, 'Galosh', 'water proof shoes', '', 24, ''),
(30, 'Sabot', 'completely wooden shoes', '', 25, ''),
(31, 'Geta', 'wooden soled shoes', '', 26, ''),
(32, 'Lava-lava', 'a rectangular piece of cloth tied around the waist printed with designs', '', 27, 'garment'),
(33, 'Red Tunic\r\nBlue\r\nBlack', '', '', 28, 'garment'),
(34, 'Blue Tunic\r\nBlue\r\nBlack', '', '', 29, 'garment'),
(35, 'Black Tunic', '', '', 30, 'garment'),
(36, 'Shawl', 'A garmet warn cloth warn over the shoulders', '', 31, 'garment');

-- --------------------------------------------------------

--
-- Table structure for table `gis`
--

CREATE TABLE `gis` (
  `gis_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `x_pos` decimal(65,3) NOT NULL,
  `y_pos` decimal(65,3) NOT NULL,
  `z_pos` decimal(65,3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gis`
--

INSERT INTO `gis` (`gis_id`, `character_id`, `x_pos`, `y_pos`, `z_pos`, `timestamp`) VALUES
(1, 1, '10.000', '10.000', '0.000', '2016-08-19 21:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `hit_types`
--

CREATE TABLE `hit_types` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(15) DEFAULT NULL,
  `COL 3` varchar(56) DEFAULT NULL,
  `COL 4` varchar(10) DEFAULT NULL,
  `COL 5` varchar(5) DEFAULT NULL,
  `COL 6` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hit_types`
--

INSERT INTO `hit_types` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
(2, 'Lethal Hit', 'Target becomes Lifeless', '', '', '100.'),
(3, 'Critical Hit 9x', '90% of Mortally Wounding target', '', '99.0', '91.0'),
(4, 'Critical Hit 8x', 'Damage Increased by 8', '', '90.0', '82.0'),
(5, 'Critical Hit 7x', 'Damage Increased by 7', '', '81.0', '73.0'),
(6, 'Critical Hit 6x', 'Damage Increased by 6', '', '72.0', '64.0'),
(7, 'Critical Hit 5x', 'Damage Increased by 5', '', '63.0', '55.0'),
(8, 'Critical Hit 4x', 'Damage Increased by 4', '', '54.0', '46.0'),
(9, 'Critical Hit 3x', 'Damage Increased by 3', '', '45.0', '37.0'),
(10, 'Critical Hit 2x', 'Damage Increased by 2', '', '36.0', '28.0'),
(11, 'Critical Hit', 'Damage Increased by 1', '', '27.0', '19.0'),
(12, 'Hit', '', '', '18.0', '10.0'),
(13, 'Minor Hit', '', '', '9.0', '1.0'),
(14, 'Skimmed', '', '', '0.0', '-9.0'),
(15, 'Miss', '', '', '10.0', '-18.'),
(16, 'Miss', '', '', '-19.0', '-27.'),
(17, 'Miss', 'chance of fear 2xDamages self', '', '-28.0', '-36.'),
(18, 'Miss', 'chance of fear 3xDamages self', '', '-37.0', '-45.'),
(19, 'Miss', 'chance of fear 4xDamages self', '', '-46.0', '-54.'),
(20, 'Miss', 'chance of fear 5xDamages self', '', '-55.0', '-63.'),
(21, 'Miss', 'chance of fear 6xDamages self', '', '-64.0', '-72.'),
(22, 'Miss', 'chance of fear 7xDamages self', '', '-73.0', '-81.'),
(23, 'Miss', 'chance of fear 8xDamages self', '', '-82.0', '-90.'),
(24, 'Miss', 'chance of fear 9x Damages self or being caught off guard', '', '-91.0', '-99.'),
(25, 'Miss', ' “Fear” Status Affliction to attacker Damages self', '', '-100.', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(16) DEFAULT NULL,
  `COL 3` varchar(61) DEFAULT NULL,
  `COL 4` varchar(56) DEFAULT NULL,
  `COL 5` varchar(2) DEFAULT NULL,
  `COL 6` int(2) DEFAULT NULL,
  `COL 7` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`) VALUES
(31, 'Tureen', 'Broad deep dish used for serving soup', '', '', 1, '1.0'),
(33, 'Solider Contract', '', '', '', 3, '3.0'),
(34, 'Train Ticket', 'This allows the Party to ride the Train', '', '0', 4, '99.'),
(35, 'Bandages', 'Helps cure Fatal Wounds', '', '', 5, '99.'),
(36, 'Waterskin', 'Eliminates fatigue caused in desert', '', '', 6, '1.0'),
(37, 'Grappling Hook', 'Enables party to reach high area or descend from an area', 'Can Set or Throw', '0', 28, ''),
(38, 'Bread', '', '', '0', 29, '99.'),
(39, 'Water', '', '', '0', 30, '99.'),
(40, 'Flour', '', '', '0', 31, '99.'),
(41, 'Egg', '', '', '0', 32, '99.'),
(42, 'Dango', 'Sweet rice balls on a stick', '', '0', 33, '99.'),
(43, 'Sugar', '', '', '0', 34, '99.'),
(44, 'Cake', '', '', '0', 35, '99.'),
(45, 'Hard Boiled Eggs', '', '', '0', 36, ''),
(46, 'Wood', '', '', '0', 37, ''),
(47, 'Flint', 'Used for fire starting', '', '10', 38, ''),
(48, 'Steel', 'Used for fire stating', '', '10', 39, ''),
(49, 'Fluer di lease', 'A large decorative fluer di lease (combined to create weapon)', '', '0', 40, ''),
(50, 'Chain', 'Used to make weapon', '', '0', 41, ''),
(2, '', 'tell which way north is on map', '', '10', 7, '1.0'),
(4, 'Bomb', 'an explosive Trap', '', '0', 8, '99.'),
(5, 'Time Bomb', 'a timed explosive Trap', '', '0', 9, '99.'),
(6, 'Caltrops', 'a spiked ground Trap - things you throw on the floor', '', '0', 10, '99.'),
(9, 'Dried Meat', 'restores 10% Life', '', '0', 11, '99.'),
(10, 'Rice Cake', 'restores 20% Life', '', '0', 12, '99.'),
(11, 'Apple', 'restores', '', '0', 13, '99.'),
(13, 'Red Mushroom', 'inflicts Berserk', '', '0', 14, '99.'),
(14, 'Blue Mushroom', 'cures Poison', '', '0', 15, '99.'),
(15, 'Escape Powder', 'cures Bound', '', '0', 16, '99.'),
(17, 'Tent', 'creates a tent for party to Rest.', '', '', 17, '1.0'),
(19, 'Ewer', 'a vase that looks valuable', '', '', 18, '99.'),
(20, 'Goblet', 'a cup that looks valuable', '', '', 19, '99.'),
(21, 'Opal', 'a round rock that looks valuable', '', '', 20, '99.'),
(23, 'Didgeridoo', 'a musical instrument used by the natives', '', '', 21, '1.0'),
(26, 'Cart ', '', 'Cart can be combined with Vachel', '', 23, '1.0'),
(27, 'Iron Rod', 'a rod of iron that looks worthless', '', '', 24, '1.0'),
(28, 'Keystone', 'a large stone that looks worthless', 'Keystone Weapon = Iron Rod + Keystone', '', 25, '1.0'),
(29, 'Timer', 'a timer that looks worthless', 'Time Bomb = Timer + Bomb', '', 26, '99.'),
(30, 'Training weight', 'a set of heavy weights that looks worthless', 'can be combined with weapon to improve experience gained', '', 27, '1.0');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` int(2) DEFAULT NULL,
  `COL 3` varchar(9) DEFAULT NULL,
  `COL 4` varchar(96) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`COL 1`, `COL 2`, `COL 3`, `COL 4`) VALUES
(1, 15, 'Grunt', ''),
(2, 15, 'X-Solider', 'Soliders who disobey their teaching to gain power'),
(3, 15, 'Scout', 'specialize in moving ahead of the part and reconnaissance. They can move farther from the party.'),
(4, 15, 'Commander', 'Specialize in giving orders to other party members and stratgies'),
(5, 10, 'Black', 'Void, destruction, emptiness'),
(6, 10, 'Blue', 'water, rage, rain'),
(7, 10, 'Brown', 'quake, earth'),
(8, 10, 'Pink', 'charm,'),
(9, 10, 'Yellow', 'drain, aborb'),
(10, 10, 'White', 'frost, cold'),
(11, 10, 'Green', 'time'),
(12, 10, 'Red', 'fire, burst');

-- --------------------------------------------------------

--
-- Table structure for table `resistance`
--

CREATE TABLE `resistance` (
  `resistance_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `encountered` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(6) DEFAULT NULL,
  `COL 3` varchar(8) DEFAULT NULL,
  `COL 4` varchar(7) DEFAULT NULL,
  `COL 5` varchar(8) DEFAULT NULL,
  `COL 6` varchar(110) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
(10, 'Gold', 'enabled', 'enabled', 'enabled', 'Character is aligned with party in all aspects (e.g. party member)'),
(11, 'Silver', 'enabled', 'enabled', 'hidden', 'Character is temporarily aligned with party. (e.g. summon - commands are only as successful as the skill)'),
(12, 'Copper', 'hidden', 'enabled', 'hidden', 'Character is not aligned with party and is visiting. (e.g. non player character, may only command known moves)'),
(14, 'Black', 'disabled', 'hidden', 'disabled', 'Character is unable to act. (e.g. dead, maybe you get a black token from every charcter you defeat)');

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE `weapons` (
  `weapon_id` int(2) DEFAULT NULL,
  `type` varchar(17) DEFAULT NULL,
  `name` varchar(18) DEFAULT NULL,
  `description` varchar(196) DEFAULT NULL,
  `COL 4` varchar(52) DEFAULT NULL,
  `COL 5` varchar(10) DEFAULT NULL,
  `COL 2` varchar(10) DEFAULT NULL,
  `COL 3` varchar(10) DEFAULT NULL,
  `COL 9` varchar(10) DEFAULT NULL,
  `COL 6` varchar(16) DEFAULT NULL,
  `COL 7` varchar(24) DEFAULT NULL,
  `COL 8` varchar(56) DEFAULT NULL,
  `COL 10` varchar(10) DEFAULT NULL,
  `COL 12` varchar(10) DEFAULT NULL,
  `COL 11` varchar(10) DEFAULT NULL,
  `COL 15` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weapons`
--

INSERT INTO `weapons` (`weapon_id`, `type`, `name`, `description`, `COL 4`, `COL 5`, `COL 2`, `COL 3`, `COL 9`, `COL 6`, `COL 7`, `COL 8`, `COL 10`, `COL 12`, `COL 11`, `COL 15`) VALUES
(36, 'Knife', 'Greed', ' This is a demon Malace receives from killing his brother.', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 'Broad Sword', 'Wooden Sword', 'This item deals Fatigue damage instead of life damage.', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 'Shield', 'Wooden Buckler', 'A round shield', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'Windmill Shuriken', '', 'should it be this or boomerang?', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'Kyoketsu Shoge', 'Fleur-de-lis', 'She can equipped two - Features a golden chain an a blade in the shape of a Fleur-de-lis.', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'Kyoketsu Shoge', 'Walnut', 'Made from the wood of a walnut tree this weapon deals duration damage', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 'Broad Sword', 'Stone Breaker', 'An extremely large and heavy weapon with a special guilloche handle for grip.', 'this should probably be stored under characters data', '', '', '', '', 'increased damage', 'slow, long recovery time', 'inreases xp gained', '', '', '', ''),
(9, 'Broad Sword', 'The Manslayer', 'Giant ancient hellish looking blade. It was used by Galax to bring peace until he turned on his own men now it is stained with the blood of over 5000 humans. Its handle bares a dogtooth design.', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Broad Sword', 'Hero\'s Blade', 'a mystical blade that is destine to fall into the hands of the next true hero.', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Broad Sword', 'Lawzon’s Sword', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'Broad Sword', 'Energy Breaker', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Knife', 'Viceroy', 'A brilliantly designed insect looking blade with a sharp and deadly tip. (The viceroy looks almost identical to the monarch).', '', '', '', '', '', '', '', 'Chance of causing Fear on contact when used with Monarch', '', '', '', ''),
(14, 'Knife', 'Monarch', 'A brilliantly designed insect looking blade with a sharp and deadly tip that drips with poison.', '', '', '', '', '', '', '', 'Chance of poisoning enemy on contact', '', '', '', ''),
(15, 'Knife', 'Liberty', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Knife', 'Wisp’s Knife', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Knife', 'Violated', 'weapon Absorbs the previous monsters type and uses it for the next attack. (This weapon must be used to slay a the most poisonous monster to get a poisonous tipped dagger and slay another monster)', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Pendant', 'Mysterious Pendant', 'Grants the user Ward', '', '', '', '', '', '', '', 'Grants Ward', '', '', '', ''),
(19, 'Pendant', 'Trouble Maker', 'Creates a hostle enemy', '', '', '', '', '', '', '', 'increase random encounters', '', '', '', ''),
(20, 'Pendant', 'Peace Keeper', 'Stops an emeny from being hostle', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Rapier', 'Eternal Fold', 'A sword that has been folded by generations of blacksmiths to create a flawless steel sword', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Rapier', 'Gold Rush', 'A golden color sword that looks more fitting on a wall then a battlefield.', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Rapier', 'Rusty Rapier', 'A rusty sword.', '', '', '', '', '', '', '', 'Chance of poisoning target.', '', '', '', ''),
(24, 'Rapier', 'The Kings’ Blade', 'One who posses this blade is king of Rudner.', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 'Boomerang', 'Assaulter', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Boomerang', 'Striker', 'An extremely fast and deadly boomerang.', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Kyoketsu Shoge', 'Standard Issue', 'A common weapon given to fascist.', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Axe', 'Keystone', 'A giant axe made of from a giant keystone with an iron bar stuck through it.', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Axe', 'Great Wail', 'A large axe that can break through bone and makes a loud sound when swung', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'Axe', 'Justice', 'Gunter’s trademark axe', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 'Axe', 'Asmin Axe', 'A axe that has one of the devils locked inside of it', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Staff', 'Tiny Timber', 'A basic staff given to Magi in training', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Staff', 'Caduceus', 'a staff with two serpents wrapped around it base and two wings that expand from its top.', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Staff', 'Antediluvian', 'Ancient weapon that slayed the devils of the old world', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Shield', 'Glass Shield', 'A shield made out of glass that is that looks easily broken', '', '', '', '', '', '', '', '', '', '', '', '1.'),
(NULL, 'Boomerang', 'Karma', 'Enemies next move has chance of hitting themselve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_queue`
--
ALTER TABLE `action_queue`
  ADD PRIMARY KEY (`action_queue_id`),
  ADD UNIQUE KEY `char_id` (`char_id`);

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `afflictions`
--
ALTER TABLE `afflictions`
  ADD PRIMARY KEY (`affliction_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `char_actions`
--
ALTER TABLE `char_actions`
  ADD PRIMARY KEY (`char_action_id`);

--
-- Indexes for table `char_afflictions`
--
ALTER TABLE `char_afflictions`
  ADD PRIMARY KEY (`char_affliction_id`);

--
-- Indexes for table `char_stats`
--
ALTER TABLE `char_stats`
  ADD PRIMARY KEY (`char_stat_id`);

--
-- Indexes for table `chars`
--
ALTER TABLE `chars`
  ADD PRIMARY KEY (`char_id`);

--
-- Indexes for table `gis`
--
ALTER TABLE `gis`
  ADD PRIMARY KEY (`gis_id`),
  ADD UNIQUE KEY `gis_id` (`gis_id`);

--
-- Indexes for table `resistance`
--
ALTER TABLE `resistance`
  ADD PRIMARY KEY (`resistance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_queue`
--
ALTER TABLE `action_queue`
  MODIFY `action_queue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `action_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `afflictions`
--
ALTER TABLE `afflictions`
  MODIFY `affliction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `char_actions`
--
ALTER TABLE `char_actions`
  MODIFY `char_action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `char_afflictions`
--
ALTER TABLE `char_afflictions`
  MODIFY `char_affliction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `char_stats`
--
ALTER TABLE `char_stats`
  MODIFY `char_stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chars`
--
ALTER TABLE `chars`
  MODIFY `char_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `gis`
--
ALTER TABLE `gis`
  MODIFY `gis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('phpmyadmin', '[{"db":"hoopless","table":"node_alias"},{"db":"hoopless","table":"user_groups"},{"db":"hoopless","table":"node"},{"db":"hoopless","table":"node_permission"},{"db":"hxcmsdb","table":"users"},{"db":"hxcmsdb","table":"user_authentication"},{"db":"hxcmsdb","table":"user_groups"},{"db":"hxcmsdb","table":"user_profile"},{"db":"hxcmsdb","table":"address_book"},{"db":"hxcmsdb","table":"node"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('phpmyadmin', 'hoopless', 'node', '{"CREATE_TIME":"2016-10-31 20:11:41","col_visib":["1","1","1","1","1","1","1","1","1","1","1","1","1"]}', '2017-04-19 03:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('phpmyadmin', '2016-10-25 01:21:01', '{"collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
