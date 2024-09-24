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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <?php
            // Inicializar variables para mensajes de error
            $error_nombre = "";
            $error_correo = "";
            $error_paginaWeb = "";
            $error_comentario = "";
            $error_genero = "";

            // Verificar si el formulario ha sido enviado
            if (isset($_POST['enviar'])) {
                // Validar nombre
                if (empty($_POST['nombre'])) {
                    $error_nombre = "Debe introducir su nombre.";
                }

                // Validar correo
                if (empty($_POST['correo'])) {
                    $error_correo = "Debe introducir su correo electrónico.";
                }

                // Validar página web
                if (empty($_POST['paginaWeb'])) {
                    $error_paginaWeb = "Debe introducir su dirección de página web.";
                }

                // Validar comentario
                if (empty($_POST['comentario'])) {
                    $error_comentario = "Debe introducir un comentario.";
                }

                // Validar género
                if (empty($_POST['genero'])) {
                    $error_genero = "Debe seleccionar su género.";
                }

                // Si no hay errores, procesar el formulario
                if (empty($error_nombre) && empty($error_correo) && empty($error_paginaWeb) && empty($error_comentario) && empty($error_genero)) {
                    $nombre = htmlspecialchars($_POST['nombre']);
                    $correo = htmlspecialchars($_POST['correo']);
                    $paginaWeb = htmlspecialchars($_POST['paginaWeb']);
                    $comentario = htmlspecialchars($_POST['comentario']);
                    $genero = htmlspecialchars($_POST['genero']);

                    echo "<h3>Formulario enviado correctamente</h3>";
                    echo "Nombre: " . $nombre . "<br/>";
                    echo "Correo: " . $correo . "<br/>";
                    echo "Página Web: " . $paginaWeb . "<br/>";
                    echo "Comentario: " . $comentario . "<br/>";
                    echo "Género: " . $genero . "<br/>";
                }
            }
            ?>

            <!-- Mostrar errores -->
            <p style="color: red;"><?php echo $error_nombre; ?></p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <br><br>

            <p style="color: red;"><?php echo $error_correo; ?></p>
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo">
            <br><br>

            <p style="color: red;"><?php echo $error_paginaWeb; ?></p>
            <label for="paginaWeb">Página Web:</label>
            <input type="text" id="paginaWeb" name="paginaWeb">
            <br><br>

            <p style="color: red;"><?php echo $error_comentario; ?></p>
            <label for="comentario">Comentario:</label>
            <textarea name="comentario" id="comentario"></textarea>
            <br><br>

            <p style="color: red;"><?php echo $error_genero; ?></p>
            <label for="genero">Género:</label>
            <input type="radio" id="genero_mujer" name="genero" value="mujer">
            Mujer
            <input type="radio" id="genero_hombre" name="genero" value="hombre">
            Hombre
            <input type="radio" id="genero_otro" name="genero" value="otro">
            Otro
            <br><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar">
        </form>
    </div>
</body>
</html>
