<?php

$array = [];

for($i = 1; $i<=10;$i++){
    $array[$i-1] = $i;
    echo "El array queda: <br>";
    print_r($array);
    echo "<br>";
}

echo "<br><br>";

for($i = 1; $i<=5;$i++){
    array_pop($array);
    echo "El array después del 'pop' queda: <br>";
    print_r($array);
    echo "<br>";
}


?>


<!--
Crear un script que por medio de un bucle for que vaya de 1 a 10 agregue esos números en un array
En cada iteración mostrar el contenido del array. Después en un bucle for de 1 a 5 ir ejecutando 
sentencias array_pop() y mostrar como queda el array en cada iteración

-->