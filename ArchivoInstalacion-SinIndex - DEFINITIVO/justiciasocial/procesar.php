<?php
require_once 'cJusticiasocial.php'; //Requerimos del controlador.
// print_r($_POST);  //Depuración
$obj_controller = new CJusticiasocial;//instanciamos el controlador
$obj_controller->ciniciosesion();   //llamamos al método del controlador.

?>

