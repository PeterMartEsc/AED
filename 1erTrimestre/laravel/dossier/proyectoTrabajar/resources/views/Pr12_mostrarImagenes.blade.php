<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            img{
                width: 350px;
                height: 200px;
            }
        </style>

    </head>
    <body class="antialiased">
        <!--Pr14-->
        Token csrf: <b>{{ csrf_token() }}<b></br></br>
        <!---->
        <img src="{{$img1}}">
        <img src="{{$img2}}">
        <img src="{{$img3}}">
        <img src="{{$img4}}">

    </body>

</html>
