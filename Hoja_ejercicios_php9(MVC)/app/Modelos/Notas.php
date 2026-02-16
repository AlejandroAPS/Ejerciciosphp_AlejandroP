<?php
    class Nota{
    public $id;
    public $texto;
    public $fecha;

    public function __construct($id,$texto,$fecha) {
        $this->id = $id;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }
    // función para poner el formato a todas las variables de esta clase
    public function aLinea(){
        return $this->id . "|" . $this->texto . "|" . $this->fecha;
    }

    public static function desdeLinea($linea){
        $partes = explode('|', trim($linea));

        if(count($partes) !== 3){
            throw new Exception("Línea corrupta en notas.txt " . $linea);
        }

        return new Nota($partes[0], $partes[1], $partes[2]);

    }


}



?>