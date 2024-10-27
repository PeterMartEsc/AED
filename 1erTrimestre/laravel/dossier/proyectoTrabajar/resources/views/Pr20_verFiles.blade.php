<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <ul>
            <form action="/deleteFile">
                @foreach ($archivos as $archivo)
                <li>· {{$archivo}}</li>
                <input type="hidden" name="archivo" value="{{$archivo}}"/>
                <input type="submit" value="Borar"/>
            @endforeach</form>
        </ul>

    </body>

</html>
