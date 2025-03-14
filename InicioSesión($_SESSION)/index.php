<?php
//Mostrar la vista de inicio de sesión o la de sesión iniciada.
session_start();

if (isset($_SESSION['id'])){
    include 'view/sesioniniciada.php';

}else{
    include 'view/iniciosesion.php';
}


?>