<?php

    session_start();
    // Conexion con la base de datos
    // header("Content-type:text/html;charset=utf-8");
    //echo"Usuario con sesion iniciada".$_SESSION['nombre'];
    if (array_key_exists('nombre',$_POST) OR array_key_exists('email',$_POST))
    {
         $enlace = mysqli_connect("localhost", "root", "","contacto");
        if (mysqli_connect_error()) {
            die("Hubo un error en la conexión, inténtelo más tarde");
        }
        if ($_POST['nombre']=='')
        {
            echo "<p>El nombre de usuario es obligatorio</p>";
        }
        else if ($_POST['email']=='')
        {
            echo "<p>La contraseña es obligatoria</p>";
        }
        else
        {
            // El usuario ha rellenado ambos campos
            $query = "SELECT nombre FROM datos WHERE nombre='".mysqli_real_escape_string($enlace,$_POST['nombre'])."'";
            $result = mysqli_query($enlace,$query);
            if (mysqli_num_rows($result)>0)
            {
                echo "<p>Ese nombre de usuario ya está registrado. Intenta con otro</p>";
            }
            else
            {
                // Añadir a nuestro usuario a la BD
                $query="INSERT INTO datos (nombre, email) VALUES('".mysqli_real_escape_string($enlace,$_POST['nombre'])."','".mysqli_real_escape_string($enlace,$_POST['email'])."')";
                if (mysqli_query($enlace,$query)){
                    $_SESSION['nombre']=$_POST['nombre'];
                   // echo "<p>¡Enhorabuena! Has registrado tu cuenta</p>";
                
                }
                else
                {
                    echo "<p>Hubo algún problema al registrar el usuario. Inténtelo más tarde</p>";
                }
            }
        }
    }

?>
<h1>Registro de usuario</h1>
<form method="POST">
    <input type="text" name="nombre" placeholder="Escribe tu nombre de usuario">
    <input type ="email" name="email">
    <input type="submit" value="Registrar">
</form>