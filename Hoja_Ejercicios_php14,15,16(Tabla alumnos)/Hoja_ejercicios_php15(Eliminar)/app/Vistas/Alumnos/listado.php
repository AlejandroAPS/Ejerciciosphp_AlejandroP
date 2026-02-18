<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar alumnos</title>
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
    <div class="tarjeta">
    <h2>Listado de alumnos</h2>

    <?php if (empty($alumnos)): ?>
        <p style= "color: red;">No hay alumnos registrados.</p>
    <?php else: ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Fecha creación</th>
            <th> Borrar </th>
        </tr>

        <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?= htmlspecialchars($alumno['id']) ?></td>
                <td><?= htmlspecialchars($alumno['nombre']) ?></td>
                <td><?= htmlspecialchars($alumno['email']) ?></td>
                <td><?= htmlspecialchars($alumno['edad']) ?></td>
                <td><?= htmlspecialchars($alumno['fecha_creacion']) ?></td>
                <td>
                <form method="POST" action="index.php?accion=borrar" 
                onsubmit="return confirm('¿Seguro que quieres eliminar este alumno?');">

                <input type="hidden" name="id" 
                    value="<?= htmlspecialchars($alumno['id']) ?>">

                <button type="submit">Eliminar</button>

                </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    </div>

<?php endif; ?>
 
</body>
</html>

