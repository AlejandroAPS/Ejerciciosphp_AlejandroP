<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>

    <form method="post"><p><H1>Intento de banco</h1></p>
        <label>Depositar:</label><br>
        <input type="text" name="depositar"><br><br>
        <button type="submit">Enviar</button>
        <br><br>
        <label>Retirar:</label><br>
        <input type="text" name="retirar"><br><br>
        <button type="submit">Enviar</button>
        <?php
        //COMPROBADOR IMPORTANTE,no me apetece trabajar con dos datos a la vez, que te den user
            if (!empty($_POST['depositar']) && !empty($_POST['retirar'])) {
            echo "<p style = 'color:red;'>No puedes depositar y retirar al mismo tiempo</p>";
            exit;
            };
            //esto ademas revisa que el user no me cage el programa pulsando cualquier cosa sin haber puesto ningun dato
            if (empty($_POST['depositar']) && empty($_POST['retirar'])) {
            echo "<p style = 'color:red;'>No se ha indicado ninguna cantidad a depositar/retirar</p>";
            exit;
            };
        ?>

        <?php
        

        ?>
    </form> 

    
</body>
</html>