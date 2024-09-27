<?php
    function modify(int &$a): void {
        $a = 3;
    }
    $a = 2;
    modify($a);
    print_r($a);
?>

<!--
Ejecutar el ejemplo y observar que ahora la variable sí se ve modificada.
Tomar captura de pantalla-->