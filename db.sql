CREATE DATABASE db;
USE db;
CREATE TABLE kullanici
(
    id    INT(11) NOT NULL AUTO_INCREMENT,
    ad    VARCHAR(222),
    soyad VARCHAR(222),
    PRIMARY KEY (id)
);
INSERT INTO kullanici
SET ad="yunus",
    soyad="üstün";