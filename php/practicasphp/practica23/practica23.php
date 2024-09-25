<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="author" content="Pedro Martín Escuela">
    <title>Tabla SERVER php</title>
</head>
<body>
    <div class="contenedorTabla">
        <?php
            //print_r($_SERVER);
            echo "<table>";
            foreach ($_SERVER as $key => $val) {
                
                echo "<tr><td>{$key}</td><td>{$val}</td></tr>";  
                
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>




<!--

Haz una página PHP que utilice foreach para mostrar todos los valores del
array $_SERVER en una tabla con dos columnas. La primera columna debe contener el
nombre de la variable, y la segunda su valor

-->