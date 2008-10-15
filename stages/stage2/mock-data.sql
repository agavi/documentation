/*!40101 SET NAMES utf8 */;

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) collate utf8_unicode_ci NOT NULL,
  `password` char(32) collate utf8_unicode_ci NOT NULL,
  `screen_name` varchar(64) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains the administrator identities';

INSERT INTO `admin_users` (`id`,`username`,`password`,`screen_name`) VALUES 
 (1,'admin','demo','Admin');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains the post categories';

INSERT INTO `categories` (`id`,`name`) VALUES 
 (1,'No category'),
 (2,'Agavi');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `posted` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `category_id` (`category_id`),
  FOREIGN KEY (`author_id`) REFERENCES `admin_users` (`id`) ON UPDATE CASCADE 
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains the post bodies';

INSERT INTO `posts` (`id`,`title`,`category_id`,`content`,`posted`,`author_id`) VALUES 
 (1,'First post',1,'<p>Terrific! This is our first post!</p>\r\n\r\n<p>This is just a first post. It has no actual contents. If you are reading this, things must be working.</p>','2008-07-14 00:01:07',1),
 (2,'Second post',2,'<p>It looks like our blog application is working, yay!</p>','2008-07-14 00:01:07',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `post_id` int(11) NOT NULL,
  `name` varchar(64) collate utf8_unicode_ci NOT NULL,
  `email` varchar(256) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `posted` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
 COMMENT='Contains post comments';