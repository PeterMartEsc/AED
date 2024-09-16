<?php

const PULGADA = 2.53;
//PULGADA = 7;

echo $PULGADA;

const PULGADA = 8;
$PULGADA = 9;

echo $PULGADA;

?>


<!--
    ¿ qué ámbito tienen las constantes ? ¿ realmente no se puede poner varios valores en un constante ?
    
    Probar fuera de una función a crear constante:
    const PULGADA = 2.53;
    
    - Ahora tratar de establecerla de nuevo mediante:
    PULGADA = 7;
    const PULGADA = 8;
    $PULGADA = 9;

    - Hacer echo en cada caso.

    - Crear la constante en ámbito global ( fuera de función ) ¿ se puede acceder dentro de una
    función ? ¿ se puede establecer: const PULGADA = 10 dentro de una función ?
    - Tomar capturas de pantalla en cada caso y explicar lo que ha ocurrido
-->