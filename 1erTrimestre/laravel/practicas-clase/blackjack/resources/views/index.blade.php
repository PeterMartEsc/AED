<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <style>
            .perfil{
                width: 200px;
                height: 100px;
                border: solid 2px;

                padding: 10px
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="perfil">
            <h2 class="miPerfil">Mi Perfil</h2>
            <p class="username"><b>Username:</b> {{$username}}</p>
        </div>

        <div class="partida">
            <div class="init">
                <form action="start">
                    <input type="submit" name="empezar" value="Empezar">
                </form>
            </div>
            <div class="manoCuprier">

            </div>
            <div class="manoJugador">

            </div>
        </div>
    </body>
</html>
