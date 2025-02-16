SET MODE MYSQL;

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`(
    id int AUTO_INCREMENT,
    nombre CHARACTER(50) NOT NULL,
    password CHARACTER(200) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    rol VARCHAR(45) NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
);

INSERT INTO usuarios (nombre, password, correo, rol) VALUES
( 'admin', 'hashed_password_admin', 'admin@email.com', 'ROLE_ADMIN');