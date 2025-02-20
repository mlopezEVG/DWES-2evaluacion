<?php
require_once 'controller/cAmbitos.php';
$obj_controller = new CAmbitos;

if(isset($_GET)){
    $id=$_GET['id'];
    $detalles = $obj_controller->detalles($id);
    // header("Location: detallesjuegos.php?detalles=$detalles");
}





?>