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
}

?>