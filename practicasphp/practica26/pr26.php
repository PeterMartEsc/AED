<?php

function cmp($a, $b){

    //if ($a == $b) {
      //  return 0;
    //}

    return ($a <=> $b);
}

$a = array(3, 2, 5, 6, 1);

usort($a, "cmp");

foreach ($a as $valor) {
    echo " $valor, ";
}

?>

<!--
Variar el ejemplo anterior para que se haga uso del operador nave espacial:
<=>
-->