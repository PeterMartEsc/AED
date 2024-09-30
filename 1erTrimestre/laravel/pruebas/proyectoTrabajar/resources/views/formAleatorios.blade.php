<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">

    <div class="contenedorPrincipal">
                    <!--Funcion a la que tiene que llegar-->
        <form action="procesarFormulario" class="formulario" method="get">
            <label for="max">Introduzca valor maximo aleatorio</label>
            <input type="text" name="max">
            <label for="max">Introduzca valor minimo aleatorio</label>
            <input type="text" name="min">
            <label for="max">Introduzca la cantidad de numeros a obtener</label>
            <input type="text" name="vueltas">
            <input type="submit" value="Enviar">
        </form>
    </div>


    </body>

</html>

