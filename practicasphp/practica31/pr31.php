
<?php
    function modify(array $arr): void {
        $arr[] = 4;
    }
    $a = [1];

    modify($a);
    print_r($a);
?>

<!--

Hacer lo anterior, comprobar el resultado. Ahora debiera mostrar todos los
datos del array. Tomar captura de pantalla.

Vuelve a ser por valor
-->