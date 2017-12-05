# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.11)
# Database: ad
# Generation Time: 2017-12-05 13:20:32 +0000
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
	(3,'打地鼠',1,1,0,'2017-12-02 08:08:55','2017-12-02 08:08:55',NULL,NULL,NULL,'0003');

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
	(1,'流量免费送',1,1,1,'2017-12-03 12:06:07','2017-12-04 17:26:24',NULL,NULL,'{\"description\":\"\\u6d41\\u91cf\\u514d\\u8d39\\u9001\",\"button_name\":\"\\u9886\\u53d6\\u514d\\u8d39\\u6d41\\u91cf\",\"target_url\":\"http:\\/\\/192.168.1.106\\/t\\/026ed22fc1\",\"validity_date\":\"2017-12-30\"}'),
	(2,'免费装修',1,1,1,'2017-12-04 16:15:08','2017-12-04 17:28:32',NULL,NULL,'{\"description\":\"asd\",\"button_name\":\"\\u514d\\u8d39\\u88c5\\u4fee\",\"target_url\":\"http:\\/\\/192.168.1.106\\/t\\/5f644e4373\",\"validity_date\":\"2017-12-30\",\"product_image\":\"[Attach]:f93b8bbbac89ea22bac0bf188ba49a61\",\"product_list_image\":\"[Attach]:ad8b68a55505a09ac7578f32418904b3\"}');

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
	(1,'电玩小王子',1,1,1,'2017-12-02 09:01:04','2017-12-02 09:01:16',NULL,NULL,NULL,1),
	(2,'卡卡西',1,1,0,'2017-12-02 09:39:12','2017-12-02 09:39:12',NULL,NULL,NULL,2),
	(3,'A',1,1,1,'2017-12-02 16:59:08','2017-12-02 17:03:23',NULL,NULL,'{\"main_background_image\":\"[Attach]:4e44f1ac85cd60e3caa56bfd4afb675e\",\"banner_image\":\"[Attach]:3d2f8900f2e49c02b481c2f717aa9020\",\"bg\":\"[Attach]:cd7fd1517e323f26c6f1b0b6b96e3b3d\"}',1);

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
	(10,'预选广告',1,1,1,'2017-12-03 08:17:11','2017-12-04 17:20:57',NULL,NULL,'{\"image\":\"[Attach]:7e51746feafa7f2621f71943da8f603c\",\"width_height\":\"01E01E\",\"target_url\":\"http:\\/\\/192.168.1.106\\/t\\/c8edde3d61\"}',2,'01E01E');

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
	(15,'image/jpeg',1,1,0,'2017-12-04 17:28:32','2017-12-04 17:28:32',NULL,'storage/uploads/171204052832pe9kpwd8z6.jpg','','','file_storage','ad8b68a55505a09ac7578f32418904b3');

/*!40000 ALTER TABLE `ad_attach` ENABLE KEYS */;
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
	(2,'c81e728d9d4c2f636f067f89cc14862c',1,'2017-12-04 16:11:59','2017-12-04 16:11:59',NULL,'XSRF-TOKEN:6lfYwbU0dmQMCTpWWdlEsVbHwQwUPvrGulA4aKi8,laravel_session:b3Lax3cMSnFkyBEc8UAKNW6G61DL39k7PZJANFRX',1,'00201e01e-0001-00000001');

/*!40000 ALTER TABLE `cookies_map` ENABLE KEYS */;
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
	(1,'A',1,1,1,'2017-12-03 06:29:51','2017-12-03 08:17:29',NULL,NULL,'{\"width_height\":\"01E01E\",\"description\":\"GEA\",\"validity_date\":\"2017-12-31\"}',2,1,'<script async src=\"//192.168.1.106/renderjs/00201e01e-0001-00000001\"></script>\n            <ins class=\"adsbygoojo\" style=\"display:inline-block;width:30px;height:30px\" goojoad-ad-client=\"30\" goojoad-slot=\"00201e01e-0001-00000001\"></ins><script>\n             (adsbygoojo = window.adsbygoojo || []).push({});\n             </script>');

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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
  PRIMARY KEY (`shorturl_id`),
  UNIQUE KEY `shorturl` (`shorturl`),
  KEY `hash_key` (`hash_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shorturl` WRITE;
/*!40000 ALTER TABLE `shorturl` DISABLE KEYS */;

INSERT INTO `shorturl` (`shorturl_id`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `original_url`, `shorturl`, `hash_key`)
VALUES
	(1,1,1,0,'2017-12-04 17:12:14','2017-12-04 17:12:14',NULL,'http://192.168.1.106/activity/1','c8edde3d61','1d23a35f365c0850c8ad0bc657d7037b'),
	(2,1,1,0,'2017-12-04 17:23:55','2017-12-04 17:23:55',NULL,'http://tf.icolor.com.cn/pcbj_baidu','5f644e4373','872c0b6f9dfcbbb5debd5abce4a49e3a'),
	(3,1,1,0,'2017-12-04 17:26:24','2017-12-04 17:26:24',NULL,'https://m.10010.com/bj/','026ed22fc1','cc9a474348f1157de6d3b40f911e89f7');

/*!40000 ALTER TABLE `shorturl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `creator` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''''',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
