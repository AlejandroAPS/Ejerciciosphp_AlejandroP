<?php

require_once __DIR__ . '/../Modelos/RepositorioAlumnos.php';
require_once __DIR__ . '/../Modelos/ConexionBD.php';
require_once __DIR__ . '/../Modelos/Alumno.php';

class ControladorAlumnos{

    private $repositorio;

    public function __construct() {
        $this->repositorio = new RepositorioAlumnos();
    }

    public function crear(){
        $this->renderizar('alumnos/crear.php');
    }   

    public function guardar(){
        //REVISA QUE SE HAYA ENVIADO ALGO A TRAVES DE POST PARA QUE NO SALTE NADA ANTES DE TIEMPO NI METAN COSAS RARAS
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->renderizar('alumnos/crear.php', ['error' => 'Método no permitido']);
            return;
        }
            //Se meten las variables segu lo que haya metido el usuario
            $nombre = trim($_POST['nombre'] ?? '');
            $email  = trim($_POST['email'] ?? '');
            $edad   = trim($_POST['edad'] ?? '');
            //Se llama a la funcion validar todas las variables haber si da true o false    
            $error = $this->validar($nombre, $email, $edad);
            // Si da true se sigue si no no returnea nada
       
        if ($error) {

            $this->registrarError("Error de validación: " . $error);

            $this->renderizar('alumnos/crear.php', [
                'error' => $error,
                'antiguos' => [
                'nombre' => $nombre,
                'email' => $email,
                'edad' => $edad
            ]
        ]);

        return;
    }
        // fecha creacion del alumno se guarda y se crea el objeto alumno con los datos del usuairo
        $fecha = date('Y-m-d H:i:s'); // fecha actual
        $alumno = new Alumno($nombre, $email, $edad, $fecha);

        try {
            //se trata de crear en la BDD
        $this->repositorio->insertar($alumno);
        header('Location: index.php?accion=correcto');
        exit;
        }catch (Exception $e) {
        $this->registrarError($e->getMessage());
        $this->renderizar('alumnos/crear.php', [
            'error' => 'No se pudo insertar el alumno.',
            'antiguos' => ['nombre' => $nombre, 'email' => $email, 'edad' => $edad]
    ]);
}


    }

    public function correcto(){
        // solo manda renderizar correcto.php y ya
        $this->renderizar('alumnos/correcto.php');
    }
    
    public function renderizar($vista, $datos = []){
        extract($datos);

        $vistaContenido = __DIR__ . '/../Vistas/' . $vista;

        require __DIR__ .'/../Vistas/layout.php';
    }

    public function registrarError($mensaje){   //IMPORTANTE APUNTAR ESTO
        file_put_contents(
            __DIR__ . '/../../storage/errores.log',
            date('Y-m-d H:i:s') . " - " . $mensaje . PHP_EOL,
            FILE_APPEND
        );
    }

    //Validación de todo
    public function validar($nombre, $email, $edad){
        // nombre mínimo 3 carácteres
        if (strlen($nombre) < 3) {
            return "El nombre debe de tener al menos 3 carácteres";
        }
        // edad DEBE de ser un número
        if (!is_numeric($edad)){
            return "La edad debe de estar en formato de numero";
        }
        //email sie xiste debe de ser válido
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "El email no es válido";
        }

        return null;
    }
   
}

?>