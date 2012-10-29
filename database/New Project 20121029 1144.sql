-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema scmandms_system
--

CREATE DATABASE IF NOT EXISTS scmandms_system;
USE scmandms_system;

--
-- Definition of table `tbx101_account`
--

DROP TABLE IF EXISTS `tbx101_account`;
CREATE TABLE `tbx101_account` (
  `account_id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) default NULL,
  `home_address` text NOT NULL,
  `email_address` varchar(45) default NULL,
  `contact_number` varchar(45) default NULL,
  `register_date` varchar(45) default NULL,
  `lastvisit_date` varchar(45) default NULL,
  `online` varchar(45) default NULL,
  `user_type_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned default '0',
  `ProfilePic` varchar(45) NOT NULL,
  `branch_id` int(10) unsigned default '0',
  `time` varchar(45) NOT NULL,
  PRIMARY KEY  (`account_id`,`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbx101_account`
--

/*!40000 ALTER TABLE `tbx101_account` DISABLE KEYS */;
INSERT INTO `tbx101_account` (`account_id`,`username`,`password`,`first_name`,`last_name`,`middle_name`,`home_address`,`email_address`,`contact_number`,`register_date`,`lastvisit_date`,`online`,`user_type_id`,`status`,`ProfilePic`,`branch_id`,`time`) VALUES 
 (1,'admin','6082df51cff0a6161f6b581da76c1823','John Gerome','Zuckerberg','','Habitati Villages','johngerome@tisoy.com','12312','none','1351477767','0',1,0,'13492816171.jpg',0,''),
 (2,'bert','9d671bd33818892a9317bb3d51557d7f','Rey Robert','Castro','G','Maribojoc, Bohol','bert_batman47@yahoo.com','09094255709','2012-10-03 17:05:36','1349955767',NULL,3,0,'13492838191.png',1,'1349283936'),
 (4,'pinky','b8e7be5dfa2ce0714d21dcfc7d72382c','Mary','Asignar','','Corella, Bohol','pink@yahoo.com','09087664523','2012-10-04 08:27:52','1349955767',NULL,4,0,'13493103681.jpg',4,'1349310472'),
 (5,'peter','527bd5b5d689e2c32ae974c6229ff785','John Peter','Badilla','','Panglao, Bohol','peter@yahoo.com','09054376899','2012-10-04 08:59:16','1349955767',NULL,3,0,'13499332981.jpg',7,'1349312356'),
 (7,'janice','698d51a19d8a121ce581499d7b701668','Janice','Limbago','','Dauis, Bohol','','09087654321','2012-10-04 09:47:04','1350821545',NULL,2,0,'default_large.png',3,'1349315224'),
 (8,'elle','28bc600b2ea125c8e4b26c67dccde952','Elle Zan Syrus','Tesorio','','Calape, Bohol','','09052312345','2012-10-04 09:48:59','1351477460',NULL,3,0,'default_large.png',3,'1349315339'),
 (9,'gerome','6082df51cff0a6161f6b581da76c1823','John Gerome','Baldonado','Zuckerberg','Habitat Village, Bool District, Tagbilaran City, Bohol, Philippines','johngerome@webdeveloper.com','09097947715','2012-10-11 13:21:23','1350771236',NULL,3,0,'13499325181.jpg',5,'1349932883');
/*!40000 ALTER TABLE `tbx101_account` ENABLE KEYS */;


--
-- Definition of table `tbx101_adjustment_products`
--

DROP TABLE IF EXISTS `tbx101_adjustment_products`;
CREATE TABLE `tbx101_adjustment_products` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `reason` varchar(45) default NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `adjustment_type` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_adjustment_products`
--

/*!40000 ALTER TABLE `tbx101_adjustment_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbx101_adjustment_products` ENABLE KEYS */;


--
-- Definition of table `tbx101_back_order`
--

DROP TABLE IF EXISTS `tbx101_back_order`;
CREATE TABLE `tbx101_back_order` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_back_order`
--

/*!40000 ALTER TABLE `tbx101_back_order` DISABLE KEYS */;
INSERT INTO `tbx101_back_order` (`id`,`product_id`,`branch_id`,`order_id`,`quantity`) VALUES 
 (1,4,3,1,1),
 (2,2,3,3,100),
 (3,17,3,6,20);
/*!40000 ALTER TABLE `tbx101_back_order` ENABLE KEYS */;


--
-- Definition of table `tbx101_branch`
--

DROP TABLE IF EXISTS `tbx101_branch`;
CREATE TABLE `tbx101_branch` (
  `branch_id` int(10) unsigned NOT NULL auto_increment,
  `branch_name` varchar(45) NOT NULL,
  `business_id` int(10) unsigned NOT NULL,
  `location` varchar(200) NOT NULL,
  `archive` smallint(1) unsigned default '0',
  PRIMARY KEY  (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbx101_branch`
--

/*!40000 ALTER TABLE `tbx101_branch` DISABLE KEYS */;
INSERT INTO `tbx101_branch` (`branch_id`,`branch_name`,`business_id`,`location`,`archive`) VALUES 
 (1,'Tagbilaran Eggstore  Branch',1,'Tagbilaran City, Bohol, Philippines',1),
 (2,'Sikatuna Eggstore',1,'Poblacion, Sikatuna, Bohol',1),
 (3,'Sikatuna Bakeshop',1,'Sikatuna, Bohol',0),
 (4,'Tagbilaran Egg And Bakery',1,'Tagbilaran City, Bohol, Philippines',0),
 (5,'Habitat Bakeshop',1,'Habitat, Bool, Bohol',0),
 (6,'Corella Eggstore',1,'Corella, Bohol',0),
 (7,'Feeds Store',1,'Sikatuna, Bohol',1);
/*!40000 ALTER TABLE `tbx101_branch` ENABLE KEYS */;


--
-- Definition of table `tbx101_branch_product`
--

DROP TABLE IF EXISTS `tbx101_branch_product`;
CREATE TABLE `tbx101_branch_product` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `expiry_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `tbx101_branch_product`
--

/*!40000 ALTER TABLE `tbx101_branch_product` DISABLE KEYS */;
INSERT INTO `tbx101_branch_product` (`id`,`product_id`,`quantity`,`branch_id`,`expiry_date`) VALUES 
 (1,3,'584',3,'2012-12-08 00:31:00'),
 (2,4,'494',3,'2012-12-08 00:31:06'),
 (3,4,'498',3,'2012-12-09 00:52:25');
/*!40000 ALTER TABLE `tbx101_branch_product` ENABLE KEYS */;


--
-- Definition of table `tbx101_branch_product_line`
--

DROP TABLE IF EXISTS `tbx101_branch_product_line`;
CREATE TABLE `tbx101_branch_product_line` (
  `ProductLineId` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL auto_increment,
  `branch_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`,`ProductLineId`),
  KEY `FK_tbx101_branch_product_line_1` (`ProductLineId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_branch_product_line`
--

/*!40000 ALTER TABLE `tbx101_branch_product_line` DISABLE KEYS */;
INSERT INTO `tbx101_branch_product_line` (`ProductLineId`,`id`,`branch_type_id`) VALUES 
 (2,1,4),
 (1,2,4),
 (2,3,1),
 (1,4,1);
/*!40000 ALTER TABLE `tbx101_branch_product_line` ENABLE KEYS */;


--
-- Definition of table `tbx101_business`
--

DROP TABLE IF EXISTS `tbx101_business`;
CREATE TABLE `tbx101_business` (
  `business_id` int(10) unsigned NOT NULL auto_increment,
  `business_title` varchar(45) NOT NULL,
  `trash` smallint(1) unsigned default '0',
  PRIMARY KEY  (`business_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbx101_business`
--

/*!40000 ALTER TABLE `tbx101_business` DISABLE KEYS */;
INSERT INTO `tbx101_business` (`business_id`,`business_title`,`trash`) VALUES 
 (1,'Eggstore And Bakery',0);
/*!40000 ALTER TABLE `tbx101_business` ENABLE KEYS */;


--
-- Definition of table `tbx101_config`
--

DROP TABLE IF EXISTS `tbx101_config`;
CREATE TABLE `tbx101_config` (
  `base_url` varchar(45) default NULL,
  `language` varchar(10) default NULL,
  `time_zone` varchar(45) default NULL,
  `secret_key` text,
  `id` int(10) unsigned NOT NULL,
  `vat` double default '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_config`
--

/*!40000 ALTER TABLE `tbx101_config` DISABLE KEYS */;
INSERT INTO `tbx101_config` (`base_url`,`language`,`time_zone`,`secret_key`,`id`,`vat`) VALUES 
 (NULL,NULL,'Asia/Singapore','1XldZOf59Dwzs9RK',0,12);
/*!40000 ALTER TABLE `tbx101_config` ENABLE KEYS */;


--
-- Definition of table `tbx101_customer`
--

DROP TABLE IF EXISTS `tbx101_customer`;
CREATE TABLE `tbx101_customer` (
  `CustomerId` int(10) unsigned NOT NULL auto_increment,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `HomeAddress` text NOT NULL,
  `ContactNumber` varchar(45) NOT NULL,
  `Discount` varchar(3) NOT NULL,
  `ProfilePic` varchar(45) NOT NULL,
  `CompanyName` varchar(45) default NULL,
  `time` varchar(45) NOT NULL,
  `added_by` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_customer`
--

/*!40000 ALTER TABLE `tbx101_customer` DISABLE KEYS */;
INSERT INTO `tbx101_customer` (`CustomerId`,`FirstName`,`MiddleName`,`LastName`,`EmailAddress`,`HomeAddress`,`ContactNumber`,`Discount`,`ProfilePic`,`CompanyName`,`time`,`added_by`) VALUES 
 (1,'Arce','Asignar','Bolongaita','winxArce@yahoo.com','Bingag, Daius, Bohol','09072795299','50','13492746681.jpg','Bohol Quality','1349274866',1),
 (2,'Gentle','Kilat','Carnesir','genta@yahoo.com','Tagbilaran City','09091234890','40','13492752521.jpg','Alturas','1349275329',1),
 (3,'Ivy','Malba','Yana','abyang@yahoo.com','Biabas, Uba,y, Bohol','09083489900','70','13492755171.jpg','','1349275589',1),
 (4,'Aconiree','','Felizarta','killer_aira@yahoo.com','Mango District, Tagbilaran City, Bohol','09096789333','90','13492756071.jpg','','1349275714',1),
 (5,'Jessa','Calimpusan','Dano','missy@yahoo.com','Sikatuna','09092795226','50','13492757811.jpg','','1349275828',1),
 (6,'Kent Joy ','','Famin','kent@yahoo.com','Tagbilaran City','09081223567','70','13492759011.jpg','','1349275956',1);
/*!40000 ALTER TABLE `tbx101_customer` ENABLE KEYS */;


--
-- Definition of table `tbx101_expiry_product`
--

DROP TABLE IF EXISTS `tbx101_expiry_product`;
CREATE TABLE `tbx101_expiry_product` (
  `expiry_product_id` int(10) unsigned NOT NULL auto_increment,
  `product_id` varchar(45) NOT NULL,
  `date_replenish` varchar(45) NOT NULL,
  `date_expire` varchar(45) NOT NULL,
  PRIMARY KEY  (`expiry_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_expiry_product`
--

/*!40000 ALTER TABLE `tbx101_expiry_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbx101_expiry_product` ENABLE KEYS */;


--
-- Definition of table `tbx101_logs_login`
--

DROP TABLE IF EXISTS `tbx101_logs_login`;
CREATE TABLE `tbx101_logs_login` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `datetime` datetime NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbx101_logs_login`
--

/*!40000 ALTER TABLE `tbx101_logs_login` DISABLE KEYS */;
INSERT INTO `tbx101_logs_login` (`id`,`username`,`datetime`,`ip_address`,`status`) VALUES 
 (1,'admin','2012-10-03 14:13:07','::1','ok'),
 (2,'admin','2012-10-03 14:17:00','::1','ok'),
 (3,'admin','2012-10-03 15:16:27','::1','ok'),
 (4,'admin','2012-10-04 08:09:10','::1','ok'),
 (5,'admin','2012-10-04 08:47:02','::1','ok'),
 (6,'admin','2012-10-04 11:11:09','127.0.0.1','ok'),
 (7,'sadas','2012-10-10 21:15:55','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (8,'sadas','2012-10-10 21:15:55','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (9,'sadas','2012-10-10 21:17:00','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (10,'sadas','2012-10-10 21:17:00','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (11,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (12,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (13,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (14,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (15,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (16,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (17,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (18,'sadas','2012-10-10 21:17:01','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (19,'sadas','2012-10-10 21:18:24','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (20,'sadas','2012-10-10 21:18:24','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (21,'asdas','2012-10-10 21:22:07','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (22,'asdas','2012-10-10 21:22:07','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (23,'asdas','2012-10-10 21:22:11','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (24,'asdas','2012-10-10 21:22:11','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (25,'asdas','2012-10-10 21:22:14','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (26,'asdas','2012-10-10 21:22:14','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (27,'admin','2012-10-10 21:35:22','127.0.0.1','ok'),
 (28,'sadas','2012-10-10 21:40:17','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (29,'sadas','2012-10-10 21:40:17','127.0.0.1','Username and Password Doesn\'t Exists!'),
 (30,'admin','2012-10-10 21:40:27','127.0.0.1','Incorrect Password'),
 (31,'admin','2012-10-10 21:40:27','127.0.0.1','Incorrect Password'),
 (32,'admin','2012-10-10 21:40:53','127.0.0.1','Incorrect Password'),
 (33,'admin','2012-10-10 21:40:53','127.0.0.1','Incorrect Password'),
 (34,'admin','2012-10-10 21:44:34','127.0.0.1','ok'),
 (35,'admin','2012-10-10 21:45:15','127.0.0.1','ok'),
 (36,'admin','2012-10-10 21:46:44','127.0.0.1','ok'),
 (37,'admin','2012-10-10 23:36:15','127.0.0.1','ok'),
 (38,'admin','2012-10-11 02:53:15','127.0.0.1','ok'),
 (39,'admin','2012-10-11 02:56:42','127.0.0.1','ok'),
 (40,'admin','2012-10-11 12:10:37','127.0.0.1','ok'),
 (41,'admin','2012-10-15 23:16:50','127.0.0.1','ok'),
 (42,'admin','2012-10-15 23:17:06','127.0.0.1','Incorrect Password'),
 (43,'admin','2012-10-15 23:17:06','127.0.0.1','Incorrect Password'),
 (44,'admin','2012-10-15 23:17:14','127.0.0.1','ok'),
 (45,'gerome','2012-10-17 23:18:53','127.0.0.1','ok'),
 (46,'admin','2012-10-17 23:19:51','127.0.0.1','ok'),
 (47,'admin','2012-10-18 00:20:45','127.0.0.1','ok'),
 (48,'admin','2012-10-21 14:47:05','127.0.0.1','ok'),
 (49,'admin','2012-10-27 20:13:55','127.0.0.1','ok'),
 (50,'admin','2012-10-29 10:29:27','127.0.0.1','ok');
/*!40000 ALTER TABLE `tbx101_logs_login` ENABLE KEYS */;


--
-- Definition of table `tbx101_order`
--

DROP TABLE IF EXISTS `tbx101_order`;
CREATE TABLE `tbx101_order` (
  `order_id` int(10) unsigned NOT NULL auto_increment,
  `branch_id_from` int(10) unsigned NOT NULL,
  `stock_in_state` smallint(1) unsigned default '0',
  PRIMARY KEY  (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 PACK_KEYS=1;

--
-- Dumping data for table `tbx101_order`
--

/*!40000 ALTER TABLE `tbx101_order` DISABLE KEYS */;
INSERT INTO `tbx101_order` (`order_id`,`branch_id_from`,`stock_in_state`) VALUES 
 (1,3,1),
 (2,3,1),
 (3,3,1),
 (4,3,1),
 (5,3,1),
 (6,3,1),
 (7,3,0);
/*!40000 ALTER TABLE `tbx101_order` ENABLE KEYS */;


--
-- Definition of table `tbx101_order_msg`
--

DROP TABLE IF EXISTS `tbx101_order_msg`;
CREATE TABLE `tbx101_order_msg` (
  `msg_id` int(10) unsigned NOT NULL auto_increment,
  `order_id` int(10) unsigned NOT NULL,
  `subject` text NOT NULL,
  `type` varchar(45) NOT NULL COMMENT 'Re-Order , Cancellation',
  `state` int(10) unsigned default '0' COMMENT '0 = Unread , 1 Read',
  `date_time` varchar(45) NOT NULL,
  `user_id_from` int(10) unsigned NOT NULL,
  `read_on` varchar(45) default NULL,
  `time` varchar(45) NOT NULL,
  `archive` smallint(1) unsigned default '0',
  PRIMARY KEY  (`msg_id`),
  KEY `FK_tbx101_order_msg_1` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_order_msg`
--

/*!40000 ALTER TABLE `tbx101_order_msg` DISABLE KEYS */;
INSERT INTO `tbx101_order_msg` (`msg_id`,`order_id`,`subject`,`type`,`state`,`date_time`,`user_id_from`,`read_on`,`time`,`archive`) VALUES 
 (1,1,'Re-Order Products in Sikatuna Bakeshop','Re-Order',1,'2012-12-08 00:30:43',8,'1351477807','1354897843',0),
 (2,2,'Re-Order Products in Sikatuna Bakeshop','Re-Order',0,'2012-12-08 00:31:55',8,NULL,'1354897915',0),
 (3,3,'Cancellation of Order Transaction in Sikatuna Bakeshop','Cancellation',0,'2012-12-08 00:32:43',8,NULL,'1354897963',0),
 (4,4,'Re-Order Products in Sikatuna Bakeshop','Re-Order',0,'2012-12-08 00:48:11',8,NULL,'1354898892',0),
 (5,5,'Re-Order Products in Sikatuna Bakeshop','Re-Order',0,'2012-12-09 00:54:06',8,NULL,'1354985647',0),
 (6,6,'Cancellation of Order Transaction in Sikatuna Bakeshop','Cancellation',0,'2012-12-09 00:55:39',8,NULL,'1354985740',0),
 (7,7,'Re-Order Products in Sikatuna Bakeshop','Re-Order',0,'2012-12-09 01:03:33',8,NULL,'1354986213',0);
/*!40000 ALTER TABLE `tbx101_order_msg` ENABLE KEYS */;


--
-- Definition of table `tbx101_order_msg_user_read`
--

DROP TABLE IF EXISTS `tbx101_order_msg_user_read`;
CREATE TABLE `tbx101_order_msg_user_read` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `account_id` int(10) unsigned NOT NULL,
  `msg_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_order_msg_user_read`
--

/*!40000 ALTER TABLE `tbx101_order_msg_user_read` DISABLE KEYS */;
INSERT INTO `tbx101_order_msg_user_read` (`id`,`account_id`,`msg_id`) VALUES 
 (1,1,1);
/*!40000 ALTER TABLE `tbx101_order_msg_user_read` ENABLE KEYS */;


--
-- Definition of table `tbx101_order_products`
--

DROP TABLE IF EXISTS `tbx101_order_products`;
CREATE TABLE `tbx101_order_products` (
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity_ordered` varchar(45) NOT NULL,
  `stock_in` smallint(1) unsigned default '0',
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_order_products`
--

/*!40000 ALTER TABLE `tbx101_order_products` DISABLE KEYS */;
INSERT INTO `tbx101_order_products` (`order_id`,`product_id`,`quantity_ordered`,`stock_in`,`id`) VALUES 
 (1,3,'600',1,1),
 (1,4,'500',1,2),
 (2,4,'1',1,3),
 (3,4,'4',1,4),
 (4,4,'1',1,5),
 (5,1,'500',1,6),
 (6,1,'1',0,7),
 (7,4,'1',0,8);
/*!40000 ALTER TABLE `tbx101_order_products` ENABLE KEYS */;


--
-- Definition of table `tbx101_package`
--

DROP TABLE IF EXISTS `tbx101_package`;
CREATE TABLE `tbx101_package` (
  `package_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `discount` varchar(45) default '0',
  PRIMARY KEY  (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_package`
--

/*!40000 ALTER TABLE `tbx101_package` DISABLE KEYS */;
INSERT INTO `tbx101_package` (`package_id`,`name`,`quantity`,`discount`) VALUES 
 (1,'Tray',24,'0.05'),
 (3,'Dozen',12,'0.03'),
 (4,'Pack',6,'0');
/*!40000 ALTER TABLE `tbx101_package` ENABLE KEYS */;


--
-- Definition of table `tbx101_permission`
--

DROP TABLE IF EXISTS `tbx101_permission`;
CREATE TABLE `tbx101_permission` (
  `permission_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  `description` varchar(45) NOT NULL,
  `class` varchar(45) default NULL,
  `parent` varchar(45) default NULL,
  PRIMARY KEY  (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_permission`
--

/*!40000 ALTER TABLE `tbx101_permission` DISABLE KEYS */;
INSERT INTO `tbx101_permission` (`permission_id`,`name`,`description`,`class`,`parent`) VALUES 
 (1,'managed_account','Can Manage User  Accounts','managed_account','server'),
 (2,'managed_branch_type','Can Manage Branch type','managed_branch_type','server'),
 (3,'managed_branch','Can Manage Branch','managed_branch','server'),
 (4,'managed_customer','Can Manage Customers','managed_customer','server'),
 (5,'managed_product_line','Can Manage Product Line','managed_product_line','server'),
 (6,'managed_products','Can Manage Products','managed_products','server'),
 (7,'managed_inquiry','Can Manage Inquiry','managed_inquiry','server'),
 (8,'managed_stock_in','Can Manipulate Replenish Stock','managed_stock_in','server'),
 (9,'managed_walk_in_purchases','Can Manipulate Walk-in/Dealer Purchases','managed_walk_in_purchases','client'),
 (10,'managed_stock_in_c','Can Manipulate Stock-In ','managed_stock_in_c','client'),
 (12,'managed_dashboard','Dashboard','managed_dashboard',''),
 (13,'managed_profile','Managed Profile','managed_profile',NULL),
 (14,'managed_reports','Can view reports','managed_reports','server'),
 (16,'managed_package','Can Manage Package','managed_package','server'),
 (17,'set_product_package','Can Set Product Package','set_product_package','server'),
 (18,'view_order_notification','Can view order notification','view_order_notification','server'),
 (19,'manipulate_order','Can Manipulate Order','manipulate_order','client'),
 (20,'manage_stock_adjustment','Can Manage Stock Adjustment','manage_stock_adjustment','client'),
 (21,'view_inquiry','Can View Inquiry','view_inquiry','client'),
 (22,'view_reports','Can View Reports','view_reports','client'),
 (23,'managed_pricing_scheme','Can Manipulate Pricing Scheme','managed_pricing_scheme','server'),
 (24,'manipulate_discount','Can Manipulate Discount','manipulate_discount','client'),
 (25,'manipulate_exchange','Can Manipulate Exchange','manipulate_exchange','client');
/*!40000 ALTER TABLE `tbx101_permission` ENABLE KEYS */;


--
-- Definition of table `tbx101_product`
--

DROP TABLE IF EXISTS `tbx101_product`;
CREATE TABLE `tbx101_product` (
  `ProductId` int(10) unsigned NOT NULL auto_increment,
  `ProductName` varchar(45) NOT NULL,
  `Description` varchar(45) default NULL,
  `ProductLineId` int(10) unsigned NOT NULL,
  `ProductPrice` varchar(45) default '0.00',
  `Quantity` int(10) unsigned default '0',
  `Ceiling` int(10) unsigned NOT NULL,
  `Flooring` int(10) unsigned NOT NULL,
  `ReorderPoint` int(10) unsigned NOT NULL,
  `ProductUnit` varchar(45) default NULL,
  `archive` smallint(1) unsigned default '0',
  `expiration_days` int(10) unsigned default '0' COMMENT 'number of days',
  `vat` varchar(3) default '0',
  `vat_s` varchar(1) default 'N',
  PRIMARY KEY  (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_product`
--

/*!40000 ALTER TABLE `tbx101_product` DISABLE KEYS */;
INSERT INTO `tbx101_product` (`ProductId`,`ProductName`,`Description`,`ProductLineId`,`ProductPrice`,`Quantity`,`Ceiling`,`Flooring`,`ReorderPoint`,`ProductUnit`,`archive`,`expiration_days`,`vat`,`vat_s`) VALUES 
 (1,'Egg Small','',1,'2.00',500,500,100,200,'',0,0,'0','N'),
 (2,'Egg Large','',1,'6.00',299,600,100,200,'',0,0,'12','V'),
 (3,'Egg X-large','',1,'8.00',101,600,100,200,'',0,0,'12','V'),
 (4,'Egg 0s2','',1,'9.00',196,500,100,200,'',0,0,'0','N'),
 (5,'Egg Meduim','',1,'7.00',701,500,100,200,'',0,0,'10','V'),
 (6,'Egg Os3','',1,'9.00',460,500,100,200,'',0,5,'0','N'),
 (10,'Monay','',2,'5.00',150,50,5,10,'',0,0,'0','N'),
 (11,'Star','',2,'1.00',250,50,10,20,'',0,0,'0','N'),
 (12,'Pandesal','',2,'2.00',26,60,10,20,'',0,0,'10','V'),
 (13,'Granada','',2,'5.00',101,40,5,10,'',0,0,'12','V'),
 (14,'Cheese Bread','',2,'2.00',140,60,10,20,'',0,0,'12','V'),
 (15,'Bahog2','',2,'1.37',250,50,10,20,'',0,0,'0','N'),
 (16,'Slice Bread','',2,'10.00',260,40,10,20,'',0,0,'0','N'),
 (17,'Mongo Bread','',2,'5.00',1848,60,10,20,'',0,10,'0','N'),
 (22,'We','',1,'0.00',701,4,1,2,'',0,0,'0','N'),
 (23,'Wee','',1,'0.00',701,4,1,2,'',0,0,'0','N'),
 (24,'Vatable Egg','This Is An Example Of Vatable Egg.',1,'0.00',701,100,10,20,'',0,100,'1','V'),
 (25,'Another Example Of Vatable Egg','Another Example Of Vatable Egg',1,'13.50',100,100,10,50,'',0,50,'10','V');
/*!40000 ALTER TABLE `tbx101_product` ENABLE KEYS */;


--
-- Definition of table `tbx101_product_line`
--

DROP TABLE IF EXISTS `tbx101_product_line`;
CREATE TABLE `tbx101_product_line` (
  `ProductLineId` int(10) unsigned NOT NULL auto_increment,
  `ProductLineName` varchar(100) NOT NULL,
  `Description` text,
  PRIMARY KEY  (`ProductLineId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_product_line`
--

/*!40000 ALTER TABLE `tbx101_product_line` DISABLE KEYS */;
INSERT INTO `tbx101_product_line` (`ProductLineId`,`ProductLineName`,`Description`) VALUES 
 (1,'Egg',''),
 (2,'Bread','');
/*!40000 ALTER TABLE `tbx101_product_line` ENABLE KEYS */;


--
-- Definition of table `tbx101_product_package`
--

DROP TABLE IF EXISTS `tbx101_product_package`;
CREATE TABLE `tbx101_product_package` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `package_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_product_package`
--

/*!40000 ALTER TABLE `tbx101_product_package` DISABLE KEYS */;
INSERT INTO `tbx101_product_package` (`id`,`package_id`,`product_id`) VALUES 
 (11,1,3),
 (12,3,3),
 (13,4,3),
 (14,1,4),
 (15,3,4),
 (16,4,4),
 (17,1,5),
 (18,3,5),
 (19,4,5),
 (24,1,1),
 (25,3,1),
 (26,4,1),
 (27,1,2),
 (28,3,2),
 (29,4,2);
/*!40000 ALTER TABLE `tbx101_product_package` ENABLE KEYS */;


--
-- Definition of table `tbx101_productsale`
--

DROP TABLE IF EXISTS `tbx101_productsale`;
CREATE TABLE `tbx101_productsale` (
  `Id` int(10) unsigned NOT NULL auto_increment,
  `ProductName` varchar(45) NOT NULL,
  `Quantity` varchar(45) NOT NULL,
  `Price` varchar(45) NOT NULL,
  `Amount` varchar(45) NOT NULL,
  `SaleId` int(10) unsigned NOT NULL,
  `ProductLineId` int(10) unsigned NOT NULL default '0',
  `return_date` datetime default NULL,
  `package` varchar(45) default NULL,
  `branch_product_id` int(10) unsigned NOT NULL,
  `expiry_date` datetime default NULL,
  PRIMARY KEY  (`Id`,`SaleId`,`ProductLineId`),
  KEY `FK_tbx101_productsale_1` (`SaleId`),
  CONSTRAINT `FK_tbx101_productsale_1` FOREIGN KEY (`SaleId`) REFERENCES `tbx101_sale` (`SaleId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_productsale`
--

/*!40000 ALTER TABLE `tbx101_productsale` DISABLE KEYS */;
INSERT INTO `tbx101_productsale` (`Id`,`ProductName`,`Quantity`,`Price`,`Amount`,`SaleId`,`ProductLineId`,`return_date`,`package`,`branch_product_id`,`expiry_date`) VALUES 
 (2,'Egg X-large','2','8.96','17.92',1,1,NULL,'Pieces',1,'2012-12-08 00:31:00'),
 (3,'Egg X-large','1','8.00','8.00',1,0,NULL,NULL,1,'2012-12-08 00:00:00'),
 (4,'Egg 0s2','1','9.00','9.00',1,0,NULL,NULL,2,'2012-12-08 00:00:00'),
 (5,'Egg 0s2','1','9.00','9.00',1,0,NULL,NULL,2,'2012-12-08 00:00:00'),
 (6,'Egg 0s2','2','9.00','18',1,0,NULL,NULL,2,'2012-12-08 00:00:00'),
 (7,'Egg 0s2','2','9.00','18',1,0,NULL,'Pieces',2,'2012-12-08 00:00:00'),
 (8,'Egg 0s2','1','9.00','9.00',1,0,NULL,'Pieces',2,'2012-12-08 00:00:00'),
 (9,'Egg 0s2','1','9.00','9.00',1,0,NULL,'Pieces',2,'2012-12-08 00:00:00');
/*!40000 ALTER TABLE `tbx101_productsale` ENABLE KEYS */;


--
-- Definition of table `tbx101_sale`
--

DROP TABLE IF EXISTS `tbx101_sale`;
CREATE TABLE `tbx101_sale` (
  `SaleId` int(10) unsigned NOT NULL auto_increment,
  `Date` varchar(45) default NULL,
  `PaidAmount` varchar(45) default NULL,
  `Cash` varchar(45) default NULL,
  `discount` varchar(45) default '0',
  `Net` varchar(45) default '0',
  `branch_id` int(10) unsigned NOT NULL,
  `PurchaseCode` varchar(100) NOT NULL,
  PRIMARY KEY  (`SaleId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_sale`
--

/*!40000 ALTER TABLE `tbx101_sale` DISABLE KEYS */;
INSERT INTO `tbx101_sale` (`SaleId`,`Date`,`PaidAmount`,`Cash`,`discount`,`Net`,`branch_id`,`PurchaseCode`) VALUES 
 (1,'2012-10-26 05:37:15','17.92','20.00','0.00','0',3,'000000001');
/*!40000 ALTER TABLE `tbx101_sale` ENABLE KEYS */;


--
-- Definition of table `tbx101_sessions`
--

DROP TABLE IF EXISTS `tbx101_sessions`;
CREATE TABLE `tbx101_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_sessions`
--

/*!40000 ALTER TABLE `tbx101_sessions` DISABLE KEYS */;
INSERT INTO `tbx101_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES 
 ('0fde7c2c2cc56b94d188b0e3fea9c23b','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351342231,''),
 ('15b956898ceb578f8c312a13751c60d4','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351342840,''),
 ('161984fc6769ab6ea086a2e843a57aea','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478072,''),
 ('18ddf04bfd578735080b89e68f73d7d2','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478073,''),
 ('197e6879dc5732dbef24c0112b54580a','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478069,''),
 ('1a8a25e6aa37a85eb14bae8eb60e5196','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478070,''),
 ('2624eb11dbb9bc2aef2b175b2da473c8','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478068,''),
 ('2a7ff97a86b5dd97a3456bbd178b08e1','169.254.235.9','Mozilla/5.0 (Windows NT 6.1; rv:15.0) Gecko/20100101 Firefox/15.0.1',1351073253,''),
 ('3006d44e5b45bafb663a525f6533580c','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351341516,''),
 ('31d8d656141257e6b608d2d5e9ee5da3','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478071,''),
 ('3726186622a0b624bdddb2400574e868','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351341126,''),
 ('39290bdc51726115f2e034b811079eb7','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478076,''),
 ('4e1e7573b311c161df6ccf52624ff8ee','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478073,''),
 ('68f4ffff16d9fe5101de104ed2e98055','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351340021,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:9:\"logged_in\";b:1;}'),
 ('756e39764b47f73c24d990e13ddc10d2','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351340777,''),
 ('77339d0340ed46fd2d139f1da4831776','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478072,''),
 ('7e647ccdd9e0f9ea740c0471cf81abac','127.0.0.1','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1',1350802014,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:9:\"logged_in\";b:1;}'),
 ('8c9af653bfcec7662daf4b35fdad5740','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478075,''),
 ('8daaa078fc67341581df26ebe0c0f8dd','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351342536,''),
 ('998c29d2b3dbb97368c0e9f34051c010','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351342847,''),
 ('9d5175243dbac3695833d610853863ef','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351477757,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:9:\"logged_in\";b:1;}'),
 ('beef56025755455a26a247a187ef7ca9','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478070,''),
 ('c1e0e631265fd62cacbf15aa637bfcce','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1350923814,'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:9:\"logged_in\";b:1;}'),
 ('d296eb15810475e4ee1633046ee63e63','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351340463,''),
 ('da89541a0b793ef907c77ccdfb03f5cb','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351341857,''),
 ('e09bc19ab96af313e0d7121d4340909e','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478068,''),
 ('e9e8b09bc7926304177045853983afc1','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478077,''),
 ('ef8bd6b338267b2b9bbbb3bcff95066f','127.0.0.1','Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0',1351478072,'');
/*!40000 ALTER TABLE `tbx101_sessions` ENABLE KEYS */;


--
-- Definition of table `tbx101_stock_in`
--

DROP TABLE IF EXISTS `tbx101_stock_in`;
CREATE TABLE `tbx101_stock_in` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty_stock_in` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_stock_in`
--

/*!40000 ALTER TABLE `tbx101_stock_in` DISABLE KEYS */;
INSERT INTO `tbx101_stock_in` (`id`,`date`,`branch_id`,`product_id`,`qty_stock_in`) VALUES 
 (1,'2012-12-08 00:31:01',3,3,600),
 (2,'2012-12-08 00:31:07',3,4,500),
 (3,'2012-12-08 00:51:53',3,4,4),
 (4,'2012-12-09 00:52:28',3,4,1);
/*!40000 ALTER TABLE `tbx101_stock_in` ENABLE KEYS */;


--
-- Definition of table `tbx101_stock_out`
--

DROP TABLE IF EXISTS `tbx101_stock_out`;
CREATE TABLE `tbx101_stock_out` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty_stock_out` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_stock_out`
--

/*!40000 ALTER TABLE `tbx101_stock_out` DISABLE KEYS */;
INSERT INTO `tbx101_stock_out` (`id`,`date`,`branch_id`,`product_id`,`qty_stock_out`) VALUES 
 (1,'2012-12-10 01:15:33',3,4,1),
 (2,'2012-12-10 01:15:33',3,4,1),
 (3,'2012-12-10 02:15:05',3,4,2),
 (4,'2012-12-10 02:15:05',3,4,1),
 (5,'2012-12-10 02:25:28',3,4,1),
 (6,'2012-12-10 02:29:01',3,4,1),
 (7,'2012-12-10 02:29:01',3,4,2),
 (8,'2012-12-11 20:50:03',3,3,1),
 (9,'2012-10-25 23:20:10',3,3,1),
 (10,'2012-10-26 00:37:25',3,4,1),
 (11,'2012-10-26 00:39:59',3,4,2),
 (12,'2012-10-26 00:43:00',3,4,1),
 (13,'2012-10-26 00:44:08',3,4,1),
 (14,'2012-10-26 01:24:53',3,3,2),
 (15,'2012-10-26 01:24:53',3,4,3),
 (16,'2012-10-26 05:20:03',3,3,2),
 (17,'2012-10-26 05:37:15',3,3,2),
 (18,'2012-10-26 05:42:46',3,4,1),
 (19,'2012-10-26 05:51:17',3,4,2),
 (20,'2012-10-26 05:53:06',3,4,2),
 (21,'2012-10-26 05:54:52',3,4,1),
 (22,'2012-10-26 05:56:59',3,4,1);
/*!40000 ALTER TABLE `tbx101_stock_out` ENABLE KEYS */;


--
-- Definition of table `tbx101_user_access`
--

DROP TABLE IF EXISTS `tbx101_user_access`;
CREATE TABLE `tbx101_user_access` (
  `user_type_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `access_id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`access_id`,`user_type_id`),
  KEY `FK_tbx101_user_access_1` (`user_type_id`),
  CONSTRAINT `FK_tbx101_user_access_1` FOREIGN KEY (`user_type_id`) REFERENCES `tbx101_usertype` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `tbx101_user_access`
--

/*!40000 ALTER TABLE `tbx101_user_access` DISABLE KEYS */;
INSERT INTO `tbx101_user_access` (`user_type_id`,`permission_id`,`access_id`) VALUES 
 (1,1,1),
 (4,20,9),
 (4,19,10),
 (4,10,11),
 (4,9,12),
 (4,21,13),
 (4,22,14),
 (5,3,15),
 (5,2,16),
 (5,4,17),
 (5,7,18),
 (5,16,19),
 (5,5,20),
 (5,6,21),
 (5,1,22),
 (5,23,23),
 (5,8,24),
 (5,17,25),
 (5,18,26),
 (5,14,27),
 (5,20,28),
 (5,19,29),
 (5,10,30),
 (5,9,31),
 (5,21,32),
 (5,22,33),
 (3,20,34),
 (3,24,35),
 (3,25,36),
 (3,19,37),
 (3,10,38),
 (3,9,39),
 (3,21,40),
 (3,22,41),
 (2,9,42),
 (2,21,43);
/*!40000 ALTER TABLE `tbx101_user_access` ENABLE KEYS */;


--
-- Definition of table `tbx101_usertype`
--

DROP TABLE IF EXISTS `tbx101_usertype`;
CREATE TABLE `tbx101_usertype` (
  `user_type_id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbx101_usertype`
--

/*!40000 ALTER TABLE `tbx101_usertype` DISABLE KEYS */;
INSERT INTO `tbx101_usertype` (`user_type_id`,`name`) VALUES 
 (1,'Super Administrator'),
 (2,'Cashier'),
 (3,'Manager'),
 (4,'Assistant Manager'),
 (5,'Professional Hacker');
/*!40000 ALTER TABLE `tbx101_usertype` ENABLE KEYS */;


--
-- Definition of table `temporarytable`
--

DROP TABLE IF EXISTS `temporarytable`;
CREATE TABLE `temporarytable` (
  `ProductId` int(10) unsigned NOT NULL default '0',
  `Description` varchar(45) default NULL,
  `Price` varchar(45) default NULL,
  `Quantity` varchar(45) default NULL,
  `Amount` varchar(45) default NULL,
  `ProductLineId` int(10) unsigned default NULL,
  `ProductName` varchar(45) default NULL,
  `package` varchar(45) default NULL,
  `id` int(10) unsigned default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temporarytable`
--

/*!40000 ALTER TABLE `temporarytable` DISABLE KEYS */;
INSERT INTO `temporarytable` (`ProductId`,`Description`,`Price`,`Quantity`,`Amount`,`ProductLineId`,`ProductName`,`package`,`id`) VALUES 
 (4,'Egg 0s2','9.00','1','9.00',1,NULL,'Pieces',2);
/*!40000 ALTER TABLE `temporarytable` ENABLE KEYS */;


--
-- Definition of table `thelp`
--

DROP TABLE IF EXISTS `thelp`;
CREATE TABLE `thelp` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Content` varchar(45) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thelp`
--

/*!40000 ALTER TABLE `thelp` DISABLE KEYS */;
INSERT INTO `thelp` (`id`,`Content`,`text`) VALUES 
 (1,'Content','asdflsjdal asdlfjlw asdfjlw aasdfjlkw asdjflw xjklsadf w saldkjfoiw slfjasoi lwekj sdalfjwo zlxkj sdflsawae lxzkjls lsdfhlas sdlfwoisdlfl afwesdf'),
 (2,'Text','asdfsadfdsafasdfdsa asdfasdfasd sadfasdfasdfsadfa asdfsdaf');
/*!40000 ALTER TABLE `thelp` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
