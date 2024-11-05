<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .login{
                border: solid 1px ;
                padding: 20px;
                width: 250px;
                margin: auto;
                padding-top: 5px;
            }
        </style>
        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <div class="letras">
            <form action="/mostrarPalabra">

                @for ($i = 1; $i <= 100; $i++)
                    <label for="selectorLetra{{$letras[$i-1]}}">{{$letras[$i-1]}}</label>
                    <input type="checkbox" name="selectorLetra{{$letras[$i-1]}}" id="selectorLetra">
                    @if ($i%10 == 0)
                        <br>
                    @endif
                @endfor
                <br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>

<!--

-->
