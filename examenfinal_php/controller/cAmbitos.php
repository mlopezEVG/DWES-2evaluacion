<?php

class CAmbitos{
    private $obj_modelo;
    
    private $mensaje; 

    public function __construct(){
        require_once 'model/mAmbitos.php';
        $this->obj_modelo = new MAmbitos();
    }

    public function listarambitos(){
        $resultado = $this->obj_modelo->listarambitos();
     
        if(is_array($resultado)){
            return $resultado;
        }else{
            echo $resultado;
        }
    }

    public function sacarnombre(){
        if(isset($_GET['id'])){
            session_start();
            $_SESSION['idambito'] = $_GET['id'];
            $resultado = $this->obj_modelo->sacarnombre();
            return $resultado;
        }
        
    }

    public function modificar(){
        if(!empty($_POST['nuevonombre'])){
            $nuevonombre = $_POST['nuevonombre'];
            $resultado = $this->obj_modelo->modificarambito($nuevonombre);

            if($resultado === true){
                session_start();
                session_destroy();
                header("Location: listar_ambitos.php");
            }

            if(is_string($resultado)){
                echo $resultado;
            }

            // if(is_string($resultado)){
            //     echo $resultado;
            // }else{
            //     session_start();
            //     session_destroy();
            //     header("Location: listar_ambitos.php");
            // }

        }else{
            $this->mensaje = 'El ámbito debe tener un nombre';
            header("Location: formulario_modificar.php?mensaje=$this->mensaje");
        }
        
        
    }
}

?>