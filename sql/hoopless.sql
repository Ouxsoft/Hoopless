-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 04, 2022 at 06:30 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoopless`
--
CREATE DATABASE IF NOT EXISTS `hoopless` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `hoopless`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `display_start_date` datetime DEFAULT NULL,
  `display_end_date` datetime DEFAULT NULL,
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `publish_date`, `display_start_date`, `display_end_date`, `summary`, `body`, `created`, `updated`) VALUES
(1, 'Product Review: 8 Tips for Success', '2021-11-17 00:00:00', NULL, NULL, NULL, '    <h2>Chose Tickets to Showcase</h2>\n    <p>\n    An organization may be chasing underlying technologies or adopting the latest trend of serverless stack, but chances are\n    that isn\'t the most engaging content for a product review. Favor showcasing tangible tickets over intangible. Chose\n    features, bugfixes, etc. that can facilitate a two-side conversation. Product reviews should be a discussion. Design\n    them with a structure built around tickets that are discussable. Promote collaboration over ostracization.\n    </p>\n    \n    <h2>Invite Everyone</h2>\n    <p>\n    Well, you might not be able to invite everyone, but cast a broad net to all willing stakeholders. This could be the\n    entire company, if they are users of the system.\n    </p>\n    \n    <h2>Facilitate a Collaboration</h2>\n    <p>\n    Be mindful of holding the space. Your goal is to facilitate meaningful and production conversation between engineers\n    and stakeholders. Product reviews shouldn\'t be overall formal. People should act authentically and ask questions.\n    But they should be structured and respectful of everyone\'s time. Table conversations that go over time.\n    </p>\n    \n    <h2>Record</h2>\n    <p>\n    Product reviews take time to digested. They may need to be analyzed or references at a later time. Unless there is a\n    reason not to, press the record button. This will help to make informed decisions moving forward and make it easier\n    to reach out to clarify open questions.\n    </p>\n    \n    <h2>Outline</h2>\n    <p>\n    Give a brief introduction and outline the proceedings. A simple \"who are we\", \"why we are here\", and \"what to expect\"\n    should suffice. Let the audience know what to expect and how they can engage. Make sure to get to the point though\n    quickly. Afterall, we here to show case features and get feedback.\n    </p>\n    \n    <h2>Recap</h2>\n    <p>\n    It\'s important to establish a feedback loop for suggestions provided in the previous review. One idea is to provide\n    a synopsis of corrective actions made from the last product review during the start of the current product review.\n    This helps establish that suggestions are taken seriously and lets stakeholders know their feedback matters.\n    </p>\n    \n    <h2>Let them Shine</h2>\n    <p>\n    Empower engineers by letting them showcase their work and take ownership. Advise them to avoid unnecessary technical\n    jargon that won\'t be understood by stakeholders. Often stakeholders have their own jargon, albeit not technical, as\n    they are the subject matter experts. Allow stakeholders the opportunity to educate and advance engineers\n    understanding of the industry.\n    </p>\n    \n    <h2>Review</h2>\n    <p>\n    Give it a little while and then watch the recording. Take notes. Follow up with individuals to clarify concerns.\n    Use the information provided to help your team and software improve.\n    </p>', '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(2, 'Trailing Slash', '2021-11-17 00:00:00', NULL, NULL, NULL, '    <h2>Trailing Slash</h2>\n    <p>\n    Including the trailing slash inside a variable that is used to generate paths is a anti-pattern. Consumers\n    of a variable should add the trailing slash. Otherwise there is no way for them to remove the slash. Even\n    if all current occurrences of the variable feature the slash, the future is unknown.\n    </p>', '2022-01-03 16:28:03', '2022-01-03 16:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `content_type_group_access`
--

CREATE TABLE `content_type_group_access` (
  `acl_id` int NOT NULL,
  `type` int NOT NULL,
  `user_id` blob NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_type_schema`
--

