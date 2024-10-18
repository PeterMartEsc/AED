<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

        <div class="formulario">
            <form action="/almacenarInfo">
                <label for="name">Nombre:</label></br>
                <input type="text" name="name" id="name"><br><br>

                <label for="edad">Edad:</label></br>
                <input type="number" name="edad" id="edad"><br><br>

                <label for="email">Correo electrónico:</label></br>
                <input type="text" name="email" id="email"></br><br>

                <input type="submit" value="Enviar">
            </form>
        </div>

        <div class="infoUsuario">
            <p>Nombre: <b>{{session()->get('name');}}</b></p>
            <p>Edad: <b>{{session()->get('edad')}}</b></p>
            <p>Email: <b>{{session()->get('email')}}</b></p>

        </div>

    </body>

</html>
