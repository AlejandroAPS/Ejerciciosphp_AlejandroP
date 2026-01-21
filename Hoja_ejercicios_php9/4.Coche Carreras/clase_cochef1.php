<?php
    class cochef1 {
        public $piloto;
        public $velocidad;

        // construct
        public function __construct($piloto) {
            $this->piloto = $piloto;
            $this->velocidad = 0;
        }
        //acelerar
        public function acelerar(){
            $this->velocidad = $this->velocidad + 20;
            echo'La velocidad es: '. $this->velocidad. '<br>';
        }

    }

?>  