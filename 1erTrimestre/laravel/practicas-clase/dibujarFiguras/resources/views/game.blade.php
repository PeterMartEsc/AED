<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Game</title>
    </head>
    <body class="antialiased">
        <div class="profile">
            <h2>Bienvenido: {{session()->get('username')}}</h2>
        </div>
    </body>
</html>
