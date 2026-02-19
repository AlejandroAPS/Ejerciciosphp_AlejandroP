<?php

require_once __DIR__ . '/../Modelos/AccionesID.php';

class ControladorAlumnos {

    // Mostrar listado mínimo
    public function listar() {

        try {
            $modelo = new AccionesID();
            $alumnos = $modelo->obtenerTodos();

            //Indicamos que vistas se van a ver(el listado y el layout)
            $vistaContenido = __DIR__ . '/../Vistas/Alumnos/listado.php';
            require __DIR__ . '/../Vistas/layout.php';

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

            $modelo = new AccionesID();
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
            //primero mira que el usuario haya mandado informacion con el id = 'id'
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                throw new Exception("ID inválido para borrado.");
            }
            //se almacena
            $id = $_GET['id'];

            //se llama al metodo para poder borrar por id
            $modelo = new AccionesID();
            $filasAfectadas = $modelo->borrarPorId($id);

            //Si no afecta a ninguna fila (no se ha ejecutado el delete), manda eror
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
        // mete el error en erroes.log
        file_put_contents(
            $ruta,
            date('Y-m-d H:i:s') . " - " . $mensaje . PHP_EOL,
            FILE_APPEND
        );
    }
}
