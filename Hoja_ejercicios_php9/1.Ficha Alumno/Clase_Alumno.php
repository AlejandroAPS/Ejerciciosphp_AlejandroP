<?php
    class alumno{
        public $nombre;
        public $curso;
        public function presentarse(){
            echo"Hola soy ". $this->nombre. " y estudio ". $this->curso . ".";

        }public function __construct($nombre, $curso) {
            $this->nombre = $nombre;
            $this->curso =$curso;
        }
        
    }
    


?>