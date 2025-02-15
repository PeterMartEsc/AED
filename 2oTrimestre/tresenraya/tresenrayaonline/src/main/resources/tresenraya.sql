SET MODE MYSQL;

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`(
    id int AUTO_INCREMENT,
    nombre CHARACTER(50) NOT NULL,
    password CHARACTER(200) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
);

INSERT INTO usuarios (nombre, password, correo) VALUES
( 'usuario', 'hashed_password_user', 'user@email.com');