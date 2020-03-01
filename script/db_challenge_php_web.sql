CREATE DATABASE  IF NOT EXISTS `db_challenge_php_web`;
USE `db_challenge_php_web`;

DROP TABLE IF EXISTS `db_challenge_php_web`.`people`;

CREATE TABLE `db_challenge_php_web`.`people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NULL,
  `rg` varchar(20) NULL,
  `cpf` varchar(20) NULL,
  `date_birth` timestamp NULL,
  `phone` varchar(30) null,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `db_challenge_php_web`.`people` VALUES (1,'Bruno Diego','admin@com.br',115000768,26613318086,'1989-11-12 00:00:00',null,'2020-02-29 00:24:00');

DROP TABLE IF EXISTS `db_challenge_php_web`.`users`;

CREATE TABLE `db_challenge_php_web`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `isadmin` tinyint(4) NOT NULL DEFAULT  '0',
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_users_people_idx` (`people_id`),
  CONSTRAINT `fk_users_people` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `db_challenge_php_web`.`users` VALUES (1,1,'admin','$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga',1,'2020-02-29 00:24:00');

DROP TABLE IF EXISTS `db_challenge_php_web`.`addresses`;

CREATE TABLE `db_challenge_php_web`.`addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `complement` varchar(32) DEFAULT NULL,
  `city` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_addresses_people_idx` (`people_id`),
  CONSTRAINT `fk_addresses_people` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;