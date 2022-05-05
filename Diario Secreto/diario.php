<?php
    session_start();
    $error = "";
    if (array_key_exists("Logout",$_GET)){
        // Si viene de la pagina sesionIniciada
        // unset($_SESSION);
        session_unset();
        setcookie("id","",time()-60*60);
        $_COOKIE["id"]=""; //ExtraRefresco
    }
    else if ((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR (array_key_exists("id",$_COOKIE) AND $_COOKIE['id']))
    {
        // Si ya tenia la sesion iniciada
        header("Location: sesionIniciada.php");
    }
    if (array_key_exists("submit",$_POST))
    {
        include ("connection.php");
        
        if (!$_POST['email']){
            $error .= "<br>Email requerido<br>";
        }
        
        if (!$_POST['password']){
            $error .= "Contraseña requerida<br>";
        }
        
        if ($error!=""){
            $error = "<p>Hubo algun(os) error(es) en el formulario: ".$error."</p>";
        }
        else
        {
            if ($_POST['registro']=='1')
            {


                // Vemos si la direccion de email está ya registrada o no
                $query = "SELECT id FROM usuarios WHERE email='".mysqli_real_escape_string($enlace,$_POST['email'])."' LIMIT 1";
                $result = mysqli_query($enlace,$query);

                if (mysqli_num_rows($result)>0){
                    $error = "Email ya registrado.";
                }
                else
                {
                    $query="INSERT INTO usuarios (email,password) VALUES('".mysqli_real_escape_string($enlace,$_POST['email'])."','".mysqli_real_escape_string($enlace,$_POST['password'])."')";

                    if (!mysqli_query($enlace,$query)){
                        $error = "<p>No hemos podido completar el registro, por favor inténtalo de nuevo más tarde</p>";
                    }
                    else
                    {
                        $query="UPDATE usuarios SET password='".md5(md5(mysqli_insert_id($enlace)).$_POST['password'])."' WHERE id=".mysqli_insert_id($enlace)." LIMIT 1";
                        mysqli_query($enlace,$query);
                        $_SESSION['id']=mysqli_insert_id($enlace);
                        if ($_POST['permanecerIniciada']=='1'){
                            setcookie("id",mysqli_insert_id($enlace),time()+60*60*24*365);
                        }
                        header("Location: sesionIniciada.php");
                    }
                }
            }
            else
            {
                // Comprobamos el inicio de sesion
                $query = "SELECT * FROM usuarios WHERE email='".mysqli_real_escape_string($enlace,$_POST['email'])."'"; //no ponemos el password porque depende del id que todavia no lo se
                
                $result = mysqli_query($enlace,$query);
                $fila = mysqli_fetch_array($result);
                
                if (isset($fila))
                {
                    
                    $passwordHasheada = md5(md5($fila['id']).$_POST['password']);
                    if ($passwordHasheada == $fila['password'])
                    {
                        $_SESSION['id'] = $fila['id'];
                        if ($_POST['permanecerIniciada']=='1'){
                            setcookie("id",$fila['id'],time()+60*60*24*365);
                        }
                        header("Location: sesionIniciada.php");
                    }
                    else
                    {
                        $error = "El email/contraseña no pudieron ser encontrados!";
                    }
                    
                }
                else
                {
                    $error = "El email/contraseña no pudieron ser encontrados!";
                }
            }
        }
    }
?>
<?php include("header.php"); ?>

    <div id="contenedorPaginaPrincipal" class="container">
        <h1>Diario secreto</h1>
        <p><strong>Guarda tus pensamientos para siempre</strong></p>
        <div id="error">
            <?php
                if ($error!=""){
                    echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
                }
            ?>
        </div>

        <form method="POST" id="formularioRegistro">
            <p>¿Interesad@? ¡Regístrate ahora!</p>
            <fieldset class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Tu email">
            </fieldset>
            <fieldset class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
             </fieldset>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="permanecerIniciada" value=1>
                    Permanecer iniciada
                </label>
            </div>
            <fieldset class="form-group">
                <input type="hidden" name="registro" value=1>
                <input class="btn btn-success" type="submit" name="submit" value="Regístrate!">
             </fieldset>
             <p><a class="alternarFormularios">Iniciar Sesión</a></p>
        </form>
       
        <form id="formularioLogIn" method="POST">
            <p>Inicia sesión con tu usuario/contraseña</p>
            <fieldset class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Tu email">
            </fieldset>   
            <fieldset class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </fieldset>   
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="permanecerIniciada" value=1>
                    Permanecer iniciada
                </label>
            </div>
            <fieldset class="form-group">
                <input type="hidden" name="registro" value=0>
                <input class="btn btn-success" type="submit" name="submit" value="Iniciar sesión">
            </fieldset>
            <p><a class="alternarFormularios">Regístrate</a></p>
        </form>
        

    </div>
    <?php include("footer.php"); ?>