<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pr 37</title>
</head>
<body>
    <div class="cabecera">
        <h1>Validación del formulario</h1>
    </div>
    <div class="cuerpo">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <?php
                if (isset($_POST['enviar']) && (!isset($_POST['nombre']))) {
                    echo '<p style="color: red;">Debe introducir su nombre.</p>';
                }
            ?>
            <label for="nombre">Nombre: </label>        <!--El label va unido a el id del input-->
            <input type="text" id="nombre" name="nombre">
            <br><br>

            <?php
            if (isset($_POST['enviar']) && (!isset($_POST['correo']))) {
                    echo '<p style="color: red;">Debe introducir su correo electrónico.</p>';
                }
            ?>
            <label for="correo">Correo: </label>
            <input type="text" id="correo" name="correo">
            <br><br>

            <?php
            if (isset($_POST['enviar']) && (!isset($_POST['paginaWeb']))) {
                    echo '<p style="color: red;">Debe introducir su dirección de página web.</p>';
                }
            ?>
            <label for="paginaWeb">Página Web: </label>
            <input type="text" id="paginaWeb" name="paginaWeb">
            <br><br>

            <?php
            if (isset($_POST['enviar']) && (!isset($_POST['comentario']))) {
                    echo '<p style="color: red;">Debe introducir un comentario.</p>';
                }
            ?>
            <label for="comentario">Comentario: </label>
            <textarea name="comentario" id="comentario">
            </textarea>
            <br><br>
            

            <?php
            if (isset($_POST['enviar']) && (!isset($_POST['genero']))) {
                echo '<p style="color: red;">Debe seleccionar su género.</p>';
            }
            ?>
            <label for="genero">Genero</label>
            <input type="radio" id="genero" name="genero" value="mujer">
            Mujer
            <input type="radio" id="genero" name="genero" value="hombre">
            Hombre
            <input type="radio" id="genero" name="genero" value="otro">
            Otro
            <br><br>

            <input type="submit" id ="enviar" name="enviar" value="Enviar">
        </form>
    </div>

    <?php

        if (isset($_POST['enviar'])) {

            if (isset($_POST['nombre'])&&(isset($_POST['correo']))&&(!isset($_POST['paginaWeb']))&&(isset($_POST['genero']))) {

                $nombre = $_POST['nombre'];

                $correo = $_POST['correo'];

                $paginaWeb = $_POST['paginaWeb'];

                $comentario = $_POST['comentario'];

                $genero = $_POST['genero'];

                print "Nombre: ".$nombre."<br/><br/>";
                print "Correo: ".$correo."<br/><br/>";
                print "Pagina Web: ".$paginaWeb."<br/><br/>";
                print "Comentario: ".$comentario."<br/><br/>";
                print "Genero: ".$genero."<br/><br/>";
            
            }

        }

    ?>
</body>
</html>


<!--
Realizar una página como la anterior que se valide a si misma. Obligando que
el correo sea válido, que el nombre no sea vacío al igual que el género. Si los datos están
correctamente introducidos se mostrarán por debajo de “Datos ingresados” si no superan la
validación se dirá los campos que no la superan con texto en rojo
-->