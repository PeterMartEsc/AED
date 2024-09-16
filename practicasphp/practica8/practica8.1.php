<?php
    $unavar = 1.3;
    var_dump($unavar);
    echo "<br>";
    $unavar = (int) $unavar;
    var_dump($unavar);
 ?>

<!-- 
    Ejecutar el script anterior ¿ hay alguna diferencia antes y después del cast ?
    Tomar captura de pantalla

    Si hay diferencias, se cambia el tipo de variable de float a int y además se trunca el numero
    de 1.3 a 1
-->