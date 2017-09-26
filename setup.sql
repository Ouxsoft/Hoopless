-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2017 at 09:18 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoopless`
--

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
(1, 'top-menu'),
(2, 'case-studies');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `item_id` int(11) NOT NULL,
  `menu_id` int(25) NOT NULL,
  `node_id` int(25) NOT NULL,
  `parent_id` int(25) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `weight` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`item_id`, `menu_id`, `node_id`, `parent_id`, `title`, `weight`) VALUES
(1, 1, 2, NULL, 'Portfolio', 0),
(2, 1, 12, 2, 'Web Dev', 2),
(3, 1, 13, 2, 'Design', 0),
(4, 1, 14, 2, 'Robotics', 1),
(5, 1, 15, 2, 'Game Design', 0),
(6, 1, 17, NULL, 'Case Studies', 1),
(7, 1, 37, NULL, 'Resume', -7),
(8, 1, 4, NULL, 'Contact', -10),
(13, 2, 18, NULL, 'Programming Luck', 0),
(15, 2, 19, NULL, 'Programming Afflictions', 0),
(16, 2, 20, NULL, 'Selecting Web Site Colors', 0),
(17, 2, 21, NULL, 'Calculating Pairs that Add up to 10 with AngularJS', 0),
(18, 2, 22, NULL, '3d Sculpting Broadsword with ZBrush', 0),
(19, 2, 23, NULL, 'Website Instance Class', 0),
(20, 2, 26, NULL, 'Determining Square Root', 0),
(21, 2, 27, NULL, 'Solving Robot Scrap By Controlling Variables', 0),
(22, 2, 28, NULL, 'Robots Process Optimization', 0);

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `node_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `change_freq` enum('always','hourly','daily','weekly','monthly','yearly','never') NOT NULL DEFAULT 'weekly',
  `priority` decimal(2,1) DEFAULT '0.5',
  `template` enum('default','view') DEFAULT 'default' COMMENT 'header/footer disabled (1) enabled (null)',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`node_id`, `parent_id`, `permission_id`, `title`, `heading`, `meta_description`, `change_freq`, `priority`, `template`, `timestamp`) VALUES
