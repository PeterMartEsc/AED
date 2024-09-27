
<?php

$array = [];

for($i = 1; $i<=10;$i++){
    array_unshift($array, $i);
    echo "El array queda: <br>";
    print_r($array);
    echo "<br>";
}

echo "<br><br>";

for($i = 1; $i<=5;$i++){
    array_shift($array);
    echo "El array después del 'shift' queda: <br>";
    print_r($array);
    echo "<br>";
}


?>


<!--

Crear un script que por medio de un bucle for que vaya de 1 a 10 agregue esos
números en un array mediante array_unshift() En cada iteración mostrar el contenido del
array. Después en un bucle for de 1 a 5 ir ejecutando sentencias array_shift() y mostrar
como queda el array en cada iteración

-->