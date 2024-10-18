<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

    <div class="formCrearDir">
        <form action="procesarCrearDirectorio" class="formulario" method="get">
            <label for="">Nombre del directorio a crear</label>
            <input type="text" name="nombreDirectorio" id="nombreDirectorio">
            <input type="submit" value="Crear">
        </form>
    </div>


    </body>

</html>
