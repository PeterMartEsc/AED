SET MODE MYSQL;

DROP TABLE IF EXISTS alumnos;

CREATE TABLE alumnos (
    dni VARCHAR(50) AUTO_INCREMENT,
    nombre VARCHAR(50) ,
    apellidos VARCHAR(50) ,
    fechanacimiento BIGINT
    CONSTRAINT pk_alumnos PRIMARY KEY(id),
);

INSERT INTO alumnos (dni, nombre, apellidos, fechanacimiento) VALUES
('12312312K', 'María Luisa', 'Gutiérrez', 821234400000),
('12345678Z', 'Ana', 'Martín', 968972400000),
('87654321X', 'Marcos', 'Afonso Jiménez', 874278000000);