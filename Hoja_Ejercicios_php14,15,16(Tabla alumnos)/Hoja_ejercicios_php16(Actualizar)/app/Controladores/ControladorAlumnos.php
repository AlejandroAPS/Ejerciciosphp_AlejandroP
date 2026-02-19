<?php

require_once '../app/Modelos/RepositorioAlumnos.php';

class ControladorAlumnos {

    public function listar() {

        try {
            //Recoge los datos del repositorio
            $repositorio = new RepositorioAlumno();
            $alumnos = $repositorio->obtenerTodos();
            //carga las vistas
            $vistaContenido = 'Alumnos/listado.php';        
            require __DIR__ . '/../Vistas/layout.php';


        } catch (Exception $e) {

            $this->guardarError($e->getMessage());
            echo "Error al cargar el listado.";
        }
    }

    public function editar() {

        try {
            //si no se jha pulsado el boton y no es un numero el post 'id' , manda la excepcion ID invalido
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                throw new Exception("ID inválido");
            }
            //Obtiene los datos del alumno por id
            $repositorio = new RepositorioAlumno();
            $alumno = $repositorio->obtenerPorId($_GET['id']);

            if (!$alumno) {
                throw new Exception("Alumno no encontrado");
            }
            //carga vista
            $vistaContenido = 'Alumnos/editar.php';
            require __DIR__ . '/../Vistas/layout.php';

        } catch (Exception $e) {

            $this->guardarError($e->getMessage());
            echo "Error al cargar el alumno.";
        }
    }

    public function actualizar() {

        try {
            //si no se jha pulsado el boton y no es un numero el post 'id' , manda la excepcion ID invalido
            if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
                throw new Exception("ID inválido");
            }
            //utiliza el id que se ha enviado(clave) y luego los demas datos se acen TRIM para que no queden raros por si acaso
            $id = $_POST['id'];
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $edad = trim($_POST['edad']);

            // VALIDACIONES OBLIGATORIAS

            if (strlen($nombre) < 3) {
                throw new Exception("Nombre demasiado corto");
            }

            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email inválido");
            }

            if (!is_numeric($edad)) {
                throw new Exception("Edad no numérica");
            }

            $repositorio = new RepositorioAlumno();
            $repositorio->actualizar($id, $nombre, $email, $edad);
            // Mini vista indicando que se ha hecho correctamente
            //no me apetecia hacer otro archivo la vdd
            echo "<h3>Alumno actualizado correctamente.</h3>";
            echo "<a href='index.php'>Volver al listado</a>";

        } catch (Exception $e) {

            $this->guardarError($e->getMessage());
            echo "Ha ocurrido un error. Inténtelo más tarde.";
        }
    }
    //Mete el error recogido en errores.log
    private function guardarError($mensaje) {

        file_put_contents(
            __DIR__ . '/../../storage/errores.log',
            date('Y-m-d H:i:s') . " - " . $mensaje . PHP_EOL,
            FILE_APPEND
        );
    }
}
