<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Ámbitos</title>
</head>
<body>
    <a href="formulario_alta.php">Añadir Minijuego</a>
    <h3>Ámbitos:</h3>
    <?php
    foreach($datos as $dato){
        echo '<p>'. $dato['nombre'] ."................<a href ='formulario_modificar.php?id=".$dato['idambito']."'>Modificar</a></p>";
    }
    ?>
</body>
</html>