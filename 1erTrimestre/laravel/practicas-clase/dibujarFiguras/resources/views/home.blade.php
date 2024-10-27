<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div>
            <h2>Bienvenido</h2>
            <p>Esta es la web para dibujar con figuras. Elija que quiere hacer:</p></br>
            <form action="/selectLogin">
                <input type="submit" value="Log-in">
            </form>

            <form action="/selectRegister">
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>
