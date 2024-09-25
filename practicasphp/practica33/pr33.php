
<?php

$texto = "Pasando datos diría.. que hay que usar urlencode";

// Codificamos el texto con urlencode
$conUrlEncode = urlencode($texto);

// Creamos un enlace con los dos parámetros: prueba (sin urlencode) y prueba2 (con urlencode)
echo "<a href='pr33.php?prueba={$texto}'>Pasando datos sin urlEnco</a>";
echo "<br><br>";
echo "<a href='pr33.php?prueba2={$conUrlEncode}'>Pasando datos con urlencode</a>";

$recibido = $_GET["prueba"] ?? "nadita";
$recibido2 = $_GET["prueba2"] ?? "nadita";

// Mostramos los resultados
echo "<h3>Se ha recibido:</h3>";
echo "prueba: " . $recibido . "<br>";
echo "prueba2: " . $recibido2 . "<br>";
?>


<!--
    Hacer lo anterior, pero se debe comprobar la diferencia de pasar el texto con
    urlencode y sin urlencode. Así que se propone poner dos parámetros: prueba y prueba2 uno
    de ellos con urlencode y el otro sin él pasando en ambos casos el mismo texto en el value.
    Tomar captura de pantalla de lo obtenido
-->