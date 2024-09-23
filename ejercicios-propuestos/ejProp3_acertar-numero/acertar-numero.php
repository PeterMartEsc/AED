<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acertar Numero</title>
</head>
<body>
    <h1>Numer Secreto</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="numero">Introduzca un numero entre 1 y 10:</label>
        <input type="number" id="numero" name="numero">
        <input type="submit" value="Comprobar">
        <p id="mensaje"></p>
    </form>
    <?php

        if(!file_exists("numero.txt")){
            $numeroRandom = rand(1,10);
            file_put_contents("numero.txt" , $numeroRandom . "\n");
            //echo "El numero $numeroRandom ha sido almacenado";
        }

        if(!isset($_POST["numero"])){
            exit();
        }

        $numeroIntentado = intval($_POST["numero"]);

        //echo "El numero escogido es $numeroIntentado <br><br>";


        $numeroAcertar = file_get_contents("numero.txt");

        echo "<br>El numero almacenado es: $numeroAcertar <br><br>";

        if($numeroIntentado < $numeroAcertar){
            echo "El numero introducido es menor que el ELEGIDO";
        } elseif($numeroIntentado > $numeroAcertar){
            echo "El numero introducido es mayor que el ELEGIDO";
        } else {
            echo "Has acertado el numero";
            unlink("numero.txt"); // Borra el archivo cuando se acierta
            ?>
            <p>Quiere jugar otra vez?</p>
            <a href="acertar-numero.php">Si</a>
            <?php
        }

    ?>
</body>
</html>



<!--
$fecha_actual = date("Y-M-D H:i:S");
$file_put_contents("nombre.archivo" , $fecha_actual . "\n", FILE_APPEND); Por defecto, sin el append lo sustituye

echo "Guardado";
$fecha_guardada = file_get_contents("nombre.archivo");

echo "Ultima fecha y hora guardada : $fecha_guardada";

fopen("numero.txt", "w");
    fwrite("numero.txt", $numeroRandom);
    fclose("numero.txt", $numeroRandom);

    else {
            echo "Has acertado el numero";
            unlink("numero.txt"); // Borra el archivo cuando se acierta
        }
-->