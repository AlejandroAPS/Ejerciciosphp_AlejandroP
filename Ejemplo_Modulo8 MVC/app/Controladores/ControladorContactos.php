<?php
    require_once __DIR__ . '/../modelos/RepositorioContactos.php'; //acceder a la clase de Repositorio contactos

    class ControladorContactos{
        public $repositorio;

        function __construct() {
            $this->repositorio = new RepositorioContactos();
        }
        //LISTAR 
        function listar(){
            try{
                $contactos = $this->repositorio->obtenerTodos();
                $this->renderizar('contactos/listar', ['contactos' => $contactos]);
            }
            catch (Exception $e){
                $this->registrarError("LISTAR", $e);
                $this->renderizar('contactos/listar', ['contactos' => [], 'error' => 'No se puedo cargar la agenda,Revisa errores.log']);
            }
        }

        //MOSTRAR FORMULARIO
        function crear(){
            $this->renderizar('contactos/crear', ['antiguos' => ['nombre'=>'', 'telefono'=>'' ,'email'=>'', 'notas'=>'']]);
        }

        function guardar(){
            //Si no es POST, volvemos a listar
            if(($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST'){
                header("Location: index.php?accion=listar");
                exit;
            }

            $nombre = trim($_POST['nombre'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $notas = trim($_POST['notas'] ?? '');

            try{
                $this->validar($nombre, $telefono, $email, $notas);

                $id = (string) time();
                $fechaCreacion = date('Y-m-d H:i:s');

                $contacto = new contacto($id,$nombre, $telefono, $email, $notas, $fechaCreacion);
                $this->repositorio->agregar($contacto); 
                
                header("Location: index.php?accion=listar");
                exit;
            }
            catch (Exception $e){
                $this->registrarError("GUARDAR", $e);

                //Volvemos al formulario, conservando lo que escribió el usuario
                $this->renderizar('contactos/crear', ['error' => $e->getMessage(), 'antiguos' =>['nombre' => $nombre, 'telefono' =>$telefono , 'email' => $email, 'notas' =>$notas]]);
                
            }
        }
    }

    


?>