<?php
Class Coche{
    public $color;
    public $marca;
    public $modelo;

    public function arrancar(){
        echo "El coche está arrancando, brum, brum";
    }

    public function detener(){
        echo "Quieto parao";
    }

    public function ver_atributos(){
        echo "Marca: ".$this->marca."\n";
        echo "Modelo: ".$this->modelo."\n";
        echo "Color: ".$this->color."\n";
    }

}