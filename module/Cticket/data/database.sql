/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.32 : Database - ctickets
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ctickets` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ctickets`;

/*Data for the table `cticket_category` */

insert  into `cticket_category`(`id`,`name`,`description`,`status`,`created_at`,`updated_at`) values (0,'None','None',1,'2014-06-01 11:38:00',NULL),(1,'Midas USA','Midas USA',1,'2014-06-01 01:41:02',NULL),(2,'Komatsu','Komatsu Japan',1,'2014-06-01 01:47:00',NULL);

/*Data for the table `cticket_ticket` */

insert  into `cticket_ticket`(`id`,`subject`,`body`,`status`,`email`,`contact`,`priority`,`created_at`,`updated_at`,`category`) values (1,'Create User','Please create user cj@zoop.net',1,'cj.ines@yopmail.com','CJ',2,NULL,NULL,1),(2,'Edited Ticket','ccc',1,'cj.ines@outlook.ph','CJ',1,NULL,NULL,0),(3,'test','',NULL,'adminin@yopmail.com','CJ',1,NULL,NULL,NULL),(4,'test','',NULL,'adminin@yopmail.com','CJ',1,NULL,NULL,NULL),(5,'test','sdasd adasd',1,'adminin@yopmail.com','CJ',2,NULL,NULL,2),(6,'Nice ticket','nnnnnnnnn',1,'adminin@yopmail.com','CJ',1,NULL,NULL,0),(7,'another good test','test',1,'cj.ines@zoop.net','Kopnr',1,NULL,NULL,2),(8,'dd','GGGG',1,'Aprealleiines@yahoo.com','a',1,NULL,NULL,1),(9,'dd','GGGG',1,'Aprealleiines@yahoo.com','a',1,NULL,NULL,1),(10,'Tetst','tset',1,'jasminayala51@yahoo.com','test',1,NULL,NULL,1),(11,'Another Subjevt','test',1,'jmarin@norauto.com.ar','Crisdel James',1,NULL,NULL,1),(12,'test','test',1,'cj.ines@yopmail.com','CJ',1,NULL,NULL,NULL),(13,'Awesome Subject','Awesome BOdy',1,'cj.ines@zoop.net','Crisdell James',2,NULL,NULL,2),(14,'Awesome Subject','Awesome BOdy',1,'cj.ines@zoop.net','Crisdell James',2,NULL,NULL,2),(15,'123','More Awesome BOdy',1,'sas@sd','Crisdell James Ines',3,NULL,NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
