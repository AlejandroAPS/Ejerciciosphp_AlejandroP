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
            <P><strong>Nombre:</strong><input type="text" name="nombre"required></P>
            <P><strong>Apellido:</strong><input type="text" name="apellido" required></p>
            <P><strong>Dominio:</strong><input type="text" name="dominio" required></P>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
    //Recibir los datos del formulario
    $nombre   = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $dominio  = trim($_POST['dominio']);

    //Convertir todo a minúsculas
    $nombre   = strtolower($nombre);
    $apellido = strtolower($apellido);
    $dominio  = strtolower($dominio);

    //Obtener la primera letra del nombre
    $primeraLetra = substr($nombre, 0, 1);

    //Limpiar el dominio si viene como URL completa
    // En esto me ayudo GPT ,aparentemente si una url contiene 'q=' se detecta como tal
    if (strpos($dominio, 'q=') !== false) {
        $posicion = strpos($dominio, 'q=') + 2;
        $dominio = substr($dominio, $posicion);
    }

    //Construir el email
    $email = $primeraLetra . $apellido . "@" . $dominio;

    //Mostrar resultado
    echo "Tu nuevo correo es: " . $email;
    
?>
</body>
</html>