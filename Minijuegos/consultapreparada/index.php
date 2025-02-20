<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambitos a Añadir</title>
    <link rel="stylesheet" href="../app/styles/style.css">
</head>

<body>
    <header>
        <div id="divencabezado">
            <h1>Ámbitos de Juego</h1>
            <nav id="navencabezado">
            <a href="../index.php">Volver</a>
            <a href="index.php">Insertar Ámbitos</a>
            </nav>
        </div>
    </header>
    <main>
    <!--Enviamos a procesar.php el número introducido para primera validación-->
        <form action="procesar.php" method="post" class="form">
            
            <label for="numambitos">¿Cuántos ámbitos quieres añadir?</label></br>
            <input type="number" name="numambitos" placeholder="Inserta un número">

            <!-- Si existe $_GET['mensaje'] muéstralo -->
            <?php
            if(isset($_GET['mensaje'])){
                $mensaje = $_GET['mensaje'];
                echo '<p id="mensaje">'.$mensaje.'</p>';
            }
            
            ?>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>