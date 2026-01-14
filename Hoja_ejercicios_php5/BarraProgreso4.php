<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra progreso</title>
    <style> .contenedor {
            width: 100%;
            background-color: #ddd;
            border-radius: 8px;
            overflow: hidden;
            height: 30px;
            margin-top: 20px;
        }

        .barra {
            height: 100%;
            background-color: #4caf50;
            color: white;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            transition: width 0.4s ease;
        }
    </style>

</head>
<body>
     <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    
    <form method="post">
        <label>Objetivo de Ventas (€):</label><br>
        <input type="number" name="objetivo" required><br><br>

        <label>Ventas Actuales (€):</label><br>
        <input type="number" name="actual" required><br><br>

        <button type="submit">Calcular</button>
    </form>
    <?php
    
    $porcentaje = 0;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $objetivo = floatval($_POST["objetivo"]);
        $actual = floatval($_POST["actual"]);

        if ($objetivo > 0) {
            $porcentaje = round(($actual * 100) / $objetivo);
            // Evitar que pase de 100%
            if ($porcentaje > 100) {
                $porcentaje = 100;
            }
    }
    }
    
?>


    <div class="contenedor">
        <div class="barra" style="width: <?php echo $porcentaje; ?>%;">
            <?php echo $porcentaje; ?>%
        </div>
</div>
</body>
</html>