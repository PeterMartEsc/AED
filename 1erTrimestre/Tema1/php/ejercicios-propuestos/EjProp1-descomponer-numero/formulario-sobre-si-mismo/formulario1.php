<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pedro Martin Escuela">
    <title>Formulario</title>
</head>
<body>
    <form action="formulario1.php" method="post">
        <label for="">Introduzca el numero:</label>
        <input type="text" id="numero" name="numero"> <!--id cliente, javascript--> <!--name servidor-->
        <input type="submit" name="enviarformnumero" id="submit" value="Enviar">
    </form>
</body>
</html>

<?php
$numDescomponer = $_REQUEST["numero"];
echo "se recibe de la petición anterior: ";

echo "varibale recibida: " . $numDescomponer  . " fin de la variable recibida";
echo "<br><br>";

if(!isset($numDescomponer))
    exit();



$resultado = "";
$multiplicador = 1;
$max = strlen($numDescomponer);

for($i = 1 ; $i<= $max;$i++){

    $numeroIndividual = ($numDescomponer%10);
    $numDescomponer = $numDescomponer/10;

    $resultado .= " " . $numeroIndividual . " * $multiplicador";

    if($i != $max){
        $resultado .= " +";
    }

    $multiplicador *= 10;
}

echo $resultado;

?>