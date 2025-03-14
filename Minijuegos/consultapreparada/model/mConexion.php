<?php
class MConexionbd {
    protected $conexion; //se pone protected por seguridad.

    public function __construct(){
        require_once './config/configdb.php';
        $this->conexion = new mysqli( HOST, USER, PW, BBDD);
        
    }

}

?>