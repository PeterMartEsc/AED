SET MODE MYSQL;

DROP TABLE IF EXISTS `partidas`;
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`(
    id int AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    rol VARCHAR(45) NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
);

CREATE TABLE `partidas`(
    id int AUTO_INCREMENT,
    jugador1 int,
    jugador2 int,
    contenido TEXT NOT NULL,
    turno int,
    ganador int,
    CONSTRAINT pk_partidas PRIMARY KEY(id),
    CONSTRAINT fk_jugador1 FOREIGN KEY (jugador1) REFERENCES usuarios(id) ON DELETE SET NULL,
    CONSTRAINT fk_jugador2 FOREIGN KEY (jugador2) REFERENCES usuarios(id) ON DELETE SET NULL,
    CONSTRAINT fk_turno FOREIGN KEY (turno) REFERENCES usuarios(id) ON DELETE SET NULL,
    CONSTRAINT fk_ganador FOREIGN KEY (ganador) REFERENCES usuarios(id) ON DELETE SET NULL
);


INSERT INTO usuarios (nombre, password, correo, rol) VALUES
( 'admin', '$2a$10$fZQuegrY10Ic1f9rl9DbZuGkWnpTJqjA5oof7dt4oUHpOm9ME09.q', 'admin@email.com', 'ROLE_ADMIN'),
( 'Pedro', '$2a$10$fZQuegrY10Ic1f9rl9DbZuGkWnpTJqjA5oof7dt4oUHpOm9ME09.q', 'example@email.com', 'ROLE_USER'),
( 'John', '$2a$10$fZQuegrY10Ic1f9rl9DbZuGkWnpTJqjA5oof7dt4oUHpOm9ME09.q', 'example2@email.com', 'ROLE_USER');

INSERT INTO partidas (jugador1, jugador2, contenido, turno, ganador) VALUES
(2, 3, '[["X","X","X"],["X","0","0"],["0","X","0"]]', 2, 3),
(3, null, '[[" "," "," "],[" "," "," "],[" "," "," "]]', null, null);