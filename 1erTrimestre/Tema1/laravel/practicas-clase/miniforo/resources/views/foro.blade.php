<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="name" author="Pedro Martin Escuela" >
        <title>Foro</title>
        <style>
            .historialMensajes{
                display: inline-block;
                width: 60%;
                height: 800px;
                border: solid 2px;
                padding: 10px;
            }

            .mandarMensajes{
                display: inline-block;
                position: absolute;
                margin: 10px;
                width: 30%;
                border: solid 2px;
                padding: 10px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="historialMensajes">

        </div>
        <div class="mandarMensajes">
            <div class="usuario">
                <p> <b>Usuario:</b> {{$usuario}}</p>
            </div>
            </br>
            </br>
            <div class="escribirMensaje">
                <form action="enviarMensaje">
                    <input type="hidden" name="id"/>
                    <label for="tituloMensaje">Titulo del Mensaje</label>
                    <input type="text" name="tituloMensaje"></br></br>
                    <label for="cuerpo">Mensaje</label></br>
                    <textarea name="cuerpo" id="cuerpo" cols="30" rows="10"></textarea></br></br>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </body>
</html>
