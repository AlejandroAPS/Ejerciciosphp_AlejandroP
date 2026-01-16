<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuarios</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    <form method="post"><p><H1>Registro Usuarios</h1></p>
        <label>Nombre</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Correo</label><br>
        <input type="text" name="correo" required><br><br>

        <button type="submit">Enviar</button>
    </form> 
<?php
    
    function comprobarusuario($user, $correo) {
    try {
        // Revisar usuario llenado
        if (strlen($user) === 0) {
            throw new Exception("ERROR: El usuario no puede estar vacío");
        }

        // Revisar @ en correo
        if (strpos($correo, '@') === false) {
            throw new Exception("ERROR: El correo debe contener una @");
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
        $fecha = date("Y-m-d H:i:s");
        $mensaje = "[$fecha]Nuevo usuario:[$user],correo:[$correo] ". PHP_EOL;
        file_put_contents("usuarios.log", $mensaje, FILE_APPEND);
        }
    };

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['usuario'];
    $correo = $_POST['correo'];
    //Guarda usariovalido en el resultado que devuelva esta funcion
    $usuariovalido = comprobarusuario($user, $correo);
    //Si no es valido no genera nada
    if ($usuariovalido === true){
    guardarusuario($user,$correo);
    }else{
        echo "Usuario y/o correo no validos";
    };
    };
?>
    
</body>
</html>