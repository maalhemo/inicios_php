<?php

    session_start();
    if ($_SESSION['nombre']){
        echo "<p>Has iniciado sesión como ".$_SESSION['nombre']."</p>";
    }
    else
    {
        header("Location: index.php");
    }

?>