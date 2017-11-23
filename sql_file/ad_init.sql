# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.11)
# Database: ad
# Generation Time: 2017-11-23 16:50:21 +0000
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



# Dump of table ad_advertising_creative
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_advertising_creative`;

CREATE TABLE `ad_advertising_creative` (
  `advertising_creative_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告创意ID',
  `advertising_creative_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告创意名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `advertising_creative_strategy` text COMMENT '广告创意策略',
  `advertising_creative_attribute` text COMMENT '广告创意属性',
  PRIMARY KEY (`advertising_creative_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ad_advertising_creative_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad_advertising_creative_product`;

CREATE TABLE `ad_advertising_creative_product` (
  `advertising_creative_product_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告创意产品ID',
  `advertising_creative_product_name` varchar(20) NOT NULL DEFAULT '''''' COMMENT '广告创意产品名称',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态字段',
  `creator` int(11) DEFAULT '0' COMMENT '创建者ID',
  `modified_by` int(11) DEFAULT '0' COMMENT '修改人',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  `advertising_creative_product_strategy` text COMMENT '广告创意产品策略',
  `advertising_creative_product_attribute` text COMMENT '广告创意产品属性',
  PRIMARY KEY (`advertising_creative_product_id`)
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
  PRIMARY KEY (`advertising_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
