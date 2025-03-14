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
    <main id="main_mostrarjuegos">

        <div>
        <?php
            if(isset($_COOKIE['ultimojuego'])){
                echo 'El último juego seleccionado ha sido: <b>'.$_COOKIE['ultimojuego'].'</b>';
            }
        ?>
        
        <?php
            require_once 'controller/cAmbitos.php';
            $obj_controller = new CAmbitos;
            if(isset($_POST)){
                $datosMinijuegos = $obj_controller->validarambitos();

                if(is_array($datosMinijuegos)) {
                    // print_r($datosMinijuegos);
                    echo '<table id="tablaminijuegos">';
                    echo '<tr><th>Nombre del Ámbito</th><th>Nombre del Minijuego</th></tr>';
                    foreach($datosMinijuegos as $minijuego) {
                        echo '<tr>';
                        echo '<td>' . $minijuego['nombreambito'] . '</td>';
                        echo '<td><a href="detallesjuegos.php?id=' . $minijuego['idminijuego'] . '">' . $minijuego['nombreminijuego'] . '</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            }
        ?>
        </div>
    </main>
</body>
</html>