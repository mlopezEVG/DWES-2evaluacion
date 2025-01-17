<?php
    class CCustomer {

        // Propiedad privada para almacenar el objeto del modelo
        private $obj_modelo;
        // Propiedad pública para almacenar mensajes de error o éxito
        public $mensaje;

        // Constructor de la clase CCustomer
        public function __construct() {
            // Incluimos el archivo que contiene la clase MCustomer, que es el modelo
            require_once 'mCustomer.php';
            // Creamos una instancia de la clase MCustomer y la asignamos a la propiedad obj_modelo
            $this->obj_modelo = new MCustomer();
        }

        // Método para listar clientes
        public function listar() {
            // Llamamos al método listarclientes del modelo (MCustomer) para obtener los datos de los clientes
            $resultado = $this->obj_modelo->listarclientes();

            // Si el resultado es 'false', significa que hubo un problema al obtener los datos
            if ($resultado == 'false') {
                // Asignamos un mensaje de error a la propiedad mensaje
                $this->mensaje = 'No se han podido recopilar datos';
                // Retornamos el mensaje de error
                return $this->mensaje;
            } else {
                // Si se obtuvieron los datos correctamente, los retornamos
                return $resultado;
            }
        }
    }
?>