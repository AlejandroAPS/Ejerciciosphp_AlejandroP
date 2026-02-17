<?php

require_once __DIR__ . '/ConexionBD.php';
require_once __DIR__ . '/Alumno.php';

class RepositorioAlumnos {

    public function insertar(Alumno $alumno) {

        $conexion = ConexionBD::obtenerConexion();

        $sql = "INSERT INTO alumnos (nombre, email, edad, fecha_creacion)
                VALUES (:nombre, :email, :edad, :fecha)";

        $stmt = $conexion->prepare($sql);

        return $stmt->execute([
            ':nombre' => $alumno->getNombre(),
            ':email'  => $alumno->getEmail(),
            ':edad'   => $alumno->getEdad(),
            ':fecha'  => $alumno->getFechaCreacion()
        ]);
    }
}
