-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `android_banner`;
CREATE TABLE `android_banner` (
  `id` varchar(36) NOT NULL,
  `id_kategori` varchar(36) NOT NULL,
  `id_route` varchar(36) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `params` text,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_route` (`id_route`),
  CONSTRAINT `android_banner_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `android_banner_kategori` (`id`),
  CONSTRAINT `android_banner_ibfk_3` FOREIGN KEY (`id_route`) REFERENCES `android_route` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `android_banner_kategori`;
CREATE TABLE `android_banner_kategori` (
  `id` varchar(36) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `android_menu`;
CREATE TABLE `android_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `need_login` int(11) NOT NULL DEFAULT '0',
  `navigation` varchar(100) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_category`),
  CONSTRAINT `android_menu_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `android_menu_kategori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `android_menu_kategori`;
CREATE TABLE `android_menu_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(255) DEFAULT NULL,
  `id_reference` int(11) DEFAULT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_SELF_REFERENCE` (`id_reference`),
  CONSTRAINT `FK_SELF_REFERENCE` FOREIGN KEY (`id_reference`) REFERENCES `android_menu_kategori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `android_route`;
CREATE TABLE `android_route` (
  `id` varchar(36) NOT NULL,
  `nama_route` varchar(100) NOT NULL,
  `params` text,
  `keterangan` text,
  `butuh_login` int(11) NOT NULL DEFAULT '0',
  `flag` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2022-03-26 05:41:58
