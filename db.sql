/*
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
 */
/*
USE db;
CREATE TABLE dersler
(
    id INT NOT NULL AUTO_INCREMENT,
    baslik VARCHAR(222),
    icerik TEXT,
    onay INT,
    tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)
INSERT INTO dersler
SET baslik="matematik",
    icerik="diferansiyel denklemler",
    onay=1;
 */