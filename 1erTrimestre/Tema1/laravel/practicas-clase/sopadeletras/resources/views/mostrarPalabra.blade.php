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
        <div class="palabra">
            <h2>La palabra es:</h2>
            <p>{{$palabra}}</p>
        </div>
    </body>
</html>

<!--

-->
