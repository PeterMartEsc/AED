<?php

function cmp($a, $b){

    //if ($a == $b) {
      //  return 0;
    //}

    return ($a <=> $b);
}

$array = array(7,2,8,1,9,4);

$key = array_search(4, $array);
echo "El elemento 4 antes del usort está en la posición: $key";
echo "<br>";

print_r($array);
echo "<br><br>";

usort($array, "cmp");

$keyAFT = array_search(4, $array);
echo "El elemento 4 después del usort está en la posición: $keyAFT";
echo "<br>";
print_r($array);


//foreach ($array as $valor) {
    //echo " $valor, ";
//}

?>


<!--
    Crear un array con los valores: [7,2,8,1,9,4] Hacer búsqueda con
    array_search() de: 4
    Ordenar el array con usort y repetir la búsqueda de: 4
    Mostrar los array antes y después de ordenación así como lo que devuelve array_search()
-->