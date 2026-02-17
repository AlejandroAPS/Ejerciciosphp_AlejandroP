<?php

require_once __DIR__ . '/../Modelos/Alumno.php';

class ControladorAlumnos {

    // Mostrar listado mínimo
    public function listar() {

        try {

            $modelo = new ModeloAlumno();
            $alumnos = $modelo->obtenerTodos();

            require __DIR__ . '/../Vistas/listado.php';

        } catch (Exception $e) {

            $this->registrarError($e->getMessage());
            echo "Error al cargar el listado.";
        }
    }


    // Mostrar pantalla de confirmación
    public function confirmar() {

        try {

            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                throw new Exception("ID inválido para confirmación.");
            }

            $id = $_GET['id'];

            $modelo = new ModeloAlumno();
            $alumno = $modelo->obtenerPorId($id);

            if (!$alumno) {
                throw new Exception("Alumno no encontrado.");
            }

            require __DIR__ . '/../Vistas/confirmar.php';

        } catch (Exception $e) {

            $this->registrarError($e->getMessage());
            echo "Error al confirmar el borrado.";
        }
    }


    // Ejecutar DELETE
    public function borrar() {

        try {

            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                throw new Exception("ID inválido para borrado.");
            }

            $id = $_GET['id'];

            $modelo = new ModeloAlumno();
            $filasAfectadas = $modelo->borrarPorId($id);

            if ($filasAfectadas == 0) {
                throw new Exception("No se pudo borrar el alumno.");
            }

            header("Location: index.php?accion=listar&mensaje=ok");
            exit;

        } catch (Exception $e) {

            $this->registrarError($e->getMessage());
            echo "Ha ocurrido un error al borrar el alumno.";
        }
    }


    // Método privado para registrar errores en storage
    private function registrarError($mensaje) {

        $ruta = __DIR__ . '/../../storage/errores.log';

        if (!file_exists(__DIR__ . '/../../storage')) {
            mkdir(__DIR__ . '/../../storage', 0777, true);
        }

        file_put_contents(
            $ruta,
            date('Y-m-d H:i:s') . " - " . $mensaje . PHP_EOL,
            FILE_APPEND
        );
    }
}
