<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Modificar</title>
</head>
<body>
    <form action="modificar_ambito.php" method="post">
        <label for="nuevonombre">Modificar el nombre del ámbito:</label><br/>
        <?php
            foreach($datos as $dato){
                echo "<input type='text' name='nuevonombre' value='".$datos['nombre']."' placeholder='Nombre'>";
            }
            
            if(isset($_GET['mensaje'])){
                echo '<p style= "color:red;">'.$_GET['mensaje'].'</p>';
            }
        ?>
        <br/><input type="submit" value="Enviar">
    </form>
</body>
</html>