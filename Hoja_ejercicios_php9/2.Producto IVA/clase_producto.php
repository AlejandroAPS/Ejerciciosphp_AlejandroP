<?php

class producto {
    //atributos
    public $descripcion;
    public $preciosinIVA;

    // Constructor
    public function __construct($descripcion, $preciosinIVA) {
        $this->descripcion = $descripcion;
        $this->preciosinIVA = $preciosinIVA;
    }
        //Funcion para clacular y devolver el precio despues del IVA
    public function precio_final() {
        $iva = 0.21;
        $precio_total = $this->preciosinIVA + ($this->preciosinIVA * $iva);
        echo 'El precio final del <strong>'. $this->descripcion .'</strong> es: <strong>'. $precio_total. "</strong>";
        
    }
}
?>