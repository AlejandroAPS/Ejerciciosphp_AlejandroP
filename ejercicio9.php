<?php
    $numero = 8;
    echo"<h3>Tabla del $numero</h3>";

    for ($i=1; $i <=10;$i = $i + 2){
        $resultado = $numero *  $i;
        echo"$numero x $i = $resultado <br>";
    }

?>