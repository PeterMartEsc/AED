<?php
    session_start();
    //Se genera el numero secreto y se guarda en sesión
    //$secreto = rand(1,10);
    //$_SESSION["secreto"] = $secreto;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <div class="contendorPrincipal">

        <form action="login.php" method="post">
            <label for="usuario">Usuario:</label><br><br>
            <input type="text" id="username" name="username" />
            <input type="submit" id="submitUsername" name="submitUsername" value="Login"/>
        </form>
    
    </div>
    
</body>
</html>

<!--

    - Contraseña -

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password">
-->