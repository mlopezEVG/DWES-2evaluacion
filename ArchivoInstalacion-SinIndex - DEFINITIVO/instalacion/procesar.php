<?php
require_once 'cInstalacion.php'; //Requerimos del controlador para instanciarlo

$obj_controller = new CInstalacion();
// print_r($_POST) ;  

if ($_POST) {//si existe $post es decir se ha enviado el formulario de "crear_admin"
    $obj_controller->insertarAdmin(); //llamar a funcion
} else {
   $obj_controller->generartablas(); //llamar a funcion generar tablas.
}


?>