<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador contraseñas</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
    <form method = "post">
        <p><h2><strong>Validador contraseñas usuario </strong></h2>
            <P><strong>Usuario:</strong><input type="text" name="user"required></P>
            <P><strong>Contraseña:</strong><input type="password" name="password"required></P>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
    
        $check1 = false;
        $check2 = false;
        $check3 = false;
        $contrasena = $_POST['password'];
        $user = $_POST['user'];
        if (strlen($contrasena) > 8) { //CHECK debe tener mas de 8 caracteres
            $check1 = true;
        }else{
                echo "<p style ='color:red;'> La contraseña necesita más de 8 carácteres.</p>";
            };
        if (strpbrk($contrasena, '#@') !== false) { //CHECK que debe tener @ o #
            $check2 = true;
            }else{
                echo "<p style ='color:red;'> La contraseña debe contener por lo menos un carácter especial(@/#).</p>";
            };
        if ($contrasena !== $user){ //CHECK que debe de ser distinta al nombre de usuario(aunque puede contenerlo)
            $check3 = true;
        }else{
            echo "<p style ='color:red;'> La contraseña debe de ser distinta al nombre de usuario.</p>";
        };
        
    
    if ($check1 && $check2 && $check3){// Revisa todos los checks para ver que sea segura(o eso deberia de hacer ahora no va bien)
            echo "<p style = 'color:green;'> La contraseña es segura👍</p>";
        };
?>
</body>
</html>