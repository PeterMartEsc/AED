<?php

    for($i=0;$i<10;$i++){
        $variable = "dato";
        ${$variable.$i} = $i;
        //echo ${"dato".$i};
    }

    echo "<br> $dato3 ";
    echo "<br> $dato8 ";
?>

<!--
    Toma el código anterior e introduce una expresión “variable de variables” que
    permita definir las variables: $dato0, $dato1, …, $dato9 Cada una de ellas con el valor
    correspondiente: 0, 1,…,9


-->
