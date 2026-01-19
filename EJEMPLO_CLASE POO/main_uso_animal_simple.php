<?php

require_once ("class_animal.php");

$pajaro = new Animal();

$pajaro->set_color("blanco");
echo "\nEl color del bicho es: ".$pajaro->get_color()."\n";
$pajaro->especie = "Ave";
$pajaro->patas = 2;
$pajaro->raza = "Cacatua";
echo "\nLa Raza es: ".$pajaro->raza."\n";
$pajaro->emitir_sonido();
$pajaro->ver_animal();
echo "\n----------------------------\n";
$perro = new Animal();
$perro->especie = "Canino";
$perro->patas = 4;
$perro->raza = "Caniche";
$perro->emitir_sonido();
$perro->ver_animal();
echo "\n----------------------------\n";
$gato = new Animal();
$gato->especie = "Felino";
$gato->patas = 4;
$gato->raza = "Callejero";
$gato->emitir_sonido();
$gato->ver_animal();
echo "\n----------------------------\n";