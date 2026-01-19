<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar palabra</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    <form method="post"><p><H1>Buscar una palabra en un archivo</h1></p>
        <label>Palabra a buscar:</label><br>
        <input type="text" name="string" required><br><br>

        <button type="submit">Buscar</button>
    </form> 
    <?php
// Función para guardar errores en el log
function guardar_error($mensaje) {
    $mensaje_log = "[" . date("Y-m-d H:i:s") . "] " . $mensaje . PHP_EOL;
    file_put_contents("errores.log", $mensaje_log, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {   //try haber si esta vacio lo que nos ha enviado el usuario
        $palabra = trim($_POST['string']);
        $nombre_archivo = 'texto.txt';

        // Palabra vacía
        if (empty($palabra)) {
            throw new Exception("La palabra a buscar está vacía.");
        }

        // Archivo no existe
        if (!file_exists($nombre_archivo)) {
            throw new Exception("El archivo '{$nombre_archivo}' no existe.");
        }

        // Leer archivo
        $contenido = file_get_contents($nombre_archivo);

        if ($contenido === false) {
            throw new Exception("No se pudo leer el archivo.");
        }

        // No distinguir mayúsculas/minúsculas
        $contenido = strtolower($contenido);
        $palabra = strtolower($palabra);

        // Contar ocurrencias
        $contador = substr_count($contenido, $palabra);

        echo "<p>La palabra <strong>{$palabra}</strong> aparece <strong>{$contador}</strong> veces.</p>";

    } catch (Exception $e) {
        guardar_error($e->getMessage());
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

</body>
</html>