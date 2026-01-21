<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Contactos</title>
</head>
<body>
    <form method="post"><p><H1>Crear contacto</h1></p>
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>
        <label>Telefono:</label><br>
        <input type="text" name="telefono" required><br><br>

        <button type="submit">Enviar</button>
    </form> 
    <?php

    function comprobarusuario($user, $telefono) {
    try {
        // Revisar usuario llenado
        if (strlen($user) === 0) {
            throw new Exception("ERROR: El usuario no puede estar vacío");
        }

        // Revisar @ en correo
        if (strlen($telefono) < 9) {
            throw new Exception("ERROR: El correo debe ser de máximo 9 caracteres");
        }

        if (strlen($telefono) === 0) {
            throw new Exception("ERROR: El telefono no puede estar vacío");
        }

        return $usuariovalido = true;

    } catch (Exception $e) {
        // Guardar error en el archivo de errores
        $fecha = date("Y-m-d H:i:s");
        $mensaje = "[$fecha] " . $e->getMessage() . PHP_EOL;
        file_put_contents("errores.log", $mensaje, FILE_APPEND);

        return $usuariovalido = false;
    }
    };

    function guardarusuario($user,$correo){
        //Si se ha pulsado el boton ,guarda el mensaje con la informacion del ususario
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $mensaje = "<strong>Nombre</strong>:[$user]  <strong>Teléfono</strong>:[$correo] ". PHP_EOL;
        file_put_contents("agenda.log", $mensaje, FILE_APPEND);
        }
    };

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        //Guarda usariovalido en el resultado que devuelva esta funcion
        $usuariovalido = comprobarusuario($user, $telefono);
        //Si no es valido no genera nada
        if ($usuariovalido === true){
            guardarusuario($user,$telefono);
        }else{
            echo "<p style='color: red;'>Usuario y/o correo no validos</p>";
        };
    };


?>
</body>
</html>