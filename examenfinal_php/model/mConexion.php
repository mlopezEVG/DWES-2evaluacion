<?php
class MConexion{

    protected $conexion;

    public function __construct(){
        require_once 'config/configdb.php';
        $this->conexion = new mysqli(SERVER, USER, PW, BBDD);
    
        if($this->conexion->connect_error){
            throw new Exception('Error de conexion (' . $this->conexion->connect_errno. '):' . $this->conexion->connect_error);
        }
    }
}


?>