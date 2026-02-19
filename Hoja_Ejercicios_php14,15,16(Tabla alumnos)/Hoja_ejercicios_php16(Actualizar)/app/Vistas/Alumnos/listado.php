<div class="tarjeta">

<h2>Listado de alumnos</h2>

<?php if (empty($alumnos)): ?>

    <p style="color:red;">No hay alumnos registrados.</p>

<?php else: ?>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Edad</th>
        <th>Fecha creación</th>
        <th>Acción</th>
    </tr>

    <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?= htmlspecialchars($alumno['id']) ?></td>
            <td><?= htmlspecialchars($alumno['nombre']) ?></td>
            <td><?= htmlspecialchars($alumno['email']) ?></td>
            <td><?= htmlspecialchars($alumno['edad']) ?></td>
            <td><?= htmlspecialchars($alumno['fecha_creacion']) ?></td>
            <td>
                <a href="index.php?accion=editar&id=<?= htmlspecialchars($alumno['id']) ?>">
                    <button>Editar</button>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php endif; ?>

</div>
