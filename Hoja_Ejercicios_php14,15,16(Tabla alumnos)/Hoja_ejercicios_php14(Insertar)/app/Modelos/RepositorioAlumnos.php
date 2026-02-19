<?php

require_once __DIR__ . '/ConexionBD.php';
require_once __DIR__ . '/Alumno.php';

class RepositorioAlumnos {

    //Funcion que prepara el INSERT INTO a mi conexion con la BDD
    public function insertar(Alumno $alumno) {
        //guarda la conexopn
        $conexion = ConexionBD::obtenerConexion();
        //Variable con los place holder en cada sitio
        $sql = "INSERT INTO alumnos (nombre, email, edad, fecha_creacion)
                VALUES (:nombre, :email, :edad, :fecha)";

        $stmt = $conexion->prepare($sql);
        //Lo ejecuta todo con su respectivo 
        return $stmt->execute([
            ':nombre' => $alumno->getNombre(),
            ':email'  => $alumno->getEmail(),
            ':edad'   => $alumno->getEdad(),
            ':fecha'  => $alumno->getFechaCreacion()
        ]);
    }
}
