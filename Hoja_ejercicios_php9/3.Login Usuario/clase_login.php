<?php
    class login {
        public $usuario;
        public $password;

        public function __construct($usuario, $password) {
            $this->usuario = $usuario;
            $this->password = $password;
        }

        public function comprobar(){
            if ($this->password == "1234"){
                echo'Acceso concedido a '. $this->usuario. '<br>';    
            }
            else{
                echo'Contraseña incorrecta <br>';
            }
        }
    }

?>