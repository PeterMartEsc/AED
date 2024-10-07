<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

    <div class="ficherosDir">
        <p>Lista de elementos en el directorio <b>/storage/app</b></p>
        <ul>
            @foreach ($ficheros as $elemento)
            <li>{{$elemento}}</li>
            @endforeach
        </ul>
    </div>


    </body>

</html>
