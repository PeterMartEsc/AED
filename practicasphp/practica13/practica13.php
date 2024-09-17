<?php
    $variable = 'dato';
    $dato = 5;
    echo ${$variable}.'<br>';
?>

<!--
Probar el script anterior y observar que ocurre. Probar ahora con llaves:
${$variable} ¿ hay diferencia ?

No parece haber diferencia, se muestra el 5 también. 
En cao de colocarle los corchetes a todo, si dice que no encuentra la variable $dato

-->