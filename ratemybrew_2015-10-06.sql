# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.42)
# Database: ratemybrew
# Generation Time: 2015-10-06 16:44:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT '',
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `coffee_tea_pref` varchar(255) DEFAULT NULL,
  `coffee_sugar` varchar(255) DEFAULT NULL,
  `coffee_milk` varchar(255) DEFAULT NULL,
  `coffeee_color` varchar(255) DEFAULT NULL,
  `tea_sugar` varchar(255) DEFAULT NULL,
  `tea_milk` varchar(255) DEFAULT NULL,
  `tea_color` varchar(255) DEFAULT NULL,
  `coffee_bought_count` varchar(255) DEFAULT NULL,
  `coffee_made_count` varchar(255) DEFAULT NULL,
  `average_brew_rating` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `surname`, `coffee_tea_pref`, `coffee_sugar`, `coffee_milk`, `coffeee_color`, `tea_sugar`, `tea_milk`, `tea_color`, `coffee_bought_count`, `coffee_made_count`, `average_brew_rating`)
VALUES
	(1,'admin','mrbarbie9','Matt','Burton','coffee','none','none','black','one','yes','dark brown','6','110','5'),
	(2,'admin','mrbarbie9','Simon','Hardware','tea','none','none','black','one','yes','dark brown','6','110','5'),
	(3,'admin','mrbarbie9','Allan','Smith','coffee','none','none','black','one','yes','dark brown','6','110','5'),
	(4,'admin','mrbarbie9','Rich','Collinge','tea','none','none','black','one','yes','dark brown','6','110','5'),
	(5,'admin','mrbarbie9','Stephen','Scott','coffee','none','none','black','one','yes','dark brown','6','110','5'),
	(6,'admin','mrbarbie9','Joe','Shields','coffee','none','none','black','one','yes','dark brown','6','110','5'),
	(7,'admin','mrbarbie9','Harry ','Blease','coffee','none','none','black','one','yes','dark brown','6','110','5');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
