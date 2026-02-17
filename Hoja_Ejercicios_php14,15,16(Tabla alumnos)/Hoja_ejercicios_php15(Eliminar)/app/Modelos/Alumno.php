<?php

require_once __DIR__ . '/ConexionBD.php';

class ModeloAlumno {

    // Obtener todos los alumnos (listado mínimo para poder borrar)
    public function obtenerTodos() {

        $conexion = ConexionBD::obtenerConexion();

        $sql = "SELECT * FROM alumnos ORDER BY id ASC";
        $stmt = $conexion->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Obtener un alumno por id (para confirmar borrado)
    public function obtenerPorId($id) {

        $conexion = ConexionBD::obtenerConexion();

        $sql = "SELECT * FROM alumnos WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // DELETE principal del ejercicio
    public function borrarPorId($id) {

        $conexion = ConexionBD::obtenerConexion();

        $sql = "DELETE FROM alumnos WHERE id = :id";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount(); // devuelve cuántas filas se borraron
    }
}
