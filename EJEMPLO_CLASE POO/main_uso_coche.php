<?php

require ("class_coche.php");

$coche = new Coche();

$coche->color = "Rojo";
$coche->marca = "Toyota";
$coche->modelo = "CHR";

$coche->arrancar();
echo "\n";
$coche->detener();
echo "\n";
$coche->ver_atributos();
echo "\n----------------------\n";
$coche2 = new Coche();
$coche2->color = "Azul";
$coche2->marca = "Nissan";
$coche2->modelo = "Micra";

$coche2->arrancar();
echo "\n";
$coche2->detener();
echo "\n";
$coche2->ver_atributos();
