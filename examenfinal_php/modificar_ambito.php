<?php
//------------modifica el ámbito en la base de datos y redirige al proceso listar_ambitos.------------
require_once 'controller/cAmbitos.php';

// print_r($_POST);
$obj_controller = new CAmbitos();
$obj_controller->modificar();

?>