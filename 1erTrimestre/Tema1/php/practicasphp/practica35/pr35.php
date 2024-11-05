<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario Tabla</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p>Introduzca el numero de la tabla: </p>
        <input type="number" name="numero">
        <input type="submit" name="enviarValor" value="enviar">
    </form>
</body>
</html>

<?php

if(!isset($_REQUEST["numero"])){
    exit();
}

$numero = intval($_REQUEST["numero"]);
$resultado = "";

if($numero < 0 || !is_int($numero)){    //No está haciendo mucho

        echo "<p id='error'>El valor introducido es negativo o no es un numero</p>";

} else {
    echo "<table><tr><td>";
    for($i = 1 ; $i <=10 ; $i++){
        $resultado .= $numero . " * " . $i . " = " . ($numero*$i) . "<br>";
    }
    echo $resultado;
    echo "</td></tr></table>";
}
?>

<!--
    Realiza una página con un formulario que se llame a si misma para mostrar la
    tabla de un número introducido por el usuario. Se deberá controlar que el usuario haya
    introducido un número entero positivo. Hacer uso para ello de la función: is_int()
    buscando su funcionamiento en el manual oficial: php.net
-->