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

    <form method="post"><p><H1>Gestor Archivos .log</h1></p>
        <label>Nombre Archivo(incluyendo .log)</label><br>
        <input type="text" name="archivo" required><br><br>

        <button type="submit">Revisar</button>
    </form> 
    <?php
    
    $nombre_archivo = $_POST['archivo'];

    function existencia_archivo($nombre_archivo){

    try {
        if (!file_exists($nombre_archivo)) {
            throw new Exception("El archivo '{$nombre_archivo}' no existe.");
        }

        // Si existe, devuelve true
        return true;

    } catch (Exception $e) {
        // Mensaje de error con fecha
        $mensaje = "[" . date("Y-m-d H:i:s") . "] " . $e->getMessage() . PHP_EOL;
        file_put_contents("errores.log", $mensaje, FILE_APPEND);    //Guarda el mensaje con file append en errores.log
        //Relanza el error
        throw $e;
        return false;   //Si no existe devuelve false
    };
    };

    function archivo_vacio($nombre_archivo) {
    // Abrir el archivo en modo lectura
    $archivo = fopen($nombre_archivo, "r");

    // Comprobar si el archivo está vacío
    if (filesize($nombre_archivo) === 0) {
        echo "<h3><strong>EL ARCHIVO ESTA VACIO</strong></h3>";
        fclose($archivo);
        return false;
    }

    // Cerrar archivo(se vuelve a cerrar aqui por si acaso) y devolver true si no está vacío
    fclose($archivo);
    return true;
    };

    function contar_lineas($nombre_archivo) {
    // Abrir el archivo en modo lectura
    $archivo = fopen($nombre_archivo, "r");

    // Comprobar si el archivo se pudo abrir
    if ($archivo === false) {
        echo "No se pudo abrir el archivo";
        return;
    }

    $nlineas = 0;

    // Cada vez que no se detecte el final del archivo,se suma uno al contador que cuenta la cantidad de lineas
    while (!feof($archivo)) {
        fgets($archivo);
        $nlineas++;
    }

    // Cerrar archivo
    fclose($archivo);
    
    echo "El archivo $nombre_archivo, contiene $nlineas lineas de texto";
}



    $existe = existencia_archivo($nombre_archivo);
    if ($existe === true){
        $vacio = archivo_vacio($nombre_archivo);
        if ($vacio === true){
            contar_lineas($nombre_archivo);

        };

    }


?>
    
</body>
</html>