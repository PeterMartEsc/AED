<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <div class="loginDiv">
            <form action="login" class="login">
                <label for="usuario">Introduzca su nombre de usuario</label></br></br>
                <input type="text" name="usuario" id="usuario">
                <input type="submit" value="Log-In">
            </form>
        </div>
    </body>
</html>
