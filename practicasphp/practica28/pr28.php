<?php

function sumar($a, $b, $print = false): float{
    $suma = $a + $b;
    if ($print) {
        echo "resultado suma: $suma <br>";
    }
    return $suma;

}

    $sum1=sumar(1,2);
    $sum2=sumar(4,5,true);

    echo "las operaciones para sum1 y sum2 dan: $sum1 , $sum2";
?>

<!--Modifica el código anterior y quita el valor por defecto del parámetro $print.
Ejecuta el programa y toma captura de pantalla de los mensajes del IDE y responde: ¿ se
obtiene resultado o se detiene el programa ?

Se detiene el programa, no se obtiene resultado.
-->