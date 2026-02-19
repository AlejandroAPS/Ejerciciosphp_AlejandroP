<?php
//erorres 
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/Controladores/ControladorAlumnos.php';
// nuevo objeto controlador para acceder a las funciones
$controlador = new ControladorAlumnos();
//predeterminado listar
$accion = $_GET['accion'] ?? 'listar';

//case switch
switch ($accion) {
    
    case 'listar':
        $controlador->listar();
    break;

    case 'confirmar':
        $controlador->confirmar();
    break;

    case 'borrar':
        $controlador->borrar();
    break;

    default:
        echo "Acción no válida";
}

?>