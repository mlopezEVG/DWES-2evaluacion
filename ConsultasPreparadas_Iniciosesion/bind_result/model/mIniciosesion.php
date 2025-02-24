<?php
require_once 'mConexion.php';

class MIniciosesion extends MConexion{

    public function __construct(){
        parent::__construct();  //Ejecutamos el controlador de la clase padre (clase "Conexión").
    }

    public function iniciosesion($usuario, $password){

        //Buscamos si existe un usuario con el nombre y contraseña que se han introducido.
        $sql = "SELECT nombre, pw 
                    FROM usuario 
                    WHERE nombre = ? AND pw = ?;";

        $stmt = $this->conexion->prepare($sql); //Preparamos la consulta (Analiza la consulta y prepara la base de datos para ejecutarla).
        $stmt -> bind_param('ss', $usuario, $password); //Vincula variables con los parámetros necesarios.
        $stmt -> execute(); //Ejecutamos la consulta.
    
//-----------------bind_result()-----------------
        // bind_result() vincula las columnas de la consulta con variables.
        $stmt -> bind_result($nombre, $pw);

        //fetch--> se utiliza con consultas preparadas y bind_result(), recuperando cada fila y vinculando las columnas a variales
        //--Devuelve true si hay filas y false si no hay.
        if ($stmt -> fetch()){
            $user = [
                'nombre' => $nombre,
                'pw' => $pw //Podemos cargar un array para devolver los datos de esta manera, (aunque en este programa no se utilice).
            ];

            return $user; //Y podemos retornarlo.

        }else{
            return false; //Retornamos false si NO hay filas.
        }
    }
}





?>