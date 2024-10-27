<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Game</title>
        <style>
            .profile{
                border: 2px solid black;
                padding: 10px;
                margin: auto;
                width: 200px;
                height: 100px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="profile">
            <h2>Bienvenido: {{session()->get('nombre')}}</h2>

            <form action="/logout">
                <input type="submit" value="Logout">
            </form>
        </div>
    </body>
</html>
