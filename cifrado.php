<?php
    $salt = "hjasas8273a%98";
    $textoCifrado = md5($salt."password");
    echo $textoCifrado;
?>