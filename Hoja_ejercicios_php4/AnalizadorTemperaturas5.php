<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method = "post">
        <p>
            <P><strong>Temperatura dia 1:</strong><input type="number" name="temperatura[]"required></P>
            <P><strong>Temperatura dia 2:</strong><input type="number" name="temperatura[]"required></P>
            <P><strong>Temperatura dia 3:</strong><input type="number" name="temperatura[]"required></P>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {    //Esto es para que php no me de warnings,(revisa que se haya enviado el formulario)

        $arraytemp = $_POST['temperatura'];
        $tempmax = max($arraytemp);
        $tempmin = min($arraytemp);
        $tempmed = array_sum($arraytemp) / count($arraytemp);

        echo "
        <ul>
            <h2>Datos de temperaturas</h2>
            <li><strong>Promedio de las temperaturas: $tempmed</strong></li>
            <li><strong>Temperatura máx: $tempmax</strong></li>
            <li><strong>Temperatura min: $tempmin</strong></li>
        </ul>
        ";
}
?>

    
</body>
</html>