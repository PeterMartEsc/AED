<?php

$pdo->exec("
create table roles(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,

    CONSTRAINT pk_roles PRIMARY KEY (id),
    CONSTRAINT uq_roles_nombre UNIQUE (nombre)
)

");

$pdo->exec("
insert into roles (id, nombre) values (1, 'usuario'), (2, 'admin');
");

?>
