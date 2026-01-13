<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda Películas</title>
</head>
<body>
    <?php   //Esto ha pedido el profe que lo PONGAMOS SIEMPRE para ver los todos los errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ?>
<?php
    $peliculas = array( //Array multidimensional que hace de base de datos de todas las pelis disponibles
    array(
        "titulo" => "Matrix",
        "genero" => "Acción",
        "edad minima" => 16
    ),
    array(
        "titulo" => "Avengers",
        "genero" => "Acción",
        "edad minima" => 13
    ),
    array(
        "titulo" => "Deadpool",
        "genero" => "Comedia",
        "edad minima" => 18
    ),
    array(
        "titulo" => "Mi pobre angelito",
        "genero" => "Comedia",
        "edad minima" => 7
    ),
    array(
        "titulo" => "Jumanji",
        "genero" => "Comedia",
        "edad minima" => 10
    )
    );
    echo "<p><h3><strong><u>Lista de peliculas disponible</u></strong></h3></p>";   //Muestra con bucle todas las disponibles
    foreach ($peliculas as $pelicula){
        echo "<p><strong>" . $pelicula["titulo"] . " </strong> " . $pelicula['genero'] . "<font size = 2><em> Edad mínima:" . $pelicula['edad minima'] . "</em></font>";
    };
    ?>
    <form method = "post">
        <p><h2><strong>Busqueda de peliculas por género </strong></h2>
            <P><strong>Género:</strong><input type="text" name="genero"required></P>
        </p>
        <br>
        <p>
            <input type = "submit" value="Enviar" size="20">
        </p>
    </form>
<?php
    $busqueda = $_POST['genero'];
    echo "<p><h3><strong><u>Filtrador de películas:</u></strong></h3></p>";
    foreach ($peliculas as $pelicula){  //por cada pelicula,si su genero es equivalente a la busqueda del usuario la imprime y la muestra   
        if ($pelicula["genero"] == $busqueda){
        echo "<p><strong>" . $pelicula["titulo"] . " </strong> " . $pelicula['genero'] . "<font size = 2><em> Edad mínima:" . $pelicula['edad minima'] . "</em></font>";
        };
    };

?>
    

    
</body>
</html>