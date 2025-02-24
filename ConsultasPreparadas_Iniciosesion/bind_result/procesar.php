<?php
require_once 'controller/cIniciosesion.php';
//Comprobar si se ha enviado el formulario de inicio de sesión
if(isset($_POST['formulario'])){
    $controller = new CIniciosesion;
    $controller -> iniciosesion();
}


?>