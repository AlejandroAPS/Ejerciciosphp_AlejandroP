<?php

require_once("class_vehiculo.php");

$audi = new Coche();
$kawasaki = new Moto();
$bribon = new Barco();

$audi->arrancar();
echo "Tipo de objeto: ".$audi->tipo."\n";
$audi->derrapar();

$bribon->arrancar();
echo "Tipo de objeto: ".$bribon->tipo."\n";
//Este obviamente da error porque derrapar solo existe en el objeto $audi y no existe en $bribon
$bribon->derrapar();

$kawasaki->arrancar();
echo "Tipo de objeto: ".$kawasaki->tipo."\n";