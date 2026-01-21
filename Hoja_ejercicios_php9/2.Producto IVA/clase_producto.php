<?php

class producto {
    public $descripcion;
    public $preciosinIVA;

    // Constructor
    public function __construct($descripcion, $preciosinIVA) {
        $this->descripcion = $descripcion;
        $this->preciosinIVA = $preciosinIVA;
    }

    public function precio_final() {
        $iva = 0.21;
        $precio_total = $this->preciosinIVA + ($this->preciosinIVA * $iva);
        echo 'El precio final del <strong>'. $this->descripcion .'</strong> es: <strong>'. $precio_total. "</strong>";

    }
}
?>