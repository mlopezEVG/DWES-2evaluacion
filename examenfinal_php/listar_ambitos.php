<?php
require_once 'controller/cAmbitos.php';

$obj_controller = new CAmbitos();
$datos = $obj_controller->listarambitos();
// print_r($datos);

include 'view/v_listarambito.php';

?>