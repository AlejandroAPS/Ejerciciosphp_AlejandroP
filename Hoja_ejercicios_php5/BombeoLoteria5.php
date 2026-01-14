<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loteria</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    <form method="post">
        <label>¿Cuantos numeros quieres sacar?</label><br>
        <input type="number" name="cantidad" required><br><br>

        <label>¿Rango máximo?</label><br>
        <input type="number" name="rango" required><br><br>

        <button type="submit">Calcular</button>
    </form> 
    <?php   //Esto para revisar que se ha pulsado el boton enviar
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cantidad = $_POST['cantidad'];
    $rango = $_POST['rango'];
    $array = [];
    if ($cantidad > $rango) { // si la cantidad es superior al rango entra en bucle infinito NO QUEREMOS ESO
    echo "<p style='color:red'>La cantidad no puede ser mayor que el rango</p>";
    return;
    }
    while (count($array)< $cantidad){  //siempre y cuando no haya la misma cantidad de numeros que la solicitada,continua
        $random = rand(1, $rango);
        if (!in_array($random,$array)){ //para evitar numeros repetidos
            $array[] = $random;
        };
    };
    sort($array);
    echo "<h3><p>Los numeros que han salido son:</p></h3>"; 
    foreach($array as $numero){ //Con un bucle vas por el array para poner los numeros uno a uno
        echo " ". $numero . " ";
    }
    }

?>

</body>
</html>