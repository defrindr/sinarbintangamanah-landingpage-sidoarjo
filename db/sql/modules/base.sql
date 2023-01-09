-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller_id` varchar(50) NOT NULL,
  `action_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `action` (`id`, `controller_id`, `action_id`, `name`) VALUES
(12,	'site',	'index',	'Index'),
(13,	'site',	'profile',	'Profile'),
(14,	'site',	'login',	'Login'),
(15,	'site',	'logout',	'Logout'),
(16,	'site',	'contact',	'Contact'),
(17,	'site',	'about',	'About'),
(18,	'menu',	'index',	'Index'),
(19,	'menu',	'view',	'View'),
(20,	'menu',	'create',	'Create'),
(21,	'menu',	'update',	'Update'),
(22,	'menu',	'delete',	'Delete'),
(23,	'role',	'index',	'Index'),
(24,	'role',	'view',	'View'),
(25,	'role',	'create',	'Create'),
(26,	'role',	'update',	'Update'),
(27,	'role',	'delete',	'Delete'),
(28,	'role',	'detail',	'Detail'),
(29,	'user',	'index',	'Index'),
(30,	'user',	'view',	'View'),
(31,	'user',	'create',	'Create'),
(32,	'user',	'update',	'Update'),
(33,	'user',	'delete',	'Delete'),
(34,	'site',	'register',	'Register'),
(35,	'menu',	'save',	'Save'),
(36,	'backend/web-config-group',	'index',	'Index'),
(37,	'backend/web-config-group',	'create',	'Create'),
(38,	'backend/web-config-group',	'update',	'Update'),
(39,	'backend/web-config-group',	'delete',	'Delete'),
(40,	'backend/web-config-group',	'view',	'View'),
(41,	'default',	'index',	'Index'),
(42,	'default',	'view',	'View'),
(43,	'default',	'delete',	'Delete'),
(44,	'web-config-group',	'index',	'Index'),
(45,	'web-config-group',	'create',	'Create'),
(46,	'web-config-group',	'update',	'Update'),
(47,	'web-config-group',	'delete',	'Delete'),
(48,	'web-config-group',	'view',	'View'),
(49,	'web-config',	'index',	'Index'),
(50,	'web-config',	'view',	'View'),
(51,	'web-config',	'create',	'Create'),
(52,	'web-config',	'update',	'Update'),
(53,	'web-config',	'delete',	'Delete'),
(54,	'message',	'index',	'Index'),
(55,	'message',	'view',	'View'),
(56,	'message',	'create',	'Create'),
(57,	'message',	'update',	'Update'),
(58,	'message',	'delete',	'Delete'),
(59,	'log',	'index',	'Index'),
(60,	'log',	'view',	'View'),
(61,	'log',	'create',	'Create'),
(62,	'log',	'update',	'Update'),
(63,	'log',	'delete',	'Delete'),
(64,	'notification',	'index',	'Index'),
(65,	'notification',	'view',	'View'),
(66,	'notification',	'create',	'Create'),
(67,	'notification',	'update',	'Update'),
(68,	'notification',	'delete',	'Delete'),
(69,	'android-menu-kategori',	'index',	'Index'),
(70,	'android-menu-kategori',	'view',	'View'),
(71,	'android-menu-kategori',	'create',	'Create'),
(72,	'android-menu-kategori',	'update',	'Update'),
(73,	'android-menu-kategori',	'delete',	'Delete'),
(74,	'android-menu',	'index',	'Index'),
(75,	'android-menu',	'view',	'View'),
(76,	'android-menu',	'create',	'Create'),
(77,	'android-menu',	'update',	'Update'),
(78,	'android-menu',	'delete',	'Delete');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `module` varchar(150) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  `except` text,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `name`, `controller`, `module`, `action`, `icon`, `order`, `parent_id`, `except`) VALUES
(1,	'Home',	'site',	'',	'index',	'fa fa-home',	1,	NULL,	'login,error,logout,captcha'),
(2,	'Master',	'',	'',	'index',	'fa fa-database',	2,	NULL,	NULL),
(3,	'Menu',	'menu',	'',	'index',	'fa fa-circle-o',	3,	2,	NULL),
(4,	'Role',	'role',	'',	'index',	'fa fa-circle-o',	4,	2,	NULL),
(5,	'User',	'user',	'',	'index',	'fa fa-circle-o',	5,	2,	NULL),
(6,	'Configuration',	'web-config',	'websetting',	'index',	'fa fa-gear',	7,	8,	NULL),
(7,	'Config Group',	'web-config-group',	'websetting',	'index',	'fa fa-object-group',	8,	8,	NULL),
(8,	'Manage Web',	'#',	'websetting',	'index',	'fa fa-gears',	6,	NULL,	NULL),
(9,	'Translation',	'message',	'translation',	'index',	'fa fa-flag-checkered',	1,	NULL,	NULL),
(10,	'Access Log',	'log',	'accesslog',	'index',	'fa fa-sticky-note',	1,	NULL,	NULL),
(11,	'Notification',	'notification',	'notification',	'index',	'fa fa-bell',	1,	NULL,	NULL),
(12,	'Android',	'#',	'android',	'index',	'fa fa-android',	1,	NULL,	NULL),
(13,	'Kategori Menu',	'android-menu-kategori',	'android',	'index',	'fa fa-database',	1,	12,	NULL),
(14,	'Menu',	'android-menu',	'android',	'index',	'fa fa-database',	1,	12,	NULL);

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role` (`id`, `name`) VALUES
(1,	'Super Administrator'),
(2,	'Administrator'),
(3,	'Regular User');

DROP TABLE IF EXISTS `role_action`;
CREATE TABLE `role_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `action_id` (`action_id`),
  CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_action_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(33,	2,	12),