(1, 0, NULL, 'Home', 'Full-Stack Developer', 'A full-stack developer\'s home', 'weekly', '1.0', 'default', '2017-08-19 01:37:51'),
(2, 1, NULL, 'Portfolio', 'Portfolio', 'Works completed', 'weekly', '1.0', 'default', '2017-08-19 01:38:10'),
(4, 1, NULL, 'Contact', 'Contact', 'Contact and connect', 'monthly', '0.5', 'default', '2017-08-19 01:38:10'),
(5, 33, NULL, 'Nodes', 'Nodes', 'Node Settings', 'weekly', '0.0', 'default', '2017-08-19 01:38:10'),
(6, 1, NULL, 'Users', 'Users', 'Change group permissions, account settings, create an account, manage user groups, send a message to another user, etc', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(7, 6, NULL, 'Sign-in', 'Sign-in', 'Sign-in to your account.', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(8, 6, 4, 'Settings', 'Settings', 'Update your settings', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(9, 6, NULL, 'Sign Up', 'Sign Up', 'Sign up for an account', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(11, 10, NULL, 'Sitemap XML', 'Sitemap XML', NULL, 'weekly', '0.5', 'view', '2017-08-22 01:28:44'),
(12, 2, NULL, 'Web Development', 'Web Development', 'Web design and development', 'weekly', '0.7', 'default', '2017-08-19 01:38:10'),
(13, 2, NULL, 'Art Design', 'Art Design', 'Art design', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(14, 2, NULL, 'Robotics Development', 'Robotics Development', 'Robotics development', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(15, 2, NULL, 'Game Design', 'Game Design', 'Game design', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(16, 33, NULL, 'Development', 'Development', 'dev', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(17, 1, NULL, 'Case Studies', 'Case Studies', 'Studies about a situation that have been studied over time.', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(18, 17, NULL, 'Luck', 'Luck', 'luck', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(19, 17, NULL, 'Afflictions', 'Afflictions', 'afflictions', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(20, 17, NULL, 'Color Selection', 'Color Selection', 'color selection', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(21, 17, NULL, 'Pair 10', 'Pair 10', NULL, 'monthly', '0.5', 'default', '2017-08-19 01:39:10'),
(22, 17, NULL, 'Broadsword', 'Broadsword', 'Broadsword', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(23, 17, NULL, 'Instance', 'Instance', 'instance', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(25, 1, NULL, 'Search', 'Search', 'Search', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(26, 17, NULL, 'Determining Square Root', 'Determining Square Root', 'Robot determining square root', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(27, 17, NULL, 'Solving Scrap', 'Solving Scrap', 'Robotics Solving Scrap', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(28, 17, NULL, 'Process Optimization', 'Process Optimization', 'Process Optimization', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(33, 1, NULL, 'Administration', 'Administration', 'Description', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(35, 5, NULL, 'Edit', 'Edit', 'Edit nodes', 'weekly', '0.5', 'default', '2017-08-19 01:38:10'),
(36, 1, NULL, 'Title', NULL, 'Description', 'weekly', '0.5', 'default', '2017-08-19 01:39:10'),
(37, 3, NULL, 'Resume PDF', 'Resume', NULL, 'weekly', '0.5', NULL, '2017-08-19 01:39:11');

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
(34, 36, '/new-page', NULL, NULL, NULL, '2017-05-26 12:35:01'),
(35, 37, '/resume-pdf', NULL, NULL, NULL, '2017-08-01 23:29:53');

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `company`, `job_title`, `lat`, `lng`, `street_address`, `locality`, `region`, `postal_code`, `country`, `office_number`, `fax_number`, `mobile_number`, `home_number`, `salt`, `password`, `timezone`, `dateformat`, `timeformat`, `timestamp`) VALUES
(3, 'admin', 'admin@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '686a6345c775992ef897e5e75b017bcd', '$6$50$MWonXqsDeUy7gjEz3FUlqWcrjAr2rB166sdK0/Ktc2lVykokmsvxbFKHwwYBwu4u3EMVJG6tb7LBR6gAFzcCn/', 'US/Eastern', 'F j, Y', 'g:i a', '2014-03-21 09:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_authentication`
--

CREATE TABLE `user_authentication` (
  `ua_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `remote_address` varchar(255) DEFAULT NULL,
  `authenticated` tinyint(1) DEFAULT NULL,
  `sign_in_time` datetime DEFAULT NULL,
  `sign_out_time` datetime DEFAULT NULL,
  `stay_signed_in` tinyint(1) DEFAULT NULL,
  `token` varbinary(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authentication`
--

INSERT INTO `user_authentication` (`ua_id`, `user_id`, `remote_address`, `authenticated`, `sign_in_time`, `sign_out_time`, `stay_signed_in`, `token`, `timestamp`) VALUES
(1, 3, '127.0.0.1', 1, '2017-09-13 21:43:32', '2017-09-13 23:33:16', 0, NULL, '2017-09-14 01:43:32'),
(2, 3, '127.0.0.1', 1, '2017-09-13 22:18:43', '2017-09-13 23:35:08', 0, 0x1c00a45735ab1a1038c70de60c808af58acc20796170de2158e6c9a59664055c505397e9de5dde6494efae80442ebfc23467da1cef450466b0b62a392008672be3178ece10f1da22d4ffd21237f8c0d67dcefa113dda8a9fcf400838b5a908865949c53a897300ddc0c021e5582e7e2abf26c80b1d07d2d1b245f09b6b0f6809e74f88beafe3652178c2a9f195f02a5b7124d104bc6622a94f49d4d45fb2f1bf02fbc062b4f71c602d0cd7f8d6fe26da4345cedbb6a72c6ae6266ce46e4e020d2360218af58d3c4e5ce40b3a4c1c045d1e33ce67cb0d643b9294eef050bb5dfa24313af350e3b8fb96d4e1c0811e1afaca6c869a6863f37d2a6b77b8f740fe, '2017-09-14 02:18:43'),
(3, 3, '127.0.0.1', 1, '2017-09-13 23:11:29', '2017-09-13 23:35:32', 0, 0x9f823c510de91aaea5e76c150aca5fd4923326890c8a7c4c5edd39fa06ed5939d56bbe8054b66e4af9f76624de40a59bfb361222e6b69f3724300314bd155fa305ba17158744e72cf86600a0f92853c34209b9610b83ba925dbb800f8bbbba83597eccbf350ff04fca8f7d64d3b0e10312bdc2d89fac6a81c8b364f7429bc7e59331a441, '2017-09-14 03:11:29'),
(4, 3, '127.0.0.1', 1, '2017-09-13 23:11:31', '2017-09-13 23:35:58', 0, 0x69df7b8b3d28eb07eaa1528ef768526021cfb94d788dc410cad0afa2fa2a80e29286bf85bf1cb4d255a6332bda36a4904e2c9ea31d806053ba78d442f4af7312618f6643457da106e8803ed23aa30aeaddb7e2ae23b91b396aec029c27d06abe0e0141bd99b95a91f48d4d3aae6b25fdf9cb7ac5166d48e7bab7efcafd9b654cc76c044da82b1dab53042bba47068730cc44fe965f8b60ee60520d903978f05edecf65e38205b9348782e35aa368fc8c927803815f47e51228e0449bd089302b348984f827726b8e6cfb0262c61566a519f79c40a4a34816406e2825a0b59b64c52a40497bfdbdce1d91f91c06585aa534f9a04a32c260a0a6981f55cdd2af, '2017-09-14 03:11:31'),
(5, 3, '127.0.0.1', 1, '2017-09-13 23:12:15', '2017-09-13 23:39:03', 0, 0x558ac3c7667d76, '2017-09-14 03:12:15'),
(6, 3, '127.0.0.1', 1, '2017-09-13 23:14:53', '2017-09-13 23:39:24', 0, 0xdb78202735b4980f678f473da39d8d6c17ff, '2017-09-14 03:14:53'),
(7, 3, '127.0.0.1', 1, '2017-09-13 23:14:54', '2017-09-13 23:39:27', 0, 0x24aff7b5848bbcb772686a5ab62594fbb28043c77610ddc2731fc10be9fd615311bcceef65ffef49fd29bd7cb5e66211626f21724260b9d5fd37ea4a239bf7bec7ee18138966919a3d972ee1479328a0d28827f8b69843976126c8db8f78e3750b810c7e82c5f37e4d99eb57e3b6cef8f1c4227477e2, '2017-09-14 03:14:54'),
(8, 3, '127.0.0.1', 1, '2017-09-13 23:15:26', '2017-09-13 23:39:43', 0, 0xa280959f, '2017-09-14 03:15:26'),
(9, 3, '127.0.0.1', 1, '2017-09-13 23:18:36', '2017-09-13 23:39:48', 0, 0xee71f9783de3deecae0940bf340088613d210f8604c5d4f9a640138e4f20ddd9ce000e9cf83b9b77fe, '2017-09-14 03:18:36'),
(10, 3, '127.0.0.1', 1, '2017-09-13 23:18:50', '2017-09-13 23:39:58', 0, 0x79692c99c4b750cddfd595e8ad6b384ee23e18f9be49bdd2ff808eca87c0ae39447b7d2660451076fde22313dd254b1db7d9394e9a8b8ddd3629e2e35f3b9cd6a872e21d8787112a3216db5055089e8d2e22d52a50ec0cecee7a098ad707c7d905314f71c82da3ff8543b234036c27d4d1ea11b6f39f80ab5f730d29a100de31a89008ed2739de7c481c491fc46eeea590f65201512b6330962906b1fc8f07fccc03ca804c21ca1573e211c7f9ccef7bfaf922fcd3a56175d851493380be21b72a17f2f0ff39c1a00b395b23fff451550a63b4f2fbf9b960543656e3d8246bc2442d957c418ecdfbb4ebff43119a0e5f0c43e970746a62904b90bea01de5b9, '2017-09-14 03:18:50'),
(11, 3, '127.0.0.1', 1, '2017-09-13 23:29:03', '2017-09-13 23:42:15', 0, 0xcc46bc3b98a194dd5ec56f0ce0aadf9e9aecf5fc622c5727d12a868a01583e286c8e6148486df5e795ad0d24814433444356ae48a84b1e5f11350fac901f61d5391a8a8e10ca1e46378eb27b54f5d7fea6562de4150723a0873c84dc128471a24ecaba432960214076747b65258abbc21cfd36da615c32397211594bce8f9af349bf3549265a26359bf2e53486263d247c6ff6f2bd90f9f7d03d, '2017-09-14 03:29:03'),
(12, 3, '127.0.0.1', 1, '2017-09-13 23:31:12', '2017-09-13 23:42:42', 0, 0x054312f5c590ec3cb3f983d682bad915b83402e1bce86bababff8b629c163f377739b370290759d91826ceadc0ed8a6869c014264142aec5460bec12a2b19b9ee8833601ccf99f65e2930f24391452e4fc02488c16a986dee85edc704b774fed3e889579dde43f8d590b03c95ef87035fbfb940fe20ed21e3045963da0fa8e2e26fbd3e8caf1d0e2dd26b8c80096f1ee2eeb4062dc7452f2380953c1ec5c31d4a8819c152a2f93f9e90fc6c3996acef45c616d60b8bd68d750ebb832dc74ebde8f038b690cbfb13844900015173e861fee989be43015ec67615237d896b02144340174c87041c33f4ce889ac21a564006fc467778fcddee0421105a8766da9, '2017-09-14 03:31:12'),
(13, 3, '127.0.0.1', 1, '2017-09-13 23:31:14', '2017-09-13 23:49:18', 0, 0x043d8eca088f02a8adb9c307a65660641996b456d775ee9ba6228d3a63a9ea6cb8bfe60bfcc0e3fbe992acc6aeae85bfdf00abd83978bf75536689b107ab7a1492a778a8c2ca85e5107b2e3238a72a32cd4e91771ae75bb8c8d8d6dc85bec5625bf75407a2d2, '2017-09-14 03:31:14'),
(14, 3, '127.0.0.1', 1, '2017-09-13 23:31:59', '2017-09-13 23:49:28', 0, 0x652b65fb21d38ccda4966cf99efd98de2c11d66f8af48d030f689c9e8dd972925526ae72ffbbcf90bb93dc0084c9ea1af4c84c594873bf6ea814a677b3356974db6caed830ad15eb, '2017-09-14 03:31:59'),
(15, 3, '127.0.0.1', 1, '2017-09-13 23:32:01', '2017-09-13 23:59:51', 0, 0x83e53bd7179334289c8f1431f3b83b9c87aa07b4d24a0a178d0ac1d4370e72282287e71ce85109c5f8a13f2f609f7a7a38661bbfd319411dec2ac3cac87ee7107517aecbb9963c9609182068bf292de8282edd6f6bf23a3e536f35c3e868a3e5bc393eebc1f098db8b8188d1b2562e6d6d6bdc5b1843f10a41cee78d33709eb10a140fa2c5c8d7304825c31f8bbf15ec98391099e42e0e76f7a599e7ae10e7f2048ff375fbe8a00414a4b75ee1696f456793d0ce11d19b994ad72d4af1a6035fa6a52bd762510450e86794431dd44c96584a4760a80be565eed5de3d187b6c39abdf1b0464e7012d04fcd009becc069447a2cc92755657e7020d3a658ee04f, '2017-09-14 03:32:01'),
(16, 3, '127.0.0.1', 1, '2017-09-13 23:32:19', '2017-09-14 00:04:19', 0, 0xb7503d87313887d8682627fdef1a76b69039f8281365e470cc1dd7e059417bc0e70d58fe9e0c09654b7486a867bd3c403399d4c7db33dbd809fb444b5dffbb0541a60e18187a10d37930ecffb30cc68e40365a191360eeae9424e12182a0ab2737f34815915239a0629b34fa0b37eeaf6283b5ad52cd7d148eb462678663d8af510ee7bfdacdaac9a352445c794d54fcca82861da9b9584f1216efeec19bb5a0e88661c70b1068c8b497331214f2441650f1dcbc46e4bf8716835a5ddc844ed588b4ca, '2017-09-14 03:32:19'),
(17, 3, '127.0.0.1', 1, '2017-09-13 23:32:59', '2017-09-14 00:10:28', 0, 0x636fd4de06a527232526201a1401653f28f654d034bc95e00ab3683e17d4495afd0f12d6914eaa0e, '2017-09-14 03:32:59'),
(18, 3, '127.0.0.1', 1, '2017-09-13 23:35:02', '2017-09-14 00:11:50', 0, 0xdcd155a6dcf2e5442b5015046ff1d118879437aa5485f6a4bfc6332755d09c168efc523841ee6fb4413051293d15885ace63fd91bdab4c790ba5584dd9fd0760b64bfd2a18b4ea1f3c64e1a23ad327f1c53deb0575be413a718386e879f40b25ff0efeafc92d832d6dde4ee68c1bce9d67fc16cd4084cb3f55b19b39908aa68579de3d62eafb0152e4411f0cfb1cd32abc8266dc60294584c69a0dd1d7859572540637a79efef003ea8273eb992e8fb0a40cd37d9fdfb551d6e2e436b820d767c069bfb1c56b86ab7d37627d6293195a7aa9c42e71d56e4c6bdd915079dafe2e79338e69f4efb971211236786ae465ca43d5bc596a6937a54ec8ec56c3f1cc, '2017-09-14 03:35:02'),
(19, 3, '127.0.0.1', 1, '2017-09-13 23:35:30', '2017-09-14 23:19:17', 0, 0x449e6e8585dab8003075fdf7d800859e7699962f7138f226ebbedb70f64c2e8bb2ba16882664a339b78d3751c054fae15ba14e4e18a25e6135aa, '2017-09-14 03:35:30'),
(20, 3, '127.0.0.1', 1, '2017-09-13 23:35:47', '2017-09-14 23:19:26', 0, 0x45e1ee1443764b6c3a692ec6ee0127773290d085b8465b194f4824b56ff70c20f7f713979c01241ea34313ee18899b34f0872d80f13082e11fa8ac61e82916cadc0624cca036f600d7eb6c156ab0d8051a6dd3548c5b2af659e4e5487c882db0dd0a9f8720f5d3057053af2c191e3ce45ee925efcc98452389bcce67ce48cb25008d208346696c974826fcbc0d6b98fa937b11a1de601a7889008457523c7ed48155fdafb2082cf882fd5e5addedda56850556f793c0c4f1c83e22b98b3c4108bfc786e4e22c9e9f1b312f13d0b51605a129dc8718c35a06256418244efcdc84078bc8e557dee21287a34a3163816cf1803218a0f7a593c0eaf4b7496bd673, '2017-09-14 03:35:47'),
(21, 3, '127.0.0.1', 1, '2017-09-13 23:36:14', '2017-09-17 10:06:33', 0, 0x9633e0f7581ea39abbd1b5154756fa6646c1a41b4d2aabed11f9a4d459f0c565a7f2a1ed6c20f487a4060f126be1d70c6ee446a1dfe3ec3d07a9f455b353e476c417582eb70286860d2e271b35dd8a189aee150ec1de8be322773bc0d3dc26478bc331f5ae07733196925b2e32b5f3ff13e29f20b93a1f4c996c9a94f83651f71ff9f1c55714fa250df18d9751d0c6b2ee4a48befe6e96fa396cc380449811593e2d36a5c50e6c0a8d90de9c14a0f5848c10b42f910ff27ba852117caa00dbe36e739815539d20bb9a55ae17b5e2deed4f2e16a4a1638d0557cb792ed10a0164e1a81bcc7bcbb0e7793b32e73652b15e2d17f633206786072b10c6c527214e, '2017-09-14 03:36:14'),
(22, 3, '127.0.0.1', 1, '2017-09-13 23:39:00', NULL, 0, 0x3c5a6b6c96, '2017-09-14 03:39:00'),
(23, 3, '127.0.0.1', 1, '2017-09-13 23:39:46', NULL, 0, 0x885d76eb05265ef9de2376, '2017-09-14 03:39:46'),
(24, 3, '127.0.0.1', 1, '2017-09-13 23:39:56', NULL, 0, 0xd038c99db0df7e8919d81b283c299e9eb785844899141f1e76386e8103f7d70ef0c19623f33c3f9d5acd82dec05cdd0355f8903e5970ed389227329dd3fc62c823d57185cf649cdde604e27715293586a2e56b35d4d862cab9afb920c7c20bd186, '2017-09-14 03:39:56'),
(25, 3, '127.0.0.1', 1, '2017-09-13 23:40:05', NULL, 0, 0xef43858f39c08b086a05ad56fdbd29fc3054a3a93f238c4f412d21627cdc7b36d3852312ff26ecc5dddfc9ceb2c268f574a1, '2017-09-14 03:40:05'),
(26, 3, '127.0.0.1', 1, '2017-09-13 23:42:21', NULL, 0, 0xcceaffe189f013d33b5b360ee76972ef05abca1e5bb6c507ddbebf2ef18c339050fdada16b0f7d2f4224f0dc8861bb10a35ed94be021bde0a6fb1b022a098036f980ef559ed5236341742ef094aea5d5af051826760275fe863898d86362df654acfeb6afb5d49, '2017-09-14 03:42:21'),
(27, 3, '127.0.0.1', 1, '2017-09-13 23:42:45', NULL, 0, 0x20bd6e4e153ebef9a2d133db51e872cd8359ea29aa7b90900a1979aa8d0e74938025d9d4df4d946b111c14400ee6b12abeb0f19c05082aedcf5d6094da0a02df57b047ee38fdd46527fc494774275892d7b65aecc2733843ca3f3737e64f25e9b07ec6c03c9cc994bde26be20978d95d6aff600690c7318f109a63bdb8ed9f117e470dc59b9ea0ae3a93ee86c780ba9200720efe551bea1f68084459556d12a916ba6c4be13e2685c19953bd948325cb3e45786e49d32509bc1d35bfaf8491afba4a35f39390ddff9aa11921ab4ee7bfef827a701078f787cd9266755707a743597c0d90c59a63cd7e0e00f1f10f43319645a5734b53c4af12, '2017-09-14 03:42:45'),
(28, 3, '127.0.0.1', 1, '2017-09-13 23:43:32', NULL, 0, 0x12a576a75f97cfc72c1ff7ad49ff6cd1c52f349ff2d74203, '2017-09-14 03:43:32'),
(29, 3, '127.0.0.1', 1, '2017-09-13 23:49:25', NULL, 0, 0xfca5dd859d2ad45e6a0341c92d7259d3dfb0a866662b709be305e7662b09ceeac1c32059529f7d3ea2957a2e8aa57366310e042a601f78bebccf78f2c8fe1a1f28e4dffde6f5889a369c373376bb0c1bcef640ca4b62b398e6fa5c64bbb65405c930cd2d3bc6d7e2083086c29bb62177b706cf9aa8bdf198ab21e24f17f99e39afde44371ca6e95036e2cdcd9fb28dc6005f75ac750f8adae9b784707c94df4eb5bbccd907802594f6193ce04bfe11ac57b7d1a8ecaa496e471e0e6689f1bd4f85a34fd102a189f705dda2f121eb84fcd9bc3dcd4346038b5053bdcc46ac62ee19e6cdfde8d5df970c3b82a3af4a206ea844001efe7383fba5ca404d9170d8, '2017-09-14 03:49:25'),
(30, 3, '127.0.0.1', 1, '2017-09-13 23:49:33', NULL, 0, 0xa3c945718dec4d6037e347b7065fd3eea7d9e8c359065b16c5e4448c61bcbed74f2bb8d79393aca0da3822f7fe3f0481ded4640b04477422f3cad4fa13419aeb6ca94c1b09b848ff51b5c810cb8e7ad12effee83ce33fb438b7b0ea3a8aadb2b132517fd85699e150aaa254d5c22ef10c25db75f0541250b7932231b06e069ae6783d397d97201c3ebd2b76b909b7686ba45d7b38827c0af6eb26b3d5e579155a66eadb7f6afc8a77ed68ee211c745379aab034d50f508eed55200c227835cf67637a9d1, '2017-09-14 03:49:33'),
(31, 3, '127.0.0.1', 1, '2017-09-13 23:50:02', NULL, 0, 0x1fe4c607c7229eeae408863764, '2017-09-14 03:50:02'),
(32, 3, '127.0.0.1', 1, '2017-09-13 23:50:15', NULL, 0, 0x52f0a7ca75b731ba3f0f3342e1a1b5763432909b00a40cc8b79be55ba21e6717d231a516f2f77aca39f4ef9d1ded03586eed, '2017-09-14 03:50:15'),
(33, 3, '127.0.0.1', 1, '2017-09-13 23:51:38', NULL, 0, 0x8e57097b5415277468f533, '2017-09-14 03:51:38'),
(34, 3, '127.0.0.1', 1, '2017-09-13 23:52:36', NULL, 0, 0xa6f4a8070c2bb8206a034b217e56037249df7156f749dfc56106821172ec3623658aa3baca4da01013374218b3b2db3db73eee625bb8f88c9c40380b191773a68b05987925a9a5aeb298059f6075560081b169a7e86906a4e4b52c4288a5b353fa2e740e822293ca0b1a84b873e5221866059170b513f735370316, '2017-09-14 03:52:36'),
(35, 3, '127.0.0.1', 1, '2017-09-13 23:52:40', NULL, 0, 0xa68ea3f8d45d383af2353127553325a0ccb1ae9e06af089a913b56b8146ca2f15565e57537f7b149e610d37a616c2b7ee0819c48b173a7d49455350a4790433215ffade6b3d0213fa375924ab640ec3d02a7be22644646c226113a0b0f0a8cd3347de126e1670c0fa9383064e83ecde7cc9df0f2de3d550dda092c3fb3ccf8c4b79fbd4e64f1bf62f0d8317e911c875cca6226b62588d309fc0ffd2b1c64bfb9cc88c40ab750697204faddf9c21d1bbeaa2757adf152f1194e3cc33662b8173c1eb2, '2017-09-14 03:52:40'),
(36, 3, '127.0.0.1', 1, '2017-09-13 23:52:41', NULL, 0, 0xa794bea7336e01e6c313c1bbb00574b52f3b81f61a3c9322afad8135357d1a9db794fcfb6892eb17ea79fe56fc10b169f9aaa188b58dd0628bd3f910431fb5b9457d106bb49b905b6efb25ce7255658e3ee7048ea3d15665e30d8d4793e693f36b4ffc5cccf2a5bc5fc0d710ae24, '2017-09-14 03:52:41'),
(37, 3, '127.0.0.1', 1, '2017-09-13 23:55:23', NULL, 0, 0x4577262884a4625c791318d26a7d4494af9a66d016eef34a5d67c8c4b3c8099eb3eae5d1b4adc5eb43e12c4892a58a7846f19b4a2797cd81bd2f71d3208f85b874cfa958834b85765dfa4563b1f5c4d32ee976a643240fce46aad14eec747c2e37262a398e2f46b69e1065254738c2280e92765678a8177ceb71f0aecef35657f76ed722d04fd9b48b8ecba35b1f314b70cf24ca13827d381979909fbb9882ad6ca08b49, '2017-09-14 03:55:23'),
(38, 3, '127.0.0.1', 1, '2017-09-13 23:55:26', NULL, 0, 0xcfeb1d7aabb0bb1306be67ef4ce89ec94058539334b067f7ca25dcabdc5ec1ad5bb9c29caa7b667bb66fc0f519d02abed8e3dca0580996cbbb4a27bbc2ded7285b57953efb, '2017-09-14 03:55:26'),
(39, 3, '127.0.0.1', 1, '2017-09-13 23:55:39', NULL, 0, 0x0f0de84ebf9136df4296b3f3fe2549e6abb9fc3738bec73df2473191a86760d6f04027a9dd784efb82d4483572d3e6929aa8d0468810c7b8509cf599c3ae4a56809557ee5df07e211624fab0a237bd2c6097d94500cab933076b9524f47de310735a6de7731c3bd4bcd0b4653d9529b23ab9d5d3153d55046517a25e8da93e6197ff70c8149609b6e5478fbf, '2017-09-14 03:55:39'),
(40, 3, '127.0.0.1', 1, '2017-09-13 23:57:22', NULL, 0, 0xbb37e6ba47ca74962a3c6382b1ba0ce15ce66fc69c1b920a63d8eb7594cd0a4090d89050e3003e272b23a2151c9402b5491237191781acddb72d39268347e12095ba799f2837337549973aa5aa69533d8d46a16c2c2c3003c62ad9af9f8ca1f0ca5e5a158067206209930725eac54cc38058f0ff4380f49fcab19f4177f4650808bab9cd77ba37dda80a9e03641eb85540ee25a88311dd232011678c1a98bab1415c241602d771f88704a6c41276dcc6e35119d06dff2de9ef5c46f9fdf072d9268613c8287b3f3881cf0239bb3eccdd22f555cb886005a993acc0e4682e81cdd3ee3cd652456d41266000e2b6a8904eb2c46b6ac6a9eb7aa6040ef46cc2c7, '2017-09-14 03:57:22'),
(41, 3, '127.0.0.1', 1, '2017-09-13 23:58:31', NULL, 0, 0x1ade, '2017-09-14 03:58:31'),
(42, 3, '127.0.0.1', 1, '2017-09-14 00:00:03', NULL, 0, 0x200c77c58a38412fe4dd1ba989bbc30bfbe0a0e77a2ec6e3b417148d3d9c0c77daec3040c54509ff0c53744557ed9ea64daf840d61b8ce5e885c5f5fe9d8f8ef5a0a9819db6bceb4ebbc1e0529aad4ee0e98f5594e7ae88dbe6cb67967e416ed53a75a19133d584bb000e671f00bf2563dc974b911f421b3097054e8ccee57c6f27d363cdcca8c1217caf759f3c9ecfa034dd85971239a385714d0dc124e5d59f91f17, '2017-09-14 04:00:03'),
(43, 3, '127.0.0.1', 1, '2017-09-14 00:00:34', NULL, 0, 0xbde135aaa0d451759de2c9b13f93eb080939cdc26fc8b81a6c7accb9c6182a4b3c5c92376d6f59417d57dc4f5acedbe746df5224769dbaa5887a3601a4b60dc108050b9727a5bfb57585437bff831a9970bdd5554b1f70deb8dc669f5c9718bda37e64d30ef0707415e57aa6f72a2efb4183eaf06cf2619b117af6ecf97dd66db906a2679c092a77f8b80ca505a41ad552f3da638dc03022189b7ce9cd4b8e08fb26c246bfd03d526853baefcd3273e937d3ec38749216c4fc, '2017-09-14 04:00:34'),
(44, 3, '127.0.0.1', 1, '2017-09-14 00:01:55', NULL, 0, 0xa3bfb163b0fb5d8ae6686e32a4f7b852c40f961890a6bf49169b36c4f8bbade5235fab37c1bfb4023efe9b01c271a5ccb1cb9f191aa0758ee3cd9962eb251bac9a2a6b4ef904e0a1a96cb8f53850cb0b74851dbdc2540bd9410096f473c9bb31afc03e83f436da9a3a24b87d504320ddf9b432a75ade5d93c9ec5f1cafb14396fd0772f8ef888b109cdfa4e0bab7870e2db98c6087a470032f3e4ddbbe4a3afef656d6eccc457330d8f60e4d2864e2d1ee8a59b83f65e4e435cb52abb8542da26ec840b2135623a61d3b3e619cbb28505877271936227bf4033a2c9e3b9ffa0a57a1cdb1190a6be94cca30f64a860c061007e8e7, '2017-09-14 04:01:55'),
(45, 3, '127.0.0.1', 1, '2017-09-14 00:02:20', NULL, 0, 0x9c49c71582666ff2a14b3e3861296fb9318aeef69f9c02be7381, '2017-09-14 04:02:20'),
(46, 3, '127.0.0.1', 1, '2017-09-14 00:03:57', NULL, 0, 0x658372d743378e2514101ae4e4f13f818d07d21f6d9cb5f4c8fc1d438a1b66360e4f7d5095fbd484f5d0c79838f91b03ae555b4714f33472cd135c592f48952206598b59d036, '2017-09-14 04:03:57'),
(47, 3, '127.0.0.1', 1, '2017-09-14 00:04:24', NULL, 0, 0xf51f0e3b47e10dbd2a1852dc287841a96f8491771061e44f7670c37be4fd37c8bddd9b00aad2b79add6d418c075db9087cf1a46f9d3625a8f7ec0de4d76fa1ce30b655364e5158952fb66911a32a2bdd5ed4548c25a57b601b69b1129d9527618e9c84dfc8a1f68c62a4919dcc0ef63316f5343d230953adac18eefe8075d21fe46682001c80c6d1773bb4f092eba848e7efb5d73eef5b30c8f32bb57ee795c695bd61baea18ca42b437924f9c632b827656f1a912566b42867467f3e4f344d2260f353826d124ce3571d8527049efee45a8b417e5f4697605cabea9f0315e504acbd8161c66157b896b32c80f9a93a6b7b98467a268353aab49d0eaaf8718, '2017-09-14 04:04:24'),
(48, 3, '127.0.0.1', 1, '2017-09-14 00:11:46', NULL, 0, 0x2d78a1de69eb6f580e3c4eea6b6c0a14f583f1712ad38d4415cdc00de6807b98b3f91ce9978a17c50af5ba3279b9d0b09f99224215d694bdfafdccfd75dc4e0b13a15d765ccc2d07fea32321cd23278952b8afc800d4cca012ed4ae2d9f817c72cf70a12640d80e6e170d177f647a79a8684926fcd895c79487a25fedcc1de9b38e7f64adf927c6fc83894910100b7bdececdafa475f998076ca23984eac0fd6a5143b6c5321a5071ae8dbfcb7f3654bd1f60cea18329d3c19911654fe38d316, '2017-09-14 04:11:46'),
(49, 3, '127.0.0.1', 1, '2017-09-14 00:11:54', NULL, 0, 0x707277c445df423a2221ccbbb7f7213e4d650c309d4424181a6235c96bf844603058a01cd8a32962b5d379afc9fc88a16ef24e41aeb75052fc6102873a5e8442f9a90ffac77988906fffdefd434eab5df9254d3647cc1a1692edc730ba580e04e8d459d383cbd7de3ca8f71f8cd0ce4dad62fdf8878fd66d557c1ec08a67cd4ece4d990e4cd7ae42945ca91458c3bc8e084920d3949330c90c7e53e4dd8f3a694985d302ec50bc4c69195d19caca22c58e893a1a9a467cbf206d1262c090f23ff672356bababaaa8a3dc190ad3f587d3050b8b4aee8cb1353e72f0906b29749e0ea56d7be3e0997c68315cad0eefa4e63adfb28d226917db3b82af81999431, '2017-09-14 04:11:54'),
(50, 3, '127.0.0.1', 1, '2017-09-14 18:44:31', NULL, 0, 0x6667842a80602deec0e6c100e8bbb571a0c5f52211d72c8bb60b9f8cba36345db817ea3312aaf68b2ef831e98ca2dd087912e6b632296edbfd1c274a6e1769e6fb111ccca8258e877dc655d363fe280050807b01738db3450f625fc6811830f1b142bec4a52704ccc772a85f441f861e0f01e916cf55e34f87f01d0f6810a55c713d3a21320532e4b5861f0f4d1e6f89ad1a55f1f04c7d78ddf66b2ece1783f37a112e9748509d25a45a77983bd23389e9ef75d0b774148e31d89946ad015ef8345256619fdc907d72f8bcfa2a328bfe616f013493d7f8e9419714e2bdd271a57eb2f3b6d57adf7382d1928f71c96bd96856e230d5725738ecde1d43e0e460, '2017-09-14 22:44:31'),
(51, 3, '127.0.0.1', 1, '2017-09-14 18:45:00', NULL, 0, 0xcf9284afcecbe4e54ff78222ba9676887d15ceef82be32ac9471a6f1f49d8a252dff2897c20de6c0ac096a811c0f61d9ebf1128d881fc83bb4d0db4778c067c1ed3e323d097eb2cd1ab2b2d65973096fa321f98712deea13c31cd6e130ea0b9e17057dc784b6fd241957294ea1e536fd91c506b9452995601b86f27126bbebb9a46c96dccfce1ada387905bc62c70546fa8c66f9d2a6fb6b9953a0e8364473d94aa3ee4e7442e74b4b95973f02f8bcb6904a48517a396e63587ab8030be891cd167bded5dcda2e90cdd1f995ba62f2c5aeb82b0df935ca6d6db77b55048e222bbc7003d8d01b4d112b45397332c67a27f45f8fdf60f00bfcbd5354aa3daa96, '2017-09-14 22:45:00'),
(52, 3, '127.0.0.1', 1, '2017-09-14 23:19:23', NULL, 0, 0x5d204edb40dec5925706affabe597c6076fd2d7d15bfea392017242c5c2f095867a1270d27412ceed0906b9c21ea2a8e09e86cac34ed6678e2ed14d88a60f39c46d5b3bf8515f48cc7b6efb77b02182a5ba443a0c7dca877cfa46bed2afeba572f8ce24bb63e8c4b52cc31bea0d3dac4c88bcc875728c70eb00e8edfd609dace14ca45a4a018522c5ba13359333bdf999970f01e3341230558be800e5ce6967176836fad7b438cc3c069fbf1df469fd4cb17b8896cca3ae581631d3e7907f395a9b2eb3aed2aeec9f493f9b6e45653bd99af2eb0f7e813b4461e59d86e89d8, '2017-09-15 03:19:23'),
(53, 3, '127.0.0.1', 1, '2017-09-14 23:19:34', NULL, 0, 0x5acae5164e3b76eb058acba7bf7d4c43728f0dea48da984e2f54a817bfb316c1e0487c6a293cdeda99e8c73ed9f231bc43b641c21d75fe051596ff93935ffa93793f2a9d584c869c755ceeca7ba0d7a2dda7e7e653c485cd559e3793e38f1b0b518acfece41dab99cbfeb8a339cfebffd822cd45fe14d1ac8287af0d985f9d28db72bb0543975f51367ca7bad4619232e6c2f260763710c09c5145384b93cf6ef571f6bd620e2207e886625714db58a593c17ea2503030f4985646345a700a3278d17b14bce716248ca69a966252881c57de59cee0bad8d85c00a3308b7cf1c301c5d74385cfb010f1673c22463d9994d41ea04fcdceb25aee6661903dda1d, '2017-09-15 03:19:34'),
(54, 3, '127.0.0.1', 1, '2017-09-17 09:03:53', NULL, 0, NULL, '2017-09-17 13:03:53'),
(55, 3, '127.0.0.1', 1, '2017-09-17 09:04:54', NULL, 0, 0x62f4cf06e77c887ec8a2be0ea66e70feeb986fcd9d2e62a345f8789ffe0e642ec4e3f44c014de688ff0e806eeaf408a51ef1cdbb91f459601365006ad57e7d337d540edd75c0d7aa016df30ab3e78d6169d5313b21ea8371c9a45c2ed196433091cf8100e5c9ba62d71afd58363a80ab99af9b2023f5f1d5415538a0cd0565d819858fb1bf5bc221247cec28405671289c2b881abff28cd0010a482d6df349465b1a8881810beabdd22cc2a731cb2b27d28e93b1d80f42fc86405b53a156fb48902499f3370594cbfccdd9dd2e3e19fcd42be50a78e1d4710e9a1005957db10e56f240080f61ba3504fadb348e7c0880a698c3c81dd9fe2b41ca535cc89fb3, '2017-09-17 13:04:54'),
(56, 3, '127.0.0.1', 1, '2017-09-17 10:06:38', NULL, 0, 0x4c781661b1ef705c926b693aca7e2d7bb4a1d9a7bd4d8f3edee82c069fa6eca61c211f6a38d2c2ed07c91262a2dba12b6f087ee6c5ec844d0bf0f5a79c46b243302ec292bfb71866f4dbb73696c5d0ac3f35f9d16a2bb9f64dbad29ce53922615d297a3c52d375736e48a7b76c189f3a8d9e6ea28706065c36b75b5004503c56931ae39e, '2017-09-17 14:06:38'),
(57, 3, '127.0.0.1', 1, '2017-09-17 10:06:41', NULL, 0, 0xc4c474b444c9e153fdf23cd0ebae79563f124227658b6acb9cfde4d5d25f6a23fe30ca17a3c53077ffef7176afaafd9e7db9eafa7e8e6ef4de9ce4d15ff5b3ef8ed2bd4e0fd1038d43ffce8959a3cac5392ad6549c2b9309ee17e97cf0ef529b9ec93554c54fd02a068b685f7c2d9c5a6824dab1abdafec6957b84c370469117dcf232c2, '2017-09-17 14:06:41'),
(58, 3, '127.0.0.1', 1, '2017-09-17 10:06:42', NULL, 0, 0x7d4a87caeaaa8e50c4602886307426d1d80ed6db60710822f86ad2b983a63ef18d616331a01c63b0c49ae03ad968c62b3dafb82ce38e7cdff96956b7c70c1faf6fee3a534ec23b85b27d0021b31ad0c9fc384b9b1c29edced76e66fa21b817ddaf98bac12319e6b30568c730907901ac0137dfde901f8ec237b710ecb30d471a9f128e68283cbfb40bc2075ed6fbc9d68afd955579d40ce197273fa77d5c8993b152b9664f8f15a0dcea0cc41c158eb439e2d8345b0df718e441e573a564ddd5e2e84cd9a0ea5cac48c106b501c8d069eaa528fdb1ad90f36e73, '2017-09-17 14:06:42'),
(59, 3, '127.0.0.1', 1, '2017-09-17 10:06:44', NULL, 0, 0x7666565827bba92bd6a23a0cebee7bbdc29ef56df635f571630219cfdd0be43bf2df99ca59aa141fc1de6eff73aa37d5e7d4f8232d75d4e516423cda66711849f5c181df656d4ef09be60b8ef4e85dd61ee97ac24a217d8741f5f7a29496982a8e3c6c90799d63e0bb770c1476294f8d2fd3de5c387b22382a798b4fcf884a194e7a6bbb22ad11632d44e461f4678e957c1ca6bdb76efb1c6f8b, '2017-09-17 14:06:44'),
(60, 3, '127.0.0.1', 1, '2017-09-25 19:34:50', NULL, 0, 0x015ec02387bd26c08ce4276df607f6acde, '2017-09-25 23:34:50'),
(61, 3, '127.0.0.1', 1, '2017-09-25 21:10:21', NULL, 0, 0x6c9e5d, '2017-09-26 01:10:21'),
(62, 3, '127.0.0.1', 1, '2017-09-25 21:12:09', NULL, 0, 0x5644024a6699f4a5fc7d68b65c2b74f26793058b3f8a3d082899c47e5bc278e4d0044509ade191a27429ef973e5354feb112bce0d663bce2be3b4d6227639cf7d420fbc7d6b668cfe4a86ca7a9e7ab82d68ac278d8a310102cee9328a51e11, '2017-09-26 01:12:09'),
(63, 3, '127.0.0.1', 1, '2017-09-25 21:12:12', NULL, 0, 0xfcc841dea0f4d7d99127a72be2b7cc82b3e61d7aba8b33e8d4639a1af690323714c4c50df81f65932d0816e41c278a3fb5a343bf3db78ee9426f9ed3d4f75efe0c1f483e2313bc78a820e17eb0a91c3695f08a03f446d023adc70ec7e9c781c2e8de104bf17327b6bda12c45f3cd8b179c00e54ad4506b798233cac181012db15c883d3bbbc8653c36ef446399c00563f6429a39bb1b0aa518ff5c2b96cf5d69aae961be0eed5dfa492bca8c43be9429295b12f61d2fccff209ac06fb2e64ad20a60a884bd25d0b7be275b4bab4ff0c9d422ec121f315719cfb1aafc30fc6b8ea11bdc9e92c7ff8a10b262a5c68c6f808aecf10a4ecd01903fd2c002f2910f, '2017-09-26 01:12:12'),
(64, 3, '127.0.0.1', 1, '2017-09-25 21:12:18', NULL, 0, 0xf6b295f6ff4783f8ea8830e1993bdb2f212d2b5402685729abc24423ea570ac72ee8ff095aa2a0bcfe0bef73db55aed49c3b87d58ded1498777a9cfed0924b7d4495513cc13ea2804427de6196e8e03cdb8388aec6aab986feb378ddcaff8e294e3821db4b0bc1e58f9da5c44c5e2aff1495363c9adca9165ba4208cdde0cb1b370ee8f3c6d479a3dc68b1c10871c7c3cfdf1295ff2c8037d9b0bff564bdaadf7131effd68d38ec8f710a1220de8bd7dddd9c065a9e5490e7949a612ae040143ed7d7d7c762b404f1f8d3faec847b9039b438b68628e6fbf0c08eb2e0969122842a7782d958e96a06f3b81a02edd73ada186560d04e5a981658f638f3d5018, '2017-09-26 01:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `ug_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `grantable` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether user can assign',
  `active` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`ug_id`, `name`, `description`, `grantable`, `active`, `user_id`, `created`, `timestamp`) VALUES
(1, 'admin', 'administrator', 0, 1, 3, '2017-08-13 20:32:14', '2017-08-14 00:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_has_member`
--

CREATE TABLE `user_group_has_member` (
  `ugm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_has_member`
--

INSERT INTO `user_group_has_member` (`ugm_id`, `user_id`, `group_id`, `start_date`, `end_date`, `timestamp`) VALUES
(1, 3, 1, '2017-08-13 00:00:00', NULL, '2017-08-14 00:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_has_permission`
--

CREATE TABLE `user_group_has_permission` (
  `ugp_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` varchar(25) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_has_permission`
--

INSERT INTO `user_group_has_permission` (`ugp_id`, `group_id`, `permission_id`, `start_date`, `end_date`, `timestamp`) VALUES
(1, 1, '1', '2017-08-13 20:34:45', NULL, '2017-08-14 00:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permission`
--

CREATE TABLE `user_has_permission` (
  `up_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `permission_id` int(25) NOT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_has_permission`
--

INSERT INTO `user_has_permission` (`up_id`, `user_id`, `permission_id`, `start_date`, `end_date`, `timestamp`) VALUES
(1, 3, 1, '2017-08-13 00:00:00', NULL, '2017-08-14 00:05:46'),
(2, 3, 2, '2017-08-13 00:00:00', NULL, '2017-08-14 00:05:46'),
(3, 3, 3, '2017-08-13 00:00:00', NULL, '2017-08-14 00:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `permission_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`permission_id`, `name`, `start_date`, `end_date`, `timestamp`) VALUES
(1, 'node-json-edit', '2017-08-13 21:50:55', NULL, '2017-08-14 01:50:55'),
(2, 'node-logic-edit', '2017-08-13 21:50:55', NULL, '2017-08-14 01:50:55'),
(3, 'node-view-edit', '2017-08-13 22:02:49', NULL, '2017-08-14 02:02:49'),
(4, 'signed-in', '2017-08-18 21:05:25', NULL, '2017-08-19 01:05:25');

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
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_authentication`
--
ALTER TABLE `user_authentication`
  ADD PRIMARY KEY (`ua_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`ug_id`);

--
-- Indexes for table `user_group_has_member`
--
ALTER TABLE `user_group_has_member`
  ADD PRIMARY KEY (`ugm_id`);

--
-- Indexes for table `user_group_has_permission`
--
ALTER TABLE `user_group_has_permission`
  ADD PRIMARY KEY (`ugp_id`);

--
-- Indexes for table `user_has_permission`
--
ALTER TABLE `user_has_permission`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`permission_id`);

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
  MODIFY `menu_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `node_alias`
--
ALTER TABLE `node_alias`
  MODIFY `alias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `post_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_authentication`
--
ALTER TABLE `user_authentication`
  MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `ug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_group_has_member`
--
ALTER TABLE `user_group_has_member`
  MODIFY `ugm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_group_has_permission`
--
ALTER TABLE `user_group_has_permission`
  MODIFY `ugp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_has_permission`
--
ALTER TABLE `user_has_permission`
  MODIFY `up_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
