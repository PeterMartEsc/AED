<?php
    $foo = 'Bob'; // Asigna el valor 'Bob' a $foo
    $bar = &$foo; // Referencia $foo vía $bar.
    $bar = "Mi nombre es $bar"; // Modifica $bar...
    echo $foo; // $foo también se modifica.
    echo $bar;

    $numero1 = 3;
    $numero2 = &$numero1;
    $numero2 = 5;

    echo $numero2;
    echo $numero1;
?>

<!-- 

Practica 5.1: Probar el código anterior. Probar ahora con números ¿ también funcionan las
referencias ?

Si, con numeros también funcionan las referencias

-->

