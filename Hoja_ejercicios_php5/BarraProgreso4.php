<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    
?>
</body>
</html>