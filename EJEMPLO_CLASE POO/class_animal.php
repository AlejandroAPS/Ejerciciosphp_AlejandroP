<?php

Class Animal{
    public $especie;
    public $patas;
    public $raza;
    private $color;
    
    public function emitir_sonido(){
        echo "Grrrrrrrrrr\n";
    }

    public function ver_animal(){
        echo "Especie: ".$this->especie."\n";
        echo "Patas: ".$this->patas."\n";
        echo "Raza: ".$this->raza."\n";
        echo "Color: ".$this->color."\n";
    }

    public function set_color($nuevo_color){
        $this->color = $nuevo_color;
    }

    public function get_color(){
        return $this->color;
    }

}

Class Perro extends Animal{
    public function emitir_sonido()
    {
        echo "Guau, guau, guau,guau";
    }
}

Class Ave extends Animal{}

Class Gato extends Animal{
    public function emitir_sonido(){
        echo "Maiu, miau, miau";
    }
}

