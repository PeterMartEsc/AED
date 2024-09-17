<?php

$base = 2;
$potenciasConcat = "";

for ($i = 1; $i <= 9; $i++){
    $potenciasConcat .= " " . $base ** $i;
    //echo $potenciasConcat;
}

echo $potenciasConcat;

?>


<!--
Crear un script que muestre las potencias del número 2 desde 2¹ hasta 2⁹ hacer
uso del operador: **
Ir concatenando las salidas en pantall de las potencias en una string mediante el operador de
concatenación y asignación: .= 
-->