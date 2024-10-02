<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        @php
            for($i = 0; $i< 3 ; $i++){
                $dato = time();
                sleep(1);
                Desde el 1-01-1970 han pasado: {{$dato}} segundos
            }
        @endphp

            Desde el 1-01-1970 han pasado: {{$dato}} segundos

    </body>

</html>



