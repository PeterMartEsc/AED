<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alumno</title>
    </head>
    <body class="antialiased">
        <div class="alumno">
            {{json_encode($alumno, JSON_UNESCAPED_UNICODE)}}
        </div>
    </body>
</html>
