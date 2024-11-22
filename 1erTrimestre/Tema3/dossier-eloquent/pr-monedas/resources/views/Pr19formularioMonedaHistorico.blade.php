<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <div class="contenedor-principal">

            <div class="formuilario">
                <form action="/createMonedaHistorico">
                    <label for="monedaNombre">
                        Nombre moneda
                        <input type="text" name="monedaNombre" id="monedaNombre">
                    </label><br/>
                    <label for="monedaPais">
                        Pais Moneda
                        <input type="text" name="monedaPais" id="monedaPais">
                    </label><br/>
                    <label for="equivalenteEuro">
                        Equivalencia al euro
                        <input type="text" name="equivalenteEuro" id="equivalenteEuro">
                    </label><br/>
                    <input type="submit" value="Crear">
                </form>
            </div>
            
        </div>
    </body>
</html>
