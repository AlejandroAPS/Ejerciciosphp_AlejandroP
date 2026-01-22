<?php
    class notificacion{
        public $mensaje;
         function __construct($mensaje) {
            $this->mensaje = $mensaje;
        }

        public function enviar(){
            echo 'Enviando:<strong>'. $this->mensaje . '</strong>.';
        }
    }

    class email extends notificacion{
        public $destinatario;
        public function __construct($mensaje, $destinatario) {
            parent::__construct($mensaje);
            $this->destinatario = $destinatario;

        } 
        public function enviar(){
            echo'Para: [' . $this->destinatario . '].';
            parent::enviar();
        }
    }

?>