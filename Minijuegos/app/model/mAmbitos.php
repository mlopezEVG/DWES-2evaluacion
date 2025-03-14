<?php

require_once 'mConexion.php';   //Requiere del archivo que establece la conexión

class MAmbitos extends MConexion {  //"Extends" -> clase hijo extiende de clase padre.

    public function __construct(){
        parent::__construct(); //Ejecuta el contructor de la clase padre.

    }
    public function mostrarAmbitos(){
    /*Muestra solo los ámbitos que tienen minijuegos asociados*/
        $consulta = "SELECT * FROM ambitos WHERE idambito IN (SELECT idambito FROM minijuegos)";
        $resultado = $this->conexion->query($consulta);
        if($resultado->num_rows == 0){
            return false;

        } else {
            $ambitos = [];

            while ($fila = $resultado->fetch_assoc()){
                $ambitos[] = $fila;
            }
            return $ambitos;
        }
    }

    public function mostrarMinijuegos($idambitos){

// 1 FORMA: implode(separador, array) --> Convierte los elementos de un array a un string separandolos por una coma.
        $string_idambitos = implode(',', $idambitos);
        
        $consulta = "SELECT ambitos.nombre AS nombreambito,
                            ambitos.idambito,
                            idminijuego,
                            minijuegos.nombre AS nombreminijuego
                    FROM ambitos
                    INNER JOIN minijuegos 
                    ON ambitos.idambito =minijuegos.idambito
                    WHERE ambitos.idambito IN ($string_idambitos)";

        $resultado = $this->conexion->query($consulta);
        $datos = [];

        while ($fila = $resultado->fetch_assoc()){
            $datos[] = $fila;
        }
        
        return $datos;
    }

    public function detalles($idminijuego){

        $sql = "SELECT nombre, URLjuego FROM minijuegos WHERE idminijuego =$idminijuego;";
        $resultado = $this->conexion->query($sql);

        if($resultado -> num_rows == 1){
           $detalles = $resultado->fetch_assoc();
           return $detalles;
        
        }else{
            return false;
        }        
    }

}


?>