<?php
    $array = [];

    for($i=0;$i<5;$i++){
        $array[] = "a" . $i;
    }

    $j=count($array);

    foreach( $array as $key => $val){
        $j--;
        unset($array[$j]);
        echo "<br>";
        var_dump($array);
        echo "<br> $key => $val ";
        echo "<br>";
}
?>



<!--

Ejecutar el script anterior. En Java eliminar elementos de un array en un
foreach implica un error ¿ también en php ? Tomar captura de pantalla del resultado

No parece haber un error
-->