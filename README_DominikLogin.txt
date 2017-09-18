Datenbankname: PAR5


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
    uid varchar(256) not null,
    date datetime not null,
    message TEXT not null
);