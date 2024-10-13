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
            <p class="username"><b>Username:</b> {{session()->get('username')}}</p>
        </div>

        </br>

        <div class="partida">

            <div class="init">
                <form action="/start">
                    <input type="submit" name="empezar" value="Empezar/Reiniciar">
                </form>
            </div>

            <div class="manoCuprier">
                <!--Cuprier's hand is only showed because of testing interest-->
                <?php if (!isset($partida)): ?>
                    <p>Mano del cuprier: <b>No hay partida iniciada.</b></p>
                <?php else: ?>
                    <p>Mano del cuprier: <b>{{$partida->getCuprier()->getMano()}}</b></p>
                <?php endif; ?>
            </div>

            <div class="manoJugador">
                <?php if (!isset($partida)): ?>
                    <p>Mano del cuprier: <b>No hay partida iniciada.</b></p>
                <?php else: ?>
                    <p>Tu mano: <b>{{$partida->getJugador()->getMano()}}</b></p>
                <?php endif; ?>
            </div>

            <div class="robarPlantar">
                <form action="/robar">
                    <input type="submit" name="robar" value="Robar">
                </form>
                <br>
                <form action="/plantarse">
                    <input type="submit" name="plantarse" value="Plantarse">
                </form>
            </div>

            <div class="resultado">
                <?php if ((session()->get('resultado')) == null ): ?>
                    <p> </p>
                <?php else: ?>
                    <p>El resultado es: <b>{{session()->get('resultado')}}</b></p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>

<!--
    1.- Que no se borren las cartas al mostrar la puntuación (mostrar las cartas mediante sesión)
    2.- Que el cuprier no pueda coger más de 16 puntos
    3.-
-->
