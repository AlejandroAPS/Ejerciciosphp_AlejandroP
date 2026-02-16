<?php

    require_once __DIR__ . '/ConexionBD.php';
    require_once __DIR__ . '/Alumno.php';

    class RepositorioAlumnos{

        public function insertar($alumnos){
            try{
                $conexion = conexionBD::obtenerConexion();
                $sql = "INSERT INTO alumnos (nombre, email, edad, fecha_creacion)
                        VALUES (:nombre, :email, :edad, :fecha)";

                $stmt = $conexion->prepare($sql);

                $stmt->execute([
                    ':nombre' => $alumno->getNombre(),
                    ':email' => $alumno->getEmail(),
                    ':edad' => $alumno->getEdad(),
                    ':fecha' => $alumno->getFechaCreacion()
                ]);

                return true;

            }catch(PDOException $e){

                file_put_contents(
                    __DIR__ . '/../../storage/errores.log',
                    date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL,
                    FILE_APPEND
                );
            }
        }
    };
?>