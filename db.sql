/*
CREATE DATABASE ders;
USE ders;

CREATE TABLE dersler
(
    id    INT AUTO_INCREMENT,
    baslik VARCHAR(221),
    icerik TEXT(221),
    kategori_id INT,
    onay INT,
    tarih TIMESTAMP DEFAULT current_timestamp,
    PRIMARY KEY (id)
);


CREATE TABLE kategoriler
(
    id INT AUTO_INCREMENT,
    ad VARCHAR(222),
    PRIMARY KEY (id)
);
