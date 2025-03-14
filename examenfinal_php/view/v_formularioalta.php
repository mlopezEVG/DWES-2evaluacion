<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Alta</title>
</head>
<body>
    <h2>DATOS DEL MINIJUEGO</h2>

    <form action="alta_minijuego.php" method="post">
        <label for="nombre">Nombre del juego:</label><br/>
        <input type="text" name="nombre" placeholder="Introduce el nombre"><br/><br/>

        <label for="ambito">Ámbito:</label></br>
        <select name="idambito">
        <?php
            foreach($datos as $dato){
                echo "<option value=". $dato['idambito'] .">". $dato['nombre'] ."</option>";
            }
        ?>
        </select><br/><br/>

        <label for="etapa">Recomendado para (se puede marcar más de uno):</label><br/>
        <input type="checkbox" name="etapa[]" value="ESO">ESO<br/>
        <input type="checkbox" name="etapa[]" value="Ciclos">Ciclos<br/>
        <input type="checkbox" name="etapa[]" value="Bachillerato"> Bachillerato<br/><br/>

        <?php
        if(isset($_GET['mensaje'])){
            $mensaje = $_GET['mensaje'];
            echo '<p style= "color:red;">'.$mensaje.'</p>';
        }
        
        ?>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>