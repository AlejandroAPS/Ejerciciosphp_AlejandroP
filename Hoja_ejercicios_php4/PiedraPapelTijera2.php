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
                <input type="radio" name="user" value="piedra🪨" required>
                Piedra<img src="..//Hoja_ejercicios_php4/Piedra.avif" width=100px height=100px>
            </label>
            <label>
                <input type="radio" name="user" value="papel📄" required>
                Papel<img src="..//Hoja_ejercicios_php4/Papel.jpg" width=100px height=100px>
            </label>
            <label>
                <input type="radio" name="user" value="tijera✂️" required>
                Tijera<img src="..//Hoja_ejercicios_php4/Tijera.avif" width=100px height=100px>
            </label>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
        $usuario = $_POST["user"];  //se recoge lo enviado por usuario
        $CPU = random_int(1,3);     //Se genera el numero aleatorio
        switch($CPU){
            case 1:
                $CPU = "piedra🪨";
                break;
            case 2:
                $CPU = "papel📄";
                break;
            case 3:
                $CPU = "tijera✂️";
                break;
        };  //Se asigna el numero generado con cada posibilidad
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if ($usuario === $CPU){
            $resultado = "Empate";
        }   //Compara si son identicos y marca empate
        elseif(
            ($usuario === "piedra🪨" && $CPU === "tijera✂️")||
            ($usuario === "tijera✂️" && $CPU === "papel📄")||
            ($usuario === "papel📄" && $CPU === "piedra🪨")
        ){
            $resultado = "¡Ganaste!";
        }
        else{
            $resultado = "Perdiste";
        }
        
        echo "Escogiste:$usuario <br> Tu rival escogio:$CPU<br>";
        echo "$resultado";
        }
    ?>
    
</body>
</html>