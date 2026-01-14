<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    <?php
    function leerArchivoSeguro($nombre) {
    try {
        // Comprobar si siquiera existe
        if (!file_exists($nombre)) {
            throw new Exception("El archivo '$nombre' no existe");
        }

        // Comprobar si el archivo funciona correctamente
        if (!is_readable($nombre)) {
            throw new Exception("El archivo '$nombre' no se puede leer");
        }

            //Lee el archivo
        return file_get_contents($nombre);
    }
        catch (Exception $e) {
        // Recoge la fecha y hora en una variable
        $fecha = date("Y-m-d H:i:s");

        // Variable con el mensaje a mostrar
        $mensaje = "[$fecha] " . $e->getMessage() . PHP_EOL;

        // Pone el contenido de $mensaje en el archivo justo debaje de el anterior en una linea nueva
        file_put_contents("errores.log", $mensaje, FILE_APPEND);

        // Mensaje amigable al usuario
        return "No se pudo leer el archivo. Inténtalo más tarde.";
        }
    }
    
    // Se llama a la función
    echo leerArchivoSeguro("notas.txt");
    
?>
    
</body>
</html>