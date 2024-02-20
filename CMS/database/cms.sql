/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.32-MariaDB : Database - cms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cms` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `cms`;

/*Table structure for table `complains` */

DROP TABLE IF EXISTS `complains`;

CREATE TABLE `complains` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `complain` varchar(50) DEFAULT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `assigned_to` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `complains` */

insert  into `complains`(`id`,`user_id`,`complain`,`detail`,`date`,`status`,`category`,`assigned_to`) values (6,2,'2323','232','2024-02-29','open','open','2');

/*Table structure for table `complains_comments` */

DROP TABLE IF EXISTS `complains_comments`;

CREATE TABLE `complains_comments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `complain_id` int(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `comments_reply` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `complains_comments` */

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `nic` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `salary` int(50) DEFAULT NULL,
  `type` varchar(590) DEFAULT NULL,
  `timing` time NOT NULL,
  PRIMARY KEY (`id`,`timing`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`name`,`nic`,`address`,`salary`,`type`,`timing`) values (1,'ta',NULL,NULL,NULL,NULL,'00:00:00'),(2,'asdfa',NULL,NULL,NULL,NULL,'00:00:00'),(3,'adsf',NULL,NULL,NULL,NULL,'00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL COMMENT '0=Admin,1=user,2=employee',
  `status` varchar(250) DEFAULT NULL COMMENT '0=actice,1=offline',
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`number`,`address`,`type`,`status`) values (1,'Admin','admin@gmail.com','admin123','03111111111','karachi',1,'1'),(2,'ahsan baber','ahsan@test.com','21312','432423423423','karachi',2,'1'),(3,'Taha','taha@gmail.com','112233','2343243243243','karachi',2,'1'),(4,'Taha','taha@gmail.com','112233','2343243243243','karachi',2,'1'),(12,'Taha','taha@gmail.com','123456','93232632','mzc',2,'1'),(13,'ahsan','ahsan@124.com','123457','232','karachi',2,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
