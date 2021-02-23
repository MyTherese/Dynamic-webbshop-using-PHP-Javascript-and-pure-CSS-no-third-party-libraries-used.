

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

-- add data in products and discount table 

INSERT INTO discount (code_discount, unused, used, pending, price) values 
('C_USB02','0', '0', '0', '20');

INSERT INTO products (title, description, price, code, quantity, date_added, image) values ('Madonna','<p>Having sold more than 300 million records worldwide, Madonna is certified as the best-selling female recording artist of all time by Guinness World Records.</p>','200', '', '10', ''),
('Mumford & Son','<p>Mumford & Sons är ett engelskt folkrockband bildat i London i slutet av 2007. Bandet blev känt i stadens folkmusikvärld tillsammans med andra artister såsom Laura Marling, Johnny Flynn, Jay Jay Pistolet och Noah and the Whale.</p>','300', '', '34', ''),
('U2','<p>U2 är en irländsk rockgrupp bildad i Dublin 1976. U2 har med skivor som The Joshua Tree och Achtung Baby och låtar som One, With or Without You, Beautiful Day.</p>','400', '', '23', ''),
('Whitney Housten','<p>Houston var en av historiens bäst säljande artister med över 200 miljoner sålda album. Hon var även den mest prisbelönade sångerskan enligt Guinness World Records.</p>','500', '', '7', ''),
('Nathaniel Rateliff','<p>Nathaniel David Rateliff (born October 7, 1978) is an American singer and songwriter based in Denver, whose influences are described as folk, Americana and vintage rhythm & blues.</p>','600', '', '7', ''),
('Green Day','<p>Green Day was originally part of the late-'80s/early-'90s punk scene at the DIY 924 Gilman Street club in Berkeley, California. </p>','700', '', '7', '');
