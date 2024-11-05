<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar Usuario</title>
        <style>

        </style>
    </head>
    <body class="antialiased">
        <div class="editUser">
            <form action="/actualizarInfoUser">

                <label for="id">Id</label>
                <input type="text" name="id" value="{{ $datos[0] }}" readonly><br/><br/>

                <label for="nombre">Nombre de Usuario:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $datos[1] }}" required><br/><br/>

                <label for="password">Contraseña</label>
                <input type="text" id="password" name="password" placeholder="{{ $datos[2] }}" required><br/><br/>

                <label for="rol">Rol</label>
                <input type="text" id="rol" name="rol" value="{{ $datos[3] }}" required><br/><br/>

                <input type="submit" value="Actualizar">

            </form>
            <a href="/administrarUsuarios">Regresar</a>
        </div>
    </body>
</html>
