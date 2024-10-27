<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>
        <style>
            .register-form{
                margin: auto;
                border: 2px solid black;
                padding: 10px;
                width: 200px;
                height: 150px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="register-form">
            <form action="/register">
                <label for="nombre">
                    Nombre de usuario
                    <input type="text" id="nombre" name="nombre" placeholder="nombre">
                </label>
                <br/><br/>
                <label for="password">
                    Contraseña
                    <input type="password" id="password" name="password" placeholder="password">
                </label>
                <br/><br/>
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>
