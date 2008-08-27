/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) collate utf8_unicode_ci NOT NULL,
  `password` char(32) collate utf8_unicode_ci NOT NULL,
  `screen_name` varchar(64) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`,`screen_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains the administrator identities';

/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`,`username`,`password`,`screen_name`) VALUES 
 (1,'admin','demo','Admin');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains the post categories';

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`,`name`) VALUES 
 (1,'No category'),
 (2,'Agavi');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(256) collate utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `posted` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `category_id` (`category_id`,`posted`,`author_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Contains the post bodies';

/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`,`title`,`category_id`,`content`,`posted`,`author_id`) VALUES 
 (1,'First post',1,'<p>Terrific! This is our first post!</p>\r\n\r\n<p>This is just a first post. It has no actual contents. If you are reading this, things must be working.</p>','2008-07-14 00:01:07',1),
 (2,'Second post',2,'<p>It looks like our blog application is working, yay!</p>','2008-07-14 00:01:07',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

