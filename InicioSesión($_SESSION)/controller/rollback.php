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
            $resultado = $this->obj_modelo->obtener_usuario($nombre);

            if(is_string($resultado)){
                $this->mensaje = $resultado;
                header("Location: index.php?mensaje=$this->mensaje");
            }else{
                print_r($resultado);
                if($resultado['pw'] !== $_POST['password']){
                    $this->mensaje = 'La contraseña es incorrecta';
                    header("Location: index.php?mensaje=$this->mensaje");
                }else{
                    $this->usuario = $resultado;
                    session_start();
                    $_SESSION['id'] = $resultado['iduser'];
                }
            }
        }
    }

    public function cambiarcontraseña(){
$contraseña_antigua = $_POST['contraseña_antigua'];
        $nueva_contraseña = $_POST['password'];
        $repetir_contraseña = $_POST['repetir_password'];

        if (empty($_POST['contraseña_antigua']) || empty($_POST['password']) || empty($_POST['repetir_password'])) {
            $this->mensaje = 'Debes rellenar todos los campos';
            header("Location: cambiar_contrasena.php?mensaje=" . $this->mensaje);
            exit();

       // Verificar que la contraseña antigua sea correcta
        }elseif ($contraseña_antigua !== $this->usuario['pw']) {
            $this->mensaje = 'La contraseña antigua es incorrecta';
            header("Location: cambiar_contrasena.php?mensaje=" . $this->mensaje);
            exit();

        // Verificar que la nueva contraseña y la repetición coincidan
        }elseif ($nueva_contraseña !== $repetir_contraseña) {
            $this->mensaje = 'Las contraseñas no coinciden';
            header("Location: cambiar_contrasena.php?mensaje=" . $this->mensaje);
            exit();

        // Verificar que la nueva contraseña sea diferente de la antigua
        }elseif ($contraseña_antigua === $nueva_contraseña) {
            $this->mensaje = 'La nueva contraseña debe ser diferente de la antigua';
            header("Location: cambiar_contrasena.php?mensaje=" . $this->mensaje);
            exit();

        }else{
            $resultado = $this->obj_modelo->cambiar_contraseña($nueva_contraseña);

            if(is_string($resultado)){
                $this->mensaje = $resultado;
                header("Location: cambiar_contrasena.php?mensaje=$this->mensaje");
                exit();
            }
        }
    }

    public function cerrar_sesion(){
        session_start();
        session_destroy();
        header('Location: index.php');
    }

}

?>