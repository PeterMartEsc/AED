<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <h3>Son las {{$hora}}</h3>

        <table>
            <th>Número primo</th>
            @foreach ($coleccion as $primo)
                <tr>
                    <td>{{$primo}}</td>
                </tr>
            @endforeach
        </table>

    </body>

</html>
