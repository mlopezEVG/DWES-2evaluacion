<?php
require_once 'mConexion.php';

//Extendemos de la clase conexión, y manejamos el error con excepciones. 
class MAmbitos extends MConexion{

    private $mensaje_error;

    public function __construct(){
        try{
            parent::__construct();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function listarambitos(){
        $sql = "SELECT * FROM ambito;";

        try {
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            $datos = [];

            while($fila = $resultado->fetch_assoc()){
                $datos[] = $fila;
            }
            return $datos;

        }catch (Exception $e){
            $this->mensaje_error = 'Error al listar ámbitos: '.$e->getMessage();
            return $this->mensaje_error; 
        }
    }

    public function sacarnombre(){
        
        if(isset($_SESSION['idambito'])){
            $id = $_SESSION['idambito'];
        }else{
            echo 'NO HAY SESION';
        }
        $sql = "SELECT nombre FROM ambito WHERE idambito = ? ;";

        try{
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            if($resultado->num_rows > 0){
                return $resultado->fetch_assoc(); // Retorna directamente la fila
            } else {
                return 'No se encontró el ámbito con el ID proporcionado.';
            }

        }catch(Exception $e){
            $this->mensaje_error = 'Ha ocurrido un error: '.$e->getMessage();
        }
    }

    public function modificarambito($nuevonombre){
        session_start();
        if(isset($_SESSION['idambito'])){
            $idambito = $_SESSION['idambito'];
            echo $idambito;
        }else{
            return 'No se ha enviado id';
        }
        echo $nuevonombre;
        $sql = "UPDATE ambito SET nombre = ? WHERE idambito = ?;";

        try{
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('si', $nuevonombre, $idambito);
            $stmt->execute();
            $stmt->get_result();

            if($stmt->affected_rows > 0){
                return true;
            }else{
                echo 'No se ha modificado correctamente ';
            }

        }catch(Exception $e){
            $this->mensaje_error = 'Ha ocurrido un error al modificar: '.$e->getMessage();
            return $this->mensaje_error;
        }
    }
}

?>