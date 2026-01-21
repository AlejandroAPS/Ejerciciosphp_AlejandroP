<?php
    require_once ("clase_empleado.php");
    $Becario = new empleado("Alejandro", "Becario", 800 );
    $Jefa = new empleado("Alejandra" , "Jefa", 2500);

    $Becario->revisarsueldo();
    $Jefa->revisarsueldo();
    $Becario->revisarsueldo();
?>