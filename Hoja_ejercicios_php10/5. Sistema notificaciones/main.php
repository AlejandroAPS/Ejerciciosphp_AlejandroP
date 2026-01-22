<?php
    require_once("clase_notificacion.php");

    $mensaje1 = new email("ola que ase cammy", "cliente@web.com");
    $mensaje1 -> enviar();

?>