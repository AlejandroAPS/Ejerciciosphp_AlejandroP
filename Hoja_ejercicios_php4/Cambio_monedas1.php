<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Monedas</title>
</head>
<body>
    <h2>Cambiar Monedas</h2>
    <form method = "post">
        <p>
            <strong>Cantidad de dinero</strong>
            <input type="number" name="dinero" size="40" min = "1" required>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php 
    $total =  $_POST["dinero"]; //variables
    $billetes=[
        50,
        20,
        10,
        5,
        1
    ];
    $cambio=[];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        foreach($billetes as $billete){
            $cantidad = intdiv($total,$billete);    //cuantos billetes caben del primer tipo de billete en la lista(50) y luego con los demas tras cada repeticion
            $cambio[$billete] = $cantidad;
            $total = $total % $billete;     //Resta los billetes sacados del total para ver que cantiudad de billetes mas pequeños hay que dar
            }
        }

    echo "<h3>Cambio a devolver</h3>";
    foreach ($cambio as $billete=> $cantidad)
        echo "Billetes de <strong>$billete</strong>:$cantidad<br>"; 
    ?>
    
</body>
</html>