<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>
    </head>
    <body class="antialiased">
        <div>
            <form action="/register">
                <label for="username">
                    Nombre de usuario
                    <input type="text" id="username" name="username" placeholder="username">
                </label>
                <br/>
                <label for="password">
                    Contraseña
                    <input type="password" id="password" name="password" placeholder="password">
                </label>
                <br/>
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>
