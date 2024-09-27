<?php

$mivar = [];
array_push($mivar,"uno");
$arr1 = $mivar;
$arr2 = &$mivar;

$arr1[0] = "una variación";
$arr2[0] = "variando array2";

var_dump($mivar[0]);
var_dump($arr1[0]);
?>


<!--
Practica 5.2:

var_dump($mivar) nos muestra el contenido de la variable $mivar 
- Crear un array: $mivar = []; 
- Introducir datos: array_push($mivar,”uno”); y hacer una asignación a otras variables. 

Una por referencia y la otra por valor:
$arr1 = $mivar;
$arr2 = &$mivar;

- Modificar la posición cero de esas variable : $arr1[0] = “una variación”; $arr2[0] = “variando array2 ”; 
y mostrar el contenido de $mivar[0] y $arr1[0] ¿qué es lo que ha ocurrido? (tomar captura de pantalla y explicarlo)


Ha ocurrido que se ha cambiado el valor de 

-->