<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="name" author="Pedro Martin Escuela" >
        <title>Log-in</title>
    </head>
    <body class="antialiased">
        <form action="foro">
            <label for="log-in">Nombre de Usuario</label>
            <input type="text" name="log-in">
            <input type="submit" value="Log-In">
        </form>
    </body>
</html>
