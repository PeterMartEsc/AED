<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administrar</title>
        <style>
            .contenedorPrincipal{
                border: 2px solid black;
                padding: 10px;
                margin: auto;
                width: 250px;
                height: 300px;
            }

            form{
                display: inline;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="contenedorPrincipal">
            @foreach ($nombres as $nombre)
                <li>{{$nombre}}
                    <form action="/editarUser">
                        <input type="hidden" name="nombre" value="{{$nombre}}">
                        <input type="submit" value="Editar">
                    </form>
                    <form action="/deleteUser">
                        <input type="hidden" name="nombre" value="{{$nombre}}">
                        <input type="submit" value="Eliminar">
                    </form>
                </li>
                <br/>
            @endforeach
        </div>
    </body>
</html>
