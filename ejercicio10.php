<?php
    $numero = 8;
    echo "<table><tr><th><h3>Tabla del número $numero</h3></th></tr>";

    for ($i = 1;$i <= 10;$i = $i + 2){
        $resultado = $numero * $i;
        echo"<tr><td>$numero</td> <td>x</td> <td>$i = $resultado</td></tr></table> <br>";
    }
?>