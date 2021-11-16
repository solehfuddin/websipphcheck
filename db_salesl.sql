/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.24-log : Database - db_salesmob
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_salesmob` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_salesmob`;

/*Table structure for table `m_level` */

DROP TABLE IF EXISTS `m_level`;

CREATE TABLE `m_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_code` varchar(20) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `level_description` text,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_level` */

insert  into `m_level`(`level_id`,`level_code`,`level_name`,`level_description`) values 
(1,'SL-001','Sales Area','Sales Area Manager'),
(2,'SL-002','Sales','Sales account');

/*Table structure for table `m_sales` */

DROP TABLE IF EXISTS `m_sales`;

CREATE TABLE `m_sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_uname` varchar(30) NOT NULL,
  `sales_fname` varchar(75) DEFAULT NULL,
  `sales_password` text,
  `sales_level` varchar(20) NOT NULL DEFAULT 'SL-002',
  `sales_email` varchar(75) DEFAULT NULL,
  `sales_mobile` varchar(13) DEFAULT NULL,
  `sales_address` text,
  `insert_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `m_sales` */

insert  into `m_sales`(`sales_id`,`sales_uname`,`sales_fname`,`sales_password`,`sales_level`,`sales_email`,`sales_mobile`,`sales_address`,`insert_date`,`update_date`) values 
(1,'admin','Administrator','21232f297a57a5a743894a0e4a801fc3','SL-002','admin@trl.co.id','085710035919','jakarta','2020-05-20 12:42:07',NULL),
(2,'soleh','soleh','21232f297a57a5a743894a0e4a801fc3','SL-002','admin@trl.co.id','085710035919','jakarta','2020-05-26 15:39:59',NULL),
(3,'retep','Retep Ocin','e10adc3949ba59abbe56e057f20f883e','SL-002','nico@trl.co.id','081255640440','Pulo Jahe','2020-05-27 13:47:17',NULL);

/*Table structure for table `m_user` */

DROP TABLE IF EXISTS `m_user`;

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `m_user` */

insert  into `m_user`(`id_user`,`username`,`password`) values 
(1,'demo','demo123');

/*Table structure for table `t_input` */

DROP TABLE IF EXISTS `t_input`;

CREATE TABLE `t_input` (
  `id_input` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `kode_warna` varchar(20) DEFAULT NULL,
  `kode_ph` varchar(5) DEFAULT NULL,
  `kategori_ph` varchar(50) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  PRIMARY KEY (`id_input`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `t_input` */

insert  into `t_input`(`id_input`,`id_user`,`kode_warna`,`kode_ph`,`kategori_ph`,`tgl_input`) values 
(2,1,'#DA9F04','5','Kategori pH Acid','2021-11-03'),
(13,1,'#cfb9a4','0','Tidak ditemukan','2021-11-07'),
(14,1,'#47490e','0','Tidak ditemukan','2021-11-08'),
(17,1,'#02a801','7','Netral','2021-11-08'),
(20,1,'#907f1a','6','Acid','2021-11-08'),
(21,1,'#71342d','7','Netral','2021-11-08'),
(22,1,'#162333','9','Alkaline','2021-11-08'),
(23,1,'#394f2c','7','Netral','2021-11-10'),
(24,1,'#b992ba','5','Acid','2021-11-11'),
(25,1,'#c4a7a2','5','Acid','2021-11-11'),
(26,1,'#c5bab2','5','Acid','2021-11-11'),
(27,1,'#b2b695','5','Acid','2021-11-11'),
(28,1,'#986809','6','Acid','2021-11-11'),
(29,1,'#56521f','7','Netral','2021-11-11'),
(30,1,'#af7c43','6','Acid','2021-11-11'),
(31,1,'#b59832','6','Acid','2021-11-11'),
(32,1,'#a3a049','6','Acid','2021-11-11'),
(33,1,'#8c6f0b','6','Acid','2021-11-11'),
(34,1,'#af6a00','6','Acid','2021-11-11'),
(35,1,'#556220','7','Netral','2021-11-11'),
(36,1,'#893611','2','Acid','2021-11-11'),
(37,1,'#698c7a','6','Acid','2021-11-11'),
(38,1,'#c9cbc4','5','Acid','2021-11-11'),
(39,1,'#555a57','7','Netral','2021-11-11'),
(40,1,'#d7ad99','5','Acid','2021-11-11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
