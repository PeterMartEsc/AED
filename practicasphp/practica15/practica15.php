<?php
    $array = [];
    //$array();
    $array[2]="mensaje";
    var_dump($array);
    $array[7]="lalala!";
    var_dump($array);
    $array[]="yepa yepa!!";
    var_dump($array);
?>



<!--
    Ejecutar el script anterior 

    - ¿ se muestran las posiciones anteriores a la 2 ? 
    -¿ y entre la 2 y la 7 ? 
    
    - Realizar el mismo script pero en lugar de crear el array mediante los
    corchetes: $array = [] hacerlo con la función array() 
    
    - ¿ hay diferencias en la salida en pantalla ? 
    - Ejecutar var_dump($array) después de cada asignación de un valor al array.
    - Tomar captura de pantalla de los resultados


    Con los corchetes, no se muestran las posiciones anteriores al 2 ni entre el 2 y el 7.
    Hay diferencia, dice que no están definidos los valores de cada array
-->