<?php
    require_once 'controller/cSesion.php';
    $controller = new CSesion();
    $datos = $controller->modificar();

    include 'view/mod_datos.php';

?>