<?php
    class Persona{
        public $nombre;
        public $edad;

        public function __construct($nombre, $edad) {
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
    }

    class Estudiante extends Persona{
        public $curso;
        public function __construct($nombre, $edad, $curso) {
            parent::__construct($nombre, $edad);
            $this->curso = $curso;
        }
        public function dardatos(){
            echo'Nombre:[' . $this->nombre . '] Edad:[' . $this->edad . '] Curso:[' . $this->curso . ']';
        }
    }


?>