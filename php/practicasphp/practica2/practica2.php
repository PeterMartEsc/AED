<?php

$un_bool = TRUE; //booleano

$un_str = "foo"; //cadena de caracteres con doble comilla

$un_str2 = 'foo'; //cadena de caracteres con comilla simple

$un_int = 12; //número entero


echo gettype($un_bool); // imprime: boolean
echo gettype($un_str); // imprime: string

// Si este valor es un entero, incrementarlo en cuatro

if (is_int($un_int)) {
    $un_int += 4;
}

// Si $un_bool es una cadena, imprimirla
// (no imprime nada)
if (is_string($un_bool)) {
    echo "Cadena: $un_bool";
}

echo $un_str + $un_int;

echo $un_str + $un_str2;

//Práctica 2
//Crear el script anterior. Modificarlo para sumar a $un_str el valor de $un_int y mostrarlo en pantalla ¿ qué ocurre ? .
//Sumar $un_str con $un_str2 ¿ qué ocurre ? ¿ se puede concatenar una cadena con comillas simples con una con comillas dobles ?

//Al sumar $un_int a $un_str da error, por que el primero es un entero y el segundo un string
//Al sumar $un_str con $un_str2 da error también, por que no se pueden concatenar dos string con diferentes tipos de comilla.

?>

