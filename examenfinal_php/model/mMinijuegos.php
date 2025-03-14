<?php
require_once 'mConexion.php';
class MMinijuegos extends MConexion{
    private $mensaje;

    public function __construct(){
        parent:: __construct();
    }

    public function altaminijuegos($nombre ,$idambito ,$numEtapas){
        $sql = "INSERT INTO minijuegos (nombre, idambito, num_etapas) VALUES (?,?,?);";
        
        try{
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('sii', $nombre, $idambito, $numEtapas);

            try{
                $stmt->execute();
                return true;
                
            }catch(mysqli_sql_exception $e){
                if($e->getCode() === 1062){
                    return false;
                }
            }

        }catch(Exception $e){
            $this->mensaje = 'Error al dar de alta al minijuego'. $e->getCode();
            return $this->mensaje;
        }
    }
}

?>