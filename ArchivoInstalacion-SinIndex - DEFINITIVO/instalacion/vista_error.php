<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Error de Conexion</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body><!--Vista de error que al final no se utiliza por petición de la profesora.-->
    <h1>Ha ocurrido un error</h1>
    <?php
    //Concatenamos la variable que almacena el mensaje de error que se produzca.
        echo '<span id="mensajeError" >'.$obj_controller->mensajeError.'</span>'; 
    ?>
</body>
</html>