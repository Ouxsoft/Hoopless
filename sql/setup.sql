-- TODO: Use PHP class to generate the contents of this file
-- Create hoopless database

CREATE DATABASE IF NOT EXISTS hoopless;

USE hoopless;

-- Content Types
-- Used for storing dynamic content

-- content_type_schema
-- type_id, parent_id, name, machine_name, default_value, handler_id, description, timestamp
-- 1, 0, 'Profiles', 'profiles' '{s:Select}', 2, NOW()
-- 2, 0, 'Files', FILE\
-- 4, 0, 'Stories'
-- 1, 1, 'First Name', 1, 'Enter your first name', NOW()
-- 1, 1, 'Last Name', 1, 'Enter your last name', NOW()
DROP TABLE IF EXISTS `content_type_schema`;
CREATE TABLE `content_type_schema` (
  `schema_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` BLOB NOT NULL,
  `machine_name` BLOB NOT NULL,
  `class_name` BLOB NOT NULL,
  `description` BLOB NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`schema_id`)
);

INSERT INTO `content_type_schema`
(`parent_id`, `name`, `machine_name`, `class_name`, `description`)
VALUES
(NULL, 'Profiles', 'profiles','HTML\Profiles','People, places, or things'),
(1, 'First Name', 'first_name', 'HTML\Textbox', 'Enter first name'),
(1, 'Middle Name', 'middle_name', 'HTML\Textbox', 'Enter middle name'),
(1, 'Last Name', 'last_name', 'HTML\Textbox', 'Enter last name'),
(1, 'Full Name', 'full_name', 'HTML\Textbox', 'Enter full name'),

(NULL, 'Stories', 'stories','HTML\Stories','Time sensitive postings'),
(1, 'Title', 'title', 'HTML\Title', 'Title'),
(2, 'Summary', 'summary', 'HTML\WYSIWYG', 'Short summary of body'),
(2, 'Body', 'body', 'HTML\WYSIWYG', 'Short summary of body'),
(2, 'Date', 'date', 'HTML\DATE', 'Publish date'),

(NULL, 'Blurbs', 'blurbs','HTML\Blurbs','Short reusable text'),
(1, 'Text', 'text', 'HTML\WYSIWYG', 'Blurb content'),

(NULL, 'Events', 'events','HTML\Events','Calendar events'),
(1, 'Location', 'text', 'HTML\WYSIWYG', 'Blurb content'),
(1, 'Place', 'place', 'HTML\Places', 'Blurb content'),

(NULL, 'Places', 'place','HTML\Place','Places'),
(1, 'Text', 'text', 'HTML\WYSIWYG', 'Blurb content'),
(1, 'Latitude', 'text', 'HTML\WYSIWYG', 'Blurb content'),
(1, 'Longitude', 'text', 'HTML\WYSIWYG', 'Blurb content');


DROP TABLE IF EXISTS `content_type_entity`;
CREATE TABLE `content_type_entity` (
  `entity_id` int(11) NOT NULL AUTO_INCREMENT,
  `schema_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`entity_id`)
);

DROP TABLE IF EXISTS `content_type_entity_value`;
CREATE TABLE `content_type_entity_value` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `serialized_value` BLOB NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`value_id`)
);

DROP TABLE IF EXISTS `content_type_entity_value_revision`;
CREATE TABLE `content_type_entity_value_revision` (
  `revision_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `user_id` BLOB NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`revision_id`)
);


DROP TABLE IF EXISTS `content_type_group_access`;
CREATE TABLE `content_type_group_access` (
  `acl_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `user_id` BLOB NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`acl_id`)
);

-- done by api
-- content_type_handler
--
--     handler_id, name, namespace, hooks
--     1, 'Select', 'HTML\Select', [onDisplay, onEdit, onLoad]
--     2, 'Video', 'HTML\VideoEmbed'
--
--         onDisplay {
--             <select name="">
--                 foreach($value){
--                     <option value=""></option>
--                 }
--             </select>
--         }
--         onEdit {}
--         onLoad {}

-- only parents can feature tags
DROP TABLE  IF EXISTS `content_type_entity_tag`;
CREATE TABLE `content_type_entity_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tag_id`)
);


INSERT INTO content_type_entity_tag (`name`)
VALUES
('Person'),
('Place');