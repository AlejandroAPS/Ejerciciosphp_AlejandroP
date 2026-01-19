<?php

Class Vehiculo{

    public $tipo;
    public $marca;
    public $identificacion;
    public $modelo;

    public function arrancar(){
        echo "Brrruuuummmmmm\n";
    }

    public function parar(){
        echo "Sooooooooooooo\n";
    }

    public function ver_vehiculo(){
        echo "Tipo: ".$this->tipo."\n";
        echo "Marca: ".$this->marca."\n";
        echo "Identificacion: ".$this->identificacion."\n";
        echo "Modelo: ".$this->modelo."\n";
    }
}

Class Coche extends Vehiculo{
    public $tipo = "coche";

    public function derrapar(){
        echo "iihihihihihihhiihihihih";
    }
}

Class Moto extends Vehiculo{
    public $tipo = "moto";
}

Class Barco extends Vehiculo{
    public $tipo = "barco";
}