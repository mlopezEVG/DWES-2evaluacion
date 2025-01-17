<?php

class MCustomer {
    // Propiedad privada para almacenar la conexión a la base de datos
    private $conexion;

    // Constructor de la clase MCustomer
    public function __construct(){
        // Incluimos el archivo de configuración de la base de datos
        require_once 'config/configdb.php';
        // Establecemos la conexión a la base de datos utilizando las constantes definidas en configdb.php
        $this->conexion = new mysqli(HOST, USER, PW, BBDD);
    }

    // Método para listar todos los clientes desde la base de datos
    public function listarclientes(){
        // Consulta SQL para seleccionar todos los registros de la tabla 'customer'
        $consulta = 'SELECT * FROM customer';
        // Ejecutamos la consulta en la base de datos
        $resultado = $this->conexion->query($consulta);

        // Si no se encontraron registros (num_rows == 0), retornamos 'false'
        if($resultado->num_rows == 0){
            return 'false';
        }
        
        // Inicializamos un array vacío para almacenar los datos de los clientes
        $datos = [];
        // Inicializamos un contador para el índice del array
        $i = 0;

        // Recorremos cada fila del resultado y la agregamos al array 'datos'
        while($fila = $resultado->fetch_assoc()){
            $datos[$i] = $fila;  // Guardamos la fila en el array 'datos'
            $i++;  // Incrementamos el índice
        }

        // Retornamos el array con los datos de los clientes
        return $datos;
    }
}

?>
