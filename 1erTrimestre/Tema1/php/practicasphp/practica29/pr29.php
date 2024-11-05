
<?php
    function modify(int $a): void {
        $a = 3;
    }
    $a = 2;
    modify($a);
    print_r($a);
?>

<!--
Probar el código anterior. Observamos que no se ha modificado el valor de la
variable después de la ejecución de la función Así que ¿ estamos en un caso de paso por
valor o por referencia ? Tomar captura de pantalla

Es un caso de paso por valor
-->