<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <div class="mostrarColores">
            @foreach ($colors as $color)
                <p>{{$color}}</p>
            @endforeach
        </div>

        <form action="storeColores">
            <label for="color">Introduzca el color deseado</label></br>
            <input type="text" name="color" id="color">
            <input type="submit" value="Añadir color">
        </form>
    </body>

</html>
