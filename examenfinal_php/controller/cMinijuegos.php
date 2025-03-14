<?php

class CMinijuegos{
    private $mensaje;
    private $obj_modelo;

    public function __construct(){
        require_once 'model/mMinijuegos.php';
        $this->obj_modelo = new MMinijuegos();

    }

    public function altaminijuegos(){
        print_r($_POST);
        if(empty($_POST['nombre']) || empty($_POST['etapa'])){
            $this->mensaje = 'Debes rellenar todos los campos';
            header(header: "Location:formulario_alta.php?mensaje=".$this->mensaje);
        }else{
            $nombre = $_POST['nombre'];
            $idambito = $_POST['idambito'];
            $numEtapas = count($_POST['etapa']);
        }

        $resultado = $this->obj_modelo->altaminijuegos($nombre, $idambito, $numEtapas);
        if($resultado === false){
            $this->mensaje = 'Ese minijuego ya existe';
            header(header: "Location:formulario_alta.php?mensaje=".$this->mensaje);
            exit();

        }elseif (is_string($resultado)){
            echo $resultado;
        }
        
        if($resultado === true){
            header("Location: listar_ambitos.php");
        }
}
}
?>