<?php
require_once 'mConexion.php';   //Requerimos de la clase Conexión

//EXTENDEMOS de la clase Conexion. (Generamos relación clase padre - clase hijo) 
class MAmbito extends MConexionbd { 

    public function __construct(){  //Constructor que ejecuta el constructor de la clase padre.
        parent::__construct();
    }

//--FUNCIÓN que inserta los ámbitos y recibe por parámetros los nombres de los ámbitos
    public function insertarambitos($nombresambitos){   //CONSULTAS PREPARADAS

        $sql = "INSERT INTO ambitos (nombre) VALUES (?)";   //Definimos la consulta 1 vez
        $stmt = $this->conexion->prepare($sql); //Preparamos la consulta 1 vez (ANALIZA 1 vez).

        $stmt->bind_param('s', $nombre);   //Utilizamos el bind_param() 1 vez

        $sw = 1;//Variable bandera. Empieza en 1 : SIN ERRORES
    //-----------Insertar los ámbitos------------
        for ($i = 0; $i < count($nombresambitos); $i++) {
        $nombre = $nombresambitos[$i]; // Le damos valor a la variable muchas veces

            try{
                $stmt->execute();

            }catch(mysqli_sql_exception $e){
                if($e->getCode() == 1062){
                    $datosduplicados[] = $nombresambitos[$i];
                    print_r($datosduplicados) ;
                    $sw = 0;
                    
                }
            }
        }
        if($sw == 1){
            return $sw;
        }else{
           return $datosduplicados;
        }
    }
}

?>