CREATE TABLE `content_type_schema` (
  `schema_id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `name` blob NOT NULL,
  `machine_name` blob NOT NULL,
  `class_name` blob NOT NULL,
  `description` blob NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_letter_code` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `three_letter_code` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `custom_id` int NOT NULL,
  `schema_id` int NOT NULL,
  `version_id` int NOT NULL,
  `group_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_meta`
--

CREATE TABLE `custom_meta` (
  `value_id` int NOT NULL,
  `type_id` int NOT NULL,
  `version_id` int NOT NULL,
  `serialized_value` blob NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('App\\Migrations\\Version20210710031913', '2022-01-03 16:27:59', 3637),
('App\\Migrations\\Version20210710044359', '2022-01-03 16:28:03', 333),
('App\\Migrations\\Version20210710053110', '2022-01-03 16:28:03', 377),
('App\\Migrations\\Version20211118041608', '2022-01-03 16:28:03', 106),
('App\\Migrations\\Version20211212044950', '2022-01-03 16:28:03', 347),
('App\\Migrations\\Version20211223175512', '2022-01-03 16:28:04', 225),
('App\\Migrations\\Version20211224033039', '2022-01-03 16:28:04', 119);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `display_start_date` datetime DEFAULT NULL,
  `display_end_date` datetime DEFAULT NULL,
  `body` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_meta`
--

CREATE TABLE `event_meta` (
  `event_meta_id` int NOT NULL,
  `event_id` int NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `event_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_meta`
--

CREATE TABLE `form_meta` (
  `form_meta_id` int NOT NULL,
  `parent_form_meta_id` int NOT NULL,
  `form_id` int NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_submission`
--

CREATE TABLE `form_submission` (
  `form_submission_id` int NOT NULL,
  `form_id` int NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_submission_meta`
--

CREATE TABLE `form_submission_meta` (
  `form_submission_meta_id` int NOT NULL,
  `form_submission_id` int NOT NULL,
  `form_meta_id` int NOT NULL,
  `value` varchar(280) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `gallery_image_id` int NOT NULL,
  `gallery_id` int NOT NULL,
  `image_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `group_permission_id` int NOT NULL,
  `group_id` int NOT NULL,
  `permission_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int NOT NULL,
  `file_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `created`, `updated`) VALUES
(1, 'Help', '2022-01-03 16:28:04', '2022-01-03 16:28:04'),
(2, 'LHTML Elements', '2022-01-03 16:28:04', '2022-01-03 16:28:04'),
(3, 'Site Footer', '2022-01-03 16:28:04', '2022-01-03 16:28:04'),
(4, 'About', '2022-01-03 17:50:10', '2022-01-03 17:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `menu_item_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `parent_menu_item_id` int DEFAULT NULL,
  `page_id` int DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`, `title`) VALUES
(1, 1, NULL, 3, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(2, 1, NULL, 4, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(3, 2, NULL, 5, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(4, 2, NULL, 6, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(5, 2, NULL, 7, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(6, 2, NULL, 8, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(7, 2, NULL, 10, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(8, 2, NULL, 11, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(9, 2, NULL, 13, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(10, 2, NULL, 14, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(11, 2, NULL, 15, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(12, 2, NULL, 16, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(13, 3, NULL, 3, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(14, 3, NULL, 24, NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04', NULL),
(15, 4, NULL, 25, NULL, NULL, '2022-01-03 20:14:41', '2022-01-03 20:14:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `display_start_date` datetime DEFAULT NULL,
  `display_end_date` datetime DEFAULT NULL,
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `publish_date`, `display_start_date`, `display_end_date`, `summary`, `body`, `created`, `updated`) VALUES
(1, 'PHPMarkup', '2021-04-29 00:00:00', NULL, NULL, NULL, '<p>We have decided to rename LivingMarkup to PHPMarkup to better reflect the purpose of the library.\r\n            To be honest, this is the third time we have had to renamed the library (formally LivingMarkup was known as PXP).</p>\r\n            <p>We hope PHPMarkup better conveys the purpose of the library. In the same way that PHP is interpreted into C to \r\n            allow developers to write powerful applications, PHPMarkup is a library that allows \r\n            curators to use markup to safely instantiate PHP classes and invoke methods.</p>\r\n            <p>Other than that, PHPMarkup has become a relatively stable library. It is actually amazing how well it\r\n             helps us run sites and minimize the code we need to maintain.</p>', '2022-01-03 16:28:02', '2022-01-03 16:28:02'),
(2, 'LHTML Elements Behind Hoopless', '2020-08-08 00:00:00', NULL, NULL, NULL, '<p>We take a quick look at the if statment, variable, and redacted LHTML elements used in Hoopless.</p>\r\n           <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2w9vNNlsSRg\" frameborder=\"0\" \r\n           allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe>', '2022-01-03 16:28:02', '2022-01-03 16:28:02'),
(3, 'LHTML Add Custom Element', '2020-08-07 00:00:00', NULL, NULL, NULL, '<p>See how easy it is to create your own custom LHTML elements using Hoopless. In this example we create \r\n        our own custom Alert elements that acts as a CSS abstraction layer to generate Bootstrap 4 alerts.</p>\r\n       <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HxZ2qitsUUs\" frameborder=\"0\"\r\n        allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe>', '2022-01-03 16:28:02', '2022-01-03 16:28:02'),
(4, 'LHTML Under the Hood', '2020-08-07 00:00:00', NULL, NULL, NULL, '<p>LHTML works to make communicate the elements of design between team members while still delivering top \r\n            notch HTML to the web browser</p>\r\n           <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/L4u2qh5Elco\" frameborder=\"0\" \r\n           allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe>', '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(5, 'Reworking The Language of the Web', '2019-01-28 00:00:00', NULL, NULL, NULL, '<p>There is something fundamentally wrong about the way web teams work together to build websites.\r\n           The problem is the language they\'re using, HTML, was not designed to communicate within teams but to a \r\n           browser. That makes it a poor choice to help empower team members, encourage effective communication, \r\n           and encode the message that is the site between stakeholders.</p>\r\n           <p>Watch what we intend to do about it.</p>\r\n           <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6zEXsQKPL_M\" frameborder=\"0\" \r\n           allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" \r\n           allowfullscreen=\"allowfullscreen\"></iframe>', '2022-01-03 16:28:03', '2022-01-03 16:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int NOT NULL,
  `page_parent_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_parent_id`, `title`, `url`, `keywords`, `template`, `created`, `updated`) VALUES
(1, NULL, 'Home', '/', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(2, 1, 'About', '/about', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(3, 1, 'Editing Guide', '/help', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(4, 3, 'PHPMarkup', '/help/phpmarkup', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(5, 4, 'Code Element', '/help/phpmarkup/elements/code', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(10, 4, 'If Statement Element', '/help/phpmarkup/elements/if-statement', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(11, 4, 'Images Element', '/help/phpmarkup/elements/images', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(14, 4, 'Partial Element', '/help/phpmarkup/elements/partial', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(15, 4, 'Redact Element', '/help/phpmarkup/elements/redact', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(16, 4, 'Variables Element', '/help/phpmarkup/elements/variables', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(17, 1, 'News', '/news', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(18, 1, 'Products', '/products', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(19, 18, 'LuckByDice', '/products/luckbydice', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(21, 1, 'Blog', '/blog', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(22, 1, 'Contact', '/contact', NULL, NULL, '2022-01-03 16:28:03', '2022-01-03 16:28:03'),
(23, 1, 'Backend', '/backend', NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04'),
(24, 23, 'Sign In', '/login', NULL, NULL, '2022-01-03 16:28:04', '2022-01-03 16:28:04'),
(25, 2, 'Brand', '/about/brand', NULL, NULL, '2022-01-03 20:13:17', '2022-01-03 20:13:17'),
(26, 1, 'Services', '/services', NULL, NULL, '2022-01-04 05:56:00', '2022-01-04 05:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `page_revision`
--

CREATE TABLE `page_revision` (
  `page_revision_id` int NOT NULL,
  `page_id` int NOT NULL,
  `body` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` blob NOT NULL,
  `streetAddress1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `streetAddress2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int NOT NULL,
  `latitude` decimal(20,16) NOT NULL,
  `longitude` decimal(20,16) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `preferred_prounouns` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` blob NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snippet`
--

CREATE TABLE `snippet` (
  `snippet_id` int NOT NULL,
  `description` blob NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `user_permission_id` int NOT NULL,
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `content_type_group_access`
--
ALTER TABLE `content_type_group_access`
  ADD PRIMARY KEY (`acl_id`);

--
-- Indexes for table `content_type_schema`
--
ALTER TABLE `content_type_schema`
  ADD PRIMARY KEY (`schema_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `custom_meta`
--
ALTER TABLE `custom_meta`
  ADD PRIMARY KEY (`value_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_meta`
--
ALTER TABLE `event_meta`
  ADD PRIMARY KEY (`event_meta_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `form_meta`
--
ALTER TABLE `form_meta`
  ADD PRIMARY KEY (`form_meta_id`);

--
-- Indexes for table `form_submission`
--
ALTER TABLE `form_submission`
  ADD PRIMARY KEY (`form_submission_id`);

--
-- Indexes for table `form_submission_meta`
--
ALTER TABLE `form_submission_meta`
  ADD PRIMARY KEY (`form_submission_meta_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`gallery_image_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`group_permission_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_item_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `page_revision`
--
ALTER TABLE `page_revision`
  ADD PRIMARY KEY (`page_revision_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `snippet`
--
ALTER TABLE `snippet`
  ADD PRIMARY KEY (`snippet_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`user_permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_type_group_access`
--
ALTER TABLE `content_type_group_access`
  MODIFY `acl_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_type_schema`
--
ALTER TABLE `content_type_schema`
  MODIFY `schema_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `custom_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_meta`
--
ALTER TABLE `custom_meta`
  MODIFY `value_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_meta`
--
ALTER TABLE `event_meta`
  MODIFY `event_meta_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_meta`
--
ALTER TABLE `form_meta`
  MODIFY `form_meta_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_submission`
--
ALTER TABLE `form_submission`
  MODIFY `form_submission_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_submission_meta`
--
ALTER TABLE `form_submission_meta`
  MODIFY `form_submission_meta_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `gallery_image_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `group_permission_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `menu_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `page_revision`
--
ALTER TABLE `page_revision`
  MODIFY `page_revision_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snippet`
--
ALTER TABLE `snippet`
  MODIFY `snippet_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `user_permission_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
