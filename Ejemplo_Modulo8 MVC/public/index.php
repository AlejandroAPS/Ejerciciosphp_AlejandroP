<?php
    //  public/index.php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Incluimos el controlador principal

    require_once __DIR__ .
    '/../app/Controladores/ControladorContactos.php';

    //Creamos el controlador

    $controlador = new ControladorContactos();

    //Leemos la acción por defecto:Listar)

    $accion = $_GET['accion'] ?? 'listar';

    /*if exist($_GET[‘accion’]) then
	    $accion = $_GET[‘accion`];
    else:
	    $accion = ‘listar’;*/

    //Ejecutamos la acción correspontiente

    switch ($accion){
        case 'listar':
            $controlador->listar();
            break;
        case 'crear':
            $controlador->crear();
            break;
        case 'guardar':
            $controlador->guardar();
        case 'borrar':
            $controlador->borrar();
        default:
            echo"Acción no válida";
    }


?>
