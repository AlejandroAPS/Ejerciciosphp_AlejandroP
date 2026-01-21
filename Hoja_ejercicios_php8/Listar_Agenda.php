<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Agenda</title>
</head>
<body>
    <?php
    $ruta = 'agenda.log';
    function leer_archivo($ruta){
        $error = mandar_error($ruta);
        if ($error === TRUE){
            $agenda = file_get_contents($ruta);
            // No sabia que era un nl2br pero como me quedaba fea el mostrarlo me ayude del gran GPT en esta linea de abajo
            //Aparentemente convierte el espacio en php( PHP_EOL) en <br> al mopstrarlo en el html (Apuentes para luego)
            echo nl2br($agenda);
        }
        else{
            echo "<p style='color: red;'>No hay ningún contacto en la agenda</p>";
        };
    };

    function mandar_error($ruta) {
    try {
        // Revisar que existan si quiera el archivo a mostrar
        if (!file_exists($ruta)) {
            throw new Exception("ERROR: El archivo no existe/no se ha creado ningun contacto en la agenda");
        }

        return $error = true;

    } catch (Exception $e) {
        // Guardar error en el archivo de errores
        $fecha = date("Y-m-d H:i:s");
        $mensaje = "[$fecha] " . $e->getMessage() . PHP_EOL;
        file_put_contents("errores.log", $mensaje, FILE_APPEND);

        return $error = false;
    }
    };

    leer_archivo($ruta);


?>
</body>
</html>