<?php

$array = array(

    "espada" => "arma",
    "100" => "durabilidad",
    "usuario",
    "cofres" => "loot"

);

var_dump($array);

for($i = 0; $i < count($array);$i++){
    echo $array[$i] . "\n";
}

?>




<!--
crear un array asociativo dejando sin poner en algunas ocasiones la parte de la
clave dejando únicamente el valor ( al estilo de si fuera un array no asociativo ) hacer un
var_dump() y recorrerlo con un for ( no con un foreach) ¿ muestra algún valor ? ¿ genera
error ?

Muestra solo los valores cuyas claves no hemos sustituido por cadenas de texto, en este
caso, muestra "usuario".

-->