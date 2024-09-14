<?php
    declare( strict_types=1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Pedro Martin Escuela" />
        <title>Practica 3</title>
    </head>

    <body>
        <?php
            function sum( int $a, int $b): int {
                return $a + $b;
            }

            echo "<p> la suma de uno más dos es: ";
            $resultado = sum(1,2);
            print sum(1,2);
            echo "</p>"

            //Práctica 3
            //Realizar el código anterior y tomar captura de pantalla del resultado. ¿qué es lo que ha ocurrido ?. 
            //Poner código html antes de la declaración de strict_types y probar de nuevo ¿ qué ocurre ahora ?

            //Primero, lo que pasaba es que

        ?>
    </body>
</html>

