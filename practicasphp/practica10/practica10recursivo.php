<?php

function descomponerRecursivo($num, $exponent = 0){
    //1234/10 + "*10" + 1234%10
    if($sum/10 < 1){
        return $sum . " * " . (10**$exponent);
    }

    return ($num%10) . " * " . (10**$exponent) . " + " . descomponerRecursivo(floor($num/10), ++$exponent);
}

echo descomponerRecursivo(123);

?>