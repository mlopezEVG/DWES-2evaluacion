CREATE DATABASE minijuegos;


CREATE TABLE ambitos(
    idambito TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) NOT NULL
);

CREATE TABLE minijuegos(
    idminijuego TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) NOT NULL,
    idambito TINYINT UNSIGNED PRIMARY KEY,
    URLjuego VARCHAR(100) NOT NULL,
    CONSTRAINT fk_idambito FOREIGN KEY (idambito) REFERENCES ambitos (idambito);
);
-- Insertar valores en la tabla 'ambitos'
INSERT INTO ambitos (nombre) 
VALUES 
('Justicia Social'), 
('Participación Democrática'), 
('Inclusión Social'), 
('Derechos Humanos'), 
('Ambiente Sostenible'), 
('Economía Sostenible'), 
('Salud Global'), 
('Sostenibilidad Ambiental');

-- Insertar más valores en la tabla 'minijuegos' según el ámbito al que pertenezcan
INSERT INTO minijuegos (nombre, idambito, URLjuego) 
VALUES 
-- Justicia Social
('Defensor de la Igualdad', 1, 'http://defensordelaigualdad.com'),
('Revolución Solidaria', 1, 'http://revolucionsolidaria.com'),

-- Participación Democrática
('Voto Virtual', 2, 'http://votovirtual.com'),
('Cívico Activo', 2, 'http://civicoactivo.com'),

-- Inclusión Social
('Todos Jugamos', 3, 'http://todosjugamos.com'),
('Accesibilidad Total', 3, 'http://accesibilidadtotal.com'),

-- Derechos Humanos
('Luchando por la Libertad', 4, 'http://luchandoporlibertad.com'),
('Defensores de los Derechos', 4, 'http://defensoresdelosderechos.com'),

-- Ambiente Sostenible
('Energía Limpia', 5, 'http://energiadelimpia.com'),
('Aventuras Ecológicas', 5, 'http://aventurasecologicas.com'),

-- Economía Sostenible
('Economía Verde', 6, 'http://economiaverde.com'),
('Construye tu Ciudad Sostenible', 6, 'http://ciudadsostenible.com'),

-- Salud Global
('Héroes de la Salud', 7, 'http://heroesdelasalud.com'),
('Pandemia: La Carrera Contra el Tiempo', 7, 'http://pandemialacarrera.com'),

-- Sostenibilidad Ambiental
('Planeta Verde', 8, 'http://planetaverde.com'),
('Salvar el Planeta', 8, 'http://salvarplaneta.com');

--Vaciar tabla ambitos
TRUNCATE TABLE ambitos;

--Eliminar una fila en concreto (donde el id sea...)
DELETE FROM ambitos WHERE idambito = ;