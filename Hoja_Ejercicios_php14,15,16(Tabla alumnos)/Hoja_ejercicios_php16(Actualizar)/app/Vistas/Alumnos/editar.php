<div class="tarjeta">

<h2>Editar alumno</h2>

<form method="POST" action="index.php?accion=actualizar">

    <!-- ID oculto (no editable) -->
    <input type="hidden" name="id" 
           value="<?= htmlspecialchars($alumno['id']) ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" 
           value="<?= htmlspecialchars($alumno['nombre']) ?>" 
           required>

    <label>Email:</label>
    <input type="text" name="email" 
           value="<?= htmlspecialchars($alumno['email']) ?>">

    <label>Edad:</label>
    <input type="number" name="edad" 
           value="<?= htmlspecialchars($alumno['edad']) ?>" 
           required>

    <button type="submit">Actualizar</button>

</form>

<br>
<a href="index.php">← Volver al listado</a>

</div>
