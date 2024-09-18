<?php
    $array = array('perro', 'gato', 'avestruz');
    
    foreach ($array as $key => $val) {
        print "<br>array[ $key ] = $val";
    }
?>


<!--

Ejecutar el script anterior. ¿ Tenemos que usar los nombres de variables $key
y $val ? Sustituir por otros nombres de variables y ver si hay algún problema

No, no es necesario utilizar estos nombres, aun que si es recomendado para que
sean representativos, pero al utilizar otros nombres en las variables, sigue 
funcionando, supongo que por que se le asigna su función en el propio for each?

-->