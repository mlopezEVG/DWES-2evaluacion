--BBDD simular archivo de instalacion
--Para datos SÍ/NO el tipo de dato que se utiliza es "BIT" no -> char(1).
--Si vamos a insertar más usuarios es importante utilizar un campo "perfil". 
CREATE USER 'instalador'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON *.* TO 'instalador'@'localhost';

CREATE USER 'administrador'@'localhost' IDENTIFIED BY '123123123';
GRANT SELECT, INSERT, UPDATE, DELETE ON `a_instalacion`.* TO 'administrador'@'localhost'

CREATE DATABASE  IF NOT EXISTS a_instalacion;
USE a_instalacion;


CREATE TABLE IF NOT EXISTS usuario (
    id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);
/* Creación de tablas */

CREATE TABLE NPC (
    idNPC TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombreNPC VARCHAR(20) NOT NULL UNIQUE,
    sprite BLOB NOT NULL,
    PRIMARY KEY (idNPC)
);

CREATE TABLE Escenario (
    idEscenario TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombreEscenario VARCHAR(30) NOT NULL,
    nombreImagen VARCHAR(20) NOT NULL,
    mensajeNarrativo VARCHAR(150) NOT NULL,
    PRIMARY KEY (idEscenario)
);

CREATE TABLE Respuestas (
    idRespuesta TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    mensaje VARCHAR(30) NOT NULL,
    dinero VARCHAR(20) NOT NULL,
    tiempo VARCHAR(150) NOT NULL,
    idDialogo SMALLINT UNSIGNED NULL,
    idEscenario TINYINT UNSIGNED NULL,
    PRIMARY KEY (idRespuesta)
);

CREATE TABLE Dialogos (
    idDialogo SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombreDiálogo VARCHAR(20) NOT NULL,
    mensaje VARCHAR(150) NOT NULL,
    casilla CHAR(2) NOT NULL,
    idNPC TINYINT UNSIGNED NOT NULL,
    idRespuesta1 TINYINT UNSIGNED NULL,
    idRespuesta2 TINYINT UNSIGNED NULL,
    idEscenario TINYINT UNSIGNED NOT NULL,
    PRIMARY KEY (idDialogo)
);

ALTER TABLE Respuestas 
ADD CONSTRAINT fk_idDialogo FOREIGN KEY (idDialogo) REFERENCES Dialogos(idDialogo),
ADD CONSTRAINT fk_idEscenarioRespuestas FOREIGN KEY (idEscenario) REFERENCES Escenario(idEscenario);

ALTER TABLE Dialogos 
ADD CONSTRAINT fk_idNPC FOREIGN KEY (idNPC) REFERENCES NPC(idNPC),
ADD CONSTRAINT fk_idRespuesta1 FOREIGN KEY (idRespuesta1) REFERENCES Respuestas(idRespuesta),
ADD CONSTRAINT fk_idRespuesta2 FOREIGN KEY (idRespuesta2) REFERENCES Respuestas(idRespuesta),
ADD CONSTRAINT fk_idEscenarioDialogos FOREIGN KEY (idEscenario) REFERENCES Escenario(idEscenario);

