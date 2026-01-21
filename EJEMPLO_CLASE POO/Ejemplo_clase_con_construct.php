
<?php
class Persona {
    public $nombre;
    public $edad;

    // Constructor
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function saludar() {
        echo "Hola, soy $this->nombre y tengo $this->edad años.";
    }
}

// Crear un objeto
$persona1 = new Persona("Juan", 30);
$persona1->saludar(); // Hola, soy Juan y tengo 30 años.

?>