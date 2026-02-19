<?php

require_once 'ConexionBD.php';

class RepositorioAlumno {

    private $conexion;
    //constructor
    public function __construct() {
        $this->conexion = ConexionBD::obtenerConexion();
    }
    //Obtiene todos los datos, necesario para soltar listado
    public function obtenerTodos() {

        $stmt = $this->conexion->prepare("SELECT * FROM alumnos");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Obtiene los datos de un Id especifico recogido al pulsar el boton en la vista listar
    public function obtenerPorId($id) {

        $stmt = $this->conexion->prepare(
            "SELECT * FROM alumnos WHERE id = :id"
        );

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Hace la actualizacion con la consulta UPDATE y luego la manda con stmt todo junto
    public function actualizar($id, $nombre, $email, $edad) {

        $stmt = $this->conexion->prepare(
            "UPDATE alumnos 
             SET nombre = :nombre,
                 email = :email,
                 edad = :edad
             WHERE id = :id"
        );

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':edad', $edad);

        return $stmt->execute();
    }
}
