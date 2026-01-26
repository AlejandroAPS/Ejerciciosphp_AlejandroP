<?php
    // app/modelos/contacto.php

    class contacto{
        public $id;
        public $nombre;
        public $telefono;
        public $email;
        public $notas;
        public $fechaCreacion;

        public function __construct($id,$nombre,$telefono,$email,$notas,$fechaCreacion) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->notas = $notas;
            $this->fechaCreacion = $fechaCreacion;
        }
        // Convierte el contacto a una linea para guardarla en el fichero
        function aLinea(){
            // Para evitar romper el formato si el usuario mete el símbolo "|"
            $nombreSeguro = str_replace('|', '/', $this->nombre);
            $emailSeguro = str_replace('|', '/', $this->email);
            $notasSeguro = str_replace('|', '/', $this->notas);
            return $this->id . "|" . $nombreSeguro . "|" . $this->telefono . "|" . $emailSeguro . "|" . $notasSeguro . "|" . $this->fechaCreacion;
        }

        //static: crear un Contacto desde una línea del fichero

        static function desdeLinea($linea)

        {
            $partes = explode()
        }


        


?>