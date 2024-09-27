<!-- in_array-->

<?php
    $a = array('1.10', 12.4, 1.13);
    if (in_array('12.4', $a, true)) {
        echo "Se encontró '12.4' con comprobación estricta\n";
    }
    if (in_array(1.13, $a, true)) {
        echo "Se encontró 1.13 con comprobación estricta\n";
    }

    echo "<br>";
?>

<!-- array_search -->

<?php
    $array = array(0 => 'azul', 1 => 'rojo', 2 => 'verde', 3 => 'rojo');

    $clave = array_search('verde', $array);

    echo $clave . "<br>";

    $clave = array_search('marrón', $array);

    if( $clave === FALSE)
        //Cuando no se localiza, devuelve un FALSE
        echo "no se ha localizado el valor";
    else
        echo $clave;

    echo "<br>";
?>

<!-- array_values -->

<?php
    $array = array('azul', 'rojo', 'verde', 'amarillo', "blanco");
    unset($array[2]);
    unset($array[3]);

    print_r($array);

 //ahora usando array_values "limpiamos"    (A que se refiere con limpiar? los huecos en blanco?)
    $array = array_values($array);
    echo "<br>";
    print_r($array);
?>

<!--
    Ejecutar los códigos de in_array(), array_search(), array_values() tomar
    captura del resultado de la ejecución
-->