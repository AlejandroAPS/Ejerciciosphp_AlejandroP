<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver notas</title>
    <style>
        body{
            font-family: Arial, sans-serif; margin: 20px;}
        .cotenedor{
            max-width: 900px;  margin:0 auto;}
        .menu a {margin-right: 12px;}
        table{ width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f5f5f5; }
        .error { background: #ffe6e6; border: 1px solid #ffb3b3; padding: 10px; margin: 10px 0; }
        .tarjeta { border: 1px solid #ddd; padding: 12px; border-radius: 8px; margin-top: 12px; }
        label { display:block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; }
        button { padding: 10px 14px; margin-top: 12px; cursor: pointer; } 
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Notas guardadas</h1>
            <?php if(!empty($error)):?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Texto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notas as $n): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($n->fecha);?></td>
                            <td><?php echo htmlspecialchars($n->texto);?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php endif; ?>
        <hr>

        
    </div>
    
</body>
</html>