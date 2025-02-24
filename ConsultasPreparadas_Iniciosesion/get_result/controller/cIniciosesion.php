<?php

class CIniciosesion{

    private $obj_modelo;

    public function __construct(){
        require_once 'model/mIniciosesion.php';
        $this->obj_modelo = new MIniciosesion();

    }

    public function iniciosesion(){

        if (empty($_POST['usuario']) || empty($_POST['password'])){
            header("Location: index.php?mensaje=Debes rellenar todos los campos");
            exit();

        }else{
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $resultado = $this->obj_modelo->iniciosesion($usuario, $password);
        
            if($resultado == false){
                header("Location: index.php?mensaje=Usuario o contraseña incorrectos");
                exit();

            }else{
                header("Location: index.php?mensaje=Inicio de sesión correcto");
            }
        }



        

    }
}



?>