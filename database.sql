CREATE TABLE user (
     id int(20) unsigned NOT NULL AUTO_INCREMENT,
     email varchar(255) NOT NULL,
     password varchar(255) NOT NULL,
     name varchar(255) DEFAULT NULL,
     surname varchar(255) DEFAULT NULL,
     about TEXT DEFAULT NULL,
     phone varchar(255) DEFAULT NULL,
     PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE articles (
      id int(20) unsigned NOT NULL AUTO_INCREMENT,
      userId int(20) unsigned NOT NULL,
      title varchar(255) NOT NULL,
      content TEXT DEFAULT NULL,
      createdAt DATETIME DEFAULT NULL,
      PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;