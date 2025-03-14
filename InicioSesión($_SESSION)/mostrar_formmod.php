<?php
    require_once 'controller/cSesion.php';
    $controller = new CSesion();
    $datos = $controller->obtenerdatosmodificar();

    include 'view/mod_datos.php';

?>