--Base de Datos - "Inicio de Sesión"-- 

--Crear base de datos
CREATE DATABASE iniciosesion;

--Crear tabla usuarios
CREATE TABLE usuario (
    iduser INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(255) UNIQUE NOT NULL,
    pw VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL
);

INSERT INTO usuario (correo, pw, nombre, telefono) VALUES ('miriam@gmail.com', '1234', 'Miriam', '666 66 66 66');
INSERT INTO usuario (correo, pw, nombre, telefono) VALUES ('lucas@gmail.com', '1111','Lucas','622 22 22 22');
INSERT INTO usuario (correo, pw, nombre, telefono) VALUES ('mario@gmail.com', '3333', 'Mario', '677 77 77 77');
INSERT INTO usuario (correo, pw, nombre, telefono) VALUES ('fran@gmail.com','4444','Fran','699 99 99 99');