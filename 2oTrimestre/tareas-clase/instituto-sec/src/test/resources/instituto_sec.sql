SET MODE MYSQL;

DROP TABLE IF EXISTS `asignatura_matricula`;
DROP TABLE IF EXISTS `asignaturas`;
DROP TABLE IF EXISTS `matriculas`;
DROP TABLE IF EXISTS `alumnos`;
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `alumnos`(
    dni CHARACTER(20) NOT NULL,
    nombre CHARACTER(50) NOT NULL,
    apellidos CHARACTER(50) NOT NULL,
    fechanacimiento BIGINT NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    CONSTRAINT pk_alumnos PRIMARY KEY(dni)
);

CREATE TABLE `asignaturas`(
    id int AUTO_INCREMENT,
    nombre CHARACTER(50) NOT NULL,
    curso CHARACTER(50) NOT NULL,
    CONSTRAINT pk_asignaturas PRIMARY KEY(id),
    CONSTRAINT uc_nombrecurso UNIQUE(nombre,curso)
);


CREATE TABLE `matriculas`(
    `id` int AUTO_INCREMENT,
    `dni` CHARACTER(20) NOT NULL,
    `anio` int NOT NULL,
    CONSTRAINT `pk_matriculas` PRIMARY KEY(`id`),
    CONSTRAINT `fk_alumnos` FOREIGN KEY(`dni`) REFERENCES `alumnos`(`dni`),
    CONSTRAINT `uc_dnianio` UNIQUE(`dni`,`anio`)
);

CREATE TABLE `asignatura_matricula`(
    id int AUTO_INCREMENT,
    idmatricula int NOT NULL,
    idasignatura int NOT NULL,
    CONSTRAINT pk_asignatura_matriculas PRIMARY KEY(id),
    CONSTRAINT fk_matriculas FOREIGN KEY(idmatricula) REFERENCES matriculas(id),
    CONSTRAINT fk_asignaturas FOREIGN KEY(idasignatura) REFERENCES asignaturas(id)
);

CREATE TABLE `usuarios` (
    id int NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    password VARCHAR(200) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    rol VARCHAR(45) NOT NULL,
    verificado TINYINT(1) DEFAULT 0,
    token_verificacion VARCHAR(255),
    fecha_creacion BIGINT NOT NULL,
	CONSTRAINT pk_usuarios PRIMARY KEY(id),
	CONSTRAINT uc_nombre UNIQUE(nombre),
	CONSTRAINT uc_correo UNIQUE(correo)
);

INSERT INTO `alumnos` (`dni`, `nombre`, `apellidos`, `fechanacimiento`, `imagen`) VALUES ('12345678Z', 'Ana', 'Martín', '968972400000', 'imagen');
INSERT INTO `alumnos` (`dni`, `nombre`, `apellidos`, `fechanacimiento`, `imagen`) VALUES ('87654321X', 'Marcos', 'Afonso Jiménez', '874278000000', 'imagen');
INSERT INTO `alumnos` (`dni`, `nombre`, `apellidos`, `fechanacimiento`, `imagen`) VALUES ('12312312K', 'María Luisa', 'Gutiérrez', '821234400000', 'imagen');

INSERT INTO usuarios (nombre, password, correo, rol, verificado, token_verificacion, fecha_creacion) VALUES
( 'usuario', 'hashed_password_user', 'user@email.com', 'user', 1, 'token_de_verificacion_user', 1674825600);
INSERT INTO usuarios (nombre, password, correo, rol, verificado, token_verificacion, fecha_creacion) VALUES
('administrador', 'hashed_password_admin', 'admin@email.com', 'admin', 1, 'token_de_verificacion_admin', 1674825700);


INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (1, 'BAE', '1º DAM');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (2, 'PGV', '2º DAM');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (3, 'LND', '1º DAM');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (4, 'AED', '2º DAM');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (5, 'DSW', '2º DAW');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (6, 'DPL', '2º DAW');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (7, 'PRO', '1º DAM');
INSERT INTO `asignaturas` (`id`, `nombre`, `curso`) VALUES (8, 'PGL', '2º DAM');

INSERT INTO `matriculas` (`id`, `dni`,`anio`) VALUES (1, '12345678Z', 2023);

INSERT INTO `asignatura_matricula` (`idmatricula`,`idasignatura`) VALUES (1, 2);
