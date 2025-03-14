<?php
class CSesion{

    private $obj_modelo;

    public $mensaje;

    private $usuario = [];

    public function __construct(){
        require_once 'model/mSesion.php';
        $this->obj_modelo = new MSesion();
    }

    public function iniciar_sesion(){
        // print_r($_POST);
        if (empty($_POST['nombre']) || empty($_POST['password'])){
            $this->mensaje = 'Debes rellenar todos los campos';
            header("Location: index.php?mensaje=$this->mensaje");
            
        }else{
            $nombre = $_POST['nombre'];
            $resultado = $this->obj_modelo->obtener_id($nombre);

            if(is_string($resultado)){
                $this->mensaje = $resultado;
                header("Location: index.php?mensaje=$this->mensaje");
            }else{
                // print_r($resultado);
                if($resultado['pw'] !== $_POST['password']){
                    $this->mensaje = 'La contraseña es incorrecta';
                    header("Location: index.php?mensaje=$this->mensaje");
                }else{
                    session_start();
                    $_SESSION['id'] = $resultado['iduser'];
                }
            }
        }
    }

    public function cambiarcontraseña(){
        // print_r($_POST);
        $contraseña_antigua = $_POST['contrasena_antigua'];
        $nueva_contraseña = $_POST['password'];
        $repetir_contraseña = $_POST['repetir_password'];

        
        $resultado = $this->obj_modelo->obtener_datos();

        if(!empty($contraseña_antigua) && is_array($resultado)){
            if($contraseña_antigua !== $resultado['pw']) {
                echo 'La contraseña antigua es incorrecta';
                exit();

            }
        }

        if (empty($_POST['contrasena_antigua']) || empty($_POST['password']) || empty($_POST['repetir_password'])) {
            echo 'Debes rellenar todos los campos';
            exit();
        
            // Verificar que la nueva contraseña y la repetición coincidan
        }elseif ($nueva_contraseña !== $repetir_contraseña) {
            echo 'Las contraseñas no coinciden';
            exit();

        // Verificar que la nueva contraseña sea diferente de la antigua
        }elseif ($contraseña_antigua === $nueva_contraseña) {
            echo 'La nueva contraseña debe ser diferente de la antigua';
            exit();

        }else{
            $resultado = $this->obj_modelo->cambiar_contraseña($nueva_contraseña);

            if(is_string($resultado)){
                echo $resultado;
                exit();
            }
        }
    }

    public function obtenerdatosmodificar(){
        $resultado = $this->obj_modelo->obtener_datos();
        if(is_string($resultado)){
            $this->mensaje = $resultado;
                header("Location: cambiar_contrasena.php?mensaje=$this->mensaje");
                exit();
        }else{
            return $resultado;
        }
    }

    public function modificar() {
        if (empty($_POST['nombre']) || empty($_POST['telefono'])) {
            $this->mensaje = 'Debes rellenar todos los campos';
            header("Location: mostrar_formmod.php?mensaje=$this->mensaje");
            exit();
        } else {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $resultado = $this->obj_modelo->modificar_datos($nombre, $telefono);
    
            if ($resultado === true) {
                $this->mensaje = 'Datos modificados correctamente';
            } else {
                $this->mensaje = $resultado;
            }
            header("Location: mostrar_formmod.php?mensaje=$this->mensaje");
            exit();
        }
    }

    public function cerrar_sesion(){
        session_start();
        session_destroy();
        header('Location: index.php');
    }

}

?>