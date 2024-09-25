
<?php

$texto = "Pasando datos diría.. que hay que usar urlencode";

// Codificamos el texto con urlencode
$conUrlEncode = urlencode($texto);

// Creamos un enlace con los dos parámetros: prueba (sin urlencode) y prueba2 (con urlencode)
echo "<a href='pr34.php?prueba={$texto}'>Pasando datos sin urlEnco</a>";
echo "<br><br>";
echo "<a href='pr34.php?prueba2={$conUrlEncode}'>Pasando datos con urlencode</a>";

$recibido = $_GET["prueba"] ?? "nadita";
$recibido2 = $_GET["prueba2"] ?? "nadita";

// Mostramos los resultados
echo "<h3>Se ha recibido:</h3>";
echo "prueba: " . $recibido . "<br>";
echo "prueba2: " . $recibido2 . "<br>";

foreach ($_GET as $clave => $valor) {
    echo "Clave: $clave, Valor: $valor <br>";
}

?>

<!--
    recorrer el array $_GET con un foreach y mostrar el conjunto de clave valor
    para la actividad anterior
-->