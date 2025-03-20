CREATE DATABASE blog1;
CREATE USER 'blog1'@'localhost' IDENTIFIED BY 'blog1';
GRANT ALL PRIVILEGES ON blog1.* TO 'blog1'@'localhost';

CREATE TABLE `user` (`id` int(20) unsigned NOT NULL AUTO_INCREMENT,
                     `email` varchar(255) NOT NULL,
                     `password` varchar(255) NOT NULL,
                     `name` varchar(255) DEFAULT NULL,
                     `surname` varchar(255) DEFAULT NULL,
                     `about` TEXT DEFAULT NULL,
                     `phone` varchar(255) DEFAULT NULL,
                     PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `article` (`id` int(20) unsigned NOT NULL AUTO_INCREMENT,
                        `userId` int(20) unsigned NOT NULL,
                        `title` varchar(255) NOT NULL,
                        `content` TEXT NOT NULL,
                        `img` varchar(255) DEFAULT NULL,
                        `createdAt` DATETIME DEFAULT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;