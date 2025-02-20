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
        <?php
            require_once 'controller/cAmbitos.php';
            $obj_controller = new CAmbitos;

            if(isset($_GET)){
                $id = $_GET['id'];
                $detalles = $obj_controller->detalles($id);
                if(is_array($detalles)){
                    echo '<b>'.$detalles['nombre'].', '.$detalles['URLjuego'].'</b>';
                }else{
                    echo $detalles;
                }
                
                
            }
            ;
        ?>
    </main>
</body>
</html>