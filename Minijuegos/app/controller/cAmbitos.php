<?php
class CAmbitos{
    private $modelo;

    function __construct(){
        require_once './model/mAmbitos.php';
        $this->modelo = new MAmbitos();
    
    }

    public function mostrarAmbitos(){
        $resultado = $this->modelo->mostrarAmbitos();

        if(is_array($resultado)){
            return $resultado;
        }else{
            return false;
        }
    }

    public function validarambitos(){
        if (!isset($_POST['terminos'])){
            header('Location: index.php?mensaje=Debe aceptar los términos y condiciones');
            exit();
        }

        if (!isset($_POST['ambitos'])){
            header('Location: index.php?mensaje=Debe seleccionar al menos un ámbito');
            exit();
        }else{
            $ambitos = $_POST['ambitos'];
            $resultado = $this->modelo->mostrarMinijuegos($ambitos);
            return $resultado;

        }
    }

    public function detalles($idminijuego){
        $resultado = $this->modelo->detalles($idminijuego);

        if (is_array($resultado)){
            return $resultado;
        }else{
            $mensaje = 'No se encontraron detalles del minijuego';
            return $mensaje;
        }
    }
}

?>