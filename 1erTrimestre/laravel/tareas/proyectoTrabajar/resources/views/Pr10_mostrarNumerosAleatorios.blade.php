
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <h3>Numeros mayores que 50</h3>
        <p>Lista de numeros: {{print_r($listaAleatorios)}}</p>
        @foreach ($listaAleatorios as $numero)
            @if( $numero >= 50 )
                <p>{{ $numero }}</p><br>
            @endif
        @endforeach

        <h3>Numeros menores que 50</h3>
        @foreach ($listaAleatorios as $numero)
            @if( $numero < 50 )
                <p>{{ $numero }}</p><br>
            @endif
        @endforeach

    </body>

</html>

