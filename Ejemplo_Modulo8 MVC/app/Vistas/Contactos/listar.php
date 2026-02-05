<?php
    if (!empty($error)): 
?>
    <div class="error"><?php echo htmlspecialchars($error);?></div>
    <?php endif ?>
    <div class="tarjeta">
        <h2>Listado de contactos</h2>


    <?php if (empty($contactos)): ?>
        <p>No hay contactos todavía.</p>
    <?php else:?>
        <table>
            
        </table>

