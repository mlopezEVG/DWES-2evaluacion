<?php
//------------Muestra el formulario de alta, para que el usuario pueda introducir la información.------------
require_once 'controller/cAmbitos.php';

$obj_controller = new CAmbitos();
$datos = $obj_controller->listarambitos();



include 'view/v_formularioalta.php';


?>