<?php
class Alumno{
    
    private $id;
    private $nombre;
    private $email;
    private $edad;
    private $fechaCreacion;

    public function __construct($nombre, $email, $edad, $fechaCreacion) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
        $this->fechaCreacion = $fechaCreacion;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }
}

?>