<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptador texto</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    <form method = "post">
        <p><h2><strong>Encriptador de texto </strong></h2>
            <P><strong>Texto a encriptar:</strong><input type="text" name="texto"required></P>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
<?php
    if (isset ($_POST['texto'])){
         $texto = $_POST['texto'];
    };
    
    $logica = array(
        "A" => 4,
        "E" => 3,
        "I" => 1,
        "O" => 0,
        "S" => 5
    );

    if (isset ($_POST['texto'])){   //isset para que no salte warning
        $textoencriptado = str_ireplace( // 
            array_keys($logica),
            array_values($logica),
            $texto
        );
        echo "<h3>Texto encriptado:</h3>";
        echo "<p><strong>$textoencriptado</strong></p>";
    };

    

?>

</body>
</html>