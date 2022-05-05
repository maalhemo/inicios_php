<?php
header("Content-type: text/html;charset=\"utf-8\"");
 if ($_POST) 
 {
 	$usuarios = array("jose","miguel","antonio","maria");
 	$esconocido=false;
 	foreach($usuarios as $valor)
 	{
 		if ($valor ==$_POST['nombre']) 
 		{
$esconocido=true;
 		}
 	}
 	if($esconocido)
 	{
 		echo"<h1>Bienvenido ".$_POST['nombre']."!</h1>";
 	}
 	else
 	{
 		echo "<h1>Usuario Incorrecto!<h1>";
 	}
 }
 ?>
<form method ="POST">
¿cual es tu nombre?
<input name="nombre" type="text">
<input type="submit" value="Enviar">
</form>
