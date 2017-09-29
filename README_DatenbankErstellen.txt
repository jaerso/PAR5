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
u_id varchar(256) not null,
    u_uid varchar(256) not null,
    date datetime not null,
    message TEXT not null
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


INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('1.jpg', 'image/jpeg', 'images/gallery/Fotos/1.jpg', '1');
INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('2.jpg', 'image/jpeg', 'images/gallery/Fotos/2.jpg', '1');
INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('3.jpg', 'image/jpeg', 'images/gallery/Fotos/3.jpg', '2');
INSERT INTO images (name, type, bildlink, bahnnummer) VALUES ('4.jpg', 'image/jpeg', 'images/gallery/Fotos/4.jpg', '4');


INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('1.jpg', 'image/jpeg', 'images/gallery/Fotos/1.jpg', '1');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('2.jpg', 'image/jpeg', 'images/gallery/Fotos/2.jpg', '2');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('3.jpg', 'image/jpeg', 'images/gallery/Fotos/3.jpg', '3');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('4.jpg', 'image/jpeg', 'images/gallery/Fotos/4.jpg', '4');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('5.jpg', 'image/jpeg', 'images/gallery/Fotos/5.jpg', '5');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('6.jpg', 'image/jpeg', 'images/gallery/Fotos/6.jpg', '6');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('7.jpg', 'image/jpeg', 'images/gallery/Fotos/7.jpg', '7');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('8.jpg', 'image/jpeg', 'images/gallery/Fotos/8.jpg', '8');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('9.jpg', 'image/jpeg', 'images/gallery/Fotos/9.jpg', '9');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('10.jpg', 'image/jpeg', 'images/gallery/Fotos/10.jpg', '10');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('11.jpg', 'image/jpeg', 'images/gallery/Fotos/11.jpg', '11');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('12.jpg', 'image/jpeg', 'images/gallery/Fotos/12.jpg', '12');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('13.jpg', 'image/jpeg', 'images/gallery/Fotos/13.jpg', '13');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('14.jpg', 'image/jpeg', 'images/gallery/Fotos/14.jpg', '14');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('15.jpg', 'image/jpeg', 'images/gallery/Fotos/15.jpg', '15');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('16.jpg', 'image/jpeg', 'images/gallery/Fotos/16.jpg', '16');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('17.jpg', 'image/jpeg', 'images/gallery/Fotos/17.jpg', '17');
INSERT INTO frontimages (name, type, bildlink, bahnnummer) VALUES ('18.jpg', 'image/jpeg', 'images/gallery/Fotos/18.jpg', '18');