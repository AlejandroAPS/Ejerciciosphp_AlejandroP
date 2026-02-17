<?php

class ConexionBD {

    public static function obtenerConexion() {  //IMPORTANTE APUNTAR ESTO

        $host = "localhost";
        $dbname = "centro";
        $usuario = "root";
        $password = "curso";

        $conexion = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $usuario,
            $password
        );

        // Activar excepciones
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;
    }
}