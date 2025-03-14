<?php
//Añade el minijuego y redirige al proceso listar_ambitos.
require_once 'controller/cMinijuegos.php';

$obj_controller = new CMinijuegos();
$obj_controller->altaminijuegos();


//print_r(value: $_POST);

?>