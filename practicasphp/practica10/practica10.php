<?php

//declare( strict_types = 1 );

$numero = 123;
$numeroStr = "" . $numero;
$resultado = "";
$multiplicador = 1;

for ($i = 0; $i < strlen($numeroStr); $i++){

    if($i == 0){
        $numeroSuelto = substr($numeroStr, $i, ($i+1));
    } else {
        $numeroSuelto = substr($numeroStr, $i, $i);
    }

    
    $resultado .= $numeroSuelto . "*" . $multiplicador." ";
    $multiplicador *= 10;
}

echo $resultado;

?>

<!--
Crear un programa en php que obtenga la descomposición de un número que
esté almacenado en la variable: $numero Por ejemplo: $numero = 3102 Se pretende que
se utilicen en el programa los operadores: .= , **
Para el ejemplo anterior se debe mostrar en pantalla: 2 * 1 + 0 * 10 + 1 * 100 + 3 * 1000
-->