/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 10.1.22-MariaDB : Database - fluidsurveys
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fluidsurveys` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fluidsurveys`;

/*Table structure for table `assignment` */

DROP TABLE IF EXISTS `assignment`;

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `place_address` varchar(255) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `assignment` */

insert  into `assignment`(`id`,`project_id`,`title`,`desc`,`created_at`,`updated_at`,`created_by`,`place_name`,`place_address`,`lat`,`lng`) values 
(1,1,'Pendapat Orang Yang Gak Tau','khusus orang orang yang belum tau Agya 2.0','2017-05-18 21:55:39','2017-05-18 14:55:39',1,'surabaya','surabaya',NULL,NULL),
(2,1,'Pendapat Orang Yang Gak Tau','khusus orang orang yang belum tau Agya 2.0','2017-05-18 15:32:29','2017-05-18 15:32:29',1,NULL,NULL,NULL,NULL),
(3,1,'UI','Kampus UI, Jalan Margonda Raya, Pondok Cina, Beji, Pd. Cina, Beji, Kota Depok, Jawa Barat 16424, Indonesia','2017-05-27 16:45:27','2017-05-27 16:45:27',1,NULL,NULL,-6.366834,-6.366834),
(4,1,'ITS','ini adalah kampus','2017-05-27 16:46:34','2017-05-27 16:46:34',1,'Institut Teknologi Sepuluh Nopember','Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia',-7.281865,-7.281865),
(5,8,'Perasaan orang setelah makan beng beng durian','perasaan senang sedih atau biasa saja','2017-05-28 04:46:45','2017-05-28 04:46:45',1,'ITS','Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia',-7.281865,-7.281865),
(6,8,'Bungkus','Perasaan setelah melihat bungkus beng beng durian','2017-05-28 14:00:37','2017-05-28 04:49:45',1,'ITSS','Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia',-7.281865,-7.281865);

/*Table structure for table `assignment_quest` */

DROP TABLE IF EXISTS `assignment_quest`;

CREATE TABLE `assignment_quest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) DEFAULT NULL,
  `question` varchar(1024) DEFAULT NULL,
  `upload_pict` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `assignment_quest` */

insert  into `assignment_quest`(`id`,`assignment_id`,`question`,`upload_pict`,`created_at`,`created_by`,`updated_at`,`deleted_at`) values 
(1,1,'Apakah Suka?',1,'2017-05-18 23:16:17',NULL,'0000-00-00 00:00:00',NULL),
(2,5,'Gambar Beng Beng',1,'2017-05-28 06:40:46',1,'2017-05-28 06:40:46',NULL),
(3,5,'Pendapat responden mengenai bungkus',0,'2017-05-28 06:41:11',1,'2017-05-28 06:41:11',NULL),
(4,5,'Foto Responden',1,'2017-05-28 06:53:32',1,'2017-05-28 06:53:32',NULL),
(5,5,'Foto Responden 2',1,'2017-05-29 06:05:50',1,'2017-05-28 06:54:02',NULL),
(6,6,'Gambar Bungkus Beng Beng',1,'2017-05-28 14:19:08',1,'2017-05-28 07:18:31',NULL),
(7,6,'Pendapat Mengenai Bungkus',0,'2017-05-28 14:19:13',1,'2017-05-28 07:18:55',NULL);

/*Table structure for table `assignment_report` */

DROP TABLE IF EXISTS `assignment_report`;

CREATE TABLE `assignment_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lng` float(10,6) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `place_address` varchar(255) DEFAULT NULL,
  `valuate_message` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `assignment_report` */

insert  into `assignment_report`(`id`,`assignment_id`,`created_at`,`created_by`,`updated_at`,`lng`,`lat`,`place_address`,`valuate_message`,`deleted_at`) values 
(1,5,'2017-05-29 06:22:17',1,'2017-05-28 23:22:17',NULL,NULL,'Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia','asd',NULL),
(2,5,'2017-05-29 06:27:36',1,'2017-05-28 23:27:36',NULL,NULL,'Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111, Indonesia','Mana kamu gak ngerjain',NULL);

/*Table structure for table `assignment_report_detail` */

DROP TABLE IF EXISTS `assignment_report_detail`;

CREATE TABLE `assignment_report_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_report_id` int(11) DEFAULT NULL,
  `assignment_quest_id` int(11) DEFAULT NULL,
  `answer` varchar(1024) DEFAULT NULL,
  `answer_img` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `assignment_report_detail` */

insert  into `assignment_report_detail`(`id`,`assignment_report_id`,`assignment_quest_id`,`answer`,`answer_img`,`created_at`,`created_by`,`updated_at`,`deleted_at`) values 
(1,1,2,'Baik','img/report_detail/img_1.jpg','2017-05-29 06:10:48',1,'0000-00-00 00:00:00',NULL),
(2,1,3,'Enak',NULL,'2017-05-29 05:56:36',1,'0000-00-00 00:00:00',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `project` */

insert  into `project`(`id`,`name`,`company`,`created_at`,`updated_at`,`created_by`) values 
(1,'Toyota Agya 2.0','Toyota','2017-05-18 21:45:18','2017-05-18 14:45:18',1),
(6,'Simpati Loop','Telkomsel','2017-05-18 15:39:54','2017-05-18 15:39:54',1),
(8,'Beng Beng Durian','Unilever','2017-05-27 15:07:03','2017-05-27 15:07:03',1);

/*Table structure for table `project_collaborator` */

DROP TABLE IF EXISTS `project_collaborator`;

CREATE TABLE `project_collaborator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `manager` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `project_collaborator` */

insert  into `project_collaborator`(`id`,`project_id`,`user_id`,`manager`,`created_at`,`updated_at`,`created_by`,`deleted_at`) values 
(1,1,1,1,'2017-05-18 22:25:42','2017-05-18 15:43:45',1,NULL),
(3,6,1,1,'2017-05-18 15:39:54','2017-05-18 15:39:54',1,NULL),
(4,7,1,1,'2017-05-27 15:06:09','2017-05-27 15:06:09',1,NULL),
(5,8,1,1,'2017-05-27 15:07:03','2017-05-27 15:07:03',1,NULL),
(6,9,1,1,'2017-05-27 15:15:01','2017-05-27 15:15:01',1,NULL),
(7,10,1,1,'2017-05-27 15:15:32','2017-05-27 15:15:32',1,NULL),
(8,11,1,1,'2017-05-27 15:15:43','2017-05-27 15:15:43',1,NULL),
(9,12,1,1,'2017-05-27 15:16:02','2017-05-27 15:16:02',1,NULL),
(10,13,1,1,'2017-05-27 15:17:56','2017-05-27 15:17:56',1,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`device_token`,`created_at`,`updated_at`) values 
(1,'Kevin','kevinfachreza@gmail.com','$2y$10$kcNkZwNSzOmqstomJqNYcuD9dw/K2DpUrXU1erl0d1VUWd5.Q37yu',NULL,'1','2017-05-18 14:27:41','2017-05-18 14:34:15'),
(2,'Kevin Fachreza','kevinfachreza@yahoo.com','$2y$10$ad6UYuBC01s2t3/LJw3V6OCuTpx6fAYIdvVBm0dycdY84qD5NdZJu','TyciXoss4iRQkLRsBT0Ir0XmO9FDe1vjHLIhbMQyw2RwVFvKQULWa5s2sWqv',NULL,'2017-05-27 14:01:29','2017-05-27 14:01:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
