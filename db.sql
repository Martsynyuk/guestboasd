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

/*Table structure for table `information` */

DROP TABLE IF EXISTS `information`;

CREATE TABLE `information` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `title` varchar(120) NOT NULL,
  `body` varchar(300) NOT NULL,
  `lat` int(15) NOT NULL,
  `lng` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `information` */

insert  into `information`(`id`,`user_id`,`title`,`body`,`lat`,`lng`) values (3,17,'news','dfdsffds',115515,4845551),(4,17,'news','textdsfdfdsf',115515,4845551),(12,17,'syslic','As someone living with MS herself and who has a huge passion for dance, Trishna ',455435,435435),(13,17,'homyak','sdsadasd sadasd dasd asd dasds asd sddasd asdas d',32432432,32432432);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(34) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`) values (17,'AntonM','terr83@gmail.com','7e737473ed73006755a0b3f881367f62');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
