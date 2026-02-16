<?php


class ConexionBD {

    public function conectar() {
        $host = "localhost";
        $dbname = "centro";
        $usuario = "root";
        $password = "curso";

        try {
            $conexion = new PDO(
                "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8",
                $usuario,
                $password
            );

            // Configurar errores como excepciones
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}




?>