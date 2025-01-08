-- Active: 1735043672631@@127.0.0.1@3306@contactify
CREATE DATABASE BiblioSchool;

SHOW DATABASES;

SHOW TABLES;

USE BiblioSchool;


CREATE TABLE utilisateur(
    id int PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    email VARCHAR(100),
    password VARCHAR(30),
    id_role int,
    Foreign Key (id_role) REFERENCES role(id) 
);



CREATE TABLE role (
    id int PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50)
);



CREATE TABLE Reservation (
    id int PRIMARY KEY AUTO_INCREMENT,
    reserveBegain TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reserveEnd DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    id_status int,
    id_Livre int,
    Foreign Key (id_status) REFERENCES statusLive(id),
    Foreign Key (id_Livre) REFERENCES Livre(id)
);

CREATE TABLE Livre (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    autheur VARCHAR(50),
    price FLOAT,
    quantiter VARCHAR(100),
    id_tag int,
    id_catégories int,
    Foreign Key (id_tag) REFERENCES tag(id),
    Foreign Key (id_catégories) REFERENCES catégories(id)

);



CREATE TABLE catégories(
    id int PRIMARY key AUTO_INCREMENT,
    title VARCHAR(50)
);

CREATE TABLE tag(
    id int PRIMARY key AUTO_INCREMENT,
    title VARCHAR(50)
);

CREATE TABLE statusLive(
    id int PRIMARY key AUTO_INCREMENT,
    title VARCHAR(50)
);
