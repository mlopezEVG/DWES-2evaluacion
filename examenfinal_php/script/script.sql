CREATE DATABASE IF NOT EXISTS minijuego DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE minijuego ;

CREATE TABLE ambito (
    idambito tinyint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE minijuegos (
    idjuego smallint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    idambito tinyint unsigned NULL,
    num_etapas tinyint unsigned NULL,
    FOREIGN KEY (idambito) REFERENCES ambito(idambito)
);


INSERT INTO ambito (nombre) VALUES 
('Justicia social'),
('Interculturalidad e inclusión'),
('Desarrollo humano y sostenible'),
('Equidad de género y coeducación'),
('Participación democrática');