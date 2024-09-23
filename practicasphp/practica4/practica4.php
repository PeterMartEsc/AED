<?php
    declare( strict_types=1);
?>
<!DOCTYPE html>
<html> 
    <head>
    <meta charset="UTF-8">
    <title></title>
    </head>
<body>
    <?php
        function fun( int $a, int $b): int {
            $a = "o";
            //return $a;
            return $b ;
        }
        print fun(1,2);
        print fun("e",3);
        echo "</p>"
    ?>
</body>
</html>

<!-- Tomar captura de pantalla de: ( y explicar lo ocurrido )
- probar el código anterior ¿ da error ? Por qué ?
- quitar el comentario a: return $a; ¿ da error ahora ?por qué ?
- quitar comentario a: print fun(“e”,3); ¿ da error ?

- No da error, por que está devolviendo la b, que está restringido a entero y está devolviendo un entero
- Da error, por que está restringido a enteros y el a ha sido refactorizado a string
- Da error, por que se le está introduciendo un string y sigue devolviendo un string, cuando los tipos están restringidos a entero -->