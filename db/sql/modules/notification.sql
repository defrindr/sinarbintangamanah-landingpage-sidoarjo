-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) CHARACTER SET latin1 NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `controller` varchar(150) NOT NULL,
  `android_route` varchar(150) DEFAULT NULL,
  `params` text,
  `read` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2022-03-26 09:19:12
