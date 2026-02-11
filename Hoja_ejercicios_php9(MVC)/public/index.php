<?php
// Inicialización visualización errores 
ini_set('display_errors', 1);
    error_reporting(E_ALL);

//__DIR___
require_once __DIR__ .'/../app/Controladores/ControladorNotas.php';

$controlador = new ControladorNotas();
//Guardar la accion y defaultear a listar
$accion = $_GET['accion'] ?? 'listar';

switch ($accion){
    case 'listar':
        //Llamar a listar
        break;

    case 'crear':
        //Llamar a crear
        break;
    
    
    case 'guardar':
        //Llamar a guardar
        break;
    
    default: 
        echo "Acción no válida";
}



?>