create database exo20180326;
use exo20180326;

CREATE TABLE IF NOT EXISTS `exo20180326`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(45) NOT NULL,
  `fullname` VARCHAR(70) NOT NULL,
  `pwd` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
charset utf8 collate utf8_bin;