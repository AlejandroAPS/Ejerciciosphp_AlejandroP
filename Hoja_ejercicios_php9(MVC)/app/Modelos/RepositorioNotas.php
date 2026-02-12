<?php
    require_once __DIR__ . '/../Modelos/Notas.php';

    class RepositorioNotas{
        private $rutaArchivo;

        public function __construct() {
            $this->rutaArchivo = __DIR__ . '/../../storage/notas.txt';
        }   
        public function obtenerTodas(){
            //Verificador si existe el archivo
            if(!file_exists($this->rutaArchivo)){
                return [];
            }
            //Guarda el archivo entero en forma de array en $lineas
            $lineas = file($this->rutaArchivo);

            $notas = [];
            //por cada linea en el archivo va haciendo multiples cosas
            foreach($lineas as $linea){
                //si esta vacia la ignora y continua pa alante
                if (trim($linea) === ''){
                    continue;                
                }
                // Usa la funcion desdeLinea de la clase Nota usando como variable $linea
                $nota = Nota::desdeLinea($linea);

                $notas[] = $nota;
            }
            return $notas;
        }

        public function agregar(Nota $nota){
            //crea una linea poniendole el formato
            $linea = $nota->aLinea() . "\n";
            // $resultado guarda el contenido usando la ruta establecida para guardar con la linea creada
            $resultado = file_put_contents(
                $this->rutaArchivo,
                $linea,
                FILE_APPEND
            );

            //Si no existe resultado lanza excepcion
            if ($resultado === false){
                throw new Exception("No se pudo escribir en notas.txt");
            }
        }        
    
    }

?>