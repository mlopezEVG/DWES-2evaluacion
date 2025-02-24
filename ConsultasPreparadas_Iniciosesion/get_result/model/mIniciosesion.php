<?php
require_once 'mConexion.php';

class MIniciosesion extends MConexion{

    public function __construct(){
        parent::__construct();  //Ejecutamos el controlador de la clase padre (clase "Conexión").
    }

//-----------------------------------GET_RESULT-----------------------------------
    public function iniciosesion($usuario, $password){

        //Buscamos si existe un usuario con el nombre y contraseña que se han introducido.
        $sql = "SELECT nombre, pw 
                    FROM usuario 
                    WHERE nombre = ? AND pw = ?;";

        $stmt = $this->conexion->prepare($sql); //Preparamos la consulta (Analiza la consulta y prepara la base de datos para ejecutarla).
        $stmt -> bind_param('ss', $usuario, $password); //Vincula variables con los parámetros necesarios.
        $stmt -> execute(); //Se ejecuta la consulta.

        //get_result() -> obtiene en forma ded objeto el resultado de la última consulta.
        $resultado = $stmt -> get_result();

        //Si hay filas, es por que el usuario y contraseña son correctos.
        if($resultado->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}





?>