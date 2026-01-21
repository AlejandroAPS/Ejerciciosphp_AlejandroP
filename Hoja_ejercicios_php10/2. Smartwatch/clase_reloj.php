<?php
    class reloj{
        public $marca;

        public function __construct($marca) {
            $this->marca = $marca;

        }
    }

    class smartwatch extends reloj{
        public $sistemaoperativo;

        public function __construct($marca, $sistemaoperativo) {
            parent::__construct($marca);
            $this->sistemaoperativo = $sistemaoperativo;
        }
        
        public function dardatos(){
            echo'Marca:[' . $this->marca . '] Sistema Operativo:[' . $this->sistemaoperativo . ']';
        }
    }



?>