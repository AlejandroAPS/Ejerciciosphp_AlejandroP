<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Piedra Papel Tijera VS CPU</h2>
    <form method = "post">
        <p>
            <strong>Escoge:</strong>
            <label>
                <input type="radio" name="user" value="Piedra">
                Piedra<img src="..//Hoja_ejercicios_php4/Piedra.avif" width=100px height=100px>
            </label>
            <label>
                <input type="radio" name="user" value="Papel">
                Papel<img src="..//Hoja_ejercicios_php4/Papel.jpg" width=100px height=100px>
            </label>
            <label>
                <input type="radio" name="user" value="Tijera">
                Tijera<img src="..//Hoja_ejercicios_php4/Tijera.avif" width=100px height=100px>
            </label>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
        $usuario = $_POST["user"];
        $CPU = random_int(1,3);
        switch($numero){
            case 1:
                $jugada = "piedra";
                break;
            case 2:
                $jugada = "papel";
                break;
            case 3:
                $jugada = "tijera";
                break;

        };
            

    ?>
    
</body>
</html>