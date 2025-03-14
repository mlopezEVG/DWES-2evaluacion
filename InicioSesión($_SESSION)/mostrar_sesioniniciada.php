<?php
    require_once 'controller/cSesion.php';
    $controller = new CSesion();
    $controller->iniciar_sesion();

    include 'view/sesioniniciada.php';


?>