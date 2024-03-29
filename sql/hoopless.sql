-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: hoopless
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `hoopless`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `hoopless` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `hoopless`;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `address_id` int NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `street_address_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address_2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `IDX_D4E6F81F92F3E70` (`country_id`),
  CONSTRAINT `FK_D4E6F81F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `display_start_date` datetime DEFAULT NULL,
  `display_end_date` datetime DEFAULT NULL,
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Product Review: 8 Tips for Success','2021-11-17 00:00:00',NULL,NULL,NULL,'    <h2>Chose Tickets to Showcase</h2>\n    <p>\n    An organization may be chasing underlying technologies or adopting the latest trend of serverless stack, but chances are\n    that isn\'t the most engaging content for a product review. Favor showcasing tangible tickets over intangible. Chose\n    features, bugfixes, etc. that can facilitate a two-side conversation. Product reviews should be a discussion. Design\n    them with a structure built around tickets that are discussable. Promote collaboration over ostracization.\n    </p>\n    \n    <h2>Invite Everyone</h2>\n    <p>\n    Well, you might not be able to invite everyone, but cast a broad net to all willing stakeholders. This could be the\n    entire company, if they are users of the system.\n    </p>\n    \n    <h2>Facilitate a Collaboration</h2>\n    <p>\n    Be mindful of holding the space. Your goal is to facilitate meaningful and production conversation between engineers\n    and stakeholders. Product reviews shouldn\'t be overall formal. People should act authentically and ask questions.\n    But they should be structured and respectful of everyone\'s time. Table conversations that go over time.\n    </p>\n    \n    <h2>Record</h2>\n    <p>\n    Product reviews take time to digested. They may need to be analyzed or references at a later time. Unless there is a\n    reason not to, press the record button. This will help to make informed decisions moving forward and make it easier\n    to reach out to clarify open questions.\n    </p>\n    \n    <h2>Outline</h2>\n    <p>\n    Give a brief introduction and outline the proceedings. A simple \"who are we\", \"why we are here\", and \"what to expect\"\n    should suffice. Let the audience know what to expect and how they can engage. Make sure to get to the point though\n    quickly. Afterall, we here to show case features and get feedback.\n    </p>\n    \n    <h2>Recap</h2>\n    <p>\n    It\'s important to establish a feedback loop for suggestions provided in the previous review. One idea is to provide\n    a synopsis of corrective actions made from the last product review during the start of the current product review.\n    This helps establish that suggestions are taken seriously and lets stakeholders know their feedback matters.\n    </p>\n    \n    <h2>Let them Shine</h2>\n    <p>\n    Empower engineers by letting them showcase their work and take ownership. Advise them to avoid unnecessary technical\n    jargon that won\'t be understood by stakeholders. Often stakeholders have their own jargon, albeit not technical, as\n    they are the subject matter experts. Allow stakeholders the opportunity to educate and advance engineers\n    understanding of the industry.\n    </p>\n    \n    <h2>Review</h2>\n    <p>\n    Give it a little while and then watch the recording. Take notes. Follow up with individuals to clarify concerns.\n    Use the information provided to help your team and software improve.\n    </p>','2022-01-03 16:28:03','2022-01-03 16:28:03'),(2,'Trailing Slash','2021-11-17 00:00:00',NULL,NULL,NULL,'    <h2>Trailing Slash</h2>\n    <p>\n    Including the trailing slash inside a variable that is used to generate paths is a anti-pattern. Consumers\n    of a variable should add the trailing slash. Otherwise there is no way for them to remove the slash. Even\n    if all current occurrences of the variable feature the slash, the future is unknown.\n    </p>','2022-01-03 16:28:03','2022-01-03 16:28:03');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_type_group_access`
--

DROP TABLE IF EXISTS `content_type_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_type_group_access` (
  `acl_id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `user_id` blob NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`acl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_type_group_access`
--

