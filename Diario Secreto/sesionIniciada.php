<?php

    session_start();

    if (array_key_exists("id",$_COOKIE)) {
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if (array_key_exists("id",$_SESSION)) {
        echo "<p>Sesión iniciada. <a href='diario.php?Logout=1'>Cerrar sesión</a></p>";
    }
    else {
        header("Location: diario.php");
    }
?>