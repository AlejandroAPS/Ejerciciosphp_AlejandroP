<?php

    class producto{
        public $nombre;
        public $precio;

        public function __construct($nombre, $precio) {
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
    }

    class pastel extends producto{
        public $sabor;
        
        public function __construct($nombre, $precio, $sabor) {
            $this->sabor = $sabor;
            parent::__construct($nombre,$precio);
        }

        public function etiqueta(){
            echo'Pastel de ['. $this->sabor. ']: ['. $this->nombre .']-[' . $this->precio . '] euros.';
        }   
    }


?>