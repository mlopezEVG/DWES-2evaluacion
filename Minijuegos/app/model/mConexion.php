<?php
//La clase conexión realizará la conexión de la bbdd y los modelos extenderán de ella.

class MConexion {
    protected $conexion; //se pone protected por seguridad.

    public function __construct(){
        require_once './config/configdb.php';
        $this->conexion = new mysqli( HOST, USER, PW, BBDD);
        
    }

}

?>