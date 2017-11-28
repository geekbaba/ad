# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.11)
# Database: ad
# Generation Time: 2017-11-28 15:29:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ad_advertising
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_advertising`;

CREATE TABLE `ad_advertising` (
  `advertising_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `advertising_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `advertising_strategy` text COMMENT '广告策略',
  `advertising_attribute` text COMMENT '广告属性',
  `advertising_type_id` int(11) DEFAULT NULL COMMENT '广告类型',
  PRIMARY KEY (`advertising_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_advertising` WRITE;
/*!40000 ALTER TABLE `ad_advertising` DISABLE KEYS */;

INSERT INTO `ad_advertising` (`advertising_id`, `advertising_name`, `status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `advertising_strategy`, `advertising_attribute`, `advertising_type_id`)
VALUES
	(1,'广澳1',1,1,1,NULL,NULL,NULL,'{}',NULL,2),
	(2,'大光一点',1,1,1,NULL,NULL,NULL,NULL,NULL,1),
	(3,'小心一点',1,1,1,NULL,NULL,NULL,NULL,NULL,2),
	(4,'WinerSwiget',0,1,0,'2017-11-25 17:10:32','2017-11-25 17:10:32',NULL,NULL,'A',1);

/*!40000 ALTER TABLE `ad_advertising` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ad_activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_activity`;

CREATE TABLE `ad_activity` (
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '活动ID',
  `activity_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '活动名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `activity_strategy` text COMMENT '活动策略',
  `activity_attribute` text COMMENT '活动属性',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ad_activity_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_activity_product`;

CREATE TABLE `ad_activity_product` (
  `activity_product_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '活动产品ID',
  `activity_product_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '活动产品名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `activity_product_strategy` text COMMENT '活动产品策略',
  `activity_product_attribute` text COMMENT '活动产品属性',
  PRIMARY KEY (`activity_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ad_advertising_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_advertising_type`;

CREATE TABLE `ad_advertising_type` (
  `advertising_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `advertising_type_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告名称',
  `advertising_type_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `status` tinyint(2) DEFAULT '0' COMMENT '广告类型状态',
  PRIMARY KEY (`advertising_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad_advertising_type` WRITE;
/*!40000 ALTER TABLE `ad_advertising_type` DISABLE KEYS */;

INSERT INTO `ad_advertising_type` (`advertising_type_id`, `advertising_type_name`, `advertising_type_status`, `creator`, `modified_by`, `created_at`, `updated_at`, `deleted_at`, `status`)
VALUES
	(1,'APP浮标',1,1,1,NULL,NULL,NULL,1),
	(2,'WAP浮标',1,1,1,NULL,NULL,NULL,1),
	(3,'WEB浮标',1,1,1,NULL,NULL,NULL,1);

/*!40000 ALTER TABLE `ad_advertising_type` ENABLE KEYS */;
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
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table media_advertising_space
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_advertising_space`;

CREATE TABLE `media_advertising_space` (
  `advertising_space_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位ID',
  `advertising_space_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告位名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `advertising_space_strategy` text COMMENT '广告位策略',
  `advertising_space_attribute` text COMMENT '广告位属性',
  `advertising_space_type_id` int(11) DEFAULT NULL COMMENT '广告位类型',
  `media_id` int(11) DEFAULT NULL COMMENT '媒体ID',
  `advertising_space_code` text COMMENT '广告位代码',
  PRIMARY KEY (`advertising_space_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table media_advertising_space_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_advertising_space_type`;

CREATE TABLE `media_advertising_space_type` (
  `advertising_space_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告位类型ID',
  `advertising_space_type_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告位类型名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`advertising_space_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table media_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media_type`;

CREATE TABLE `media_type` (
  `media_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '媒体类型ID',
  `media_type_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '媒体类型名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`media_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
