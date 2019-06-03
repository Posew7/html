
CREATE DATABASE ders;
USE ders;

CREATE TABLE dersler
(
    id    INT AUTO_INCREMENT,
    baslik VARCHAR(221),
    icerik TEXT(221),
    onay INT,
    tarih TIMESTAMP DEFAULT current_timestamp,
    PRIMARY KEY (id)
);
