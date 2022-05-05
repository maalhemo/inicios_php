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
        //añadir datos a base de datos
        $query = "INSERT INTO datos(nombre,email,mensaje)
        VALUES ('pepsi','pepsi@live.com','hola, me encanta tu pagina')";
        mysqli_query($enlace,$query);

        $query = "SELECT * FROM datos";
        if ($result = mysqli_query($enlace,$query))
        {
            while($fila = mysqli_fetch_array($result))
            {
                print_r($fila);
            }
        }
    }

    mysqli_close($enlace);

?>