/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.5.23 : Database - guestboard
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`guestboard` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `guestboard`;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `title` varchar(120) NOT NULL,
  `body` varchar(300) NOT NULL,
  `lat` decimal(20,15) NOT NULL,
  `lng` decimal(20,15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

insert  into `post`(`id`,`user_id`,`title`,`body`,`lat`,`lng`) values (13,17,'news','news create','51.761914853084540','33.390820312500000'),(14,18,'one','asds asdasd asd asdasd asdasd dasdas ','49.000000015455500','26.000415445000000'),(15,17,'topic','test topic !','51.013754657188215','29.575195312500000'),(16,17,'text','new text','50.401515322782366','33.310546875000000'),(17,17,'topic','new topic with text','50.035973672195496','27.465820312500000'),(18,17,'topic','test','48.893615361480194','29.509277343750000'),(19,17,'16.08.2016','new day','48.574789910928864','29.750976562500000');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(34) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`) values (17,'AntonM','terr83@gmail.com','7e737473ed73006755a0b3f881367f62'),(18,'Genuen','tester@mai.ru','7e737473ed73006755a0b3f881367f62');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
