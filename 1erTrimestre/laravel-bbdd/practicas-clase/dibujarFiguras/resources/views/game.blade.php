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
                width: 250px;
                height: 130px;
            }

            .user{
                font-size: 20px;
            }

            .tableros{
                border: 2px solid black;
                padding: 10px;
                margin: auto;
                width: 400px;
                height: auto;
            }

            .funcionesAdmin{
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
            <p class="user"><b>Bienvenido:</b> {{session()->get('nombre')}}</p>
            <p><b>Rol:</b> {{session()->get('actualRol')}}</p>

            <form action="/logout">
                <input type="submit" value="Logout">
            </form>
        </div>

        <br/>
        <br/>

        <div class="funcionesAdmin">
            @if (session()->get('actualRol') == 'admin')
                <a href="/administrarUsuarios">Administrar usuarios</a>
                <a href="/mostrarFiguras">Administrar figuras</a>

            @endif
        </div>

        <br/>
        <br/>

        <div class="tableros">
            <h5>Tableros de {{session()->get('nombre')}}</h5>

            <a href="/nombrarTablero">Crear Tablero</a>
            <br/><br/>
            @if(null !== session()->get('tablerosNames'))
                @foreach (session()->get('tablerosNames') as $tableroName)
                    <li><form action="/editarTablero">
                        <label for="tableroName">{{$tableroName}}</label>
                        <input type="hidden" name="tableroName" value="{{$tableroName}}">
                        <input type="submit" value="Editar">
                    </form></li>
                @endforeach
            @endif
        </div>


    </body>
</html>
