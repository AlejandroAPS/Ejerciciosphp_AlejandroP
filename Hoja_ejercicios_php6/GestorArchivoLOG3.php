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
    
    function existencia_archivo($nombre_archivo){

        if (!file_exists($nombre_archivo)) {
            $mensaje = "[" . date("Y-m-d H:i:s") . "] El archivo '{$nombre_archivo}' no existe." . PHP_EOL;
            file_put_contents("errores.log", $mensaje, FILE_APPEND);    //Guarda el mensaje con file append en errores.log
            return false;   //Si no existe devuelve false
        }

        // Si existe, devuelve true
        return true;
    };

    function archivo_vacio($nombre_archivo) {
        // Comprobar si el archivo está vacío
        if (filesize($nombre_archivo) === 0) {
            echo "<h3><strong>EL ARCHIVO EXISTE PERO ESTA VACIO</strong></h3>";
            return true;
        }
        return false;
    };

    function contar_lineas($nombre_archivo) {
        // Abrir el archivo en modo lectura
        $archivo = fopen($nombre_archivo, "r");

        // Comprobar si el archivo se pudo abrir
        if ($archivo === false) {
            echo "No se pudo abrir el archivo";
            return 0;
        }

        $nlineas = 0;

        // Cada vez que no se detecte el final del archivo,se suma uno al contador que cuenta la cantidad de lineas
        while (($linea = fgets($archivo)) !== false) {
            $nlineas++;
        }

        // Cerrar archivo
        fclose($archivo);
        
        return $nlineas;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $nombre_archivo = $_POST['archivo'];

        // Validacion para que solo acepte archivos .log
        if (pathinfo($nombre_archivo, PATHINFO_EXTENSION) !== 'log') {
            echo "<p><strong>ERROR: El archivo debe tener extension .log</strong></p>";
        } else {
            //Se revisa si existe
            $existe = existencia_archivo($nombre_archivo);

            if ($existe === true){
                $vacio = archivo_vacio($nombre_archivo);
                //Si existe se revisa si esta vacio
                if ($vacio === false){
                    $lineas = contar_lineas($nombre_archivo); //Si existe y no esta vacio devuelve cuantas lineas tiene con esta funcion
                    echo "<p><strong>EL ARCHIVO EXISTE Y CONTIENE $lineas LINEAS</strong></p>";
                };
            }
            else{   // y si no existe se manda mensaje tambien
                echo "<p><strong>ERROR: EL ARCHIVO NO EXISTE O NO SE PUEDE ENCONTRAR</strong></p>";
            }
        }
    }
    ?>
    
</body>
</html>
