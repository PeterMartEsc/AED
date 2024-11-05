<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .crearNuevoFichero{
                border: solid 1px ;
                padding: 20px;
                width: 250px;
                margin: auto;
                padding-top: 5px;
            }

            .listaFicheros{
                border: solid 1px ;
                padding: 20px;
                width: 250px;
                margin: auto;
            }

            .dataUser{
                border: solid 1px ;
                padding: 20px;
                width: 250px;
                margin: auto;
                padding-top: 5px;
            }

            h2, h4{
                font-weight: normal;
            }
        </style>
        <title>Home app</title>

    </head>
    <body class="antialiased">
        <div class="dataUser">
            <h2>Wellcome <b>{{session()->get('username')}}</b></h2>
            <h4>Currently number of files <b>0</b></h4>
            <form action="/logout">
                <input type="submit" value="Log-Out">
            </form>
        </div>
        <br>
        <br>
        <div class="crearNuevoFichero">
            <h2>Create new <b>private</b> file</h2>
            <form action="/createFile">
                <input type="text" name="filename" placeholder="file name">
                <input type="submit" value="Create">
            </form>

            <h2>Create new <b>public</b> file</h2>
            <form action="/createPublicFile">
                <input type="text" name="filename" placeholder="file name">
                <input type="submit" value="Create">
            </form>
        </div>

        </br>
        </br>

        <div class="listaFicheros">
            <h2>List of <b>private</b> files</h2>
            <ul>
                @foreach (session()->get('dirList') as $directorio)
                    <li><a href="{{ route('listFiles', ['dirName' =>$directorio]) }}">{{$directorio}}</a></li>
                @endforeach
            </ul>
            <h2>List of <b>public</b> files</h2>
            <ul>
                @foreach (session()->get('publicDirList') as $directorio)
                    <li><a href="{{ route('listPublicFiles', ['publicDirList' =>$directorio]) }}">{{$directorio}}</a></li>
                @endforeach
            </ul>
        </div>
    </body>
</html>

<!--{ { route('editor', ['filename' =>$directorio]) } }-->
<!--Hay que comprobar que el que pide el enlace sea el usuario X y no cualquiera-->
<!--{ { route('editor', ['filename' =>$directorio]) } }-->
