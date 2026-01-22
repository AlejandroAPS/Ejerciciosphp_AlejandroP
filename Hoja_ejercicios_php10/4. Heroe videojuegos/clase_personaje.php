<?php
    class personaje{
        public $nombre;
        public $puntosvida;

        public function __construct($nombre,$puntosvida) {
            $this->nombre = $nombre;
            $this->puntosvida = $puntosvida;
        }
    }

    class guerrero extends personaje{
        public $arma;

        public function __construct($nombre, $puntosvida) {
            parent::__construct($nombre,$puntosvida);
            $this->arma = "Espada";
        }   
        
        public function dardatos(){
            echo'Soy el gran <strong>'. $this->nombre .'</strong> tengo <strong>' . $this->puntosvida . '</strong> puntos de vida y utilizo una <strong>'. $this->arma. '</strong>.';
        }

    }


?>