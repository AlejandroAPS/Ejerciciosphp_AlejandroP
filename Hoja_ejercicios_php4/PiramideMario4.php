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
            <P><strong>Altura:</strong><input type="number" name="altura"required></P>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
    //Recibir la altura del usuario
    $altura = (int) $_POST['altura'];

    //Se crean las filas
    for ($fila = 1; $fila <= $altura; $fila++) {

    //Se crean todos los asteriscos
    for ($columna = 1; $columna <= $fila; $columna++) {
        echo "*";
    }

    // 4. Salto de línea al terminar cada fila
    echo "<br>";
}
?>
    
</body>
</html>