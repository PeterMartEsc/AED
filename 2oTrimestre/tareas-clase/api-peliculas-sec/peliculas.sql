CREATE DATABASE peliculas;
USE peliculas;

CREATE TABLE peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) UNIQUE NOT NULL,
    year YEAR NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    trailer VARCHAR(255),
    caratula VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE actores (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL,
	apellidos VARCHAR(50) NOT NULL
);

CREATE TABLE directores (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL,
	apellidos VARCHAR(50) NOT NULL
);

CREATE TABLE categorias (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) UNIQUE NOT NULL
);

CREATE TABLE actores_peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
	pelicula_id INT NOT NULL,
	actor_id INT NOT NULL,
	FOREIGN KEY (pelicula_id) REFERENCES peliculas(id),
	FOREIGN KEY (actor_id) REFERENCES actores(id),
    CONSTRAINT actores_pelicula UNIQUE (actor_id,pelicula_id)
);


CREATE TABLE directores_peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
	pelicula_id INT NOT NULL,
	director_id INT NOT NULL,
	FOREIGN KEY (pelicula_id) REFERENCES peliculas(id),
	FOREIGN KEY (director_id) REFERENCES directores(id),
    CONSTRAINT directores_pelicula UNIQUE (director_id,pelicula_id)
);

CREATE TABLE categorias_peliculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pelicula_id INT NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (pelicula_id) REFERENCES peliculas(id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    CONSTRAINT categorias_pelicula UNIQUE (categoria_id,pelicula_id)
);

INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('1','Leonardo','DiCaprio');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('2','Kate','Winslet');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('3','Brad','Pitt');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('4','Margot','Robbie');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('5','Johnny','Depp');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('6','Helena','Bonham Carter');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('7','Robert','Downey Jr.');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('8','Chris','Evans');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('9','Scarlett','Johansson');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('10','Tom','Hanks');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('11','Robin','Wright');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('12','Natalie','Portman');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('13','Mila','Kunis');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('14','Christian','Bale');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('15','Heath','Ledger');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('16','Emma','Stone');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('17','Ryan','Gosling');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('18','Anne','Hathaway');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('19','Hugh','Jackman');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('20','Daniel','Radcliffe');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('21','Rupert','Grint');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('22','Emma','Watson');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('23','Jennifer','Lawrence');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('24','Josh','Hutcherson');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('25','Tom','Cruise');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('26','Emily','Blunt');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('27','Matt','Damon');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('28','Jessica','Chastain');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('29','Morgan','Freeman');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('30','Tim','Robbins');
INSERT INTO `actores`(`id`, `nombre`, `apellidos`) VALUES ('31','Michael','Caine');

INSERT INTO `categorias`(`id`, `nombre`) VALUES ('1','Ciencia Ficción');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('2','Drama');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('3','Comedia');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('4','Acción');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('5','Biografía');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('6','Musical');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('7','Aventura');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('8','Bélica');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('9','Romántica');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('10','Suspense');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('11','Western');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('12','Crimen');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('13','Thriller Psicológico');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('14','Fantasía');

-- Script para insertar directores en la tabla 'directores'
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('1', 'Dan', 'Kwan');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('2', 'Sarah', 'Polley');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('3', 'Ruben', 'Östlund');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('4', 'Joseph', 'Kosinski');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('5', 'Todd', 'Field');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('6', 'Steven', 'Spielberg');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('7', 'Baz', 'Luhrmann');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('8', 'Martin', 'McDonagh');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('9', 'James', 'Cameron');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('10', 'Edward', 'Berger');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('11', 'Reinaldo', 'Marcus Green');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('12', 'Paul', 'Thomas Anderson');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('13', 'Guillermo', 'del Toro');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('14', 'Kenneth', 'Branagh');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('15', 'Guy', 'Ritchie');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('16', 'Jane', 'Campion');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('17', 'Adam', 'McKay');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('18', 'Ryûsuke', 'Hamaguchi');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('19', 'Denis', 'Villeneuve');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('20', 'Francis Ford', 'Coppola');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('21', 'Ridley', 'Scott');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('22', 'Antoine', 'Fuqua');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('23', 'Oz', 'Perkins');
INSERT INTO `directores` (`id`, `nombre`, `apellidos`) VALUES ('24', 'Daniel', 'Scheinert');
