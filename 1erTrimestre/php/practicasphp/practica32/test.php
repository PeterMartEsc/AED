<?php

require 'vars.php';
echo "Una $fruta $color"; // Una
echo "Una $fruta $color"; // Una manzana verde
?>

<!--
Hacer lo anterior, pero usando require en lugar de include. Para que se note la
diferencia la llamada de require debiera ser a un nombre de fichero incorrecto. Por ejemplo
haremos que llame a: vars1.php cuando como sabemos el fichero es vars.php
Tomar captura de pantalla

El include debe ir al principio del codigo o no lo detectará la primera linea


-->