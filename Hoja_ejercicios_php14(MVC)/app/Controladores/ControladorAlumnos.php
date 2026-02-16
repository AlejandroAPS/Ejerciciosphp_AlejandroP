<?php

require_once __DIR__ . '/../Modelos/RepositorioAlumnos.php';
require_once __DIR__ . '/../Modelos/ConexionBD.php';
require_once __DIR__ . '/../Vistas/layout.php';

class ControladorAlumnos{
    private $repositorio;

    public function __construct() {
        $this->repositorio = new RepositorioAlumnos();
    }

    public function crear(){
        //funcion crear alumnos nuevos(se debe guardar en formato correcto para luego hacer INSERT INTO facil)
    }

    public function guardar(){
        //funcion guardar alumnos en tabla(INSERT INTO)
    }

    public function correcto(){
        //Carga la vista con el mensaje de alumnos/correcto
    }
    
    public function renderizar(){
        //Carga el layout.php de vistas
    }

    public function registrarError(){
        // bastante auto explicativo no?
    }

    public function validar(){
        // nombre mínimo 3 carácteres
        // edad DEBE de ser un número
        //email sie xiste debe de ser válido
    }
   
}

?>