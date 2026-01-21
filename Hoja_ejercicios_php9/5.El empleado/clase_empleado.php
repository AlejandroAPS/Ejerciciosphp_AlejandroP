<?php
    class empleado{
        public $nombre;
        public $puesto;
        public $sueldo;
        public function __construct($nombre, $puesto,$sueldo) {
            $this->nombre = $nombre;
            $this->puesto = $puesto;
            $this->sueldo = $sueldo;
        }

        public function revisarsueldo(){
            if ($this->sueldo < 1000){
                $this->sueldo = $this->sueldo + 200;
                echo'Sueldo Actualizado <br>';
            }
            else{
                echo'El sueldo es correcto <br>';
            }
        }
    }

?>