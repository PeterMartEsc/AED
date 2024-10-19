<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            h2, h4{
                font-weight: normal;
            }
        </style>
        <title>Files list</title>

    </head>
    <body class="antialiased">
        <h2>Directory: <b>{{session()->get('actualDirectory')}}</b></h2>

        <p>{{session()->get('actualDirectory')}}:</p>
        <ul>
            @foreach ($contentDir as $file)
                <li><a href="{{ route('editPublicFile', ['fileGetContent' =>$file]) }}">{{basename($file)}}</a></li><br>
            @endforeach
        </ul>
    </body>
</html>

<!--{ { route('editor', ['filename' =>$directorio]) } }-->
<!--Hay que comprobar que el que pide el enlace sea el usuario X y no cualquiera-->
<!--{ { route('editor', ['filename' =>$directorio]) } }-->
