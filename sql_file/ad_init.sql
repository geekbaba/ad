# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.11)
# Database: ad
# Generation Time: 2017-12-17 02:11:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ad_activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_activity`;

CREATE TABLE `ad_activity` (
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '活动ID',
  `activity_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '活动名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `activity_strategy` text COMMENT '活动策略',
  `activity_attribute` text COMMENT '活动属性',
  `skin_configure_code` char(4) DEFAULT NULL COMMENT '皮肤配置',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_activity` WRITE;
/*!40000 ALTER TABLE `ad_activity` DISABLE KEYS */;

INSERT INTO `ad_activity` (`activity_id`, `activity_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `activity_strategy`, `activity_attribute`, `skin_configure_code`)
VALUES
	(1,'大转盘',1,1,1,'2017-12-02 08:04:01','2017-12-02 08:09:05',NULL,NULL,NULL,'0001'),
	(2,'刮刮卡',1,1,0,'2017-12-02 08:06:20','2017-12-02 08:06:20',NULL,NULL,NULL,'0002'),
	(3,'打地鼠',0,1,0,'2017-12-02 08:08:55','2017-12-02 08:08:55',NULL,NULL,NULL,'0003');

/*!40000 ALTER TABLE `ad_activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_activity_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_activity_product`;

CREATE TABLE `ad_activity_product` (
  `activity_product_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '活动产品ID',
  `activity_product_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '活动产品名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `activity_product_strategy` text COMMENT '活动产品策略',
  `activity_product_attribute` text COMMENT '活动产品属性',
  PRIMARY KEY (`activity_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_activity_product` WRITE;
/*!40000 ALTER TABLE `ad_activity_product` DISABLE KEYS */;

INSERT INTO `ad_activity_product` (`activity_product_id`, `activity_product_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `activity_product_strategy`, `activity_product_attribute`)
VALUES
	(1,'流量免费送',1,1,1,'2017-12-03 12:06:07','2017-12-16 11:37:47',NULL,NULL,'{\"description\":\"\\u6d41\\u91cf\\u514d\\u8d39\\u9001\",\"button_name\":\"\\u9886\\u53d6\\u514d\\u8d39\\u6d41\\u91cf\",\"target_url\":\"http:\\/\\/192.168.21.90\\/t\\/026ed22fc1\",\"validity_date\":\"2017-12-30\",\"product_image\":\"[Attach]:93b6deed95aca08ab22dae75e28592b1\",\"product_list_image\":\"[Attach]:27a989a1aeab2b96cedd2b6c4a7cba2f\"}'),
	(2,'免费装修',1,1,1,'2017-12-04 16:15:08','2017-12-16 11:37:47',NULL,NULL,'{\"description\":\"asd\",\"button_name\":\"\\u514d\\u8d39\\u88c5\\u4fee\",\"target_url\":\"http:\\/\\/192.168.21.90\\/t\\/5f644e4373\",\"validity_date\":\"2017-12-30\",\"product_image\":\"[Attach]:f93b8bbbac89ea22bac0bf188ba49a61\",\"product_list_image\":\"[Attach]:ad8b68a55505a09ac7578f32418904b3\"}');

/*!40000 ALTER TABLE `ad_activity_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_activity_skin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_activity_skin`;

CREATE TABLE `ad_activity_skin` (
  `activity_skin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '活动皮肤ID',
  `activity_skin_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '活动皮肤名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '皮肤状态',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `activity_skin_strategy` text COMMENT '活动皮肤策略',
  `activity_skin_attribute` text COMMENT '活动皮肤属性',
  `activity_id` int(11) DEFAULT NULL COMMENT '活动ID',
  PRIMARY KEY (`activity_skin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_activity_skin` WRITE;
/*!40000 ALTER TABLE `ad_activity_skin` DISABLE KEYS */;

INSERT INTO `ad_activity_skin` (`activity_skin_id`, `activity_skin_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `activity_skin_strategy`, `activity_skin_attribute`, `activity_id`)
VALUES
	(1,'电玩小王子',1,1,1,'2017-12-02 09:01:04','2017-12-16 13:36:42',NULL,NULL,'{\"bg_color\":\"#fecc59\",\"main_background_image\":\"[Attach]:683529bb1b0fedc340f2ebce47468395\"}',1),
	(2,'卡卡西',1,1,0,'2017-12-02 09:39:12','2017-12-02 09:39:12',NULL,NULL,NULL,2),
	(3,'A',1,1,1,'2017-12-02 16:59:08','2017-12-16 13:37:10',NULL,NULL,'{\"bg_color\":\"#ffa603\",\"main_background_image\":\"[Attach]:80ecd7abc0579af356a6ca6fb24ec486\",\"banner_image\":\"[Attach]:29bdbc822df2e6c13dcf4afe6913525f\"}',1),
	(4,'蓝海传说',1,1,1,'2017-12-16 13:26:54','2017-12-16 13:37:24',NULL,NULL,'{\"bg_color\":\"#3084ff\",\"main_background_image\":\"[Attach]:70b48809e0305276c9defa82d51fb48c\"}',1),
	(5,'蔚蓝色',1,1,1,'2017-12-16 13:27:22','2017-12-16 13:37:36',NULL,NULL,'{\"bg_color\":\"#dbf6ff\",\"main_background_image\":\"[Attach]:4db87140662bd68076ef786f7163cedc\"}',1);

/*!40000 ALTER TABLE `ad_activity_skin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_advertising
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_advertising`;

CREATE TABLE `ad_advertising` (
  `advertising_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `advertising_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `advertising_strategy` text COMMENT '广告策略',
  `advertising_attribute` text COMMENT '广告属性',
  `advertising_type_id` int(11) DEFAULT NULL COMMENT '广告类型',
  `width_height` char(6) DEFAULT NULL COMMENT '广告尺寸',
  PRIMARY KEY (`advertising_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_advertising` WRITE;
/*!40000 ALTER TABLE `ad_advertising` DISABLE KEYS */;

INSERT INTO `ad_advertising` (`advertising_id`, `advertising_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `advertising_strategy`, `advertising_attribute`, `advertising_type_id`, `width_height`)
VALUES
	(1,'广澳2',0,1,1,'2017-11-25 17:10:32','2017-11-30 16:06:22',NULL,'{}','{\"width_height\":\"0F00F0\",\"target_url\":\"asd\"}',2,NULL),
	(2,'大光一点',1,1,1,'2017-11-21 19:10:32',NULL,NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"asd\",\"image\":\"[Attach]:28c8edde3d61a0411511d3b1866f0636\"}',1,NULL),
	(3,'小心一点',1,1,1,'2017-11-25 17:10:32',NULL,NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"asd\",\"image\":\"[Attach]:28c8edde3d61a0411511d3b1866f0636\"}',2,NULL),
	(4,'WinerSwiget',0,1,0,'2017-11-25 19:10:32','2017-11-25 17:10:32',NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"asd\",\"image\":\"[Attach]:28c8edde3d61a0411511d3b1866f0636\"}',1,NULL),
	(5,'TT',1,1,1,'2017-11-30 14:27:17','2017-12-03 05:33:16',NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"http:\\/\\/ada.sp\"}',1,'0F00F0'),
	(6,'asdas',0,1,0,'2017-11-30 14:30:21','2017-11-30 14:30:21',NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"asda\",\"image\":{}}',1,NULL),
	(7,'asdas',0,1,0,'2017-11-30 14:31:04','2017-11-30 14:31:04',NULL,NULL,'{\"width_height\":\"000000\",\"target_url\":\"asdsa\",\"image\":{}}',2,NULL),
	(8,'asd',0,1,0,'2017-11-30 14:33:07','2017-11-30 14:33:07',NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"asd\",\"image\":{}}',2,NULL),
	(9,'asd',0,1,0,'2017-11-30 14:50:16','2017-11-30 14:50:16',NULL,NULL,'{\"width_height\":\"0F00F0\",\"target_url\":\"asd\",\"image\":\"[Attach]:28c8edde3d61a0411511d3b1866f0636\"}',1,NULL),
	(10,'预选广告',1,1,1,'2017-12-03 08:17:11','2017-12-16 17:39:12',NULL,NULL,'{\"image\":\"[Attach]:7e51746feafa7f2621f71943da8f603c\",\"width_height\":\"01E01E\",\"target_url\":\"http:\\/\\/192.168.21.90\\/t\\/2f8900f2e4\"}',2,'01E01E');

/*!40000 ALTER TABLE `ad_advertising` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_advertising_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_advertising_type`;

CREATE TABLE `ad_advertising_type` (
  `advertising_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `advertising_type_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告名称',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `status` tinyint(2) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`advertising_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_advertising_type` WRITE;
/*!40000 ALTER TABLE `ad_advertising_type` DISABLE KEYS */;

INSERT INTO `ad_advertising_type` (`advertising_type_id`, `advertising_type_name`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `status`)
VALUES
	(1,'APP浮标',1,1,'2017-11-25 19:10:32',NULL,NULL,1),
	(2,'WAP浮标',1,1,'2017-11-25 19:10:32',NULL,NULL,1),
	(3,'WEB浮标',1,1,'2017-11-25 19:10:32',NULL,NULL,1);

/*!40000 ALTER TABLE `ad_advertising_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_attach
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_attach`;

CREATE TABLE `ad_attach` (
  `attach_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件ID',
  `attach_mime_type` varchar(20) NOT NULL DEFAULT '''''' COMMENT '资源类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `attach_relative_src` varchar(500) DEFAULT '' COMMENT '附件路径',
  `attach_info` varchar(1000) DEFAULT '' COMMENT '附件属性',
  `attach_host` varchar(100) DEFAULT NULL COMMENT '附件主机',
  `attach_api` varchar(20) DEFAULT NULL COMMENT '附件访问接口',
  `hash_key` char(32) DEFAULT NULL COMMENT '附件hashkey',
  PRIMARY KEY (`attach_id`),
  KEY `hash_key` (`hash_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_attach` WRITE;
/*!40000 ALTER TABLE `ad_attach` DISABLE KEYS */;

INSERT INTO `ad_attach` (`attach_id`, `attach_mime_type`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `attach_relative_src`, `attach_info`, `attach_host`, `attach_api`, `hash_key`)
VALUES
	(1,'image/jpeg',1,1,0,'2017-11-30 14:50:16','2017-11-30 14:50:16',NULL,'storage/uploads/171130025016ad.jpeg','','','file_storage','28c8edde3d61a0411511d3b1866f0636'),
	(2,'image/jpeg',1,1,0,'2017-12-02 16:59:08','2017-12-02 16:59:08',NULL,'storage/uploads/171202045908bg.jpg','','','file_storage','665f644e43731ff9db3d341da5c827e1'),
	(3,'image/jpeg',1,1,0,'2017-12-02 16:59:08','2017-12-02 16:59:08',NULL,'storage/uploads/171202045908ban.jpg','','','file_storage','38026ed22fc1a91d92b5d2ef93540f20'),
	(4,'image/png',1,1,0,'2017-12-02 16:59:08','2017-12-02 16:59:08',NULL,'storage/uploads/171202045908turnplate-pointer.png','','','file_storage','011ecee7d295c066ae68d4396215c3d0'),
	(5,'image/jpeg',1,1,0,'2017-12-02 17:03:23','2017-12-02 17:03:23',NULL,'storage/uploads/171202050323bg.jpg','','','file_storage','4e44f1ac85cd60e3caa56bfd4afb675e'),
	(6,'image/jpeg',1,1,0,'2017-12-02 17:03:23','2017-12-02 17:03:23',NULL,'storage/uploads/171202050323ban.jpg','','','file_storage','3d2f8900f2e49c02b481c2f717aa9020'),
	(7,'image/png',1,1,0,'2017-12-02 17:03:23','2017-12-02 17:03:23',NULL,'storage/uploads/171202050323turnplate-pointer.png','','','file_storage','cd7fd1517e323f26c6f1b0b6b96e3b3d'),
	(8,'image/jpeg',1,1,0,'2017-12-03 08:17:11','2017-12-03 08:17:11',NULL,'storage/uploads/171203081711ad.jpeg','','','file_storage','815e6212def15fe76ed27cec7a393d59'),
	(9,'image/jpeg',1,1,0,'2017-12-03 12:06:07','2017-12-03 12:06:07',NULL,'storage/uploads/171203120607zxg7h0lyxb.jpeg','','','file_storage','4c0d13d3ad6cc317017872e51d01b238'),
	(10,'image/jpeg',1,1,0,'2017-12-03 12:06:07','2017-12-03 12:06:07',NULL,'storage/uploads/171203120607xr48yc95kl.jpg','','','file_storage','8d8e353b98d5191d5ceea1aa3eb05d43'),
	(11,'image/gif',1,1,0,'2017-12-04 16:15:08','2017-12-04 16:15:08',NULL,'storage/uploads/1712040415081k47r7he1t.gif','','','file_storage','7bfc85c0d74ff05806e0b5a0fa0c1df1'),
	(12,'image/jpeg',1,1,0,'2017-12-04 16:15:08','2017-12-04 16:15:08',NULL,'storage/uploads/171204041508pe9kpwd8z6.jpg','','','file_storage','c8b2f17833a4c73bb20f88876219ddcd'),
	(13,'image/jpeg',1,1,0,'2017-12-04 17:19:22','2017-12-04 17:19:22',NULL,'storage/uploads/171204051922ad.jpeg','','','file_storage','7e51746feafa7f2621f71943da8f603c'),
	(14,'image/gif',1,1,0,'2017-12-04 17:28:32','2017-12-04 17:28:32',NULL,'storage/uploads/1712040528321k47r7he1t.gif','','','file_storage','f93b8bbbac89ea22bac0bf188ba49a61'),
	(15,'image/jpeg',1,1,0,'2017-12-04 17:28:32','2017-12-04 17:28:32',NULL,'storage/uploads/171204052832pe9kpwd8z6.jpg','','','file_storage','ad8b68a55505a09ac7578f32418904b3'),
	(16,'image/jpeg',1,1,0,'2017-12-11 23:39:42','2017-12-11 23:39:42',NULL,'storage/uploads/171211113942zxg7h0lyxb.jpeg','','','file_storage','93b6deed95aca08ab22dae75e28592b1'),
	(17,'image/jpeg',1,1,0,'2017-12-11 23:39:42','2017-12-11 23:39:42',NULL,'storage/uploads/171211113942xr48yc95kl.jpg','','','file_storage','27a989a1aeab2b96cedd2b6c4a7cba2f'),
	(18,'image/jpeg',1,1,0,'2017-12-12 00:26:33','2017-12-12 00:26:33',NULL,'storage/uploads/171212122633bg.jpg','','','file_storage','30ded6806f6f7f65952d5752e3ceaab6'),
	(19,'image/jpeg',1,1,0,'2017-12-16 13:12:41','2017-12-16 13:12:41',NULL,'storage/uploads/171216011241bg.jpg','','','file_storage','538b45ef5c6f26b001e71b1c55b26a2c'),
	(20,'image/png',1,1,0,'2017-12-16 13:13:42','2017-12-16 13:13:42',NULL,'storage/uploads/171216011342main_bg.png','','','file_storage','74d8ce91d143cad52fad9d3661dded18'),
	(21,'image/png',1,1,0,'2017-12-16 13:13:50','2017-12-16 13:13:50',NULL,'storage/uploads/171216011350main_bg.png','','','file_storage','e39a411b54c3ce46fd382fef7f632157'),
	(22,'image/png',1,1,0,'2017-12-16 13:17:19','2017-12-16 13:17:19',NULL,'storage/uploads/171216011719main_bg.png','','','file_storage','4a0f84dd91471107bf6a1dfce1d62fc0'),
	(23,'image/png',1,1,0,'2017-12-16 13:17:19','2017-12-16 13:17:19',NULL,'storage/uploads/171216011719banner.png','','','file_storage','6f181f206b8555c5dc619bc206ab35ad'),
	(24,'image/png',1,1,0,'2017-12-16 13:26:54','2017-12-16 13:26:54',NULL,'storage/uploads/171216012654banner.png','','','file_storage','83a5a282f092aa7baf6982b54227bb54'),
	(25,'image/png',1,1,0,'2017-12-16 13:27:22','2017-12-16 13:27:22',NULL,'storage/uploads/171216012722main_bg.png','','','file_storage','c81fb13777b701cb8ce6cdb7f0661f1b'),
	(26,'image/jpeg',1,1,0,'2017-12-16 13:36:42','2017-12-16 13:36:42',NULL,'storage/uploads/171216013642bg.jpg','','','file_storage','683529bb1b0fedc340f2ebce47468395'),
	(27,'image/png',1,1,0,'2017-12-16 13:37:10','2017-12-16 13:37:10',NULL,'storage/uploads/171216013710main_bg.png','','','file_storage','80ecd7abc0579af356a6ca6fb24ec486'),
	(28,'image/png',1,1,0,'2017-12-16 13:37:10','2017-12-16 13:37:10',NULL,'storage/uploads/171216013710banner.png','','','file_storage','29bdbc822df2e6c13dcf4afe6913525f'),
	(29,'image/png',1,1,0,'2017-12-16 13:37:24','2017-12-16 13:37:24',NULL,'storage/uploads/171216013724banner.png','','','file_storage','70b48809e0305276c9defa82d51fb48c'),
	(30,'image/png',1,1,0,'2017-12-16 13:37:36','2017-12-16 13:37:36',NULL,'storage/uploads/171216013736main_bg.png','','','file_storage','4db87140662bd68076ef786f7163cedc');

/*!40000 ALTER TABLE `ad_attach` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_click_statistics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_click_statistics`;

CREATE TABLE `ad_click_statistics` (
  `ad_click_statistics_id` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `request_day` char(10) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `request_hour` char(2) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `log_type` char(5) COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  `shorturl` char(10) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '展示数',
  `cheat_count` int(11) DEFAULT NULL COMMENT '作弊统计',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ad_click_statistics_id`),
  UNIQUE KEY `request_day` (`request_day`,`request_hour`,`log_type`,`shorturl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `ad_click_statistics` WRITE;
/*!40000 ALTER TABLE `ad_click_statistics` DISABLE KEYS */;

INSERT INTO `ad_click_statistics` (`ad_click_statistics_id`, `request_day`, `request_hour`, `log_type`, `shorturl`, `count`, `cheat_count`, `created_at`, `updated_at`)
VALUES
	(1,'20171210','14','CLICK','c8edde3d61',3,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(2,'20171210','14','CLICK','5f644e4373',7,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(3,'20171210','14','CLICK','026ed22fc1',1,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(4,'20171211','00','CLICK','c8edde3d61',5,0,'2017-12-11 00:18:50','2017-12-11 00:28:40'),
	(5,'20171211','00','CLICK','5f644e4373',5,0,'2017-12-11 00:18:50','2017-12-11 00:28:40');

/*!40000 ALTER TABLE `ad_click_statistics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_logs`;

CREATE TABLE `ad_logs` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `request_time` datetime NOT NULL,
  `request_time_float` double NOT NULL,
  `log_type` varchar(20) COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  `object_id` bigint(15) NOT NULL,
  `ad_slot` char(25) COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `remote_ip` varchar(40) COLLATE utf8_general_ci NOT NULL DEFAULT '''''',
  `user_agent` varchar(255) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `cookies` varchar(2000) COLLATE utf8_general_ci DEFAULT NULL,
  `http_referer` varchar(200) COLLATE utf8_general_ci DEFAULT NULL,
  `pos` varchar(10) COLLATE utf8_general_ci DEFAULT NULL,
  `others` varchar(1000) COLLATE utf8_general_ci DEFAULT NULL,
  `logger` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `ad_logs` WRITE;
/*!40000 ALTER TABLE `ad_logs` DISABLE KEYS */;

INSERT INTO `ad_logs` (`log_id`, `request_time`, `request_time_float`, `log_type`, `object_id`, `ad_slot`, `remote_ip`, `user_agent`, `cookies`, `http_referer`, `pos`, `others`, `logger`, `line`, `created_at`, `updated_at`)
VALUES
	(1,'2017-12-10 14:36:43',1512916603.605,'ADS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/test','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',1,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(2,'2017-12-10 14:36:43',1512916603.6667,'QUERY_AD',10,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/test','0,0','CREATE_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',2,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(3,'2017-12-10 14:36:47',1512916607.4653,'ADS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/test','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',3,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(4,'2017-12-10 14:36:47',1512916607.5351,'QUERY_AD',10,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/test','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',4,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(5,'2017-12-10 14:36:48',1512916608.5816,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_10_14.log',5,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(6,'2017-12-10 14:36:48',1512916608.6829,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',6,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(7,'2017-12-10 14:36:48',1512916608.771,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',7,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(8,'2017-12-10 14:36:58',1512916618.9449,'PRODUCT_SHOW',2,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_10_14.log',8,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(9,'2017-12-10 14:37:01',1512916621.845,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://tf.icolor.com.cn/pcbj_baidu,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',9,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(10,'2017-12-10 14:38:08',1512916688.9214,'ADS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/test','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',10,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(11,'2017-12-10 14:38:09',1512916689.013,'QUERY_AD',10,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/test','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',11,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(12,'2017-12-10 14:38:12',1512916692.5626,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_10_14.log',12,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(13,'2017-12-10 14:38:12',1512916692.6465,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',13,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(14,'2017-12-10 14:38:12',1512916692.7274,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',14,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(15,'2017-12-10 14:38:21',1512916701.1313,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',15,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(16,'2017-12-10 14:38:21',1512916701.2217,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',16,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(17,'2017-12-10 14:38:34',1512916714.9045,'PRODUCT_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_10_14.log',17,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(18,'2017-12-10 14:39:59',1512916799.8498,'PRODUCT_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_10_14.log',18,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(19,'2017-12-10 14:40:02',1512916802.0202,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:https://m.10010.com/bj/,SHORT_URL_CODE:026ed22fc1\n','AD_PLAT_FORM_2017_12_10_14.log',19,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(20,'2017-12-10 14:40:35',1512916835.6523,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_10_14.log',20,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(21,'2017-12-10 14:40:35',1512916835.7373,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',21,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(22,'2017-12-10 14:40:35',1512916835.8201,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',22,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(23,'2017-12-10 14:40:42',1512916842.0893,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_10_14.log',23,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(24,'2017-12-10 14:40:42',1512916842.1921,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_10_14.log',24,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(25,'2017-12-10 14:40:59',1512916859.496,'PRODUCT_SHOW',2,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_10_14.log',25,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(26,'2017-12-10 14:41:02',1512916862.7953,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://tf.icolor.com.cn/pcbj_baidu,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',26,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(27,'2017-12-10 14:42:27',1512916947.7903,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Mobile Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://tf.icolor.com.cn/pcbj_baidu,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',27,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(28,'2017-12-10 14:42:52',1512916972.5009,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://tf.icolor.com.cn/pcbj_baidu,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',28,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(29,'2017-12-10 14:42:53',1512916973.1382,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://tf.icolor.com.cn/pcbj_baidu,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',29,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(30,'2017-12-10 14:42:55',1512916975.8295,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://tf.icolor.com.cn/pcbj_baidu,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',30,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(31,'2017-12-10 14:44:23',1512917063.8696,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://www.jia.com/zx/beijing/semtf/,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_10_14.log',31,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(32,'2017-12-11 00:17:38',1512922658.8661,'ADS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/test','0,0','no_info\n','AD_PLAT_FORM_2017_12_11_00.log',1,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(33,'2017-12-11 00:17:38',1512922658.9588,'QUERY_AD',10,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/test','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_11_00.log',2,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(34,'2017-12-11 00:17:40',1512922660.6863,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_11_00.log',3,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(35,'2017-12-11 00:17:40',1512922660.7859,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_11_00.log',4,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(36,'2017-12-11 00:17:40',1512922660.8653,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_11_00.log',5,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(37,'2017-12-11 00:17:50',1512922670.7002,'PRODUCT_SHOW',2,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_11_00.log',6,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(38,'2017-12-11 00:17:52',1512922672.0004,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://www.jia.com/zx/beijing/semtf/,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_11_00.log',7,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(39,'2017-12-11 00:17:57',1512922677.2794,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_11_00.log',8,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(40,'2017-12-11 00:17:57',1512922677.3612,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_11_00.log',9,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(41,'2017-12-11 00:17:57',1512922677.4477,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_11_00.log',10,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(42,'2017-12-11 00:18:07',1512922687.1129,'PRODUCT_SHOW',2,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_11_00.log',11,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(43,'2017-12-11 00:18:16',1512922696.6759,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://www.jia.com/zx/beijing/semtf/,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_11_00.log',12,'2017-12-11 00:18:50','2017-12-11 00:18:50'),
	(44,'2017-12-11 00:19:52',1512922792.5091,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_11_00.log',13,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(45,'2017-12-11 00:19:52',1512922792.6148,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_11_00.log',14,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(46,'2017-12-11 00:19:52',1512922792.7033,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_11_00.log',15,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(47,'2017-12-11 00:20:02',1512922802.1062,'PRODUCT_SHOW',2,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_11_00.log',16,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(48,'2017-12-11 00:20:03',1512922803.4333,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://www.jia.com/zx/beijing/semtf/,SHORT_URL_CODE:5f644e4373\n','AD_PLAT_FORM_2017_12_11_00.log',17,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(49,'2017-12-11 00:20:06',1512922806.8973,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:http://192.168.10.125/activity/1,SHORT_URL_CODE:c8edde3d61\n','AD_PLAT_FORM_2017_12_11_00.log',18,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(50,'2017-12-11 00:20:06',1512922806.9858,'ACTIVITY_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/gad/00201e01e-0001-00000001','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3\n','AD_PLAT_FORM_2017_12_11_00.log',19,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(51,'2017-12-11 00:20:07',1512922807.0795,'ACTIVITY_JS_REQ',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','no_info\n','AD_PLAT_FORM_2017_12_11_00.log',20,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(52,'2017-12-11 00:20:16',1512922816.7731,'PRODUCT_SHOW',1,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,activity_id:1\n','AD_PLAT_FORM_2017_12_11_00.log',21,'2017-12-11 00:21:44','2017-12-11 00:21:44'),
	(53,'2017-12-11 00:20:18',1512922818.1378,'CLICK',0,'00201e01e-0001-00000001','192.168.10.125','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36','goojo_ad_slot:00201e01e-0001-00000001,uuid:eccbc87e4b5ce2fe28308fd9f2a7baf3,XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9DUvQhqh7K4a0xVJSDkxGb5EvBxmyUrqRRUpGmOg','http://192.168.10.125/activity/1','0,0','EXIST_COOKIE:eccbc87e4b5ce2fe28308fd9f2a7baf3,TARGET:https://m.10010.com/bj/,SHORT_URL_CODE:026ed22fc1\n','AD_PLAT_FORM_2017_12_11_00.log',22,'2017-12-11 00:21:44','2017-12-11 00:21:44');

/*!40000 ALTER TABLE `ad_logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_show_statistics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_show_statistics`;

CREATE TABLE `ad_show_statistics` (
  `ad_show_statistics_id` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `request_day` char(10) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `request_hour` char(2) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `log_type` varchar(20) COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  `object_id` bigint(15) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '展示数',
  `cheat_count` int(11) DEFAULT NULL COMMENT '作弊统计',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ad_show_statistics_id`),
  UNIQUE KEY `request_day` (`request_day`,`request_hour`,`log_type`,`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `ad_show_statistics` WRITE;
/*!40000 ALTER TABLE `ad_show_statistics` DISABLE KEYS */;

INSERT INTO `ad_show_statistics` (`ad_show_statistics_id`, `request_day`, `request_hour`, `log_type`, `object_id`, `count`, `cheat_count`, `created_at`, `updated_at`)
VALUES
	(1,'20171210','14','ADS_REQ',1,3,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(2,'20171210','14','QUERY_AD',10,3,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(3,'20171210','14','ACTIVITY_SHOW',1,5,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(4,'20171210','14','ACTIVITY_JS_REQ',1,5,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(5,'20171210','14','PRODUCT_SHOW',2,2,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(6,'20171210','14','PRODUCT_SHOW',1,2,0,'2017-12-10 14:51:29','2017-12-10 14:51:29'),
	(7,'20171211','00','ADS_REQ',1,2,0,'2017-12-11 00:18:50','2017-12-11 00:28:40'),
	(8,'20171211','00','QUERY_AD',10,2,0,'2017-12-11 00:18:50','2017-12-11 00:28:40'),
	(9,'20171211','00','ACTIVITY_SHOW',1,5,0,'2017-12-11 00:18:50','2017-12-11 00:28:40'),
	(10,'20171211','00','ACTIVITY_JS_REQ',1,5,0,'2017-12-11 00:18:50','2017-12-11 00:28:40'),
	(11,'20171211','00','PRODUCT_SHOW',2,5,0,'2017-12-11 00:18:50','2017-12-11 00:28:40');

/*!40000 ALTER TABLE `ad_show_statistics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cookies_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cookies_map`;

CREATE TABLE `cookies_map` (
  `cookies_map_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'cookies_map_id',
  `cookies_uuid` char(34) NOT NULL DEFAULT '''''' COMMENT 'uuid',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `cookies` varchar(2000) DEFAULT '' COMMENT 'cookies',
  `advertising_space_id` int(11) DEFAULT NULL COMMENT '广告位ID',
  `slot` varchar(30) DEFAULT NULL COMMENT 'slot',
  PRIMARY KEY (`cookies_map_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cookies_map` WRITE;
/*!40000 ALTER TABLE `cookies_map` DISABLE KEYS */;

INSERT INTO `cookies_map` (`cookies_map_id`, `cookies_uuid`, `status`, `created_at`, `updated_at`, `deleted_at`, `cookies`, `advertising_space_id`, `slot`)
VALUES
	(1,'c4ca4238a0b923820dcc509a6f75849b',1,'2017-12-03 16:39:10','2017-12-03 16:39:10',NULL,'XSRF-TOKEN:bmBi72SnDMo7OQxLTdOeAL5DIBgroxWtCoB7dMhR,laravel_session:NFB5Lw11Uzfvc6ZwsUu2Q10dlGjYwLzOtvbQGs5Y',1,'00201e01e-0001-00000001'),
	(2,'c81e728d9d4c2f636f067f89cc14862c',1,'2017-12-04 16:11:59','2017-12-04 16:11:59',NULL,'XSRF-TOKEN:6lfYwbU0dmQMCTpWWdlEsVbHwQwUPvrGulA4aKi8,laravel_session:b3Lax3cMSnFkyBEc8UAKNW6G61DL39k7PZJANFRX',1,'00201e01e-0001-00000001'),
	(3,'eccbc87e4b5ce2fe28308fd9f2a7baf3',1,'2017-12-10 14:36:43','2017-12-10 14:36:43',NULL,'XSRF-TOKEN:toHovYODleUU2karMlQlQEHyHuPBCziy2KeHT4AR,adserver_session:9N79OOv2Ly1SDhD4EWZP7tE3ZGJ6crBapoL5nmWA',1,'00201e01e-0001-00000001'),
	(4,'a87ff679a2f3e71d9181a67b7542122c',1,'2017-12-16 11:39:08','2017-12-16 11:39:08',NULL,'XSRF-TOKEN:jT7RsV3FGgLbM9IbFygzbjPmFxBCQAxdKWMQJ8nl,adserver_session:A6ONi0WMX7whJyDmiieN8iGbdJOZOSdhw9QKvCvD',1,'00201e01e-0001-00000001'),
	(5,'e4da3b7fbbce2345d7772b0674a318d5',1,'2017-12-16 13:19:55','2017-12-16 13:19:55',NULL,'XSRF-TOKEN:kXjir1ySKyqlT9iPT9PEio00TyRL7x1MCdbATm2k,adserver_session:tJkDoPAayLSHaSw4SH8FzzckAy7Jw2o9fwt15yJ6',1,'00201e01e-0001-00000001');

/*!40000 ALTER TABLE `cookies_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cookies_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cookies_product`;

CREATE TABLE `cookies_product` (
  `cookies_uuid` char(34) NOT NULL DEFAULT '''''' COMMENT 'uuid',
  `activity_product_id` int(11) unsigned NOT NULL COMMENT '产品ID',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cookies_product` WRITE;
/*!40000 ALTER TABLE `cookies_product` DISABLE KEYS */;

INSERT INTO `cookies_product` (`cookies_uuid`, `activity_product_id`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	('a87ff679a2f3e71d9181a67b7542122c',2,'2017-12-16 12:52:24','2017-12-16 12:52:24',NULL),
	('a87ff679a2f3e71d9181a67b7542122c',1,'2017-12-16 12:55:46','2017-12-16 12:55:46',NULL),
	('e4da3b7fbbce2345d7772b0674a318d5',2,'2017-12-16 13:20:09','2017-12-16 13:20:09',NULL),
	('e4da3b7fbbce2345d7772b0674a318d5',1,'2017-12-16 13:38:26','2017-12-16 13:38:26',NULL);

/*!40000 ALTER TABLE `cookies_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `media_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '媒体ID',
  `media_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '媒体名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `media_type_id` int(11) DEFAULT NULL COMMENT '媒体类型',
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`media_id`, `media_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `media_type_id`)
VALUES
	(1,'大力丸',1,1,0,'2017-11-25 19:10:32',NULL,NULL,1);

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media_advertising_space
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_advertising_space`;

CREATE TABLE `media_advertising_space` (
  `advertising_space_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位ID',
  `advertising_space_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告位名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `advertising_space_strategy` text COMMENT '广告位策略',
  `advertising_space_attribute` text COMMENT '广告位属性',
  `advertising_type_id` int(11) DEFAULT NULL COMMENT '广告位类型',
  `media_id` int(11) DEFAULT NULL COMMENT '媒体ID',
  `advertising_space_code` text COMMENT '广告位代码',
  PRIMARY KEY (`advertising_space_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media_advertising_space` WRITE;
/*!40000 ALTER TABLE `media_advertising_space` DISABLE KEYS */;

INSERT INTO `media_advertising_space` (`advertising_space_id`, `advertising_space_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `advertising_space_strategy`, `advertising_space_attribute`, `advertising_type_id`, `media_id`, `advertising_space_code`)
VALUES
	(1,'A',1,1,1,'2017-12-03 06:29:51','2017-12-16 11:37:47',NULL,NULL,'{\"width_height\":\"01E01E\",\"description\":\"GEA\",\"validity_date\":\"2017-12-31\"}',2,1,'<script async src=\"//192.168.21.90/renderjs/00201e01e-0001-00000001\"></script>\n            <ins class=\"adsbygoojo\" style=\"display:inline-block;width:30px;height:30px\" goojoad-ad-client=\"30\" goojoad-slot=\"00201e01e-0001-00000001\"></ins><script>\n             (adsbygoojo = window.adsbygoojo || []).push({});\n             </script>');

/*!40000 ALTER TABLE `media_advertising_space` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_type`;

CREATE TABLE `media_type` (
  `media_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '媒体类型ID',
  `media_type_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '媒体类型名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`media_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media_type` WRITE;
/*!40000 ALTER TABLE `media_type` DISABLE KEYS */;

INSERT INTO `media_type` (`media_type_id`, `media_type_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'APP',1,1,0,'2017-11-25 19:10:32',NULL,NULL);

/*!40000 ALTER TABLE `media_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',0),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2017_11_25_062449_create_permission_tables',1),
	(4,'2014_10_12_000000_create_users_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



# Dump of table shorturl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shorturl`;

CREATE TABLE `shorturl` (
  `shorturl_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '短链接ID',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `original_url` varchar(500) DEFAULT '' COMMENT '原始链接',
  `shorturl` char(10) DEFAULT NULL COMMENT '短链接key',
  `hash_key` char(32) DEFAULT '' COMMENT '短链接hashkey',
  `type` tinyint(2) DEFAULT NULL COMMENT '短链接类型 1:产品链接地址,2:产品目标地址',
  PRIMARY KEY (`shorturl_id`),
  UNIQUE KEY `shorturl` (`shorturl`),
  KEY `hash_key` (`hash_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shorturl` WRITE;
/*!40000 ALTER TABLE `shorturl` DISABLE KEYS */;

INSERT INTO `shorturl` (`shorturl_id`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `original_url`, `shorturl`, `hash_key`, `type`)
VALUES
	(1,1,1,0,'2017-12-04 17:12:14','2017-12-16 11:37:47',NULL,'http://192.168.21.90/activity/1','c8edde3d61','1d23a35f365c0850c8ad0bc657d7037b',NULL),
	(2,1,1,0,'2017-12-04 17:23:55','2017-12-04 17:23:55',NULL,'http://www.jia.com/zx/beijing/semtf/','5f644e4373','872c0b6f9dfcbbb5debd5abce4a49e3a',NULL),
	(3,1,1,0,'2017-12-04 17:26:24','2017-12-04 17:26:24',NULL,'https://m.10010.com/bj/','026ed22fc1','cc9a474348f1157de6d3b40f911e89f7',NULL),
	(4,1,1,0,'2017-12-12 23:39:09','2017-12-16 11:37:47',NULL,'http://192.168.21.90/activity/2','1ecee7d295','c9469178f9927a46b8549142bbc2e314',2),
	(5,1,1,0,'2017-12-16 12:15:37','2017-12-16 12:15:37',NULL,'http://192.168.21.90/activity/1','44f1ac85cd','530fea4e8fb8c01638085efe520b673c',2),
	(6,1,1,0,'2017-12-16 17:39:12','2017-12-16 17:39:12',NULL,'http://192.168.21.90/select_activity','2f8900f2e4','49cdd7d11ff98f6e7f6e36116bc22f60',2);

/*!40000 ALTER TABLE `shorturl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `realname` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `creator` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL DEFAULT '''''',
  `password` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `realname`, `status`, `creator`, `modified_by`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'jianghao','江浩',2,1,0,'\'\'','$2y$10$myS.skF2e1D.mviK2fhhh.u2hvfZSzlEsLQth7iIWXP9m237AQ6K.',NULL,'2017-11-25 08:24:48','2017-11-25 09:09:24');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
