<?php
$agenda = [
        // Contacto 0
        [
            "nombre" => "Carlos Ruiz",
            "telefono" => "666-111-222",
            "email" => "carlos@correo.com"
        ],
        // Contacto 1
        [
            "nombre" => "Lucía Gómez",
            "telefono" => "666-333-444",
            "email" => "lucia@correo.com"
        ]
    ];

foreach($agenda as $contacto){
    echo "<b>Nombre:</b> " . $contacto["nombre"] . "<br>";
    echo "<b>Teléfono:</b> " . $contacto["telefono"] . "<br>";
    echo "<b>Email:</b> " . $contacto["email"] . "<br><br>";


}

echo "Muestro el array con echo<br><br>";
echo $agenda;

echo "<br><br>Muestro el array con print_r<br><br>";

print_r($agenda);

echo "<br><br>Muestro el array con var_dump<br><br>";
var_dump($agenda);




?>