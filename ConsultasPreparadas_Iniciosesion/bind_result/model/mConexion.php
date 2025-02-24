<?php

class MConexion{
    protected $conexion;

    public function __construct(){
        require_once '../config/configdb.php';
        $this->conexion = new mysqli(SERVER,USER,PW,DB);
    }

}

?>