LOCK TABLES `content_type_group_access` WRITE;
/*!40000 ALTER TABLE `content_type_group_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_type_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_type_schema`
--

DROP TABLE IF EXISTS `content_type_schema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_type_schema` (
  `schema_id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `name` blob NOT NULL,
  `machine_name` blob NOT NULL,
  `class_name` blob NOT NULL,
  `description` blob NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`schema_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_type_schema`
--

LOCK TABLES `content_type_schema` WRITE;
/*!40000 ALTER TABLE `content_type_schema` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_type_schema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_letter_code` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `three_letter_code` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numeric_code` int DEFAULT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=513 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (257,'Afghanistan','AF','AFG','2022-01-05 06:36:25','2022-01-05 06:36:25',4,33.00000000,65.00000000),(258,'Albania','AL','ALB','2022-01-05 06:36:25','2022-01-05 06:36:25',8,41.00000000,20.00000000),(259,'Algeria','DZ','DZA','2022-01-05 06:36:25','2022-01-05 06:36:25',12,28.00000000,3.00000000),(260,'American Samoa','AS','ASM','2022-01-05 06:36:25','2022-01-05 06:36:25',16,-14.33330000,-170.00000000),(261,'Andorra','AD','AND','2022-01-05 06:36:25','2022-01-05 06:36:25',20,42.50000000,1.60000000),(262,'Angola','AO','AGO','2022-01-05 06:36:25','2022-01-05 06:36:25',24,-12.50000000,18.50000000),(263,'Anguilla','AI','AIA','2022-01-05 06:36:25','2022-01-05 06:36:25',660,18.25000000,-63.16670000),(264,'Antarctica','AQ','ATA','2022-01-05 06:36:25','2022-01-05 06:36:25',10,-90.00000000,0.00000000),(265,'Antigua and Barbuda','AG','ATG','2022-01-05 06:36:25','2022-01-05 06:36:25',28,17.05000000,-61.80000000),(266,'Argentina','AR','ARG','2022-01-05 06:36:25','2022-01-05 06:36:25',32,-34.00000000,-64.00000000),(267,'Armenia','AM','ARM','2022-01-05 06:36:25','2022-01-05 06:36:25',51,40.00000000,45.00000000),(268,'Aruba','AW','ABW','2022-01-05 06:36:25','2022-01-05 06:36:25',533,12.50000000,-69.96670000),(269,'Australia','AU','AUS','2022-01-05 06:36:25','2022-01-05 06:36:25',36,-27.00000000,133.00000000),(270,'Austria','AT','AUT','2022-01-05 06:36:25','2022-01-05 06:36:25',40,47.33330000,13.33330000),(271,'Azerbaijan','AZ','AZE','2022-01-05 06:36:25','2022-01-05 06:36:25',31,40.50000000,47.50000000),(272,'Bahamas','BS','BHS','2022-01-05 06:36:25','2022-01-05 06:36:25',44,24.25000000,-76.00000000),(273,'Bahrain','BH','BHR','2022-01-05 06:36:25','2022-01-05 06:36:25',48,26.00000000,50.55000000),(274,'Bangladesh','BD','BGD','2022-01-05 06:36:25','2022-01-05 06:36:25',50,24.00000000,90.00000000),(275,'Barbados','BB','BRB','2022-01-05 06:36:25','2022-01-05 06:36:25',52,13.16670000,-59.53330000),(276,'Belarus','BY','BLR','2022-01-05 06:36:25','2022-01-05 06:36:25',112,53.00000000,28.00000000),(277,'Belgium','BE','BEL','2022-01-05 06:36:25','2022-01-05 06:36:25',56,50.83330000,4.00000000),(278,'Belize','BZ','BLZ','2022-01-05 06:36:25','2022-01-05 06:36:25',84,17.25000000,-88.75000000),(279,'Benin','BJ','BEN','2022-01-05 06:36:25','2022-01-05 06:36:25',204,9.50000000,2.25000000),(280,'Bermuda','BM','BMU','2022-01-05 06:36:25','2022-01-05 06:36:25',60,32.33330000,-64.75000000),(281,'Bhutan','BT','BTN','2022-01-05 06:36:25','2022-01-05 06:36:25',64,27.50000000,90.50000000),(282,'Bolivia, Plurinational State of','BO','BOL','2022-01-05 06:36:25','2022-01-05 06:36:25',68,-17.00000000,-65.00000000),(283,'Bolivia','BO','BOL','2022-01-05 06:36:25','2022-01-05 06:36:25',68,-17.00000000,-65.00000000),(284,'Bosnia and Herzegovina','BA','BIH','2022-01-05 06:36:25','2022-01-05 06:36:25',70,44.00000000,18.00000000),(285,'Botswana','BW','BWA','2022-01-05 06:36:25','2022-01-05 06:36:25',72,-22.00000000,24.00000000),(286,'Bouvet Island','BV','BVT','2022-01-05 06:36:25','2022-01-05 06:36:25',74,-54.43330000,3.40000000),(287,'Brazil','BR','BRA','2022-01-05 06:36:25','2022-01-05 06:36:25',76,-10.00000000,-55.00000000),(288,'British Indian Ocean Territory','IO','IOT','2022-01-05 06:36:25','2022-01-05 06:36:25',86,-6.00000000,71.50000000),(289,'Brunei Darussalam','BN','BRN','2022-01-05 06:36:25','2022-01-05 06:36:25',96,4.50000000,114.66670000),(290,'Brunei','BN','BRN','2022-01-05 06:36:25','2022-01-05 06:36:25',96,4.50000000,114.66670000),(291,'Bulgaria','BG','BGR','2022-01-05 06:36:25','2022-01-05 06:36:25',100,43.00000000,25.00000000),(292,'Burkina Faso','BF','BFA','2022-01-05 06:36:25','2022-01-05 06:36:25',854,13.00000000,-2.00000000),(293,'Burundi','BI','BDI','2022-01-05 06:36:25','2022-01-05 06:36:25',108,-3.50000000,30.00000000),(294,'Cambodia','KH','KHM','2022-01-05 06:36:25','2022-01-05 06:36:25',116,13.00000000,105.00000000),(295,'Cameroon','CM','CMR','2022-01-05 06:36:25','2022-01-05 06:36:25',120,6.00000000,12.00000000),(296,'Canada','CA','CAN','2022-01-05 06:36:25','2022-01-05 06:36:25',124,60.00000000,-95.00000000),(297,'Cape Verde','CV','CPV','2022-01-05 06:36:25','2022-01-05 06:36:25',132,16.00000000,-24.00000000),(298,'Cayman Islands','KY','CYM','2022-01-05 06:36:25','2022-01-05 06:36:25',136,19.50000000,-80.50000000),(299,'Central African Republic','CF','CAF','2022-01-05 06:36:25','2022-01-05 06:36:25',140,7.00000000,21.00000000),(300,'Chad','TD','TCD','2022-01-05 06:36:25','2022-01-05 06:36:25',148,15.00000000,19.00000000),(301,'Chile','CL','CHL','2022-01-05 06:36:25','2022-01-05 06:36:25',152,-30.00000000,-71.00000000),(302,'China','CN','CHN','2022-01-05 06:36:25','2022-01-05 06:36:25',156,35.00000000,105.00000000),(303,'Christmas Island','CX','CXR','2022-01-05 06:36:25','2022-01-05 06:36:25',162,-10.50000000,105.66670000),(304,'Cocos (Keeling) Islands','CC','CCK','2022-01-05 06:36:25','2022-01-05 06:36:25',166,-12.50000000,96.83330000),(305,'Colombia','CO','COL','2022-01-05 06:36:25','2022-01-05 06:36:25',170,4.00000000,-72.00000000),(306,'Comoros','KM','COM','2022-01-05 06:36:25','2022-01-05 06:36:25',174,-12.16670000,44.25000000),(307,'Congo','CG','COG','2022-01-05 06:36:25','2022-01-05 06:36:25',178,-1.00000000,15.00000000),(308,'Congo, the Democratic Republic of the','CD','COD','2022-01-05 06:36:25','2022-01-05 06:36:25',180,0.00000000,25.00000000),(309,'Cook Islands','CK','COK','2022-01-05 06:36:25','2022-01-05 06:36:25',184,-21.23330000,-159.76670000),(310,'Costa Rica','CR','CRI','2022-01-05 06:36:25','2022-01-05 06:36:25',188,10.00000000,-84.00000000),(311,'Côte d\'Ivoire','CI','CIV','2022-01-05 06:36:25','2022-01-05 06:36:25',384,8.00000000,-5.00000000),(312,'Ivory Coast','CI','CIV','2022-01-05 06:36:25','2022-01-05 06:36:25',384,8.00000000,-5.00000000),(313,'Croatia','HR','HRV','2022-01-05 06:36:25','2022-01-05 06:36:25',191,45.16670000,15.50000000),(314,'Cuba','CU','CUB','2022-01-05 06:36:25','2022-01-05 06:36:25',192,21.50000000,-80.00000000),(315,'Cyprus','CY','CYP','2022-01-05 06:36:25','2022-01-05 06:36:25',196,35.00000000,33.00000000),(316,'Czech Republic','CZ','CZE','2022-01-05 06:36:25','2022-01-05 06:36:25',203,49.75000000,15.50000000),(317,'Denmark','DK','DNK','2022-01-05 06:36:25','2022-01-05 06:36:25',208,56.00000000,10.00000000),(318,'Djibouti','DJ','DJI','2022-01-05 06:36:25','2022-01-05 06:36:25',262,11.50000000,43.00000000),(319,'Dominica','DM','DMA','2022-01-05 06:36:25','2022-01-05 06:36:25',212,15.41670000,-61.33330000),(320,'Dominican Republic','DO','DOM','2022-01-05 06:36:25','2022-01-05 06:36:25',214,19.00000000,-70.66670000),(321,'Ecuador','EC','ECU','2022-01-05 06:36:25','2022-01-05 06:36:25',218,-2.00000000,-77.50000000),(322,'Egypt','EG','EGY','2022-01-05 06:36:25','2022-01-05 06:36:25',818,27.00000000,30.00000000),(323,'El Salvador','SV','SLV','2022-01-05 06:36:25','2022-01-05 06:36:25',222,13.83330000,-88.91670000),(324,'Equatorial Guinea','GQ','GNQ','2022-01-05 06:36:25','2022-01-05 06:36:25',226,2.00000000,10.00000000),(325,'Eritrea','ER','ERI','2022-01-05 06:36:25','2022-01-05 06:36:25',232,15.00000000,39.00000000),(326,'Estonia','EE','EST','2022-01-05 06:36:25','2022-01-05 06:36:25',233,59.00000000,26.00000000),(327,'Ethiopia','ET','ETH','2022-01-05 06:36:25','2022-01-05 06:36:25',231,8.00000000,38.00000000),(328,'Falkland Islands (Malvinas)','FK','FLK','2022-01-05 06:36:25','2022-01-05 06:36:25',238,-51.75000000,-59.00000000),(329,'Faroe Islands','FO','FRO','2022-01-05 06:36:25','2022-01-05 06:36:25',234,62.00000000,-7.00000000),(330,'Fiji','FJ','FJI','2022-01-05 06:36:25','2022-01-05 06:36:25',242,-18.00000000,175.00000000),(331,'Finland','FI','FIN','2022-01-05 06:36:25','2022-01-05 06:36:25',246,64.00000000,26.00000000),(332,'France','FR','FRA','2022-01-05 06:36:25','2022-01-05 06:36:25',250,46.00000000,2.00000000),(333,'French Guiana','GF','GUF','2022-01-05 06:36:25','2022-01-05 06:36:25',254,4.00000000,-53.00000000),(334,'French Polynesia','PF','PYF','2022-01-05 06:36:25','2022-01-05 06:36:25',258,-15.00000000,-140.00000000),(335,'French Southern Territories','TF','ATF','2022-01-05 06:36:25','2022-01-05 06:36:25',260,-43.00000000,67.00000000),(336,'Gabon','GA','GAB','2022-01-05 06:36:25','2022-01-05 06:36:25',266,-1.00000000,11.75000000),(337,'Gambia','GM','GMB','2022-01-05 06:36:25','2022-01-05 06:36:25',270,13.46670000,-16.56670000),(338,'Georgia','GE','GEO','2022-01-05 06:36:25','2022-01-05 06:36:25',268,42.00000000,43.50000000),(339,'Germany','DE','DEU','2022-01-05 06:36:25','2022-01-05 06:36:25',276,51.00000000,9.00000000),(340,'Ghana','GH','GHA','2022-01-05 06:36:25','2022-01-05 06:36:25',288,8.00000000,-2.00000000),(341,'Gibraltar','GI','GIB','2022-01-05 06:36:25','2022-01-05 06:36:25',292,36.18330000,-5.36670000),(342,'Greece','GR','GRC','2022-01-05 06:36:25','2022-01-05 06:36:25',300,39.00000000,22.00000000),(343,'Greenland','GL','GRL','2022-01-05 06:36:25','2022-01-05 06:36:25',304,72.00000000,-40.00000000),(344,'Grenada','GD','GRD','2022-01-05 06:36:25','2022-01-05 06:36:25',308,12.11670000,-61.66670000),(345,'Guadeloupe','GP','GLP','2022-01-05 06:36:25','2022-01-05 06:36:25',312,16.25000000,-61.58330000),(346,'Guam','GU','GUM','2022-01-05 06:36:25','2022-01-05 06:36:25',316,13.46670000,144.78330000),(347,'Guatemala','GT','GTM','2022-01-05 06:36:25','2022-01-05 06:36:25',320,15.50000000,-90.25000000),(348,'Guernsey','GG','GGY','2022-01-05 06:36:25','2022-01-05 06:36:25',831,49.50000000,-2.56000000),(349,'Guinea','GN','GIN','2022-01-05 06:36:25','2022-01-05 06:36:25',324,11.00000000,-10.00000000),(350,'Guinea-Bissau','GW','GNB','2022-01-05 06:36:25','2022-01-05 06:36:25',624,12.00000000,-15.00000000),(351,'Guyana','GY','GUY','2022-01-05 06:36:25','2022-01-05 06:36:25',328,5.00000000,-59.00000000),(352,'Haiti','HT','HTI','2022-01-05 06:36:25','2022-01-05 06:36:25',332,19.00000000,-72.41670000),(353,'Heard Island and McDonald Islands','HM','HMD','2022-01-05 06:36:25','2022-01-05 06:36:25',334,-53.10000000,72.51670000),(354,'Holy See (Vatican City State)','VA','VAT','2022-01-05 06:36:25','2022-01-05 06:36:25',336,41.90000000,12.45000000),(355,'Honduras','HN','HND','2022-01-05 06:36:25','2022-01-05 06:36:25',340,15.00000000,-86.50000000),(356,'Hong Kong','HK','HKG','2022-01-05 06:36:25','2022-01-05 06:36:25',344,22.25000000,114.16670000),(357,'Hungary','HU','HUN','2022-01-05 06:36:25','2022-01-05 06:36:25',348,47.00000000,20.00000000),(358,'Iceland','IS','ISL','2022-01-05 06:36:25','2022-01-05 06:36:25',352,65.00000000,-18.00000000),(359,'India','IN','IND','2022-01-05 06:36:25','2022-01-05 06:36:25',356,20.00000000,77.00000000),(360,'Indonesia','ID','IDN','2022-01-05 06:36:25','2022-01-05 06:36:25',360,-5.00000000,120.00000000),(361,'Iran, Islamic Republic of','IR','IRN','2022-01-05 06:36:25','2022-01-05 06:36:25',364,32.00000000,53.00000000),(362,'Iraq','IQ','IRQ','2022-01-05 06:36:25','2022-01-05 06:36:25',368,33.00000000,44.00000000),(363,'Ireland','IE','IRL','2022-01-05 06:36:25','2022-01-05 06:36:25',372,53.00000000,-8.00000000),(364,'Isle of Man','IM','IMN','2022-01-05 06:36:25','2022-01-05 06:36:25',833,54.23000000,-4.55000000),(365,'Israel','IL','ISR','2022-01-05 06:36:25','2022-01-05 06:36:25',376,31.50000000,34.75000000),(366,'Italy','IT','ITA','2022-01-05 06:36:25','2022-01-05 06:36:25',380,42.83330000,12.83330000),(367,'Jamaica','JM','JAM','2022-01-05 06:36:25','2022-01-05 06:36:25',388,18.25000000,-77.50000000),(368,'Japan','JP','JPN','2022-01-05 06:36:25','2022-01-05 06:36:25',392,36.00000000,138.00000000),(369,'Jersey','JE','JEY','2022-01-05 06:36:25','2022-01-05 06:36:25',832,49.21000000,-2.13000000),(370,'Jordan','JO','JOR','2022-01-05 06:36:25','2022-01-05 06:36:25',400,31.00000000,36.00000000),(371,'Kazakhstan','KZ','KAZ','2022-01-05 06:36:25','2022-01-05 06:36:25',398,48.00000000,68.00000000),(372,'Kenya','KE','KEN','2022-01-05 06:36:25','2022-01-05 06:36:25',404,1.00000000,38.00000000),(373,'Kiribati','KI','KIR','2022-01-05 06:36:25','2022-01-05 06:36:25',296,1.41670000,173.00000000),(374,'Korea, Democratic People\'s Republic of','KP','PRK','2022-01-05 06:36:25','2022-01-05 06:36:25',408,40.00000000,127.00000000),(375,'Korea, Republic of','KR','KOR','2022-01-05 06:36:25','2022-01-05 06:36:25',410,37.00000000,127.50000000),(376,'South Korea','KR','KOR','2022-01-05 06:36:25','2022-01-05 06:36:25',410,37.00000000,127.50000000),(377,'Kuwait','KW','KWT','2022-01-05 06:36:25','2022-01-05 06:36:25',414,29.33750000,47.65810000),(378,'Kyrgyzstan','KG','KGZ','2022-01-05 06:36:25','2022-01-05 06:36:25',417,41.00000000,75.00000000),(379,'Lao People\'s Democratic Republic','LA','LAO','2022-01-05 06:36:25','2022-01-05 06:36:25',418,18.00000000,105.00000000),(380,'Latvia','LV','LVA','2022-01-05 06:36:25','2022-01-05 06:36:25',428,57.00000000,25.00000000),(381,'Lebanon','LB','LBN','2022-01-05 06:36:25','2022-01-05 06:36:25',422,33.83330000,35.83330000),(382,'Lesotho','LS','LSO','2022-01-05 06:36:25','2022-01-05 06:36:25',426,-29.50000000,28.50000000),(383,'Liberia','LR','LBR','2022-01-05 06:36:25','2022-01-05 06:36:25',430,6.50000000,-9.50000000),(384,'Libyan Arab Jamahiriya','LY','LBY','2022-01-05 06:36:25','2022-01-05 06:36:25',434,25.00000000,17.00000000),(385,'Libya','LY','LBY','2022-01-05 06:36:25','2022-01-05 06:36:25',434,25.00000000,17.00000000),(386,'Liechtenstein','LI','LIE','2022-01-05 06:36:25','2022-01-05 06:36:25',438,47.16670000,9.53330000),(387,'Lithuania','LT','LTU','2022-01-05 06:36:25','2022-01-05 06:36:25',440,56.00000000,24.00000000),(388,'Luxembourg','LU','LUX','2022-01-05 06:36:25','2022-01-05 06:36:25',442,49.75000000,6.16670000),(389,'Macao','MO','MAC','2022-01-05 06:36:25','2022-01-05 06:36:25',446,22.16670000,113.55000000),(390,'Macedonia, the former Yugoslav Republic of','MK','MKD','2022-01-05 06:36:25','2022-01-05 06:36:25',807,41.83330000,22.00000000),(391,'Madagascar','MG','MDG','2022-01-05 06:36:25','2022-01-05 06:36:25',450,-20.00000000,47.00000000),(392,'Malawi','MW','MWI','2022-01-05 06:36:25','2022-01-05 06:36:25',454,-13.50000000,34.00000000),(393,'Malaysia','MY','MYS','2022-01-05 06:36:25','2022-01-05 06:36:25',458,2.50000000,112.50000000),(394,'Maldives','MV','MDV','2022-01-05 06:36:25','2022-01-05 06:36:25',462,3.25000000,73.00000000),(395,'Mali','ML','MLI','2022-01-05 06:36:25','2022-01-05 06:36:25',466,17.00000000,-4.00000000),(396,'Malta','MT','MLT','2022-01-05 06:36:25','2022-01-05 06:36:25',470,35.83330000,14.58330000),(397,'Marshall Islands','MH','MHL','2022-01-05 06:36:25','2022-01-05 06:36:25',584,9.00000000,168.00000000),(398,'Martinique','MQ','MTQ','2022-01-05 06:36:25','2022-01-05 06:36:25',474,14.66670000,-61.00000000),(399,'Mauritania','MR','MRT','2022-01-05 06:36:25','2022-01-05 06:36:25',478,20.00000000,-12.00000000),(400,'Mauritius','MU','MUS','2022-01-05 06:36:25','2022-01-05 06:36:25',480,-20.28330000,57.55000000),(401,'Mayotte','YT','MYT','2022-01-05 06:36:25','2022-01-05 06:36:25',175,-12.83330000,45.16670000),(402,'Mexico','MX','MEX','2022-01-05 06:36:25','2022-01-05 06:36:25',484,23.00000000,-102.00000000),(403,'Micronesia, Federated States of','FM','FSM','2022-01-05 06:36:25','2022-01-05 06:36:25',583,6.91670000,158.25000000),(404,'Moldova, Republic of','MD','MDA','2022-01-05 06:36:25','2022-01-05 06:36:25',498,47.00000000,29.00000000),(405,'Monaco','MC','MCO','2022-01-05 06:36:25','2022-01-05 06:36:25',492,43.73330000,7.40000000),(406,'Mongolia','MN','MNG','2022-01-05 06:36:25','2022-01-05 06:36:25',496,46.00000000,105.00000000),(407,'Montenegro','ME','MNE','2022-01-05 06:36:25','2022-01-05 06:36:25',499,42.00000000,19.00000000),(408,'Montserrat','MS','MSR','2022-01-05 06:36:25','2022-01-05 06:36:25',500,16.75000000,-62.20000000),(409,'Morocco','MA','MAR','2022-01-05 06:36:25','2022-01-05 06:36:25',504,32.00000000,-5.00000000),(410,'Mozambique','MZ','MOZ','2022-01-05 06:36:25','2022-01-05 06:36:25',508,-18.25000000,35.00000000),(411,'Myanmar','MM','MMR','2022-01-05 06:36:25','2022-01-05 06:36:25',104,22.00000000,98.00000000),(412,'Burma','MM','MMR','2022-01-05 06:36:25','2022-01-05 06:36:25',104,22.00000000,98.00000000),(413,'Namibia','NA','NAM','2022-01-05 06:36:25','2022-01-05 06:36:25',516,-22.00000000,17.00000000),(414,'Nauru','NR','NRU','2022-01-05 06:36:25','2022-01-05 06:36:25',520,-0.53330000,166.91670000),(415,'Nepal','NP','NPL','2022-01-05 06:36:25','2022-01-05 06:36:25',524,28.00000000,84.00000000),(416,'Netherlands','NL','NLD','2022-01-05 06:36:25','2022-01-05 06:36:25',528,52.50000000,5.75000000),(417,'Netherlands Antilles','AN','ANT','2022-01-05 06:36:25','2022-01-05 06:36:25',530,12.25000000,-68.75000000),(418,'New Caledonia','NC','NCL','2022-01-05 06:36:25','2022-01-05 06:36:25',540,-21.50000000,165.50000000),(419,'New Zealand','NZ','NZL','2022-01-05 06:36:25','2022-01-05 06:36:25',554,-41.00000000,174.00000000),(420,'Nicaragua','NI','NIC','2022-01-05 06:36:25','2022-01-05 06:36:25',558,13.00000000,-85.00000000),(421,'Niger','NE','NER','2022-01-05 06:36:25','2022-01-05 06:36:25',562,16.00000000,8.00000000),(422,'Nigeria','NG','NGA','2022-01-05 06:36:25','2022-01-05 06:36:25',566,10.00000000,8.00000000),(423,'Niue','NU','NIU','2022-01-05 06:36:25','2022-01-05 06:36:25',570,-19.03330000,-169.86670000),(424,'Norfolk Island','NF','NFK','2022-01-05 06:36:25','2022-01-05 06:36:25',574,-29.03330000,167.95000000),(425,'Northern Mariana Islands','MP','MNP','2022-01-05 06:36:25','2022-01-05 06:36:25',580,15.20000000,145.75000000),(426,'Norway','NO','NOR','2022-01-05 06:36:25','2022-01-05 06:36:25',578,62.00000000,10.00000000),(427,'Oman','OM','OMN','2022-01-05 06:36:25','2022-01-05 06:36:25',512,21.00000000,57.00000000),(428,'Pakistan','PK','PAK','2022-01-05 06:36:25','2022-01-05 06:36:25',586,30.00000000,70.00000000),(429,'Palau','PW','PLW','2022-01-05 06:36:25','2022-01-05 06:36:25',585,7.50000000,134.50000000),(430,'Palestinian Territory, Occupied','PS','PSE','2022-01-05 06:36:25','2022-01-05 06:36:25',275,32.00000000,35.25000000),(431,'Panama','PA','PAN','2022-01-05 06:36:25','2022-01-05 06:36:25',591,9.00000000,-80.00000000),(432,'Papua New Guinea','PG','PNG','2022-01-05 06:36:25','2022-01-05 06:36:25',598,-6.00000000,147.00000000),(433,'Paraguay','PY','PRY','2022-01-05 06:36:25','2022-01-05 06:36:25',600,-23.00000000,-58.00000000),(434,'Peru','PE','PER','2022-01-05 06:36:25','2022-01-05 06:36:25',604,-10.00000000,-76.00000000),(435,'Philippines','PH','PHL','2022-01-05 06:36:25','2022-01-05 06:36:25',608,13.00000000,122.00000000),(436,'Pitcairn','PN','PCN','2022-01-05 06:36:25','2022-01-05 06:36:25',612,-24.70000000,-127.40000000),(437,'Poland','PL','POL','2022-01-05 06:36:25','2022-01-05 06:36:25',616,52.00000000,20.00000000),(438,'Portugal','PT','PRT','2022-01-05 06:36:25','2022-01-05 06:36:25',620,39.50000000,-8.00000000),(439,'Puerto Rico','PR','PRI','2022-01-05 06:36:25','2022-01-05 06:36:25',630,18.25000000,-66.50000000),(440,'Qatar','QA','QAT','2022-01-05 06:36:25','2022-01-05 06:36:25',634,25.50000000,51.25000000),(441,'Réunion','RE','REU','2022-01-05 06:36:25','2022-01-05 06:36:25',638,-21.10000000,55.60000000),(442,'Romania','RO','ROU','2022-01-05 06:36:25','2022-01-05 06:36:25',642,46.00000000,25.00000000),(443,'Russian Federation','RU','RUS','2022-01-05 06:36:25','2022-01-05 06:36:25',643,60.00000000,100.00000000),(444,'Russia','RU','RUS','2022-01-05 06:36:25','2022-01-05 06:36:25',643,60.00000000,100.00000000),(445,'Rwanda','RW','RWA','2022-01-05 06:36:25','2022-01-05 06:36:25',646,-2.00000000,30.00000000),(446,'Saint Helena, Ascension and Tristan da Cunha','SH','SHN','2022-01-05 06:36:25','2022-01-05 06:36:25',654,-15.93330000,-5.70000000),(447,'Saint Kitts and Nevis','KN','KNA','2022-01-05 06:36:25','2022-01-05 06:36:25',659,17.33330000,-62.75000000),(448,'Saint Lucia','LC','LCA','2022-01-05 06:36:25','2022-01-05 06:36:25',662,13.88330000,-61.13330000),(449,'Saint Pierre and Miquelon','PM','SPM','2022-01-05 06:36:25','2022-01-05 06:36:25',666,46.83330000,-56.33330000),(450,'Saint Vincent and the Grenadines','VC','VCT','2022-01-05 06:36:25','2022-01-05 06:36:25',670,13.25000000,-61.20000000),(451,'Saint Vincent & the Grenadines','VC','VCT','2022-01-05 06:36:25','2022-01-05 06:36:25',670,13.25000000,-61.20000000),(452,'St. Vincent and the Grenadines','VC','VCT','2022-01-05 06:36:25','2022-01-05 06:36:25',670,13.25000000,-61.20000000),(453,'Samoa','WS','WSM','2022-01-05 06:36:25','2022-01-05 06:36:25',882,-13.58330000,-172.33330000),(454,'San Marino','SM','SMR','2022-01-05 06:36:25','2022-01-05 06:36:25',674,43.76670000,12.41670000),(455,'Sao Tome and Principe','ST','STP','2022-01-05 06:36:25','2022-01-05 06:36:25',678,1.00000000,7.00000000),(456,'Saudi Arabia','SA','SAU','2022-01-05 06:36:25','2022-01-05 06:36:25',682,25.00000000,45.00000000),(457,'Senegal','SN','SEN','2022-01-05 06:36:25','2022-01-05 06:36:25',686,14.00000000,-14.00000000),(458,'Serbia','RS','SRB','2022-01-05 06:36:25','2022-01-05 06:36:25',688,44.00000000,21.00000000),(459,'Seychelles','SC','SYC','2022-01-05 06:36:25','2022-01-05 06:36:25',690,-4.58330000,55.66670000),(460,'Sierra Leone','SL','SLE','2022-01-05 06:36:25','2022-01-05 06:36:25',694,8.50000000,-11.50000000),(461,'Singapore','SG','SGP','2022-01-05 06:36:25','2022-01-05 06:36:25',702,1.36670000,103.80000000),(462,'Slovakia','SK','SVK','2022-01-05 06:36:25','2022-01-05 06:36:25',703,48.66670000,19.50000000),(463,'Slovenia','SI','SVN','2022-01-05 06:36:25','2022-01-05 06:36:25',705,46.00000000,15.00000000),(464,'Solomon Islands','SB','SLB','2022-01-05 06:36:25','2022-01-05 06:36:25',90,-8.00000000,159.00000000),(465,'Somalia','SO','SOM','2022-01-05 06:36:25','2022-01-05 06:36:25',706,10.00000000,49.00000000),(466,'South Africa','ZA','ZAF','2022-01-05 06:36:25','2022-01-05 06:36:25',710,-29.00000000,24.00000000),(467,'South Georgia and the South Sandwich Islands','GS','SGS','2022-01-05 06:36:25','2022-01-05 06:36:25',239,-54.50000000,-37.00000000),(468,'Spain','ES','ESP','2022-01-05 06:36:25','2022-01-05 06:36:25',724,40.00000000,-4.00000000),(469,'Sri Lanka','LK','LKA','2022-01-05 06:36:25','2022-01-05 06:36:25',144,7.00000000,81.00000000),(470,'Sudan','SD','SDN','2022-01-05 06:36:25','2022-01-05 06:36:25',736,15.00000000,30.00000000),(471,'Suriname','SR','SUR','2022-01-05 06:36:25','2022-01-05 06:36:25',740,4.00000000,-56.00000000),(472,'Svalbard and Jan Mayen','SJ','SJM','2022-01-05 06:36:25','2022-01-05 06:36:25',744,78.00000000,20.00000000),(473,'Swaziland','SZ','SWZ','2022-01-05 06:36:25','2022-01-05 06:36:25',748,-26.50000000,31.50000000),(474,'Sweden','SE','SWE','2022-01-05 06:36:25','2022-01-05 06:36:25',752,62.00000000,15.00000000),(475,'Switzerland','CH','CHE','2022-01-05 06:36:25','2022-01-05 06:36:25',756,47.00000000,8.00000000),(476,'Syrian Arab Republic','SY','SYR','2022-01-05 06:36:25','2022-01-05 06:36:25',760,35.00000000,38.00000000),(477,'Taiwan, Province of China','TW','TWN','2022-01-05 06:36:25','2022-01-05 06:36:25',158,23.50000000,121.00000000),(478,'Taiwan','TW','TWN','2022-01-05 06:36:25','2022-01-05 06:36:25',158,23.50000000,121.00000000),(479,'Tajikistan','TJ','TJK','2022-01-05 06:36:25','2022-01-05 06:36:25',762,39.00000000,71.00000000),(480,'Tanzania, United Republic of','TZ','TZA','2022-01-05 06:36:25','2022-01-05 06:36:25',834,-6.00000000,35.00000000),(481,'Thailand','TH','THA','2022-01-05 06:36:25','2022-01-05 06:36:25',764,15.00000000,100.00000000),(482,'Timor-Leste','TL','TLS','2022-01-05 06:36:25','2022-01-05 06:36:25',626,-8.55000000,125.51670000),(483,'Togo','TG','TGO','2022-01-05 06:36:25','2022-01-05 06:36:25',768,8.00000000,1.16670000),(484,'Tokelau','TK','TKL','2022-01-05 06:36:25','2022-01-05 06:36:25',772,-9.00000000,-172.00000000),(485,'Tonga','TO','TON','2022-01-05 06:36:25','2022-01-05 06:36:25',776,-20.00000000,-175.00000000),(486,'Trinidad and Tobago','TT','TTO','2022-01-05 06:36:25','2022-01-05 06:36:25',780,11.00000000,-61.00000000),(487,'Trinidad & Tobago','TT','TTO','2022-01-05 06:36:25','2022-01-05 06:36:25',780,11.00000000,-61.00000000),(488,'Tunisia','TN','TUN','2022-01-05 06:36:25','2022-01-05 06:36:25',788,34.00000000,9.00000000),(489,'Turkey','TR','TUR','2022-01-05 06:36:25','2022-01-05 06:36:25',792,39.00000000,35.00000000),(490,'Turkmenistan','TM','TKM','2022-01-05 06:36:25','2022-01-05 06:36:25',795,40.00000000,60.00000000),(491,'Turks and Caicos Islands','TC','TCA','2022-01-05 06:36:25','2022-01-05 06:36:25',796,21.75000000,-71.58330000),(492,'Tuvalu','TV','TUV','2022-01-05 06:36:25','2022-01-05 06:36:25',798,-8.00000000,178.00000000),(493,'Uganda','UG','UGA','2022-01-05 06:36:25','2022-01-05 06:36:25',800,1.00000000,32.00000000),(494,'Ukraine','UA','UKR','2022-01-05 06:36:25','2022-01-05 06:36:25',804,49.00000000,32.00000000),(495,'United Arab Emirates','AE','ARE','2022-01-05 06:36:25','2022-01-05 06:36:25',784,24.00000000,54.00000000),(496,'United Kingdom','GB','GBR','2022-01-05 06:36:25','2022-01-05 06:36:25',826,54.00000000,-2.00000000),(497,'United States','US','USA','2022-01-05 06:36:25','2022-01-05 06:36:25',840,38.00000000,-97.00000000),(498,'United States Minor Outlying Islands','UM','UMI','2022-01-05 06:36:25','2022-01-05 06:36:25',581,19.28330000,166.60000000),(499,'Uruguay','UY','URY','2022-01-05 06:36:25','2022-01-05 06:36:25',858,-33.00000000,-56.00000000),(500,'Uzbekistan','UZ','UZB','2022-01-05 06:36:25','2022-01-05 06:36:25',860,41.00000000,64.00000000),(501,'Vanuatu','VU','VUT','2022-01-05 06:36:25','2022-01-05 06:36:25',548,-16.00000000,167.00000000),(502,'Venezuela, Bolivarian Republic of','VE','VEN','2022-01-05 06:36:25','2022-01-05 06:36:25',862,8.00000000,-66.00000000),(503,'Venezuela','VE','VEN','2022-01-05 06:36:25','2022-01-05 06:36:25',862,8.00000000,-66.00000000),(504,'Viet Nam','VN','VNM','2022-01-05 06:36:25','2022-01-05 06:36:25',704,16.00000000,106.00000000),(505,'Vietnam','VN','VNM','2022-01-05 06:36:25','2022-01-05 06:36:25',704,16.00000000,106.00000000),(506,'Virgin Islands, British','VG','VGB','2022-01-05 06:36:25','2022-01-05 06:36:25',92,18.50000000,-64.50000000),(507,'Virgin Islands, U.S.','VI','VIR','2022-01-05 06:36:25','2022-01-05 06:36:25',850,18.33330000,-64.83330000),(508,'Wallis and Futuna','WF','WLF','2022-01-05 06:36:25','2022-01-05 06:36:25',876,-13.30000000,-176.20000000),(509,'Western Sahara','EH','ESH','2022-01-05 06:36:25','2022-01-05 06:36:25',732,24.50000000,-13.00000000),(510,'Yemen','YE','YEM','2022-01-05 06:36:25','2022-01-05 06:36:25',887,15.00000000,48.00000000),(511,'Zambia','ZM','ZMB','2022-01-05 06:36:25','2022-01-05 06:36:25',894,-15.00000000,30.00000000),(512,'Zimbabwe','ZW','ZWE','2022-01-05 06:36:25','2022-01-05 06:36:25',716,-20.00000000,30.00000000);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom`
--

DROP TABLE IF EXISTS `custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom` (
  `custom_id` int NOT NULL AUTO_INCREMENT,
  `schema_id` int NOT NULL,
  `version_id` int NOT NULL,
  `group_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`custom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom`
--

LOCK TABLES `custom` WRITE;
/*!40000 ALTER TABLE `custom` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_meta`
--

DROP TABLE IF EXISTS `custom_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_meta` (
  `value_id` int NOT NULL AUTO_INCREMENT,
  `type_id` int NOT NULL,
  `version_id` int NOT NULL,
  `serialized_value` blob NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_meta`
--

LOCK TABLES `custom_meta` WRITE;
/*!40000 ALTER TABLE `custom_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('App\\Migrations\\Version20210710031913','2022-01-03 16:27:59',3637),('App\\Migrations\\Version20210710044359','2022-01-03 16:28:03',333),('App\\Migrations\\Version20210710053110','2022-01-03 16:28:03',377),('App\\Migrations\\Version20211118041608','2022-01-03 16:28:03',106),('App\\Migrations\\Version20211212044950','2022-01-03 16:28:03',347),('App\\Migrations\\Version20211223175512','2022-01-03 16:28:04',225),('App\\Migrations\\Version20211224033039','2022-01-03 16:28:04',119),('App\\Migrations\\Version20220105052430','2022-01-05 06:53:20',1469),('App\\Migrations\\Version20220105062638','2022-01-05 07:03:22',NULL),('App\\Migrations\\Version20220105065220','2022-01-05 06:55:43',2158),('App\\Migrations\\Version20220105070113','2022-01-05 07:07:54',1816),('App\\Migrations\\Version20220105071520','2022-01-05 07:15:47',2263),('App\\Migrations\\Version20220105072801','2022-01-05 07:28:19',1585),('App\\Migrations\\Version20220106025745','2022-01-06 02:57:58',1330),('App\\Migrations\\Version20220106061318','2022-01-06 06:21:44',3742),('App\\Migrations\\Version20220106062802','2022-01-06 06:30:16',1551),('App\\Migrations\\Version20220106063039','2022-01-06 06:46:09',1723),('App\\Migrations\\Version20220106063837','2022-01-06 06:46:11',27);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `display_start_date` datetime DEFAULT NULL,
  `display_end_date` datetime DEFAULT NULL,
  `body` blob NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_meta`
--

DROP TABLE IF EXISTS `event_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_meta` (
  `event_meta_id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_meta`
--

LOCK TABLES `event_meta` WRITE;
/*!40000 ALTER TABLE `event_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `file` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form` (
  `form_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_meta`
--

DROP TABLE IF EXISTS `form_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_meta` (
  `form_meta_id` int NOT NULL AUTO_INCREMENT,
  `parent_form_meta_id` int NOT NULL,
  `form_id` int NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`form_meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_meta`
--

LOCK TABLES `form_meta` WRITE;
/*!40000 ALTER TABLE `form_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_submission`
--

DROP TABLE IF EXISTS `form_submission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_submission` (
  `form_submission_id` int NOT NULL AUTO_INCREMENT,
  `form_id` int NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`form_submission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_submission`
--

LOCK TABLES `form_submission` WRITE;
/*!40000 ALTER TABLE `form_submission` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_submission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_submission_meta`
--

DROP TABLE IF EXISTS `form_submission_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_submission_meta` (
  `form_submission_meta_id` int NOT NULL AUTO_INCREMENT,
  `form_submission_id` int NOT NULL,
  `form_meta_id` int NOT NULL,
  `value` varchar(280) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`form_submission_meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_submission_meta`
--

LOCK TABLES `form_submission_meta` WRITE;
/*!40000 ALTER TABLE `form_submission_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_submission_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `gallery_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,'Hero Images','2022-01-06 03:07:35','2022-01-06 03:07:35'),(2,'Jumbotron Images','2022-01-06 03:07:35','2022-01-06 03:07:35');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_image`
--

DROP TABLE IF EXISTS `gallery_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_image` (
  `gallery_image_id` int NOT NULL AUTO_INCREMENT,
  `gallery_id` int NOT NULL,
  `image_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gallery_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_image`
--

LOCK TABLES `gallery_image` WRITE;
/*!40000 ALTER TABLE `gallery_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `file_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`),
  KEY `IDX_C53D045F93CB796C` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Help','2022-01-03 16:28:04','2022-01-03 16:28:04'),(2,'LHTML Elements','2022-01-03 16:28:04','2022-01-03 16:28:04'),(3,'Site Footer','2022-01-03 16:28:04','2022-01-03 16:28:04'),(4,'About','2022-01-03 17:50:10','2022-01-03 17:50:10');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item` (
  `menu_item_id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `parent_menu_item_id` int DEFAULT NULL,
  `page_id` int DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`menu_item_id`),
  KEY `IDX_D754D550CCD7E912` (`menu_id`),
  KEY `IDX_D754D550C4663E4` (`page_id`),
  CONSTRAINT `FK_D754D550C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`page_id`),
  CONSTRAINT `FK_D754D550CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item`
--

LOCK TABLES `menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item` DISABLE KEYS */;
INSERT INTO `menu_item` VALUES (1,1,NULL,3,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(2,1,NULL,4,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(3,2,NULL,5,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(10,2,NULL,14,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(11,2,NULL,15,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(12,2,NULL,16,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(14,3,NULL,24,NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04',NULL),(15,4,NULL,25,NULL,NULL,'2022-01-03 20:14:41','2022-01-03 20:14:41',NULL);
/*!40000 ALTER TABLE `menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `news_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `display_start_date` datetime DEFAULT NULL,
  `display_end_date` datetime DEFAULT NULL,
  `summary` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'PHPMarkup','2021-04-29 00:00:00',NULL,NULL,NULL,'<p>We have decided to rename LivingMarkup to PHPMarkup to better reflect the purpose of the library.\r\n            To be honest, this is the third time we have had to renamed the library (formally LivingMarkup was known as PXP).</p>\r\n            <p>We hope PHPMarkup better conveys the purpose of the library. In the same way that PHP is interpreted into C to \r\n            allow developers to write powerful applications, PHPMarkup is a library that allows \r\n            curators to use markup to safely instantiate PHP classes and invoke methods.</p>\r\n            <p>Other than that, PHPMarkup has become a relatively stable library. It is actually amazing how well it\r\n             helps us run sites and minimize the code we need to maintain.</p>','2022-01-03 16:28:02','2022-01-03 16:28:02'),(2,'LHTML Elements Behind Hoopless','2020-08-08 00:00:00',NULL,NULL,NULL,'<p>We take a quick look at the if statment, variable, and redacted LHTML elements used in Hoopless.</p>\r\n           <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2w9vNNlsSRg\" frameborder=\"0\" \r\n           allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe>','2022-01-03 16:28:02','2022-01-03 16:28:02'),(3,'LHTML Add Custom Element','2020-08-07 00:00:00',NULL,NULL,NULL,'<p>See how easy it is to create your own custom LHTML elements using Hoopless. In this example we create \r\n        our own custom Alert elements that acts as a CSS abstraction layer to generate Bootstrap 4 alerts.</p>\r\n       <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HxZ2qitsUUs\" frameborder=\"0\"\r\n        allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe>','2022-01-03 16:28:02','2022-01-03 16:28:02'),(4,'LHTML Under the Hood','2020-08-07 00:00:00',NULL,NULL,NULL,'<p>LHTML works to make communicate the elements of design between team members while still delivering top \r\n            notch HTML to the web browser</p>\r\n           <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/L4u2qh5Elco\" frameborder=\"0\" \r\n           allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"allowfullscreen\"></iframe>','2022-01-03 16:28:03','2022-01-03 16:28:03'),(5,'Reworking The Language of the Web','2019-01-28 00:00:00',NULL,NULL,NULL,'<p>There is something fundamentally wrong about the way web teams work together to build websites.\r\n           The problem is the language they\'re using, HTML, was not designed to communicate within teams but to a \r\n           browser. That makes it a poor choice to help empower team members, encourage effective communication, \r\n           and encode the message that is the site between stakeholders.</p>\r\n           <p>Watch what we intend to do about it.</p>\r\n           <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6zEXsQKPL_M\" frameborder=\"0\" \r\n           allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" \r\n           allowfullscreen=\"allowfullscreen\"></iframe>','2022-01-03 16:28:03','2022-01-03 16:28:03');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page` (
  `page_id` int NOT NULL AUTO_INCREMENT,
  `page_parent_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `template` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,NULL,'Home','/',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(2,1,'About','/about',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(3,1,'Editing Guide','/help',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(4,3,'PHPMarkup','/help/phpmarkup',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(5,4,'Code Element','/help/phpmarkup/elements/code',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(10,4,'If Statement Element','/help/phpmarkup/elements/if-statement',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(11,4,'Images Element','/help/phpmarkup/elements/images',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(14,4,'Partial Element','/help/phpmarkup/elements/partial',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(15,4,'Redact Element','/help/phpmarkup/elements/redact',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(16,4,'Variables Element','/help/phpmarkup/elements/variables',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(17,1,'News','/news',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(18,1,'Products','/products',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(19,18,'LuckByDice','/products/luckbydice',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(21,1,'Blog','/blog',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(22,1,'Contact','/contact',NULL,NULL,'2022-01-03 16:28:03','2022-01-03 16:28:03'),(23,1,'Backend','/backend',NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04'),(24,23,'Sign In','/login',NULL,NULL,'2022-01-03 16:28:04','2022-01-03 16:28:04'),(25,2,'Brand','/about/brand',NULL,NULL,'2022-01-03 20:13:17','2022-01-03 20:13:17'),(26,1,'Services','/services',NULL,NULL,'2022-01-04 05:56:00','2022-01-04 05:56:00');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_revision`
--

DROP TABLE IF EXISTS `page_revision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_revision` (
  `page_revision_id` int NOT NULL AUTO_INCREMENT,
  `page_id` int NOT NULL,
  `body` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`page_revision_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_revision`
--

LOCK TABLES `page_revision` WRITE;
/*!40000 ALTER TABLE `page_revision` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_revision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `person` (
  `person_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`person_id`),
  KEY `IDX_34DCD176F5B7AF75` (`address_id`),
  CONSTRAINT `FK_34DCD176217BBB47` FOREIGN KEY (`person_id`) REFERENCES `user` (`person_id`),
  CONSTRAINT `FK_34DCD176F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `place` (
  `place_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` blob NOT NULL,
  `latitude` decimal(20,16) NOT NULL,
  `longitude` decimal(20,16) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int NOT NULL,
  PRIMARY KEY (`place_id`),
  KEY `IDX_741D53CDF5B7AF75` (`address_id`),
  CONSTRAINT `FK_741D53CDF5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile` (
  `profile_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `preferred_prounouns` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` blob NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resource` (
  `resource_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource`
--

LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` VALUES (1,'stylesheet-builder','Build CSS files form SCSS','2022-01-07 02:11:24','2022-01-07 02:11:24');
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'administrator','2022-01-07 02:12:25','2022-01-07 02:12:25'),(2,'editor','2022-01-07 02:12:25','2022-01-07 02:12:25'),(3,'author','2022-01-07 02:12:33','2022-01-07 02:12:33');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_resource`
--

DROP TABLE IF EXISTS `role_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_resource` (
  `role_resource_id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `resource_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_resource`
--

LOCK TABLES `role_resource` WRITE;
/*!40000 ALTER TABLE `role_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snippet`
--

DROP TABLE IF EXISTS `snippet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `snippet` (
  `snippet_id` int NOT NULL AUTO_INCREMENT,
  `description` blob NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`snippet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snippet`
--

LOCK TABLES `snippet` WRITE;
/*!40000 ALTER TABLE `snippet` DISABLE KEYS */;
/*!40000 ALTER TABLE `snippet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tag` (
  `tag_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `person_id` int DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQ_8D93D649217BBB47` (`person_id`),
  CONSTRAINT `FK_8D93D649217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'admin@example.net','9nSnjrDDPrwYUyeL',NULL,'admin@example.net','2022-01-06 02:58:46','2022-01-06 02:58:46');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `user_role_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-07  2:20:17
