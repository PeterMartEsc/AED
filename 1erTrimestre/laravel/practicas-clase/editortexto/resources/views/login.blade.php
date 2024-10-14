<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .login{
                border: solid 1px ;
                padding: 20px;
                width: 250px;
                margin: auto;
                padding-top: 5px;
            }
        </style>
        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <div class="login">
            <h2>Register</h2>
            <form action="/login">
                <label for="username">Nombre</label>
                <input type="text" id="username" name="username" required><br><br>  <!--El required obliga a que introduzcas un valor-->
                <input type="submit" value="Register">
            </form>
        </div>
    </body>
</html>
