<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>

        </style>
        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <div class="crearNuevoFichero">
            <form action="/createFile">
                <input type="text" name="filename" placeholder="noname.txt">
                <button type="submit">Create</button>
            </form>
        </div>
        <div class="listaFicheros">

        </div>
    </body>
</html>

