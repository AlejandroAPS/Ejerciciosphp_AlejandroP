<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificar Alumno</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .contenedor { max-width: 800px; margin: 0 auto; }
    .tarjeta { border: 1px solid #ddd; padding: 15px; border-radius: 8px; margin-top: 12px; }
    label { display:block; margin-top: 10px; }
    input { width: 100%; padding: 8px; }
    button { padding: 10px 14px; margin-top: 12px; cursor: pointer; }
    .error { background: #ffe6e6; border: 1px solid #ffb3b3; padding: 10px; margin: 10px 0; }
    .ok { background: #e7ffe7; border: 1px solid #b3ffb3; padding: 10px; margin: 10px 0; }
  </style>
</head>
<body>
  <div class="contenedor">
    <h1>Modificar alumno (UPDATE SET)</h1>

    <p>Esta web solo permite modificar los datos de los alumnos en la base de datos.</p>

    <hr>

    <?php require __DIR__ . '/' . $vistaContenido; ?>

  </div>
</body>
</html>

