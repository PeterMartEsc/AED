<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <div class="crearFichero">
            <form action="/fileupload" enctype='multipart/form-data' method="post">
                @csrf
                <label for="fichero">Nombre fichero</label>
                <input type="file" name="myfile" id="fichero">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre", id="nombre">
                <label for="correo">Correo</label>
                <input type="text" name="correo" id="correo">
                <input type="submit" value="Crear">
                </form>
        </div>

    </body>

</html>
