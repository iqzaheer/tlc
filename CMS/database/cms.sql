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

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(2500) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`status`) values (1,'Wire Issue','test',1),(2,'Electric Issue',NULL,1),(3,'Mechanincal',NULL,1),(4,'Maintenance',NULL,1),(6,'Network Issue','network problem',1),(7,'Taha','network problem',0);

/*Table structure for table `complains` */

DROP TABLE IF EXISTS `complains`;

CREATE TABLE `complains` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `complain` varchar(50) DEFAULT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `assigned_to` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `complains` */

insert  into `complains`(`id`,`user_id`,`complain`,`detail`,`date`,`status`,`category`,`assigned_to`) values (1,2,'no working','none','2024-02-21 00:00:00','1','pollution',0),(12,3,'test','test','2024-02-22 16:54:52','1','2',0),(17,3,'test','test','2024-02-27 16:19:42','1','2',8),(18,3,'test','test','2024-02-27 16:19:49','1','2',8),(21,3,'wire check testing','maintanence','2024-03-05 16:55:29','1','4',4);

/*Table structure for table `complains_comments` */

DROP TABLE IF EXISTS `complains_comments`;

CREATE TABLE `complains_comments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `complain_id` int(50) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `complains_comments` */

insert  into `complains_comments`(`id`,`complain_id`,`user_id`,`comments`,`created_at`) values (4,17,1,'please see its urgremt','2024-03-07 20:04:32'),(5,17,2,'working on it','2024-03-07 20:10:32'),(6,17,4,'issue not fixed','2024-03-07 20:15:32'),(7,17,2,'it fixed','2024-03-07 20:20:32'),(8,17,1,'please check and confirm','2024-03-07 20:30:32'),(9,17,4,'yes its done','2024-03-07 20:40:32');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `nic` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `salary` int(50) DEFAULT NULL,
  `type` varchar(590) DEFAULT NULL,
  `timing` varchar(453) NOT NULL,
  PRIMARY KEY (`id`,`timing`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`name`,`nic`,`address`,`salary`,`type`,`timing`) values (1,'ali','4656-4546-5647','karachi',12000,'plumber','00:00:08'),(4,'shayan','5463-4536-7456','lahore',15000,'electrician','00:00:02'),(7,'Taha','4856-4465-4646','karachi,mzc',100000,'engineer','2-9'),(9,'Hasnain','245-4564-6445','lahore',200000,'mechanic','1-5');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`number`,`address`,`type`,`status`) values (1,'Admin','admin@gmail.com','admin123','03111111111','karachi',1,'1'),(2,'Taha','ahsan@test.com','123456','43242342342334','karachi',2,'1'),(3,'3','taha@gmail.com','112233','2343243243243324','karachi',2,'1'),(4,'Taha','taha@gmail.com','112233','2343243243243','karachi',2,'1'),(12,'Taha','taha@gmail.com','123456','93232632','mzc',2,'1'),(13,'ahsan','ahsan@124.com','123457','232','karachi',2,'1'),(14,'test asdfsd','dafd@gmail.com','32sdfasd','324324324',NULL,2,'1'),(17,'Taha','taha@gmail.com','32432','324','23423',2,'1'),(18,'Zeeshan','zeeshan@gmail.com','zeeshan123','3154894648','karachi,pakistan',2,'1'),(20,'Azaibi','azaib@test.com','123456','923333333','karachi',2,'1'),(21,'ali ali ','ali@gmail.com','112233','656546464',NULL,2,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
