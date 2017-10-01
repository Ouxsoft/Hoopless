-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: hoopless
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abilities`
--

DROP TABLE IF EXISTS `abilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` enum('Web skills','Web tools','Art skills','Art tools','Robotic skills','Robotic tools','Game skills','Game tools','Software skills','Software tools','Languages') NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `started` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abilities`
--

LOCK TABLES `abilities` WRITE;
/*!40000 ALTER TABLE `abilities` DISABLE KEYS */;
INSERT INTO `abilities` VALUES (1,'Web skills','CSS3',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (2,'Web skills','HTML5',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (3,'Web skills','MySQL',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (4,'Web skills','PHP',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (5,'Web skills','Javascript',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (6,'Web skills','JQuery',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (7,'Web skills','XML',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (8,'Web skills','JSON',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (9,'Web skills','Bootstrap Framework',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (10,'Web skills','Java',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (11,'Game skills','DarkBasic',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (12,'Game skills','Lua',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (13,'Web skills','Wordpress',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (14,'Software skills','Object-oriented programming',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (15,'Web skills','AngularJS',2,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (48,'Game skills','Three.js',3,NULL,'2016-07-29 19:54:55');
INSERT INTO `abilities` VALUES (17,'Robotic skills','Fanuc Karel',5,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (18,'Software skills','C++',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (19,'Art tools','ZBrush',4,NULL,'2016-07-25 05:49:44');
INSERT INTO `abilities` VALUES (20,'Art tools','Adobe Illustrator',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (21,'Art tools','Adobe Photoshop',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (38,'Web tools','Git / Git Flow',4,'2012-01-03','2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (23,'Web skills','Coldfusion',2,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (24,'Software skills','Visual Basic .NET (VB.NET)',4,NULL,'2016-07-31 15:59:15');
INSERT INTO `abilities` VALUES (25,'Software skills','Borland C++',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (26,'Web skills','SEO',4,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (27,'Web skills','Command line',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (28,'Software skills','Microsoft Visual C - C#',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (29,'Art tools','Sketchup',4,NULL,'2016-07-25 07:00:00');
INSERT INTO `abilities` VALUES (30,'Web tools','Notepad++',5,NULL,'2016-07-25 05:10:13');
INSERT INTO `abilities` VALUES (31,'Languages','English (native)',5,NULL,'2016-07-25 00:11:41');
INSERT INTO `abilities` VALUES (32,'Languages','Russian (survivable)',2,'2011-06-04','2016-07-25 01:44:25');
INSERT INTO `abilities` VALUES (33,'Web skills','Ruby',1,NULL,'2016-07-25 05:10:13');
INSERT INTO `abilities` VALUES (34,'Web skills','Python',2,NULL,'2016-07-25 05:10:13');
INSERT INTO `abilities` VALUES (35,'Web tools','Internet Explorer',5,NULL,'2016-07-25 05:10:13');
INSERT INTO `abilities` VALUES (36,'Web tools','Windows',5,'1992-10-01','2016-07-25 05:10:21');
INSERT INTO `abilities` VALUES (37,'Web tools','Mac',3,'1993-08-01','2016-07-25 05:10:13');
INSERT INTO `abilities` VALUES (39,'Web tools','Linux',4,'2003-08-01','2016-07-25 05:11:00');
INSERT INTO `abilities` VALUES (41,'Web skills','Apache',4,NULL,'2016-07-25 06:49:49');
INSERT INTO `abilities` VALUES (42,'Web skills','Actionscript',3,NULL,'2016-07-25 06:49:23');
INSERT INTO `abilities` VALUES (44,'Art tools','Wacom Tablet Intuos 4',5,NULL,'2016-07-25 05:50:22');
INSERT INTO `abilities` VALUES (45,'Web tools','CPanel',4,NULL,'2016-07-25 16:27:28');
INSERT INTO `abilities` VALUES (46,'Web tools','Mozilla Firefox',5,NULL,'2016-07-25 16:27:28');
INSERT INTO `abilities` VALUES (47,'Web tools','Google Chrome',5,NULL,'2016-07-25 16:37:11');
INSERT INTO `abilities` VALUES (49,'Game skills','Ruby',1,NULL,'2016-07-29 19:55:46');
INSERT INTO `abilities` VALUES (50,'Game skills','Javascript',5,NULL,'2016-07-29 19:55:13');
INSERT INTO `abilities` VALUES (51,'Game skills','Visual Basic 6.0',4,NULL,'2016-07-29 19:56:05');
INSERT INTO `abilities` VALUES (52,'Game skills','Visual Basic .NET (VB.NET)',4,NULL,'2016-07-31 15:59:15');
INSERT INTO `abilities` VALUES (53,'Game skills','C Programming',3,NULL,'2016-07-29 19:56:38');
INSERT INTO `abilities` VALUES (54,'Game skills','C++',3,NULL,'2016-07-29 19:56:46');
INSERT INTO `abilities` VALUES (55,'Game skills','Actionscript',3,NULL,'2016-07-29 19:56:57');
INSERT INTO `abilities` VALUES (56,'Robotic tools','Visual Basic .NET (VB.NET)',4,NULL,'2016-08-02 13:28:33');
INSERT INTO `abilities` VALUES (57,'Web skills','Bash (Unix shell)',4,NULL,'2016-07-31 18:53:14');
INSERT INTO `abilities` VALUES (58,'Art tools','CAD (DraftSight)',3,NULL,'2016-08-02 12:48:36');
INSERT INTO `abilities` VALUES (59,'Art tools','Kerkythea (Render)',3,NULL,'2016-08-02 12:48:36');
INSERT INTO `abilities` VALUES (60,'Art skills','Perspective',4,NULL,'2016-08-02 12:50:13');
INSERT INTO `abilities` VALUES (61,'Art skills','Human Anatomy',4,NULL,'2016-08-02 12:50:13');
INSERT INTO `abilities` VALUES (62,'Art skills','Creativity',4,NULL,'2016-08-02 12:51:28');
INSERT INTO `abilities` VALUES (63,'Art tools','Pen and Ink',3,NULL,'2016-08-02 12:53:27');
INSERT INTO `abilities` VALUES (64,'Art tools','Acrylics',4,NULL,'2016-08-02 12:53:27');
INSERT INTO `abilities` VALUES (65,'Art tools','Watercolor',3,NULL,'2016-08-02 12:54:07');
INSERT INTO `abilities` VALUES (66,'Web tools','Oil Painting',3,NULL,'2016-08-02 12:54:07');
INSERT INTO `abilities` VALUES (67,'Robotic skills','Understanding of 6-Axis Industrial Robots',4,NULL,'2016-08-02 13:27:02');
INSERT INTO `abilities` VALUES (68,'Art tools','FANUC Controller Software',3,NULL,'2016-08-02 13:28:33');
INSERT INTO `abilities` VALUES (69,'Robotic tools','Fanuc Controller / Teach Pendant',5,NULL,'2016-08-02 13:35:53');
INSERT INTO `abilities` VALUES (70,'Robotic skills','Icon Design',4,NULL,'2016-08-02 13:38:14');
INSERT INTO `abilities` VALUES (71,'Robotic skills','PR (Position Register) on FANUC TPP',5,NULL,'2016-08-02 13:39:06');
INSERT INTO `abilities` VALUES (72,'Robotic skills','Documentation (Web Based)',4,NULL,'2016-08-02 13:39:54');
INSERT INTO `abilities` VALUES (73,'Robotic skills','TP Programming',5,NULL,'2016-08-02 13:44:12');
INSERT INTO `abilities` VALUES (74,'Robotic skills','Rj32 Framework',4,NULL,'2016-08-02 14:12:23');
INSERT INTO `abilities` VALUES (75,'Web skills','Drupal',3,NULL,'2016-07-25 05:08:40');
INSERT INTO `abilities` VALUES (76,'Web skills','SASS (SCSS)',5,NULL,'2016-07-25 05:08:40');
/*!40000 ALTER TABLE `abilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `abbreviation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','EN');
INSERT INTO `languages` VALUES (2,'Albanian ','SQ');
INSERT INTO `languages` VALUES (3,'Arabic ','AR');
INSERT INTO `languages` VALUES (4,'Armenian ','HY');
INSERT INTO `languages` VALUES (5,'Basque ','EU');
INSERT INTO `languages` VALUES (6,'Bengali ','BN');
INSERT INTO `languages` VALUES (7,'Bulgarian ','BG');
INSERT INTO `languages` VALUES (8,'Catalan ','CA');
INSERT INTO `languages` VALUES (9,'Cambodian ','KM');
INSERT INTO `languages` VALUES (10,'Chinese (Mandarin) ','ZH');
INSERT INTO `languages` VALUES (11,'Croatian ','HR');
INSERT INTO `languages` VALUES (12,'Czech ','CS');
INSERT INTO `languages` VALUES (13,'Danish ','DA');
INSERT INTO `languages` VALUES (14,'Dutch ','NL');
INSERT INTO `languages` VALUES (15,'Afrikaans','AF');
INSERT INTO `languages` VALUES (16,'Estonian ','ET');
INSERT INTO `languages` VALUES (17,'Fiji ','FJ');
INSERT INTO `languages` VALUES (18,'Finnish ','FI');
INSERT INTO `languages` VALUES (19,'French ','FR');
INSERT INTO `languages` VALUES (20,'Georgian ','KA');
INSERT INTO `languages` VALUES (21,'German ','DE');
INSERT INTO `languages` VALUES (22,'Greek ','EL');
INSERT INTO `languages` VALUES (23,'Gujarati ','GU');
INSERT INTO `languages` VALUES (24,'Hebrew ','HE');
INSERT INTO `languages` VALUES (25,'Hindi ','HI');
INSERT INTO `languages` VALUES (26,'Hungarian ','HU');
INSERT INTO `languages` VALUES (27,'Icelandic ','IS');
INSERT INTO `languages` VALUES (28,'Indonesian ','ID');
INSERT INTO `languages` VALUES (29,'Irish ','GA');
INSERT INTO `languages` VALUES (30,'Italian ','IT');
INSERT INTO `languages` VALUES (31,'Japanese ','JA');
INSERT INTO `languages` VALUES (32,'Javanese ','JW');
INSERT INTO `languages` VALUES (33,'Korean ','KO');
INSERT INTO `languages` VALUES (34,'Latin ','LA');
INSERT INTO `languages` VALUES (35,'Latvian ','LV');
INSERT INTO `languages` VALUES (36,'Lithuanian ','LT');
INSERT INTO `languages` VALUES (37,'Macedonian ','MK');
INSERT INTO `languages` VALUES (38,'Malay ','MS');
INSERT INTO `languages` VALUES (39,'Malayalam ','ML');
INSERT INTO `languages` VALUES (40,'Maltese ','MT');
INSERT INTO `languages` VALUES (41,'Maori ','MI');
INSERT INTO `languages` VALUES (42,'Marathi ','MR');
INSERT INTO `languages` VALUES (43,'Mongolian ','MN');
INSERT INTO `languages` VALUES (44,'Nepali ','NE');
INSERT INTO `languages` VALUES (45,'Norwegian ','NO');
INSERT INTO `languages` VALUES (46,'Persian ','FA');
INSERT INTO `languages` VALUES (47,'Polish ','PL');
INSERT INTO `languages` VALUES (48,'Portuguese ','PT');
INSERT INTO `languages` VALUES (49,'Punjabi ','PA');
INSERT INTO `languages` VALUES (50,'Quechua ','QU');
INSERT INTO `languages` VALUES (51,'Romanian ','RO');
INSERT INTO `languages` VALUES (52,'Russian ','RU');
INSERT INTO `languages` VALUES (53,'Samoan ','SM');
INSERT INTO `languages` VALUES (54,'Serbian ','SR');
INSERT INTO `languages` VALUES (55,'Slovak ','SK');
INSERT INTO `languages` VALUES (56,'Slovenian ','SL');
INSERT INTO `languages` VALUES (57,'Spanish ','ES');
INSERT INTO `languages` VALUES (58,'Swahili ','SW');
INSERT INTO `languages` VALUES (59,'Swedish  ','SV');
INSERT INTO `languages` VALUES (60,'Tamil ','TA');
INSERT INTO `languages` VALUES (61,'Tatar ','TT');
INSERT INTO `languages` VALUES (62,'Telugu ','TE');
INSERT INTO `languages` VALUES (63,'Thai ','TH');
INSERT INTO `languages` VALUES (64,'Tibetan ','BO');
INSERT INTO `languages` VALUES (65,'Tonga ','TO');
INSERT INTO `languages` VALUES (66,'Turkish ','TR');
INSERT INTO `languages` VALUES (67,'Ukrainian ','UK');
INSERT INTO `languages` VALUES (68,'Urdu ','UR');
INSERT INTO `languages` VALUES (69,'Uzbek ','UZ');
INSERT INTO `languages` VALUES (70,'Vietnamese ','VI');
INSERT INTO `languages` VALUES (71,'Welsh ','CY');
INSERT INTO `languages` VALUES (72,'Xhosa ','XH');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` int(25) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'top-menu');
INSERT INTO `menu` VALUES (2,'case-studies');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(25) NOT NULL,
  `node_id` int(25) NOT NULL,
  `parent_id` int(25) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `weight` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item`
--

LOCK TABLES `menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item` DISABLE KEYS */;
INSERT INTO `menu_item` VALUES (1,1,2,NULL,'Portfolio',0);
INSERT INTO `menu_item` VALUES (2,1,12,2,'Web Dev',2);
INSERT INTO `menu_item` VALUES (3,1,13,2,'Design',0);
INSERT INTO `menu_item` VALUES (4,1,14,2,'Robotics',1);
INSERT INTO `menu_item` VALUES (5,1,15,2,'Game Design',0);
INSERT INTO `menu_item` VALUES (6,1,17,NULL,'Case Studies',1);
INSERT INTO `menu_item` VALUES (7,1,37,NULL,'Resume',-7);
INSERT INTO `menu_item` VALUES (8,1,4,NULL,'Contact',-10);
INSERT INTO `menu_item` VALUES (13,2,18,NULL,'Programming Luck',0);
INSERT INTO `menu_item` VALUES (15,2,19,NULL,'Programming Afflictions',0);
INSERT INTO `menu_item` VALUES (16,2,20,NULL,'Selecting Web Site Colors',0);
INSERT INTO `menu_item` VALUES (17,2,21,NULL,'Calculating Pairs that Add up to 10 with AngularJS',0);
INSERT INTO `menu_item` VALUES (18,2,22,NULL,'3d Sculpting Broadsword with ZBrush',0);
INSERT INTO `menu_item` VALUES (19,2,23,NULL,'Website Instance Class',0);
INSERT INTO `menu_item` VALUES (20,2,26,NULL,'Determining Square Root',0);
INSERT INTO `menu_item` VALUES (21,2,27,NULL,'Solving Robot Scrap By Controlling Variables',0);
INSERT INTO `menu_item` VALUES (22,2,28,NULL,'Robots Process Optimization',0);
/*!40000 ALTER TABLE `menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `change_freq` enum('always','hourly','daily','weekly','monthly','yearly','never') NOT NULL DEFAULT 'weekly',
  `priority` decimal(2,1) DEFAULT '0.5',
  `template` enum('default','view') DEFAULT 'default' COMMENT 'header/footer disabled (1) enabled (null)',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
INSERT INTO `node` VALUES (1,0,NULL,'Home','Full-Stack Developer','A full-stack developer\'s home','weekly',1.0,'default','2017-08-19 01:37:51');
INSERT INTO `node` VALUES (2,1,NULL,'Portfolio','Portfolio','Works completed','weekly',1.0,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (4,1,NULL,'Contact','Contact','Contact and connect','monthly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (5,33,NULL,'Nodes','Nodes','Node Settings','weekly',0.0,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (6,1,NULL,'Users','Users','Change group permissions, account settings, create an account, manage user groups, send a message to another user, etc','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (7,6,NULL,'Sign-in','Sign-in','Sign-in to your account.','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (8,6,4,'Settings','Settings','Update your settings','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (9,6,NULL,'Sign Up','Sign Up','Sign up for an account','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (11,10,NULL,'Sitemap XML','Sitemap XML',NULL,'weekly',0.5,'view','2017-08-22 01:28:44');
INSERT INTO `node` VALUES (12,2,NULL,'Web Development','Web Development','Web design and development','weekly',0.7,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (13,2,NULL,'Art Design','Art Design','Art design','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (14,2,NULL,'Robotics Development','Robotics Development','Robotics development','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (15,2,NULL,'Game Design','Game Design','Game design','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (16,33,NULL,'Development','Development','dev','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (17,1,NULL,'Case Studies','Case Studies','Studies about a situation that have been studied over time.','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (18,17,NULL,'Luck','Luck','luck','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (19,17,NULL,'Afflictions','Afflictions','afflictions','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (20,17,NULL,'Color Selection','Color Selection','color selection','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (21,17,NULL,'Pair 10','Pair 10',NULL,'monthly',0.5,'default','2017-08-19 01:39:10');
INSERT INTO `node` VALUES (22,17,NULL,'Broadsword','Broadsword','Broadsword','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (23,17,NULL,'Instance','Instance','instance','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (25,1,NULL,'Search','Search','Search','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (26,17,NULL,'Determining Square Root','Determining Square Root','Robot determining square root','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (27,17,NULL,'Solving Scrap','Solving Scrap','Robotics Solving Scrap','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (28,17,NULL,'Process Optimization','Process Optimization','Process Optimization','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (33,1,NULL,'Administration','Administration','Description','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (35,5,NULL,'Edit','Edit','Edit nodes','weekly',0.5,'default','2017-08-19 01:38:10');
INSERT INTO `node` VALUES (36,1,NULL,'Title',NULL,'Description','weekly',0.5,'default','2017-08-19 01:39:10');
INSERT INTO `node` VALUES (37,3,NULL,'Resume PDF','Resume',NULL,'weekly',0.5,NULL,'2017-08-19 01:39:11');
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node_alias`
--

DROP TABLE IF EXISTS `node_alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node_alias` (
  `alias_id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `retired` tinyint(1) DEFAULT NULL,
  `redirect_node_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`alias_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node_alias`
--

LOCK TABLES `node_alias` WRITE;
/*!40000 ALTER TABLE `node_alias` DISABLE KEYS */;
INSERT INTO `node_alias` VALUES (1,1,'/',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (2,2,'/portfolio',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (4,4,'/contact',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (5,5,'/admin/node/settings',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (6,6,'/users',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (7,7,'/users/sign-in',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (8,8,'/users/settings',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (9,9,'/users/sign-up',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (10,10,'/site-map',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (11,11,'/sitemap.xml',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (12,12,'/portfolio/web-design-and-development',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (13,13,'/portfolio/art-design',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (14,14,'/portfolio/robotics-development',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (15,15,'/portfolio/game-design',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (16,16,'/dev',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (17,17,'/case-studies',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (18,18,'/case-studies/php/luck',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (19,19,'/case-studies/php/afflictions',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (20,20,'/snippets/color-selection',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (21,21,'/case-studies/angularjs/pair-10',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (22,22,'/case-studies/3d/broadsword',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (23,23,'/case-studies/php/instance',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (24,25,'/search',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (25,26,'/case-studies/robotics/squareroot',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (26,27,'/case-studies/robotics/solving-scrap',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (27,28,'/case-studies/robotics/single-program',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (28,30,'/case-studies/angularjs',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (29,31,'/case-studies/php',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (30,32,'/case-studies/robotics',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (31,33,'/admin',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (32,34,'/case-studies/3d',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (33,35,'/admin/node/edit',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (34,36,'/new-page',NULL,NULL,NULL,'2017-05-26 12:35:01');
INSERT INTO `node_alias` VALUES (35,37,'/resume-pdf',NULL,NULL,NULL,'2017-08-01 23:29:53');
/*!40000 ALTER TABLE `node_alias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` enum('art','game','web','robot') NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (60,'robot','Eliminating Scrap','Designed and Programmed (ASP.Net, VB.Net, KARNEL, FANUC, HTML, CSS, etc.)','solving-scrap.jpg','solving-scrap.jpg',2009);
INSERT INTO `portfolio` VALUES (1,'web','Hazardous Materials Table Lookup','Designed, developed, and maintained (LAMP)','jnh-hmt.jpg','jnh-hmt.jpg',2015);
INSERT INTO `portfolio` VALUES (2,'web','GHS Labeling System','Designed, developed, and maintained (LAMP)','jnh-ghs-label.jpg','jnh-ghs-label.jpg',2015);
INSERT INTO `portfolio` VALUES (3,'web','Gameframe Website','Designed and developed (HTML, CSS, Javascript)','gameframe.jpg','gameframe.jpg',2005);
INSERT INTO `portfolio` VALUES (4,'web','JNH Website','Designed, developed, and maintained (LAMP)','jnh-main.jpg','jnh-main.jpg',2016);
INSERT INTO `portfolio` VALUES (5,'web','PHP Example Website','Designed and developed (LAMP)','php-class-site.jpg','php-class-site.jpg',2009);
INSERT INTO `portfolio` VALUES (6,'web','Air Emission Reporting System','Designed, developed, and maintained (LAMP)','jnh-air-emission-report.jpg','jnh-air-emission-report.jpg',2014);
INSERT INTO `portfolio` VALUES (7,'web','Compliance Files','Designed, developed, and maintained (LAMP)','jnh-compliance-files.jpg','jnh-compliance-files.jpg',2015);
INSERT INTO `portfolio` VALUES (8,'web','Dashboard','Designed, developed, and maintained (LAMP)','jnh-dashboard.jpg','jnh-dashboard.jpg',2015);
INSERT INTO `portfolio` VALUES (10,'web','Groundwater Direction Calculator','Designed, developed, and maintained (LAMP)','jnh-groundwater.jpg','jnh-groundwater.jpg',2005);
INSERT INTO `portfolio` VALUES (11,'web','Safety Data Sheet Info','Designed, developed, and maintained (LAMP)','jnh-sds-info.jpg','jnh-sds-info.jpg',2016);
INSERT INTO `portfolio` VALUES (12,'web','Set User Group','Designed, developed, and maintained (LAMP)','jnh-set-user-groups.jpg','jnh-set-user-groups.jpg',2015);
INSERT INTO `portfolio` VALUES (13,'web','Training System','Designed, developed, and maintained (LAMP)','jnh-training.jpg','jnh-training.jpg',2015);
INSERT INTO `portfolio` VALUES (14,'web','Waste Labeling System','Designed, developed, and maintained (LAMP)','jnh-waste-label.jpg','jnh-waste-label.jpg',2015);
INSERT INTO `portfolio` VALUES (15,'web','Game Development Website','Designed, developed, and maintained (LAMP)','game-dev-site3.jpg','game-dev-site3.jpg',2006);
INSERT INTO `portfolio` VALUES (16,'web','Game Development Website','Designed, developed, and maintained (LAMP)','game-dev-site2.jpg','game-dev-site2.jpg',2005);
INSERT INTO `portfolio` VALUES (17,'web','Game Development Website','Designed, developed, and maintained (LAMP)','game-dev-site.jpg','game-dev-site.jpg',2005);
INSERT INTO `portfolio` VALUES (18,'web','Trailside Lodge','Designed and developed (HTML and CSS)','trailside-logde.jpg','trailside-logde.jpg',2003);
INSERT INTO `portfolio` VALUES (19,'art','Hyena','Painted (Wood Stain)','hyena-on-wood.jpg','hyena-on-wood.jpg',2015);
INSERT INTO `portfolio` VALUES (20,'art','John L Norris Art Center','Painted (Watercolors)','john-l-norris-art-center.jpg','john-l-norris-art-center.jpg',2005);
INSERT INTO `portfolio` VALUES (21,'art','Self Portrait','Digital Design','portrait.jpg','portrait.jpg',2010);
INSERT INTO `portfolio` VALUES (22,'art','Train Demo','Digital Design (Rendered on PSP&reg;)','train-demo.jpg','train-demo.jpg',2005);
INSERT INTO `portfolio` VALUES (23,'art','Hamsa The All-Seeing','Painted (Arcylic)','hansen-the-all-seeing.jpg','hansen-the-all-seeing.jpg',2015);
INSERT INTO `portfolio` VALUES (24,'art',NULL,'Painted (Arcylic)','conscience.jpg','conscience.jpg',2012);
INSERT INTO `portfolio` VALUES (25,'art','Oni Form','Digital Design (Photoshop)','oni-form.jpg','oni-form.jpg',2012);
INSERT INTO `portfolio` VALUES (26,'art','Ace of Spades','Painted (Arcylic)','ace-of-spades.jpg','ace-of-spades.jpg',2012);
INSERT INTO `portfolio` VALUES (27,'art','JNH Logo','3D Digital Design (Sketchup, Kerkythea, etc.)','jnh-logo.jpg','jnh-logo.jpg',2015);
INSERT INTO `portfolio` VALUES (28,'art','Seedling','Painted (Sketch Mix Media)','seedling.jpg','seedling.jpg',2011);
INSERT INTO `portfolio` VALUES (29,'art','Computing Monster','Painted (Mixed Media)','computing-monster.jpg','computing-monster.jpg',2011);
INSERT INTO `portfolio` VALUES (30,'art','Taken','Digital Design (Photoshop)','taken.jpg','taken.jpg',2009);
INSERT INTO `portfolio` VALUES (31,'art','Roy Wind','Painted (Pen and Ink)','roy-wind.jpg','roy-wind.jpg',2003);
INSERT INTO `portfolio` VALUES (32,'art','Dirty Toilet','Digital Design (Photoshop)','dirty-toilet.jpg','dirty-toilet.jpg',2008);
INSERT INTO `portfolio` VALUES (33,'art','Random Landscape','Digital Design (Photoshop)','random-landscape-design.jpg','random-landscape-design.jpg',2008);
INSERT INTO `portfolio` VALUES (34,'art','Sword','3D Sculpture (Zbrush)','fathers-sword.jpg','fathers-sword.jpg',2016);
INSERT INTO `portfolio` VALUES (35,'art',NULL,'Digital Design (mspaint.exe)','lacking-spirit.jpg','lacking-spirit.jpg',2003);
INSERT INTO `portfolio` VALUES (36,'art','Pick My Brain','Digital Design (Photoshop)','pick-my-brain.jpg','pick-my-brain.jpg',2008);
INSERT INTO `portfolio` VALUES (38,'art','Playing Dead','Digital Design (Photoshop)','playing-dead.jpg','playing-dead.jpg',2010);
INSERT INTO `portfolio` VALUES (39,'game','HUD','Digital Design (Photoshop)','hud.jpg','hud.jpg',2005);
INSERT INTO `portfolio` VALUES (40,'game','Project Vercon','Digital Desigin (Illustrator)','vercon-parts.jpg','vercon-parts.jpg',2004);
INSERT INTO `portfolio` VALUES (41,'game','Character Design','Digital Design (Photoshop)','a-true-oni.jpg','a-true-oni.jpg',2008);
INSERT INTO `portfolio` VALUES (42,'game','Level Editor','Programmed (C#)','level-editor1.png','level-editor1.jpg',NULL);
INSERT INTO `portfolio` VALUES (43,'game','Level Editor','Programmed (C#)','level-editor2.png','level-editor2.jpg',NULL);
INSERT INTO `portfolio` VALUES (44,'game','Window Large Sprite','Digital Design','window_large.png','window_large.jpg',2005);
INSERT INTO `portfolio` VALUES (45,'game','Walls Sprite','Digital Design','wall-type.png','wall-type.jpg',2005);
INSERT INTO `portfolio` VALUES (46,'game','Tileset Sprites','Digital Design','tileset-demo.png','tileset-demo.jpg',2005);
INSERT INTO `portfolio` VALUES (47,'game','Seat Sprite','Digital Design','seat.png','seat.jpg',2005);
INSERT INTO `portfolio` VALUES (48,'game','Game Screenshot','Digital Design (Rendered on PSP&reg;)','screenshot3.png','screenshot3.jpg',2005);
INSERT INTO `portfolio` VALUES (49,'game','Game Screenshot','Digital Design (Rendered on PSP&reg;)','screenshot2.png','screenshot2.jpg',2005);
INSERT INTO `portfolio` VALUES (50,'game','Game Screenshot','Digital Design (Rendered on PSP&reg;)','screenshot1.png','screenshot1.jpg',2005);
INSERT INTO `portfolio` VALUES (51,'game','Nightstand Sprite','Digital Design','nightstand.png','nightstand.jpg',2005);
INSERT INTO `portfolio` VALUES (52,'game','ISO Character Design','Digital Design','iso-character.png','iso-character.jpg',2005);
INSERT INTO `portfolio` VALUES (53,'game','PSP Font (Built Font Lib in SDK)','Digital Design','font.png','font.jpg',2005);
INSERT INTO `portfolio` VALUES (54,'game','Chest Sprite','Digital Design','chest.png','chest.jpg',2005);
INSERT INTO `portfolio` VALUES (55,'game','Bed Sprite','Digital Design','bed.png','bed.jpg',2005);
INSERT INTO `portfolio` VALUES (56,'robot','Teaching Robot to Find a Square Root','Designed and Programmed (KARNEL)','squareroot.jpg','squareroot.jpg',2009);
INSERT INTO `portfolio` VALUES (57,'robot','Cut All Suite','Designed and Programmed (ASP.Net, VB.Net, KARNEL, FANUC, HTML, CSS, etc.)','cut-all.jpg','cut-all.jpg',2009);
INSERT INTO `portfolio` VALUES (58,'robot','Robot Controller Setup',NULL,'computer-controller.jpg','computer-controller.jpg',2009);
INSERT INTO `portfolio` VALUES (59,'web','Hazardous Waste Shipping System','Designed, developed, and maintained (LAMP)','manifest.jpg','manifest.jpg',2015);
INSERT INTO `portfolio` VALUES (61,'web','Demonstration of SSH Access Using SSH Keys ','SSH, Putty, BASH, Pageant','ssh.jpg','ssh.jpg',2016);
INSERT INTO `portfolio` VALUES (62,'','Castleton State College CMS Proposal','Wordpress (PHP, HTML, CSS)','castleton.jpg','castleton.jpg',2012);
INSERT INTO `portfolio` VALUES (63,'web','Castleton State College CMS Proposal','Wordpress (PHP, HTML, CSS)','castleton.jpg','castleton.jpg',2012);
INSERT INTO `portfolio` VALUES (64,'game','3D Game Engine','MySQL, HTML5, Javascript','javascript-game-engine.jpg','javascript-game-engine.jpg',2016);
INSERT INTO `portfolio` VALUES (65,'robot','Formula Example','Pen Paper, et al.','robot-calc-e.jpg','robot-calc-e.jpg',2009);
INSERT INTO `portfolio` VALUES (66,'game','Menu Design WIP','Digital Design - Fireworks','menu-design1.jpg','menu-design1.jpg',2006);
INSERT INTO `portfolio` VALUES (67,'art','Death Valley Unfinished','Acrylic','death-valley.jpg','death-valley.jpg',2012);
INSERT INTO `portfolio` VALUES (68,'art','MrHeroux Logo Design','3D Sculpture','hx-logo-design.jpg','hx-logo-design.jpg',2016);
INSERT INTO `portfolio` VALUES (69,'','PSP Game Engine Render Lava','Lua (PSP Game Engine)','render-lava-level.jpg','render-lava-level.jpg',2006);
INSERT INTO `portfolio` VALUES (70,'','Tileset Lava Test',NULL,'render-lava.jpg','render-lava.jpg',2005);
INSERT INTO `portfolio` VALUES (71,'game','PSP Game Engine Render Lava','Lua (PSP Game Engine)','render-lava-level.jpg','render-lava-level.jpg',2006);
INSERT INTO `portfolio` VALUES (72,'game','Tileset Lava Test',NULL,'render-lava.jpg','render-lava.jpg',2005);
INSERT INTO `portfolio` VALUES (73,'game','Character Low Polygon 3D Design','3D Sculpture (Blender)','character-blender.jpg','character-blender.jpg',2006);
INSERT INTO `portfolio` VALUES (74,'art','Ouroboros Sketch','Photoshop and Wacom Intuos 4','line-practice.jpg','line-practice.jpg',2016);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tags` (
  `post_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tags`
--

LOCK TABLES `post_tags` WRITE;
/*!40000 ALTER TABLE `post_tags` DISABLE KEYS */;
INSERT INTO `post_tags` VALUES (1,1,1,'2016-08-02 16:30:19');
/*!40000 ALTER TABLE `post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Choosing Colors For Your Web Page','<p>In general, it is recommended that a website should follow the 60/30/10 rule. This refers to the practice of using one color for 60% of the page, one color for 30%, and one color for 10%. The 10% is used for call to actions, such as my shopping cart. This practice makes balancing your color pallet easier. Of course, there are exception to this rule, such as with sites featuring deserve images.</p><p>Another good idea, is to consider using your company\'s colors. If they work it will help add cohesion to your marketing.</p><p>Now there are a lot of colors to choose from. For this site, currently I picked blue for a number of reasons, including</p><ul><li>Between different genders, the most preferred color is blue.</li><li>Blue symbolizes trust, loyalty, wisdom, confidence, intelligence, faith, truth, and heaven.</li><li>Blue is considered beneficial to the mind and body.</li></ul><p>In short, always you should always consider the meaning of the colors you are representing.</p>','2016-08-02 00:00:00','2016-08-02 16:29:45');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Web Design and Development','2016-08-02 16:30:13');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'admin','admin@example.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'686a6345c775992ef897e5e75b017bcd','$6$50$MWonXqsDeUy7gjEz3FUlqWcrjAr2rB166sdK0/Ktc2lVykokmsvxbFKHwwYBwu4u3EMVJG6tb7LBR6gAFzcCn/','US/Eastern','F j, Y','g:i a','2014-03-21 09:32:59');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_authentication`
--

DROP TABLE IF EXISTS `user_authentication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_authentication` (
  `ua_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `remote_address` varchar(255) DEFAULT NULL,
  `authenticated` tinyint(1) DEFAULT NULL,
  `sign_in_time` datetime DEFAULT NULL,
  `sign_out_time` datetime DEFAULT NULL,
  `stay_signed_in` tinyint(1) DEFAULT NULL,
  `token` varbinary(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ua_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_authentication`
--

LOCK TABLES `user_authentication` WRITE;
/*!40000 ALTER TABLE `user_authentication` DISABLE KEYS */;
INSERT INTO `user_authentication` VALUES (1,3,'127.0.0.1',1,'2017-09-13 21:43:32','2017-09-13 23:33:16',0,NULL,'2017-09-14 01:43:32');
INSERT INTO `user_authentication` VALUES (2,3,'127.0.0.1',1,'2017-09-13 22:18:43','2017-09-13 23:35:08',0,'\0§W5´\Z8\«\r\ÊÄäıä\Ã yap\ﬁ!X\Ê…•ñd\\PSó\È\ﬁ]\ﬁdîÔÆÄD.ø\¬4g\⁄\ÔEf∞∂*9 g+\„é\ŒÒ\⁄\"\‘ˇ\“7¯¿\÷}\Œ˙=⁄äü\œ@8µ©ÜYI\≈:âs\0\›¿¿!\ÂX.~*ø&\»\“—≤Eõkh	\ÁOàæØ\„e!x¬©Òï*[q$\—ºf\"©OI\‘\‘_≤Òø˚¿b¥˜`-\◊¯\÷˛&\⁄CE\Œ€∂ß,j\Ê&l\‰nN\r#`!äıç<N\\\‰:L]3\Œg\À\rd;íî\ÓPª]˙$1:ÛP\„∏˚ñ\‘\·¿Å\Z˙\ lÜöhcÛ}*kw∏˜@˛','2017-09-14 02:18:43');
INSERT INTO `user_authentication` VALUES (3,3,'127.0.0.1',1,'2017-09-13 23:11:29','2017-09-13 23:35:32',0,'üÇ<Q\r\È\ZÆ•\Ál\n\ _‘í3&âä|L^\›9˙\ÌY9\’kæÄT∂nJ˘˜f$\ﬁ@•õ˚6\"Ê∂ü7$0Ω_£∫áD\Á,¯f\0†˘(S\√B	πaÉ∫í]ªÄãª∫ÉY~Ãø5O è}d”∞\·Ω\¬ÿü¨jÅ»≥d˜Bõ\«\Âì1§A','2017-09-14 03:11:29');
INSERT INTO `user_authentication` VALUES (4,3,'127.0.0.1',1,'2017-09-13 23:11:31','2017-09-13 23:35:58',0,'i\ﬂ{ã=(\Î\Í°Ré˜hR`!œπMxç\ƒ\ –Ø¢˙*Ä‚íÜøÖø¥\“U¶3+\⁄6§êN,û£Ä`S∫x\‘BÙØsaèfCE}°\ËÄ>\“:£\n\Í›∑\‚Æ#π9j\Ïú\'\–jæAΩôπZëÙçM:Æk%˝˘\Àz\≈mHÁ∫∑\Ô\ ˝õeL\«lM®+´S+∫Gá0\ÃD˛ñ_ã`\Ó`R\rê9x^\ﬁ\œe\„Çπ4áÇ\„Z£h¸åíxÅ_G\Â(\‡Dõ–â0+4âÑ¯\'rkél˚b\∆f•˜ú@§£H@n(%†µõd\≈*@I{˝Ω\Œë˘XZ•4˘†J2\¬`†¶òU\Õ“Ø','2017-09-14 03:11:31');
INSERT INTO `user_authentication` VALUES (5,3,'127.0.0.1',1,'2017-09-13 23:12:15','2017-09-13 23:39:03',0,'Uä\√\«f}v','2017-09-14 03:12:15');
INSERT INTO `user_authentication` VALUES (6,3,'127.0.0.1',1,'2017-09-13 23:14:53','2017-09-13 23:39:24',0,'\€x \'5¥ògèG=£ùçlˇ','2017-09-14 03:14:53');
INSERT INTO `user_authentication` VALUES (7,3,'127.0.0.1',1,'2017-09-13 23:14:54','2017-09-13 23:39:27',0,'$Ø˜µÑãº∑rhjZ∂%î˚≤ÄC\«v\›\¬s¡\È˝aSº\Œ\Ôeˇ\ÔI˝)Ω|µ\Êbbo!rB`π\’˝7\ÍJ#õ˜æ\«\Óâfëö=ó.\·Gì(†“à\'¯∂òCóa&\»€èx\„uÅ~Ç\≈Û~Mô\ÎW\„∂\Œ¯Ò\ƒ\"tw\‚','2017-09-14 03:14:54');
INSERT INTO `user_authentication` VALUES (8,3,'127.0.0.1',1,'2017-09-13 23:15:26','2017-09-13 23:39:43',0,'¢Äïü','2017-09-14 03:15:26');
INSERT INTO `user_authentication` VALUES (9,3,'127.0.0.1',1,'2017-09-13 23:18:36','2017-09-13 23:39:48',0,'\Óq˘x=\„\ﬁ\ÏÆ	@ø4\0àa=!Ü\≈\‘˘¶@éO \›\Ÿ\Œ\0ú¯;õw˛','2017-09-14 03:18:36');
INSERT INTO `user_authentication` VALUES (10,3,'127.0.0.1',1,'2017-09-13 23:18:50','2017-09-13 23:39:58',0,'yi,ôƒ∑P\Õ\ﬂ’ï\Ë≠k8N\‚>˘æIΩ\“ˇÄé á¿Æ9D{}&`Ev˝\‚#\›%K∑\Ÿ9Nöãç\›6)\‚\„_;ú÷®r\‚áá*2\€PUûç.\"\’*P\Ï\Ï\Óz	ä\◊\«\Ÿ1Oq\»-£ˇÖC≤4l\'\‘\—\Í∂ÛüÄ´_s\r)°\0\ﬁ1®ê\Ì\'9\ﬁ|HI\ƒnÓ•êˆRQ+c0ñ)±¸è¸\Ã ÄL!\ s\‚\«˘\Ã\Ô{˙˘\"¸”•au\ÿQI3Äæ!∑*Úˇ9¡†9[#ˇÙQU\nc¥Ú˚˘π`T6V\„\ÿ$k\¬D-ï|Aé\Õ˚¥\ÎˇCö_C\ÈptjbêKêæ†\Âπ','2017-09-14 03:18:50');
INSERT INTO `user_authentication` VALUES (11,3,'127.0.0.1',1,'2017-09-13 23:29:03','2017-09-13 23:42:15',0,'\ÃFº;ò°î\›^\≈o\‡™ﬂûö\Ïı¸b,W\'\—*ÜäX>(léaHHmıÁï≠\r$ÅD3DCVÆH®K_5¨êa\’9\Zäé\ F7é≤{Tı\◊˛¶V-\‰#†á<Ñ\‹Ñq¢N ∫C)`!@vt{e%äª\¬˝6\⁄a\\29rYKŒèöÛIø5I&Z&5õÚ\Â4Ü&=$|oˆÚΩê˘˜\–=','2017-09-14 03:29:03');
INSERT INTO `user_authentication` VALUES (12,3,'127.0.0.1',1,'2017-09-13 23:31:12','2017-09-13 23:42:42',0,'Cı≈ê\Ï<≥˘É÷Ç∫\Ÿ∏4\·º\Ëk´´ˇãbú?7w9≥p)Y\Ÿ&Œ≠¿\Ìähi¿&ABÆ\≈F\Ï¢±õû\ËÉ6\Ã˘üe\‚ì$9R\‰¸Hå©Ü\ﬁ\Ë^\‹pKwO\Ì>àïy\›\‰?çY\…^¯p5˚˚î\‚\“0Eñ=†˙é.&˚\”\Ë\ Ò\–\‚\›&∏\»\0ñÒ\Ó.\Î@b\‹tRÚ8	S¡\Ï\\1‘®Åú*/ì˘\È\∆√ôj\ŒÙ\\am`∏Ωh\◊P\Î∏2\‹t\Îﬁèãiø±8Dê\0>ÜÓòõ\‰0\ÏgaR7ÿñ∞!D4t\»pA\√?LËâ¨!•d\0o\ƒgwè\Õ\ﬁ\‡B®vm©','2017-09-14 03:31:12');
INSERT INTO `user_authentication` VALUES (13,3,'127.0.0.1',1,'2017-09-13 23:31:14','2017-09-13 23:49:18',0,'=é\ è®≠π\√¶V`dñ¥V\◊uÓõ¶\"ç:c©\Íl∏ø\Ê¸¿\„˚Èí¨∆ÆÆÖø\ﬂ\0´\ÿ9xøuSfâ±´zíßx®\¬ Ö\Â{.28ß*2\ÕNëw\Z\Á[∏\»\ÿ\÷‹Öæ\≈b[˜T¢\“','2017-09-14 03:31:14');
INSERT INTO `user_authentication` VALUES (14,3,'127.0.0.1',1,'2017-09-13 23:31:59','2017-09-13 23:49:28',0,'e+e˚!”åÕ§ñl˘û˝ò\ﬁ,\÷oäÙçhúûç\ŸríU&Ærˇªœêªì\‹\0Ñ\…\Í\ZÙ\»LYHsøn®¶w≥5it\€lÆ\ÿ0≠\Î','2017-09-14 03:31:59');
INSERT INTO `user_authentication` VALUES (15,3,'127.0.0.1',1,'2017-09-13 23:32:01','2017-09-13 23:59:51',0,'É\Â;\◊ì4(úè1Û∏;úá™¥\“J\nç\n¡\‘7r(\"á\Á\ËQ	\≈¯°?/`üzz8fø\”A\Ï*\√\ \»~\ÁuÆÀπñ<ñ	 hø)-\Ë(.\›okÚ:>So5\√\Ëh£\Âº9>\Î¡ò€ãÅà—≤V.mmk\‹[CÒ\nA\Œ\Áç3pû±\n¢\≈\»\◊0H%\√ãø\Ïò9ô\‰.v˜•ô\ÁÆ\ÁÚèÛu˚\Ë†§∑^\·ioEgì\–\Œ—õôJ\◊-JÒ¶_¶•+\◊bQP\ËgîC\‘LñXJG`®\Âe\Ó\’\ﬁ={l9´\ﬂd\Á-¸\–	æ\ÃîG¢ÃíuVW\Á\r:eé\‡O','2017-09-14 03:32:01');
INSERT INTO `user_authentication` VALUES (16,3,'127.0.0.1',1,'2017-09-13 23:32:19','2017-09-14 00:04:19',0,'∑P=á18á\ÿh&\'˝\Ô\Zv∂ê9¯(e\‰p\Ã\◊\‡YA{¿\Á\rX˛û	eKtÜ®gΩ<@3ô\‘\«\€3\€\ÿ	˚DK]ˇªA¶z\”y0\Ïˇ≥∆é@6Z`ÓÆî$\·!Ç†´\'7ÛHëR9†bõ4˙7\ÓØbÉµ≠R\Õ}é¥bgÜcÿØQ\Áø\⁄Õ™…£RD\\yMT¸ ÇÜ©πXO\Ô\Ó¡õµ†\ËÜa\«h»¥ó3ÚDPÒ‹ºF‰øáÉZ]‹ÑN’à¥\ ','2017-09-14 03:32:19');
INSERT INTO `user_authentication` VALUES (17,3,'127.0.0.1',1,'2017-09-13 23:32:59','2017-09-14 00:10:28',0,'co\‘\ﬁ•\'#%& \Ze?(ˆT\–4ºï\‡\n≥h>\‘IZ˝÷ëN™','2017-09-14 03:32:59');
INSERT INTO `user_authentication` VALUES (18,3,'127.0.0.1',1,'2017-09-13 23:35:02','2017-09-14 00:11:50',0,'\‹\—U¶\‹Ú\ÂD+PoÒ\—áî7™TÖˆ§ø\∆3\'U–úé¸R8A\Óo¥A0Q)=àZ\Œc˝ëΩ´Ly•XM\Ÿ˝`∂K˝*¥\Í<d\·¢:\”\'Ò\≈=\ÎuæA:qÉÜ\ËyÙ%ˇ˛Ø\…-É-m\ﬁN\ÊåŒùg¸\Õ@Ñ\À?U±õ9êä¶Öy\ﬁ=b\Í˚R\‰A˚\”*ºÇf\‹`)EÑ∆ö\r\—◊ÖïrT7ßû˛\ÍÇs\Îô.è∞§\”}üﬂµQ\÷\‚\‰6∏ \◊g¿iø±\≈kÜ´}7b}bìZz©\ƒ.q\’nLk›ëPy\⁄˛.y3éiÙ\Ôπq!6xj\‰e\ C’ºYji7•N\»\ÏV\√Ò\Ã','2017-09-14 03:35:02');
INSERT INTO `user_authentication` VALUES (19,3,'127.0.0.1',1,'2017-09-13 23:35:30','2017-09-14 23:19:17',0,'DûnÖÖ⁄∏\00u˝˜\ÿ\0Öûvôñ/q8Ú&\Îæ\€pˆL.ã≤∫à&d£9∑ç7Q¿T˙\·[°NN¢^a5™','2017-09-14 03:35:30');
INSERT INTO `user_authentication` VALUES (20,3,'127.0.0.1',1,'2017-09-13 23:35:47','2017-09-14 23:19:26',0,'E\·\ÓCvKl:i.\∆\Ó\'w2ê–Ö∏F[OH$µo˜ ˜˜óú$£C\Óâõ4á-ÄÒ0Ç\·®¨a\Ë)\ \‹$Ã†6ˆ\0\◊\Îlj∞\ÿ\Zm\”Tå[*ˆY\‰\ÂH|à-∞\›\nüá ı\”pSØ,<\‰^\È%\ÔÃòE#âº\Œg\ŒH\À%\0ç ÉFilóH&¸º\rkò˙ì{°\ﬁ`\Zxâ\0ÑWR<~‘ÅU˝Ø≤,¯Ç˝^Z\›\Ì\⁄VÖV˜ì¿\ƒÒ\»>\"πã<Aø«Ü\‰\‚,ûü1/–µ°)‹á\√Z%d$N¸‹Ñã\»\ÂW\ﬁ\‚á£J1cÅlÒÄ2†˜•ì¿\ÍÙ∑Ik\÷s','2017-09-14 03:35:47');
INSERT INTO `user_authentication` VALUES (21,3,'127.0.0.1',1,'2017-09-13 23:36:14','2017-09-17 10:06:33',0,'ñ3\‡˜X£öª—µGV˙fF¡§M*´\Ì˘§\‘Y\≈eßÚ°\Ìl Ùá§k\·\◊n\‰F°\ﬂ\„\Ï=©ÙU≥S\‰v\ƒX.∑ÜÜ\r.\'5›äö\Ó¡ﬁã\„\"w;¿\”\‹&Gã\√1ıÆs1ñí[.2µÛˇ\‚ü π:Lôlöî¯6Q˜˘Ò\≈W˙%\rÒçóQ\–∆≤\ÓJHæ˛nñ˙9l√ÄDòY>-6•\≈l\nçêﬁú†ıÑå¥/ëÚ{®R|™\0\€\„nsòSù ªöUÆµ\‚\ﬁ\ÌO.§°cçW\Ày.\—\nd\·®\Ã{À∞\Áy;2\Á6R±^-ˆ3 gÜ+\∆\≈\'!N','2017-09-14 03:36:14');
INSERT INTO `user_authentication` VALUES (22,3,'127.0.0.1',1,'2017-09-13 23:39:00',NULL,0,'<Zklñ','2017-09-14 03:39:00');
INSERT INTO `user_authentication` VALUES (23,3,'127.0.0.1',1,'2017-09-13 23:39:46',NULL,0,'à]v\Î&^˘\ﬁ#v','2017-09-14 03:39:46');
INSERT INTO `user_authentication` VALUES (24,3,'127.0.0.1',1,'2017-09-13 23:39:56',NULL,0,'\–8…ù∞\ﬂ~â\ÿ(<)ûû∑ÖÑHôv8nÅ˜\◊¡ñ#Û<?ùZÕÇ\ﬁ¿\\\›U¯ê>Yp\Ì8í\'2ù\”¸b\»#\’qÖ\œdú\›\Ê\‚w)5Ü¢\Âk5\‘\ÿb πØπ \«\¬—Ü','2017-09-14 03:39:56');
INSERT INTO `user_authentication` VALUES (25,3,'127.0.0.1',1,'2017-09-13 23:40:05',NULL,0,'\ÔCÖè9¿ãj≠V˝Ω)¸0T£©?#åOA-!b|\‹{6”Ö#ˇ&\Ï\≈\›\ﬂ\…Œ≤\¬hıt°','2017-09-14 03:40:05');
INSERT INTO `user_authentication` VALUES (26,3,'127.0.0.1',1,'2017-09-13 23:42:21',NULL,0,'\Ã\Íˇ\·â\”;[6\Áir\Ô´\ [∂\≈›æø.Òå3êP˝≠°k}/B$‹àaª£^\ŸK\‡!Ω\‡¶˚*	Ä6˘Ä\ÔUû\’#cAt.îÆ•’Ø&vu˛Ü8ò\ÿcb\ﬂeJ\œ\Îj˚]I','2017-09-14 03:42:21');
INSERT INTO `user_authentication` VALUES (27,3,'127.0.0.1',1,'2017-09-13 23:42:45',NULL,0,' ΩnN>æ˘¢\—3\€Q\ËrÕÉY\Í)™{êê\ny™çtìÄ%\Ÿ\‘\ﬂMîk@\Ê±*æ∞Òú*\Ì\œ]`î\⁄\n\ﬂW∞G\Ó8˝\‘e\'¸IGt\'Xí◊∂Z\Ï\¬s8C\ ?77\ÊO%\È∞~\∆¿<ú…îΩ\‚k\‚	x\Ÿ]jˇ`ê\«1èöcΩ∏\Ìü~G\r≈õû†Æ:ì\ÓÜ«Ä∫í\0r˛U\ÍhDYUm©∫lK\·>&Ö¡ôSΩîÉ%\À>ExnI\”%	º5øØÑëØ∫J5Ûìê\›ˇö°!´N\Áø\ÔÇzpx˜áÕífuWßCY|\rê≈öc\Õ~\0ÒÒC1ñE•sKSƒØ','2017-09-14 03:42:45');
INSERT INTO `user_authentication` VALUES (28,3,'127.0.0.1',1,'2017-09-13 23:43:32',NULL,0,'•vß_ó\œ\«,˜≠Iˇl\—\≈/4üÚ\◊B','2017-09-14 03:43:32');
INSERT INTO `user_authentication` VALUES (29,3,'127.0.0.1',1,'2017-09-13 23:49:25',NULL,0,'¸•›Öù*\‘^jA\…-rY\”ﬂ∞®ff+põ\„\Áf+	\Œ\Í¡\√ YRü}>¢ïz.ä•sf1*`xæº\œxÚ\»˛\Z(\‰\ﬂ˝\Êıàö6ú73vª\Œˆ@\ Kb≥ò\Ê˙\\dª∂T\…0\Õ-;\∆\◊\‚0Ü¬õ∂!w∑œö®ΩÒò´!\‚O˘û9Ø\ﬁD7¶\ÈP6\‚\ÕÕü≤ç\∆\0_u¨uä\⁄È∑Ñp|î\ﬂNµª\Ã\ŸÄ%îˆ<\‡K˛¨W∑—®\Ï™InGfâÒΩOÖ£O\—°â˜›¢Ò!\ÎÑ¸Ÿº=\ÕCFãPSΩ\ÃF¨b\Ó\Ê\Õ˝\Ë\’ﬂó;Ç£ØJ n®D\0˛sÉ˚•\ @Mëp\ÿ','2017-09-14 03:49:25');
INSERT INTO `user_authentication` VALUES (30,3,'127.0.0.1',1,'2017-09-13 23:49:33',NULL,0,'£\…Eqç\ÏM`7\„G∑_\”\Óß\Ÿ\Ë\√Y[\≈\‰Dåaºæ\◊O+∏◊ìì¨†\⁄8\"˜˛?Å\ﬁ\‘dGt\"Û\ \‘˙Aö\Îl©L	∏HˇQµ\»Àéz\—.ˇ\ÓÉ\Œ3˚Cã{£®™\€+%˝Öiû\n™%M\\\"\Ô\¬]∑_A%y2#\‡iÆgÉ”ó\Ÿr\√\Î“∑kêõvÜ∫E◊≥à\'¿Øn≤k=^WëU¶n≠∑ˆØ»ß~÷é\‚\«E7ö´MPı\Ó\’R\0\¬\'É\\ˆv7©\—','2017-09-14 03:49:33');
INSERT INTO `user_authentication` VALUES (31,3,'127.0.0.1',1,'2017-09-13 23:50:02',NULL,0,'\‰\∆\«\"û\Í\‰Ü7d','2017-09-14 03:50:02');
INSERT INTO `user_authentication` VALUES (32,3,'127.0.0.1',1,'2017-09-13 23:50:15',NULL,0,'Rß\ u∑1∫?3B·°µv42êõ\0§»∑õ\Â[¢g\“1•Ú˜z\ 9Ù\Ôù\ÌXn\Ì','2017-09-14 03:50:15');
INSERT INTO `user_authentication` VALUES (33,3,'127.0.0.1',1,'2017-09-13 23:51:38',NULL,0,'éW	{T\'thı3','2017-09-14 03:51:38');
INSERT INTO `user_authentication` VALUES (34,3,'127.0.0.1',1,'2017-09-13 23:52:36',NULL,0,'¶Ù®+∏ jK!~VrI\ﬂqV˜I\ﬂ\≈aÇr\Ï6#eä£∫\ M†7B≥≤\€=∑>\Ób[∏¯åú@8s¶ãòy%©•Æ≤òü`uV\0Å±iß\Ëi§\‰µ,Bà•≥S˙.tÇ\"ì\ \ZÑ∏s\Â\"fëpµ˜57','2017-09-14 03:52:36');
INSERT INTO `user_authentication` VALUES (35,3,'127.0.0.1',1,'2017-09-13 23:52:40',NULL,0,'¶é£¯\‘]8:Ú51\'U3%†Ã±ÆûØöë;V∏l¢ÒUe\Âu7˜±I\Ê\”zal+~\‡ÅúH±sß‘îU5\nGêC2ˇ≠\Ê≥\–!?£uíJ∂@\Ï=ßæ\"dFF\¬&:\nå\”4}\·&\·g©80d\Ë>\Õ\ÁÃùÚ\ﬁ=U\r\⁄	,?≥\Ã¯ƒ∑üΩNdÒøb\ÿ1~ëá\\\ b&∂%à\”	¸˝+døπÃà\ƒ\n∑Pir˙\›˘\¬æ™\'W≠ÒRÒN<\√6b∏<≤','2017-09-14 03:52:40');
INSERT INTO `user_authentication` VALUES (36,3,'127.0.0.1',1,'2017-09-13 23:52:41',NULL,0,'ßîæß3n\Ê\√¡ª∞tµ/;Åˆ\Z<ì\"Ø≠Å55}\Zù∑î¸˚hí\Î\Íy˛V¸±i˘™°àµç\–bã\”˘CµπE}k¥õê[n˚%\ŒrUeé>\Áé£\—Ve\„\rçGì\ÊìÛkO¸\\\ÃÚ•º_¿\◊Æ$','2017-09-14 03:52:41');
INSERT INTO `user_authentication` VALUES (37,3,'127.0.0.1',1,'2017-09-13 23:55:23',NULL,0,'Ew&(Ñ§b\\y\“j}DîØöf\–\ÓÛJ]g\»ƒ≥\»	û≥\Í\Â—¥≠\≈\ÎC\·,Hí•äxFÒõJ\'óÕÅΩ/q\” èÖ∏tœ©XÉKÖv]˙Ec±ı\ƒ\”.\Èv¶C$\ŒF™\—N\Ït|.7&*9é/F∂ûe%G8\¬(ívVx®|\ÎqÆ\ŒÛVW˜n\◊\"\–OŸ¥ãéÀ£[1Kp\œ$\ Ç}8yêüªòÇ≠l†ãI','2017-09-14 03:55:23');
INSERT INTO `user_authentication` VALUES (38,3,'127.0.0.1',1,'2017-09-13 23:55:26',NULL,0,'\œ\Îz´∞ªæg\ÔL\Ëû\…@XSì4∞g˜\ %‹´\‹^¡≠[π¬ú™{f{∂o¿ı\–*æ\ÿ\„‹†X	ñÀªJ\'ª\¬\ﬁ\◊([Wï>˚','2017-09-14 03:55:26');
INSERT INTO `user_authentication` VALUES (39,3,'127.0.0.1',1,'2017-09-13 23:55:39',NULL,0,'\r\ËNøë6\ﬂBñ≥Û˛%IÊ´π¸78æ\«=ÚG1ë®g`\÷@\'©\›xN˚Ç\‘H5r\”Êíö®\–Fà«∏Púıô√ÆJVÄïW\Ó]~!$˙∞¢7Ω,`ó\ŸE\0 π3kï$Ù}\„sZm\Ás;‘º–¥e=ï)≤:π\’\”=Ue¢^ç©>aóˇp\»ñ	∂\ÂGèø','2017-09-14 03:55:39');
INSERT INTO `user_authentication` VALUES (40,3,'127.0.0.1',1,'2017-09-13 23:57:22',NULL,0,'ª7\Ê∫G\ tñ*<cÇ±∫\·\\\Êo∆úí\nc\ÿ\Îuî\Õ\n@êÿêP\„\0>\'+#¢îµI7Å¨›∑-9&ÉG\· ï∫yü(73uIó:•™iS=çF°l,,0\∆*ŸØüå°\ ^ZÄg b	ì%\Í\≈L√ÄXˇCÄÙü ±üAwÙe∫π\Õw∫7›®\nûd∏U@\Ó%®É\›# gå\Zò∫±A\\$\◊q¯á¶\ƒv\‹\∆\„Q\–mˇ-\È\Ô\\F˘˝r\Ÿ&Ü\»({?8Å\œ9ª>\Ã\›\"ıUÀà`©ì¨¿\‰h.Å\Õ\”\Ó<\÷REmA&`\0‚∂®êN≤\ƒkj∆©\Îz¶Ùl\¬\«','2017-09-14 03:57:22');
INSERT INTO `user_authentication` VALUES (41,3,'127.0.0.1',1,'2017-09-13 23:58:31',NULL,0,'\Z\ﬁ','2017-09-14 03:58:31');
INSERT INTO `user_authentication` VALUES (42,3,'127.0.0.1',1,'2017-09-14 00:00:03',NULL,0,' w≈ä8A/\‰\›©âª\√˚\‡†\Áz.\∆\„¥ç=úw\⁄\Ï0@\≈E	ˇStEWÌû¶MØÑ\ra∏\Œ^à\\__\È\ÿ¯\ÔZ\nò\€kŒ¥\Îº)™\‘\ÓòıYNzËçæl∂yg\‰\ÌSßZ=XK∞\0\ÊqÚV=\…tπÙ!≥	pT\Ë\Ã\ÓW\∆Ú}6<\‹ å\ ˜YÛ\…\Ï˙M\ÿYq#ö8W\–\‹N]Y˘','2017-09-14 04:00:03');
INSERT INTO `user_authentication` VALUES (43,3,'127.0.0.1',1,'2017-09-14 00:00:34',NULL,0,'Ω\·5™†\‘Quù\‚…±?ì\Î	9\Õ\¬o»∏\ZlzÃπ\∆*K<\\í7moYA}W\‹OZ\Œ\€\ÁF\ﬂR$vù∫•àz6§∂\r¡ó\'•øµuÖC{ˇÉ\ZôpΩ\’UKpﬁ∏\‹fü\\óΩ£~d\”pt\Âz¶˜*.˚AÉ\ÍlÚaõzˆ\Ï˘}\÷mπ¢gú	*w¯∏•§\Z\’RÛ\⁄cç¿0\"õ|\È\ÕKé˚&\¬Fø\–=RhS∫\Ô\Õ2s\È7\”\Ï8tí\ƒ¸','2017-09-14 04:00:34');
INSERT INTO `user_authentication` VALUES (44,3,'127.0.0.1',1,'2017-09-14 00:01:55',NULL,0,'£ø±c∞˚]ä\Êhn2§˜∏R\ƒñê¶øIõ6\ƒ¯ª≠\Â#_´7¡ø¥>˛õ\¬q•Ã±Àü\Z†ué\„Õôb\Î%¨ö*kN˘‡°©l∏ı8P\ÀtÖΩ\¬T\ŸA\0ñÙs…ª1Ø¿>ÉÙ6⁄ö:$∏}PC \›˘¥2ßZ\ﬁ]ì\…\Ï_Ø±Cñ˝r¯Ôàãúﬂ§‡∫∑á-πå`á§p/>M€æJ:˛ˆV\÷\Ï\ÃEs0\ÿˆM(d\‚\—\ÓäY∏?e\‰\‰5\ÀR´∏T-¢n\»@≤V#¶;>aúª(PXw\'6\"{Ù:,û;ü˙\nW°Õ±\nk\ÈL\ 0ˆJÜ\Ë\Á','2017-09-14 04:01:55');
INSERT INTO `user_authentication` VALUES (45,3,'127.0.0.1',1,'2017-09-14 00:02:20',NULL,0,'úI\«ÇfoÚ°K>8a)oπ1ä\ÓˆüúæsÅ','2017-09-14 04:02:20');
INSERT INTO `user_authentication` VALUES (46,3,'127.0.0.1',1,'2017-09-14 00:03:57',NULL,0,'eÉr\◊C7é%\Z\‰\‰Ò?Åç\“múµÙ\»¸Cäf6O}Pï˚‘Ñı\–«ò8˘ÆU[GÛ4r\Õ\\Y/Hï\"YãY\–6','2017-09-14 04:03:57');
INSERT INTO `user_authentication` VALUES (47,3,'127.0.0.1',1,'2017-09-14 00:04:24',NULL,0,'ı;G\·\rΩ*R\‹(xA©oÑëwa\‰Ovp\√{\‰˝7»Ω›õ\0™“∑ö\›mAå]π|Ò§où6%®˜\Ï\r\‰\◊o°\Œ0∂U6NQXï/∂i£*+\›^\‘Tå%•{`i±ùï\'aéúÑ\ﬂ»°ˆåb§ëù\Ãˆ3ı4=#	S≠¨\Ó˛Äu\“\‰fÇ\0Ä\∆\—w;¥í\Î®H\Á\Ôµ\◊>\Ô[0\»Û+µ~\Áï∆ïΩa∫\Í\ B¥7íOúc+ÇvVÒ©VkBÜtgÛ\‰ÛD\“&58&\—$\Œ5q\ÿRpI\Ô\ÓE®¥\ÂÙiv æ©1^PJ\À\ÿf{âk2\»öì¶∑πÑg¢h5:´I\–ÍØá','2017-09-14 04:04:24');
INSERT INTO `user_authentication` VALUES (48,3,'127.0.0.1',1,'2017-09-14 00:11:46',NULL,0,'-x°\ﬁi\ÎoX<N\Íkl\nıÉÒq*”çD\Õ¿\r\ÊÄ{ò≥˘Èóä\≈\nı∫2yπ–∞üô\"B÷îΩ˙˝\Ã˝u\‹N°]v\\\Ã-˛£#!\Õ#\'âR∏Ø\»\0\‘Ã†\ÌJ\‚\Ÿ¯\«,˜\nd\rÄ\Ê\·p\—wˆGßöÜÑíoÕâ\\yHz%˛\‹¡ﬁõ8\ÁˆJﬂí|o\»8îë\0∑Ω\Ï\Ï\⁄˙G_ôÄv\ #òN¨÷•;lS!•\Z\Ë\€¸∑ÛeK\—ˆ\Í2ù<ëT˛8\”','2017-09-14 04:11:46');
INSERT INTO `user_authentication` VALUES (49,3,'127.0.0.1',1,'2017-09-14 00:11:54',NULL,0,'prw\ƒE\ﬂB:\"!Ãª∑˜!>Me0ùD$\Zb5\…k¯D`0X†ÿ£)bµ\”yØ\…¸à°nÚNAÆ∑PR¸aá:^ÑB˘©˙\«yàêoˇ\ﬁ˝CN´]˘%M6G\Ã\Zí\Ì\«0∫X\Ë\‘Y”É\À\◊\ﬁ<®˜å\–\ŒM≠b˝¯áè\÷mU|¿äg\ÕN\ŒMôL◊ÆBî\\©X√ºéI ”îì0\…~S\‰›è:iIÖ\”\ÏPºLi]\ \ \"≈éâ:\ZöF|ø mb¿êÚ?ˆr5k´´™®£\‹\n\”ıá\”ãJÓå±5>rêk)tû•m{\„\‡ô|h1\\≠\Ô§\Ê:ﬂ≤ç\"i\€;ÇØÅôî1','2017-09-14 04:11:54');
INSERT INTO `user_authentication` VALUES (50,3,'127.0.0.1',1,'2017-09-14 18:44:31',NULL,0,'fgÑ*Ä`-\Ó¿\Ê¡\0Ëªµq†\≈ı\"\◊,ã∂üå∫64]∏\Í3™ˆã.¯1Èå¢\›y\Ê∂2)n\€˝\'Jni\Ê˚Ã®%éá}\∆U\”c˛(\0PÄ{sç≥Eb_∆Å0Ò±Bæƒ•\'\Ã\«r®_DÜ\È\œU\„Oáh•\\q=:!22‰µÜMoâ≠\ZUÒL}x\›ˆk.\ŒÉÛz.óHPù%§Zwò;\“3â\È\Ôu–∑té1ÿôF≠^¯4RVaü‹ê}r¯º˙*2ã˛ao4ì\◊¯\ÈAó\‚Ω\“q•~≤Û∂\’z\ﬂsÇ—íèq\…k\ŸhV\‚0\’rW8\Ï\ﬁC\‡\‰`','2017-09-14 22:44:31');
INSERT INTO `user_authentication` VALUES (51,3,'127.0.0.1',1,'2017-09-14 18:45:00',NULL,0,'œíÑØ\Œ\À\‰\ÂO˜Ç\"∫ñvà}\ŒÔÇæ2¨îq¶ÒÙùä%-ˇ(ó\¬\r\Ê¿¨	jÅa\Ÿ\ÎÒçà\»;¥\–\€Gx¿g¡\Ì>2=	~≤\Õ\Z≤≤\÷Ys	o£!˘á\ﬁ\Í\√\÷\·0\Íû}«Ñ∂˝$W)N°\Â6˝ë\≈πE)ï`ÜÚq&ªÎπ§lñ\‹\œ\Œ\Z\⁄8yºb\«F˙åf˘“¶˚kôS†\Ë6Ds\ŸJ£\ÓNtB\ÁKKïó?¯º∂êJHQz9ncXz∏\Ëë\Õ{\ﬁ\’\‹\⁄.ê\Õ\—˘ï∫bÚ≈Æ∏+\r˘5\ mm∑{Ué\"+ºp\ÿ\–M+E9s2\∆z\'Ù_è\ﬂ`¸ΩST™=™ñ','2017-09-14 22:45:00');
INSERT INTO `user_authentication` VALUES (52,3,'127.0.0.1',1,'2017-09-14 23:19:23',NULL,0,'] N\€@\ﬁ≈íWØ˙æY|`v˝-}ø\Í9 $,\\/	Xg°\'\r\'A,\Ó–êkú!\Í*é	\Ël¨4\Ìfx\‚\Ìÿä`ÛúF’≥øÖÙå«∂\Ô∑{*[§C†\«‹®wœ§k\Ì*˛∫W/å\‚K∂>åKR\Ã1æ†\”\⁄\ƒ»ãÃáW(\«∞é\ﬂ\÷	\⁄\Œ\ E§†R,[°3Y3;ﬂôôp3A#XæÄ\\\ÊñqvÉo≠{Cå\√¿i˚Ò\ﬂFü\‘\À∏âl\ :\ÂÅc>yÛï©≤\Î:\Ì*\Ó\…Ùì˘∂\‰VSΩôØ.∞˜\Ë¥FY\ÿnâ\ÿ','2017-09-15 03:19:23');
INSERT INTO `user_authentication` VALUES (53,3,'127.0.0.1',1,'2017-09-14 23:19:34',NULL,0,'Z\ \ÂN;v\ÎäÀßø}LCrè\r\ÍH⁄òN/T®ø≥¡\‡H|j)<\ﬁ⁄ô\Ë\«>\ŸÚ1ºC∂A\¬u˛ñˇìì_˙ìy?*ùXLÜúu\\\Ó\ {†◊¢›ß\Á\ÊSƒÖ\ÕUû7ì\„èQä\œ\Ï\‰´ô\À˛∏£9\œ\Îˇ\ÿ\"\ÕE˛—¨ÇáØ\rò_ù(\€rªCó_Q6|ß∫\‘aí2\Ê\¬Ú`v7¿úQE8Kì\œnıqˆΩb\"\ËÜbW\€X•ì¡~¢P00ÙòVF4Zp\n2x\—{º\Á$å¶öñbRàW\ﬁY\Œ\‡∫\ÿ\ÿ\\\0£0ã|Ò\√\≈\◊CÖœ∞Òg<\"F=ôî\‘†O\ÕŒ≤Z\Ófaê=\⁄','2017-09-15 03:19:34');
INSERT INTO `user_authentication` VALUES (54,3,'127.0.0.1',1,'2017-09-17 09:03:53',NULL,0,NULL,'2017-09-17 13:03:53');
INSERT INTO `user_authentication` VALUES (55,3,'127.0.0.1',1,'2017-09-17 09:04:54',NULL,0,'bÙ\œ\Á|à~»¢æ¶np˛\ÎòoÕù.b£E¯xü˛d.\ƒ\„ÙLM\ÊàˇÄn\ÍÙ•ÒÕªëÙY`e\0j\’~}3}T\›u¿◊™mÛ\n≥\Áçai\’1;!\ÍÉq…§\\.—ñC0ëœÅ\0\Â…∫b\◊\Z˝X6:Ä´ôØõ #ıÒ\’AU8†\Õe\ÿÖè±ø[\¬!$|\Ï(@Vq(ú+à\ZøÚå\–\nH-mÛIF[\ZàÅÅ\ÍΩ\“,¬ß1\À+\'“éì±\ÿB¸Ü@[S°V˚Hê$ôÛ7î\À¸\Õ\Ÿ\›.>¸\‘+\Â\nx\·\‘qöï}±VÚ@a∫5˙\€4é|Ä¶ò\√\»\Ÿ˛+A\ S\\»ü≥','2017-09-17 13:04:54');
INSERT INTO `user_authentication` VALUES (56,3,'127.0.0.1',1,'2017-09-17 10:06:38',NULL,0,'Lxa±\Ôp\\íki:\ ~-{¥°ŸßΩMè>\ﬁ\Ë,ü¶\Ï¶!j8\“\¬\Ì\…b¢€°+o~\Ê\≈\ÏÑMıßúF≤C0.¬íø∑fÙ€∑6ñ\≈–¨?5˘\—j+πˆM∫“ú\Â9\"a])z<R\”usnHß∑lü:çûn¢á\\6∑[PP<Vì\Z\„û','2017-09-17 14:06:38');
INSERT INTO `user_authentication` VALUES (57,3,'127.0.0.1',1,'2017-09-17 10:06:41',NULL,0,'\ƒ\ƒt¥D\…\·S˝Ú<\–\ÎÆyV?B\'eãjÀú˝\‰\’\“_j#˛0\ £\≈0wˇ\ÔqvØ™˝û}π\Í˙~énÙﬁú\‰\—_ı≥\Ôé“ΩN\—çCˇŒâY£\ \≈9*\÷Tú+ì	\Ó\È|\ÔRõû\…5T\≈O\–*ãh_|-úZh$⁄±´\⁄˛∆ï{Ñ\√pFë\‹Ú2\¬','2017-09-17 14:06:41');
INSERT INTO `user_authentication` VALUES (58,3,'127.0.0.1',1,'2017-09-17 10:06:42',NULL,0,'}Já\ Í™éP\ƒ`(Ü0t&\—\ÿ\÷\€`q\"¯j“πÉ¶>Òçac1†c∞ƒö\‡:\Ÿh\∆+=Ø∏,\„é|\ﬂ˘iV∑\«Øo\Ó:SN\¬;Ö≤}\0!≥\Z\–\…¸8Kõ)\Ì\Œ\◊nf˙!∏›Øò∫¡#\Ê≥h\«0êy¨7\ﬂﬁêé\¬7∑\Ï≥\rG\Züéh(<ø¥\¬^\÷˚\…÷ä˝ïUy\‘\·ó\'?ß}\\âì±RπfOè†\‹\Í\ƒé¥9\‚\ÿ4[\r˜\‰A\Âs•d\›\’\‚\ËLŸ†\Í\\¨H¡µ\»\–i\Í•(˝±≠êÛns','2017-09-17 14:06:42');
INSERT INTO `user_authentication` VALUES (59,3,'127.0.0.1',1,'2017-09-17 10:06:44',NULL,0,'vfVX\'ª©+÷¢:\Î\Ó{Ω¬ûımˆ5ıqc\œ\›\‰;Úﬂô\ Y™¡\ﬁnˇs™7\’\Á\‘¯#-u\‘\ÂB<\⁄fqIı¡Å\ﬂemNõ\ÊéÙ\Ë]\÷\Èz\¬J!}áAı˜¢îñò*é<lêyùc\‡ªwv)Oç/\”\ﬁ\\8{\"8*yãOœàJNzkª\"≠c-D\‰aÙgéï|¶Ω∑n˚oã','2017-09-17 14:06:44');
INSERT INTO `user_authentication` VALUES (60,3,'127.0.0.1',1,'2017-09-25 19:34:50',NULL,0,'^¿#áΩ&¿å\‰\'mˆˆ¨\ﬁ','2017-09-25 23:34:50');
INSERT INTO `user_authentication` VALUES (61,3,'127.0.0.1',1,'2017-09-25 21:10:21',NULL,0,'lû]','2017-09-26 01:10:21');
INSERT INTO `user_authentication` VALUES (62,3,'127.0.0.1',1,'2017-09-25 21:12:09',NULL,0,'VDJfôÙ•¸}h∂\\+tÚgìã?ä=(ô\ƒ~[\¬x\‰\–E	≠·ë¢t)\Ôó>ST˛±º\‡\÷cº\‚æ;Mb\'cú˜\‘ ˚\«÷∂h\œ\‰®lß©Á´Ç÷ä\¬xÿ£,\Óì(•','2017-09-26 01:12:09');
INSERT INTO `user_authentication` VALUES (63,3,'127.0.0.1',1,'2017-09-25 21:12:12',NULL,0,'¸\»Aﬁ†Ù\◊Ÿë\'ß+\‚∑ÃÇ≥\Êz∫ã3\Ë\‘cö\Zˆê27\ƒ\≈\r¯eì-\‰\'ä?µ£Cø=∑é\ÈBoû\”\‘˜^˛H>#ºx® \·~∞©6ïäÙF\–#≠\«\«\È«Å\¬\Ë\ﬁKÒs\'∂Ω°,EÛÕãú\0\ÂJ\‘PkyÇ3\ ¡Å-±\\à=;ª\»e<6\ÔDcô¿cˆBö9ª\n•ˇ\\+ñ\œ]i™\Èaæ\Ì]˙I+ åCæî))[ˆ/\Ãˇ ö¿o≤\ÊJ\“\n`®ÑΩ%–∑æ\'[K´O\…\‘\"\Ï1Wœ±™¸0¸ké°‹ûí\«ˇä≤b•∆åoÄä\ÏÒ\nN\Õê?\“¿Úë','2017-09-26 01:12:12');
INSERT INTO `user_authentication` VALUES (64,3,'127.0.0.1',1,'2017-09-25 21:12:18',NULL,0,'ˆ≤ïˆˇGÉ¯\Íà0\·ô;\€/!-+ThW)´\¬D#\ÍW\n\«.\Ëˇ	Z¢†º˛\Ôs\€UÆ‘ú;á’ç\Ìòwzú˛–íK}DïQ<¡>¢ÄD\'\ﬁañ\Ë\‡<€ÉàÆ∆™πÜ˛≥x\›\ ˇé)N8!\€K¡Âèù•\ƒL^*ˇï6<ö‹©[§ å\›\‡\À7\ËÛ\∆\‘y£\‹h±¡q\«\√\œ\ﬂïˇ,Ä7Ÿ∞øıdΩ™\ﬂq1\Ô˝h”é\»˜°\"\r\ËΩ}\›\Ÿ¿e©\ÂIyI¶ÆC\Ì}}|v+@Oç?Æ\»GπõCãhbéoø\Î.	i(Bßx-ïéñ†o;Å†.\›s≠°ÜV\rÂ©Åeècè=P','2017-09-26 01:12:18');
/*!40000 ALTER TABLE `user_authentication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `ug_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `grantable` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether user can assign',
  `active` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ug_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'admin','administrator',0,1,3,'2017-08-13 20:32:14','2017-08-14 00:32:14');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group_has_member`
--

DROP TABLE IF EXISTS `user_group_has_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group_has_member` (
  `ugm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ugm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group_has_member`
--

LOCK TABLES `user_group_has_member` WRITE;
/*!40000 ALTER TABLE `user_group_has_member` DISABLE KEYS */;
INSERT INTO `user_group_has_member` VALUES (1,3,1,'2017-08-13 00:00:00',NULL,'2017-08-14 00:32:52');
/*!40000 ALTER TABLE `user_group_has_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group_has_permission`
--

DROP TABLE IF EXISTS `user_group_has_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group_has_permission` (
  `ugp_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `permission_id` varchar(25) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ugp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group_has_permission`
--

LOCK TABLES `user_group_has_permission` WRITE;
/*!40000 ALTER TABLE `user_group_has_permission` DISABLE KEYS */;
INSERT INTO `user_group_has_permission` VALUES (1,1,'1','2017-08-13 20:34:45',NULL,'2017-08-14 00:34:45');
/*!40000 ALTER TABLE `user_group_has_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_permission`
--

DROP TABLE IF EXISTS `user_has_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_permission` (
  `up_id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `permission_id` int(25) NOT NULL,
  `start_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_permission`
--

LOCK TABLES `user_has_permission` WRITE;
/*!40000 ALTER TABLE `user_has_permission` DISABLE KEYS */;
INSERT INTO `user_has_permission` VALUES (1,3,1,'2017-08-13 00:00:00',NULL,'2017-08-14 00:05:46');
INSERT INTO `user_has_permission` VALUES (2,3,2,'2017-08-13 00:00:00',NULL,'2017-08-14 00:05:46');
INSERT INTO `user_has_permission` VALUES (3,3,3,'2017-08-13 00:00:00',NULL,'2017-08-14 00:05:46');
/*!40000 ALTER TABLE `user_has_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission`
--

LOCK TABLES `user_permission` WRITE;
/*!40000 ALTER TABLE `user_permission` DISABLE KEYS */;
INSERT INTO `user_permission` VALUES (1,'node-json-edit','2017-08-13 21:50:55',NULL,'2017-08-14 01:50:55');
INSERT INTO `user_permission` VALUES (2,'node-logic-edit','2017-08-13 21:50:55',NULL,'2017-08-14 01:50:55');
INSERT INTO `user_permission` VALUES (3,'node-view-edit','2017-08-13 22:02:49',NULL,'2017-08-14 02:02:49');
INSERT INTO `user_permission` VALUES (4,'signed-in','2017-08-18 21:05:25',NULL,'2017-08-19 01:05:25');
/*!40000 ALTER TABLE `user_permission` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-01  0:50:38
