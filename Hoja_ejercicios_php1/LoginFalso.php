<!DOCTYPE html>
<?php   //variables
    $usuarios_permitidos=[[
        "nombre" => "Antonio Bodoque",
        "contraseña" => "holasoyantonio"
    ],
    [
        "nombre" => "Carla Magna",
        "contraseña" => "holasoycarla"
    ],
    [
        "nombre" => "Josefino Enrique",
        "contraseña" => "holasoyjosefino"
    ]];
    if (isset($_POST) === FALSE)
            $_POST = []
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <h2>Formulario</h2>
    <form method = "post">
        <p>
            <strong>Nombre:</strong>
            <input type="text" name="nombre" size="40" required>
        </p>
        <br>
        <p>
            <strong>Contraseña:</strong>
            <input type = "password" name="contraseña" size = "40" required>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
    <?php
    $encontrado = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){ //REVISA QUE SE HAYA PULSADO EL BOTON, NEGRO
            foreach($usuarios_permitidos as $user){     //FOR QUE REVISA SI ESTA EN LA LISTA DE USUARIOS PERMITIDOS EL POSTEADO
                    if($user["nombre"] === $_POST['nombre'] && $user["contraseña"] === $_POST['contraseña'])
                        $encontrado = true;
            }
            
            if ($encontrado === true) {
                echo "<p style='color:green;'>Bienvenido al sistema, {$_POST['nombre']}</p>";
            } else {    
                echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";
            }
        }
    ?>

</body>
</html>