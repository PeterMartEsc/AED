<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tablero</title>
        <style>

            .contenedorCeldas{
                margin: auto;
                text-align: center;
            }

            .celdas{
                margin: auto;
                display: grid;
                grid-template-columns: repeat(7, 1fr); /* Tres columnas de igual ancho */
                grid-template-rows:  repeat(4, 1fr);
                gap: 5px;

                border: 2px solid black;
                width: 600px;

                padding: 5px;
            }

            .celda{
                background-color: grey;
                padding: 10px; /* Espacio interno de los elementos */
                text-align: center;
            }

            .figuras{
                margin: auto;

                display: grid;
                grid-template-columns: repeat(13, 1fr);
                grid-template-rows: repeat(2, 1fr);
                gap: 5px;

                width: 400px;
                text-align: center;
                /*border: solid 1px black;*/
            }

            .imgFiguras{
                width: 30px;
                height: 30px;
            }

            .dibujo{
                margin: auto;

                display: grid;
                grid-template-columns: repeat(7, 1fr); /* Tres columnas de igual ancho */
                grid-template-rows:  repeat(4, 1fr);
                gap: 2px;

                border: 2px solid black;
                width: 860px;

                padding: 10px;
            }

            .dibujoCasillas{
                width: 120px;
                height: 120px;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="contenedorCeldas">

            <h2>Seleccionar Figura</h2>
            <br>

            <form action="/colocarFiguras">


                <div class="figuras">
                    @for ($i = 0; $i < count($imagenes); $i++)
                        <label>
                            <img class="imgFiguras" src="data:image/jpeg;base64,{{ $imagenes[$i] }}" alt="">
                            <input type="radio" name="figura" id="figura{{$i+1}}" value="{{$i+1}}">
                        </label>
                        <br>
                    @endfor
                </div>

                <br>
                <h2>Seleccionar celdas para la figura elegida</h2>

                <div class="celdas">
                    @for ($i = 0; $i < 28 ; $i++)
                        <div class="celda">
                            <input type="radio" name="posicion{{$i}}" id="posicion{{$i}}" value="{{$i}}">
                        </div>
                    @endfor
                </div>

                <br/>
                <input type="submit" value="Establecer">

            </form>
        </div>

        <br>
        <br>

        <div class="dibujo">
            @for ($i = 0; $i < 28; $i++)
                <img class="dibujoCasillas" src="{{ $posiciones === null ? 'data:image/jpeg;base64,' . $imagenes[0] : $posiciones[$i] }}">
            @endfor
        </div>

    </body>
</html>
