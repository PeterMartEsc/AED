<?php
    session_start();
    $username = $_POST['username'];
    $_SESSION["username"] = $username;  //Guarda el username en la sesión

    header('Location: acertar-numero.php');

?>