(34,	2,	13),
(35,	2,	14),
(36,	2,	15),
(37,	2,	16),
(38,	2,	17),
(39,	2,	18),
(40,	2,	19),
(41,	2,	20),
(42,	2,	21),
(43,	2,	22),
(44,	2,	23),
(45,	2,	24),
(46,	2,	25),
(47,	2,	26),
(48,	2,	27),
(49,	2,	28),
(50,	2,	29),
(51,	2,	30),
(52,	2,	31),
(53,	2,	32),
(54,	2,	33),
(98,	3,	12),
(99,	3,	13),
(100,	3,	14),
(101,	3,	15),
(102,	3,	16),
(103,	3,	17),
(104,	3,	18),
(105,	3,	19),
(106,	3,	20),
(107,	3,	21),
(108,	3,	22),
(109,	3,	23),
(110,	3,	24),
(111,	3,	25),
(112,	3,	26),
(113,	3,	27),
(114,	3,	28),
(115,	3,	29),
(116,	3,	30),
(117,	3,	31),
(118,	3,	32),
(119,	3,	33),
(480,	1,	12),
(481,	1,	13),
(482,	1,	34),
(483,	1,	14),
(484,	1,	15),
(485,	1,	16),
(486,	1,	17),
(487,	1,	18),
(488,	1,	19),
(489,	1,	20),
(490,	1,	21),
(491,	1,	22),
(492,	1,	35),
(493,	1,	23),
(494,	1,	24),
(495,	1,	25),
(496,	1,	26),
(497,	1,	27),
(498,	1,	28),
(499,	1,	29),
(500,	1,	30),
(501,	1,	31),
(502,	1,	32),
(503,	1,	33),
(504,	1,	49),
(505,	1,	50),
(506,	1,	51),
(507,	1,	52),
(508,	1,	53),
(509,	1,	44),
(510,	1,	48),
(511,	1,	45),
(512,	1,	46),
(513,	1,	47),
(514,	1,	54),
(515,	1,	55),
(516,	1,	56),
(517,	1,	57),
(518,	1,	58),
(519,	1,	59),
(520,	1,	60),
(521,	1,	61),
(522,	1,	62),
(523,	1,	63),
(524,	1,	64),
(525,	1,	65),
(526,	1,	66),
(527,	1,	67),
(528,	1,	68),
(529,	1,	69),
(530,	1,	70),
(531,	1,	71),
(532,	1,	72),
(533,	1,	73),
(534,	1,	74),
(535,	1,	75),
(536,	1,	76),
(537,	1,	77),
(538,	1,	78);

DROP TABLE IF EXISTS `role_menu`;
CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `role_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `role_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(56,	2,	1),
(57,	2,	2),
(58,	2,	3),
(59,	2,	4),
(60,	2,	5),
(71,	3,	1),
(72,	3,	2),
(73,	3,	3),
(74,	3,	4),
(75,	3,	5),
(164,	1,	1),
(165,	1,	2),
(166,	1,	3),
(167,	1,	4),
(168,	1,	5),
(169,	1,	8),
(170,	1,	6),
(171,	1,	7),
(172,	1,	9),
(173,	1,	10),
(174,	1,	11),
(175,	1,	12),
(176,	1,	13),
(177,	1,	14);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `secret_token` varchar(400) DEFAULT NULL,
  `fcm_token` varchar(200) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `secret_token`, `fcm_token`, `photo_url`, `last_login`, `last_logout`, `flag`) VALUES
(1,	'admin',	'$2y$13$rB7tYN2vtjx4c918aMzxee/hBWRlvy0DihkgFExcGCQIlLj9DnXuW',	'Administrator',	1,	'BASICAPPMTY0NjYrcEFWUDZnNVFiazdpZDN0RU_H8JPC_5uY3NReEZadUsrcERMWis0ODQwNw==APP',	NULL,	'user_image/20220302_ec973bbb82cc0b617ce491083396204a921fbcfb.png',	'2015-12-16 22:35:47',	'2015-12-16 22:35:47',	1),
(2,	'user',	'$2y$13$MDX1w2jKvEMoQqBwln25l.9G0yFY5YGjcMX32fnd3PSUX5xofsDoO',	'Regular User',	3,	NULL,	NULL,	'default.png',	NULL,	NULL,	1);

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
(4,	NULL,	'baseUrl',	'',	'/basicapp',	1),
(6,	3,	'name',	'Basic APP',	'Basic APP',	1),
(7,	3,	'logo',	'http://localhost/lelang/uploads/default.png',	'http://localhost/lelang/uploads/logo.png',	1),
(8,	3,	'copyright',	'Basic App',	'Basic App',	1),
(9,	2,	'prefix',	'BASICAPP',	'BASICAPP',	1),
(10,	2,	'suffix',	'APP',	'APP',	1),
(11,	2,	'expired_in',	'432000',	'432000',	1),
(12,	3,	'defaultImage',	'',	'http://localhost',	1);

DROP TABLE IF EXISTS `web_config_group`;
CREATE TABLE `web_config_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `web_config_group` (`id`, `name`) VALUES
(1,	'adminEmail'),
(2,	'api_token'),
(3,	'app');

-- 2022-03-16 06:59:24
