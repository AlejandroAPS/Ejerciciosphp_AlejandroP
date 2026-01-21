<?php

    require_once ("clase_login.php");

    $usuario1 = new login("Alejandro",  "1234");
    $usuario1 ->comprobar();

    $usuario2 = new login("Alberto", "3214");
    $usuario2 ->comprobar();

?>