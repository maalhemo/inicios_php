<?php
    header("Content-type: text/html;charset=\"utf-8\"");
    if ($_GET){
        if (is_numeric($_GET['numero']) && $_GET['numero']>1 && $_GET['numero']==round($_GET['numero'],0))
        {
            // Comprobación para ver si es primo
            $esPrimo = true;
            $i = 2;
            while ($i < $_GET['numero'] && $esPrimo)
            {
                // Si el numero dividido por i su resto es cero ==> es primo
                if ($_GET['numero']%$i == 0)
                {
                    $esPrimo = false;
                }
                $i++;
            }
            if ($esPrimo)
                echo "<p>El número ".$_GET['numero']." es primo</p>";
            else
                echo "<p>El número ".$_GET['numero']." NO es primo</p>";
        }
        else
        {
            echo "<p>Error ¡Introduce número natural mayor que 1!</p>";    
        }
    }
?>
<h1>Verificador de números primos</h1>
<form>
    Introduce un número natural mayor que 1:
    <input name="numero" type="text">
    <input type="submit" value="Enviar">
</form>