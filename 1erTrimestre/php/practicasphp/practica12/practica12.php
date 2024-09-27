<?php
    $array = array('uno' => 1, 'dos' => 2, 'tres' => 40, 'cuatro' => 55);
    $cadena = "La posición 'tres' contiene el dato {$array['tres']}";
    echo $cadena;
?>


<!--
    Probar el script anterior y observar que ocurre. ¿ qué mensaje de error se
    observa ?

    Se muestra un error de sintaxis, dice que se ha contrado un elemento inesperado en el string
-->