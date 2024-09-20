<?php

echo $numDescomponer = $_REQUEST["numero"];
echo "<br><br>";

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