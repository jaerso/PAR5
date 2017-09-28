CREATE DATABASE PAR5;

CREATE TABLE users (
user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
user_first varchar(256) not null,
user_last varchar(256) not null,
user_email varchar(256) not null,
user_uid varchar(256) not null,
user_pwd varchar(256) not null
);

CREATE TABLE profileimg (
id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    userid int(11) not null,
    status int(11) not null
);

CREATE TABLE comments (
    cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
imgid varchar(256) not null,
checkID varchar(32) not null,
    uid varchar(256) not null,
    date datetime not null,
    message TEXT not null,
UNIQUE KEY `checkID` (`checkID`)
);

CREATE TABLE images
(
	id int NOT null PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) not null,
    type varchar(100) not null,
    bildlink varchar(300) not null,
    bahnnummer varchar(200) not null
);

CREATE TABLE frontimages
(
	id int NOT null PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) not null,
    type varchar(100) not null,
    bildlink varchar(300) not null,
    bahnnummer varchar(200) not null
);

INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('1.jpg', 'image/jpeg', 'images/gallery/Fotos/1.jpg', '1');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('2.jpg', 'image/jpeg', 'images/gallery/Fotos/2.jpg', '2');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('3.jpg', 'image/jpeg', 'images/gallery/Fotos/3.jpg', '3');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('4.jpg', 'image/jpeg', 'images/gallery/Fotos/4.jpg', '4');


INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('1.jpg', 'image/jpeg', 'images/gallery/Fotos/1.jpg', '1');
INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('2.jpg', 'image/jpeg', 'images/gallery/Fotos/2.jpg', '1');
INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('3.jpg', 'image/jpeg', 'images/gallery/Fotos/3.jpg', '2');
INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('4.jpg', 'image/jpeg', 'images/gallery/Fotos/4.jpg', '4');
