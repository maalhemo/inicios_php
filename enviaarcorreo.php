<?php
    header("Content-type: text/html;charset=\"utf-8\"");
    $emailTo = "info@ediprint.com";
    $subject = "Curso Desarrollo Web Completo";
    $body = "Me está encantando el curso!";
    $headers = "From: joseluis@hotmail.com";

    if (mail($emailTo,$subject,$body,$headers))
    {
        echo "Mensaje enviado con éxito!";
    }
    else
    {
        echo "Hubo un error al enviar el mensaje";
    }
    
?>