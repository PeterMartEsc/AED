DROP ALL OBJECTS;
--CREATE SCHEMA oficina;
--USE oficina;
--DROP TABLE IF EXISTS lapices;
 
--CREATE TABLE IF NOT EXISTS lapices (
CREATE TABLE  lapices (
idLapiz int NOT NULL,
marca char(30) NOT NULL,
numero int DEFAULT NULL
) ;
INSERT INTO lapices (idLapiz, marca, numero) VALUES
(1, 'staedtler', 2),
(2, 'alpino', 1),
(3, 'alpino', 3),
(4, 'staedtler', 1);

