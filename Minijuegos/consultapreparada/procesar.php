<?php
require_once 'controller/cAmbito.php';  //Requerimos del controlador

//--Si el número enviado es mayor a 10 redirige al mismo enviando un mensaje personalizado.
if($_POST['numambitos'] > 10){
    header('Location:index.php?mensaje=Solo pueden insertarse 10 ámbitos como máximo');
    exit(); //Nos aseguramos de que NO se siga ejecutando el script (buena práctica).

//--Si el número no es mayor a 10, almacenalo en una variable y redirige a la siguiente vista pasando el número por url, para generar los inputs DINÁMICAMENTE
}elseif($_POST['numambitos'] < 1){
    header('Location:index.php?mensaje=Debe insertar al menos un ámbito');
    exit();
}else{
    $numero = $_POST['numambitos'];
    header('Location:insertarambitos.php?numero='.$numero);
}

//Esta línea solo se leerá cuando se envía el SEGUNDO formulario. Ya que el primer if-else no se cumpliría
if($_POST){
    $obj_controller= new CAmbito();
    $obj_controller->insertarambitos(); //Llama al método que realiza validaciones e inserta los ámbitos

}



?>