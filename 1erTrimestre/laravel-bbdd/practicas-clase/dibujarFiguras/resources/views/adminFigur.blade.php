<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Figura</title>
        <style>
            .contenedorImagenes{
                display: flex;
                flex-wrap: wrap;
                gap: 30px;
            }
            img{

                width: 30px;
                height: 30px;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="contenedorPrincipal">

            <form action="/subirImagen" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" name="imagen" required>
                <button type="submit">Subir Imagen</button>
            </form>
            <br><br>
            <div class="contenedorImagenes">
                @for ($i = 0; $i < count($imagenes); $i++)
                    <li>
                        <img src="data:image/jpeg;base64,{{ $imagenes[$i] }}" alt="">
                        <form action="/borrarFigura">
                            <input type="hidden" name="nombre" value="{{$imagenes[$i]}}">
                            <input type="submit" value="Eliminar">
                        </form>
                        <br/>
                    </li>
                @endfor
            </div>
        </div>
        <a href="/game">Volver al menu principal</a>
    </body>
</html>
