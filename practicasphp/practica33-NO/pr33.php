
<?php
echo "<a href=index.php?prueba='Pasando datos diría.. que hay que usar urlencode'>p
asando datos</a>";

$conUrlEncode = urlencode('Pasando datos diría.. que hay que usar urlencode');

$recibido = $_GET["prueba"] ?? "nadita";

echo "<h3>se ha recibido:</h3>";

echo "prueba: ". $recibido . "<br>";

?>


<!--
    Hacer lo anterior, pero se debe comprobar la diferencia de pasar el texto con
    urlencode y sin urlencode. Así que se propone poner dos parámetros: prueba y prueba2 uno
    de ellos con urlencode y el otro sin él pasando en ambos casos el mismo texto en el value.
    Tomar captura de pantalla de lo obtenido

-->