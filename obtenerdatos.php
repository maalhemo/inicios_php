<?php

    // Conexion con la base de datos
    header("Content-type:text/html;charset=utf-8");
    $enlace = mysqli_connect("localhost", "root", "","contacto");
// ver: http://php.net/manual/es/function.mysql-connect.php
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    }
    else
    {
        $query = "SELECT * FROM datos";
        if ($result = mysqli_query($enlace,$query))
        {
            $fila = mysqli_fetch_array($result);
            echo "Tu nombre es: ".$fila['nombre']." tu correo es: ".$fila['email']." y tu mensaje es: ".$fila['mensaje'];
        }
    }

    mysqli_close($enlace);

?>