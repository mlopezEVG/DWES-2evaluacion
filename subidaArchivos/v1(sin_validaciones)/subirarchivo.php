<?php
//$_FILES --> Variable superglobal que contiene INFORMACIÓN sobre archivos subidos a través de un formulario.
//'archivo' --> nombre del campo de la subida del archivo en el formulario.
//'tmp_name' --> propiedad que contiene el nombre temporal del archivo subido en el servidor. 

if(move_uploaded_file($_FILES['archivo']['tmp_name'], 'img/' .$_FILES['archivo']['name'])){
    echo 'Archivo subido correctamente';
}else{
    echo 'Ha ocurrido un error en la subida de los archivos';
}


?>