

CREATE DATABASE `tickets`;


CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `mail` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB;

CREATE TABLE `products` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `description` VARCHAR(250) NOT NULL,
    `price` DECIMAL(10,0) NOT NULL,
    `code` VARCHAR(250) NOT NULL,
    `quantity` INT(11) NOT NULL,
    `date_added` DATETIME ON UPDATE CURRENT_TIMESTAMP,
    `image` BLOB NOT NULL
    PRIMARY KEY(`id`)
) ENGINE=InnoDB;


CREATE TABLE `discount` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `code_discount` VARCHAR(100) NOT NULL,
    `unused` TINYINT(11) NOT NULL,
    `used` INT(11) NOT NULL,
    `pending`INT(11) NOT NULL,
    `price` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
  
) ENGINE=InnoDB;

CREATE INDEX `code_discount` ON `discount`;