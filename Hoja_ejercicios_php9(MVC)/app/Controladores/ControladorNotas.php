<?php

require_once __DIR__ . '/../Modelos/RepositorioNotas.php';
require_once __DIR__ . '/../Modelos/Notas.php';

class ControladorNotas{
    private $repositorio;

    public function __construct() {
        $this->repositorio = new RepositorioNotas();
    }
    // FUNCION LISTAR
    public function listar(){
        try{
            $notas = $this->repositorio->obtenerTodas();

            $this->renderizar('notas/listar', ['notas'=> $notas]);
        }catch(Exception  $e){
            
            $this->registrarError('LISTAR',$e);
            $this->renderizar('notas/listar', ['notas' => [], 'error' => 'No se pudieron cargar las notas']);
        }   
    }
    public function crear(){
        $this->renderizar('notas/crear', ['antiguos' => ['texto' => '']]);
    }
    public function guardar(){
        try{
            $texto = trim($_POST['texto'] ?? '');

            if (strlen($texto) < 3){
                throw new Exception("La nota debe de tener almenos 3 carácteres");
            }

            if (strlen($texto) > 80){
                throw new Exception("La nota no puede superar los 80 caracteres");
            }

            $id = time();
            $fecha = date('Y-m-d H:i:s');

            $nota = new Nota($id,$texto,$fecha);

            $this   ->repositorio->agregar($nota);

            header("Location: index.php?accion=listar");
            exit;
        }catch(Exception $e){
            $this->registrarError('GUARDAR', $e);

            $this->renderizar('notas/crear', ['error'=> $e->getMessage(), 'antiguos'=>['texto' => $texto]]);
        }
    }
    private function renderizar($vista, $datos = []){
        extract($datos);
        $archivoVista = __DIR__ . '/../Vistas/' . $vista . '.php';
        $vistaContenido = $archivoVista;
        require __DIR__ . '/../Vistas/layout.php';
    }

    private function registrarError($contexto, $e){
        $archivologo = __DIR__ . '/../../storage/errores.log';
        $fecha = date ('Y-m-d H:i:s');

        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . "/n";

        file_put_contents($archivoLog,$linea, FILE_APPEND);
    }


}

?>