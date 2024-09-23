<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Separar por pares e impares</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p>Introduzca una cadena de numeros saprada por espacios: </p>
        <input type="text" name="numeros">
        <input type="submit" name="enviarValor" value="enviar">
    </form>
</body>
</html>

<?php

if(!isset($_REQUEST["numeros"])){
    exit();
}

$numeros = $_REQUEST["numeros"];
$array = explode(" ", $numeros); //explode funciona como preg_split pero es más limitada

function ordenarParImpar($a, $b){

    $a_par = $a % 2 === 0;  //Se está guardando como booleano
    $b_par = $b % 2 === 0;
    
    // Comparar si uno es par y el otro no, compara los booleanos
    if ($a_par !== $b_par) {
        return $a_par <=> $b_par; //aqui está devolviendo el valor, impares van antes que pares
    }

    return $a <=> $b;
}

usort($array, "ordenarParImpar");

foreach($array as $valor){

    echo "$valor <br>";
}

?>

<!--
Realizar una página con un formulario que se llame a si misma donde el
usuario introduzca en un input una cadena de números separada por espacios ( ej: 2 5 8 7 3
4 ) y muestre un número por línea, mostrando primero los números impares y luego los
pares. ( hacer uso de la función usort() y de la función explode() ) 
-->