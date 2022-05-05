<?php
    setcookie("idioma","es",time()+60*60*24*3);
    //unset($_COOKIE['idioma']);
    echo $_COOKIE['idioma'];
?>