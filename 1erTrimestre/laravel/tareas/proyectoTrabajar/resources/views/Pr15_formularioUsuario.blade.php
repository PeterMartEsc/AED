<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <form action="/almacenarInfo" method="POST">
            <label for="name">Nombre:</label></br>
            <input type="text" name="name" id="name">

            <label for="edad">Edad:</label></br>
            <input type="number" name="edad" id="edad">

            <label for="email">Correo electrónico:</label></br>
            <input type="text" name="email" id="email"></br>

            <input type="submit" value="Enviar">
        </form>

    </body>

</html>
