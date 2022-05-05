<?php
    header("Content-type: text/html;charset=\"utf-8\"");
    $usuario = "Rob";
    if ($usuario == "Rob" || $usuario =="Jose Luis" )
    {
        //Instrucciones que se ejecutan si es cierto
        echo "<h1>Bienvenido $usuario</H1>";
    }
    else
    {
        // En caso contrario
        // vamos a mostrar lo siguiente
        echo "<h1>Lo sentimos $usuario, no tiene acceso al sistema</h1>";
    }
    $edad = 15;
    // Comprobar la mayoría de edad del usuario
    if ($edad >= 18)
    {
        echo "<H1>Puede acceder al portal con esta edad</h1>";
    }
    else
    {
        echo "<h1>Lo sentimos tiene que tener al menos 18 años";
    }
?>