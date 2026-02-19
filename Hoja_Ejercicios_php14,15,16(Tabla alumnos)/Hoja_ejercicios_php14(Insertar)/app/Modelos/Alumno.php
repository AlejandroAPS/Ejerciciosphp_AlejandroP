<?php
class Alumno{
    
    private $id;
    private $nombre;
    private $email;
    private $edad;
    private $fechaCreacion;
    //constructor que recoge las variables y pone los datos
    public function __construct($nombre, $email, $edad, $fechaCreacion) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->edad = $edad;
        $this->fechaCreacion = $fechaCreacion;
    }
    //funciones para trabajar con variables en private
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