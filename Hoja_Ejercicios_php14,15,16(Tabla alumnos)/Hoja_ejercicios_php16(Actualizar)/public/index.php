<?php
    // Mostración de errores
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once '../app/Controladores/ControladorAlumnos.php';
    //accion por defector listar otra vez
    $controlador = new ControladorAlumnos();
    $accion = $_GET['accion'] ?? 'listar';
    // case switch
    switch ($accion) {
        case 'editar':
            $controlador->editar();
            break;

        case 'actualizar':
            $controlador->actualizar();
            break;

        case 'listar':
        default:
            $controlador->listar();
            break;
}
?>
