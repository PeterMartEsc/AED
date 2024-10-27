<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <style>
            .login-form{
                margin: auto;
                border: 2px solid black;
                padding: 10px;
                width: 200px;
                height: 150px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="login-form">
            {{isset($mensajeRegister) ? $mensajeRegister : ''}}
            <form action="/login">
                <label for="nombre">
                    Nombre de usuario <br/>
                    {{isset($mensajeUser) ? $mensajeUser : ''}}
                    <input type="text" id="nombre" name="nombre" placeholder="nombre">
                </label>
                <br/><br/>
                <label for="password">
                    Contraseña <br/>
                    {{isset($mensajePassw) ? $mensajePassw : ''}}
                    <input type="password" id="password" name="password" placeholder="password">
                </label>
                <br/><br/>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>
