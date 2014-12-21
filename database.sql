CREATE DATABASE `mystory` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `mys_channel_settings` (
  `channel_id` varchar(200) NOT NULL,
  `channel_name` varchar(100) NOT NULL,
  `channel_settings` text,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `mys_story` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `story_id` varchar(200) NOT NULL,
  `story_text` text,
  `story_datetime` datetime NOT NULL,
  `story_channel` varchar(100) NOT NULL,
  `story_source` varchar(200) NOT NULL,
  `story_lat` varchar(45) DEFAULT '0',
  `story_lon` varchar(45) DEFAULT '0',
  `source_id` varchar(45) DEFAULT '0',
  `source_name` varchar(100) DEFAULT NULL,
  `source_img` varchar(500) DEFAULT NULL,
  `source_link` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=latin1;

CREATE TABLE `mys_story_media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `story_id` bigint(20) NOT NULL,
  `media_file` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;



