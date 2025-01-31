<?php
class MJusticiasocial {

    private $conexion; // Conexión a la base de datos
    private $mensajeError; // Mensaje de error

    // Constructor de la clase
    public function __construct(){
        require_once 'config/configdb.php';// Requerimos el archivo de configuración de la base de datos
        $this->conexion = new mysqli(HOST, USER, PW, BBDD); // Establecemos la conexión a la base de datos
        if ($this->conexion->connect_error){ // Si hay un error en la conexión...
            $this->mensajeError = $this->conexion->connect_error; // Almacenamos el mensaje de error
        }
    }

    // Método para iniciar sesión
    public function miniciosesion ($email){
        // Escapar el valor del email para evitar inyecciones SQL
        $email = $this->conexion->real_escape_string($email);
        
         // Consulta SQL para obtener el usuario con el email proporcionado
        $consulta = "SELECT username, email, password FROM usuario WHERE email = '".$email."'";
        $resultado = $this->conexion->query($consulta); // Ejecutamos la consulta

        if ($resultado->num_rows == 0){//Si no hay filas para ese email...
            throw new Exception('No hay ningún usuario registrado con ese email.');
        }else{
            $fila = $resultado->fetch_assoc(); // Obtenemos la fila de resultados como un array asociativo
            return $fila; // Devolvemos el array asociativo con los datos del usuario
        }  
        
    }
}



?>