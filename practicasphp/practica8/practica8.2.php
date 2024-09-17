<?php

//const PULGADA = 2.53;
//PULGADA = 7;

//echo $PULGADA;

const PULGADA = 8;
$PULGADA = 9;

echo $PULGADA;

function comprobarConstante(){
    echo $PULGADA;
}

comprobarConstante();

?>


<!--
    ¿ qué ámbito tienen las constantes ? ¿ realmente no se puede poner varios valores en un constante ?
    
    - Probar fuera de una función a crear constante:

    const PULGADA = 2.53;
    
    - Ahora tratar de establecerla de nuevo mediante:

    PULGADA = 7;
    const PULGADA = 8;
    $PULGADA = 9;

    - Hacer echo en cada caso.
    - Crear la constante en ámbito global ( fuera de función ) ¿ se puede acceder dentro de una
    función ? ¿ se puede establecer: const PULGADA = 10 dentro de una función ?
    - Tomar capturas de pantalla en cada caso y explicar lo que ha ocurrido

    Las constantes tienen ambito de bloque, tienen que ser definidas una vez declaradas y no pueden
    cambiar de valor.

    La variable no se puede acceder dede dentro de la función, al llamarla, dice que no está definida.

-->