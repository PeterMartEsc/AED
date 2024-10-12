<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        @for ($i = 0; $i< 3 ; $i++)
            @php  //Aquí se generan los datos aleatorios
            //La funcion time() devuelve los segundos pasados desde 1-1-1970
            $dato = time();
            sleep(1);
            @endphp
            Desde el 1-01-1970 han pasado: {{$dato}} segundos
        @endfor


</body>

</html>



