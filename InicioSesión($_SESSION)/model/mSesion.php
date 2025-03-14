<?php
require_once 'mConectar.php';
class MSesion extends MConexion{

    private $mensaje;

    public function __construct(){
        parent::__construct();
    }

    public function obtener_id($nombre){
        $sql = "SELECT * FROM usuario WHERE correo = ?";

        try {
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $resultado = $stmt->get_result();

            $usuario = [];
            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();
                return $usuario;
            } else {
                $this->mensaje = 'Ese usuario no existe';
                return $this->mensaje;
            }
        } catch (Exception $e) {
            $this->mensaje = 'Ha ocurrido un error en el inicio de sesión';
            return $this->mensaje;
        }
    }

    public function obtener_datos() {
        session_start();
        if(isset($_SESSION['id'])){
        $id=isset($_SESSION['id']);

        $sql = "SELECT * FROM usuario WHERE iduser = ?";

            try {
                $stmt = $this->conexion->prepare($sql);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    return 'No se encontraron datos';
                }
            } catch (Exception $e) {
                return 'Error al obtener la contraseña: ' . $e->getMessage();
            }

        }else{
            echo 'id perdido';
        }
        
    }

    public function cambiar_contraseña($nueva_contraseña) {
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];

            $sql = "UPDATE usuario SET pw = ? WHERE iduser = ?";
            try {
                $stmt = $this->conexion->prepare($sql);
                $stmt->bind_param('si', $nueva_contraseña, $id);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $this->mensaje = 'Se ha modificado correctamente la contraseña';
                    return $this->mensaje;

                } else {
                    $this->mensaje = 'No se ha podido modificar la contraseña';
                    return $this->mensaje;

                }
            } catch (Exception $e) {
                $this->mensaje = 'Ha ocurrido un error: '.$e->getMessage();
                return $this->mensaje;
            }
        }else{
            $this->mensaje = 'No hay id disponible';
            return $this->mensaje;
        }
    }

    public function modificar_datos($nombre, $telefono) {
        session_start();
        $id = $_SESSION['id'];
        $query = "UPDATE usuario SET nombre = ?, telefono = ? WHERE iduser = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('ssi', $nombre, $telefono, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
    }


}

?>