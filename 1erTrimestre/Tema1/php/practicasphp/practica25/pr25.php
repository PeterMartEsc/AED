<?php

$min = 20;
$max = 25;

$array = [];

for($i = 0 ; $i < 10 ; $i++ ){
    $array[$i] = generarNumAleatorio($min, $max);
}

function generarNumAleatorio(int $min , int $max) : int{
    return rand($min, $max);
}

print_r($array);
echo "<br><br>";
$key = array_search(22, $array);
echo "El valor devuelto por el array_search es $key"

?>


<!--
Rellenar un array con 10 números aleatorios entre 20 y 25 ( hacer uso de:
rand ( int $min , int $max ) : int
) y luego hacer uso de array_search() para localizar el valor: “22” Se debe mostrar en
pantalla el array completo y el valor devuelto por array_search()
-->