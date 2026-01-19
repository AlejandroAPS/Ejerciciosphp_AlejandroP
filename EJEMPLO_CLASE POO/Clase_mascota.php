<?php
    class Mascota{
        public $nombre;
        public $tipo;

        //Metodo para presentar una mascota
        public function presentar(){
            echo " Hola,soy". $this->nombre." y soy un(a)". $this->tipo. ".";
        }

        public function emitirSonido(){
            if($this->tipo =="perro"){
                echo"Guau Guau Guau";
            }
            elseif($this->tipo =="gato"){
                echo"Miau Miau";
            }
            else{
                echo"Este animal no tiene un sonido definido";
            }
        }
    }

    // Crear nueva instancia de mascota
    $miMascota = new mascota();
    $miMascota->nombre = "Toby";
    $miMascota->tipo="perro";

    //Utilizar los metodos del objeto miMascota
    $miMascota->presentar();
    $miMascota->emitirSonido();

?>