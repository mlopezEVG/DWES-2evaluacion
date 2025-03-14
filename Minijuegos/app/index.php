<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ámbitos Disponibles</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <div id="divencabezado">
            <h1>Ámbitos de Juego</h1>
            <nav id="navencabezado">
                <a href="index.php">Volver</a>
                <a href="../consultapreparada/index.php">Insertar Ámbitos</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="centrar">
            <form action="mostrarminijuegos.php" method="post" id="formlistaambitos">
                <?php
                    require_once 'controller/cAmbitos.php';
                    $obj_controller = new CAmbitos;
                    $ambitos = $obj_controller->mostrarAmbitos();
            
                    foreach($ambitos as $ambito){
                        echo "<label>";
                        echo "<input type='checkbox' name='ambitos[]' value='{$ambito['idambito']}'> {$ambito['nombre']}";
                        echo "</label><br>";
                    }
                ?>
                <div class="terminos-container">
                    <input type="checkbox" name="terminos" value="terminos" id="terminos">
                    <label for="terminos">Aceptar los términos</label>
                </div>  
                <?php
                    if (isset($_GET['mensaje'])){
                        $mensaje=$_GET['mensaje'];
                        echo '<p id="mensajeseparado">'.$mensaje.'</p>';
                    }
                    
                ?>

                <input type="submit" value="Buscar Minijuegos">
            </form>
        </div>
    </main>
</body>
</html>