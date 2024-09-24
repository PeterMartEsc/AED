<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<meta http-equiv="refresh" content="5" />   Cada 5 seg refresca la ventana-->
    <link rel="stylesheet" href="acertar-numero.css">
    <title>Acertar Numero</title>
</head>
<body>
    <div class="contenedorPrincipal">
        <h1>Numer Secreto</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="numero">Introduzca un numero entre 1 y 100:</label>
            <input type="number" id="numero" name="numero">
            <input type="submit" value="Comprobar">
            <p id="mensaje"></p>
        </form>
    </div>
    <?php

        echo "Sesión de: " . $_SESSION["username"]  . "<br><br>";
        $username = $_SESSION["username"];


        if(!file_exists("numero.txt")){
            $numeroRandom = rand(1,100);
            file_put_contents("numero.txt" , $numeroRandom . "\n");
            //echo "El numero $numeroRandom ha sido almacenado";
        }

        if(!isset($_POST["numero"])){
            exit();
        }


        $numeroIntentado = intval($_POST["numero"]);
        $numeroAcertar = file_get_contents("numero.txt");

        echo "<br>El numero almacenado es: $numeroAcertar <br><br>";

        if(!file_exists("historial.txt")){
            file_put_contents("historial.txt" , " ");
        }

        if($numeroIntentado < $numeroAcertar){
            $historial = file_get_contents("historial.txt");
            echo $historial;
            echo "<br><br>" . $username . " intento ". $numeroIntentado ."< ELEGIDO";
            file_put_contents("historial.txt" , "<br><br>". $username. " intentó " . $numeroIntentado . "< ELEGIDO" ."\n", FILE_APPEND);

        } elseif($numeroIntentado > $numeroAcertar){
            $historial = file_get_contents("historial.txt");
            echo $historial;
            echo "<br><br>" . $username . " intento ". $numeroIntentado ."> ELEGIDO";
            file_put_contents("historial.txt" , "<br><br>". $username. " intentó " . $numeroIntentado . "> ELEGIDO" ."\n", FILE_APPEND);

        } else {
            echo $historial;
            echo "<h3>Has acertado el numero</h3>";
            
            unlink("numero.txt"); // Borra el archivo cuando se acierta
            unlink("historial.txt"); // Borra el archivo cuando se acierta
            ?>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
                <button type="submit">Jugar de nuevo</button>
            </form>

            <?php
        }
        
    ?>
</body>
</html>

<!--
    Las coockies se guardan en el cliente.
    El navegador es como un sandbox para que no pueda tocar nada del cilente, solo puede accceder a un almacenamiento, las cookies.
    
    Las Cookies es una información que t da el servidor
    sesid = el token identificativo de la sesión. Conservar el id para conservar la informacion del usuario. 
    Va en la cabecera y se envía al servidor en cada petición. Este lo comprueba y carga la información.
-->

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