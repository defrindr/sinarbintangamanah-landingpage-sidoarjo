-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `web_config`;
CREATE TABLE `web_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `value` text,
  `default` text,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `web_config_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `web_config_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `web_config` (`id`, `group_id`, `name`, `value`, `default`, `active`) VALUES
(1,	1,	'email',	'noreply@basicapp.id',	'noreply@basicapp.id',	1),
(2,	1,	'host',	'basicapp.id',	'basicapp.id',	1),
(3,	1,	'password',	'basicapp',	'basicapp',	1),
(4,	NULL,	'baseUrl',	'/lelang',	'/basicapp',	1),
(6,	NULL,	'app_name',	'Basic APP',	'Basic APP',	1),
(7,	NULL,	'app_logo',	'http://localhost/lelang/uploads/default.png',	'http://localhost/lelang/uploads/logo.png',	1),
(8,	NULL,	'copyright',	'Basic App',	'Basic App',	1),
(9,	2,	'prefix',	'BASICAPP',	'BASICAPP',	1),
(10,	2,	'suffix',	'APP',	'APP',	1),
(11,	2,	'expired_in',	'432000',	'432000',	1);

DROP TABLE IF EXISTS `web_config_group`;
CREATE TABLE `web_config_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `web_config_group` (`id`, `name`) VALUES
(1,	'adminEmail'),
(2,	'api_token'),
(3,	'base2');

-- 2022-03-15 18:00:29
