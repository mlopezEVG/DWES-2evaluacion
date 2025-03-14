<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar ámbitos</title>
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
        <div class="centrar">
            <?php
                if($_GET){
                    $numero = $_GET['numero'];
                }
            ?>
         
            <form action='procesar.php?numero=$numero' method='post' class='form'>
            <?php
                for($i=1; $i<=$numero; $i++){
                    echo "<label for='nombre'>Inserta el nombre del ámbito: ".$i."</label> </br>";
                    echo "<input class='inputform'  name='nombre[]' type='text' placeholder='Introduce el nombre'></br>";
                
                }
                if(isset($_GET['mensaje'])){
                        $mensaje=$_GET['mensaje'];
                        echo '<p id="mensaje">'.$mensaje.'</p>';
                    }
                ?>
            <input type="submit" name="form_ambitos" value="Guardar Ambitos">
            </form>
        </div>
    </main>
    
</body>
</html>